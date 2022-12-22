<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertytypeController extends Controller
{
    public function index()
    {
        return view('mainpage.propertytype',[
        'title'=>'type Page',
      ]);
    }
}
