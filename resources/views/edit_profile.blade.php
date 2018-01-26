@extends('partials.partialsapp')

@section('header.scripts')
     <link href="{{ asset('site') }}/css/vendors/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site') }}/css/vendors/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site') }}/css/component.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/plugins.css">
    
<link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" href="{{ asset('site') }}/css/old_profile.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>



@stop

@section('content')

<!--Edit Profile section-->
<div class="container wrapper">
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PROFILE SIDEBAR -->
        <div class="profile-sidebar">
            <!-- PORTLET MAIN -->
            <div class="portlet light profile-sidebar-portlet ">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">

                   <!-- check if file exists -->
                    @if(file_exists('images/filmmakers/'.$user->photo ))
                    <img alt="" src="{{ url('/') }}/images/filmmakers/{{$user->photo}}" class="img-responsive" alt="">
                    @else
                    <img alt="" src="http://placehold.it/150x150?text=no image">
                    @endif
                    <!-- end check file -->
               </div>

                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> {{ $user->fullname }} </div>
                    <div class="profile-usertitle-job"> Director </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <!--<div class="profile-userbuttons">-->
                    <!--<button type="button" class="btn btn-circle green btn-sm">Follow</button>-->
                    <!--<button type="button" class="btn btn-circle red btn-sm">Message</button>-->
                <!--</div>-->
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li>
                            <a href="{{ url ($user->username) }}">
                                <i class="icon-home"></i> Overview </a>
                        </li>
                        <li class="active">
                            <a href="{{ url ('edit').'/'.$user->username }}">
                                <i class="icon-settings"></i> Account Settings </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <div class="portlet light ">
                <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> {{ $films }} </div>
                        <div class="uppercase profile-stat-text"> Films </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <div class="uppercase profile-stat-title"> {{ count($submitted_films) }} </div>
                        <div class="uppercase profile-stat-text"> Submission </div>
                    </div>
                </div>
                <!-- END STAT -->
                <div>
                    <h4 class="profile-desc-title">About {{ $user->fullname }}</h4>
                    <span class="profile-desc-text"> {{ $user->biography }}. </span>
                    <!--<div class="margin-top-20 profile-desc-link">-->
                        <!--<i class="fa fa-globe"></i>-->
                        <!--<a href="http://www.iamafilm.com/" target="_blank">www.iamafilm.com</a>-->
                    <!--</div>-->
                    <!--<div class="margin-top-20 profile-desc-link">-->
                        <!--<i class="fa fa-twitter"></i>-->
                        <!--<a href="http://www.twitter.com/iamafilm/" target="_blank">@iamafilm</a>-->
                    <!--</div>-->
                    <!--<div class="margin-top-20 profile-desc-link">-->
                        <!--<i class="fa fa-facebook"></i>-->
                        <!--<a href="http://www.facebook.com/iamafilm/" target="_blank">iamafilm</a>-->
                    <!--</div>-->
                </div>
            </div>
            <!-- END PORTLET MAIN -->
        </div>
        <!-- END BEGIN PROFILE SIDEBAR -->


