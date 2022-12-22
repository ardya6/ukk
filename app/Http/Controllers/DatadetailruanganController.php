<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail_ruangan;
use App\models\kategori;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class   DatadetailruanganController extends Controller
{
   /**
    * Display a listting of the resources.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $detail_ruangans = Detail_ruangan::with(['kategori'])->latest()->get();
        return view('dashbord.component.Datadetailruangan.index',[
            'detail_ruangans'=>$detail_ruangans
        ]);
    }
    /**
     * show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $detail_ruangans = Detail_ruangan::all();
       $kategoris = Kategori::all();

        return view('dashbord.component.Datadetailruangan.create',[
            'detail_ruangans'=>$detail_ruangans,
            'kategoris'=>$kategoris

        ]);
    }
    /**
     * store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'foto'=>'required|image',
            'harga'=>'required',
            'nama'=>'required',
            'alamat'=>'required',
            'kapasitas'=>'required',
            'fasilitas'=>'required',
            'luas'=>'required',
            'kategori_id'=>'required',
            'deskripsi' =>'required'        
        ]);
        if ($request ->file('foto')){
            $validateData['foto'] = $request->file('foto')->store('foto','public');
        }
        Detail_ruangan::create($validateData);
        return redirect('/data-detail_ruangan')->with('berhasil','data detail ruangan baru telah dibuat!');

    }
    /**
     * Display the specified resource.
     * 
     * @param int $id
     *  @return\Illuminate\Http\Response    
     * */
    public function show($id)
    {
        //
    }

    /**
     * show the form for editing the specified resource.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     * 
     *
     */
    public function edit($id)
    {
        $detail_ruangan = Detail_ruangan::find($id);
        $kategoris = Kategori::get();
        return view('dashbord.component.Datadetailruangan.edit',[
            'kategoris'=>$kategoris,
            'detail_ruangan'=>$detail_ruangan
        ]);
    }
    /**
     * update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validateData = $request->validate([
            'foto'=>'image|file|max:2056',
            'harga'=>'required',
            'nama'=>'required',
            'alamat'=>'required',
            'kapasitas'=>'required',
            'fasilitas'=>'required',
            'luas'=>'required',
            'kategori_id'=>'required',
            'deskripsi' => 'required'
        ]);
        if($request->file('foto')){
            $validateData['foto'] = $request->file('foto')->store('foto', 'public');
        }
        Detail_ruangan::find($id)->update($validateData);

        return redirect('/data-detail_ruangan')->with('berhasil','data detail ruangan telah diubah!');

    }
    /**
     * remove the specified resource from the storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Detail_ruangan = Detail_ruangan::find($id);
        $Detail_ruangan->delete();
        return redirect('/data-detail_ruangan');
    }
}
