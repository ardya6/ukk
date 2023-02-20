<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index() {
        return view('dashbord.component.laporan.laporan');
    }

    public function cetak(Request $request) {
        $data = $request->validate([
            'bulan' => 'required',
            'tahun' => 'required'
        ]);

        $bulans = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $checkouts = Checkout::whereMonth('created_at', $data['bulan'])->whereYear('created_at', $data['tahun'])->with(['user', 'detailruangan', 'fasilitases'])->get();

        // dd($checkouts);
        
        $data['bulan'] = $bulans[$data['bulan'] - 1];
        $pdf = Pdf::loadView('dashbord.component.laporan.checkout', compact('checkouts', 'data'));
        return $pdf->download('Laporan checkout.pdf');
    }
}