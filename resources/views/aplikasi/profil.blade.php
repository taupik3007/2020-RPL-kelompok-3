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
                <!-- profile-widget -->
                <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                          <div class="panel-body">
                            <div class="col-lg-2 col-sm-2">
                              <h4>{{$data_user->name}}</h4>
                              <div class="follow-ava">
                                  <img src="img/profile-widget-avatar.jpg" alt="">
                              </div>
                              <h6>
                              @if($data_user->level == 1)
                              Administrator
                              @else
                              Siswa
                              @endif
                              </h6>
                            </div>
                            <div class="col-lg-4 col-sm-4 follow-info">
                            @if($data_user->id != Auth()->user()->id)

                                <p>Halo aku {{$data_user->name}}! salam kenal .</p>
                            @endif

                                <p>@johnsmith</p>
                                <h6>
                                    <span><i class="icon_clock_alt"></i>11:05 AM</span>
                                    <span><i class="icon_calendar"></i>25.10.13</span>
                                    <span><i class="icon_pin_alt"></i>NY</span>
                                </h6>
                            </div>

                          </div>
                    </div>
                </div>
              </div>
              <!-- page start-->
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <header class="panel-heading tab-bg-info">
                              <ul class="nav nav-tabs">

                                  <li class="active">
                                      <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                                  </li>
                                    @if($data_user->id==auth()->user()->id)
                                  <li class="">
                                      <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                                  </li>

                                  <li class="">
                                      <a data-toggle="tab" href="#password">
                                          <i class="icon-envelope"></i>
                                          Ubah password
                                      </a>
                                  </li>
                                  @endif
                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content">

                                  <!-- profile -->
                                  <div id="profile" class="tab-pane active">
                                    <section class="panel">

                                      <div class="panel-body bio-graph-info">
                                       @if(session('gagal_email'))
                                                          <div class="alert alert-block alert-danger fade in">
                                                                                                                                   <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                                                       <i class="icon-remove"></i>
                                                                                                                                   </button>
                                                                                                                                  Email sudah di gunakan
                                                                                                                               </div>
                                                                                                                               @elseif(session('gagal_psw'))
                                                          <div class="alert alert-block alert-danger fade in">
                                                                                                                                   <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                                                       <i class="icon-remove"></i>
                                                                                                                                   </button>
                                                                                                                                  Pssword salah
                                                                                                                               </div>
                                            @elseif(session('gagal_nis'))
                                                      <div class="alert alert-block alert-danger fade in">
                                                                                                                               <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                                                   <i class="icon-remove"></i>
                                                                                                                               </button>
                                                                                                                              Nis telah di gunakan
                                                                                                                           </div>

                                              @elseif(session('berhasil_psw'))
                                                                                                  <div class="alert alert-block alert-success fade in">
                                                                                                                                                                           <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                                                                                               <i class="icon-remove"></i>
                                                                                                                                                                           </button>
                                                                                                                                                                          berhasil ubah password                                                                                                                                                                       </div>
                                                                                                                           @elseif(session('berhasil'))
                                                      <div class="alert alert-block alert-success fade in">
                                                                                                                               <button data-dismiss="alert" class="close close-sm" type="button">
                                                                                                                                   <i class="icon-remove"></i>
                                                                                                                               </button>
                                                                                                                              Berhasil update
                                                                                                                           </div>
                                                                                                                           @endif
                                          <h1>Bio Data</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>Nama </span>: {{$data_user->name}}</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>E-Mail </span>: {{$data_user->email}}</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Nis</span>: {{$data_user->nis}}</p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>Kelas </span>: {{$data_user->nama_kelas}}</p>
                                              </div>

                                          </div>
                                      </div>
                                    </section>
                                      <section>
                                          <div class="row">
                                          </div>
                                      </section>
                                  </div>
                                  <!-- edit-profile -->
                                  <div id="edit-profile" class="tab-pane">
                                    <section class="panel">
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                                               <form class="" action="/update_profile/{{Auth()->user()->id}}" method="POST" >
                                                                     {{csrf_field()}}

                                                                     <div class="form-group row">
                                                                         <label for="nis" class="col-md-2 col-form-label text-md-right">{{ __('Nis') }}</label>

                                                                         <div class="col-md-6">
                                                                             <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{$data_user->nis}}" required autocomplete="nis" autofocus>

                                                                             @error('nis')
                                                                                 <span class="invalid-feedback" role="alert">
                                                                                     <strong>{{ $message }}</strong>
                                                                                 </span>
                                                                             @enderror
                                                                         </div>
                                                                     </div>

                                                                     <div class="form-group row">
                                                                         <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                                                                         <div class="col-md-6">
                                                                             <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data_user->name}}" required autocomplete="name" autofocus>

                                                                             @error('name')
                                                                                 <span class="invalid-feedback" role="alert">
                                                                                     <strong>{{ $message }}</strong>
                                                                                 </span>
                                                                             @enderror
                                                                         </div>
                                                                     </div>

                                                                     <div class="form-group row">
                                                                         <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                                         <div class="col-md-6">
                                                                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data_user->email }}" required autocomplete="email">

                                                                             @error('email')
                                                                                 <span class="invalid-feedback" role="alert">
                                                                                     <strong>{{ $message }}</strong>
                                                                                 </span>
                                                                             @enderror
                                                                         </div>
                                                                     </div>

                                                                     <div class="form-group row">
                                                                                                 <label for="kelas" class="col-md-2 col-form-label text-md-right">{{ __('Kelas') }}</label>

                                                                                                 <div class="col-md-6">
                                                                                                    <select class="form-control" name="id_kelas"  id="">
                                                                                                    @foreach($kelas as $Kelas)
                                                                                                    <option value="{{$Kelas->id}}">{{$Kelas->angkatan}}-{{$Kelas->nama_kelas}}</option>
                                                                                                    @endforeach

                                                                                                    </select>
                                                                                                     @error('kelas')
                                                                                                         <span class="invalid-feedback" role="alert">
                                                                                                             <strong>{{ $message }}</strong>
                                                                                                         </span>
                                                                                                     @enderror
                                                                                                 </div>
                                                                                             </div>

                                                                     <div class="form-group row">

                                                                             @error('password')
                                                                                 <span class="invalid-feedback" role="alert">
                                                                                     <strong>{{ $message }}</strong>
                                                                                 </span>
                                                                             @enderror
                                                                         </div>





                                                                     <div class="form-group row mb-0">
                                                                         <div class="col-md-6 offset-md-4">
                                                                             <button type="submit" class="btn btn-primary">
                                                                                 {{ __('Update') }}
                                                                             </button>


                                                                         </div>
                                                                     </div>

                                                                 </form>
                                          </div>
                                      </section>
                                  </div>
                                    <div id="password" class="tab-pane">
                                    <section class="panel">
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1>
                                               <form class="" action="/ubah-password" method="POST" >
                                                                     {{csrf_field()}}

                                                                     <div class="form-group row">
                                                                         <label for="psw" class="col-md-2 col-form-label text-md-right">{{ __('password lama') }}</label>

                                                                         <div class="col-md-6">
                                                                             <input id="psw" type="password" class="form-control @error('psw') is-invalid @enderror" name="psw" value="" required autocomplete="nis" autofocus>

                                                                             @error('psw')
                                                                                 <span class="invalid-feedback" role="alert">
                                                                                     <strong>{{ $message }}</strong>
                                                                                 </span>
                                                                             @enderror
                                                                         </div>
                                                                     </div>
                                                                       <div class="form-group row">
                                                                                                 <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                                                                                                 <div class="col-md-6">
                                                                                                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                                                                     @error('password')
                                                                                                         <span class="invalid-feedback" role="alert">
                                                                                                             <strong>{{ $message }}</strong>
                                                                                                         </span>
                                                                                                     @enderror
                                                                                                 </div>
                                                                                             </div>

                                                                                             <div class="form-group row">
                                                                                                 <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                                                                 <div class="col-md-6">
                                                                                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                                                                 </div>
                                                                                             </div>









                                                                     <div class="form-group row mb-0">
                                                                         <div class="col-md-6 offset-md-4">
                                                                             <button type="submit" class="btn btn-primary">
                                                                                 {{ __('Update') }}
                                                                             </button>


                                                                         </div>
                                                                     </div>

                                                                 </form>
                                          </div>
                                      </section>
                                  </div>
                              </div>

                 </div>




              <!-- page end-->
          </section>

</div>
@endsection