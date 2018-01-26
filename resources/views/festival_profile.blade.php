@extends('partials.partialsapp')



@section('header.scripts')
    <link href="https://file.myfontastic.com/n6vo44Re5QaWo8oCKShBs7/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site') }}/css/iamafilm.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/festival_profile.css">

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
            {{--<img src="{{ asset('site') }}/img/passport/PNG/Charlie-Cap.png" alt="">--}}
          </div>
          <div class="profile_pic">
               <!-- check if file exists -->
                @if($user->type =='festival' && file_exists('images/festivals/profiles/'.$user->logo_url ))
                <img alt="" src="images/festivals/profiles/{{$user->logo_url}}">
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
              <p data-toggle="tooltip" title="{{$user->fullname}}">{{ $user->fullname ? str_limit($user->fullname,45) :'' }}</p>
            </div>
            <div class="title-full">
              <h3>edition..</h3>
              <p>
              {{ ''.$user->edition ?:'' }}
              </p>

            </div>
            <!--<div class="title-half">-->
              <!--<h3>Gender</h3>-->
              <!--<p>Male</p>-->
            <!--</div>-->
            <div class="title-full">
              <h3>Film Type</h3>
              @if($user->film_type != '')
              <p data-toggle="tooltip" title="{{implode(json_decode($user->film_type),', ')}}">{{ str_limit(implode(json_decode($user->film_type),', '),48) }}</p>
              @endif
            </div>
              <div class="title-half">
              <h3>Email</h3>
              <p data-toggle="tooltip" title="{{$user->email}}"><a href="mailto:{{ $user->email }}" target="_top">  {{ ''.$user->email ? str_limit($user->email,14) :'' }}</a></p>
              </div>
            <div class="title-half">
            <h3>Website</h3>
            <p data-toggle="tooltip" title="{{$user->website_url}}"><a href="{{ $user->website_url }}">  {{ ''.$user->website_url? str_limit($user->website_url,22) :'' }}</a></p>
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
                    <div class="hidden-xs">Editions</div>
                </button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" id="submit_film" class="btn " href="#tab3" data-toggle="tab"><span class="fa fa-plane" aria-hidden="true"></span>
                    <div class="hidden-xs">Coming Soon</div>
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
                        <h4 class="fa fa-pencil-square-o"></h4><br/>Festival Info
                      </a>
                      <a id="filmography" href="#" class="list-group-item text-center">
                        <h4 class="fa fa-briefcase"></h4><br/>Festival Team 
                      </a>
                      <a id="awards" href="#" class="list-group-item text-center">
                        <h4><img id="awardsImage" src="{{ url('site').'/img/color-icon2.png' }}"></h4>Awards and Regulations
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
                        <h5 style="color:#ff755a;">Festival Info</h5>
                        <hr style="border-color: #ff755a;">
                          <div class="col-xs-12">
                            {!! $user->biography ? nl2br($user->biography) :'' !!}.
                          </div>
                      </div>
                      <!-- work section -->
                      <div id="filmography1" class="bhoechie-tab-content hidden">
                          <h5 style="color:#ff755a;">Team</h5>
                          <hr style="border-color: #ff755a;">
                          <div class="col-xs-12">
                             {!! $user->team ? nl2br($user->team) :'' !!}.  
                          </div>

                      </div>

                      <!-- follow sections -->
                      <div id="awards1" class="bhoechie-tab-content hidden">
                          <h5 style="color:#ff755a;">Awards and Regulations</h5>
                          <hr style="    border-color: #ff755a;">
                          <div class="col-xs-12">
                              {!! $user->awards ? nl2br($user->awards) :'' !!}. 
                          </div>
                          {{--<h5 style="color:#ff755a;">Selected Films</h5>--}}
                          {{--<hr style="    border-color: #ff755a;">--}}
                          {{--<div class="col-xs-12">--}}
                              {{--{!! $user->selections ? nl2br($user->selections) :'' !!}.--}}
                          {{--</div>--}}
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
                          <!-- Address -->
                          <div class="row">


                          <div class="col-sm-3">

                            <!-- <i class="fa fa-map-marker"></i> -->
                            Country:

                          </div>
                          <div class="col-sm-9">
                             {{ $user->country ?:'' }}
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

                        <!-- Film #1 Six -->

                        @if(count($editions) > 0)
                            @foreach($editions as $edition)

                                <table cellspacing="0" cellpadding="0" border="0" class="nm-title-overview-widget-layout">
                                    <tbody>
                                    <tr>
                                        <td rowspan="2" valign="top" id="img_primary">
                                            <div class="image">
                                                <a href="{{ url('festival/edition_details'.'/'.$edition->id) }}"> <div class="hover-over-image zero-z-index">
                                                        <!-- check if file exists -->
                                                        @if(file_exists('images/editions/profileview/'.$edition->path))
                                                            <img class="poster shadowed" height="209" width="140" alt="" title="" src="{{ url('/').'/images/editions/profileview/'.$edition->path }}" itemprop="image">

                                                        @else
                                                            <img class="poster shadowed" height="209" width="140" alt="" title="" src="http://placehold.it/209x140?text=no image" itemprop="image">
                                                       @endif
                                                    <!-- end check file -->
                                                        <!-- year , category , synopsis , crew -->


                                                    </div>
                                                </a>                    </div>
                                        </td>
                                        <td class="overview-top">

                                            <h4 itemprop="name"><a href="{{ url('festival/edition_details'.'/'.$edition->id) }}" title="" itemprop="url"> Edition #{{ $edition->number }}</a></h4>
                                            <p class="cert-runtime-genre">

                                                <time itemprop="duration" datetime="">{{ $edition->year }} </time>
                                                &nbsp;


                                            </p>
                                            <div class="outline" itemprop="description">
                                                {{--{{ $edition->awards }}--}}
                                                {!! $edition->awards ? nl2br($edition->awards ) :'' !!}.

                                                .                    </div>
                                            <div class="outline" itemprop="description">
                                                <h5 >Jury:</h5>

                                                {!! $edition->jury ? nl2br($edition->jury ) :'' !!}.

                                                {{--{{$edition->jury}}--}}


                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                                <hr style="border-color:#ff755a;;" />

                            @endforeach
                        @else
                            <h3 class="text-center">No Editions Found For {{ $user->fullname }}</h3>
                        @endif



                    </div><!--End Container of film list -->
                </div>
                <div class="tab-pane fade in" id="tab3">
                <br><br><br>
                    <h3 class="text-center" style="width: 70%;"> {{ $user->fullname }} Wait for the next Update </h3><br><br><br>
                </div>
            </div>

<!--</div>-->
    </div>
    <!--end profile wrapper-->
@stop


@section('footer.scripts')

<script src="{{ asset('site') }}/js/app/iamafilm.js"></script>
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