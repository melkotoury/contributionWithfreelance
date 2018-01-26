<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>I am a film | Submit Your Short Movie</title>
    <meta name="keywords" content="short films, films, festivals, submit your films, i am a film, film makers, submit my film to festivals">
    <meta name="description" content="submit your short film , film festivals , directors , editors , short films">
    <meta name="viewport" content="width=device-width">

    <meta property="og:title" content="Iamafilm | Designed By Root Cave">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.iamafilm.com">
    <meta property="og:site_name" content="Iamafilm">
    <meta property="og:description" content="short films, films, festivals, submit your films, i am a film, film makers, submit my film to festivals">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <link href="{{ asset('site') }}/css/jqvmap.css" media="screen" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/custom-styles.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/component.css">


    <script src="{{ asset('site') }}/js/lib/jquery.min.js" ></script>
    <script src="{{ asset('site') }}/js/lib/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <style type="text/css">

        .btn-primary{
            background-color: #ff755a!important;
            color: white;
            border-color: #ff755a!important;
        }
        .btn-primary:hover,.btn-primary:active,.btn-primary:visited,.btn-primary:focus{

            background-color: #ff7752 !important;
            color: white;
            border-color: #ff7752!important;
        }
        .btn-inverse{
            background: white;
            color: #ff755a;
            border-color: white;
        }
        .btn-inverse:active,.btn-inverse:hover,.btn-inverse:visited{
            background: #fffcfb;
            color: #ff755a;
            border-color: #fffcfb;
        }
    </style>

    <!-- Fav and touch icons -->
    <link rel="stylesheet" href="{{ url('site') }}/css/submitted_films.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/magnific.css">



    <style type="text/css">

    .btn-primary:hover,.btn-primary:active,.btn-primary:visited,.btn-primary:focus{

        background-color: #ff755a!important;
    }
       .ajax-load{

            padding: 10px 0px;
            width: 100%;
        }

        .sort_alpha:hover, .sort_sub_date:hover, .sort_prod_date:hover,
         .sort_duration:hover ,.so:hover {


            border: none!important;
            transition: none;
            padding: 0;
        }


</style>

</head>

<body>

@include('partials.navbar')


<!--Content-->
<div id="contenido">


        <div id="data">
            <div class="submitted_search">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-3"></div>
                        <div class="col-xs-3"></div>
                        <div class="col-xs-3"></div>
                        <div class="col-xs-3">
                            <button href="#" data-toggle="modal" data-target="#searchModal" class="btn btn-primary"><i class="fa fa-search"></i></button>

                        </div>
                    </div> <!-- row of submitted films-->
                </div> <!-- container of submitted films-->
            </div> <!-- end submitted search -->

            <div class="submitted_select_edition_and_sort_criteria">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-3 select_edition">
                            <p>Select Edition</p>
                            <select name="" id="" class="campo">
                                <option value="" selected="selected">{{ date('Y') }} ( {{ count(\App\FilmSubmit::where('festival_id',$festival->id)->get()) }} films)</option>

                            </select>
                        </div>
                         <div class="col-xs-3" style="margin-top: 65px;">
                            <div class="row">
                                <div class="col-md-3">
                                    <span class="sort_text">Order By </span>
                                </div>
                                <div class="col-md-9">
                                   <select data-id="{{ $festival->id }}" class="form-control select_comp">
                                    @if(count($festival->competetions) >0)
                                    @foreach($festival->competetions as $comp)
                                        <option value="{{ $comp->id }}">{{ $comp->comp_name  }}</option>
                                    @endforeach
                                    @endif    
                                    </select> 
                                </div>
                            </div>
                            
                        </div>
    <div class="col-xs-6 pull-right" style="margin-top: 65px;">

        <div class="row">
        <div class="col-xs-4 col-md-3"><a href="" data-status="0" class="sort_alpha"><span class="sort_text pull-right">Alphabetically</span></a></div>
        <div class="col-xs-3 col-md-2"><a href="" data-status="0" class="sort_sub_date"><span class="sort_text pull-right">Submission Date</span></a></div>
        <div class="col-xs-3 col-md-3"><a href="" data-status="0" class="sort_duration"><span class="sort_text pull-right">Duration</span></a></div>
        <div class="col-xs-3 col-md-2"><a href="" data-status="0" class="sort_prod_date"><span class="sort_text pull-right">Production Date</span></a></div>
        <div class="col-xs-2 col-md-1"><a href="javascript:;" data-status="0" class="so"><span class="sort_text pull-right">Viewed</span></a></div>


        </div>
    </div>
                     </div><!-- end row in select edition and sort criteria-->
                </div><!-- end container in select edition and sort criteria-->
            </div><!-- end  select edition and sort criteria-->


