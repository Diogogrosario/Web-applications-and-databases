@extends('layouts.app')

@section('title')
    <title>Forgot Password</title>
@endsection

@section('content')


<div class="p-0" style="background-color:#f2f2f2;">
    <div class="container col-md-7 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="col-md-7 mx-auto">
            <div class="myform form ">
                <form action="{{ route('password.change') }}" method="POST" name="reset-password">
                    @if (session('error'))
                        <span class="error text-center">
                            <h3 style="color: red">{{ session('error') }}</h3>
                        </span>
                    @endif
                    @csrf

                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Change Password</h1>
                        </div>
                    </div>

                    </div>
                        <div class="pt-3">
                            <label style="padding-bottom: 1%;" for="current_password" class="form-label"><b>Old Password</b></label>
                            <input id="current_password" type="password" name="current_password" class="form-control" required autofocus placeholder="Enter Old Password">
                            @if ($errors->has('email'))
                                <span class="error">
                                {{ $errors->first('email') }}
                                </span>
                            @endif
                        </div>
                        <div class="pt-3">
                            <label style="padding-bottom: 1%;" for="password" class="form-label"><b>Password</b></label>
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
