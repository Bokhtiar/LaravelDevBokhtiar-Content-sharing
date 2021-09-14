<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.createOrUpdate');
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
            'name' => 'required|max:150',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        if($validated){
            try{
                DB::beginTransaction();
                $blogU = Blog::create([
                    'name' => $request->name,
                    'short_description'=> $request->short_description,
                    'description' => $request->description,
                ]);
                if (!empty($blogU)) {
                    DB::commit();
                    Session::flash('insert','ADDED Sucessfully...');
                    return redirect('admin/blog/');
                }
                throw new \Exception('Invalid blog Information');
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
        $blog = Blog::find($id);
        return view('admin.blog.createOrUpdate', compact('blog'));
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
            'name' => 'required|max:150',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        if($validated){
            try{
                $blog = Blog::find($id);
                DB::beginTransaction();
                $blogU = $blog->update([
                    'name' => $request->name,
                    'short_description'=> $request->short_description,
                    'description' => $request->description,
                ]);
                if (!empty($blogU)) {
                    DB::commit();
                    Session::flash('update','update Sucessfully...');
                    return redirect('admin/blog/');
                }
                throw new \Exception('Invalid blog Information');
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
        Blog::find($id)->delete();
        Session::flash('delete','delete Sucessfully...');
        return back();
    }

    public function status($id)
    {
        $blog = Blog::find($id);
        Blog::query()->Status($blog)->first;
        Session::flash('Active','Status Update Successfully...');
        return back();
    }
}
