<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Kelas;

use App\Calon;

use App\Kategori;

use App\Akumulasi;

use Auth;

class admin extends Controller
{
    public function __construct(){

    }
    function data_user(){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $data= User::all();
        return view('admin.data_siswa' ,compact('data','f'),['gararetek2'=>$gararetek2]);

    }

    function hapus_user($id){
        $data=User::whereId($id);
        $data->delete($data);
        return redirect('data-user');
    }
    function update_user($id){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $data=User::whereId($id)->first();
        return view('admin.update_user',compact('f'),['data'=>$data,'gararetek2'=>$gararetek2]);
    }

    function aksi_update(request $request,$id){
        $data=User::whereId($id);
        $data->update($request->except(['_token']));
        return redirect('data-user');
    }

    function tambah_kelas(){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        return view('admin.tambah_kelas',compact('f'),['gararetek2'=>$gararetek2]);

    }
    function aksi_kelas(request $request){
        Kelas::create($request->all());
        return redirect('data-kelas');
    }

    function tambah_kategori(){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);

        return view('admin.tambah_kategori',compact('f'),['gararetek2'=>$gararetek2]);
    }


    function aksi_kategori(request $request){
        Kategori::create($request->all());
        return redirect('data-kategori');
    }

    function data_pencalon(){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $users = Calon::
            join('users', 'users.id', '=', 'calon.id_calon')
            ->select('users.*', 'calon.*')
            ->where('calon.status','=','1')
            ->get();

        return view('admin.data_pencalon',compact('users','f'),['gararetek2'=>$gararetek2]);

    }
    function terima_calon($id){
        $user=Calon::whereId($id);
        $user->update(['status'=>2]);
        return redirect('data-pencalon');

    }
    function data_kelas(){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $kelas=Kelas::all();
        return view('admin.data_kelas',compact('kelas','f'),['gararetek2'=>$gararetek2]);

    }
    function data_kategori(){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $kategori=Kategori::all();
        return view('admin.data_kategori',compact('kategori','f'),['gararetek2'=>$gararetek2]);
    }
    function delete_kategori($id){
        $data=Kategori::whereId($id);
        $data->delete();

        return redirect('data-kategori');
    }
    function edit_kategori($id){
        $data=Kategori::whereId($id)->first();
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);

        return view('admin.edit_kategori',compact('data','f'),['gararetek2'=>$gararetek2]);
    }
    function update_kategori(request $request,$id){
        $data=Kategori::whereId($id);
        $data->update($request->except(['_token']));
        return redirect('data-kategori');
    }
    function edit_kelas($id){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $data=Kelas::whereId($id)->first();
        return view('admin.edit_kelas',compact('data','f'),['gararetek2'=>$gararetek2]);
    }
    function update_kelas(request $request,$id){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $data=Kelas::whereId($id)->first();
        $data->update($request->all());
        return redirect('data-kelas');
    }
    function delete_kelas($id){
        $data=Kelas::whereId($id)->first();
        $data->delete();
        return redirect('data-kelas');
    }
    function delete_pencalon($id){
        $data=Calon::whereId($id)->first();
        $data->delete();
        return redirect('data-pencalon');
    }
    function data_calon(){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $data=Calon::
        join('users', 'users.id', '=', 'calon.id_calon')
            ->select('users.*', 'calon.*')
            ->where('calon.status','=','2')
            ->get();
        return view('admin.data_calon',compact('data','f'),['gararetek2'=>$gararetek2]);
    }
    function delete_calon($id){
        $data=Calon::whereId($id)->first();
        $data->delete();
        return redirect('data-pencalon');
    }
    function show(){
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        $data=User::whereId(auth()->user()->id)->first();
        return view('admin.show',compact('f'),['data'=>$data,'gararetek2'=>$gararetek2]);
    }
    function aksi_show(request $request){
        $data=User::whereId(auth()->user()->id);
        $data->update($request->except(['_token']));
        return redirect()->back(); 
    }


}



