<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Privacy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PrivacyController extends Controller
{
    public function create()
    {
        $privacy = Privacy::find(1);
        return view('admin.websetting.privacy_create',compact('privacy'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'=>'required',
            'description' => 'required',
        ]);

        if($validated){
            try{
                $privacy = Privacy::find($id);
                DB::beginTransaction();
                $privacyU = $privacy->update([
                    'title' => $request->title,
                    'description' => $request->description,
                ]);
                if (!empty($privacyU)) {
                    DB::commit();
                    Session::flash('update','Updated Sucessfully...');
                    return redirect('admin/privacy/create');
                }
                throw new \Exception('Invalid About Information');
            }catch(\Exception $ex){
                DB::rollBack();
            }
        }
    }
}
