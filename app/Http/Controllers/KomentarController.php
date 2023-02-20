<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\komentar;

class KomentarController extends Controller
{
   public function simpanKomentar(Request $request)
   {
    $data = $request->validate([
        'komentar' => 'max:255'
    ]);
    
    $data['user_id'] = auth()->user()->id;

    if ($komentar = komentar::where('user_id', auth()->user()->id)->first()) {
        $komentar->update($data);
    } else {
        Komentar::create($data);
    }

    return back()->with('success', ' komentar berhasil ditambahkan');
   }

   public function komentarAdmin() {
    $komentars = komentar::with(['user'])->get();
    return view('dashbord.component.komentaruser.komentar',[
        "komentars" => $komentars,
    ]);
   }
}
