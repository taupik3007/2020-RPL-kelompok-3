<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Kelas;
use App\Akumulasi;
use App\Kategori;

class registrasi extends Controller
{
    function tampil(){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $j=Kelas::all();
        return view('aplikasi.register',compact('j','f'),['gararetek2'=>$gararetek2]);
    }
    function create(request $request){
        $this->validate($request,[
            'nis'=>['required','min:3','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $woy=$request->input('name');
        $pass=$request->input('password');

        $nis=$request->input('nis');
        $email=$request->input('email');
        $level=$request->input('level');
        $data=new user();
        $data->nis = $nis;
        $data->name = $woy;
        $data->email = $email;
        $data->id_kelas=$request->input('kelas');

        $data->password = BCRYPT($pass);
        $data->level=$level;
        $data->save();
        return redirect('data-user')->with('sukses','data berhasil ditambah');
    }
}
