@extends('partials.partialsapp')



@section('header.scripts')

    <link rel="stylesheet" href="{{ asset('site') }}/css/film-details.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/magnific.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

@stop


@section('content')

<!--Content-->

<div class="container film-details">
    <div class="row">
        <div class="col-md-3">

            <h4>{{ $film->english_title}}</h4>
            <h4>{{ $film->original_title}}</h4>
            @if(count($film->directors) > 0)            
            <p><span class="bold">Director:</span>
            {{ $film->directors->implode('name',' , ') }}<a data-toggle="modal" data-target="#director" href="">
            <i style="color: #ff7550;" class="fa fa-address-card fa-2x" aria-hidden="true"></i></a>
            </p>            
            @endif

            @if(count($film->producers) > 0)            
            <p><span class="bold">Producer:</span>
            {{ $film->producers->implode('name',' , ') }}<a data-toggle="modal" data-target="#producer" href="">
            <i style="color: #ff7550;" class="fa fa-address-card fa-2x" aria-hidden="true"></i></a>
            </p>            
            @endif

            @if(count($film->team) > 0)

            <?php $writers = $film->team()->where('type','Writer')->get(); ?>
            @if(count($writers) > 0)            
            <p><span class="bold">Writer:</span>
            @foreach($writers as $key => $value)
               {{ $value->first_name.' '.$value->last_name }}{{ $key == (count($writers)-1) ? '':',' }} 
            @endforeach   
            </p>
            @endif
            
            <?php $editors = $film->team()->where('type','Editor')->get(); ?>
            @if(count($editors) > 0)
            <p><span class="bold">Editor:</span>
            @foreach($editors as $key => $value)
               {{ $value->first_name.' '.$value->last_name }}{{ $key == (count($editors)-1) ? '':',' }} 
            @endforeach 
            </p>  
            @endif

            <?php $dop = $film->team()->where('type','D.O.P ')->get(); ?>
            @if(count($dop) > 0)            
            <p><span class="bold">d.o.p:</span>
            @foreach($dop as $key => $value)
               {{ $value->first_name.' '.$value->last_name }}{{ $key == (count($dop)-1) ? '':',' }} 
            @endforeach
            </p>   
            @endif
            

            <?php $editors = $film->team()->where('type','Sound Designer')->get(); ?>
            @if(count($editors) > 0)
            <p><span class="bold">Sound Design:</span>
            @foreach($editors as $key => $value)
               {{ $value->first_name.' '.$value->last_name }}{{ $key == (count($editors)-1) ? '':',' }} 
            @endforeach
            </p>  
            @endif

            <?php $editors = $film->team()->where('type','Sound Mixer')->get(); ?>
            @if(count($editors) > 0)            
            <p><span class="bold">Sound Mix:</span>
            @foreach($editors as $key => $value)
               {{ $value->first_name.' '.$value->last_name }}{{ $key == (count($editors)-1) ? '':',' }} 
            @endforeach
            </p>   
            @endif
            

            <?php $editors = $film->team()->where('type','Music Composer')->get(); ?>
            @if(count($editors) > 0)
            <p><span class="bold">Music</span>
            @foreach($editors as $key => $value)
               {{ $value->first_name.' '.$value->last_name }}{{ $key == (count($editors)-1) ? '':',' }} 
            @endforeach 
            </p>  
            @endif

            
            <?php $editors = $film->team()->where('type','Art Director')->get(); ?>
            @if(count($editors) > 0)
            <p><span class="bold">Art Director:</span>
            @foreach($editors as $key => $value)
               {{ $value->first_name.' '.$value->last_name }}{{ $key == (count($editors)-1) ? '':',' }} 
            @endforeach
            </p>   
            @endif

            
            @endif

        </div>
        <div class="col-md-3">
            <h4>Awards </h4>
            {!! nl2br($film->awards) !!}
        </div>
        <div class="col-md-6">
            <div class="col-md-12">
            

            @if($film->status == 1)
            <iframe width="560" height="315" src="{{$sub_url}}/{{ $video_id ? : 'gIYaTs1Kw90' }}" frameborder="0" allowfullscreen></iframe>
            @elseif($film->status == 0 && Auth::check() && $film->user_id == Auth::user()->id)

                <iframe width="560" height="315" src="{{$sub_url}}/{{ $video_id ? : 'gIYaTs1Kw90' }}" frameborder="0" allowfullscreen></iframe>
                <div class="col-md-12 social-icon text-center">
                    <p class="lead"><span class="bold">Film Password : </span>{{ $film->film_password ? : '' }}  </p>
                </div>


            @elseif(isset($fest_owner) && $fest_owner == true)

                <iframe width="560" height="315" src="{{$sub_url}}/{{ $video_id ? : 'gIYaTs1Kw90' }}" frameborder="0" allowfullscreen></iframe>
                    <p class="lead"><span class="bold">Film Password : </span>{{ $film->film_password ? : '' }}  </p>


            @elseif(isset($prog_owner) && $prog_owner == true)

                <iframe width="560" height="315" src="{{$sub_url}}/{{ $video_id ? : 'gIYaTs1Kw90' }}" frameborder="0" allowfullscreen></iframe>
                <p class="lead"><span class="bold">Film Password : </span>{{ $film->film_password ? : '' }}  </p>

            @else
                <div class="alert alert-warning">
                    <i class="fa fa-exclamation-triangle">  Private film can't be viewed except by the owner</i>
                </div>
            @endif

        </div>
        <div class="col-md-12 social-icon">
                <ul>
                    @if($film->website_url != '')
                    <li><a href="{{ $film->website_url ?:'' }}" target="_blank">
                        <i style="color: blue;" class="fa fa-globe fa-3x" aria-hidden="true"></i>
                    </a></li>
                    @endif
                    @if($film->facebook_link != '')
                    <li><a href="{{ $film->facebook_link ?:'' }}" target="_blank"><img src="{{ asset('site') }}/img/passport/facebook.png" alt=""></a></li> 
                    @endif
                    @if($film->twitter_link != '')
                    <li><a href="{{ $film->twitter_link ?:'' }}" target="_blank"><img src="{{ asset('site') }}/img/passport/twitter.png" alt=""></a></li>
                    @endif
                    @if($film->vimeo_link != '')
                    <li><a href="{{ $film->vimeo_link ?:''}}" target="_blank"><img src="{{ asset('site') }}/img/passport/vimeo.png" alt=""></a></li>
                    @endif
                    @if($film->imdb_link != '')
                    <li><a href="{{ $film->imdb_link ?:''}}" target="_blank"><img src="{{ asset('site') }}/img/passport/imdb.png" alt=""></a></li>
                    @endif
                    @if($film->instagram_link != '')
                    <li><a href="{{ $film->instagram_link ?:'' }}" target="_blank"><img src="{{ asset('site') }}/img/passport/instagram.png" alt=""></a></li>
                    @endif

                </ul>
        </div>


    </div>
    </div>

    <div class="row">
          <h4>Offical Selection </h4>
             {!! nl2br($film->selection) !!}
   
    </div><br><br>

    <div class="row">
        <div class="col-md-6 col-sm-12">
            @if(count($film->short_synopsis) > 0)
                <h4>Short Synopsis (Original)</h4>
                <p>
                    {{ $film->short_synopsis }}
                </p>
            @endif
        </div>
        <div class="col-md-6 col-sm-12">
            @if(count($film->long_synopsis) > 0)
                <h4>Long Synopsis (Original)</h4>
                <p>
                    {{ $film->long_synopsis }}
                </p>
            @endif
        </div>
            <div class="col-md-6 col-sm-12">
                @if(count($film->short_synopsis_english) > 0)
                    <h4>Short Synopsis (English)</h4>
                    <p>
                        {{ $film->short_synopsis_english }}
                    </p>
                @endif
            </div>
                    <div class="col-md-6 col-sm-12">
                        @if(count($film->long_synopsis_english) > 0)
                            <h4>Long Synopsis (English)</h4>
                            <p>
                                {{ $film->long_synopsis_english }}
                            </p>
                        @endif
                    </div>
            </div>
    <br><br>

    <div class="row">
          <h4 class="text-center">Film Poster </h4><br>


        <div class="col-md-4"></div>

             <div class="col-md-4 text-center popup-gallery">
                 @if(file_exists('images/filmmaterials/'.$film->film_poster))
                     <a href="{{ url('images/filmmaterials').'/'.$film->film_poster }}" title="Film Poster">
                 <img src="{{ url('images/filmmaterials').'/'.$film->film_poster }}" class="image-responsive" width="100%" style="max-height: 400px;">
                     </a>
                     {{--@else--}}
                 {{--<img src="http://placehold.it/1000x300?text=no image" class="image-responsive" >--}}
                 @endif
             </div>
        <div class="col-md-4"></div>
   
    </div><br><br>
    <div class="row ">
          <h4 class="text-center">Film Stills </h4><br>

             <div class="col-md-3 text-center popup-gallery">
                 @if(file_exists('images/filmmaterials/'.$film->film_still_one))
                     <a href="{{ url('images/filmmaterials').'/'.$film->film_still_one }}" title="Film Still 1">
                 <img src="{{ url('images/filmmaterials').'/'.$film->film_still_one }}" class="image-responsive" width="100%" style="max-height: 400px;">
                     </a>
                 {{--@else--}}
                 {{--<img src="http://placehold.it/200x300?text=no image" class="image-responsive" >--}}
                 @endif
             </div>

             <div class="col-md-3 text-center popup-gallery">
                 @if(file_exists('images/filmmaterials/'.$film->film_still_two))
                     <a href="{{ url('images/filmmaterials').'/'.$film->film_still_two }}" title="Film Still 2">
                 <img src="{{ url('images/filmmaterials').'/'.$film->film_still_two }}" class="image-responsive" width="100%" style="max-height: 400px;">
                     </a>
                     {{--@else--}}
                 {{--<img src="http://placehold.it/220x300?text=no image" class="image-responsive" >--}}
                 @endif
             </div>

             <div class="col-md-3 text-center popup-gallery">
                 @if(file_exists('images/filmmaterials/'.$film->film_still_three))
                     <a href="{{ url('images/filmmaterials').'/'.$film->film_still_three }}" title="Film Still 3">
                 <img src="{{ url('images/filmmaterials').'/'.$film->film_still_three }}" class="image-responsive" width="100%" style="max-height: 400px;">
                     </a>
                     {{--@else--}}
                 {{--<img src="http://placehold.it/200x300?text=no image" class="image-responsive" >--}}
                 @endif
             </div>

             <div class="col-md-3 text-center popup-gallery">
                 @if(file_exists('images/filmmaterials/'.$film->film_still_four))
                     <a href="{{ url('images/filmmaterials').'/'.$film->film_still_four }}" title="Film Still 4">
                 <img src="{{ url('images/filmmaterials').'/'.$film->film_still_four }}" class="image-responsive" width="100%" style="max-height: 400px;">
                     </a>
                     {{--@else--}}
                 {{--<img src="http://placehold.it/200x300?text=no image" class="image-responsive" >--}}
                 @endif
             </div>
   
    </div><br><br>

    <div class="row">
          <h4 class="text-center">Director Photo </h4><br>


            <div class="col-md-4"></div>
             <div class="col-md-4 text-center popup-gallery">
                 @if(file_exists('images/filmmaterials/'.$film->director_photo))
                     <a href="{{ url('images/filmmaterials').'/'.$film->director_photo }}" title="Director Photo">
                 <img src="{{ url('images/filmmaterials').'/'.$film->director_photo }}" class="img-responsive img-circle" width="100%" style="max-height: 400px;">
                     </a>
                     {{--@else--}}
                 {{--<img src="http://placehold.it/400x300" class="image-responsive" >--}}
                 @endif
             </div>
             <div class="col-md-4"></div>
   
    </div><br><br>


    <div class="row">
          <h4 class="text-center">Dialogue List </h4><br>

             <div class="col-md-6">

                 @if(file_exists('images/filmmaterials/'.$film->dialogue_list))
                           
                    {{--<div class="alert alert-info" id="film{{ $film->id }}">--}}
                        <ul>
                            <li  class="alert alert-info" id="film{{ $film->id }}" > {{ str_limit($film->dialogue_list_original,22) }}
                    
                     <a class="pull-right delete_dialogue" href="{{ url('images/filmmaterials').'/'.$film->dialogue_list }}" data-toggle="tooltip" title="Download File" download><i class="fa fa-download fa-lg"></i></a>

                             </li>

                        </ul>
                    {{--</div>--}}

                 @endif

             </div>
             <div class="col-md-6"></div>
   
    </div><br><br>

    <div class="row">
          <h4 class="text-center"> Press Kit </h4><br>

             <div class="col-md-6">

                 @if(file_exists('images/filmmaterials/'.$film->press_kit))
                           
                    {{--<div class="alert alert-info">--}}
                        <ul>
                            <li class="alert alert-info"> {{ str_limit($film->press_kit_original,22) }}
                    
                     <a class="pull-right" href="{{ url('images/filmmaterials').'/'.$film->press_kit }}" data-toggle="tooltip" title="Download File" download><i class="fa fa-download fa-lg"></i></a>

                             </li>

                        </ul>
                    {{--</div>--}}

                 @endif

             </div>
             <div class="col-md-6"></div>
   
    </div><br><br>


    <div class="row">
          <h4 class="text-center">Subtitles </h4><br>

             <div class="col-md-6">

         @if(count($film->subtitles) > 0)
                   
            <div>
                <ul>
                    @foreach($film->subtitles as $sub)
                    <li id="sub{{ $sub->id }}" class="alert alert-info"> 

                        {{ str_limit($sub->name,60) }}
                         <a class="pull-right delete_sub" href="{{ $sub->path }}" data-toggle="tooltip" title="Download File" download><i class="fa fa-download fa-lg"></i></a>

                     </li>
                     @endforeach

                </ul>
            </div>

         @endif

             </div>
             <div class="col-md-6"></div>
   
    </div><br><br>


    <div class="row">
          <h4 class="text-center">Other Materials </h4><br>

             <div class="col-md-6">

         @if(count($film->otherMaterial) > 0)
                   
            <div>
                <ul>
                    @foreach($film->otherMaterial as $sub)
                    <li id="sub{{ $sub->id }}" class="alert alert-info"> 

                        {{ str_limit($sub->name,60) }}
                         <a class="pull-right delete_sub" href="{{ $sub->path }}" data-toggle="tooltip" title="Download File" download><i class="fa fa-download fa-lg"></i></a>

                     </li>
                     @endforeach

                </ul>
            </div>

         @endif

             </div>
             <div class="col-md-6"></div>
   
    </div><br><br>



