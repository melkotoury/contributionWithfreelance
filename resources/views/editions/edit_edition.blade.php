@extends('partials.partialsapp')



@section('header.scripts')

    <link rel="stylesheet" href="{{ url('site') }}/css/create_edit_film.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>

@stop


@section('content')

<section id="main" class="margin-top-100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal form-row-seperated" method="post" action="{{ url('festival/edit_edition').'/'.$edition->id }}" id="addEdition" enctype="multipart/form-data">
                    <div class="portlet">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-film"></i>Edit Edition </div>
                        </div>
                        <div class="portlet-body">
                            <div class="tabbable-bordered">
                                <ul class="nav nav-tabs">
                                    <li class="tab_general_li active">
                                        <a href="#tab_general" data-toggle="tab"> General </a>
                                    </li>

                                    <li class="tab_awards_li">
                                        <a href="#tab_awards" data-toggle="tab"> Selections & Awards </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_general">
                                                        <!--Editon Number-->

                                                        <div class="form-body">
                                                            <div class="form-group">
                                                                <label class="col-md-2 control-label">Edition Number
                                                                <span class="required">*</span>
                                                            </label>
                                                                <div class="col-md-10">
                                                                <input type="number" class="form-control" name="edition_number" value="{{ $edition->number }}" placeholder="" >
                                                                </div>
                                                            </div>
                                                        </div>

                                                    <!--End Edition Number-->
                                                    <!--Edition Year-->
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Edition Year
                                                                <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-10">
                                                                <input type="text"  value="{{ $edition->year }}" class="form-control" name="edition_year" placeholder="" >
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <!--Edition Year-->
                                                    <!-- start add Jury -->
                                                    {{--@if(count(festivalProgrammers($festival->id)) > 0)--}}
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Jury
                                                                <span class="required">*</span>
                                                            </label>
                                                            <div class="col-md-10">
                                                                <textarea type="text" class="form-control" name="jury" placeholder="" rows="3">
                                                                {{ $edition->jury }}
                                                                </textarea>

                                                                {{--<select name="jury[]" class="form-control js-example-tags" multiple>--}}
                                                    {{--@foreach(festivalProgrammers($festival->id) as $key => $value)--}}
                                                     {{--<option value="{{ $key }}">{{ $value }}</option>--}}
                                                    {{--@endforeach--}}
                                                    {{--</select>--}}
                                                           </div>

                                                        </div>
                                                    </div>
                                                    <!-- end add Jury -->

                                        <!-- Film Poster -->
                                        <div class="form-group">
                                            <label class="col-md-2 control-label">Edition's Poster:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-10">
                                                <h5>Select Your Edition Poster & Upload it (only accept .jpg .png .jpeg)</h5>
                                                <div class="input-group">

                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail" style="width: 300px; height: 150px;">

                            @if(file_exists($edition->edition_poster))
                                <img alt="" src="{{ url($edition->edition_poster) }}" alt="" class="img-responsive">
                            @else
                            <img alt="" src="http://placehold.it/300x150?text=no image">
                            @endif
                                

                                                            </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 150px;"> </div>
                                                        <div>
                                                            
                                                        <span class="btn-file">
                                                        <button class="btn btn-outline btn-primary has-spinnered actived"><i class="fa fa-hand-rock-o" aria-hidden="true"></i> &nbsp; Select Poster </button>

                                                        <input type="file" name="edition_poster"> </span>
                                                                <br><br>
                                                            <span class="required"> * </span> Note: you should select poster before upload it.

                                                        </div>
                                                    </div>


                                                    <div id="posterMessage"></div>
                                                    <div class="clearfix margin-top-10">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- end Edition Poster -->
                                                    {{--@else--}}

                                                    {{--@endif--}}
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                            </label>
                                                            <div class="col-md-10">
                                                            {{--<div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> You May Add Programmmers </div>--}}
                                                            <a class="btn btn-primary tab_awards">Continue</a>
                                                            </div>

                                                        </div>
                                                    </div>
                                    </div>



                                                    <!--End Edition Year-->
                                                <div class="tab-pane " id="tab_awards">
                                                    <!--Awards-->
                                                    <div class="form-body">
                                                                <div class="form-group">
                                                                    <label class="col-md-2 control-label">awarded films:
                                                                        <!--<span class="required"> * </span>-->
                                                                    </label>
                                                                        <div class="col-md-10">
                                                                            <textarea rows="5" class="form-control" name="awards" placeholder="">{{ $edition->awards }}
                                                                            </textarea>
                                                                </div>

                                                            </div> <!--End Awards -->

                                                    </div>
                                                    <!--Selections-->
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                        <label class="col-md-2 control-label">selected films:
                                                                <!--<span class="required"> * </span>-->
                                                            </label>
                                                            <div class="col-md-10">
                                                                <textarea rows="5" class="form-control" name="selections" placeholder="">
                                                                    {{ $edition->selections }}
                                                                    </textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--Selections-->
                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                            </label>
                                                            <div class="col-md-10" id="addEditionMessages">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">
                                                            </label>
                                                            <div class="col-md-10">
                                                            <button type="submit" class="btn btn-primary" id="add_edition_submit"> Edit Edition <i class="fa fa-plus-circle"></i> </button> </form>
                                                            <a class="tab_general btn btn-primary">back</a>
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

