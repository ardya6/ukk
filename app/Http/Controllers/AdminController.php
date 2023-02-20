<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Detail_ruangan;
use App\Models\Fasilitas;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index()
   {
      $ruangan = Detail_ruangan::count();
      $kategori = Kategori::count();
      $fasilitas = Fasilitas::count();
      $pesanan = Checkout::count();
      $users = User::get();
    return view('dashbord.component.admin', compact('ruangan', 'kategori', 'fasilitas', 'pesanan','users'));
   }
}
