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





                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            <div class="card-header">{{ __('Tambah') }}</div>
                          </header>
                          <div class="panel-body">
                              <div class="form">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-lg-8">
            <div class="card">

                <br>
                    <center>
                <div class="card-body">

                    <form class="" method="POST" >
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="nis" class="col-md-2 col-form-label text-md-right">{{ __('Nama kategori') }}</label>

                            <div class="col-md-6">
                                <input id="nis" type="text" class="form-control @error('kelas') is-invalid @enderror" name="nama_kategori" placeholder="masukan nama kategori" required autocomplete="kelas" autofocus>

                                @error('kelas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah') }}
                                </button>

                                <a href="/data-kategori" class="btn btn-danger">back</a>
                            </div>
                        </div>

                    </form>
                </div>
            </center>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
</div>
</div>




@endsection