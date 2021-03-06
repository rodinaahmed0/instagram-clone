@extends('layouts.app')
@push('custom-css')
<link href="{{asset('css/sign_up.css')}}" rel="stylesheet">
@endpush
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

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
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

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
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<main>
    <div class="page">
        <div class="header">
            <div class="heading"></div>
            <p>Sign up to see photos and videos from your friends.</p>
          <button><i class="bg-primary  fab fa-facebook-square"></i> Log in with Facebook</button>
          <div>
            <hr>
            <p>OR</p>
            <hr>
          </div>
        </div>
        <div class="container1">
          <form  method="POST" action="{{ route('register') }}">
            @csrf  
            <div style="width: 100%; ">
              <input type="text"id="name" name="name" class="form-control @error('name') is-invalid @enderror"  required autocomplete="name" autofocus placeholder="Full Name">
               @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
            <div style="width: 100%; ">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email"  placeholder="Email">

               @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 
          </div>
            


            <div style="width: 100%; ">
              <input id="username" type="text" placeholder="Username" class="form-control @error('name') is-invalid @enderror" name="username" required autocomplete="nausernameme" autofocus>

               @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 
          </div>
            <div style="width: 100%; ">
              <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

               @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 
          </div>
          <div style="width: 100%; ">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
        </div>

            <button type="submit" >Sign up</button>
          </form>
          
          <ul>
            <li>By signing up, you agree to our</li>
            <li><a href="https://help.instagram.com/581066165581870" target="_blank">Terms</a></li>
            <li><a href="https://help.instagram.com/519522125107875" target="_blank">Data Policy</a></li>
            <li>and</li>
            <li><a href="https://help.instagram.com/1896641480634370?ref=ig" target="_blank">Cookies Policy</a> .</li>
         </ul>
        </div>
    </div>
    <div class="option">
       <p>Have an account? <a href="{{ route('login') }}">Sign in</a></p>
    </div>
    <div class="otherapps">
      <p>Get the app.</p>
      <button type="button"><i class="text-light bg-black  fas fa-sign-in-alt"></i> App Store</button>
      <button type="button"><i class="text-light bg-black  fab fa-google-play"></i> Google Play</button>
    </div>
    <div class="footer">
      <ul>
        <li><a href="">ABOUT</a></li>
        <li><a href="">HELP</a></li>
        <li><a href="">PRESS</a></li>
        <li><a href="">API</a></li>
        <li><a href="">JOBS</a></li>
        <li><a href="">PRIVACY</a></li>
        <li><a href="">TEMS</a></li>
        <li><a href="">LOCATIONS</a></li>
        <li><a href="">TOP ACCOUNTS</a></li>
        <li><a href="">HASHTAGS</a></li>
        <li><a href="">LANGUAGE</a></li>
      </ul>
      <p>?? 2021 Instagram</p>
    </div>
  </main>
@endsection
