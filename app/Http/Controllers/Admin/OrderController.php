<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        return view('admin.order.index', compact('orders'));
    }
    public function show($id)
    {
        $order = Order::find($id);
        return view('admin.order.detail', compact('order'));
    }

    public function status($id)
    {
        $order = Order::find($id);
        Order::query()->Status($order)->first();
        Session::flash('update','update Successfully...');
        return back();
    }
}
