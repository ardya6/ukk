<?php

namespace App\Http\Controllers;

use App\Models\Detail_ruangan;
use App\Models\Kategori;
use App\Models\komentar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::get();
        $detail_ruangans = Detail_ruangan::paginate(6);
        $Komentar = komentar::get();
        @$komentarUser = komentar::where('user_id', auth()->user()->id)->first();
        return view('mainpage.index',[
            'kategoris'=>$kategoris,
            'detail_ruangans'=>$detail_ruangans,
            'Komentar' => $Komentar,
            'komentarUser' => $komentarUser
        ]);
    }
}
