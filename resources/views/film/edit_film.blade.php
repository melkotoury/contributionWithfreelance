<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>I am a film | Submit Your Short Movie</title>
    <meta name="keywords" content="short films, films, festivals, submit your films, i am a film, film makers, submit
 to festivals">
    <meta name="description" content="submit your short film , film festivals , directors , editors , short films">
    <meta name="viewport" content="width=device-width">

    <meta property="og:title" content="Iamafilm | Designed By Root Cave">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.iamafilm.com">
    <meta property="og:site_name" content="Iamafilm">
    <meta property="og:description" content="short films, films, festivals, submit your films, i am a film, film makers, submit my film to festivals">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <!-- dropzone css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">

    <!--<link href="{{ asset('site') }}/css/jqvmap.css" media="screen" rel="stylesheet" type="text/css">-->


    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/bootstrap.min.css">
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <!--<link href="{{ asset('site') }}/js/vendors/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />-->
    <link rel="stylesheet" href="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/css/jquery.fileupload-ui.css">

    <link href="{{ asset('site') }}/js/lib/vendors/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site') }}/css/vendors/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site') }}/css/vendors/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!--<link href="{{ asset('site') }}/js/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />-->
    <!--<link href="{{ asset('site') }}/js/vendors/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />-->
    <!--<link href="{{ asset('site') }}/js/vendors/clockface/css/clockface.css" rel="stylesheet" type="text/css" />-->
    <!-- END PAGE LEVEL PLUGINS -->




    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('site') }}/css/vendors/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('site') }}/css/vendors/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->

    <link rel="stylesheet" href="{{ asset('site') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/create_edit_film.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>


    <script src="{{ asset('site') }}/js/lib/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('site') }}/../../../../../apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('site') }}/../../../../../apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('site') }}/../../../../../apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('site') }}/../../../../../apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="{{ asset('site') }}/../../../../../favicon.html">
        <style type="text/css">

        .btn-primary:hover,.btn-primary:active,.btn-primary:visited,.btn-primary:focus{

            background-color: #ff755a!important;
        }
    </style>

</head>

<body>

@include('partials.navbar')

