<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

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
        return back();
    }

    public function destroy($id)
    {
        Contact::find($id)->delete();
        return back();
    }
}
