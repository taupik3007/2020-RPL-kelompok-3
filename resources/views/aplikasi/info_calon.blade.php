@extends('aplikasi.layout')
@section('admin')
<li class="sub-menu" >
<a href="javascript:;" class="">
                          <i class="icon_desktop"></i>
                          <span>FITUR Admin</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="/data-kategori">data kategori</a></li>
                          @yield('sidebar')
                          <li><a class="" href="/data-kelas">data kelas</a></li>
                          <li><a class="" href="/data-user">data user</a></li>
                          <li><a class="" href="/data-pencalon">data pencalonan</a></li>
                          <li><a class="" href="/data-calon">data kandidat</a></li>

                      </ul>
                  </li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <header class="panel-heading">
                <h3>Info Calon</h3>
            </header>
            <div class="panel-body">
                <center>   <img src="{{asset('img/avatar1.jpg')}}" height="200" alt=""></center><br/>
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <center>
                    <h3>
                    <table>
                        
                        <tr>
                            <td>Nama Calon</td>
                            <td>:</td>
                            <td><a id="calon" href="/profile/{{$data->id_calon}}">{{$data->name}}</a></td>
                        </tr>
                        <tr>
                            <td>Nis calon</td>
                            <td>:</td>
                            <td>{{$data->nis}}</td>
                        </tr>
                        <tr>
                            <td>Kelas Calon</td>
                            <td>:</td>
                            <td>{{$data->nama_kelas}}</td>
                        </tr>
                        <tr>
                            <td>Nama Wakil</td>
                            <td>:</td>
                            <td><a href="/profile/{{$wakil->id_wakil}}">{{$wakil->name}}</a></td>
                        </tr>
                        <tr>
                            <td>Nis wakil</td>
                            <td>:</td>
                            <td>{{$wakil->nis}}</td>
                        </tr>
                        <tr>
                            <td>Kelas Wakil </td>
                            <td> :</td>
                            <td> {{$wakil->nama_kelas}}</td>
                        </tr>
                        <tr>
                            <td>Kategori Pemilihan &nbsp&nbsp&nbsp&nbsp </td>
                            <td> :&nbsp&nbsp&nbsp&nbsp </td>
                            <td>{{$data->nama_kategori}}</td>
                        </tr>
                         <tr>
                            <td>Visi &nbsp&nbsp&nbsp&nbsp </td>
                            <td> :&nbsp&nbsp&nbsp&nbsp </td>
                            <td>{{$data->visi}}</td>
                        </tr>
                         <tr>
                            <td>Misi &nbsp&nbsp&nbsp&nbsp </td>
                            <td> :&nbsp&nbsp&nbsp&nbsp </td>
                            <td>{{$data->misi}}</td>
                        </tr>

                        
                    </table>
                    </h3>
                    <a href="{{URL::Previous()}}" class="btn btn-danger">Back</a>
                    </center>
                    <br>    <br>    <br>
                </div>
                
            </div>

        </section>
    </div>
</div>
@endsection