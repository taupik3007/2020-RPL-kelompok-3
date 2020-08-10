<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use App\Kelas;

use App\Calon;

use App\Kategori;

use App\Akumulasi;

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
        return redirect('data-kelas');
    }

    function tambah_kategori(){
        return view('admin.tambah_kategori');
    }


    function aksi_kategori(request $request){
        Kategori::create($request->all());
        return redirect('data-kategori');
    }

    function data_pencalon(){
        $users = User::
            join('calon', 'users.id', '=', 'calon.id_calon')
            ->select('users.*', 'calon.*')
            ->where('calon.status','=','1')
            ->get();

        return view('admin.data_pencalon',compact('users'));

    }
    function terima_calon($id){
        $user=Calon::whereId($id);
        $user->update(['status'=>2]);
        return redirect('data-pencalon');

    }
    function data_kelas(){
        $kelas=Kelas::all();
        return view('admin.data_kelas',compact('kelas'));

    }
    function data_kategori(){
        $kategori=Kategori::all();
        return view('admin.data_kategori',compact('kategori'));
    }
}
