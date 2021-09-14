<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsOfService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class TermsOfServiceController extends Controller
{
    public function create()
    {
        $terms = TermsOfService::find(1);
        return view('admin.websetting.termsOfService',compact('terms'));
    }

    public function update(Request $request, $id)
    {
        $terms = TermsOfService::find($id);
        $terms->title = $request->title;
        $terms->description = $request->description;
        $terms->save();
        Session::flash('update','Updated Sucessfully...');
        return back();
    }
}
