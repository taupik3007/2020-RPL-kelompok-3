
@extends('aplikasi.layout')
@section('content')
<div class="row">
                <div class="col-md-12">
                    <section class="panel">
                          <header class="panel-heading">
                              <h3>Pilih Calon</h3>

                          </header>
                    <div class="panel-body">
                    @foreach($data as $no=>$calon)
                    <div class="col-lg-4">
                     <section class="panel">
                                              <header class="panel-heading">
                                                  <h3>kandidat {{++$no}}</h3>

                                              </header>



                        <div class="col-md-12">
                        <br/>
                        <a href="/voting/{{$calon->id}}/info" class="btn btn-primary"><i>i</i></a>
                        <br/>

                    <center>   <img src="{{asset('img/avatar1.jpg')}}" height="200" alt=""></center><br/>
                    <center> <h3> {{$calon->name}}
                    @foreach($wakil as $wkl)
                    -
                    @if($wkl->id==$calon->id)
                    {{$wkl->name}}</h3>
                    @endif
                    @endforeach
                    <br/>
                    </center>





                    @if(Request::path() == 'voting/'.$view.'/akumulasi')

                    @php
                    $hitung_semua=App\Akumulasi::count();
                    $hitung_akumulasi=App\Akumulasi::whereId_calon($calon->id)->whereId_kategori($view)->count();

                   $total=($hitung_akumulasi/$hitung_semua)*100;


                    @endphp
                                                                 <li>
                                                                                                               <a href="javascript:;">
                                                                                                                   <div style="display:inline;margin:50px;width:80px;height:80px;"><canvas  width="80" height="80px"></canvas><input class="knob" data-readonly="true" data-width="80" data-height="80" data-displayprevious="true" data-thickness=".1" value="{{$total}}" data-fgcolor="#007AFF" data-bgcolor="#F7F7F7" readonly="readonly" style="width: 44px; height: 26px; position: absolute; vertical-align: middle; margin-top: 26px; margin-left: 150px; border: 0px; background: none; font: bold 16px Arial; text-align: center; color: rgb(0, 122, 255); padding: 0px; appearance: none;"></div>
                                                                                                                   <p><i class="icon_profile"></i> {{$hitung_akumulasi}} vote</p>
                                                                                                               </a>
                                                                                                           </li>



                    @elseif(Request::path() == 'voting/'.$view)

                      <form action="" method="post">
                                           @csrf
                                           <input type="hidden" name="id" value="{{$calon->id}}">
                                           <input type="hidden" name="kategori" value="{{$calon->id_kategori}}">
                                           <input type="submit" class="btn btn-compose" value="pilih">
                                           </form>
                    @endif


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
