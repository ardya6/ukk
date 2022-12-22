<?php

namespace App\Http\Controllers;

use App\Models\Detail_ruangan;
use Illuminate\Http\Request;

class PropertylistController extends Controller
{
    public function index()
    {
      $detail_ruangans = Detail_ruangan::with(['kategori'])->get();
        return view('mainpage.propertylist',[
        'title'=>'list Page',
        'detail_ruangans' => $detail_ruangans
      ]);
    }

    public function detail()
    {
      $detail_ruangans = Detail_ruangan::with(['kategori'])->get();
        return view('mainpage.propertylist',[
        'title'=>'list Page',
        'detail_ruangans' => $detail_ruangans
      ]);
    }
}
