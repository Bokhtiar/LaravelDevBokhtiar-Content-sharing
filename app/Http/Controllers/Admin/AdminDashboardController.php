<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $products = Product::count();
        $categories = Category::count();
        $users = User::where('role_id',2)->count();
        return view('admin.index',compact('products', 'categories', 'users'));
    }
}
