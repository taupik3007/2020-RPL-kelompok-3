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

                    <form class="" method="POST" >
                        @csrf

                        <div class="form-group row">
                            <label for="nis" class="col-md-2 col-form-label text-md-right">{{ __('Nis') }}</label>

                            <div class="col-md-6">
                                <input id="nis" type="text" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" required autocomplete="nis" autofocus>

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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
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

                         <div class="form-group row">
                                                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Level') }}</label>

                                                    <div class="col-md-6">
                                                        <select id="level"  class="form-control @error('password') is-invalid @enderror" name="level" required autocomplete="level">
                                                        <option >2</option>
                                                        <option>1</option>
                                                        </select>
                                                        @error('level')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                          <div class="form-group row">
                                                                             <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('kategori') }}</label>

                                                                             <div class="col-md-6">
                                                                                 <select id="level"  class="form-control @error('kelas') is-invalid @enderror" name="kelas" required autocomplete="level">
                                                                                 @foreach($j as $j)
                                                                                 <option >{{$j->nama_kelas}}</option>
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
