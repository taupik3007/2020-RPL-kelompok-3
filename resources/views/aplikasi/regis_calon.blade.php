@extends('aplikasi.layout')

@section('content')



                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                            <div class="card-header">{{ __('Register') }}</div>
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

                @if(session('gagal'))
                <div class="alert alert-block alert-danger fade in">
                                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                                      <i class="icon-remove"></i>
                                                  </button>
                                                 masih ada user yang ada di kelas tersebut
                                              </div>
                @endif

                    <form class="" method="POST" >
                        @csrf

                        <input type="hidden" value="{{auth()->user()->id}}" name="id">

                        <div class="form-group row">
                            <label for="nis" class="col-md-2 col-form-label text-md-right">{{ __('Nis ketua') }}</label>

                            <div class="col-md-6">
                                <input id="nis" type="text" class="form-control " disabled name="nis_ketua" value="{{auth()->user()->nis }}" required autocomplete="nis" autofocus>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" disabled name="name" value="{{ auth()->user()->name }}" required autocomplete="name" autofocus>


                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('NIS Wakil') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="nis" value="" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                         <div class="form-group row">
                                                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('visi') }}</label>

                                                    <div class="col-md-6">
                                                        <textarea name="visi" class="form-control" id="" cols="30" rows="10"></textarea>

                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>



                          <div class="form-group row">
                                                                              <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('misi') }}</label>

                                                                              <div class="col-md-6">
                                                                                  <textarea name="misi" class="form-control" id="" cols="30" rows="10"></textarea>

                                                                                  @error('email')
                                                                                      <span class="invalid-feedback" role="alert">
                                                                                          <strong>{{ $message }}</strong>
                                                                                      </span>
                                                                                  @enderror
                                                                              </div>
                                                                          </div>


                           <div class="form-group row">
                                                                                                       <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('kelas') }}</label>

                                                                                                       <div class="col-md-6">
                                                                                                           <select id="level"  class="form-control @error('kelas') is-invalid @enderror" name="kategori" required autocomplete="level">
                                                                                                           @foreach($j as $j)
                                                                                                           <option >{{$j->nama_kategori}}</option>
                                                                                                           @endforeach
                                                                                                           </select>
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
                                    {{ __('Register') }}
                                </button>
                                <a href="{{URL::previous()}}" class="btn btn-danger">back</a>
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