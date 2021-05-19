@extends('layouts.app')

@section('title')
    <title>Forgot Password</title>
@endsection

@section('content')


<div class="p-0" style="background-color:#f2f2f2;">
    <div class="container col-md-7 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="col-md-7 mx-auto">
            <div class="myform form ">
                <form action="{{ route('password.update') }}" method="POST" name="reset-password">

                    @csrf
                    
                    <input type="hidden" id="token" name="token" value="{{ $token }}">

                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Insert New Password</h1>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus placeholder="Enter Email">
                        @if ($errors->has('email'))
                            <span class="error">
                            {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>

                    </div>
                        <div class="pt-3">
                        <label style="padding-bottom: 1%;" for="password"  class="form-label"><b>Password</b></label>
                            <input id="password" type="password" name="password" value="{{ old('password') }}" required class="form-control" placeholder="Password">
                            @if ($errors->has('password'))
                            <span class="error">
                                {{ $errors->first('password') }}
                            </span>
                            @endif
                        </div>
                        <div class="pt-3">
                        <label style="padding-bottom: 1%;" for="password_confirmation"  class="form-label"><b>Confirm Password</b></label>
                        <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required class="form-control" placeholder="Confirm Password">
                        @if ($errors->has('password_confirmation'))
                            <span class="error">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        @endif
                        </div>
                    </div>


                    <div class="col-md-12 text-center pt-3">
                        <button type="submit" class="btn btn-block btn-dark">Confirm Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
