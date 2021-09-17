<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Privacy;
use App\Models\TermsOfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $carts = Cart::latest()->where('order_id', null)->where('user_id', Auth::user()->id)->get();
        $orders = Order::latest()->where('user_id', Auth::user()->id)->get();
        $contacts = Contact::where('ip', request()->ip())->get();
        return view('user.index',compact('carts', 'contacts', 'orders'));
    }

    public function terms()
    {
        $terms = TermsOfService::find(1);
        return view('user.terms', compact('terms'));
    }

    public function privacy()
    {
        $privacy = Privacy::find(1);
        return view('user.privacy', compact('privacy'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
