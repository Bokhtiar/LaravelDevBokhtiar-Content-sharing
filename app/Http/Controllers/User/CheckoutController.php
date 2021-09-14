<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function create()
    {
        $carts = Cart::latest()->where('order_id', null)->where('user_id', Auth::user()->id)->get();
        return view('user.checkout.create', compact('carts'));
    }
}
