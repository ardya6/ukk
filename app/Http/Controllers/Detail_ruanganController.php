<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Detail_ruangan;
use App\Models\Detailrating;
use Illuminate\Http\Request;

class Detail_ruanganController extends Controller
{
    public function index($id){
        $detail_ruangan = Detail_ruangan::findOrFail($id);
        if(isset(auth()->user()->id)){
            $ratingUser =DetailRating::where('user_id',auth()->user()->id)->where('detailruangan_id',$detail_ruangan->id)->first();
        } else {
            $ratingUser = null;
        }
        $detailRating = Detailrating::where('detailruangan_id','=',$detail_ruangan->id)->get();
        if ($detailRating->count() == 0) {
            $detail_ruangan->rating = 0;
        } else {
            $rating =$detailRating->sum('rating') / $detailRating->count();
            $detail_ruangan->rating = $rating;
        }
        if(isset(auth()->user()->id)){
            $check = Checkout::where('detailruangan_id',$detail_ruangan->id)->first(); 
        } else {
            $check = null;
        }
        return view('mainpage.detail', [
            'detail_ruangan' => $detail_ruangan,
            'ratingUser' => $ratingUser,
            'check' => $check
        ]);
    }
}
