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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $f=Kategori::all();
        $gararetek2=Akumulasi::find(auth()->user()->id);
        return view('aplikasi.dashboard',compact('f'),['gararetek2'=>$gararetek2]);
    }
}
