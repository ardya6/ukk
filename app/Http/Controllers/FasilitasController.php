<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\fasilitas;
class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = fasilitas::get();
        return view('dashbord.component.fasilitas.index',[
            'fasilitas'=>$fasilitas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashbord.component.fasilitas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_fasilitas'=>'required|max:255',
            'harga'=>'required',
        ]);
        fasilitas::create($validateData);
        return redirect('/data-fasilitas')->with('berhasil','kategori baru telah dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas=fasilitas::findOrfail($id);
        return view ('dashbord.component.fasilitas.edit',[
            'fasilitas'=>$fasilitas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'nama_fasilitas'=> 'required|max:255',
            'harga'=>'required',
        ];
        $validateData=$request->validate($rules);
        fasilitas::where ('id',$id)->update($validateData);
        return redirect('/data-fasilitas')->with('berhasil','kategori tlh diubah!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        fasilitas::destroy($id);
        return redirect('/data-fasilitas')->with('berhasil','kategori tlh dihapus');
    }

 
}
