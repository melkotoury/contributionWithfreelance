@extends('partials.partialsapp')
@section('header.scripts')
 <link rel="stylesheet" href="{{ asset('site') }}/css/my_films_home.css">

@stop

@section('content')
<!--Public and Private Cards-->
<div class="container pp">
    <div class="row">
    
        <div class="col-xs-12 col-md-6">
            <div class="card" id="card2">
                <!--<center>-->

<!--</center>-->
  <div class="wrapper">
    <h4><b>Public Films</b></h4> <br>
        <p><b>By Clicking Here You Can Create & Edit A Public Film<b></p> 
        <br>

        <ul class="list-group">
        <li class="list-group-item">the public film will be visible on your profile and anyone can watch it and see all information on the film page</li>
        <li class="list-group-item">if you send the film URL (film page) to any one they can see the film and all the information without logging in</li>
        <li class="list-group-item">it's free to put your old public films to your profile</li>
        <li class="list-group-item">no upload just put the link of your film</li>
        <li class="list-group-item">you own the views number on the same link of film </li>
      </ul>

  </div>
  <div class="enter">
      <button onclick=window.open("{{ url('my_pub_films') }}","_self") id="btn1" class="btn  btn-lg btn-block btn-primary"><i class="fa fa-sign-in"> Check Your Public Films</i></button>
      </div>
</div>
        </div>




            <div class="col-xs-12 col-md-6">
            <div class="card" id="card1">
                <!--<center>-->

<!--</center>-->
  <div class="wrapper">
    <h4><b>Private Films</b></h4> <br>
        <p><b>By Clicking Here You Can Create & Edit A Private Film ( new film with private link to submit to new festivals ) <b></p> 
        <br>

        <ul class="list-group">
        <li class="list-group-item">the public film icon and film page will be visible on your profile but the video player will be only visible to festivals you submit to</li>
        <li class="list-group-item">if you send the film URL (film page) to any one they can see the film and all the information except video player</li>
        <li class="list-group-item">unlimited nubmer of submission for only <span style="font-size: 18px;color: #ff755a;">40$ for each film</span>. just pay once and start sending your film to unlimited number of festivals </li>
        <li class="list-group-item">you can only save the film and start submitting after paying the fees</li>
        <li class="list-group-item">no upload just put the link and password of your film </li>
        <li class="list-group-item">cheapest, easiest and festivals you can't find elsewhere  </li>
      </ul>

  </div>
  <div class="enter">
      <button onclick=window.open("{{ url('my_private_films') }}","_self") id="btn2" class="btn  btn-lg btn-block btn-primary"><i class="fa fa-sign-in"> Check Your Private Films</i></button>
      </div>
</div>
        </div>
    </div>
</div>
    <br>
    <h4 class="text-center" style="color:#ff755a;font-weight: bold;">If You Have Four Films Or More Please Contact Us For Special Rates At info@iamafilm.com Or From <a href="{{ url('contact') }}">Click Here</a></h4><br>

@endsection

@section('footer.scripts')
<script src="{{ asset('site') }}/js/app/my_films_home.js"></script>
@stop


