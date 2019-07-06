<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class testController2 extends Controller
{

   

    public function test(){

        Mail::to('phil.roux93@gmail.com')
            ->send(new Contact());

        return view('emailtest2');
            
    }
}
