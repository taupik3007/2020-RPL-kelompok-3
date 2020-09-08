<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

use App\Akumulasi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    private function kategori(){
        $this->data_kategori=Kategori::all();
        $this->user=Akumulasi::whereId_user(auth()->user()->id)->get();
        $this->hitung_user=Akumulasi::where('id_user','=',auth()->user()->id)->count();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategori      = $this->kategori();
        $data_kategori = $this->data_kategori;
        $hitung        = $this->hitung_user;
        $user          = $this->user;
        return view('aplikasi.dashboard',compact(['data_kategori','user','hitung']));
    }
}
