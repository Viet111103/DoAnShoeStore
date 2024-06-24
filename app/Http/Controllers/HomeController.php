<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function Textmail(){
        $name = "Viet";
        Mail::send('pages.textemail', compact('name'), function($email) use($name){
            $email->to('quocviet111103@gmail.com', $name );
        });
    }
}