<!-- BEGIN PROFILE CONTENT -->
        <div class="profile-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light ">
                        <div class="portlet-title tabbable-line">
                            <div class="caption caption-md">
                                <i class="icon-globe theme-font hide"></i>
                                <span class="caption-subject font-blue-madison bold uppercase">Profile Account</span>
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                                </li>
                                <li>
                                    <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab">Change Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="portlet-body">
                            <div class="tab-content">
                          <!-- display validation errors -->
                              @if (Session::has('update'))
                                  <div class="alert alert-success">
                                      Updated Successfully
                                  </div>
                              @endif
                              @if (Session::has('old-password'))
                                  <div class="alert alert-danger">
                                      Old Password Error
                                  </div>
                              @endif
                              @if (Session::has('unique_email'))
                                  <div class="alert alert-danger">
                                      this email has already been taken
                                  </div>
                              @endif
                              @if (Session::has('unique_username'))
                                  <div class="alert alert-danger">
                                      this username has already been taken
                                  </div>
                              @endif
                              <!-- end display errors -->
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                <!-- PERSONAL INFO TAB -->
                                <div class="tab-pane active" id="tab_1_1">
                                    <form role="form" method="post" action="{{ url('edit').'/'.$user->username }}">
                                        <div class="form-group">
                                            <label class="control-label">Full Name</label>
                                            <input type="text" placeholder="John Deo" class="form-control" name="fullname" value="{{ $user->fullname }}" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">UserName</label>
                                            <input type="text" placeholder="soly2014" class="form-control" name="username" value="{{ $user->username }}" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="text" placeholder="Example@Example.com" class="form-control" name="email" value="{{ $user->email }}" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">Mobile Number</label>
                                            <input type="text" placeholder="+1 646 580 (6284)" class="form-control" name="phone" value="{{ $user->phone }}" /> </div>
                                      
                                        <div class="form-group">
                                            <label class="control-label ">Gender
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="">
                                                <div class="radio-list">
                                                    <label>
                                                        <input type="radio" name="gender" value="male" data-title="Male" {{ $user->gender == 'male' ? 'checked' : '' }}  /> Male </label>
                                                    <label>
                                                    
                                                        <input type="radio" name="gender" value="female" data-title="Female" {{ $user->gender == 'female' ? 'checked' : '' }}    /> Female </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label ">Address
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="">
                                                <input value="{{$user->address}}" type="text" class="form-control" name="address" />
                                            </div>
                                        </div>


                                         <div class="form-group">
                                            <label class="control-label ">City/Town
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="">
                                                <input value="{{$user->city}}" type="text" class="form-control" name="city" />
                                            </div>
                                        </div>


                                     <div class="form-group">
                                        <label class="control-label ">Country</label>
                                        <div class="">
                                                <select name="country" id="country_list" class="form-control">
                                            <option value=""></option>

                                        @foreach(countryArray() as $count)
                                            <option value="{{ $count }}"  {{ $count == $user->country ? 'selected' : '' }}>{{ $count }}</option>
                                        @endforeach

                                              </select>
                                            </div>
                                        </div>
                    



                                     <div class="form-group">
                                        <label class="control-label ">Where To Appear On Film Makers Map</label>
                                        <div class="">
                                                <select name="country_in_map" id="country_list_two" class="form-control">
                                            <option value=""></option>

                                        @foreach(countryArray() as $count)
                                            <option value="{{ $count }}"  {{ $count == $user->country_in_map ? 'selected' : '' }}>{{ $count }}</option>
                                        @endforeach

                                              </select>
                                            </div>
                                        </div>
                    


                                  <div class="form-group">
                                            <label class="control-label ">Profession
                                                <span class="required"> * </span>
                                            </label>

                                            <div class="">
                                            <select name="profession[]"  id="multiple" class=" form-control select2-multiple"  multiple >
                                                    <optgroup label="I am a film" >
                                                @foreach(filmProfession() as $count)
                                                   <option value="{{ $count }}" {{ in_array($count,json_decode($user->Profession)) ? 'selected' : '' }}>{{ $count }}</option>
                                                 @endforeach
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>      
                          
                                        <div class="form-group">
                                            <label class="control-label">Birthdate</label>

                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>

                        <input type="text" name="birthdate" value="{{ date('d-m-Y', strtotime($user->birthdate)) }}" class="form-control" readonly>
                    </div>

                                  
                                        </div>
                                      
                                        <div class="form-group">
                                            <label class="control-label">Bio</label>
                                            <textarea class="form-control" name="biography" rows="3" placeholder="Add Your Biography Here">{{ $user->biography }}</textarea>
                                        </div> 
                                        <div class="form-group">
                                            <label class="control-label">Filmography</label>
                                            <textarea class="form-control" name="filmography" rows="3" placeholder="Add Your Filmography Here">{{ $user->filmography }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Awards and Achievements</label>
                                            <textarea class="form-control" name="awards" rows="3" placeholder="Add Your Awards Here">{{ $user->awards }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Facebook Url</label>
                                            <input type="text" name="facebook_url" value="{{ $user->facebook_url }}" placeholder="http://www.website.com" class="form-control" /> 
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Twitter Url</label>
                                            <input type="text" name="linkedin_url" value="{{ $user->linkedin_url }}"  placeholder="http://www.website.com" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Instagram Url</label>
                                            <input type="text" name="instagram_url" value="{{ $user->instagram_url }}"  placeholder="http://www.website.com" class="form-control" /> 
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Youtube Url</label>
                                            <input type="text" name="youtube_url" value="{{ $user->youtube_url }}"  placeholder="http://www.website.com" class="form-control" /> 
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Vimeo Url</label>
                                            <input type="text" name="vimeo_url" value="{{ $user->vimeo_url }}"  placeholder="http://www.website.com" class="form-control" /> 
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">IMDB Url</label>
                                            <input type="text" name="imdb_url" value="{{ $user->imdb_url }}"  placeholder="http://www.website.com" class="form-control" /> 
                                        </div>
                                        <div class="margiv-top-10">
                                            <button type="Submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    
                                    
                                    <form action="{{ url('updatephoto').'/'.$user->username }}" method="post" enctype="multipart/form-data" role="form">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">

                   <!-- check if file exists -->
                    @if(file_exists('images/filmmakers/'.$user->photo ))
                    <img alt="" src="{{ url('/') }}/images/filmmakers/{{$user->photo}}" class="img-responsive" alt="">
                    @else
                    <img alt="" src="http://placehold.it/200x150?text=no image">
                    @endif
                    <!-- end check file -->
                                                    </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                                            <span class="btn default btn-file">
                                                                                <span class="btn btn-info"> Select image </span>
                                                                                <span class="fileinput-exists"> Change </span>
                                                                                <input type="file" name="photo"> </span>
                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                            <div class="clearfix margin-top-10">
                                            </div>
                                        </div>
                                        <div class="margin-top-10">
                                            <button type="submit" class="btn btn-primary"> Submit Changes</a>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CHANGE AVATAR TAB -->
                                <!-- CHANGE PASSWORD TAB -->
                                <div class="tab-pane" id="tab_1_3">
                                    <form action="{{ url('updatepass').'/'.$user->username }}" method="post">
                                        <div class="form-group">
                                            <label class="control-label">Current Password</label>
                                            <input type="password" name="password" class="form-control" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">type New Password</label>
                                        <input type="password" name="npass" class="form-control" /> </div>
                                        <div class="margin-top-10">
                                            <button type="submit" class="btn btn-success"> Change Password </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END CHANGE PASSWORD TAB -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PROFILE CONTENT -->
    </div>
</div>

</div>
<!--end Edit PRofile Section-->


@section('footer.scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<!-- Javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script>window.jQuery || document.write('<script src="{{ asset('site') }}/js/lib/jquery-1.11.2.min.js"><\/script>')</script>
<script src="{{ asset('site') }}/js/lib/bootstrap.min.js"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('site') }}/js/lib/vendors/scripts/app.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>


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

<script src="{{ asset('site') }}/js/lib/vendors/scripts/form-wizard.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/file_upload.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script src="{{ asset('site') }}/js/app/main.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('adminstration') }}/assets/global/scripts/metronic.js" type="text/javascript"></script>

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/components-pickers.js"></script>
<script>
        jQuery(document).ready(function() {       

           ComponentsPickers.init();
        });   
    </script>



@stop