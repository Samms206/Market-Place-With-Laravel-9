<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    public function index()
    {
        $data = Order::all();
        return view('order.order', ['listOrders' => $data]);
    }
    public function create($id)
    {
        $data = Product::findOrFail($id);
        return view('order.view-order', ['product' => $data]);
    }
    public function confirm($id)
    {
        $data = Product::findOrFail($id);
        return view('order.confirm-order', ['product' => $data]);
    }
    public function store(Request $request)
    {
        $request['grand_total'] = ($request->price) * ($request->qty);
        $request['date'] = Carbon::now()->format('Y-m-d');

        Order::create($request->all());
        return redirect('/');
    }

    public function purchase(Request $request)
    {
        $sort_by = $request->get('sort_by');
        switch ($sort_by) {
            case 'today':
                $listPurchases = Order::with('product')
                    ->where('buyer_id', Auth::user()->id)
                    ->whereDate('created_at', Carbon::today())
                    ->get();
                break;
            case 'week':
                $listPurchases = Order::with('product')
                    ->where('buyer_id', Auth::user()->id)
                    ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
                    ->get();
                break;
            case 'month':
                $listPurchases = Order::with('product')
                    ->where('buyer_id', Auth::user()->id)
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->get();
                break;
            default:
                $listPurchases = Order::with('product')->where('buyer_id', Auth::user()->id)->get();
                break;
        }

        return view("user.purchase",["listPurchases" => $listPurchases]);
    }

}
