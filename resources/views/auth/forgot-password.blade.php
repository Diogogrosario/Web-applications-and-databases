@extends('layouts.app')

@section('title')
    <title>Forgot Password</title>
@endsection

@section('content')


<div class="p-0" style="background-color:#f2f2f2;">
    <div class="container col-md-7 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="col-md-7 mx-auto">
            <div class="myform form ">
                <form action={{ route('password.request') }} method="POST" name="forgot-password">

                    @csrf
                    
                    <div class="logo mb-3">
                        <div class="col-md-12 text-center">
                            <h1>Forgot Password</h1>
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


                    <div class="col-md-12 text-center pt-3">
                        <button type="submit" class="btn btn-block btn-dark">Send Email</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