<div class="submitted_folder">
<div class="container">
<div class="row">
    <div class="col-xs-3 submitted_folder_content">

        <!-- start folder tree -->
        <div class="tree well" id="Folders">

                @if(count($folders) > 0)
                @include('partials.folders') 
                @else
                 <a href="#" data-toggle="modal" data-target="#modd"><i class="fa fa-folder-open"></i> Create folder</a>

                <p class="text-center">no folders added yet</p>
                @endif




        </div>
        <!-- end folder tree -->
    </div>

                        <div class="col-xs-9">
                            <table width="100%" border="0" cellpadding="1" cellspacing="1">
                            <div id="loadData"></div>
                                <tbody id="post-data">



                                @if((count($films) + count($moved)) > 0)    



                                @include('layouts.film')


                                @else

                                <h3 class="text-center">no submitted films yet</h3>

                                @endif







                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="ajax-load text-center" style="display: none;">
                                <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More Films</p>
                        </div>
                    </div><!--end row -->
                </div><!--end  container -->
            </div> <!--end submitted folder -->


</div>                       

    </div>
</div>


<!--End Content-->





<div class="modal fade move_modal" id="move_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-arrows"></i> Move film</h4>
            </div>
            <div class="modal-body">
                <ul>
                    <li>
                        <label>
                            <span>destination</span>
                        </label>
                        <form id="moveFilm" action="{{ url('festival/move_film') }}" method="post">                        
                        <select class="form-control mySelect move_select" name="folder_name">

                        @if(count($festival->folders) > 0)
                        
                        @foreach($festival->folders as $folder)
                            <option value="{{ $folder->id }}">{{ $folder->en_name }}</option>
                        @endforeach
                        @else
                            <option class="no_directories" value="0" disabled>No Directories Found</option>
                        @endif
                        </select>

                    </li>
                    <li id="moveError">
                        
                    </li>
                    <li>
                    <input type="hidden" name="folder_id" id="folderID" value="0">    
                    <input type="hidden" name="film_id" value="" class="film_id_val">
                    <input type="hidden" name="festival_id" value="{{ $festival->id }}">
                        <input type="submit" id="moveSubmit" value="confirm moving" class="btn btn-primary">
                    </li>
                </ul></form>
            </div>
            <!-- end modal-body -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade move_modal" id="copy_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-files-o"></i> copy film</h4>
            </div>
            <div class="modal-body">
                <ul>
                    <li>
                        <label>
                            <span>destination</span>
                        </label>
                        <form id="copyFilm" action="{{ url('festival/copy_film') }}" method="post">                        
                        <select class="form-control mySelect" name="folder_name">

                        @if(count($festival->folders) > 0)                        
                        @foreach($festival->folders as $folder)
                            <option value="{{ $folder->id }}">{{ $folder->en_name }}</option>
                        @endforeach
                        @else
                            <option class="no_directories" value="0" disabled>No Directories Found</option>
                        @endif
                        </select>
                    </li>
                    <li>
                        <input type="hidden" name="film_id" value="" class="film_id_val">
                        <input type="hidden" name="festival_id" value="{{ $festival->id }}">
                        <input type="submit" id="copySubmit"  value="confirm coping" class="btn btn-primary">
                    </li></form>
                </ul>
            </div>
            <!-- end modal-body -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade move_modal" id="award_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-trophy"></i> film awards</h4>
            </div>
            <div class="modal-body">
                <ul>
                    <li>
                        <label>
                            <span>awards</span>
                        </label><br>
                        <p class="lead" id="awardsContent"></p>
                    </li>
                </ul>

            </div>
            <!-- end modal-body -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<!-- start status_modal -->
