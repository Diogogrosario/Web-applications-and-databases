@extends('layouts.app')


@section('title')
    <title>404 Not found</title>
@endsection

@section('content')

<div class="p-0" style="background-color:#f2f2f2;">
    <div id="404_error" class="container col-md-7 px-0 px-sm-2 p-lg-5 p-3 shadow-sm h-100" style="background-color:white">
        <div class="d-block">
            <div class="mb-5 mt-4 fs-1 text-center">
                <strong>404 - Not found</strong>
            </div>
            <div class="offset-md-1 col-md-10 fs-4 text-center p-4 p-2-md p-0-lg">
                We could not find the page you're looking for.
            </div>
        </div>
    </div>
</div>

@endsection