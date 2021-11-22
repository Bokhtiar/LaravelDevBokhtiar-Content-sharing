<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category_ways_product_show($id)
    {
        $products = Product::where('category_id', $id)->get();
        return view('user.product.categorywaysProduct', compact('products'));
    }

    public function subcategory_ways_product_show($id){
        $products = Product::where('subCategory_id', $id)->get();
        return view('user.product.subcategorywaysProduct', compact('products'));
    }
}
