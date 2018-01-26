@extends('partials.partialsapp')



@section('header.scripts')

    <link rel="stylesheet" href="{{ url('site') }}/css/film-details.css">

@stop


@section('content')

<!--Content-->

<div class="container film-details">
    <div class="row">

        <div class="col-md-3">
            <h4>Awards </h4>
            {!! nl2br($edition->awards) !!}
        </div>
        <div class="col-md-3">
            <h4>Jury</h4>
            {{--@if(count(json_decode($edition->jury)) > 0)--}}
            {{--@foreach(json_decode($edition->jury) as $jury)--}}
            <p>{!! nl2br($edition->jury) !!} </p>
            {{--@endforeach--}}
            {{--@else--}}
            {{--<p class="lead">no jury found</p>--}}
            {{--@endif--}}
        </div>
        <div class="col-md-6">
            
            @if(file_exists($edition->edition_poster))
            <img alt="" src="{{ url('/').'/'.$edition->edition_poster }}" style="height: 1024px; width: 555px;">
            @else
            <img alt="" src="http://placehold.it/683x1024?text=no image">
            @endif


        </div>
    </div>

    <div class="row">
<h4>Offical Selection </h4>
        <p>{!! nl2br($edition->selections) !!}</p>
    </div>
</div>

<!--End Content-->


@stop


@section('footer.scripts')

@stop