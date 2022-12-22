<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevieController extends Controller
{public function index()
    {
        return view('mainpage.review',[
        'title'=>'review',
      ]);
    }
}
