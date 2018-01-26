@extends('partials.partialsapp')



@section('header.scripts')
    <link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site') }}/css/iamafilm.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/profile.css">
        <link rel="stylesheet" href="{{ asset('site') }}/css/film_maker_profile.css">

    <link rel="stylesheet" href="{{ asset('site') }}/css/magnific.css">

@stop  


@section('content')

<!--Profile wrapper-->
<div class = " wrapper">
    <!--<div class="col-lg-12 col-sm-12">-->

        <div class="container">

        <div class="passport">
        <div class="passport-bg">
          <img src="{{ asset('site') }}/img/passport/pass_final.png" alt="">

        </div>
          <div class="passport_hat">
            <img src="{{ asset('site') }}/img/passport/PNG/Charlie-Cap.png" alt="">
          </div>
          <div class="profile_pic">
               <!-- check if file exists -->
                @if($user->type =='film_maker' && file_exists('images/filmmakers/'.$user->photo ))
                <img alt="" src="images/filmmakers/{{$user->photo}}">
                @else
                <img alt="" src="http://placehold.it/100x100?text=no image">
                @endif
                <!-- end check file -->
          </div>
          <div class="profile_social">
            <ul>

              @if($user->facebook_url != '')
              <li><a href="{{ $user->facebook_url ?:'' }}" target="_blank"><img src="{{ asset('site') }}/img/passport/facebook.png" alt=""></a></li>
              @endif
              @if($user->linkedin_url != '')

              <li><a href="{{ $user->linkedin_url ?:'' }}" target="_blank"><img src="{{ asset('site') }}/img/passport/twitter.png" alt=""></a></li>
              @endif
              @if($user->vimeo_url != '')

              <li><a href="{{ $user->vimeo_url ?:''}}" target="_blank"><img src="{{ asset('site') }}/img/passport/vimeo.png" alt=""></a></li>
              @endif
              @if($user->imdb_url != '')

              <li><a href="{{ $user->imdb_url ?:''}}" target="_blank"><img src="{{ asset('site') }}/img/passport/imdb.png" alt=""></a></li>
              @endif
              @if($user->instagram_url != '')

              <li><a href="{{ $user->instagram_url ?:'' }}" target="_blank"><img src="{{ asset('site') }}/img/passport/instagram.png" alt=""></a></li>
              @endif
              
            </ul>
          </div> <!--profile social -->

          <div class="passport_stamp">
            <img src="{{ asset('site') }}/img/passport/PNG/Stamp.png" alt="">
          </div>

          <div class="passport_text">
            <div class="title-full">
              <h3>i am..</h3>
              <p data-toggle="tooltip" title="{{$user->fullname}}">{{ $user->fullname ? str_limit($user->fullname,36) :'' }}</p>
            </div>
            <div class="title-full">
              <h3>a film..</h3>
              <?php $prof = json_decode($user->Profession);  ?> 
              <p data-toggle="tooltip" title="{{implode($prof,' & ')}}">
              <?php $count = count($prof); ?>
              @if(count($prof > 0))               
              {{ str_limit(implode($prof,' & '),42) }}
              @endif
              </p>

            </div>
            <div class="title-half">
              <h3>Country</h3>
              <p data-toggle="tooltip" title="{{$user->country}}">{{ $user->country ? str_limit($user->country,20) :'' }}</p>
            </div>
            <div class="title-half">
              <h3>Lives in</h3>
              <p data-toggle="tooltip" title="{{$user->city}}"> {{ $user->city ? str_limit($user->city,20) :'' }}</p>
            </div>
            <div class="title-half">
              <h3>Birthdate</h3>
              <p>{{ $birthdate ? : '' }}</p>
            </div>
            <!--<div class="title-half">-->
              <!--<h3>Gender</h3>-->
              <!--<p>Male</p>-->
            <!--</div>-->
            <div class="title-full">
              <h3>E-mail</h3>
              <p>{{ $user->email ? str_limit($user->email,60) :'' }}</p>
            </div>
          </div>
        </div> <!-- passport-->

      </div><!-- end container -->



        <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
            <div class="btn-group" role="group">
                <button type="button" id="bio" class="btn clicked" href="#tab1" data-toggle="tab"><span class="fa fa-info" aria-hidden="true"></span>
                    <div class="hidden-xs">Info</div>
                </button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="film" class="btn " href="#tab2" data-toggle="tab"><span class="fa fa-film" aria-hidden="true"></span>
                    <div class="hidden-xs">Films</div>
                </button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="submit_film" class="btn " href="#tab3" data-toggle="tab"><span class="fa fa-plane" aria-hidden="true"></span>
                    <div class="hidden-xs">Submitted Films</div>
                </button>
            </div>
        </div>


            <div class="tab-content">
                <div class="tab-pane fade in active " id="tab1">
                    <!--<h3>This is tab 1</h3>-->
                    <div class="container hidden-cs bio-tab">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bhoechie-tab-container">
                  <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 bhoechie-tab-menu">
                    <div class="list-group">
                      <a id="about" href="#" class="list-group-item active text-center">
                        <h4 class="fa fa-pencil-square-o"></h4><br/>Biography
                      </a>
                      <a id="filmography" href="#" class="list-group-item text-center">
                        <h4 class="fa fa-briefcase"></h4><br/>Filmography
                      </a>
                      <a id="awards" href="#" class="list-group-item text-center">
                        <h4><img id="awardsImage" src="{{ url('site').'/img/color-icon2.png' }}"></h4>Awards and Achievements
                      </a>
                      <a id="contact" href="#" class="list-group-item text-center">
                        <h4 class="fa fa-phone-square"></h4><br/>Contact Info
                      </a>
                      <!-- about , work , contact , follow -->
                      <!-- <a href="#" class="list-group-item text-center">
                        <h4 class="glyphicon glyphicon-credit-card"></h4><br/>Credit Card
                      </a> -->
                    </div>
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8 bhoechie-tab">
                      <!-- about section -->
                      <div id="about1" class="bhoechie-tab-content active">
                        <h5 style="color:#ff755a;">MINI BIO</h5>
                        <hr style="border-color: #ff755a;">
                          <div class="col-xs-12">
                            {!! $user->biography ? nl2br($user->biography) :'' !!}.
                          </div>
                      </div>
                      <!-- work section -->
                      <div id="filmography1" class="bhoechie-tab-content hidden">
                          <h5 style="color:#ff755a;">Filmography</h5>
                          <hr style="border-color: #ff755a;">
                          <div class="col-xs-12">
                              {!! $user->filmography ? nl2br($user->filmography) :'' !!}
                          </div>

                      </div>

                      <!-- follow sections -->
                      <div id="awards1" class="bhoechie-tab-content hidden">
                          <h5 style="color:#ff755a;">Awards and Achievements</h5>
                          <hr style="    border-color: #ff755a;">
                          <div class="col-xs-12">
                              {!! nl2br($user->awards) ? nl2br($user->awards) :'' !!}
                          </div>
                      </div>

                      <!-- contact section -->
                      <div id="contact1" class="bhoechie-tab-content hidden">
                          <!-- <center>
                            <h1 class="glyphicon glyphicon-home" style="font-size:12em;color:#ff755a"></h1>
                            <h2 style="margin-top: 0;color:#ff755a">Cooming Soon</h2>
                            <h3 style="margin-top: 0;color:#ff755a">Hotel Directory</h3>
                          </center> -->
                          <h5 style="color:#ff755a;">CONTACT INFORMATION</h5>
                          <hr style="border-color: #ff755a;">
                          <!--Phone  -->
                          <div class="row">


                          <div class="col-sm-3">

                            <!-- <i class="fa fa-phone"></i> -->
                            Mobile Phone:

                          </div>
                          <div class="col-sm-9">
                            {{ $user->phone ? $user->phone :'' }}
                          </div>
                          </div>
                          <!-- Address -->
                          <div class="row">


                          <div class="col-sm-3">

                            <!-- <i class="fa fa-map-marker"></i> -->
                            Address:

                          </div>
                          <div class="col-sm-9">
                            {{ $user->address ?:'' }}
                          </div>
                          </div>
                          <!--Email  -->
                          <div class="row">


                          <div class="col-sm-3">

                            <!-- <i class="fa fa-envelope"></i> -->
                            Email:

                          </div>
                          <div class="col-sm-9">
                            {{ $user->email ?:'' }}
                          </div>
                          </div>
                          <h5 style="color:#ff755a;">BASIC INFORMATION</h5>
                          <hr style="    border-color: #ff755a;">
                          <!-- Birth Date -->
                          <div class="row">


                          <div class="col-sm-3">

                            <!-- <i class="fa fa-map-marker"></i> -->
                            Birth Date:

                          </div>
                          <div class="col-sm-9">
                            {{ $birthdate ? : '' }}
                          </div>
                          </div>
                          <!-- Gender -->
                          <div class="row">


                          <div class="col-sm-3">

                            Gender:

                          </div>
                          <div class="col-sm-9">
                            {{ $user->gender ? ucfirst($user->gender) :'' }}
                          </div>
                          </div>
                      </div>

                      <!-- <div class="bhoechie-tab-content hidden">
                          <center>
                            <h1 class="glyphicon glyphicon-credit-card" style="font-size:12em;color:#ff755a"></h1>
                            <h2 style="margin-top: 0;color:#ff755a">Cooming Soon</h2>
                            <h3 style="margin-top: 0;color:#ff755a">Credit Card</h3>
                          </center>
                      </div> -->
                  </div>
              </div>
        </div>
                </div>
                <div class="tab-pane fade in" id="tab2">
                    <!-- <h3>This is tab 2</h3> -->
                    <div class="container">




