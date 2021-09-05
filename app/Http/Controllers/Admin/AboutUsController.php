<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function create()
    {
        $about = About::find(1);
        return view('admin.websetting.about_create',compact('about'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'=>'required',
            'description' => 'required',
        ]);

        if($validated){
            try{
                $about = About::find($id);
                DB::beginTransaction();
                $aboutU = $about->update([
                    'title' => $request->title,
                    'description' => $request->description,
                ]);
                if (!empty($aboutU)) {
                    DB::commit();
                    return redirect('admin/about/create');
                }
                throw new \Exception('Invalid About Information');
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
        //
    }
}