<section id="main" class="margin-top-100">
    <div class="container">
      <div class="row">
                            <div class="col-md-12">
                                <form class="form-horizontal form-row-seperated" id="create_film_first" method="post" action="{{ url('edit_film_one').'/'.$film->id }}">
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-film"></i>Edit Film </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="tabbable-bordered">
                                                <ul class="nav nav-tabs">
                                                    <li class="active tab_general_li">
                                                        <a href="#tab_general" data-toggle="tab"> General </a>
                                                    </li>
                                                    <li class="tab_prod_li">
                                                    <a href="#tab_prod" data-toggle="tab"> Production & Credits </a>
                                                    </li>
                                                    <li class="tab_film_materials_li">
                                                        <a href="#tab_film_materials" data-toggle="tab"> Film Materials </a>
                                                    </li>
                                                    <li class="tab_promotion_li">
                                                        <a href="#tab_promotion" data-toggle="tab"> Promotion
                                                        </a>
                                                    </li>
                                                    
                                                    <li class="tab_awards_li">
                                                       <a href="#tab_awards" data-toggle="tab"> Selections & Awards </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_general">                  
                                              <div class="form-body">

                                                      <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                            </label>
                                                            <div class="col-md-10">
                                                            @if (count($errors) > 0)
                                                                <div class="alert alert-danger">
                                                                    <ul>
                                                                        @foreach ($errors->all() as $error)
                                                                            <li>{{ $error }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                                </div>
                                                        </div><br>

                                                           <!--Original Title-->
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Original Title:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="original_title" value="{{ $film->original_title }}"  placeholder=""> 
                                                                    </div>
                                                            </div>
                                                            <!--End Original Title-->
                                                            <!--English Title-->
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">English Title:
                                                                    <span class="required"> * </span>
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <input type="text" class="form-control" name="english_title" value="{{ $film->english_title }}" placeholder=""> </div>
                                                            </div>
                                                            <!--End English Title-->
                                                                <!--<div class="col-md-10">-->
                                                                    <!--<input type="text" class="form-control" name="film[production_date]" placeholder=""> -->
                                                                <!--</div>-->
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label">Production Date:
                                                                        <span class="required"> * </span>
                                                                    </label>
                                                                    <div class="col-md-10">
                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >

                                        <input type="text" name="production_date" value="{{ date('d-m-Y', strtotime($film->production_date)) }}" class="form-control" readonly>

                                        <span class="input-group-btn">
                                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                        </span>


                    </div>
                                                                        <!-- <div class="input-group input-medium date date-picker" data-date="new Date()" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                                            <input type="text" name="production_date" class="form-control" readonly>
                                                                            <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                                        </div> -->
                                                                        <!-- /input-group -->
                                                                    </div>
                                                                </div><!--date picker ends -->

    <div class="form-group">
        <label class="col-md-2 control-label">Film Username:
            <span class="required"> * </span>
        </label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="film_url" value="{{ $film->film_url }}"  placeholder="film display name ,e.g: filmname2016"> </div>
    </div>
    <!--Languages-->
    <div class="form-group">
        <label   class="col-md-2 control-label">Languages:
        <span class="required"> * </span>
        </label>
        <div class="col-md-10">
        <select  id="multiple" name="film_languages[]" class=" form-control select2-multiple" multiple>
            <optgroup label="Languages" >
                @foreach(langArray() as $lang)
                <option value="{{ $lang }}"  {{ in_array($lang, json_decode($film->film_languages)) ? 'selected ' : '' }}>{{ $lang }}</option>
                @endforeach
            </optgroup>

        </select>
    </div>
        </div>
    <!--End Languages-->
    <!--Subtitles Languages-->
    <div class="form-group">
        <label   class="col-md-2 control-label">Subtitles (Languages):
        </label>
        <div class="col-md-10">
            <select  id="multiple1" name="subtitles_languages[]" class=" form-control select2-multiple" multiple>
                <optgroup label="Subtitles Languages" >
                @foreach(langArray() as $lang)
                <option value="{{ $lang }}" {{ in_array($lang, json_decode($film->subtitles_languages)) ? 'selected ' : '' }}>{{ $lang }}</option>
                @endforeach
                </optgroup>

            </select>
        </div>
    </div>
    <!--End Subtitle Languages-->
    <!--Duration-->
    <div class="form-group">
        <label class="col-md-2 control-label">Duration:
            <span class="required"> * </span>
        </label>
        <div class="col-md-10">
            <input type="number" value="{{ $film->duration }}"  class="form-control" name="duration" min="0">
        </div>
    </div>
    <!--End Duration-->
    <!--Country Of Production-->
    <div class="form-group">
        <label   class="col-md-2 control-label">Country of Production:
            <span class="required"> * </span>
        </label>
        <div class="col-md-10">
            <select name="production_country[]"  id="multiple2" class=" form-control select2-multiple" multiple>
                <optgroup label="Countries" >
                    @foreach(countryArray() as $count)
                    <option value="{{ $count }}" {{ in_array($count, json_decode($film->production_country)) ? 'selected ' : '' }}>{{ $count }}</option>
                    @endforeach

                </optgroup>

            </select>
        </div>
    </div>
    <!--End Country of Production-->

    <!--Categories-->
    <div class="form-group">
        <label   class="col-md-2 control-label">Categories:
            <span class="required"> * </span>
        </label>
        <div class="col-md-10">
            <select name="categories_name[]"  id="multiple3" class=" form-control select2-multiple" multiple>
                <optgroup label="Select Categories" >
                    @foreach(filmCategory() as $cat)
                    <option value="{{ $cat }}" {{ in_array($cat,$categories_name) ? 'selected ' : '' }}>{{ $cat }}</option>
                    @endforeach
                </optgroup>

    </select>
</div>
</div>
    <!--End Categories-->
    <!--Theme-->
    <div class="form-group">
        <label   class="col-md-2 control-label">Themes:
        </label>
        <div class="col-md-10">
            <select name="themes_name[]"  id="multiple4" class=" form-control select2-multiple" multiple>
                <optgroup label="Select Themes" >
                    @foreach(filmThemes() as $theme)
                    <option value="{{ $theme }}" {{ in_array($theme,$theme_name) ? 'selected ' : '' }}>{{ $theme }}</option>
                    @endforeach


                </optgroup>

            </select>
        </div>
    </div>
    <!--End Theme-->

    <!--Genres-->
    <div class="form-group">
        <label   class="col-md-2 control-label">Genres:
        </label>
        <div class="col-md-10">
            <select name="genres_name[]"  id="multiple5" class=" form-control select2-multiple" multiple>
                <optgroup label="Select Genres" >
                    @foreach(filmGenres() as $gen)
                    <option value="{{ $gen }}" {{ in_array($gen,$genre_name) ? 'selected ' : '' }}>{{ $gen }}</option>
                    @endforeach

                </optgroup>

            </select>
        </div>
    </div>
    <!--End Genres-->

    <!--Film School-->
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">Film School:
                <!--<span class="required"> * </span>-->
            </label>
            <div class="col-md-10">
                <input type="text" value="{{ $film->film_school }}"  class="form-control" name="film_school" placeholder="">
            </div>

            <div class="col-md-2">

            </div>

            <div class="col-md-10">
            <div class="mt-checkbox-list">
                <label class="mt-checkbox"> Film School
                    <input type="checkbox" value="1" name="film_school_check" {{ $film->film_school_check == 1 ? 'checked' : '' }}/>
                    <span></span>
                </label>
                <label class="mt-checkbox"> Debut Film
                    <input name="debut_film" type="checkbox" value="1" name="debut_film"  {{ $film->debut_film == 1 ? 'checked' : '' }} />
                    <span></span>
                </label>
                <label class="mt-checkbox"> Work in Progress
                    <input name="work_in_progress" type="checkbox" value="1" name="work_in_progress"  {{ $film->work_in_progress == 1 ? 'checked' : '' }} />
                    <span></span>
                </label>
            </div>
            </div>
            </div>
        </div>


    <!--End Film School-->

    <!--Short Synopsis-->

    <div class="form-group">
        <label class="col-md-2 control-label">Short Synopsis (original language):
            <span class="required"> * </span>
        </label>
        <div class="col-md-10">
            <textarea name="short_synopsis" class="short-text-area form-control" rows="3"> {{ $film->short_synopsis }} </textarea>
            <span id="chars">250</span> characters remaining
        </div>
    </div>

    <!--End Short Synopsis-->
    

    <!--Long Synopsis-->
    <div class="form-group">
        <label class="col-md-2 control-label">Long Synopsis (original language):
            <span class="required"> * </span>
        </label>
        <div class="col-md-10">
            <textarea name="long_synopsis" class="long-text-area-a form-control" rows="5">{{ $film->long_synopsis }}</textarea>
            <span id="chars_a">0</span> characters
        </div>
    </div>
    <!--End Long Synopsis-->

    <!--Short Synopsis English-->
    <div class="form-group">
        <label class="col-md-2 control-label">Short Synopsis (English):
            <span class="required"> * </span>
        </label>
        <div class="col-md-10">
            <textarea name="short_synopsis_english" class="short-text-area1 form-control" rows="3">{{ $film->short_synopsis_english }}</textarea>
            <span id="chars1">250</span> characters remaining
        </div>
    </div>
    <!--End Short Synopsis English-->

    <!--Long Synopsis English-->
    <div class="form-group">
        <label class="col-md-2 control-label">Long Synopsis (English):
            <span class="required"> * </span>
        </label>
        <div class="col-md-10">
            <textarea name="long_synopsis_english" class="long-text-area-b form-control" rows="5">{{  $film->long_synopsis_english }}</textarea>
            <span id="chars_b">0</span> characters
        </div>
    </div>
    <!--End Long Synopsis English-->
    <!--Film Link-->
    <div class="form-group">
        <label class="col-md-2 control-label">Film Link:
            <span class="required"> * </span>
        </label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="film_link" value="{{ $film->film_link }}" placeholder="link to vimeo or youtube">
            </div>
    </div>
    <!--End Film Link-->
 <!--film scope-->

    {{--<div class="form-group">--}}
        {{--<label class="col-md-2 control-label">Film Scope:--}}
            {{--<span class="required"> * </span>--}}
        {{--</label>--}}
        {{--<div class="col-md-10">--}}
            {{--<select name="status" class="form-control status">--}}
                {{--<option value="1" {{ $film->status == 1 ? 'selected' : '' }}>Public</option>--}}
                {{--<option value="0" {{ $film->status == 0 ? 'selected' : '' }}>Private</option>--}}
            {{--</select>--}}
        {{--</div>--}}
    {{--</div>--}}

    <!-- film scope -->

    <!--Film Password-->
     @if ($film->status == 0)
    <div class="form-group" id="filmPassword">
        <label class="col-md-2 control-label">Film Password:

        </label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="film_password" value="{{ $film->film_password }}" placeholder="">
            </div>
    </div>
     @endif



    <!--Film Password-->
    <div class="form-group">
        <label class="col-md-2 control-label">
        </label>
        <div class="col-md-10" id="message_one">

        </div>
    </div>

    
    <br>              
    <div class="form-group">
        <label class="col-md-2 control-label">
        </label>
      <button type="submit" id="Create_film_one" class="btn btn-outline btn-primary has-spinnered actived"> Save & Continue </button>

      <a data-toggle="tab" id="next_one" href="#tab_prod" class="btn btn-outline btn-primary has-spinnered actived tab_prod" >Continue</a>                                                 
       </div>                            

    <!--End Film Password-->
   </form>

</div>
</div>
<div class="tab-pane" id="tab_prod">
                                                       
 
                                                        <div class="alert alert-success margin-bottom-10">
                                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                                                            <i class="fa fa-warning fa-lg"></i> Add your film crew. The director and producer will be highlighted specially to the festival.
                                                        </div>
                                                        <!--End Message-->

                                                        <!-- Director/Producer -->

                                                        <div class="row dir-prod">
                                                            <div class="col-md-6">
                                                                <div class="col-md-12">
                                                                    <a type="button" class=" btn orange-default btn-outline sbold" data-toggle="modal" data-target="#adddir" data-whatever="@mdo"> <i class="fa fa-plus-circle"></i> Add Director </a>

                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h4>DIRECTOR:</h4>
                                                                </div>
                                                                <div class="col-md-12" id="appendDir">
                                                                @if(count($film_director) > 0)
                                                                @foreach($film_director as $dir)
                                                                <div id="updatedData{{ $dir->id }}">
                                                                <div class="input-group"><div class="input-group-btn">
                                                                <button type="button" class="btn orange-default dropdown-toggle" data-toggle="dropdown">Edit or Delete
                                                                <i class="fa fa-angle-down"></i> 
                                                                </button>
                                                                <ul class="dropdown-menu">

                                                                <li>
                                                                <a type="button" class="dir_edit" data-content="{{ $dir->name }}" data-phone="{{ $dir->phone }}" data-email="{{ $dir->email }}" data-id="{{ $dir->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                                </li>
                                                                <li>
                                                                <a href="" class="dir_delete" data-id="{{ $dir->id }}"><i class="fa fa-remove"></i> Delete </a>
                                                                </li>

                                                                </ul></div><!-- /btn-group -->
                                                                <input type="text" value="{{ $dir->name }}" class="form-control" readonly></div><br>
                                                                </div>                                                            @endforeach        
                                                                @endif 

                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="col-md-12">
                                                                    <a type="button" class=" btn orange-default btn-outline sbold"  data-toggle="modal" data-target="#addprod" data-whatever="@mdo"> <i class="fa fa-plus-circle"></i> Add Producer </a>

                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h4>PRODUCER:</h4>
                                                                </div>

                                                              <div class="col-md-12"  id="appendProd">
                                                                


                                                                @if(count($film_producer) > 0)
                                                                @foreach($film_producer as $prod)
                                                                <div id="produpdatedData{{ $prod->id }}">
                                                                <div class="input-group"><div class="input-group-btn">
                                                                <button type="button" class="btn orange-default dropdown-toggle" data-toggle="dropdown">Edit or Delete
                                                                <i class="fa fa-angle-down"></i> 
                                                                </button>
                                                                <ul class="dropdown-menu">

                                                                <li>
                                                                <a type="button" class="prod_edit" data-content="{{ $prod->name }}" data-phone="{{ $prod->phone }}" data-email="{{ $prod->email }}" data-id="{{ $prod->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                                </li>
                                                                <li>
                                                                <a href="" class="prod_delete" data-id="{{ $prod->id }}"><i class="fa fa-remove"></i> Delete </a>
                                                                </li>

                                                                </ul></div><!-- /btn-group -->
                                                                <input type="text" value="{{ $prod->name }}" class="form-control" readonly></div><br>
                                                                </div>                                                           
                                                                @endforeach        
                                                                @endif        
                                                               

                                                              </div>

                                                            </div>
                                                        </div>
                                                        <!--End Director/Producer -->
                                                        <hr>
                                                        <!-- Distribution/Production company-->
                                                        <div class="row dist-prod">
                                                            <div class="col-md-6">
                                                                <div class="col-md-12">
                                                                    <a type="button" class=" btn orange-default btn-outline sbold"  data-toggle="modal" data-target="#adddist" data-whatever="@mdo"> <i class="fa fa-plus-circle"></i> Add Distribution Company </a>

                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h4>DISTRIBUTION COMPANY:</h4>
                                                                </div>
                                                                <div class="col-md-12" id="appendDist">
                                                               
                                                                    @if(count($film_dist) > 0)
                                                                    @foreach($film_dist as $dist)
                                                                    <div id="distupdatedData{{ $dist->id }}">
                                                                    <div class="input-group"><div class="input-group-btn">
                                                                    <button type="button" class="btn orange-default dropdown-toggle" data-toggle="dropdown">Edit or Delete
                                                                    <i class="fa fa-angle-down"></i> 
                                                                    </button>
                                                                    <ul class="dropdown-menu">

                                                                    <li>
                                                                    <a type="button" class="dist_edit" data-content="{{ $dist->name }}" data-id="{{ $dist->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                                    </li>
                                                                    <li>
                                                                    <a href="" class="dist_delete" data-id="{{ $dist->id }}"><i class="fa fa-remove"></i> Delete </a>
                                                                    </li>

                                                                    </ul></div><!-- /btn-group -->
                                                                    <input type="text" value="{{ $dist->name }}" class="form-control" readonly></div><br>
                                                                    </div>                                                           
                                                                @endforeach        
                                                                @endif        


                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="col-md-12">
                                                                    <a type="button" class=" btn orange-default btn-outline sbold"  data-toggle="modal" data-target="#addproduct" data-whatever="@mdo"> <i class="fa fa-plus-circle"></i> Add Production Company </a>

                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h4>PRODUCTION COMPANY:</h4>
                                                                </div>
                                                                <div class="col-md-12" id="appendProduct">


                                                                @if(count($film_product) > 0)
                                                                @foreach($film_product as $product)
                                                                <div id="productupdatedData{{ $product->id }}">
                                                                <div class="input-group"><div class="input-group-btn">
                                                                <button type="button" class="btn orange-default dropdown-toggle" data-toggle="dropdown">Edit or Delete
                                                                <i class="fa fa-angle-down"></i> 
                                                                </button>
                                                                <ul class="dropdown-menu">

                                                                <li>
                                                                <a type="button" class="product_edit" data-content="{{ $product->name }}" data-id="{{ $product->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                                </li>
                                                                <li>
                                                                <a href="" class="product_delete" data-id="{{ $product->id }}"><i class="fa fa-remove"></i> Delete </a>
                                                                </li>

                                                                </ul></div><!-- /btn-group -->
                                                                <input type="text" value="{{ $product->name }}" class="form-control" readonly></div><br>
                                                                </div>                                                           

                                                                @endforeach        
                                                                @endif        
      


                                                                </div>
                                                            </div>
                                                        </div><!--End Distribution/Production company-->

                                                        <hr>
                                                        <!--Remaining Crew-->
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4>TECHNICAL & ARTISTIC TEAM: </h4>
                                                            </div>
                                                            <div class="col-md-12 margin-10">
                                                            <form id="addTeam" action="{{ url('add_team').'/'.$film->id }}" method="post">
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>

                                                                </div>
                                                                <div class="col-md-4">
                                                                    <select name="role" id="multiple6" class=" form-control select2-multiple" >

                                                                    @foreach(filmTeam() as $value)
                                                                    <option value="{{ $value }}">{{ $value }}</option>
                                                                    @endforeach

                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 margin-10">
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-4"></div>
                                                                <div class="col-md-2"></div>
                                                                <div class="col-md-2">
                                                                    <button class=" btn orange-default btn-outline sbold pull-right" id="addteamsubmit" type="submit" "> <i class="fa fa-plus-circle"></i> Add Member </button>

                                                                </div></form>
                                                            </div>

                                                            <div class="col-md-12 margin-10">
                                                                <div class="col-md-3"></div>
                                                                <div class="col-md-6">

                                                                    <div class="col-md-12 margin-10" id="appendTeam">
                                                                     @if(count($film_team) > 0)
                                                                    @foreach($film_team as $team)
                                                                    <div id="teamData{{ $team->id }}">
                                                                    <div class="input-group"><div class="input-group-btn">
                                                                    <button type="button" class="btn orange-default dropdown-toggle" data-toggle="dropdown">Edit or Delete
                                                                    <i class="fa fa-angle-down"></i> 
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                    <li>
                                                                    <a type="button" class="team_edit" data-fname="{{ $team->first_name }}" data-lname="{{ $team->last_name }}" data-role="{{ $team->type }}" data-id="{{ $team->id }}"><i class="fa fa-edit"></i> Edit</a>
                                                                    </li>
                                                                    <li>
                                                                    <a href="" class="team_delete" data-id="{{ $team->id }}"><i class="fa fa-remove"></i> Delete </a>
                                                                    </li>

                                                                    </ul></div><!-- /btn-group -->
                                                                    <input type="text" value="{{ $team->first_name .' '.$team->last_name .' == '.$team->type }}" class="form-control" readonly></div><br>
                                                                    </div>
                                                                    @endforeach        
                                                                    @endif                                                                    

                                                                    </div>

                                                                </div>
                                                                <div class="col-md-3"></div>
                                                                
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                <a class="btn btn-outline btn-primary has-spinnered actived tab_prod" >back</a>                                                               
                                                                  <a data-toggle="tab" href="#tab_film_materials" class="btn btn-outline btn-primary has-spinnered actived tab_film_materials" >Continue</a>                                                                                          
                                                                                                                                                            
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <!--End Remaining Crew-->

                                                    </div>


                                                    <div class="tab-pane" id="tab_film_materials">
                                                    
                                                    <div class="form-body">






                                                 <!-- Film Poster -->
                                                <div class="form-group">
                                                <label class="col-md-2 control-label">Film's Poster:
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-10">
                                                    <h5>Select Your Film Poster & Upload it (only accept .jpg .png .jpeg)(Max Size: 8MB)</h5>
                                                    <div>


       @if(file_exists('images/filmmaterials/'.$film->film_poster))
                   
            <img src="{{ url('/').'/images/filmmaterials/'.$film->film_poster }}" alt="" width="70" height="60" />



         @endif                          

                                                    </div><br>
                                                   <div class="input-group">
                                                   


             <form action="{{ url('film/add_poster').'/'.$film->id }}" class="dropzone" id="filmPosterDropzone">
              <div class="fallback">
                <input name="film_poster" type="file" />
              </div>
            </form>




                                                    <div class="clearfix margin-top-10">
                                                    </div>

                                                    </div> 
                                                    </div>
                                                    </div>
                                                
                                                 <!-- end Film Poster -->
                                                         



                                                 <!-- added by soly -->
             <div class="form-group">
                        <label class="col-md-2 control-label">Film's Still:
                            <span class="required"> * </span>
                        </label>
                     <div class="col-md-10">
                            <h5>Select Up To 4 Film Stills & Upload them (only accept .jpg .png .jpeg)(Max Size: 8MB Per Image)</h5>
                           <div class="row">
                                
 

                              <div class="col-md-3">


    <div style="min-height: 60px;">
       @if(file_exists('images/filmmaterials/'.$film->film_still_one))
            <img src="{{ url('/').'/images/filmmaterials/'.$film->film_still_one }}" alt="" width="70" height="60" />
         @endif                          
    </div><br>        

                                  <form action="{{ url('film/add_still').'/'.$film->id }}" class="dropzone" id="filmStillDropzoneOne">
                                  <div class="fallback">
                                    <input name="film_still_one" type="file" />
                                  </div>
                                </form>
                                </div>
                                
                               <div class="col-md-3">   


    <div style="min-height: 60px;">
       @if(file_exists('images/filmmaterials/'.$film->film_still_two))
            <img src="{{ url('/').'/images/filmmaterials/'.$film->film_still_two }}" alt="" width="70" height="60" />
         @endif                          
    </div><br>        

                                  <form action="{{ url('film/add_still').'/'.$film->id }}" class="dropzone" id="filmStillDropzoneTwo">
                                  <div class="fallback">
                                    <input name="film_still_two" type="file" />
                                  </div>
                                </form>
                                </div>
                                
                               <div class="col-md-3">


    <div style="min-height: 60px;">
       @if(file_exists('images/filmmaterials/'.$film->film_still_three))
            <img src="{{ url('/').'/images/filmmaterials/'.$film->film_still_three }}" alt="" width="70" height="60" />
         @endif                          
    </div><br>        

                                  <form action="{{ url('film/add_still').'/'.$film->id }}" class="dropzone" id="filmStillDropzoneThree">
                                  <div class="fallback">
                                    <input name="film_still_three" type="file" />
                                  </div>
                                </form>
                                </div>
                                
                               <div class="col-md-3">  


    <div style="min-height: 60px;">
       @if(file_exists('images/filmmaterials/'.$film->film_still_four))
            <img src="{{ url('/').'/images/filmmaterials/'.$film->film_still_four }}" alt="" width="70" height="60" />
         @endif                          
    </div><br>        

                                  <form action="{{ url('film/add_still').'/'.$film->id }}" class="dropzone" id="filmStillDropzoneFour">
                                  <div class="fallback">
                                    <input name="film_still_four" type="file" />
                                  </div>
                                </form>
                                </div>



                           </div>
                                 {{--<br><span class="required"> * </span> Note: you should select Your Film Stills before uploading them.<br><br>--}}
                                  {{--<div id="stillMessage"></div>--}}

                            <br><br>


                      </div> 

             </div>
                                                
             <!-- end soly -->
                                                         

                         <!-- added by soly -->
                        <div class="form-group">
                        <label class="col-md-2 control-label">Director Photo:
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-10">


    <div>
       @if(file_exists('images/filmmaterials/'.$film->director_photo))
            <img src="{{ url('/').'/images/filmmaterials/'.$film->director_photo }}" alt="" width="70" height="60" />
         @endif                          
    </div>   

                            <h5>Select Your Director Photo & Upload it (only accept .jpg .png .jpeg)(Max Size: 8MB)</h5>
                           <div class="input-group">


             <form action="{{ url('film/add_dir_photo').'/'.$film->id }}" class="dropzone" id="directorPhotoDropzone">
              <div class="fallback">
                <input name="director_photo" type="file" />
              </div>
            </form>


                            </div>


                            <div class="clearfix margin-top-10">
                            </div>

                            </div> 
                            </div>
                        
                         <!-- end soly -->








    <!--Press Kit -->
   <div class="form-group">
       <label class="col-md-2 control-label">Dialogue List :
           <span class="required"> * </span>
       </label>
       <div class="col-md-4 ">

         @if(file_exists('images/filmmaterials/'.$film->dialogue_list))
                   
            <div class="alert alert-info" id="film{{ $film->id }}">
                <ul>
                    <li> {{ str_limit($film->dialogue_list_original,22) }}
            
             <a class="pull-right delete_dialogue" data-id="{{ $film->id }}" data-toggle="tooltip" title="Delete File"><i class="fa fa-trash fa-lg"></i></a>

                     </li>

                </ul>
            </div>

         @endif


            <p class="lead">Drop Your Dialogue List File Here</p>       
             <form action="{{ url('film/dialogue').'/'.$film->id }}" class="dropzone" id="dialogueDropzone">
              <div class="fallback">
                <input name="dialogue_list" type="file" multiple/>
              </div>
            </form>
       </div>
       <label class="col-md-2 control-label">Press Kit :
           <span class="required"> * </span>
       </label>
       <div class="col-md-4">

         @if(file_exists('images/filmmaterials/'.$film->press_kit))
                   
            <div class="alert alert-info" id="pressKit{{ $film->id }}">
                <ul>
                    <li> {{ str_limit($film->press_kit_original,22) }}
            
             <a class="pull-right delete_press" data-id="{{ $film->id }}" data-toggle="tooltip" title="Delete File"><i class="fa fa-trash fa-lg"></i></a>

                     </li>

                </ul>
            </div>

         @endif


            <p class="lead">Drop Your Press Kit File Here</p>              
             <form action="{{ url('film/press').'/'.$film->id }}" class="dropzone" id="pressDropzone">
              <div class="fallback">
                <input name="press_kit" type="file" multiple/>
              </div>
            </form>           
       </div>
   </div>
   <!--End Press Kit -->                        

                                                        


    <!--Press Kit -->
   <div class="form-group">
       <label class="col-md-2 control-label">Subtitles :
       </label>
       <div class="col-md-10 ">

         @if(count($film->subtitles) > 0)
                   
            <div>
                <ul>
                    @foreach($film->subtitles as $sub)
                    <li id="sub{{ $sub->id }}" class="alert alert-info"> 

                        {{ str_limit($sub->name,60) }}
                         <a class="pull-right delete_sub" data-id="{{ $sub->id }}" data-toggle="tooltip" title="Delete File"><i class="fa fa-trash fa-lg"></i></a>

                     </li>
                     @endforeach

                </ul>
            </div>

         @endif

            <p class="lead">only files end with .srt .doc .docx accepted for subtitles</p>
             <form action="{{ url('addsubtitles').'/'.$film->id }}" class="dropzone" id="myAwesomeDropzone">
              <div class="fallback">
                <input name="subtitles" type="file" multiple />
              </div>
            </form>
       </div>
   </div>
   <!--End Press Kit -->




    <!--Press Kit -->
   <div class="form-group">
       <label class="col-md-2 control-label">Other Material :
           {{--<span class="required"> * </span>--}}
       </label>
       <div class="col-md-10 ">

         @if(count($film->otherMaterial) > 0)
                   
            <div>
                <ul>
                    @foreach($film->otherMaterial as $sub)
                    <li id="mat{{ $sub->id }}" class="alert alert-info"> 

                        {{ str_limit($sub->name,60) }}
                         <a class="pull-right delete_mat" data-id="{{ $sub->id }}" data-toggle="tooltip" title="Delete File"><i class="fa fa-trash fa-lg"></i></a>

                     </li>
                     @endforeach

                </ul>
            </div>

         @endif

            <p class="lead">only files end with  .doc .docs accepted for Other Material</p>
             <form action="{{ url('film/other_material').'/'.$film->id }}" class="dropzone" id="otherMaterialDropzone">
              <div class="fallback">
                <input name="other_material" type="file" multiple />
              </div>
            </form>
       </div>
   </div>
   <!--End Press Kit -->

                                                        </div>
    <div class="row">
        <div class="col-md-12 text-center">
          <a class="btn btn-outline btn-primary has-spinnered actived tab_prod" >back</a>         
          <a  class="btn btn-outline btn-primary has-spinnered actived tab_promotion" >continue</a>        

        </div>
    </div>                                                                                       

    </div>
    <div class="tab-pane" id="tab_promotion">
    <!--Website URL-->
    <div class="form-body">
    <form id="filmLink" method="post" action="{{ url('film_links').'/'.$film->id }}">
    <div class="form-group">
        <label class="col-md-2 control-label">Website URL:
            <!--<span class="required"> * </span>-->
        </label>
        <div class="col-md-10">
            <input type="text" class="form-control" value="{{ $film->website_url }}" name="website_url" placeholder=""> </div>
    </div>
    <!--End Website URL-->
    <!--Facebook Link-->
    <div class="form-body">
    <div class="form-group">
        <label class="col-md-2 control-label">Facebook Link:
            <!--<span class="required"> * </span>-->
        </label>
        <div class="col-md-10">
            <input type="text" class="form-control" value="{{ $film->facebook_link }}"  name="facebook_link" placeholder=""> </div>
    </div>
    <!--End Facebook Link-->
    <!--Twitter Link-->
    <div class="form-body">
    <div class="form-group">
        <label class="col-md-2 control-label">Twitter Link:
            <!--<span class="required"> * </span>-->
        </label>
        <div class="col-md-10">
            <input type="text" class="form-control" value="{{ $film->twitter_link }}"  name="twitter_link"  placeholder=""> </div>
    </div>
    <!--End Twitter Link-->
        <!--Instagram Link-->
    <div class="form-body">
    <div class="form-group">
        <label class="col-md-2 control-label">Instagram Link:
            <!--<span class="required"> * </span>-->
        </label>
        <div class="col-md-10">
            <input type="text"  class="form-control" name="instagram_link" value="{{ $film->instagram_link }}"  placeholder=""> </div>
    </div>
    <!--End Instagram Link-->

    <!--IMDB Link-->
    <div class="form-body">
        <div class="form-group">
            <label class="col-md-2 control-label">IMDB Link:
                <!--<span class="required"> * </span>-->
            </label>
            <div class="col-md-10">
                <input type="text"  class="form-control" name="imdb_link" value="{{ $film->imdb_link }}"  placeholder=""> </div>
        </div>
        <!--End IMDB Link-->



        <!--Trailer Link-->
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-2 control-label">Trailer Link:
                    <!--<span class="required"> * </span>-->
                </label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="trailer_link"  value="{{ $film->trailer_link }}" placeholder=""> </div>
            </div>
            <!--End Trailer Link-->

        </div>                                               <div class="form-body">
            <div class="form-group">
                <label class="col-md-2 control-label">
                    <!--<span class="required"> * </span>-->
                </label>
            <div class="col-md-10" id="linkMessage">
                
                 </div>
            </div>
            <!--End Trailer Link-->

        </div>
        <div class="form-body">
            <div class="form-group">
                <label class="col-md-2 control-label">
                    <!--<span class="required"> * </span>-->
                </label>
                <div class="col-md-10">
                 <a class="btn btn-outline btn-primary has-spinnered actived tab_film_materials" >back</a>
             
                <button id="linkSubmit" type="submit" class="btn btn-outline btn-primary has-spinnered actived">  Save & Continue <i class="fa fa-save"></i></button>

      <a data-toggle="tab" id="next_three" href="#tab_awards" class="btn btn-outline btn-primary has-spinnered actived tab_awards" >Continue</a>                      
                </div>
            </div>
            <!--End Trailer Link-->

        </div>



    </div></form>
    </div>
    </div>
    </div>
    </div>                                                      


                                                    </div>

                                                    <div class="tab-pane" id="tab_awards">
                                                         <!--Awards-->
                                                        <div class="form-body">
                                                        <form id="filmAwards" method="post" action="{{ url('film_awards').'/'.$film->id }}" novalidate>
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Awards:
                                                                    <!--<span class="required"> * </span>-->
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <textarea rows="5" class="form-control" name="awards" placeholder="">{{ $film->awards }}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div> <!--End Awards -->
                                                        <!--Selections-->
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Selections:
                                                                    <!--<span class="required"> * </span>-->
                                                                </label>
                                                                <div class="col-md-10">
                                                                    <textarea rows="5" class="form-control" name="selection" placeholder="">{{ $film->selection }}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <input type="hidden" name="private" value="{{ Request::segment(2) }}">

                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">:

                                                                </label>
                                                                <div class="col-md-10" id="awardMessage">
                                                                    

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">

                                                                </label>
                                                                <div class="col-md-10">
                                                            <a class="btn btn-outline btn-primary has-spinnered actived tab_promotion" >back</a> 
                                                                    
                                                             <button id="awardSubmit" type="submit" class="btn btn-outline btn-primary has-spinnered actived">  Finish <i class="fa fa-save"></i></button>

                                                             </form>
                                                                   

                                                                </div>
                                                            </div>
                                                        </div>






                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
    </div>
</section>
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
                    <li><a class="twitter" href="{{ asset('site') }}/http://www.twitter.com/rootcave" target="_blank"><i class="fa fa-twitter fa-3x"></i></a></li>
                    <li><a class="facebook" href="{{ asset('site') }}/http://www.facebook.com/" target="_blank"><i class="fa fa-facebook fa-3x"></i></a></li>
                    <li><a class="google" href="{{ asset('site') }}/http://www.googleplus.com/" target="_blank"><i class="fa fa-google-plus fa-3x"></i></a></li>
                    <li><a class="instagram" href="{{ asset('site') }}/http://www.instagram.com/" target="_blank"><i class="fa fa-camera-retro fa-3x"></i></a></li>
                    <li><a class="pinterest" href="{{ asset('site') }}/http://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest fa-3x"></i></a></li>
                    <li><a class="linkedin" href="{{ asset('site') }}/http://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin fa-3x"></i></a></li>
                    <li><a class="Github" href="{{ asset('site') }}/http://www.github.com/" target="_blank"><i class="fa fa-github-alt fa-3x"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</section>


<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>&copy; Copyrights. I am a film All Rights Reserved. Created by <a href="{{ asset('site') }}/http://www.rootcave.com/">Root Cave.</a></p>
            </div>
        </div>
    </div>
</section>







<!-- add modals -->

    <!-- add director modal -->
    <div class="modal fade" id="adddir" tabindex="-1" role="dialog" aria-labelledby="adddirLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="adddirLabel">Add Director</h4>
          </div>
          <div class="modal-body">
            <form id="adddirform" method="post" action="{{ url('add_dir').'/'.$film->id }}">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Director Name:</label>
                <input type="text" class="form-control" name="director_name" id="adddirinput" placeholder="Director Name" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Director Email:</label>
                <input type="email" class="form-control" name="director_email" placeholder="Example@Example.com"  required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Director Phone:</label>
                <input type="tel" class="form-control" name="director_phone" placeholder="Director Phone"  required>
              </div>
              <div class="form-group" id="dirErrors">

              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">  <i class="fa fa-close"></i> Close</button>
            <button type="submit" form="adddirform" id="adddirsubmit" class="btn orange-default btn-outline sbold">  <i class="fa fa-plus-circle"></i> Add Director</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end add director modal -->

    <!-- edit director modal -->
    <div class="modal fade" id="edit_dir" tabindex="-1" role="dialog" aria-labelledby="edit_dir_Label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Director</h4>
          </div>
          <div class="modal-body">
            <form id="editdirform" method="post" action="{{ url('edit_dir').'/'.$film->id }}">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Director Name:</label>
                <input type="text" class="form-control" name="name" id="edit_dir_input" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Director Email:</label>
                <input type="email" class="form-control" name="email" id="edit_dir_email" placeholder="Example@Example.com"  required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Director Phone:</label>
                <input type="tel" name="phone" class="form-control" id="edit_dir_phone" placeholder=""  required>
                <input type="hidden" name="dir_id" id="dir_id" value="">
              </div>
              <div class="form-group" id="dirEditErrors">

              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">  <i class="fa fa-close"></i> Close</button>
            <button type="submit" form="editdirform" id="editdirsubmit" class="btn orange-default btn-outline sbold">  <i class="fa fa-plus-circle"></i> Edit Director</button>
          </div>
        </div>
      </div>
   </div>
    <!-- end edit director modal -->


    <!-- add producer modal -->
    <div class="modal fade" id="addprod" tabindex="-1" role="dialog" aria-labelledby="addprodLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="addprodLabel">Add Producer</h4>
          </div>
          <div class="modal-body">
            <form id="addprodform" method="post" action="{{ url('add_prod').'/'.$film->id }}">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Producer Name:</label>
                <input type="text" class="form-control" name="producer_name" id="addprodinput" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Producer Email:</label>
                <input type="email" class="form-control" name="producer_email" placeholder="Example@Example.com"  required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Producer Phone:</label>
                <input type="tel" class="form-control" name="producer_phone" placeholder=""  required>
              </div>
              <div class="form-group" id="prodErrors">

              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">  <i class="fa fa-close"></i> Close</button>
            <button type="submit" form="addprodform" id="addprodsubmit" class="btn orange-default btn-outline sbold">  <i class="fa fa-plus-circle"></i> Add Producer</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end add producer modal -->


    <!-- edit producer modal -->
    <div class="modal fade" id="edit_prod" tabindex="-1" role="dialog" aria-labelledby="edit_prod_Label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Producer</h4>
          </div>
          <div class="modal-body">
            <form id="editprodform" method="post" action="{{ url('edit_prod').'/'.$film->id }}">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Producer Name:</label>
                <input type="text" class="form-control" name="name" id="edit_prod_input" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Producer Email:</label>
                <input type="email" class="form-control" name="email" id="edit_prod_email" placeholder="Example@Example.com"  required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Producer Phone:</label>
                <input type="tel" name="phone" class="form-control" id="edit_prod_phone" placeholder=""  required>
                <input type="hidden" name="prod_id" id="prod_id" value="">
              </div>
              <div class="form-group" id="prodEditErrors">

              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">  <i class="fa fa-close"></i> Close</button>
            <button type="submit" form="editprodform" id="editprodsubmit" class="btn orange-default btn-outline sbold">  <i class="fa fa-plus-circle"></i> Edit Producer</button>
          </div>
        </div>
      </div>
   </div>
    <!-- end edit producer modal -->


    <!-- add product modal -->
    <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="addproductLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="addproductLabel">Add Production Company</h4>
          </div>
          <div class="modal-body">
            <form id="addproductform" method="post" action="{{ url('add_product').'/'.$film->id }}">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Production Company Name:</label>
                <input type="text" class="form-control" name="product_name" id="addproductinput" placeholder="" required>
              </div>
              <div class="form-group" id="productErrors">

              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">  <i class="fa fa-close"></i> Close</button>
            <button type="submit" form="addproductform" id="addproductsubmit" class="btn orange-default btn-outline sbold">  <i class="fa fa-plus-circle"></i> Add Production Company</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end add product modal -->

    <!-- edit product modal -->
    <div class="modal fade" id="edit_product" tabindex="-1" role="dialog" aria-labelledby="edit_product_Label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Production Company</h4>
          </div>
          <div class="modal-body">
            <form id="editproductform" method="post" action="{{ url('edit_product').'/'.$film->id }}">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Production Company Name:</label>
                <input type="text" class="form-control" name="name" id="edit_product_input" placeholder="" required>
              </div>
                <input type="hidden" name="product_id" id="product_id" value="">
              <div class="form-group" id="productEditErrors">

              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">  <i class="fa fa-close"></i> Close</button>
            <button type="submit" form="editproductform" id="editproductsubmit" class="btn orange-default btn-outline sbold">  <i class="fa fa-plus-circle"></i> Edit Production Company</button>
          </div>
        </div>
      </div>
   </div>
    <!-- end edit production modal -->

    <!-- add dist modal -->
    <div class="modal fade" id="adddist" tabindex="-1" role="dialog" aria-labelledby="adddistLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="adddistLabel">Add Distribution Company</h4>
          </div>
          <div class="modal-body">
            <form id="adddistform" method="post" action="{{ url('add_dist').'/'.$film->id }}">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Distribution Company Name:</label>
                <input type="text" class="form-control" name="dist_name" id="adddistinput" placeholder="" required>
              </div>
              <div class="form-group" id="distErrors">

              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">  <i class="fa fa-close"></i> Close</button>
            <button type="submit" form="adddistform" id="adddistsubmit" class="btn orange-default btn-outline sbold">  <i class="fa fa-plus-circle"></i> Add Distribution Company</button>
          </div>
        </div>
      </div>
    </div>
    <!-- end add dist modal -->

    <!-- edit dist modal -->
    <div class="modal fade" id="edit_dist" tabindex="-1" role="dialog" aria-labelledby="edit_dist_Label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Distribution Company</h4>
          </div>
          <div class="modal-body">
            <form id="editdistform" method="post" action="{{ url('edit_dist').'/'.$film->id }}">
              <div class="form-group">
                <label for="recipient-name" class="control-label">Distribution Company Name:</label>
                <input type="text" class="form-control" name="name" id="edit_dist_input" placeholder="" required>
              </div>
                <input type="hidden" name="dist_id" id="dist_id" value="">
              <div class="form-group" id="distEditErrors">

              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">  <i class="fa fa-close"></i> Close</button>
            <button type="submit" form="editdistform" id="editdistsubmit" class="btn orange-default btn-outline sbold">  <i class="fa fa-plus-circle"></i> Edit Distribution Company</button>
          </div>
        </div>
      </div>
   </div>
    <!-- end edit distion modal -->


<!-- edit member modal -->
    <!-- edit member modal -->
    <div class="modal fade" id="edit_team" tabindex="-1" role="dialog" aria-labelledby="edit_team_Label">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Edit Director</h4>
          </div>
          <div class="modal-body">
            <form id="editteamform" method="post" action="{{ url('edit_team').'/'.$film->id }}">
              <div class="form-group">
                <label for="recipient-name" class="control-label">First Name:</label>
                <input type="text" class="form-control" name="first_name" id="edit_team_input" placeholder="" required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Last Name:</label>
                <input type="text" class="form-control" name="last_name" id="edit_team_email" placeholder=""  required>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="control-label">Role:</label>
               <select name="role" id="multiple6" id="edit_team_phone" class=" form-control select2-multiple" >
                @foreach(filmTeam() as $value)
                <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
                </select>

                <input type="hidden" name="team_id" id="team_id" value="">
              </div>
              <div class="form-group" id="teamEditErrors">

              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">  <i class="fa fa-close"></i> Close</button>
            <button type="submit" form="editteamform" id="editteamsubmit" class="btn orange-default btn-outline sbold">  <i class="fa fa-plus-circle"></i> Edit Member</button>
          </div>
        </div>
      </div>
   </div>
    <!-- end edit teamector modal -->





<!-- end modals -->




    <!-- start DELETE dialogue modal -->
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
                         <h5>Are you sure you want to delete this ?</h5>
                     

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
      <!-- end DELETE dialogue modal -->




    <!-- start DELETE dialogue modal -->
    <div class="modal fade" id="modal-container-3496" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                         <h5>Are you sure you want to delete this ?</h5>
                     

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


                         <button class="btn btn-danger" id="submit_delete_press"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </button>
                      </div>
                 </form>

           </div>
    
                    
              <!-- end modal body -->
            </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end DELETE dialogue modal -->








    <!-- start DELETE subtitle modal -->
    <div class="modal fade" id="modal-container-3497" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                         <h5>Are you sure you want to delete this ?</h5>
                     

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


                         <button class="btn btn-danger" id="submit_delete_sub"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </button>
                      </div>
                 </form>

           </div>
    
                    
              <!-- end modal body -->
            </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end DELETE subtitles modal -->












    <!-- start DELETE other materials modal -->
    <div class="modal fade" id="modal-container-3498" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                         <h5>Are you sure you want to delete this ?</h5>
                     

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


                         <button class="btn btn-danger" id="submit_delete_mat"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </button>
                      </div>
                 </form>

           </div>
    
                    
              <!-- end modal body -->
            </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end DELETE other materials modal -->





<!-- Javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('site') }}/js/lib/jquery-1.11.2.min.js"></script>
<!--<script>window.jQuery || document.write('<script src="{{ asset('site') }}/js/jquery-1.11.2.min.js"><\/script>')</script>-->
<!--plugins-->
<script src="{{ asset('site') }}/js/lib/bootstrap.min.js"></script>
<script src="{{ asset('site') }}/js/lib/js.cookie.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery.blockui.min.js" type="text/javascript"></script>
<!--<script src="{{ asset('site') }}/js/vendors/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>-->
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<!--<script src="{{ asset('site') }}/js/vendors/moment.min.js" type="text/javascript"></script>-->
<!--<script src="{{ asset('site') }}/js/vendors/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>-->
<script src="{{ asset('site') }}/js/lib/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/vendor/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/jquery.fileupload.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/jquery.fileupload-process.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/jquery.fileupload-image.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/jquery.fileupload-audio.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/jquery.fileupload-video.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/jquery.fileupload-validate.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/jquery.fileupload-ui.js" type="text/javascript"></script>
<!--<script src="{{ asset('site') }}/js/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>-->
<!--<script src="{{ asset('site') }}/js/vendors/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>-->
<!--<script src="{{ asset('site') }}/js/vendors/clockface/js/clockface.js" type="text/javascript"></script>-->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('site') }}/js/lib/vendors/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('site') }}/js/lib/vendors/select2/js/select2.full.min.js"></script>
<script src="{{ asset('site') }}/js/lib/vendors/scripts/components-select2.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/scripts/form-fileupload.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/jquery.form.js"></script>
<script src="{{ asset('site') }}/js/lib//dropzone.js" ></script>

