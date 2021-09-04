<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::index(['id', 'name', 'color', 'description']);
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.createOrUpdate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:25',
            'color' => 'required',
        ]);

        if($validated){
            try{
                DB::beginTransaction();
                $category = Category::create([
                    'name' => $request->name,
                    'color'=> $request->color,
                    'description' => $request->description,
                ]);
                if (!empty($category)) {
                    DB::commit();
                    return redirect('admin/category/');
                }
                throw new \Exception('Invalid Category Information');
            }catch(\Exception $ex){
                DB::rollBack();
            }
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.category.createOrUpdate', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|max:25',
            'color' => 'required',
        ]);

        if($validated){
            try{
                $category = Category::find($id);
                DB::beginTransaction();
                $category = $category->update([
                    'name' => $request->name,
                    'color'=> $request->color,
                    'description' => $request->description,
                ]);
                if (!empty($category)) {
                    DB::commit();
                    return redirect('admin/category/');
                }
                throw new \Exception('Invalid Category Information');
            }catch(\Exception $ex){
                DB::rollBack();
            }
        }
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return back();
    }

    public function search($text)
    {
        $category = Category::query()->SearchBy($text)->get();
        return response()->json($category, 200);
    }

    public function status($id)
    {
        $cat = Category::find($id);
        Category::query()->Status($cat);
        return back();
    }
}
