@extends('layouts.app')
@section('title', 'Sign in')
@section('content')
<style type="text/css">
  .alert-danger1 {
    color: #922820!important;
    background-color: #fdd9d7!important;
    border-color: #fcc7c2!important;
}
.shadow-primary {
    box-shadow: 0 4px 20px 0 rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(5 37 65) !important;
}
.tc{
    text-align: center;
}
</style>
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="shadow-primary border-radius-lg py-3 pe-1 tc">
                  <!-- <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4> -->
                  <img src="https://www.netprophetsglobal.com/assets/images/logo.svg"  style="width: 65%;"/>
                  <!-- <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div> -->
                </div>
              </div>

              <div class="card-body">
                <h4 class="font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger1 alert-dismissible text-white" role="alert">
                      <span class="text-sm"><b>{!!   $error !!}</b></span>
                      <button type="button" class="btn-close alert-danger1 text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><b>×</b></span>
                      </button>
                    </div>
                @endforeach
<!--                 <form method="POST" action="{{ route('login') }}"  role="form" class="text-start">
                    @csrf
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label">Email</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                  </div>
                </form> -->
                  <p class="mt-4 text-sm text-center">
                    <!-- Don't have an account? -->
                    <!-- <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold">Sign up</a></br>
                    <a href="{{ route('password.request') }}" class="text-primary text-gradient font-weight-bold">{{ __('Forgot Your Password?') }}</a></br> -->
                    <a class="btn btn-link px-3" href="{{ url('auth/google') }}">
                      <img src="{{asset('assets/img/google.png')}}"  style="width: 100%;"/>
                    </a>

                  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
