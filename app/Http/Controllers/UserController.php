<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $data = User::findOrFail(Auth::user()->id);
        return view("user.profile", ["listUser" => $data]);
    }
    public function index_buyer()
    {
        $data = User::where('type','2')->get();
        return view("user.buyer", ["listUsers" => $data]);
    }
    public function index_seller()
    {
        $data = User::where('type','1')->get();
        return view("user.seller", ["listSeller" => $data]);
    }
}
