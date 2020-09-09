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
        $data_kategori=Kategori::all();
        $user=Akumulasi::whereId_user(auth()->user()->id)->get();
        $hitung_user=Akumulasi::whereId_user(auth()->user()->id)->count();
        $j=Kelas::all();
        return view('aplikasi.register',compact('j','data_kategori','user'),['hitung'=>$hitung_user]);
    }
    function create(request $request){
        $this->validate($request,[
            'nis'=>['required','min:3','unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

        ]);
        $woy=$request->input('name');


        $nis=$request->input('nis');
        $email=$request->input('email');
        $level=$request->input('level');
        $data=new user();
        $data->nis = $nis;
        $data->name = $woy;
        $data->email = $email;
        $data->id_kelas=$request->input('kelas');

        $data->password = BCRYPT('12345678');
        $data->level=$level;
        $data->save();
        return redirect('data-user')->with('sukses','data berhasil ditambah');
    }
}
