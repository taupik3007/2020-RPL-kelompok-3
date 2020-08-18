@extends('aplikasi.layout')

@section('content')

<div class="row">
                <div class="col-md-12">
                    <section class="panel">
                          <header class="panel-heading">
                              <h3>Data Kelas</h3>

                          </header>
                    <div class="panel-body">
                    <div class=" pull-right "><a class="btn btn-primary btn-lg" href="tambah-kategori" title="">Tambah Kategori</a></div><br/><br/><br/>
                       <table class="table table-striped table-advance table-hover">
                                                   <tbody>
                                                      <tr>
                                                         <th><i class="icon_profile"></i> Kategori</th>
                                                         <th>aksi</th>

                                                      </tr>
                                                      @foreach($kategori as $kategori)
                                                      <tr>
                                                        <td>{{$kategori->nama_kategori}}</td>
                                                        <td>
                                                        <a href="kategori/{{$kategori->id}}/edit" class="btn btn-primary"><i class="icon_pencil-edit"></i></a>
                                                        <a href="kategori/{{$kategori->id}}/hapus" class="btn btn-danger"><i class="icon_trash"></i></a>

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