<?php

namespace App\Http\Controllers;

use App\Models\Detail_ruangan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class PropertylistController extends Controller
{
    // public function index($id)
    // {
    //   $kategori = Kategori::where('id', $id)->first();
    //   $detail_ruangan = Detail_ruangan::where('kategori_id', $id)->get();
    //   $detail_ruangans = Detail_ruangan::with(['kategori'])->get();
    //     return view('mainpage.propertylist',[
    //     'title'=>'list Page',
    //     'detail_ruangans' => $detail_ruangans,
    //     'detail_ruangans' => $detail_ruangan,
    //     'kategori' => $kategori
    //   ]);
    // }

    public function index(Request $request, $id)
    {
      $kategori = Kategori::get();
      $detail_ruangans = Detail_ruangan::where('kategori_id', $id)->get();
      $detail_ruangan = Detail_ruangan::where('kategori_id')->get();

        return view('mainpage.listdetail',[
        'title'=>'list Page',
        'detail_ruangans' => $detail_ruangans,
        'detail_ruangan' => $detail_ruangan,
        'kategori' => $kategori
      ]);
    }

    public function list(){
      $kategori = Kategori::get();
      $detail_ruangan = Detail_ruangan::get();

          return view('mainpage.list', [
            'title' => 'List',
            'kategori' => $kategori,
            'detail_ruangan' => $detail_ruangan
          ]);
    }
}

