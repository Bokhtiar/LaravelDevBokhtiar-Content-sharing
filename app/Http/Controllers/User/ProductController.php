<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $products = Product::where('id', $id)->get();
        return view('user.product.categorywaysProduct', compact('products'));
    }
}
