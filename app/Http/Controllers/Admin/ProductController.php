<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query()->index(['id','name','price','category_id']);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::query()->Active()->get();
        return view('admin.product.createOrUpdate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:35',
            'price' => 'required',
            'category_id'=>'required',
        ]);

        if($validated){
            try{
                DB::beginTransaction();
                $product = Product::create([
                    'name' => $request->name,
                    'price'=> $request->price,
                    'category_id' => $request->category_id,
                    'menu1'=>$request->menu1,
                    'menu2'=>$request->menu2,
                    'menu3'=>$request->menu3,
                    'menu4'=>$request->menu4,
                    'menu5'=>$request->menu5,
                    'menu6'=>$request->menu6,
                    'menu7'=>$request->menu7,
                    'menu8'=>$request->menu8,
                    'menu9'=>$request->menu9,
                    'menu10'=>$request->menu10,
                    'menu11'=>$request->menu11,
                    'menu12'=>$request->menu12,
                    'menu13'=>$request->menu13,
                    'menu14'=>$request->menu14,
                    'menu15'=>$request->menu15,
                ]);
                if (!empty($product)) {
                    DB::commit();
                    return redirect('admin/product/');
                }
                throw new \Exception('Invalid Product Information');
            }catch(\Exception $ex){
                DB::rollBack();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::query()->Active()->get();
        return view('admin.product.createOrUpdate', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:35',
            'price' => 'required',
            'category_id'=>'required',
        ]);

        if($validated){
            try{
                $product = Product::find($id);
                DB::beginTransaction();
                $product = $product->update([
                    'name' => $request->name,
                    'price'=> $request->price,
                    'category_id' => $request->category_id,
                    'menu1'=>$request->menu1,
                    'menu2'=>$request->menu2,
                    'menu3'=>$request->menu3,
                    'menu4'=>$request->menu4,
                    'menu5'=>$request->menu5,
                    'menu6'=>$request->menu6,
                    'menu7'=>$request->menu7,
                    'menu8'=>$request->menu8,
                    'menu9'=>$request->menu9,
                    'menu10'=>$request->menu10,
                    'menu11'=>$request->menu11,
                    'menu12'=>$request->menu12,
                    'menu13'=>$request->menu13,
                    'menu14'=>$request->menu14,
                    'menu15'=>$request->menu15,
                ]);
                if (!empty($product)) {
                    DB::commit();
                    return redirect('admin/product/');
                }
                throw new \Exception('Invalid Product Information');
            }catch(\Exception $ex){
                DB::rollBack();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return back();
    }

    public function status($id)
    {
        $product = Product::find($id);
        Category::query()->Status($product);
        return back();
    }

    public function search(Request $request)
    {
        $products = Product::query()->SearchBy($request->search_key)->get();
        $search= $request->search_key; //we are using product index show on product search key there for condition is if search value have not show product heading
        return view('admin.product.index', compact('products','search'));
    }
}
