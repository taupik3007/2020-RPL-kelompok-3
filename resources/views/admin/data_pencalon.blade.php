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
                                                         <th><i class="icon_mobile"></i>kategori</th>
                                                         <th><i class="icon_cogs"></i> visi</th>
                                                         <th><i class="icon_cogs"></i> misi</th>

                                                      </tr>

                                                   @foreach($users as $data)
                                                      <tr>
                                                         <td>{{$data->calon->nis}}</td>
                                                         <td>{{$data->calon->name}}</td>
                                                         <td>{{$data->calon->kelas}}</td>
                                                         <td>{{$data->calon->email}}</td>
                                                         <td>{{$data->wakil->nis}}</td>
                                                         <td>{{$data->calon->kategori}}</td>
                                                         <td>{{$data->calon->visi}}</td>
                                                         <td>{{$data->calon->misi}}</td>




                                                         <td>
                                                          <div class="btn-group">
                                                              <a class="btn btn-primary" href="terima-calon/{{$data->id}}"><i class="icon_plus_alt "></i></a>
                                                              <a class="btn btn-danger" href="hapus-user/{{$data->id}}"><i class="icon_close_alt2"></i></a>
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