<div class="modal fade move_modal" id="status_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-cogs"></i> film status</h4>
            </div>
            <div class="modal-body status_body">

              <form id="statusFilm" action="{{ url('festival/film_status') }}" method="post">

                <ul>
                    <li>
                        <label>
                            <span>Name of the film :</span>
                        </label>
                        <p>slide down and fade in from the top </p>
                    </li>
                    <li>
                        <label>
                            <span>film status</span>
                        </label>
                        <select class="form-control render_status" name="status">


                        </select>
                    </li>
                    <li>
                    <input type="hidden" name="film_id" value="" class="film_id_val">
                    <input type="hidden" name="festival_id" value="{{ $festival->id }}">
                    <input type="submit" id="statusSubmit" value="accept" class="btn btn-primary">
                    </li></form>
                </ul>

            </div>
            <!-- end modal-body -->
            <div class="load-status text-center">
               <img src="{{ asset('site/img/reload.gif') }}" width="50" height="50"> 
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /. end status_modal -->








<!-- start film_owner_contacts_modal -->
<div class="modal fade move_modal" id="film_owner_contacts">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-cogs"></i> Film contact information</h4>
            </div>
            <div class="modal-body status_body film_contacts_modal_body">


            </div>
            <!-- end modal-body -->
            <div class="load-status text-center">
               <img src="{{ asset('site/img/reload.gif') }}" width="50" height="50"> 
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /. end film_owner_contacts modal -->







<!-- start festiva votes modal -->
<div class="modal fade move_modal" id="festival_votes">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-cogs"></i> film status</h4>
            </div>
            <div class="modal-body">
                <ul>
                    <li>
                        <label>
                            <span>Festival Votes :</span>
                        </label>
                        <p>see programmers votes </p>
                    </li>
                    <li>

                        <table class="table append_votes">
    

                        </table>

                        <div class="load-votes text-center">
                           <img src="{{ asset('site/img/reload.gif') }}" width="50" height="50"> 
                        </div>

                        <div class="no-votes text-center">
                           <h3 class="text-center">No Votes Added</h3> 
                        </div>


                    </li>
                </ul>
            </div>
            <!-- end modal-body -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /. end festival votes modal -->










<!-- start festiva votes modal -->
<div class="modal fade move_modal" id="programmer_votes">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-cogs"></i> film status</h4>
            </div>
            <div class="modal-body">
            
              <form id="programmerVote" action="{{ url('festival/programmer_vote').'/'.$festival->id }}" method="post">

                <ul>
                    <li>
                        <label>
                            <span>Festival Programmer Votes :</span>
                        </label>
                        <p>feel free to add your votes </p>
                    </li>
                    <li>
                        <label>
                            <span>add vote</span>
                        </label>
                        <textarea name="content" class="form-control" placeholder="add vote">
                            
                        </textarea>

                    </li>
                    <li id="programmerError"></li>
                    <li>
                        <input type="hidden" name="film_id" value="" class="film_id_val">
                        <input type="hidden" name="festival_id" value="{{ $festival->id }}">
                        <input type="submit" id="programmerVoteSubmit"  value="Add Vote" class="btn btn-primary">
                    </li>
                </ul></form>
            </div>
            <!-- end modal-body -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /. end festival votes modal -->




