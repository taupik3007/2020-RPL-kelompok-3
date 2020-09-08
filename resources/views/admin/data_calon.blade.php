@extends('aplikasi.layout')

@section('content')
<div class="row">
                <div class="col-md-12">
                    <section class="panel">
                          <header class="panel-heading">
                              <h3>Data Pencalon</h3>

                          </header>
                    <div class="panel-body">

                       <table class="table table-striped table-advance table-hover">
                                                   <tbody>
                                                      <tr>
                                                         <th><i class="icon_profile"></i> nis ketua</th>
                                                         <th><i class="icon_profile"></i> nama ketua</th>
                                                         <th><i class="icon_profile"></i> kelas</th>
                                                         <th><i class="icon_mail_alt"></i>email</th>
                                                          <th><i class="icon_mobile"></i>nis wakil</th>
                                                          <th><i class="icon_mobile"></i>nama wakil</th>
                                                          <th><i class="icon_mobile"></i>kelas wakil</th>
                                                         <th><i class="icon_mobile"></i>kategori</th>
                                                         <th><i class="icon_cogs"></i> visi</th>
                                                         <th><i class="icon_cogs"></i> misi</th>
                                                         <th><i class="icon_cogs"></i>aksi</th>

                                                      </tr>

                                                   @foreach($users as $data)

                                                      <tr>
                                                         <td>{{$data->nis}}</td>
                                                         <td>{{$data->name}}</td>
                                                         <td>{{$data->nama_kelas}}</td>
                                                         <td>{{$data->email}}</td>
                                                        @foreach($wakil as $wak)

                                                          @if($data->id==
                                                          $wak->id)
                                                           <td>{{$wak->nis}}</td>
                                                           <td>{{$wak->name}}</td>
                                                           <td>{{$wak->nama_kelas}}</td>
                                                           @endif
                                                           @endforeach
                                                         <td>{{$data->nama_kategori}}</td>
                                                         <td>{{$data->visi}}</td>
                                                         <td>{{$data->misi}}</td>




                                                         <td>
                                                          <div class="btn-group">
                                                           <a class="btn btn-success" href="/voting/{{$data->id}}/info"><i class="icon_profile "></i></a>
                                                              <a class="btn btn-primary" href="terima-calon/{{$data->id}}"><i class="icon_plus_alt "></i></a>
                                                              <a class="btn btn-danger" href="pencalon/{{$data->id}}/hapus"><i class="icon_trash"></i></a>
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