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
                <h4> Unfortunately your payment was not completed successfully </h4>
                <p class="error-title">
                    Error Code is :
                    <small> {{$code}}</small>
                </p>
                <br />
                <p class="error-title">
                    Error Status :
                    <small> {{$status}}</small>
                </p>
                <br />
                <p class="error-title">
                    Message:
                    <small> {{$message}}</small>
                </p>
                <br />
                <h4>you may try to confirm your payment again from  <a href="{{ url('my_private_films') }}">here</a></h4>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>

@stop


@section('footer.scripts')

@stop
