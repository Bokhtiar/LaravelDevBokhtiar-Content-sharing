<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get(['id','name']);
        $subcategories = SubCategory::get(['id','name','category_id','status']);
        return view('admin.subcategory.index', compact('categories','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $subcat = SubCategory::find($id);
        Category::query()->Status($subcat);
        Session::flash('Active','Status Update Successfully...');
        return back();
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
            'name' => 'required|max:25',
        ]);

        if($validated){
            try{
                DB::beginTransaction();
                $subcategory = SubCategory::create([
                    'name' => $request->name,
                    'category_id' => $request->categroy_id,
                    'status' => $request->status
                ]);
                if (!empty($subcategory)) {
                    DB::commit();
                    Session::flash('insert','Added Sucessfully...');
                    return redirect('admin/sub-category');
                }
                throw new \Exception('Invalid Category Information');
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
        $categories = Category::get(['id','name']);
        $subcat = SubCategory::find($id);
        $subcategories = SubCategory::get(['id','name','category_id','status']);
        return view('admin.subcategory.index', compact('categories','subcat','subcategories'));
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
        $sub = SubCategory::find($id);
        $sub->name = $request->name;
        $sub->category_id = $request->categroy_id;
        $sub->status = $request->status;
        $sub->save();
        Session::flash('update','Added Sucessfully...');

        $categories = Category::get(['id','name']);
        $subcategories = SubCategory::get(['id','name','category_id','status']);
        return view('admin.subcategory.index', compact('categories','subcategories'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubCategory::find($id)->delete();
        Session::flash('delete','delete Sucessfully...');
        return back();
    }
}
