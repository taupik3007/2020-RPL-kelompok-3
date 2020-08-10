<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

use App\User;

use App\Kelas;

use App\Calon;

use App\wakil;
class fungsi extends Controller
{
    function regis_calon(){
        $j=Kategori::all();
        return view('aplikasi.regis_calon',compact('j'));
    }

    function aksi_calon(request $request){


        $nis_wkl= $request->input('nis');
        $id_ketu=$request->input('id');
        $visi=$request->input('visi');
        $misi=$request->input('misi');
        $kategori=$request->input('kategori');
        $panggil=User::whereNis($nis_wkl)->first();
        if($panggil) {


            $calon = new Calon();
            $calon->id_calon = $id_ketu;
            $calon->visi = $visi;
            $calon->misi = $misi;
            $calon->kategori = $kategori;
            $calon->status = 1;
            $calon->save();
            $wakil=new wakil();
            $wakil->nis=$nis_wkl;
            $wakil->save();
            return redirect('home');
        }else{
            echo "maaf";
        }







       }





}
