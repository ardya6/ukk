<?php

namespace App\Http\Controllers;
use App\Models\Detailrating;
use Illuminate\Http\Request;

class DetailRatingController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $rating = Detailrating::where('user_id',auth()->user()->id)->where('detailruangan_id',
        $request->detailruangan_id)->first();

        if ($rating !== null){
            $rating->update(['rating'=>$request->rating]);
            return back()->with('succes','rating berhasil disimpan!');
        } else {
            $rating = Detailrating::create([
                'user_id' => auth()->user()->id,
                'detailruangan_id'=>$request->detailruangan_id,
                'rating' => $request->rating
            ]);
            return back()->with('success','rating berhasil disimpan!');
        }
    }
}