</div>




    <!-- Director Modal -->
    <div class="modal fade" id="director" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <h4 class="modal-title" id="myModalLabel21">
                Directors Contacts
              <button  type="button" class="close " data-dismiss="modal" aria-hidden="true">
                X
              </button>
              </h4>
            </div>
            <div>
              <!-- start modal body -->
                        
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                            @foreach($film->directors as $dir)
                            <tr>
                                <td>{{ $dir->name }}</td>
                                <td>{{ $dir->email }}</td>
                                <td>{{ $dir->phone }}</td>
                            </tr>
                            @endforeach
                        </table>

                      </div>
                 </form>
           <div class="modal-footer">
                      <div class="form-group">

                      </div>
                      <div class="form-group">
                       <input type="hidden" id="product_id_delete" name="product_id" value="0">

                          <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancel <i class="fa fa-remove" aria-hidden="true"></i>
                           
                          </button> 

                      </div>
                 </form>

           </div>
    
                    
              <!-- end modal body -->
            </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end director modal -->




    <!-- producer Modal -->
    <div class="modal fade" id="producer" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <h4 class="modal-title" id="myModalLabel21">
                Producers Contacts
              <button  type="button" class="close " data-dismiss="modal" aria-hidden="true">
                X
              </button>
              </h4>
            </div>
            <div>
              <!-- start modal body -->
                        
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                            @foreach($film->producers as $dir)
                            <tr>
                                <td>{{ $dir->name }}</td>
                                <td>{{ $dir->email }}</td>
                                <td>{{ $dir->phone }}</td>
                            </tr>
                            @endforeach
                        </table>

                      </div>
                 </form>
           <div class="modal-footer">
                      <div class="form-group">

                      </div>
                      <div class="form-group">
                       <input type="hidden" id="product_id_delete" name="product_id" value="0">

                          <button type="button" class="btn btn-primary" data-dismiss="modal"> Cancel <i class="fa fa-remove" aria-hidden="true"></i>
                           
                          </button> 

                      </div>
                 </form>

           </div>
    
                    
              <!-- end modal body -->
            </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end producer modal -->

<!--End Content-->
@stop


@section('footer.scripts')
    <script src="{{asset('site') }}/js/lib/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('site') }}/js/app/film_detailed.js"></script>




@stop