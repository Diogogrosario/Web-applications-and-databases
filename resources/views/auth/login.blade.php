@extends('layouts.app')

@section('title')
    <title>Login</title>
@endsection

@section('content')


<div class="p-0" style="background-color:#f2f2f2;">
    <div class="container col-md-7 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="col-md-7 mx-auto">
            <div class="myform form ">
                @if (session('banned'))
                    <span class="error text-center">
                        <h3 style="color: red">{{ session('banned') }}</h3>
                    </span>
                @else
                    @if (session('unknownAccount'))
                        <span class="error text-center">
                            <h3 style="color: red">{{ session('unknownAccount') }}</h3>
                        </span>
                    @endif
                @endif
                <div class="logo mb-3">
                    <div class="col-md-12 text-center">
                        <h1>Sign in</h1>
                    </div>
                </div>
                <form action="{{ route('login') }}" method="POST" name="Login">

                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="Enter Email">
                        @if ($errors->has('email'))
                            <span class="error">
                            {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password" >Password</label>
                        <input class="form-control" id="password" type="password" name="password" required placeholder="Enter Password">
                        @if ($errors->has('password'))
                            <span class="error">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>

                    <a href="/forgot-password" id="forgot-password" style="font-size: 13px;">Forgot Password</a>

                    <div class="col-md-12 text-center pt-3">
                        <button type="submit" class="btn btn-block btn-dark">Login</button>
                    </div>
                </form>

                <div class="col-md-12 ">
                    <div class="signin-or">
                        <hr class="hr-or">
                        <span class="span-or">or</span>
                    </div>
                </div>
                <div class="col-md-12 mb-3">
                    <p class="text-center pt-3">
                        <a class="google btn"><i class="fa fa-google-plus">
                            </i> Signup using Google
                        </a>
                    </p>
                </div>
                <div class="form-group">
                    <p class="text-center">Don't have account? <a href="/register" id="register">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
