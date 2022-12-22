<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Detail_ruangan;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    /**
     * display
     * @return\Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::get();
        return view('dashbord.component.kategori.index',[
            'kategoris'=>$kategoris
        ]);
    }
    /**
     * 
     * @return\Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashbord.component.kategori.create');
    }
    /**
     * 
     * @param \Illuminate\Http\Request $request
     * @return\Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $validateData = $request->validate([
            'nama'=>'required|max:255',
        ]);
        Kategori::create($validateData);
        return redirect('/data-kategori')->with('berhasil','kategori baru telah dibuat');
        }
        /**
         * @param int $id@return\Illuminate\Http\Response
         */
        public function show($id)
        {

        }
         /**
         * 
         * @param int $id
         *  @return \Illuminate\Http\Response
         */
        public function edit ($id)
        {
            $kategoris=Kategori::findOrfail($id);
            return view ('dashbord.component.kategori.edit',[
                'kategori'=>$kategoris
            ]);
        }

        /**
         * @param \Illuminate\Http\Request
         * @param int $id
         *  @return \Illuminate\Http\Response
         */
        public function update (Request $request,$id)
        {
            $rules = [
                'nama'=> 'required|max:255',
            ];
            $validateData=$request->validate($rules);
            Kategori::where ('id',$id)->update($validateData);
            return redirect('/data-kategori')->with('berhasil','kategori tlh diubah!');

        }
        /**
         * 
         * @param int $id
         *  @return \Illuminate\Http\Response
         */

        public function destroy($id)
        {
            Kategori::destroy($id);
            return redirect('/data-kategori')->with('berhasil','kategori tlh dihapus');

        }

        public function list(Kategori $kategori)
    {
        $kategori = Kategori::findOrFail($kategori->id);
        $detail_ruangans = Detail_ruangan::where('kategori_id', $kategori->id)->get();
        return view('dashbord.component.kategori.list', [
            'Detail_ruangan' => $detail_ruangans,
            'kategori' => $kategori
        ]);
    }


}