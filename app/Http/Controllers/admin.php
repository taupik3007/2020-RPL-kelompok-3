<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Kelas;

use App\Calon;

use App\Kategori;

class admin extends Controller
{

    function data_user(){
        $data= User::all();
        return view('admin.data_siswa' ,compact('data'));
    }

    function hapus_user($id){
        $data=User::whereId($id);
        $data->delete($data);
        return redirect('data-user');
    }
    function update_user($id){
        $data=User::whereId($id)->first();
        return view('admin.update_user',['data'=>$data]);
    }

    function aksi_update(request $request,$id){
        $data=User::whereId($id);
        $data->update($request->except(['_token']));
        return redirect('data-user');
    }

    function tambah_kelas(){
        return view('admin.tambah_kelas');

    }
    function aksi_kelas(request $request){
        Kelas::create($request->all());
        return view('admin.tambah_kelas');
    }

    function tambah_kategori(){
        return view('admin.tambah_kategori');
    }


    function aksi_kategori(request $request){
        Kategori::create($request->all());
        return redirect('regis-calon');
    }
}
