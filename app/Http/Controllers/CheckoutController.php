<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutFasilitas;
use App\Models\Detail_ruangan;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CheckoutController extends Controller
{
    public function index($id) {
        $detail_ruangan = Detail_ruangan::findOrFail($id);
        $fasilitases = Fasilitas::get();
        return view('mainpage.checkout', compact('detail_ruangan', 'fasilitases'));
    }

    public function sewa(Request $request, $id) {
        $data = $request->validate([
            'nama_acara' => 'required',
            'tanggal_booking' => 'required',
            'durasi_sewa' => 'required',
            'fasilitas_id' => 'array'
        ]);

        $ruangan = Detail_ruangan::find($id);
        $selesai_booking = Carbon::parse($data['tanggal_booking'])->addDays($data['durasi_sewa']);
        $cek = Checkout::whereDate('tanggal_booking', '>', $data['tanggal_booking'])->whereDate('selesai_booking', '<', $selesai_booking)->first();
        if ($cek) {
            return redirect()->back()->withErrors([
                'error' => 'Ruangan untuk tangggal ' . $data['tanggal_booking'] . ' sedang disewa'
            ]);
        }

        $data['user_id'] = auth()->user()->id;
        $data['detailruangan_id'] = $id;
        $data['selesai_booking'] = $selesai_booking;
        $data['total_harga'] = $ruangan->harga;
        foreach ($data['fasilitas_id'] as $fasilitas_id) {
            $fasilita = Fasilitas::find($fasilitas_id);
            $data['total_harga'] += $fasilita->harga;
        }
        $checkout = Checkout::create($data);

        foreach ($data['fasilitas_id'] as $fasilitas) {
            CheckoutFasilitas::create([
                'checkout_id' => $checkout->id,
                'fasilitas_id' => $fasilitas    
            ]);
        }

        return redirect("/checkout/$checkout->id/detail");
    }

    public function detail($id) {
        $checkout = Checkout::with(['fasilitases', 'detailruangan'])->where('id', $id)->first();

        return view('mainpage.checkout_detail', compact('checkout'));
    }
}