<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!--<script src="{{ asset('site') }}/js/vendors/scripts/layout.min.js" type="text/javascript"></script>-->
<!--<script src="{{ asset('site') }}/js/vendors/scripts/demo.min.js" type="text/javascript"></script>-->
<!--<script src="{{ asset('site') }}/js/vendors/scripts/quick-sidebar.min.js" type="text/javascript"></script>-->
<!-- END THEME LAYOUT SCRIPTS -->
<script type="text/javascript">
    
var url = '{{ url('/') }}';

</script>

<script src="{{ asset('site') }}/js/app/main.js"></script>
<script src="{{ asset('site') }}/js/app/create_edit_film.js"></script>
<script src="{{ asset('site') }}/js/lib/file_upload.js"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('adminstration') }}/assets/global/scripts/metronic.js" type="text/javascript"></script>

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/components-pickers.js"></script>




<script>
    !function ($) {
        $(function(){
            $('#header').carousel()
        })
    }(window.jQuery)
</script>
<script>
    
    $(document).ready(function () {



        /* tooltip */
            $('[data-toggle="tooltip"]').tooltip();   
        /* tooltip */





    //  start filmPosterDropzone
    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.filmPosterDropzone = {
      paramName: "film_poster", // The name that will be used to transfer the file
      maxFilesize: 8, // MB
        maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.bmp",
      init: function() {
        this.on("maxfilesexceeded", function(file){
            alert("No more files please!");
        });
  

      }
    };
    // End Dropzone customization
    // end filmPosterDropzone


    // start filmStillDropzone
    Dropzone.options.filmStillDropzoneOne = {
      paramName: "film_still_one", // The name that will be used to transfer the file
      maxFilesize: 8, // MB
       maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.bmp",
      init: function() {
        this.on("maxfilesexceeded", function(file){
            alert("No more files please!");
        });

      }      
    };

    // end filmStillDropzone






    // start filmStillDropzone
    Dropzone.options.filmStillDropzoneTwo = {
      paramName: "film_still_two", // The name that will be used to transfer the file
      maxFilesize: 8, // MB
       maxFiles: 1,
        acceptedFiles: ".jpeg,.png,.bmp,.jpg",
      init: function() {
        this.on("maxfilesexceeded", function(file){
            alert("No more files please!");
        });

      }      
    };

    // end filmStillDropzone






    // start filmStillDropzone
    Dropzone.options.filmStillDropzoneThree = {
      paramName: "film_still_three", // The name that will be used to transfer the file
      maxFilesize: 8, // MB
       maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.bmp",

      init: function() {
        this.on("maxfilesexceeded", function(file){
            alert("No more files please!");
        });

      }      
    };

    // end filmStillDropzone






    // start filmStillDropzone
    Dropzone.options.filmStillDropzoneFour = {
      paramName: "film_still_four", // The name that will be used to transfer the file
      maxFilesize: 8, // MB
       maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.bmp",
      init: function() {
        this.on("maxfilesexceeded", function(file){
            alert("No more files please!");
        });

      }      
    };

    // end filmStillDropzone





    // start directorPhotoDropzone
    Dropzone.options.directorPhotoDropzone = {
      paramName: "director_photo", // The name that will be used to transfer the file
      maxFilesize: 8, // MB
       maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.bmp",
      init: function() {
        this.on("maxfilesexceeded", function(file){
            alert("No more files please!");
        });

      }      
    };

    // end directorPhotoDropzone









    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.myAwesomeDropzone = {
      paramName: "subtitles", // The name that will be used to transfer the file
      maxFilesize: 8, // M
       acceptedFiles: ".srt,.sub,.doc,.docx",

    };
    // End Dropzone customization

    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.otherMaterialDropzone = {
      paramName: "other_material", // The name that will be used to transfer the file
      maxFilesize: 8, // MB
        acceptedFiles: ".doc,.docx,.srt,.pdf,sub,txt,ppt,.pptx",

    };
    // End Dropzone customization

    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.pressDropzone = {
      paramName: "press_kit", // The name that will be used to transfer the file
      maxFilesize: 8, // MB
        maxFiles: 1,
        acceptedFiles: ".ppt,.pptx,.txt,.doc,.docx,pdf",
      init: function() {
        this.on("maxfilesexceeded", function(file){
            alert("No more files please!");
        });
  

      }
    };
    // End Dropzone customization

    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.dialogueDropzone = {
      paramName: "dialogue_list", // The name that will be used to transfer the file
      maxFilesize: 8, // MB
      maxFiles: 1,
        acceptedFiles: ".ppt,.pptx,.txt,.doc,.docx,pdf",
      init: function() {
        this.on("maxfilesexceeded", function(file){
            alert("No more files please!");
        });
  

      }
    };
    // End Dropzone customization

//            $("#filmPassword").hide();
//
//              if ($('select[name="status"]').val() == 0) {
//
//              $("#filmPassword").show();
//
//              }else{
//                  $("#filmPassword").hide();
//
//              }

        /* viewing the states */
//        $(document).on('click','.status',function(){
//
//
//            var status = $('select[name="status"]').val();
//
//            if (status == 0) {
//
//              $("#filmPassword").show();
//
//            }else{
//
//              $("#filmPassword").hide();
//
//            }
//
//
//        });
        /* end viewing the states */


        
        $(".tab_prod").on('click',function () {

            $(".tab_general_li").removeClass('active');            
            $("#tab_general").removeClass('active');
            $("#tab_prod").addClass('active');
            $(".tab_prod_li").addClass('active');
            $("#tab_film_materials").removeClass('active');
            $(".tab_film_materials_li").removeClass('active');
            window.scrollTo(0,0);
        });

        $(".tab_film_materials").on('click',function () {

            $(".tab_prod_li").removeClass('active');            
            $("#tab_prod").removeClass('active');
            $("#tab_film_materials").addClass('active');
            $(".tab_film_materials_li").addClass('active');
            $("#tab_promotion").removeClass('active');
            $(".tab_promotion_li").removeClass('active');
            window.scrollTo(0,0);

        });

        $(".tab_promotion").on('click',function () {

            $(".tab_film_materials_li").removeClass('active');            
            $("#tab_film_materials").removeClass('active');
            $("#tab_promotion").addClass('active');
            $("#tab_awards").removeClass('active');
            $(".tab_awards_li").removeClass('active');
            $(".tab_promotion_li").addClass('active');
            window.scrollTo(0,0);

        });

        $(".tab_awards").on('click',function () {

            $(".tab_promotion_li").removeClass('active');            
            $("#tab_promotion").removeClass('active');
            $("#tab_awards").addClass('active');
            $(".tab_awards_li").addClass('active');
            window.scrollTo(0,0);

        });

 /*
      *
      * show delete dialogue list  
      *
      */
      $('body').on('click','.delete_dialogue',function(){

        var product = $(this).data('id');

          $('#product_id_delete').val(product);
          $('#modal-container-3495').modal('show');


      });

    /*
         *
         *  end showing delete modal dialogue list
         *
    */




      /* start Deleting dialogue list  */
        
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
        var url = '{{ url('/') }}';
        console.log(url);
        $.post(url+'/film/delete_dialogue/'+product_id_delete,function(data){

                $("#film" + product_id_delete).remove();                                             
               $('#modal-container-3495').modal('hide');

        });
                        return false;

      });
      /* End Deleting dialogue list */


