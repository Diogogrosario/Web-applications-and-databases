@extends('layouts.app')

@section('title')
    <title>Forgot Password</title>
@endsection

@section('content')


<div class="p-0" style="background-color:#f2f2f2;">
    <div class="container col-md-7 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="col-md-7 mx-auto">
            <div class="myform form ">

                <div class="logo mb-3">
                    <div class="col-md-12 text-center">
                        <h1 class="pb-3">An Account Verification Email Has Been Sent</h1>
                        <h3>Please verify your account</h3>
                    </div>
                    
                </div>

                <div class="d-flex justify-content-center">
                    <form action={{route("verification.send")}} method="post">
                        @csrf
                        <button type="submit" class="btn btn-secondary">Re-Send Email</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
