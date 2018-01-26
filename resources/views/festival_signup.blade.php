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
<section id="signup" class="signup-margin">
    <div class="container">
        <div class="row">
            <div class="portlet light bordered" id="form_wizard_1">
                <div class="portlet-title">

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
                                                                    <i class="fa fa-check"></i> Info Setup </span>
                                        </a>
                                    </li>
                                    <!--.nav > li > a -->
                                    <li>
                                        <a href="#tab4" data-toggle="tab" class="step">
                                            <span class="number"> 4 </span>
                                            <span class="desc">
                                                                    <i class="fa fa-check"></i> Add Competition </span>
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
                                            <label class="control-label col-md-3">Festival Name
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="fullname" id="fullname" />
                                                <span class="help-block"> Provide Festival Name </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Profile ID
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="username" id="username" placeholder="e.g: festivalname"/>
                                                <span class="help-block"> Provide your Profile ID</span>
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

                                                    <a href="javascript:;" id="continue_one" class="btn btn-outline btn-primary"> Save and Continue </a>
                                                    <a href="javascript:;" id="continue" class=" btn btn-outline btn-primary button-next margin-20" style="margin-top: 19px;"> Continue
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    {{--<a href="javascript:;" class="btn green button-submit"> Hamada--}}
                                                    {{--<i class="fa fa-check"></i>--}}
                                                    {{--</a>--}}
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
                        <label class="col-md-3 control-label">Festival Picture :
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-4">
                            <form class="form-horizontal" id="fileUploadForm" method="post" action="{{ url('festival/addtwo') }}" enctype="multipart/form-data">

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
                        <label class="control-label col-md-3">Festival Edition Number
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-4">
                            <input type="number" class="form-control" name="edition" />
                            <span class="help-block"> Provide your Festival Edition </span>
                        </div>
                    </div>
                    <!--End Phone Number-->
                    <!--Birthdate-->

                    <!--End Birthdate-->
                    <div class="form-group">
                        <label class="control-label col-md-3">Film Type
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-4">

                            <select name="categories_name[]"  class=" form-control select2-multiple" multiple>
                                <optgroup label="Select Film Type" >
                                    @foreach(filmCategory() as $cat)
                                        <option value="{{ $cat }}">{{ $cat }}</option>
                                    @endforeach
                                </optgroup>

                            </select>


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
                        <label class="control-label col-md-3">Phone
                            <span class="required"> * </span>
                        </label>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="phone" />
                            <span class="help-block"> Provide your Phone </span>
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
                        <label class="control-label col-md-3">
                        </label>
                        <div class="col-md-4">
                            <div id="errors_two"></div>
                            <div class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Please Submit Your Info Before Continue</div>

                        </div>
                    </div>


                    <!-- add submit for this tab -->
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9" id="buttons_two">
                                    <a href="javascript:;" class="btn default button-previous btn-inverse">
                                        <i class="fa fa-angle-left"></i> Back </a>

                                <button type="submit" form="fileUploadForm" id="continue_two" class="btn btn-outline btn-primary"> Save and Continue </button>
                                </form>
                                <a href="javascript:;" id="tabTwoFestival" class=" btn btn-outline btn-primary button-next margin-20" style="margin-top: 19px;"> Continue
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>

                    </div><br><br>
                    <!-- end add submit for this rab -->

                </div>



                <div class="tab-pane" id="tab3">
                    <form class="form-horizontal" id="thirdForm" method="post" action="{{ url('festival/addthree') }}">



                        <div class="form-group">
                            <label class="control-label col-md-3">Festival Info
                                <span class="required">  </span>
                            </label>
                            <div class="col-md-4">
                                <textarea type="text" placeholder="" rows="4"  class="form-control" name="biography" ></textarea>
                                <span class="help-block">Provide your Festival Info </span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Awards & Regulations
                                <span class="required">  </span>
                            </label>
                            <div class="col-md-4">
                                <textarea type="text" placeholder="" rows="4"  class="form-control" name="awards" ></textarea>
                                <span class="help-block">Provide your Awards & Regulations  </span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Festival Team
                                <span class="required">  </span>
                            </label>
                            <div class="col-md-4">
                                <textarea type="text" placeholder="" rows="4"  class="form-control" name="team" ></textarea>
                                <span class="help-block">Provide your Festival Team  </span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3">Festival Website Url
                                <span class="required">  </span>
                            </label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="website_url" />
                                <span class="help-block">Provide Festival Website URL </span>
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
                                    <button type="submit" form="thirdForm" id="continue_three" class="btn btn-outline btn-primary"> Save and Continue </button>
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

            <h2 class="text-center" style="color: #3b8e5e;">Add Competetion.</h2><br>
            <p class="lead text-center">Your Registeration Has Been Successfully Processed. Please Confirm Your Email Address<br>
                Please add your competition and regulations to receive films submission.
            </p>
            <a  data-toggle="modal" data-target="#competetionModal" class="btn btn-success">Add Competetion</a>
            <a href="{{ url('login') }}" class="btn btn-success"> Login</a>
