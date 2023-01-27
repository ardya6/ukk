<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\CheckoutFasilitas;
use App\Models\Detail_ruangan;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Uuid;
use App\Services\Midtrans\CreateSnapTokenService;

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
        $cek = Checkout::whereDate('tanggal_booking', '<=', $data['tanggal_booking'])->whereDate('selesai_booking', '>=', $data['tanggal_booking'])->first();
        if ($cek) {
            return redirect()->back()->withErrors([
                'unavailable' => 'Ruangan untuk tangggal ' . $data['tanggal_booking'] . ' sedang disewa'
            ]);
        }

        $data['user_id'] = auth()->user()->id;
        $data['detailruangan_id'] = $id;
        $data['selesai_booking'] = $selesai_booking;
        $data['total_harga'] = $ruangan->harga * $data['durasi_sewa'];
        $data['order'] = Uuid::uuid4()->toString();

        if (isset($data['fasilitas_id'])) {
            foreach ($data['fasilitas_id'] as $fasilitas_id) {
                $fasilita = Fasilitas::find($fasilitas_id);
                $data['total_harga'] += $fasilita->harga * $data['durasi_sewa'];
            }
        }
        $checkout = Checkout::create($data);

        if (isset($data['fasilitas_id'])) {
            foreach ($data['fasilitas_id'] as $fasilitas) {
                CheckoutFasilitas::create([
                    'checkout_id' => $checkout->id,
                    'fasilitas_id' => $fasilitas    
                ]);
            }
        }

        return redirect("/checkout/$checkout->id/detail");
    }

    public function detail($id) {
        $checkout = Checkout::with(['fasilitases', 'detailruangan'])->where('id', $id)->first();
        if (!isset($checkout->snap_token)) {
            $midtrans = new CreateSnapTokenService($checkout);
            $snapToken = $midtrans->getSnapToken();

            $checkout->snap_token = $snapToken;
            $checkout->save();
        }

        return view('mainpage.checkout_detail', compact('checkout'));
    }

    public function detailAdmin($id) {
        $checkout = Checkout::with(['fasilitases', 'detailruangan'])->where('id', $id)->first();    

        return view('dashbord.component.pesanandetail.pesanandetail', compact('checkout'));
    }

    public function belum_dibayar() {
        $checkouts = Checkout::where('status_pembayaran', 'Belum Dibayar')->get();
        return view('dashbord.component.statuspesanan.belumDibayar', compact('checkouts'));
    }

    public function pembayaran_berhasil() {
        $checkouts = Checkout::where('status_pembayaran', 'Pembayaran Berhasil')->get();
        return view('dashbord.component.statuspesanan.pembayaranBerhasil', compact('checkouts'));
    }

    public function pembayaran_gagal() {
        $checkouts = Checkout::where('status_pembayaran', 'Pembayaran Gagal')->get();
        return view('dashbord.component.statuspesanan.pembayaranGagal', compact('checkouts'));
    }
}
