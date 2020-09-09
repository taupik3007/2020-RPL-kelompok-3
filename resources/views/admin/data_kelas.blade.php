@extends('aplikasi.layout')
@section('admin')
<li class="sub-menu active" >
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
                              <h3>Data Kelas</h3>

                          </header>
                    <div class="panel-body">
                     @if(session('gagal'))
                                    <div class="alert alert-block alert-danger fade in">
                                                                      <button data-dismiss="alert" class="close close-sm" type="button">
                                                                          <i class="icon-remove"></i>
                                                                      </button>
                                                                     masih ada user yang ada di kelas tersebut
                                                                  </div>
                                    @endif
                    <div class=" pull-right "><a class="btn btn-primary btn-lg" href="tambah-kelas  " title="TAMBAH   KELAS">Tambah Kelas</a></div><br/><br/><br/>
                    <header>

                    <div class="col-sm-12">
                       <table class="table table-striped table-advance table-hover">
                                                   <tbody>
                                                      <tr>
                                                        <th>  <i class="icon_profile"></i> Angkatan</th>
                                                         <th><i class="icon_profile"></i> Kelas</th>
                                                         <th>aksi</th>

                                                      </tr>
                                                      @foreach($kelas as $kelas)
                                                      <tr>
                                                        <td> {{$kelas->angkatan}}</td>
                                                        <td>{{$kelas->nama_kelas}}</td>
                                                        <td><a href="kelas/{{$kelas->id}}/edit" class="btn btn-primary"><i class="icon_pencil-edit"></i></a><a href="kelas/{{$kelas->id}}/delete" class="btn btn-danger"><i class="icon_trash"></i></a></td>
                                                      </tr>



                                                      @endforeach



                                                   </tbody>
                                                </table>
                                                </div>
                                                </header>
                    </div>
                    </section>
                </div>
              </div>





@endsection