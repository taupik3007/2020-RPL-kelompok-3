<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

use App\User;

use App\Kelas;

use App\Calon;

use App\wakil;



use App\Akumulasi;
use Illuminate\Support\Facades\Auth;

class fungsi extends Controller
{
    function regis_calon(){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $j=Kategori::all();
        return view('aplikasi.regis_calon',compact('j','f'),['gararetek2'=>$gararetek2]);
    }

    function aksi_calon(request $request){


        $nis_wkl= $request->input('nis');
        $id_ketu=$request->input('id');
        $visi=$request->input('visi');
        $misi=$request->input('misi');
        $wakil = User::whereNis($nis_wkl)->first();




        $kategori=$request->input('kategori');

        if($wakil) {
            $id_wkl=$wakil->id;

            $calon = new Calon();
            $calon->id_calon = $id_ketu;
            $calon->id_wakil=$id_wkl;
            $calon->visi = $visi;
            $calon->misi = $misi;
            $calon->id_kategori = $kategori;
            $calon->status = 1;
            $calon->save();
            return redirect('regis-calon');

        }else{
            return redirect('regis-calon')->with('gagal','nis wakill yang anda inputkan tidak ada di dalam data');
        }







       }
    function voting($id){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $data=Calon::
        join('users', 'users.id', '=', 'calon.id_calon')
            ->join('kelas','kelas.id','=','users.id_kelas')
            ->join('kategori','kategori.id','=','calon.id_kategori')
            ->select('kategori.*','users.*','kelas.*','calon.*')
            ->where('calon.id_kategori','=',$id,'and','calon.status','=','2')
            ->get();
//        dd($data);
        $wakil=Calon::
        join('users','users.id','=','calon.id_wakil')
            ->join('kelas','kelas.id','=','users.id_kelas')
            ->join('kategori','kategori.id','=','calon.id_kategori')

            ->select('users.name','users.nis','kelas.*', 'calon.*')
            ->where('calon.status','=','2','and','calon.id','=','$id')
            ->get();
        return view('aplikasi.voting',compact('data','f','wakil'),['gararetek2'=>$gararetek2]);
    }
    function pilih(request $request){
//        dd($request);
        $id_calon=$request->id;
        $akumulasi=new Akumulasi();
        $akumulasi->id_user=Auth()->user()->id;
        $akumulasi->id_calon=$id_calon;
        $akumulasi->id_kategori=$request->kategori;
        $akumulasi->save();
        return redirect('/home');
    }





}
