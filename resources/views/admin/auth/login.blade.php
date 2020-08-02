@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{ route('admin.login') }}" method="post">
                @csrf

                @if(Session::has('not_approved_message'))
                <div class="alert alert-danger alert-dismissible">
                    {{  Session::get('not_approved_message') }}
                </div>
                @endif

                <div class="input-group mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email"
                        autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>

                <div class="input-group mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="Password" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="row">

                    <div class="col-8">
                        <div class="icheck-primary">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Sign in') }}</button>
                    </div>
                    <!-- /.col -->

                    @if (Route::has('admin.password.request'))
                    <p class="mb-1">
                        <a class="btn btn-link" href="{{ route('admin.password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </p>
                    @endif


                    @if (Route::has('admin.register'))
                    <p class="mb-1">
                        <a class="btn btn-link" href="{{ route('admin.register') }}">
                            {{ __('register') }}
                        </a>
                    </p>
                    @endif

                </div>
            </form>





        </div>
    </div>


</div>
@endsection
