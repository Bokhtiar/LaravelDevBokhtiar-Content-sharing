<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
       $userLogin = User::where('email', $request->email)->first();
        if(isset($userLogin)){
            $order= new Order;
            $order['f_name'] = $request->f_name;
            $order['l_name'] = $request->l_name;
            $order['email'] = $request->email;
            $order['product_id'] = $request->product_id;
            $order['country'] = $request->country;
            $order['phone'] = $request->phone;
            $order['qty'] = $request->qty;
            $order['payment_id'] = $request->payment_id;

            $order['USDT_Wallet'] = $request->USDT_Wallet;
            $order['Payoneer'] = $request->Payoneer;
            $order['Perfect_Money_Usd'] = $request->Perfect_Money_Usd;
            $order['Webmoney'] = $request->Webmoney;
            $order['BTC_WALLET'] = $request->BTC_WALLET;

            $order['user_id'] = Auth::id();
            $order->save();
                Session::flash('order','Added Sucessfully...');
                return redirect('/');
        }else{
        $validatedData = $request->validate([
            'email' => ['required', 'unique:orders', 'max:255'],
            'country' => ['required'],
            'qty' => ['required'],
            'f_name' => ['required'],
            'l_name' => ['required'],
        ]);

        $data = $request->all();
        $user = User::create([
                    'name' => $data['l_name'],
                    'email' => $data['email'],
                    'password' => bcrypt(12345678),
                ]);
        Auth::login($user);
        $order= new Order;
        $order['f_name'] = $request->f_name;
        $order['l_name'] = $request->l_name;
        $order['email'] = $request->email;
        $order['product_id'] = $request->product_id;
        $order['country'] = $request->country;
        $order['phone'] = $request->phone;
        $order['qty'] = $request->qty;
        $order['payment_id'] = $request->payment_id;

        $order['USDT_Wallet'] = $request->USDT_Wallet;
        $order['Payoneer'] = $request->Payoneer;
        $order['Perfect_Money_Usd'] = $request->Perfect_Money_Usd;
        $order['Webmoney'] = $request->Webmoney;
        $order['BTC_WALLET'] = $request->BTC_WALLET;

        $order['user_id'] = Order::query()->user_id();
        $order->save();
            Session::flash('order','Added Sucessfully...');
            return redirect('/');
        }
    }
}