/*
      *
      * show delete press kit  
      *
      */
      $('body').on('click','.delete_press',function(){

        var product = $(this).data('id');

          $('#product_id_delete').val(product);
          $('#modal-container-3496').modal('show');


      });

    /*
         *
         *  end showing delete modal dialogue list
         *
    */




      /* start Deleting dialogue list  */
        
        $('body').on('click','#submit_delete_press',function(){
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
        var url = '{{ url('/') }}';

        $.post(url+'/film/delete_press/'+product_id_delete,function(data){

                $("#pressKit" + product_id_delete).remove();                                             
               $('#modal-container-3496').modal('hide');

        });
                        return false;

      });
      /* End Deleting dialogue list */




/*
      *
      * show delete subtitles  
      *
      */
      $('body').on('click','.delete_sub',function(){

        var product = $(this).data('id');

          $('#product_id_delete').val(product);
          $('#modal-container-3497').modal('show');


      });

    /*
         *
         *  end showing delete modal dialogue list
         *
    */




      /* start Deleting dialogue list  */
        
        $('body').on('click','#submit_delete_sub',function(){
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
        var film_id    = '{{ $film->id }}';
        var url = '{{ url('/') }}';

        $.post(url+'/film/delete_sub/'+product_id_delete+'/'+film_id,function(data){

                $("#sub" + product_id_delete).remove();                                             
               $('#modal-container-3497').modal('hide');

        });
                        return false;

      });
      /* End Deleting dialogue list */





/*
      *
      * show delete subtitles  
      *
      */
      $('body').on('click','.delete_mat',function(){

        var product = $(this).data('id');

          $('#product_id_delete').val(product);
          $('#modal-container-3498').modal('show');


      });

    /*
         *
         *  end showing delete modal dialogue list
         *
    */




      /* start Deleting dialogue list  */
        
        $('body').on('click','#submit_delete_mat',function(){
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
        var film_id    = '{{ $film->id }}';
        var url = '{{ url('/') }}';

        $.post(url+'/film/delete_mat/'+product_id_delete+'/'+film_id,function(data){

                $("#mat" + product_id_delete).remove();                                             
               $('#modal-container-3498').modal('hide');

        });
                        return false;

      });
      /* End Deleting dialogue list */




    });




</script>
<script>
        jQuery(document).ready(function() {       

           ComponentsPickers.init();
        });   

</script>


</body>

</html>
