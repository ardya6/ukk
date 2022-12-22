<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyagentController extends Controller
{
    public function index()
    {
        return view('mainpage.propertyagent',[
        'title'=>'agent Page',
      ]);
    }
}
