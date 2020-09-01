@extends('aplikasi.layout')
@section('content')
<div class="row">
                <div class="col-md-12">
                    <section class="panel">
                          <header class="panel-heading">
                              <h3>Data Kelas</h3>

                          </header>
                    <div class="panel-body">
                    @foreach($data as $no=>$data)
                    <div class="col-lg-4">
                     <section class="panel">
                                              <header class="panel-heading">
                                                  <h3>kandidat {{++$no}}</h3>

                                              </header>



                        <div class="col-md-12">
                    <center>   <img src="{{asset('img/avatar1.jpg')}}" height="200" alt=""></center><br/>
                       <form action="" method="post">
                       @csrf
                       <input type="hidden" name="id" value="{{$data->id}}">
                       <input type="hidden" name="kategori" value="{{$data->id_kategori}}">
                       <input type="submit" class="btn btn-compose" value="pilih">
                       </form>
                       <br/>
                        </div>
                     </section>
                    </div>

                    @endforeach
                    </div>
                    </section>
                </div>
              </div>






@endsection