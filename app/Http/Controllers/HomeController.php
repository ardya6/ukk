<?php

namespace App\Http\Controllers;

use App\Models\Detail_ruangan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::get();
        $detail_ruangans = Detail_ruangan::get();
        return view('mainpage.index',[
            'kategoris'=>$kategoris,
            'detail_ruangans'=>$detail_ruangans
        ]);
    }
}
