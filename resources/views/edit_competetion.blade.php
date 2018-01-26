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
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

    <link href="{{ asset('site') }}/css/jqvmap.css" media="screen" rel="stylesheet" type="text/css">


    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/css/jquery.fileupload-ui.css">

    <link href="{{ asset('site') }}/css/vendors/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site') }}/css/vendors/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site') }}/css/component.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/plugins.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/main.css">

    <link rel="stylesheet" href="{{ asset('site') }}/css/signup.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/responstable.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>


    <script src="{{ asset('site') }}/js/lib/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('site') }}/../../../../../apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('site') }}/../../../../../apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('site') }}/../../../../../apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('site') }}/../../../../../apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="{{ asset('site') }}/../../../../../favicon.html">
    <style type="text/css">
        #continue2{
            display: none;
        }
        .btn-primary:hover,.btn-primary:active,.btn-primary:visited,.btn-primary:focus{
            background-color: #ff755a!important;
        }
    </style>
</head>

<body>

@include('partials.navbar')

<!--Content-->
<section class="signup-margin">
    <div class="container">
        <div class="row">



                <form id="editCompForm" action="{{ url('festival/editcompetetion').'/'.$comp->id }}" method="post">



                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Competetion Name:</label>
                        <input type="text" name="comp_name" id="comp_name" value="{{ $comp->comp_name }}" class="form-control"  placeholder="Soliman Mahmoud" required>
                    </div>



                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Student Film Only:</label>
                        <input type="radio" name="student_only" value="0" {{ $comp->student_only == 0 ? 'checked' : '' }}>Yes
                        <input type="radio" name="student_only" value="1"  {{ $comp->student_only == 1 ? 'checked' : '' }}> No
                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Film Category:</label>
                        <select name="film_categories[]" class="form-control select2-multiple" required multiple>
                        <option value="all" {{ in_array('all',json_decode($comp->film_categories)) ? 'selected' : '' }}>All Categories</option>
                            @foreach(filmCategory() as $cats)
                                <option value="{{ $cats }}" {{ in_array($cats,json_decode($comp->film_categories)) ? 'selected' : '' }}>{{ $cats }}</option>
                            @endforeach
                        </select>
                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Accepted Regions:</label>
                        <select name="accepted_regions[]" class="form-control select2-multiple" required multiple>
                        <option value="all" {{ in_array('all',json_decode($comp->accepted_regions)) ? 'selected' : '' }}>All Regions</option>                        
                            @foreach(acceptedRegions() as $cats)
                                <option value="{{ $cats }}"  {{ in_array($cats,json_decode($comp->accepted_regions)) ? 'selected' : '' }}>{{ $cats }}</option>
                            @endforeach
                        </select>
                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Themes Accepted :</label>
                        <select name="film_themes[]" id="film_themes" class="form-control select2-multiple" required multiple>
                        <option value="all" {{ in_array('all',json_decode($comp->film_themes)) ? 'selected' : '' }}>All Themes</option>           
                            @foreach(filmThemes() as $cat)
                                <option value="{{ $cat }}" {{ in_array($cat,json_decode($comp->film_themes)) ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>

                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Genres Accepted :</label>
                        <select name="film_genres[]" id="film_genres" class="form-control select2-multiple" required multiple>
                        <option value="all" {{ in_array('all',json_decode($comp->film_genres)) ? 'selected' : '' }}>All Genres</option>       
                            @foreach(filmGenres() as $cat)
                                <option value="{{ $cat }}" {{ in_array($cat,json_decode($comp->film_genres)) ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>

                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Countries:</label>
                        <select name="countries[]" class="form-control select2-multiple" required multiple>
                        <option value="all" {{ in_array('all',json_decode($comp->countries)) ? 'selected' : '' }}>All Countries</option>
                            @foreach(countryTable() as $key => $value)
                                <option value="{{ $key }}" {{ in_array($key,json_decode($comp->countries)) ? 'selected' : '' }}>{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>





                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Language :</label>
                        <select name="film_languages[]" class="form-control select2-multiple" required multiple>
                            @foreach(filmLangArray() as $cat)
                                <option value="{{ $cat }}" {{ in_array($cat,json_decode($comp->film_languages)) ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Language of Subtitles :</label>
                        <select class="form-control select2-multiple" name="film_lang_subtitle[]" required multiple>
                            @foreach(filmLangArray() as $cat)
                                <option value="{{ $cat }}" {{ in_array($cat,json_decode($comp->film_lang_subtitle)) ? 'selected' : '' }}>{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Fees:</label>
                        <input type="number" name="fees" value="{{ $comp->fees }}" class="form-control" placeholder="Add Fees In Dollars">
                    </div>



                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">         
                        <label for="recipient-name" class="control-label">Submission Begins:</label>

                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>

                        <input type="text" name="submission_begins" value="{{ date('d-m-Y', strtotime($comp->submission_begins)) }}" class="form-control" readonly>
                    </div>


                       </div>
                        <div class="col-md-6">  
                        <label for="recipient-name" class="control-label">Deadline:</label>
                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>

                        <input type="text" name="deadline" value="{{ date('d-m-Y', strtotime($comp->deadline)) }}" class="form-control" readonly>
                    </div>

                    </div>
                    </div>
                    </div>



                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">         
                        <label for="recipient-name" class="control-label">Competetion Will Run From:</label>
                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>

                        <input type="text" name="comp_from" value="{{date('d-m-Y', strtotime($comp->comp_from)) }}" class="form-control" readonly>
                    </div>


                        </div>
                        <div class="col-md-6">  
                        <label for="recipient-name" class="control-label">To:</label>

                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>

                        <input type="text" name="comp_to"  value="{{ date('d-m-Y', strtotime($comp->comp_to)) }}" class="form-control" readonly>
                    </div>


                       </div>
                    </div>
                    </div>


                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Production Date:</label>
                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    
                        <input type="text"  value="{{ date('d-m-Y', strtotime($comp->production_date)) }}" name="production_date" class="form-control" readonly>
                    </div>

                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Max Film Duration:</label>
                        <input type="number" value="{{ $comp->max_duration }}" name="max_duration" class="form-control">
                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Requirements:</label>
                        <textarea class="form-control" name="requirements"  id="comp_require"  placeholder="add competetion requirements">{{ $comp->requirements }}</textarea>
                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label"></label>
                        <div id="ErrorComp"></div>
                    </div>



                    <input type="hidden" name="comp_id" value="" id="comp_id">

                </form>
            </div>
            

            
                <button type="submit" form="editCompForm" id="editCompSubmit" class="btn btn-primary orange-default btn-outline sbold">  <i class="fa fa-plus-circle"></i> Edit Competetion</button>
                <?php 
                    
                    $uri_path = parse_url(url()->previous(), PHP_URL_PATH);
                    $uri_segments = explode('/', $uri_path);

                 ?>
                 @if($uri_segments[2] == 'signup')
                <a href="{{ url('festival/signup#tab4') }}" class="btn default button-previous btn-inverse">
                <i class="fa fa-angle-left"></i> Back </a><br><br>
                @endif


                 @if($uri_segments[1] == 'edit')
                <a href="{{ url()->previous() }}" class="btn default button-previous btn-inverse">
                <i class="fa fa-angle-left"></i> Back </a><br><br>
                @endif







    </div>

  </div>

</div>
<!-- end DELETE modal -->


<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>&copy; Copyrights. I am a film All Rights Reserved. Created by <a href="{{ asset('site') }}/http://www.rootcave.com/">Root Cave.</a></p>
            </div>
        </div>
    </div>
</section>
<!-- adding one meta tag for ajax compatability for all requests  -->
<meta name="_token" content="{!! csrf_token() !!}" />


<!-- Javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="{{ asset('site') }}/js/lib/jquery-1.11.2.min.js"><\/script>')</script>
<script src="{{ asset('site') }}/js/lib/bootstrap.min.js"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('site') }}/js/lib/vendors/scripts/app.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>


<script src="{{ asset('site') }}/js/lib/vendors/select2.full.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/vendor/jquery.ui.widget.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/vendor/tmpl.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/vendor/load-image.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/vendor/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/blueimp-gallery/jquery.blueimp-gallery.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/js/jquery.iframe-transport.js" type="text/javascript"></script>
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
<script src="{{ asset('site') }}/js/lib/vendors/bootstrap-wizard/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/select2/js/select2.full.min.js"></script>
<script src="{{ asset('site') }}/js/lib/vendors/scripts/components-select2.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/scripts/form-fileupload.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/jquery.form.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('site') }}/js/lib/vendors/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('adminstration') }}/assets/global/scripts/metronic.js" type="text/javascript"></script>

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/components-pickers.js"></script>


<script src="{{ asset('site') }}/js/lib/vendors/scripts/form-wizard.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/file_upload.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script src="{{ asset('site') }}/js/app/main.js"></script>
<script >
    var url = "{{ url('festival/add') }}";
    var edit_comp = "{{ url('festival/edit_comp') }}";
    var dele_comp_url = '{{ url('/festival') }}';
</script>
<script src="{{ asset('site') }}/js/app/festival_signup.js"></script>
<script>
        jQuery(document).ready(function() {       

           ComponentsPickers.init();
        });   
    </script>

</body>

</html>