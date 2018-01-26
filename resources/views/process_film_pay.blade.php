@extends('partials.partialsapp')



@section('header.scripts')

    <link rel="stylesheet" href="{{ url('site') }}/css/programmer.css">

@stop


@section('content')


<!--content-->
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Congratulations</h1>
                <hr />
            </div>
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-8 text-center">
           <h4> Your payment successfully proceeded & Your film added successfully</h4>
           <h4>you may create another private film from <a href="{{ url('my_private_films') }}">here</a></h4>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

@stop


@section('footer.scripts')

@stop
