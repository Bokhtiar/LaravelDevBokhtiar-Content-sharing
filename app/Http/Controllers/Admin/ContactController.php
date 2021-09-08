<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index', compact('contacts'));
    }

    public function status($id)
    {
        $contact = Contact::find($id);
        Contact::query()->Status($contact);
        Session::flash('Active','Status Update Successfully...');
        return back();
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        Session::flash('delete','delete Sucessfully...');
        return back();
    }
}
