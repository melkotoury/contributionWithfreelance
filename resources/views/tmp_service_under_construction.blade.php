@extends('partials.partialsapp')



@section('header.scripts')

    <link rel="stylesheet" href="{{ url('site') }}/css/programmer.css">

@stop


@section('content')
    <style>
        .error-title{
            color: #ff755a;
        }
        .error-title small{
            color: black;
        }
    </style>

    <!--content-->
    <div class="container">
        <div class="row main">
            <div class="panel-heading">
                <div class="panel-title text-center">
                    <h1 class="title">Ooops...</h1>
                    <hr />
                </div>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8 text-center">
                <h4> Server is under some maintenance </h4>

                <br />
                <h4>you may try again later</h4>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@stop


@section('footer.scripts')

@stop
