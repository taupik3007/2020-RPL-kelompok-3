<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

use App\User;

use App\Kelas;

use App\Calon;

use App\wakil;



use App\Akumulasi;
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
            $jj=$wakil->name;
            $kelas=$wakil->kelas;

            $calon = new Calon();
            $calon->id_calon = $id_ketu;
            $calon->nis_wakil=$nis_wkl;
            $calon->nama_wakil=$jj;
            $calon->kelas_wakil=$kelas;
            $calon->visi = $visi;
            $calon->misi = $misi;
            $calon->kategori = $kategori;
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
            ->select('users.*', 'calon.*')
            ->where('calon.status','=','2','AND','calon.kategori','=',$id)
            ->get();
        return view('aplikasi.voting',compact('data','f'),['gararetek2'=>$gararetek2]);
    }





}
