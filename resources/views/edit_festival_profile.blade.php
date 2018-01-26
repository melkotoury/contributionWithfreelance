<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>I am a film | Submit Your Short Movie</title>
    <meta name="keywords" content="short films, films, festivals, submit your films, i am a film, film makers, submit my film to festivals">
    <meta name="description" content="submit your short film , film festivals , directors , editors , short films">
    <meta name="viewport" content="width=device-width">

    <meta property="og:title" content="Iamafilm | Submit Your Film">
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
    <link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>

    <link href="{{ asset('site') }}/css/vendors/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site') }}/css/vendors/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site') }}/css/component.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/plugins.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/main.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/old_profile.css">

    <link rel="stylesheet" href="{{ asset('site') }}/css/edit_responstable.css">

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
                    @if(file_exists('images/festivals/square/'.$user->logo_url ))
                    <img alt="" src="{{ url('/') }}/images/festivals/square/{{$user->logo_url}}" class="img-responsive" alt="">
                    @else
                    <img alt="" src="http://placehold.it/150x150?text=no image">
                    @endif
                    <!-- end check file -->
               </div>

                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"> {{ $user->fullname }} </div>
                    <div class="profile-usertitle-job"> Festival </div>
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
                                    <a href="#tab_1_1" data-toggle="tab">Festival Info</a>
                                </li>
                                <li>
                                    <a href="#tab_1_4" data-toggle="tab">Festival Competetion</a>
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
                                        <form role="form" method="post" action="{{ url('festival/edit').'/'.$user->username }}">
                                        <div class="form-group">
                                            <label class="control-label">Festival Name</label>
                                            <input type="text" placeholder="John Deo" class="form-control" name="fullname" value="{{ $user->fullname }}" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">UserName</label>
                                            <input type="text" placeholder="soly2014" class="form-control" name="username" value="{{ $user->username }}" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">Email</label>
                                            <input type="text" placeholder="Example@Example.com" class="form-control" name="email" value="{{ $user->email }}" /> </div>
                                        <div class="form-group">
                                            <label class="control-label">Mobile Number</label>
                                            <input type="text" placeholder="+1 646 580 DEMO (6284)" class="form-control" name="phone" value="{{ $user->phone }}" /> </div>
                                      
                                        <div class="form-group">
                                            <label class="control-label">Edition</label>
                                                   <input type="nubmer" class="form-control" name="edition" value="{{ $user->edition }}" />
                                        </div>
                                      
                                        <div class="form-group">
                                            <label class="control-label">Festival Info</label>
                                            <textarea class="form-control" name="biography" rows="3" placeholder="Festival Information Here">{{ $user->biography }}</textarea>
                                        </div> 
                                        <div class="form-group">
                        <label class="control-label ">Film Type
                            <span class="required"> * </span>
                        </label>
                        <div class="">

                            <select   name="film_type[]"  class=" form-control select2-multiple" multiple>
                                <optgroup   >
                                    @foreach(filmCategory() as $cat)
                                        <option value="{{ $cat }}" {{ in_array($cat,json_decode($user->film_type)) ? 'selected' : '' }}>{{ $cat }}</option>
                                    @endforeach
                                </optgroup>

                            </select>


                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label ">Address
                            <span class="required"> * </span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" name="address" value="{{ $user->address }}"/>
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <label class="control-label ">City/Town
                            <span class="required"> * </span>
                        </label>
                        <div class="">
                            <input type="text" class="form-control" name="city" value="{{ $user->city }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label ">Country</label>
                        <div class="">
                            <select name="country" id="country_list" class="form-control">
                                <option value=""></option>

                                @foreach(countryArray() as $count)
                                    <option value="{{ $count }}" {{ $user->country == $count ? 'selected' : '' }}>{{ $count }}</option>
                                @endforeach

                            </select>
                        </div><br>
                    </div>
                                        <div class="form-group">
                                            <label class="control-label">Team</label>
                                            <textarea class="form-control" name="team" rows="3" placeholder="Add Your Filmography Here">{{ $user->team }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Awards and Regulations</label>
                                            <textarea class="form-control" name="awards" rows="3" placeholder="Add Your Awards Here">{{ $user->awards }}</textarea>
                                        </div>

                                            <div class="form-group">
                                                <label class="control-label">Festival Website Url</label>
                                                <input type="text" name="website_url" value="{{ $user->website_url }}" placeholder="http://www.website.com" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Facebook Url</label>
                                                <input type="text" name="facebook_url" value="{{ $user->facebook_url }}" placeholder="https://www.facebook.com" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Twitter Url</label>
                                                <input type="text" name="linkedin_url" value="{{ $user->linkedin_url }}"  placeholder="https://www.twitter.com" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Instagram Url</label>
                                                <input type="text" name="instagram_url" value="{{ $user->instagram_url }}"  placeholder="https://www.instagram.com" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Youtube Url</label>
                                                <input type="text" name="youtube_url" value="{{ $user->youtube_url }}"  placeholder="https://www.youtube.com" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">Vimeo Url</label>
                                                <input type="text" name="vimeo_url" value="{{ $user->vimeo_url }}"  placeholder="https://www.vimeo.com" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label">IMDB Url</label>
                                                <input type="text" name="imdb_url" value="{{ $user->imdb_url }}"  placeholder="https://www.imdb.com" class="form-control" />
                                            </div>

                                        <div class="margiv-top-10">
                                            <button type="Submit" class="btn btn-main">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- END PERSONAL INFO TAB -->
                                <!-- CHANGE AVATAR TAB -->
                                <div class="tab-pane" id="tab_1_2">
                                    <p> </p>
                                    <form action="{{ url('festival/updatephoto').'/'.$user->username }}" method="post" enctype="multipart/form-data" role="form">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                       <!-- check if file exists -->
                                                        @if(file_exists('images/festivals/'.$user->logo_url ))
                                                        <img alt="" src="{{ url('/') }}/images/festivals/{{$user->logo_url}}" alt="">
                                                        @else
                                                        <img alt="" src="http://placehold.it/150x150?text=no image">
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
                                            <button type="submit" class="btn btn-main"> Submit Changes</a>
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


                                <!-- CHANGE Competetion TAB -->
                                <div class="tab-pane" id="tab_1_4">

                                        <div class="row text-center">
                                            
                <h2 class="text-center" style="color: #3b8e5e;">Add Competetion.</h2><br>
                <a  data-toggle="modal" data-target="#competetionModal" class="btn btn-success">Add Competetion</a>
                <br><br>
        <div class="col-md-12">
            <table class="responstable" id="appendCompetetion">
                      <tr>  
                        <th  style="font-size: 12px; padding: 2px;" data-th="Driver details"><span>Competetion Name</span></th>
                        <th style="font-size: 12px; padding: 2px;">Student Film Only</th>
                        <th style="font-size: 12px; padding: 2px;">Film Category</th>
                        <th style="font-size: 12px; padding: 2px;">Themes</th>
                        <th style="font-size: 12px; padding: 2px;">Accepted Language</th>
                        <th style="font-size: 12px; padding: 2px;">Countries</th>
                        <th style="font-size: 12px; padding: 2px;">deadline</th>
                        <th style="font-size: 12px; padding: 2px;">Start Submission</th>
                        <th style="font-size: 12px; padding: 2px;">Fees</th>                        
                        <th style="font-size: 12px; padding: 2px;">Action</th>
                      </tr>
            @if(count($festival->competetions) > 0)                              
                      @foreach($festival->competetions as $comp)
                    <tr id="compRender{{ $comp->id }}">
                        <td>{{ $comp->comp_name }}</td>
                        <td>{{ $comp->student_only == 0 ? 'Yes' : 'No' }}</td>
                        <td>{{ implode(json_decode($comp->film_categories),', ') }}</td>
                        <td>{{ implode(json_decode($comp->film_themes),', ') }}</td>
                        <td>{{ implode(json_decode($comp->film_languages),', ') }}</td>
                        <td>{{ implode(json_decode($comp->countries),', ') }}</td>
                        <td>{{ date('d-m-Y', strtotime($comp->deadline)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($comp->submission_begins)) }} </td>
                        <td>{{ $comp->fees }} $</td>
                        <td>
                        <a href="{{ url('festival/edit_comp').'/'.$comp->id }}"  data-id="{{ $comp->id }}" class="edit_comp"><i class="fa fa-edit"></i></a>
                        <a data-id="{{ $comp->id }}" class="delete_comp"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      @endforeach                             
             @else                    
             <h4> No Competetion Found </h4>
             @endif
             </table>
                </div>
            </div>
          </div>
           <!-- END Competetion TAB -->


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
                      
                      </div>
                      <div class="form-group">
                       <input type="hidden" id="product_id_delete" name="product_id" value="0">

                          <button type="button" class="btn btn-warning" data-dismiss="modal"> Cancel <i class="fa fa-remove" aria-hidden="true"></i>
                           
                          </button> 


                         <button class="btn btn-danger" id="submit_delete_comp"> Delete <i class="fa fa-trash" aria-hidden="true"></i> </button>
                      </div>
                 </form>

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
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('adminstration') }}/assets/global/scripts/metronic.js" type="text/javascript"></script>

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/components-pickers.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
<script src="{{ asset('site') }}/js/app/main.js"></script>
<script >
    var url = "{{ url('festival/add') }}";
    var edit_comp = "{{ url('festival/edit_comp') }}";
    var dele_comp_url = '{{ url('/festival') }}';
</script>
<!-- <script src="{{ asset('site') }}/js/app/festival_signup.js"></script>
 -->    <script src="{{ asset('site') }}/js/app/festival_edit.js"></script>
<script>
        jQuery(document).ready(function() {       

           ComponentsPickers.init();
        });   
</script>

</body>

</html>








