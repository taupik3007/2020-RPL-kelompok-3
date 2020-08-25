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


                    </section>
                    </div>

                    @endforeach
                    </div>
                    </section>
                </div>
              </div>






@endsection