@stop


@section('footer.scripts')
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
<script src="{{ asset('site') }}/js/lib//select2.min.js"></script>
<script src="{{ asset('site') }}/js/lib/jquery.form.js"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script src="{{ asset('site') }}/js/app/add_festival_edition.js"></script>

<script>
    
    $(document).ready(function () {



        /* start add edition poster website */

        $('#editionPoster').ajaxForm({

            beforeSubmit: function () {

                $('#submitPoster').html('Uploading...');

            },
            success: function (response) {

                $('#submitPoster').html('Upload Poster');
                $('#posterMessage').html("<div class='alert alert-success'>Uploaded Successfully </div>");

            },
            error: function (error) {
                //process validation errors here.
                var errors = error.responseJSON; //this will get the errors response data.
                //show them somewhere in the markup
                //e.g
                errorsHtml = '<div class="alert alert-danger"><ul>';

                $.each(errors, function (key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul></div>';
                $('#posterMessage').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
                // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

                $('#submitPoster').html('Upload Poster');


            },

        });


        /* end add edition poster */
        $(".js-example-tags").select2({
             tags: true
        })

        
        $(".tab_awards").on('click',function () {

            $(".tab_general_li").removeClass('active');            
            $("#tab_general").removeClass('active');
            $("#tab_awards").addClass('active');
            $(".tab_awards_li").addClass('active');
            window.scrollTo(0,0);
        });

        $(".tab_general").on('click',function () {

            $("#tab_awards").removeClass('active');
            $(".tab_awards_li").removeClass('active');
            $(".tab_general_li").addClass('active');            
            $("#tab_general").addClass('active');
            window.scrollTo(0,0);

        });




    /* add Edition form 3 */
    $('#addEdition').ajaxForm({

        beforeSubmit: function() {

            $('#add_edition_submit').html(' loading...');

        },
        success: function(data) {

            $('#add_edition_submit').html('Edit Edition');
            $('#addEditionMessages').html('<div class="alert alert-success">Editted Successfully</div>');

        },
        error: function(error) {
            //process validation errors here.
            var errors = error.responseJSON; //this will get the errors response data.
            //show them somewhere in the markup
            //e.g
            errorsHtml = '<div class="alert alert-danger"><ul>';

            $.each(errors, function(key, value) {
                errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
            });
            errorsHtml += '</ul></div>';
            $('#addEditionMessages').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
            // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

            $('#add_edition_submit').html('Edit Edition');


        },

    });
    /* end add Edition form */




    });



</script>

@stop