@if(count($films) > 0)
        @foreach($films as $film)
                                 <div class="pull-right" style="padding-top: 30px;padding-right: 30px;">
                                   
                                   <p class="lead" style="font-weight: bold;">{{ $film->status == 1 ? 'Public Film' : 'Private Film' }}</p>
                                 </div>

                  <table cellspacing="0" cellpadding="0" border="0" class="nm-title-overview-widget-layout">
                            <tbody>
                                <tr>
                                    <td rowspan="2" valign="top" id="img_primary">
                                        <div class="image">
                    <a href="{{ url($film->film_url) }}"> <div class="hover-over-image zero-z-index">
                     <!-- check if file exists -->
                  @if(file_exists('images/filmsprofile/'.$film->film_poster))
                    <img class="poster shadowed" height="209" width="140" alt="" title="Six (2013)" src="{{ url('/') }}/images/filmsprofile/{{$film->film_poster }}" itemprop="image">

                    @else
                    <img class="poster shadowed" height="209" width="140" alt="" title="Six (2013)" src="http://placehold.it/209x140?text=no image" itemprop="image">
                    @endif
                    <!-- end check file -->
                    <!-- year , category , synopsis , crew -->


                    </div>
                    </a>                    </div>
                                    </td>
                                    <td class="overview-top">

                                        <h4 itemprop="name"><a href="{{ url($film->film_url) }}" title="" itemprop="url"> {{ $film->english_title }}</a>

                                        <br>
                                        <a href="{{ url($film->film_url) }}">{{ $film->original_title }}</a></h4>
                                        <p class="cert-runtime-genre">

                                      <time itemprop="duration" datetime="PT103M">{{ date("Y",strtotime($film->production_date)) }} </time>
                                                    &nbsp;&nbsp;-&nbsp;&nbsp;
                                              @if(count($film->categories) > 0)
                                              {{ $film->categories->implode('name',' | ') }}
                                              @endif

                                        </p>
                                        <div class="outline" itemprop="description">
                    {{ $film->short_synopsis_english }}

