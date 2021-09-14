<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $order= new Order;
        $order['f_name'] = $request->f_name;
        $order['l_name'] = $request->l_name;
        $order['email'] = $request->f_name;
        $order['payment_id'] = $request->payment_id;
        $order['payment_number'] = $request->payment_number;
        $order['user_id'] = Auth::id();
        $order['description'] = $request->description;
        $order->save();
            foreach (Cart::item_cart() as $cart) {
                    $cart['order_id']=$order->id;
                    $cart->save();
            }
            Session::flash('order','Added Sucessfully...');
            return redirect('/');
        }
}

