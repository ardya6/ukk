<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
  public function index()
  {
    return view('mainpage.profile');

  } 
  
  public function update(Request $request)
  {
    //return $request;
    $validateData = $request->validate([
        'name' => 'required|max:255',
        'notelp'=>'required|numeric',
        'email' =>[
            'required',
            'email',
            Rule::unique('users')->ignore(auth()->user()->id,'id')
        ],
        'fotoprofil' => 'nullable|image|max:2048'
    ]);
    if (!isset($validateData['fotoprofil'])){
        $validateData['fotoprofil']= auth()->user()->fotoprofil;
    } else{
        $validateData['fotoprofil'] = $request->fotoprofil->store('fotoProfil','public');
    }
    //return 'tes';

    user::where('id',auth()->user()->id)->update($validateData);

    return back()->with('berhasil','profil telah diupdate');
  }
}