<!-- Javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<div class="modal fade" id="modd">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-folder-open-o"></i> Create folder</h4>
            </div>
            <div class="modal-body">
                <div class="modal_hint">
                    <h3>help</h3>
                    <ul>
                        <li>
                            <p>
                                Please create a folder to help you sort your submitted films

                            </p>
                        </li>

                    </ul>
                </div>
                <!-- end modal_hint -->
                <div class="modal_form">
                    <form id="addFolder" action="{{ url('festival/add_folder').'/'.$festival->id }}" method="post">
                        <div class="input-group">
                            <label>
                                <span>Folder Name[English]</span>
                            </label>
                            <input type="text" name="en_name" class="form-control">
                        </div>


                        <div class="input-group">
                            <label>
                                <span>Make it a sub folder</span>
                            </label>
                            <select class="form-control append_parent" name="parent">
                                <option value="o" choosed>not a sub folder </option>
                                @foreach($folders as $folder)
                                <option value="{{ $folder->id}}">{{ $folder->en_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group" id="dirErrors">

                        </div>
                        <div class="input-group">
                            <input type="submit" id="adddirsubmit" class="btn btn-primary" value="Create folder"> </div>
                    </form>
                    </div>
                </div>
                <!-- end modal-body -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->




<!-- search modal -->
<div class="modal fade" id="searchModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-folder-open-o"></i> Search Films</h4>
            </div>
            <div class="modal-body">
                <div class="modal_hint">
                    <h3>help</h3>
                    <ul>
                        <li>
                            <p>
                                Please select your search criteria

                            </p>
                        </li>

                    </ul>
                </div>
                <!-- end modal_hint -->


                <!-- start search modal -->
                <div class="modal_form">
                    <form method="get" id="serachForm" action="{{ url('festival/search') }}">


                        <div class="input-group">
                            <label>
                                <span>Film Title</span>
                            </label>
                            <input type="text" name="text" class="form-control">
                        </div>


                        <div class="input-group">
                            <label>
                                <span>Country</span>
                            </label>
                            <select class="form-control" name="country">
                                <option value="0" choosed> Country (all)</option>
                                @foreach(countryArray() as $arr)
                                <option value="{{ $arr }}">{{ $arr }}</option>
                                @endforeach
                                </select>
                            </select>
                        </div>



                        <div class="input-group">
                            <label>
                                <span>Film Genre</span>
                            </label>
                            <select class="form-control" name="genre">
                                <option value="0" choosed> Genre (all)</option>
                                @foreach(filmGenres() as $arr)
                                <option value="{{ $arr }}">{{ $arr }}</option>
                                @endforeach
                                </select>
                            </select>
                        </div>

                    
                        <div class="row">
                        <div class="col-md-6">
                            
                            <label>
                                <span>from Date</span>
                            </label>
                            <input type="date" name="year_from" class="form-control">
                            
                        </div>
                        <div class="col-md-6">
                            
                            <label>
                                <span>To Date</span>
                            </label>
                            <input type="date" name="year_to" class="form-control">
                            
                        </div>

                        </div><br>





                        <div class="input-group">
                            <label>
                                <span>Film Theme</span>
                            </label>
                            <select class="form-control" name="theme">
                                <option value="0" choosed> Themes  (all)</option>
                                @foreach(filmThemes() as $arr)
                                <option value="{{ $arr }}">{{ $arr }}</option>
                                @endforeach
                                </select>
                            </select>
                        </div>

 


                    
                        <div class="row">
                        <div class="col-md-6">
                            
                            <label>
                                <span>Duration Time From</span>
                            </label>
                            <input type="number" name="length_from" class="form-control">
                            
                        </div>
                        <div class="col-md-6">
                            
                            <label>
                                <span>Duration Time To</span>
                            </label>
                            <input type="number" name="length_to" class="form-control">
                            
                        </div>

                        </div><br>
                    
                   

                        <div class="input-group" id="searchError">

                        </div>
                        <div class="input-group">
                            <input type="submit" id="searchSubmit" class="btn btn-primary" value="Search"> </div>
                    </form>
                    </div>




                <!-- end modal-body -->
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.end search modal -->
</div>



<!-- start delete modal -->


    <!-- start DELETE modal -->
    <div class="modal fade" id="modal-container-3495" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
               
              <h4 class="modal-title" id="myModalLabel21">
                Delete
              <button  type="button" class="close " data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              </h4>
            </div>
            <div class="modal-body">
              <!-- start modal body -->
                         <h5>Are You Sure You Wanna Delete This ??</h5>
                     

                      </div>
                 </form>
           <div class="modal-footer">
                             <form role="form" id="form_delete">
                      <div class="form-group">
                      {{ csrf_field() }}
                      </div>
                      <div class="form-group">
                       <input type="hidden" id="product_id_delete" name="product_id" value="0">

                          <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel <i class="fa fa-remove" aria-hidden="true"></i>
                           
                          </button> 


                         <button class="btn btn-danger" id="submit_delete"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </button>
                      </div>
                 </form>

           </div>
    
                    
              <!-- end modal body -->
            </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end DELETE modal -->


<!-- end delete modal -->

@if(count($films) < 5)

<!--Bottom Section-->
<section id="bottom">
    <div class="container">
        <div class="row margin-40">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <p>Dubai Media City Second Floor, Bldg. No. 2 (CNN Bldg.) | 00201222848061 | <a href="mailto:info@iamafilm.com"><i class="icon-envelope-alt"></i> info@iamafilm.com</a></p>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <!--Social Icons-->
                <ul class="social-icons">
                    <li><a class="twitter" href="http://www.twitter.com/rootcave" target="_blank"><i class="fa fa-twitter fa-3x"></i></a></li>
                    <li><a class="facebook" href="http://www.facebook.com/" target="_blank"><i class="fa fa-facebook fa-3x"></i></a></li>
                    <li><a class="google" href="http://www.googleplus.com/" target="_blank"><i class="fa fa-google-plus fa-3x"></i></a></li>
                    <li><a class="instagram" href="http://www.instagram.com/" target="_blank"><i class="fa fa-camera-retro fa-3x"></i></a></li>
                    <li><a class="pinterest" href="http://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest fa-3x"></i></a></li>
                    <li><a class="linkedin" href="http://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin fa-3x"></i></a></li>
                    <li><a class="Github" href="http://www.github.com/" target="_blank"><i class="fa fa-github-alt fa-3x"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</section>


@endif

<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>&copy; Copyrights. I am a film All Rights Reserved. Created by <a href="http://www.rootcave.com/">Root Cave.</a></p>
            </div>
        </div>
    </div>
</section>

<!-- adding one meta tag for ajax compatability for all requests  -->
<meta name="_token" content="{!! csrf_token() !!}" />
<input type="hidden" name="sortingID" id="sortingID" data-type="0" data-id="{{ $festival->competetions->first()->id }}">


<!-- Javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('site') }}/js/lib/bootstrap.min.js"></script>
<script src="{{ asset('site') }}/js/app/main.js"></script>

