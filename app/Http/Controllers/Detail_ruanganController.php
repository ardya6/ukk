<?php

namespace App\Http\Controllers;

use App\Models\Detail_ruangan;
use Illuminate\Http\Request;

class Detail_ruanganController extends Controller
{
    public function index($id){
        $detail_ruangan = Detail_ruangan::findOrFail($id);
        return view('mainpage.detail', [
            'detail_ruangan' => $detail_ruangan
        ]);
    }
}
