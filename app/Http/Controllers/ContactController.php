<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){
        $Contact = Contact::latest()->get();
        return view('admin.contact.index', compact('Contact'));
    }

    public function contactDelete($id){
        $Delete = Contact::findOrFail($id)->delete();
        if($Delete){
            $notification = array(
                'message'   =>  'Contact deleted successfull:)',
                'alert-type'    =>  'success'
            );
            return redirect()->route('contact.us')->with($notification);
        }
    }

    public function contactShow($id){
        $Show = Contact::findOrFail($id);
        return view('admin.contact.show', compact('Show'));
    }
}