<script>
    ! function($) {
        $(function() {
            $('#header').carousel()
        })
    }(window.jQuery)
</script>



<!-- START JAVA SCRIPT -->
<script src="{{ asset('site') }}/js/app/magnific.js"></script>
<script src="{{ asset('site') }}/js/lib/jquery.form.js"></script>
<script src="{{ url('site') }}/js/app/main.js"></script>
<script type="text/javascript">

      var page = 1;
      var url = '{{ url('festival/films') }}'+'?page=';
      var sort_url = '{{ url('festival').'/' }}';
      var gif_url = '{{ url('site/img/reload.gif') }}';  
      $('#folderID').val(0);
      $('.change_moved').hide();

</script>
<script src="{{ url('site') }}/js/app/submitted_films.js"></script>

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
    $(document).ready(function(){

        $('body').on('click','.film_id',function () {
                
                var id = $(this).data('id');
                $('.film_id_val').val(id);

        });
      


      /*
      *
      * show delete modal  
      *
      */
      $('body').on('click','.delete-product',function(){

        var product = $(this).data('id');

          $('#product_id_delete').val(product);
          $('#modal-container-3495').modal('show');


      });

    /*
         *
         *  end showing delete modal
         *
    */


    /* start Deleting form */
        
        $('body').on('click','#submit_delete',function(){
              /* csrf protection on ajax 
         * 
         * see meta tag in solycrud.blade.php blade template
        */
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

        var product_id_delete    = $('#product_id_delete').val();

        $.post(sort_url+'delete_folder/'+product_id_delete,function(data){

               if (data.success == 'true') {

                  $('#Folders').html(data.html);
 
               } 

               $('#modal-container-3495').modal('hide');

        });
                        return false;

      });
      /* End Deleting Form */


        /* festival votes */
        $('body').on('click','.festival_votes',function () {
                
                var id = $(this).data('id');
                var festival_id = '{{ $festival->id }}';
                $('.append_votes').html(' ');
                $('.load-votes').show();
                $('#festival_votes').modal('show');
                $('.no-votes').hide();


                $.ajax({

                    url:'{{ url('festival/show_votes') }}',
                    type:'post',
                    data:{id:id,festival_id:festival_id},
                    beforeSend:function (argument) {

                     $('.load-votes').show();
                        
                    },
                    success:function(data) {

                     $('.load-votes').hide();

                        if (data.success == 'false') {

                        $('.no-votes').show();

                        }else{

                          $('.append_votes').html(data.html);
                           
                        } 


                    },
                    error:function(error) {
                        
                    }


                });
                

        });
        // end festival votes
      






        /* start film status ['sent','selected','unselected' ] */
        $('body').on('click','.film_status',function () {
                
                var id = $(this).data('id');
                var festival_id = '{{ $festival->id }}';
                $('.status_body').hide();
                $('.load-status').show();
                $('#status_modal').modal('show');


                $.ajax({

                    url:'{{ url('festival/fuck') }}',
                    type:'post',
                    data:{id:id,festival_id:festival_id},
                    beforeSend:function (argument) {

                     $('.load-status').show();
                        
                    },
                    success:function(data) {

                     $('.load-status').hide();
                     $('.render_status').html(data.html);
                     $('.status_body').show();
                           
                        


                    },
                    error:function(error) {
                        
                    }


                });
                

        });
        /* END film status ['sent','selected','unselected' ] */
      





    



        $('body').on('click','.filter_folder',function () {
            
                var gif_url = '{{ url('site/img/reload.gif') }}';  
                var id      = $(this).data('id');
                $('#folderID').val(id);
                 $('#sortingID').data('id',id);
                 $('#sortingID').data('type',1);               
                var filter_films  = '{{ url('festival/filter_films').'/' }}' + id+'?page=';
                url = filter_films;
                page = 1;

                $('.move_select').prepend('<option value="0">Home</option>');

          $.ajax(
                {
                    url: filter_films,
                    type: "get",
                    beforeSend: function()
                    {
                       $('#post-data').html('<h3 class="text-center"><img src=' + gif_url +'></h3>')
                    }
                })
                .done(function(data)
                {
                    
                        $("#post-data").html(data.html);


                })
                .fail(function(jqXHR, ajaxOptions, thrownError)
                {
                      alert('error...');
                });
            });




            $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() >= $(document).height()) {
                    page++;
                    loadMoreData(page);
                }
            });

            function loadMoreData(page){
              $.ajax(
                    {
                        url: url+ page,
                        type: "get",
                        beforeSend: function()
                        {
                            $('.ajax-load').show();
                        }
                    })
                    .done(function(data)
                    {
                        if(data.html == " "){
                            $('.ajax-load').html("No more records found");
                            return;
                        }
                        $('.ajax-load').hide();
                        $("#post-data").append(data.html);
                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError)
                    {
                          alert('server not responding...');
                    });
            }

          //  console.log($('.film_check').is(':checked'));
          //  check viewed 
          //  $('.film_check').prop('checked', true);


           $('body').on('click','.film_check',function(argument) {

            film_id = $(this).data('id');
            festival_id = '{{ $festival->id }}';

              $.ajax(
                    {
                        url: '{{ url('festival/film_viewed') }}',
                        type: "post",
                        data:{film_id:film_id,festival_id:festival_id}
                    })
                    .done(function(data)
                    {
                        //alert('success');

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError)
                    {
                          alert('server not responding...');
                    });
           });







        /* start show film awards */
        $('body').on('click','.film_awards',function () {
                
                var id = $(this).data('id');

                $('#awardsContent').html(id);
                $('#award_modal').modal('show');

                

        });
        // end show film awards
      

    });
</script>



</body>

</html>

