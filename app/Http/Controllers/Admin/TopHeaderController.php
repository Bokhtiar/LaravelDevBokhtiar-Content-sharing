<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TopHeaders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopHeaderController extends Controller
{
    public function create()
    {
        $topheader = TopHeaders::find(1);
        return view('admin.websetting.topheader_create',compact('topheader'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validat
            'website_name'=>'required',
            'email' => 'required',
            'phone' => 'required',
            'time' => 'required',
        ]);

        if($validated){
            try{
                $category = TopHeaders::find($id);
                DB::beginTransaction();
                $category = $category->update([
                    'website_name' => $request->website_name,
                    'email' => $request->email,
                    'phone'=> $request->phone,
                    'time' => $request->time,
                ]);
                if (!empty($category)) {
                    DB::commit();
                    return redirect('admin/topheader/create');
                }
                throw new \Exception('Invalid Top Header Information');
            }catch(\Exception $ex){
                DB::rollBack();
            }
        }
    }

}
