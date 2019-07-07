<?php

namespace App\Http\Controllers;
 
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
 
class ContactController extends Controller
{
    // public function create()
    // {
    //     return view('contact');
    // }
 
    public function store(ContactRequest $request)
    {
        Mail::to($_POST['firstname'])
            ->send(new Contact());
 
        //return view('confirm'); 
    }
}
