@extends('partials.partialsapp')
@section('header.scripts')
    <link rel="stylesheet" href="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/css/jquery.fileupload.css">
    <link rel="stylesheet" href="{{ asset('site') }}/js/lib/vendors/jquery-file-upload/css/jquery.fileupload-ui.css">
    <link href="{{ asset('site') }}/js/lib/vendors/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

    <link href="{{ asset('site') }}/css/vendors/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('site') }}/css/vendors/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('site') }}/css/plugins.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/signup.css">

@stop


@section('content')


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
                                                <input type="text" class="form-control" name="fullname" id="fullname" />
                                                <span class="help-block"> Provide your Full Name </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Username
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control" name="username" id="username" />
                                                <span class="help-block"> Provide your username (profile_id) </span>
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
                                                <span class="help-block" id="dispass"></span>
                                                <span class="help-block" id="awesome"></span>

                                            </div>
                                        </div>
                                        
                                        <!-- add submit for this tab -->
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                   
                                            <a href="javascript:;" id="continue_one" class="btn btn-primary"> submit <i class="fa fa-plus"></i></a>
                                                    <a href="javascript:;" id="continue" class=" btn btn-outline btn-primary button-next margin-20"> Continue
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn green button-submit"> Submit
                                                        <i class="fa fa-check"></i>
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
                                        <!--Birthdate-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Birth Date:
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <div class="input-group input-medium date date-picker" data-date="new Date()" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                                    <input type="text" class="form-control" name="birthdate" readonly>
                                                    <span class="input-group-btn">
                                                                <button class="btn default" type="button">
                                                                    <i class="fa fa-calendar"></i>
                                                                </button>
                                                            </span>
                                                </div>
                                                <!-- /input-group -->
                                            </div>
                                        </div><!--date picker ends -->
                                        <!--End Birthdate-->
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Gender
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-4">
                                                <div class="radio-list">
                                                    <label>
                                                        <input type="radio" name="gender" value="0" data-title="Male" /> Male </label>
                                                    <label>
                                                        <input type="radio" name="gender" value="1" data-title="Female" /> Female </label>
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
                                                    <option value="AF">Afghanistan</option>
                                                    <option value="AL">Albania</option>
                                                    <option value="DZ">Algeria</option>
                                                    <option value="AS">American Samoa</option>
                                                    <option value="AD">Andorra</option>
                                                    <option value="AO">Angola</option>
                                                    <option value="AI">Anguilla</option>
                                                    <option value="AR">Argentina</option>
                                                    <option value="AM">Armenia</option>
                                                    <option value="AW">Aruba</option>
                                                    <option value="AU">Australia</option>
                                                    <option value="AT">Austria</option>
                                                    <option value="AZ">Azerbaijan</option>
                                                    <option value="BS">Bahamas</option>
                                                    <option value="BH">Bahrain</option>
                                                    <option value="BD">Bangladesh</option>
                                                    <option value="BB">Barbados</option>
                                                    <option value="BY">Belarus</option>
                                                    <option value="BE">Belgium</option>
                                                    <option value="BZ">Belize</option>
                                                    <option value="BJ">Benin</option>
                                                    <option value="BM">Bermuda</option>
                                                    <option value="BT">Bhutan</option>
                                                    <option value="BO">Bolivia</option>
                                                    <option value="BA">Bosnia and Herzegowina</option>
                                                    <option value="BW">Botswana</option>
                                                    <option value="BV">Bouvet Island</option>
                                                    <option value="BR">Brazil</option>
                                                    <option value="IO">British Indian Ocean Territory</option>
                                                    <option value="BN">Brunei Darussalam</option>
                                                    <option value="BG">Bulgaria</option>
                                                    <option value="BF">Burkina Faso</option>
                                                    <option value="BI">Burundi</option>
                                                    <option value="KH">Cambodia</option>
                                                    <option value="CM">Cameroon</option>
                                                    <option value="CA">Canada</option>
                                                    <option value="CV">Cape Verde</option>
                                                    <option value="KY">Cayman Islands</option>
                                                    <option value="CF">Central African Republic</option>
                                                    <option value="TD">Chad</option>
                                                    <option value="CL">Chile</option>
                                                    <option value="CN">China</option>
                                                    <option value="CX">Christmas Island</option>
                                                    <option value="CC">Cocos (Keeling) Islands</option>
                                                    <option value="CO">Colombia</option>
                                                    <option value="KM">Comoros</option>
                                                    <option value="CG">Congo</option>
                                                    <option value="CD">Congo, the Democratic Republic of the</option>
                                                    <option value="CK">Cook Islands</option>
                                                    <option value="CR">Costa Rica</option>
                                                    <option value="CI">Cote d'Ivoire</option>
                                                    <option value="HR">Croatia (Hrvatska)</option>
                                                    <option value="CU">Cuba</option>
                                                    <option value="CY">Cyprus</option>
                                                    <option value="CZ">Czech Republic</option>
                                                    <option value="DK">Denmark</option>
                                                    <option value="DJ">Djibouti</option>
                                                    <option value="DM">Dominica</option>
                                                    <option value="DO">Dominican Republic</option>
                                                    <option value="EC">Ecuador</option>
                                                    <option value="EG">Egypt</option>
                                                    <option value="SV">El Salvador</option>
                                                    <option value="GQ">Equatorial Guinea</option>
                                                    <option value="ER">Eritrea</option>
                                                    <option value="EE">Estonia</option>
                                                    <option value="ET">Ethiopia</option>
                                                    <option value="FK">Falkland Islands (Malvinas)</option>
                                                    <option value="FO">Faroe Islands</option>
                                                    <option value="FJ">Fiji</option>
                                                    <option value="FI">Finland</option>
                                                    <option value="FR">France</option>
                                                    <option value="GF">French Guiana</option>
                                                    <option value="PF">French Polynesia</option>
                                                    <option value="TF">French Southern Territories</option>
                                                    <option value="GA">Gabon</option>
                                                    <option value="GM">Gambia</option>
                                                    <option value="GE">Georgia</option>
                                                    <option value="DE">Germany</option>
                                                    <option value="GH">Ghana</option>
                                                    <option value="GI">Gibraltar</option>
                                                    <option value="GR">Greece</option>
                                                    <option value="GL">Greenland</option>
                                                    <option value="GD">Grenada</option>
                                                    <option value="GP">Guadeloupe</option>
                                                    <option value="GU">Guam</option>
                                                    <option value="GT">Guatemala</option>
                                                    <option value="GN">Guinea</option>
                                                    <option value="GW">Guinea-Bissau</option>
                                                    <option value="GY">Guyana</option>
                                                    <option value="HT">Haiti</option>
                                                    <option value="HM">Heard and Mc Donald Islands</option>
                                                    <option value="VA">Holy See (Vatican City State)</option>
                                                    <option value="HN">Honduras</option>
                                                    <option value="HK">Hong Kong</option>
                                                    <option value="HU">Hungary</option>
                                                    <option value="IS">Iceland</option>
                                                    <option value="IN">India</option>
                                                    <option value="ID">Indonesia</option>
                                                    <option value="IR">Iran (Islamic Republic of)</option>
                                                    <option value="IQ">Iraq</option>
                                                    <option value="IE">Ireland</option>
                                                    <option value="IL">Israel</option>
                                                    <option value="IT">Italy</option>
                                                    <option value="JM">Jamaica</option>
                                                    <option value="JP">Japan</option>
                                                    <option value="JO">Jordan</option>
                                                    <option value="KZ">Kazakhstan</option>
                                                    <option value="KE">Kenya</option>
                                                    <option value="KI">Kiribati</option>
                                                    <option value="KP">Korea, Democratic People's Republic of</option>
                                                    <option value="KR">Korea, Republic of</option>
                                                    <option value="KW">Kuwait</option>
                                                    <option value="KG">Kyrgyzstan</option>
                                                    <option value="LA">Lao People's Democratic Republic</option>
                                                    <option value="LV">Latvia</option>
                                                    <option value="LB">Lebanon</option>
                                                    <option value="LS">Lesotho</option>
                                                    <option value="LR">Liberia</option>
                                                    <option value="LY">Libyan Arab Jamahiriya</option>
                                                    <option value="LI">Liechtenstein</option>
                                                    <option value="LT">Lithuania</option>
                                                    <option value="LU">Luxembourg</option>
                                                    <option value="MO">Macau</option>
                                                    <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                                    <option value="MG">Madagascar</option>
                                                    <option value="MW">Malawi</option>
                                                    <option value="MY">Malaysia</option>
                                                    <option value="MV">Maldives</option>
                                                    <option value="ML">Mali</option>
                                                    <option value="MT">Malta</option>
                                                    <option value="MH">Marshall Islands</option>
                                                    <option value="MQ">Martinique</option>
                                                    <option value="MR">Mauritania</option>
                                                    <option value="MU">Mauritius</option>
                                                    <option value="YT">Mayotte</option>
                                                    <option value="MX">Mexico</option>
                                                    <option value="FM">Micronesia, Federated States of</option>
                                                    <option value="MD">Moldova, Republic of</option>
                                                    <option value="MC">Monaco</option>
                                                    <option value="MN">Mongolia</option>
                                                    <option value="MS">Montserrat</option>
                                                    <option value="MA">Morocco</option>
                                                    <option value="MZ">Mozambique</option>
                                                    <option value="MM">Myanmar</option>
                                                    <option value="NA">Namibia</option>
                                                    <option value="NR">Nauru</option>
                                                    <option value="NP">Nepal</option>
                                                    <option value="NL">Netherlands</option>
                                                    <option value="AN">Netherlands Antilles</option>
                                                    <option value="NC">New Caledonia</option>
                                                    <option value="NZ">New Zealand</option>
                                                    <option value="NI">Nicaragua</option>
                                                    <option value="NE">Niger</option>
                                                    <option value="NG">Nigeria</option>
                                                    <option value="NU">Niue</option>
                                                    <option value="NF">Norfolk Island</option>
                                                    <option value="MP">Northern Mariana Islands</option>
                                                    <option value="NO">Norway</option>
                                                    <option value="OM">Oman</option>
                                                    <option value="PK">Pakistan</option>
                                                    <option value="PW">Palau</option>
                                                    <option value="PA">Panama</option>
                                                    <option value="PG">Papua New Guinea</option>
                                                    <option value="PY">Paraguay</option>
                                                    <option value="PE">Peru</option>
                                                    <option value="PH">Philippines</option>
                                                    <option value="PN">Pitcairn</option>
                                                    <option value="PL">Poland</option>
                                                    <option value="PT">Portugal</option>
                                                    <option value="PR">Puerto Rico</option>
                                                    <option value="QA">Qatar</option>
                                                    <option value="RE">Reunion</option>
                                                    <option value="RO">Romania</option>
                                                    <option value="RU">Russian Federation</option>
                                                    <option value="RW">Rwanda</option>
                                                    <option value="KN">Saint Kitts and Nevis</option>
                                                    <option value="LC">Saint LUCIA</option>
                                                    <option value="VC">Saint Vincent and the Grenadines</option>
                                                    <option value="WS">Samoa</option>
                                                    <option value="SM">San Marino</option>
                                                    <option value="ST">Sao Tome and Principe</option>
                                                    <option value="SA">Saudi Arabia</option>
                                                    <option value="SN">Senegal</option>
                                                    <option value="SC">Seychelles</option>
                                                    <option value="SL">Sierra Leone</option>
                                                    <option value="SG">Singapore</option>
                                                    <option value="SK">Slovakia (Slovak Republic)</option>
                                                    <option value="SI">Slovenia</option>
                                                    <option value="SB">Solomon Islands</option>
                                                    <option value="SO">Somalia</option>
                                                    <option value="ZA">South Africa</option>
                                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
                                                    <option value="ES">Spain</option>
                                                    <option value="LK">Sri Lanka</option>
                                                    <option value="SH">St. Helena</option>
                                                    <option value="PM">St. Pierre and Miquelon</option>
                                                    <option value="SD">Sudan</option>
                                                    <option value="SR">Suriname</option>
                                                    <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                                    <option value="SZ">Swaziland</option>
                                                    <option value="SE">Sweden</option>
                                                    <option value="CH">Switzerland</option>
                                                    <option value="SY">Syrian Arab Republic</option>
                                                    <option value="TW">Taiwan, Province of China</option>
                                                    <option value="TJ">Tajikistan</option>
                                                    <option value="TZ">Tanzania, United Republic of</option>
                                                    <option value="TH">Thailand</option>
                                                    <option value="TG">Togo</option>
                                                    <option value="TK">Tokelau</option>
                                                    <option value="TO">Tonga</option>
                                                    <option value="TT">Trinidad and Tobago</option>
                                                    <option value="TN">Tunisia</option>
                                                    <option value="TR">Turkey</option>
                                                    <option value="TM">Turkmenistan</option>
                                                    <option value="TC">Turks and Caicos Islands</option>
                                                    <option value="TV">Tuvalu</option>
                                                    <option value="UG">Uganda</option>
                                                    <option value="UA">Ukraine</option>
                                                    <option value="AE">United Arab Emirates</option>
                                                    <option value="GB">United Kingdom</option>
                                                    <option value="US">United States</option>
                                                    <option value="UM">United States Minor Outlying Islands</option>
                                                    <option value="UY">Uruguay</option>
                                                    <option value="UZ">Uzbekistan</option>
                                                    <option value="VU">Vanuatu</option>
                                                    <option value="VE">Venezuela</option>
                                                    <option value="VN">Viet Nam</option>
                                                    <option value="VG">Virgin Islands (British)</option>
                                                    <option value="VI">Virgin Islands (U.S.)</option>
                                                    <option value="WF">Wallis and Futuna Islands</option>
                                                    <option value="EH">Western Sahara</option>
                                                    <option value="YE">Yemen</option>
                                                    <option value="ZM">Zambia</option>
                                                    <option value="ZW">Zimbabwe</option>
                                                </select>
                                            </div><br>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">
                                            </label>
                                            <div class="col-md-4">
                                            <div id="errors_two"></div>

                                            </div>
                                        </div>

                                                                           
                                            <!-- add submit for this tab -->
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">

                                            <button type="submit" form="fileUploadForm" id="continue_two" class="btn btn-primary"> submit <i class="fa fa-plus"></i></button>
                                            </form>
                                                    <a href="javascript:;" id="continue2" class=" btn btn-outline btn-primary button-next margin-20"> Continue
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn green button-submit"> Submit
                                                        <i class="fa fa-check"></i>
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
                                                <span class="required"> * </span>
                                            </label>

                                            <div class="col-md-4">
                                            <select name="profession"  id="multiple" class=" form-control select2-multiple"  multiple >
                                                    <optgroup label="I am a film" >
                                                        <option value="director">Director</option>
                                                        <option value="producer">Producer</option>
                                                        <option value="writer">Writer</option>
                                                        <option value="cinematographer">Cinematographer</option>
                                                        <option value="editor">Editor</option>
                                                        <option value="actor">Actor/Actress</option>
                                                        <option value="sound_designer_mixer">Sound Designer/Mixer</option>
                                                        <option value="music_composer">Music Composer</option>
                                                        <option value="art_director">Art Director</option>
                                                        <option value="production_company">Production Company </option>
                                                        <option value="distribution-sales-company">Distribution/Sales Company</option>
                                                        <option value="festival_director">Festival Director</option>
                                                        <option value="festival_programmer">Festival Programmer</option>
                                                        <option value="animator">Animator</option>
                                                    </optgroup>
                                                </select>
                                                <span class="help-block"> You may select more than one Profession</span>
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
                                            <label class="control-label col-md-3">Linkedin Url
                                                <span class="required">  </span>
                                            </label>
                                            <div class="col-md-4">
                                                <input type="text" placeholder="" class="form-control" name="linkedin_url" />
                                                <span class="help-block">Provide your Linkedin account URL </span>
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

                                            </div>
                                        </div>
                                    
                                            <!-- add submit for this tab -->
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">

                                            <button type="submit" form="thirdForm" id="continue_three" class="btn btn-primary"> submit <i class="fa fa-plus"></i></button>
                                            </form>
                                                    <a href="javascript:;" id="continue3" class=" btn btn-outline btn-primary button-next margin-20"> Continue
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn green button-submit"> Submit
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                    </div>
                                                </div>
                                                
                                            </div><br><br>
                                            <!-- end add submit for this rab -->

                                    </div>



                                    <div class="tab-pane" id="tab4">
                                        <h3 class="block">Confirm your account</h3>
                                        <h4 class="form-section">Account</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Username:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="username">{{ Auth::check() ? $user->username: '' }} </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Email:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="email">{{ Auth::check() ? $user->email : ''}}  </p>
                                            </div>
                                        </div>
                                        <h4 class="form-section">Profile</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Fullname:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="fullname">{{ Auth::check() ? $user->fullname : '' }}  </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Gender:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="gender">{{ Auth::check() ? $film_maker->gender : '' }}  </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Phone:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="phone">{{ Auth::check() ? $film_maker->phone : ''}} </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Address:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="address"> {{ Auth::check() ? $film_maker->address : '' }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">City/Town:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="city">{{ Auth::check() ? $film_maker->city : '' }} </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Country:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="country">{{ Auth::check() ? $film_maker->country : '' }} </p>
                                            </div>
                                        </div>


                                        <h4 class="form-section">Profession</h4>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">I am a film:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="profession">{{ Auth::check() ? $film_maker->Profession : '' }} </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Facebook:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="facebook_url">{{ Auth::check() ? $film_maker->facebook_url : '' }} </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Linkedin:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="linkedin_url">{{ Auth::check() ? $film_maker->linkedin_url : '' }} </p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">IMDB:</label>
                                            <div class="col-md-4">
                                                <p class="form-control-static" data-display="imdb_url">{{ Auth::check() ? $film_maker->imdb_url : '' }} </p>
                                            </div>
                                        </div>
                                        
                                            <!-- add submit for this tab -->
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-offset-3 col-md-9">
                                                        <a href="javascript:;" class="btn default button-previous btn-inverse">
                                                            <i class="fa fa-angle-left"></i> Back </a>
                                                        <a href="javascript:;" class="btn btn-outline btn-primary button-next margin-20"> Continue
                                                            <i class="fa fa-angle-right"></i>
                                                        </a>
                                                        <a href="javascript:;" class="btn green button-submit"> Submit
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end add submit for this rab -->

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
        
 @stop


@section('footer.scripts')
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
<script src="{{ asset('site') }}/js/lib/vendors/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/jquery.form.js"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('site') }}/js/lib/vendors/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->

<script src="{{ asset('site') }}/js/lib/vendors/scripts/form-wizard.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/file_upload.js"></script>

<!-- END PAGE LEVEL SCRIPTS -->
    <script >
        var url = "{{ url('addfmaker') }}";
        var url_mail = "{{ url('mail') }}";
        var url_username = "{{ url('username') }}";
        var url_two = "{{ url('addfmakertwo') }}";
    </script>
    <script src="{{ asset('site') }}/js/app/signup.js"></script>

@stop
