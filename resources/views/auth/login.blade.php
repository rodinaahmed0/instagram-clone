@extends('layouts.app')

@push('custom-css')
<link href="{{asset('css/sign_in.css')}}" rel="stylesheet">
@endpush

@section('content')


<div class="container">

    <div class="box1">
      <img src="images/Capture.PNG" alt="">
    </div>

      <div class="box1">
              <div class="box">
                <div class="heading"></div>
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                      <div class="field">
                        <input id="email" type="email" name="email" placeholder="Phone number, username, or email" required
                        autocomplete="email"
                        autofocus>
                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror 
                      </div>
                      <div class="field">
                        <input id="password" name="password" type="password" placeholder="password" required autocomplete="current-password"/>
                      
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                      </div>
                      <button class="login-button" type="submit" title="login">Log In</button>
                      <div class="separator">
                        <div class="line"></div>
                        <p>OR</p>
                        <div class="line"></div>
                      </div>
                      <div class="other">
                        <button class="fb-login-btn" type="button">
                          <i class="fa fa-facebook-official fb-icon"></i>
                          <span class="">Log in with Facebook</span>
                        </button>
                        @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                      </div>
                    </form>
              </div>
          <div class="box" id="lastlogin">
            @if (Route::has('register'))
            <p>Don't have an account? <a class="signup" href="{{ route('register') }}">Sign Up</a></p>
            @endif
          </div>
      </div>
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
        <p>© 2021 Instagram</p>
      </div>




@endsection