<!--             <a href="javascript:;" class="btn default button-previous btn-inverse">
                <i class="fa fa-angle-left"></i> Back </a>
 -->

            <br><br>
            <div class="col-md-12">
                <table class="responstable" id="appendCompetetion">

                    <tr>
                        <th data-th="Driver details"><span>Competetion Name</span></th>
                        <th>Student Film Only</th>
                        <th>Film Category</th>
                        <th>Themes</th>
                        <th>Accepted Language</th>
                        <th>Countries</th>
                        <th>deadline</th>
                        <th>Start Submission</th>
                        <th>Fees</th>
                        <th>Action</th>
                    </tr>
                    @if(Session::has('festival_signup'))
                    <?php $festival = \App\Festival::find(Session::get('festival_signup')); ?>
                    @if(count($festival->competetions) > 0)
                    @foreach($festival->competetions as $comp)
                     <tr id="compRender{{ $comp->id }}">
                        <td>{{ $comp->comp_name }}</td>
                        <td>{{ $comp->student_only == 0 ? 'Yes' : 'No' }}</td>
                        <td>{{ implode(json_decode($comp->film_categories),', ') }}</td>
                        <td>{{ implode(json_decode($comp->film_themes),', ') }}</td>
                        <td>{{ implode(json_decode($comp->film_languages),', ') }}</td>
                        <td>{{ implode(json_decode($comp->countries),', ') }}</td>
                        <td>{{ date("d-m-Y", strtotime($comp->deadline)) }}</td>
                        <td>{{ date("d-m-Y", strtotime($comp->submission_begins)) }}</td>
                        <td>{{ $comp->fees }} $</td>
                        <td>
                        <a href="{{ url('festival/edit_comp').'/'.$comp->id }}"  data-id="{{ $comp->id }}" class="edit_comp"><i class="fa fa-edit"></i></a>
                        <a data-id="{{ $comp->id }}" class="delete_comp"><i class="fa fa-trash"></i></a>
                     </tr>
                     @endforeach
                     @endif
                    @endif


                </table>
            </div>


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



