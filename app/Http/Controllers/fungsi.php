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
    private function kategori(){
        $this->data_kategori=Kategori::all();
        $this->user=Akumulasi::whereId_user(auth()->user()->id)->get();
        $this->hitung_user=Akumulasi::where('id_user','=',Auth::user()->id)->count();
    }
    function regis_calon(){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        $j=Kategori::all();
        return view('aplikasi.regis_calon',compact(['j','data_kategori','user','hitung']));
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

        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        $view=$id;
        $data=Calon::
        join('users', 'users.id', '=', 'calon.id_calon')
            ->join('kelas','kelas.id','=','users.id_kelas')
            ->join('kategori','kategori.id','=','calon.id_kategori')
            ->select('kategori.*','users.*','kelas.*','calon.*')
            ->where('calon.id_kategori','=',$id)
            ->where('calon.status','=','2')
            ->get();
//        dd($data);
        $wakil=Calon::
        join('users','users.id','=','calon.id_wakil')
            ->join('kelas','kelas.id','=','users.id_kelas')
            ->join('kategori','kategori.id','=','calon.id_kategori')

            ->select('users.name','users.nis','kelas.*', 'calon.*')
            ->where('calon.status','=','2','and','calon.id','=',$id)
            ->get();

            
                if($hitung>0){

                $no=0 ;
                    foreach($user as $use){
                        if($use->id_kategori==$id){
                             return redirect('/home');
                        }
                        else{
                        $no++;
                            if($no==$hitung){
                                return view('aplikasi.voting',compact(['view','data','data_kategori','wakil','user','hitung']));

                            }
                        }
                    }
                }else{
                    return view('aplikasi.voting',compact(['view','data','data_kategori','wakil','user','hitung']));
                }
            





         

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

    function info_calon($id){


        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        $data=Calon::
        join('users', 'users.id', '=', 'calon.id_calon')
            ->join('kelas','kelas.id','=','users.id_kelas')
            ->join('kategori','kategori.id','=','calon.id_kategori')
            ->select('kategori.*','users.*','kelas.*','calon.*')
            ->where('calon.id','=',$id)
            ->first();
//       dd($data);
        $wakil=Calon::
        join('users','users.id','=','calon.id_wakil')
            ->join('kelas','kelas.id','=','users.id_kelas')
            ->join('kategori','kategori.id','=','calon.id_kategori')

            ->select('users.name','users.nis','kelas.*', 'calon.*')
            ->where('calon.id','=',$id)
            ->first();
//        dd($wakil);
        return view('aplikasi.info_calon',compact(['data_kategori','user','wakil','hitung','data']));

    }
    function profil($id){
        $kelas=Kelas::all();
        $data_user = User::join('kelas','kelas.id','=','users.id_kelas')
            ->select('kelas.angkatan','kelas.nama_kelas','users.*')
            ->where('users.id','=',$id)->first();
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;

        return view('aplikasi.profil',compact(['data_kategori','user','kelas','data_user','hitung']));


    }
    function update_profile(request $request,$id){


        $data=User::whereId($id);
        $data->update($request->except(['_token']));
        return redirect("/profile/$id");
    }
    function akumulasi($id){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        $view=$id;

        $hitung_akumulasi=Akumulasi::where('id-calon','=',$id);
        $data=Calon::
        join('users', 'users.id', '=', 'calon.id_calon')
            ->join('kelas','kelas.id','=','users.id_kelas')
            ->join('kategori','kategori.id','=','calon.id_kategori')
            ->select('kategori.*','users.*','kelas.*','calon.*')
            ->where('calon.id_kategori','=',$id)
            ->where('calon.status','=','2')
            ->get();
//        dd($data);
        $wakil=Calon::
        join('users','users.id','=','calon.id_wakil')
            ->join('kelas','kelas.id','=','users.id_kelas')
            ->join('kategori','kategori.id','=','calon.id_kategori')

            ->select('users.name','users.nis','kelas.*', 'calon.*')
            ->where('calon.status','=','2','and','calon.id_kategori','=',$id)
            ->get();
        return view('aplikasi.voting',compact(['view','data','data_kategori','wakil','user','hitung']));

    }





}
