<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required',
            'email' => 'required',
            'subject' => 'required',
            'message'=>'required',
        ]);
        if($validated){
            try{
                DB::beginTransaction();
                $contactU = Contact::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'status'=> 0,
                ]);
                if (!empty($contactU)) {
                    DB::commit();
                    return redirect('http://localhost:8000/#home');
                }
                throw new \Exception('Invalid Contact Information');
            }catch(\Exception $ex){
                DB::rollBack();
            }
        }
    }

}
