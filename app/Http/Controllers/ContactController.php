<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('mainpage.contact',[
        'title'=>'contact Page',
      ]);
    }
}
