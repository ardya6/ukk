<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{ public function index()
    {
   return view('register.index',[
    'title' => 'Register Page',
   ]);
    }
    public function register (Request $request)
    {
        $validasi = $request ->validate([
            'name' => 'required|max:225',
            'email'=> 'required|email|unique:users,email',
            'password'=>'required|min:5'
        ]);
        $validasi['password'] = Hash::make($validasi['password']);
        User::create($validasi);
        return redirect ('/login')->with('berhasil','regristasi berhasil,silahkan login!');

    }
}