<!-- add competetion Modal modal -->
<div class="modal fade" id="competetionModal" tabindex="-1" role="dialog" aria-labelledby="adddirLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="adddirLabel">Add Competetion</h4>
            </div>
            <div class="modal-body">
                <form id="compForm" action="{{ url('festival/addcompetetion') }}" method="post">


                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Competetion Name:</label>
                        <input type="text" name="comp_name" class="form-control" id="adddirinput" placeholder="Competition Name" required>
                    </div>



                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Student Film Only:</label>
                        <input type="radio" name="student_only" value="0">Yes
                        <input type="radio" name="student_only" value="1" checked> No
                    </div>



                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Film Category:</label>
                        <select name="film_categories[]" class="form-control select2-multiple" required multiple>
                                <option value="all">All Categories</option>
                            @foreach(filmCategory() as $cats)
                                <option value="{{ $cats }}">{{ $cats }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Accepted Regions:</label>
                        <select name="accepted_regions[]" class="form-control select2-multiple" required multiple>
                                <option value="all">All Regions</option>  
                            @foreach(acceptedRegions() as $cats)
                                <option value="{{ $cats }}">{{ $cats }}</option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Themes Accepted :</label>
                        <select name="film_themes[]" class="form-control select2-multiple" required multiple>
                                <option value="all">All Themes</option> 
                            @foreach(filmThemes() as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>
                    


                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Genres Accepted :</label>
                        <select name="film_genres[]" class="form-control select2-multiple" required multiple>
                                <option value="all">All Genres</option>  
                            @foreach(filmGenres() as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>



                    
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Countries:</label>
                        <select name="countries[]" class="form-control select2-multiple" required multiple>
                            <option value="all">All Countries</option> 
                            @foreach(countryTable() as $key => $value)
                            <option value="{{ $key }}">{{ $key }}</option>
                            @endforeach
                        </select>
                    </div>





                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Language :</label>
                        <select name="film_languages[]" class="form-control select2-multiple" required multiple>
                            @foreach(filmLangArray() as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>





                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Language of Subtitles :</label>
                        <select class="form-control select2-multiple" name="film_lang_subtitle[]" required multiple>
                            @foreach( filmLangArray() as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Fees:</label>
                        <input type="number" name="fees" class="form-control" placeholder="Add Fees In Dollars">

                    </div>


                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">         
                        <label for="recipient-name" class="control-label">Submission Begins:</label>

                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                        <input type="text" name="submission_begins" class="form-control" readonly>
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>


                        </div>
                        <div class="col-md-6">  
                        <label for="recipient-name" class="control-label">Deadline:</label>
                 
                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                        <input type="text" name="deadline" class="form-control" readonly>
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>

                       </div>
                    </div>
                    </div>



                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Production Date:</label>


                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                        <input type="text" name="production_date" class="form-control" readonly>
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>


                    </div>




                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Max Film Duration:</label>
                        <input type="number" name="max_duration" class="form-control">
                    </div>




                    <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">         
                        <label for="recipient-name" class="control-label">Competetion Will Run From:</label>


                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                        <input type="text" name="comp_from" class="form-control" readonly>
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>

                        </div>
                        <div class="col-md-6">  
                        <label for="recipient-name" class="control-label">To:</label>


                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" >
                        <input type="text" name="comp_to" class="form-control" readonly>
                        <span class="input-group-btn">
                        <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>


                      </div>
                    </div>
                    </div>





                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Requirements:</label>
                        <textarea class="form-control" name="requirements" placeholder="add competetion requirements"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="recipient-name" class="control-label"></label>
                        <div id="ErrorComp"></div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">  <i class="fa fa-close"></i> Close</button>
                <button type="submit" form="compForm" id="adddirsubmit" class="btn orange-default btn-outline sbold">  <i class="fa fa-plus-circle"></i> Add Competetion</button>
            </div>
        </div>
    </div>
</div>
<!-- end add competetion Modal modal -->




<!-- edit competetion Modal modal -->


<!-- end edit competetion Modal modal -->



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
                <h5>Are you sure you want to delete ??</h5>


            </div>
            </form>
            <div class="modal-footer">

                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <input type="hidden" id="product_id_delete" name="product_id" value="0">

                        <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel <i class="fa fa-remove" aria-hidden="true"></i>

                        </button>


                        <button class="btn btn-danger" id="submit_delete_comp"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </button>
                    </div>


            </div>


            <!-- end modal body -->
        </div>



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
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('adminstration') }}/assets/global/scripts/metronic.js" type="text/javascript"></script>

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/components-pickers.js"></script>

<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

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