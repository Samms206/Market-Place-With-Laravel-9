<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function home(Request $request)
    {
        $keyword = $request->keyword;
        $data = Product::with('user')
        ->where('name', 'LIKE', '%'.$keyword.'%')
        ->get();
        // dd($data->all()); 
        return view('home', ['listProduct' => $data]);
    }
    public function index()
    {
        $data = Product::with('user')->get();
        return view('product.product', ['listProduct' => $data]);
    }
    public function index_seller()
    {
        $data = Product::with('user')->where('seller_id',Auth::user()->id)->get();
        return view('product.seller-product', ['listProduct' => $data]);
    }
    public function show($id)
    {
        $data = Product::with('user')->findOrFail($id);
        return view('product.detail-product',['product' => $data]);
    }
    public function create()
    {
        $data = Category::all();
        return view('product.add-product', ['data' => $data]);
    }
    public function store(Request $request)
    {
        //update user
        $data = User::findOrFail(Auth::user()->id);
        $data->update(['type' => 1]);
        $data->save();
        //insert data
        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('photo', $newName);
            Storage::move('temp/'.$newName, 'photo/'.$newName);
        }
        $request['image'] = $newName;
        Product::create($request->except('image') + ['image' => $newName])
                        ->categories()->attach($request->categories,['created_at' => now(), 'updated_at' => now()]);
        //insert pivot tabel
        
        return redirect('/');
    }
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $product_category = $product->categories->pluck('id')->toArray();
        return view('product.edit-product', ['data' => $product, 
                                            'categories' => $categories,
                                            'product_category_id' => $product_category]);
    }
    public function update(Request $request,$id)
    {
        $product = Product::findOrFail($id);
        $newName = '';
        if($request->file('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->name.'-'.now()->timestamp.'.'.$extension;
            $request->file('image')->storeAs('photo', $newName);
            Storage::move('temp/'.$newName, 'photo/'.$newName);
        }
        $request['image'] = $newName;
        $product->update($request->except('image') + ['image' => $newName]);
        $product->categories()->sync($request->categories, ['created_at' => now(), 'updated_at' => now()]);
        return redirect('/products-seller');
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('/products-seller');
    }
}
