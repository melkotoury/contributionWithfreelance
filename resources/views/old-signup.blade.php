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
        .btn-primary:hover,.btn-primary:active,.btn-primary:visited{

            background-color: #ff755a!important;
        }
    </style>
</head>

<body>

@include('partials.navbar')
  
    <!--Content-->
    <section id="signup" class="signup-margin">
      <div class="container">
        <div class="row">
            <div class="portlet light bordered" id="form_wizard_1">
                <div class="portlet-title">
                    <!--<div class="caption">-->
                        <!--<i class=" icon-layers font-red"></i>-->
                        <!--<span class="caption-subject font-red bold uppercase"> Form Wizard - -->
                                                <!--<span class="step-title"> Step 1 of 4 </span>-->
                                            <!--</span>-->
                    <!--</div>-->
                    <!--<div class="actions">-->
                        <!--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">-->
                            <!--<i class="icon-cloud-upload"></i>-->
                        <!--</a>-->
                        <!--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">-->
                            <!--<i class="icon-wrench"></i>-->
                        <!--</a>-->
                        <!--<a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">-->
                            <!--<i class="icon-trash"></i>-->
                        <!--</a>-->
                    <!--</div>-->
                </div>
                <div class="portlet-body form">
               <form class="form-horizontal" action="#" id="submit_form" method="POST">
                        <div class="form-wizard">
                            <div class="form-body">
                                <ul class="nav nav-pills nav-justified steps">
                                    <li >
                                        <a href="#tab1" data-toggle="tab" class="step">
                                            <span class="number"> 1 </span>
                                            <span class="desc">
                                                                    <i class="fa fa-check"></i> Account Setup </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab" class="step">
                                            <span class="number"> 2 </span>
                                            <span class="desc">
                                                                    <i class="fa fa-check"></i> Profile Setup </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#tab3" data-toggle="tab" class="step active">
                                            <span class="number"> 3 </span>
                                            <span class="desc">
                                                                    <i class="fa fa-check"></i> Profession Setup </span>
                                        </a>
                                    </li>
                                    <!--.nav > li > a -->
                                    <li>
                                        <a href="#tab4" data-toggle="tab" class="step">
                                            <span class="number"> 4 </span>
                                            <span class="desc">
                                                                    <i class="fa fa-check"></i> Confirm </span>
                                        </a>
                                    </li>
                                </ul>
                                <div id="bar" class="progress progress-striped" role="progressbar">
                                    <div class="progress-bar progress-bar-success"> </div>
                                </div>
                                <div class="tab-content">
                                    <div class="alert alert-danger display-none">
                                        <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-none">
                                        <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                    <div class="tab-pane active" id="tab1">
                                        <h3 class="block">Provide your account details</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Full Name
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" value="{{ old('fullname') }}" class="form-control" name="fullname" id="fullname" />
                                                <span class="help-block"> Provide your Full Name </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Username
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="username" id="username" />
                                                <span class="help-block"> Provide your username</span>
                                                <span class="help-block" id="dispasss"></span>
                                                <span class="help-block" id="awesomes"></span>

                                            </div>
                                        </div>





                                        <div class="form-group">
                                            <label class="control-label col-md-3">Password
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="password" class="form-control" name="password" id="password" />
                                                <span class="help-block"> Provide your password. </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Confirm Password
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" />
                                                <span class="help-block"> Confirm your password </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Email
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="email" id="email" />
                                                <span class="help-block"> Provide your email address </span>
                                                <span class="help-block" id="awesome"></span>

                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="control-label col-md-3">
                                            </label>
                                            <div class="col-md-4">
                                            <div id="formOneErrors"></div>

                                            </div>
                                        </div>
                                       
                                        <!-- add submit for this tab -->
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   
                                            <a href="javascript:;" id="continue_one" class="btn btn-outline btn-primary"> Save & Continue </a>
                                                    <a href="javascript:;" id="continue" class=" btn btn-outline btn-primary button-next margin-20" style="margin-top: 19px;"> Continue
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    
                                                </div>
                                            </div>
                                        </div><br><br>
                                        <!-- end add submit for this rab -->
                                        </form>
                                    </div>


                                    <div class="tab-pane" id="tab2">
                                        <h3 class="block">Provide your profile details</h3>
                                        <!--Press Kit -->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Profile Picture :
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                           <form class="form-horizontal" id="fileUploadForm" method="post" action="{{ url('addfmakertwo') }}" enctype="multipart/form-data">

                                                <div class="input-group">
                                                    <label class="input-group-btn">
                                            <span class="btn btn-primary">
                                                Browse&hellip; <input type="file" name="photo" id="photo" style="display: none;" >
                                            </span>
                                                    </label>
                                                    <input type="text" class="form-control" readonly>
                                                </div> 
                                            </div>
                                        </div>
                                        <!--End Press Kit -->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Phone Number
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="phone" />
                                                <span class="help-block"> Provide your phone number </span>
                                            </div>
                                        </div>
                                        <!--End Phone Number-->
                                        
                                        <!-- <div class="form-group">
                                            <label class="col-md-3 control-label">Birth Date:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                    <input type="date" class="form-control" name="birthdate">
                                            </div>
                                        </div> --><!--date picker ends -->
                                        
                                        
                                    <!--Birthdate-->
                                    <div class="form-group">
                                        <label class="control-label col-md-3">Birth Date:
                                                <span class="required"> * </span></label>
                                        <div class="col-md-4">
                                            <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                                                <input type="text" name="birthdate" class="form-control" readonly>
                                                <span class="input-group-btn">
                                                <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>
                                            <!-- /input-group -->
                                            <span class="help-block">
                                            Select date </span>
                                        </div>
                                    </div>
                                    <!--End Birthdate-->


                                        <div class="form-group">
                                            <label class="control-label col-md-3">Gender
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <div class="radio-list">
                                                    <label>
                                                        <input type="radio" name="gender" value="male" data-title="Male" /> Male </label>
                                                    <label>
                                                        <input type="radio" name="gender" value="female" data-title="Female" /> Female </label>
                                                </div>
                                                <div id="form_gender_error"> </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Address
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="address" />
                                                <span class="help-block"> Provide your street address </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">City/Town
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="city" />
                                                <span class="help-block"> Provide your city or town </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Country</label>
                                            <div class="col-md-4">
                                                <select name="country" id="country_list" class="form-control">
                                                    <option value=""></option>

                                                @foreach(countryArray() as $count)
                                                   <option value="{{ $count }}">{{ $count }}</option>
                                                 @endforeach

                                                </select>
                                            </div><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Where To Appear On Film Makers Map</label>
                                            <div class="col-md-4">
                                                <select name="country_in_map" id="country_map_list" class="form-control">
                                                    <option value=""></option>

                                                @foreach(countryArray() as $count)
                                                   <option value="{{ $count }}">{{ $count }}</option>
                                                 @endforeach

                                                </select>
                                            </div><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">
                                            </label>
                                            <div class="col-md-4">
                                            <div id="errors_two">
                                                <div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Please Submit Your Info Before Continue</div>
                                            </div>
                                            
                                            </div>
                                        </div>

                                                                           
                                            <!-- add submit for this tab -->
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9" id="buttons_two">
                                            <a href="javascript:;" class="btn default button-previous btn-inverse">
                                            <i class="fa fa-angle-left"></i> Back </a>

                                            <button type="submit" form="fileUploadForm" id="continue_two" class="btn btn-outline btn-primary">  Save & Continue </button>
                                            </form>
                                                  <a href="javascript:;" id="tab2_continue" class=" btn btn-outline btn-primary button-next margin-20" style="margin-top: 19px;"> Continue
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>

                                                    </div>
                                                </div>
                                                
                                            </div><br><br>
                                            <!-- end add submit for this rab -->

                                    </div>



                                    <div class="tab-pane" id="tab3">
                                       <form class="form-horizontal" id="thirdForm" method="post" action="{{ url('addfmakerthree') }}">

                                        <h3 class="block">Profession</h3>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Profession
                                            </label>

                                            <div class="col-md-4">
                                            <select name="profession[]"  id="multiple" class=" form-control select2-multiple"  multiple >
                                                    <optgroup label="I am a film" >
                                                @foreach(filmProfession() as $count)
                                                   <option value="{{ $count }}">{{ $count }}</option>
                                                 @endforeach


                                                    </optgroup>
                                                </select>
                                                <span class="help-block"> You may select more than profession</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Biography
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea type="text" placeholder="" rows="4"  class="form-control" name="biography" ></textarea>
                                                <span class="help-block">Provide your bio </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Filmography
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea type="text" placeholder="" rows="4"  class="form-control" name="filmography" ></textarea>
                                                <span class="help-block">Provide your filmography</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Awards and Achievements
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-4">
                                                <textarea type="text" placeholder="" rows="4"  class="form-control" name="awards" ></textarea>
                                                <span class="help-block">Provide your awards and achievements</span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Facebook Url
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="facebook_url" />
                                                <span class="help-block">Provide your Facebook account URL </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Twitter Url
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="" class="form-control" name="linkedin_url" />
                                                <span class="help-block">Provide your Twitter account URL </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Instgram Url
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="" class="form-control" name="instagram_url" />
                                                <span class="help-block">Provide your Instagram account URL </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Youtube Url
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="" class="form-control" name="youtube_url" />
                                                <span class="help-block">Provide your Youtube account URL </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Vimeo Url
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="" class="form-control" name="vimeo_url" />
                                                <span class="help-block">Provide your Vimeo account URL </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">IMDB Url
                                                <span class="required">   </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="" class="form-control" name="imdb_url" />
                                                <span class="help-block">Provide your IMDB account URL  </span>
                                            </div>
                                        </div>

                                            <div class="form-group">
                                            <label class="control-label col-md-3">
                                            </label>
                                            <div class="col-md-4">
                                            <div id="errors_three"></div>
                                                <div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Please Submit Your Info Before Continue</div>
                                          
                                            </div>
                                        </div>
                                    
                                            <!-- add submit for this tab -->
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                            <a href="javascript:;" class="btn default button-previous btn-inverse">
                                            <i class="fa fa-angle-left"></i> Back </a>
                                            <button type="submit" form="thirdForm" id="continue_three" class="btn btn-outline btn-primary">  Save & Continue </i></button>
                                            </form>
                                <a href="javascript:;" id="tab3_continue" class=" btn btn-outline btn-primary button-next margin-20" style="margin-top: 19px;"> Continue
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>

                                          </div>
                                                </div>
                                                
                                            </div><br><br>
                                            <!-- end add submit for this rab -->

                                    </div>



                                    <div class="tab-pane" id="tab4">
                                    
                                        <div class="row text-center">
                                            
                <h2 class="text-center" style="color: #FF755A;">Congratulations.</h2><br>
                <p class="lead text-center">Your Registration Has Been Successfully Processed.<br>
                                         please verify your account through the mail we sent you first to log in.
                </p>               
                <a href="{{ url('login') }}" class="btn btn-primary">Go To Login Page</a>
                <br>
                                            <p class="lead text-center">After verifying your account don't forget to create your films.
                                            </p>
                                            <a href="{{ url('myfilms') }}" class="btn btn-primary">Go To Film Page</a>
                                            <br><br>


                                        </div>

                                    </div>



                                </div>
                            </div>
                            <!-- buttons from here -->
                        </div>
                
                </div>
            </div>
        </div>
      </div><!--End Container-->
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
  //  <script src="{{ asset('site') }}/js/app/main.js"></script>
    <script >
        var url = "{{ url('addfmaker') }}";
        var url_mail = "{{ url('mail') }}";
        var url_username = "{{ url('username') }}";
        var url_two = "{{ url('addfmakertwo') }}";
    </script>
    <script src="{{ asset('site') }}/js/app/signup.js"></script>
<script>
        jQuery(document).ready(function() {       

           ComponentsPickers.init();
        });   
    </script>
<!-- END JAVASCRIPTS -->

</body>

<!-- Mirrored from rootcave.com/demos/lava/1.5/bootstrap3/multipage/signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 15 Sep 2016 15:23:24 GMT -->
</html