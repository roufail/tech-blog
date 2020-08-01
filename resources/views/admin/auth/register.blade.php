@extends('layouts.app')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Signup</p>
            <form action="{{ route('admin.register.post') }}" method="post">
                @csrf


                <div class="input-group mb-3">
                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name"
                        placeholder="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                </div>


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

                <div class="input-group mb-3">
                    <input id="password_confirmation" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
                        placeholder=" Password confirmation" required autocomplete="current-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>



                <div class="row">

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('Signup') }}</button>
                    </div>
                    <!-- /.col -->


                    @if (Route::has('admin.login'))
                    <p class="mb-1">
                        <a class="btn btn-link" href="{{ route('admin.login') }}">
                            {{ __('login') }}
                        </a>
                    </p>
                    @endif

                </div>
            </form>





        </div>
    </div>


</div>
@endsection
