@extends('aplikasi.layout')
@section('content')
<div class="row">
  <div class="col-md-12">
    <section class="panel">
      <header class="panel-heading">
        <h3>Data User</h3>
      </header>
      <div class="panel-body">
        @if(session('gagal_calon'))
                                          <div class="alert alert-block alert-danger fade in">
                                                                            <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                <i class="icon-remove"></i>
                                                                            </button>
                                                                           user ini masih menjadi calon
                                                                        </div>
        @elseif(session('gagal_wakil'))
           <div class="alert alert-block alert-danger fade in">
                                                                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                        <i class="icon-remove"></i>
                                                                                    </button>
                                                                                   User ini masih menjadi wakil
                                                                                </div>
         @elseif(session('gagal_akumulasi'))
          <div class="alert alert-block alert-danger fade in">
                                                                                             <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                 <i class="icon-remove"></i>
                                                                                             </button>
                                                                                           user ini masih terdaftar sebagai user yang sudah memilih
                                                                                         </div>



                                          @endif
        <div class=" pull-right "><a class="btn btn-primary btn-lg" href="registrasi" title="registrasi">Tambah User</a></div><br/><br/><br/>
        <table class="table table-striped table-advance table-hover">
          <tbody>
            <tr>
              <th><i class="icon_profile"></i> Nis</th>
              <th><i class="icon_profile"></i> Full Name</th>
              <th><i class="icon_profile"></i>Kelas</th>
              <th><i class="icon_mail_alt"></i> Email</th>
              <th><i class="icon_mobile"></i>status</th>
              <th><i class="icon_cogs"></i> Action</th>
            </tr>
            @foreach($data as $data)
            <tr>
              <td>{{$data->nis}}</td>
              <td>{{$data->name}}</td>
              <td>{{$data->nama_kelas}}</td>
              <td>{{$data->email}}</td>
              <td>
                @if($data->level ==1)
                {{'admin'}}
                @else
                {{'siswa'}}
                @endif
              </td>
              <td>
                <div class="btn-group">
                @if($data->level==2)
                  <a class="btn btn-primary" href="update-user/{{$data->id}}"><i class="icon_pencil-edit"></i></a>
                  <a class="btn btn-success" href="profile/{{$data->id}}"><i class="icon_profile"></i></a>
                  <a class="btn btn-danger" href="hapus-user/{{$data->id}}"><i class="icon_close_alt2"></i></a>
                  @endif
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  </div>
</div>
@endsection