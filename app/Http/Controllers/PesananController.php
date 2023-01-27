<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Detail_ruangan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::where('user_id',auth()->user()->id)->with(['user','detailruangan','fasilitases'])->get();
        return view('mainpage.pesanan',[
            'checkouts'=>$checkouts,
        ]);
    }
    public function checkout_detail(Checkout $checkout)
    {
        $checkout = Checkout::where('id',$checkout->id)->with(['user','detailruangan','fasilitases'])->first();
        return view('mainpage.checkout_detail',[

        ]);
    }
  
   
    public function belumDibayar()
    {
        $checkouts = Checkout::where('payment_status','1')->latest()->get();
        return view('dashboard.component.pesananStatus.belumDibayar',[
            'checkouts' =>$checkouts
        ]);
    }
    public function menungguKonfirmasi()
    {
        $checkouts = Checkout::where('status','1')->latest()->get();
    return view ('dashbord.component.pesananStatus.menunggu',[
        'checkouts' => $checkouts
    ]);
    }
    public function dijadwalkan()
    {
        $checkouts = Checkout::where('status','2')->latest()->get();
    return view ('dashbord.component.pesananStatus.dijadwalkan',[
        'checkouts' => $checkouts
    ]);
    }

    public function sedangDigunakan()
    {
        $checkouts = Checkout::where('status','3')->latest()->get();
        return view('dashboard.component.pesananStatus.sedangDigunakan',[
            'checkouts' =>$checkouts
        ]);
    }
    public function selesai()
    {
        $checkouts = Checkout::withTrashed()->where('status','4')->latest()->get();
        return view('dashboard.component.pesananStatus.selesai',[
            'checkouts' =>$checkouts
        ]);
    }
    public function batal()
    {
        $checkouts = Checkout::withTrashed()->where('status','5')->latest()->get();
        return view('dashboard.component.pesananStatus.batal',[
            'checkouts' =>$checkouts
        ]);
    }
    public function detailPesananAdmin(Checkout $checkout)
    {
        $checkouts = Checkout::where('id',$checkout->id)->with(['user','detailruangan','fasilitases']);
        return view('dashboard.component.pesananAdmin.detaipesanan',[
            'checkouts' =>$checkouts
        ]);
    }

    public function changeStatus(Request $request,Checkout $checkout)
    {
        $checkout = Checkout::where('id',$checkout->id)->first();

        $checkout = Checkout::where('id',$checkout->id)->first();

        if ($request->action == 'batal'){
            $checkout->update([
                'status'=>'5',
            ]);
            return back()->with('success','pesanan berhasil dibatalkan');
        }else if ($request->action == 'selesai') {
            $checkout->update([
                'status'=>'4',
            ]);
            return back()->with('success','pesanan telah selesai');
        }else if ($request->action == 'hapus'){
            $checkout->delete();
            return back()->with('success','pesanan berhasil dihapus');
        }else if ($request->action == 'konfirmasi') {
            $checkout->update([
                'status'=>'2',
            ]);
            return back()->with('success','pesanan berhasil dikonfirmasi');
        }else if ($request->action =='jadwal'){
            $checkout->update([
                'status'=>'3',
            ]);
            return back()->with('success','pesanan berhasil dijadwalkan');
        }
    }
}
