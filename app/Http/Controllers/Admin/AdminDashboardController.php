<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $categories = Category::count();
        $users = User::where('role_id',2)->count();
        $order_number = Order::count();
        $orders = Order::latest()->take(10)->get();
        return view('admin.index',compact('products', 'categories', 'users','order_number', 'orders'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    
}
