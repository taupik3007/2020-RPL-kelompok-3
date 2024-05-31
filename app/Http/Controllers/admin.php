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
    private function kategori(){
    $coba2 = "gararetek  awikwok";


        $this->data_kategori=Kategori::all();
        $this->user=Akumulasi::whereId_user(auth()->user()->id)->get();
        $this->hitung_user=Akumulasi::where('id_user','=',Auth::user()->id)->count();
    }

    function data_user(){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
//        dd($data_kategori);


        $data= User::join('kelas','kelas.id','=','users.id_kelas')
        ->select('kelas.nama_kelas','users.*')->get();
        return view('admin.data_siswa' ,compact(['data','data_kategori','user','hitung']));

    }

    function hapus_user($id){
        $calon=Calon::whereId_calon($id)->first();
        $wakil=Calon::whereId_wakil($id)->first();
        $akumulasi_user=Akumulasi::whereId_user($id)->first();
        if($calon){
            return redirect('/data-user')->with('gagal_calon','gagal');
        }elseif($wakil){
            return redirect('/data-user')->with('gagal_wakil','gagal');

        }
        elseif($akumulasi_user){
            return redirect('/data-user')->with('gagal_akumulasi','gagal');
        }
        else{
        $data=User::whereId($id);
        $data->delete();
        return redirect('data-user');
        }
    }
    function update_user($id){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        $data=User::join('kelas','kelas.id','=','users.id_kelas')
        ->where('users.id','=',$id)->first();
        $kelas=Kelas::all();
        return view('admin.update_user',compact(['data_kategori','data','user','kelas','hitung']));
    }

    function aksi_update(request $request,$id)
    {
        $nis = $request->input('nis');
        $email = $request->input('email');
//        dd($nis);
        $cek_user = User::whereId($id)->first();
        $cek_nis = User::withTrashed()->whereNis($nis)->first();
        $cek_email = User::whereEmail($email)->first();
//        dd($cek_nis);
        if ($nis == $cek_user->nis) {
            if ($email == $cek_user->email) {

                $data = User::whereId($id);
                $data->update($request->except(['_token']));
                return redirect('/data-user');
            } else {
                if ($cek_email) {
                     return redirect('/data-user')->with('gagal_email','gagal');
                } else {
                    $data = User::whereId($id);
                    $data->update($request->except(['_token']));
                    return redirect('/data-user');
                }
            }
        } else {
            if ($cek_nis) {
                return redirect('/data-user')->with('gagal_nis','gagal');
            } else {
                if ($email == $cek_user->email) {

                    $data = User::whereId($id);
                    $data->update($request->except(['_token']));
                    return redirect('/data-user');

                } else {
                    if ($cek_email) {
                        return redirect('/data_user')->with('gagal_email','gagal');
                    } else {
                        $data = User::whereId($id);
                        $data->update($request->except(['_token']));
                        return redirect('/data-user');
                    }
                }
            }


        }

    }
    function tambah_kelas(){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        return view('admin.tambah_kelas',compact(['data_kategori','user','hitung']));

    }
    function aksi_kelas(request $request){
        Kelas::create($request->all());
        return redirect('data-kelas');
    }

    function tambah_kategori(){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        return view('admin.tambah_kategori',compact(['data_kategori','user','hitung']));
    }


    function aksi_kategori(request $request){
        Kategori::create($request->all());
        return redirect('data-kategori');
    }

    function data_pencalon(){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        $users=Calon::
        join('users', 'users.id', '=', 'calon.id_calon')
            ->join('kelas','kelas.id','=','users.id_kelas')
            ->join('kategori','kategori.id','=','calon.id_kategori')
            ->select('kategori.*','users.*','kelas.*','calon.*')
            ->where('calon.status','=','1')
            ->get();
//        dd($data);
        $wakil=Calon::
        join('users','users.id','=','calon.id_wakil')
            ->join('kelas','kelas.id','=','users.id_kelas')

            ->select('users.name','users.nis','kelas.*', 'calon.*')
            ->get();
        //dd($wakil);

        return view('admin.data_pencalon',compact(['users','data_kategori','wakil','user','hitung']));

    }
    function terima_calon($id){
        $user=Calon::whereId($id);
        $user->update(['status'=>2]);
        return redirect('data-pencalon');

    }
    function data_kelas(){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        $kelas=Kelas::all();
        return view('admin.data_kelas',compact(['kelas','data_kategori','user','hitung']));

    }
    function data_kategori(){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        $kategori=Kategori::all();
        return view('admin.data_kategori',compact(['kategori','data_kategori','user','hitung']));
    }
    function delete_kategori($id){
        $data=Kategori::whereId($id);


        $data->delete();

        return redirect('data-kategori');

    }
    function edit_kategori($id){

        $data=Kategori::whereId($id)->first();
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        return view('admin.edit_kategori',compact(['data','data_kategori','user','hitung']));
    }
    function update_kategori(request $request,$id){
        $data=Kategori::whereId($id);
        $data->update($request->except(['_token']));
        return redirect('data-kategori');
    }
    function edit_kelas($id){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        $data=Kelas::whereId($id)->first();
        return view('admin.edit_kelas',compact(['data','data_kategori','user','hitung']));
    }
    function update_kelas(request $request,$id){

        $data=Kelas::whereId($id)->first();
        $data->update($request->all());
        return redirect('data-kelas');
    }
    function delete_kelas($id){
        $data=Kelas::whereId($id)->first();
        $user=User::where('id_kelas','=',$id)->count();
        if($user>0){
            return redirect('data-kelas')->with('gagal','masih ada user yang ada di kelas tersebut');
        }else{
        $data->delete();
        return redirect('data-kelas');
        }
    }
    function delete_pencalon($id){
        $data=Calon::whereId($id)->first();
        $data->delete();
        return redirect('data-pencalon');
    }
    function data_calon(){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        $users=Calon::
        join('users', 'users.id', '=', 'calon.id_calon')
            ->join('kelas','kelas.id','=','users.id_kelas')
            ->join('kategori','kategori.id','=','calon.id_kategori')
            ->select('kategori.*','users.*','kelas.*','calon.*')
            ->where('calon.status','=','2')->where('kategori.deleted_at','=',null)
            ->get();
//        dd($data);
        $wakil=Calon::
        join('users','users.id','=','calon.id_wakil')
            ->join('kelas','kelas.id','=','users.id_kelas')

            ->select('users.name','users.nis','kelas.*','calon.*')

            ->get();
//         dd($wakil);

        return view('admin.data_pencalon',compact(['users','data_kategori','wakil','user','hitung']));
    }
    function delete_calon($id){
        $data = Calon::whereId($id)->first();
        $data->delete();
        return redirect('data-pencalon');
    }
    function show(){
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        $data=User::whereId(auth()->user()->id)->first();
        return view('admin.show',compact(['data_kategori','user','data','hitung']));
    }
    function aksi_show(request $request){
        $data=User::whereId(auth()->user()->id);
        $data->update($request->except(['_token']));
        return redirect()->back(); 
    }


}