.                    </div>
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td class="overview-bottom">

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr style="border-color:#ff755a;;" />

     @endforeach
     @else
     <h3 class="text-center">No Public or Private Films Found For {{ $user->fullname }}</h3>       
     @endif





</div>
<!-- end  films tab -->




        

    </div><!--End Container of film list -->


  <!-- show submitted films -->
  <div class="tab-pane fade in" id="tab3">
                
        <!-- <h3>This is tab 2</h3> -->
        <div class="container">

        @if(Auth::check() && Auth::user()->id == \App\User::where('username',$user->username)->first()->id)
        @if(count($submitted_films) > 0)
        @foreach($submitted_films as $film)
               <div class="pull-right" style="padding-top: 30px;padding-right: 30px;">

              @foreach(festivalSubmitted($film->id) as $festival)
                <h5>
                <span style="font: 22px;">{{ str_limit(\App\User::find($festival->user_id)->fullname,30) }}</span>&nbsp;&nbsp;&nbsp;

                @if(filmSeen($film->id,$festival->id) == true)
                <a  href="#" data-toggle="tooltip" title="seen"><i style="color: green;" class="fa fa-eye fa-2x"></i></a> &nbsp;&nbsp;&nbsp;
                @else
                <a  href="#" data-toggle="tooltip" title="unseen"><i style="color: grey;" class="fa fa-eye-slash fa-2x"></i></a> &nbsp;&nbsp;&nbsp;
                @endif

                @if(filmSelected($film->id,$festival->id) == true)
                <a  href="#" data-toggle="tooltip" title="selected"><i style="color: green;" class="fa fa-thumbs-up fa-2x"></i></a>
                </h5>
                @else
                <a  href="#" data-toggle="tooltip" title="unselected"><i style="color: grey;" class="fa fa-thumbs-down fa-2x"></i></a>
                </h5>
                @endif

              @endforeach


               </div>

                  <table cellspacing="0" cellpadding="0" border="0" class="nm-title-overview-widget-layout">
                            <tbody>
                                <tr>
                                    <td rowspan="2" valign="top" id="img_primary">
                                        <div class="image">
                    <a href="{{ url($film->film_url) }}"> <div class="hover-over-image zero-z-index">
                     <!-- check if file exists -->
                  @if(file_exists('images/filmsprofile/'.$film->film_poster))
                    <img class="poster shadowed" height="209" width="140" alt="Six (2013) Poster" title="Six (2013)" src="{{ url('/') }}/images/filmsprofile/{{$film->film_poster }}" itemprop="image">

                    @else
                    <img class="poster shadowed" height="209" width="140" alt="Six (2013) Poster" title="Six (2013)" src="http://placehold.it/209x140?text=no image" itemprop="image">
                    @endif
                    <!-- end check file -->
                    <!-- year , category , synopsis , crew -->


                    </div>
                    </a>                    </div>
                                    </td>
                                    <td class="overview-top">

                                        <h4 itemprop="name"><a href="{{ url($film->film_url) }}" title="Six (2013)" itemprop="url"> {{ $film->english_title }}</a><br>
                                        <a href="">{{ $film->original_title }}</a</h4>
                                        <p class="cert-runtime-genre">

                                      <time itemprop="duration" datetime="PT103M">{{ date("Y",strtotime($film->production_date)) }} </time>
                                                    &nbsp;&nbsp;-&nbsp;&nbsp;
                                              @if(count($film->categories) > 0)
                                              {{ $film->categories->implode('name',' | ') }}
                                              @endif

                                        </p>
                                        <div class="outline" itemprop="description">
                                        {{ $film->short_synopsis_english }}

