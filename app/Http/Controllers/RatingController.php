<?php

namespace App\Http\Controllers;

use App\Models\Detail_ruangan;
use App\Models\Detailrating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
  public function index()
  {
    $detailruangan = Detailrating::with(['user','detailruangan'])->get();
    return view('dashbord.component.ratingUser.rating',[
        "detailruangan" => $detailruangan,
    ]);
  }
}