.                    </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="overview-bottom">
                    {{--@if($film->status == 1)--}}
                    <a class="popup-youtube popup-vimeo btn2 btn2_simple small title-trailer video-colorbox btn btn-success" href="{{ $film->trailer_link }}"> Watch Trailer</a>
                    {{--@else--}}
                    {{--<button class=" btn2 btn2_simple small title-trailer video-colorbox btn btn-success"> Can't Watch Trailer </button>--}}
                    {{--@endif--}}

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <hr style="border-color:#ff755a;;" />

         @endforeach
         @else
         <h3 class="text-center">Please Submit a Film</h3>       
         @endif

     @else
     <p class="text-center">can't see {{ $user->fullname }} submitted films</p>
     @endif    



</div><!--End Container of film list -->

                </div>





            </div>

<!--</div>-->
    </div>
    <!--end profile wrapper-->
@stop


@section('footer.scripts')

<script src="{{ asset('site') }}/js/app/iamafilm.js"></script>
<script src="{{ asset('site') }}/js/app/magnific.js"></script>
<script>
  
  $(document).ready(function() {
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });
});


</script>
<script>
  $(document).ready(function () {

      $("#awardsImage").attr('src','{{ url('site').'/img/color-icon2.png'  }}');

      $("#awards").on('click',function () {

          $("#awardsImage").attr('src','{{ url('site').'/img/white-icon2.png'  }}');

      });   

      $("#about").on('click',function () {

      $("#awardsImage").attr('src','{{ url('site').'/img/color-icon2.png'  }}');

      }); 

      $("#filmography").on('click',function () {

      $("#awardsImage").attr('src','{{ url('site').'/img/color-icon2.png'  }}');

      }); 

      $("#contact").on('click',function () {

      $("#awardsImage").attr('src','{{ url('site').'/img/color-icon2.png'  }}');

      });


  });

</script>

@stop