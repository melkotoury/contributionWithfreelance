@extends('admin.layouts.app')
@section('header.scripts')
<link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/icheck/skins/all.css"/>

@stop

@section('content')

			<!-- BEGIN PAGE HEADER-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{ url('admin/festivals') }}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ url('admin/addfestival') }}">Add Festival</a>
					</li>
				</ul>
			</div>
			<h3 class="page-title">
			Festival <small>reports & statistics</small>
			</h3>
			<!-- END PAGE HEADER-->


						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">

								<!-- start div form -->
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Add New Festival
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">

					                   @if (count($errors) > 0)
					                        <div class="note note-danger">
					                            <ul>
					                                @foreach ($errors->all() as $error)
					                                    <li>{{ $error }}</li>
					                                @endforeach
					                            </ul>
					                        </div>
					                    @endif

				                       @if (Session::has('updated'))
				                                    <div class="note note-success">            
				                                      <h4>Updated Successfully</h4>
				                                    </div>
				                         @endif
				                       @if (Session::has('deleted'))
				                                    <div class="note note-success">            
				                                      <h4>Deleted Successfully</h4>
				                                    </div>
				                         @endif
				                       @if (Session::has('added'))
				                                    <div class="note note-success">            
				                                      <h4>Added Successfully</h4>
				                                    </div>
				                         @endif

										<!-- BEGIN FORM-->
										<form action="{{ url('admin/addfestival') }}" method="post" class="form-horizontal">
											{!! csrf_field() !!}
											<div class="form-body">


												<div class="form-group">
													<label class="col-md-3 control-label">Festival Name</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">													
														<input type="text" name="name" class="form-control input-circle" placeholder="Enter text">
													     </div>		
													</div>
												</div>
												

												<div class="form-group">
													<label class="col-md-3 control-label">Festival Email</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">													
														<input type="email" name="email" class="form-control input-circle" placeholder="Enter Email">
													     </div>		
													</div>
												</div>
												

												<div class="form-group">
													<label class="col-md-3 control-label"> Password</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">													
														<input type="password" name="password" class="form-control input-circle" placeholder="Enter password">
													     </div>		
													</div>
												</div>
												

												<div class="form-group">
													<label class="col-md-3 control-label"> Password Confirmation</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">													
														<input type="password" name="password_confirmation" class="form-control input-circle" placeholder="Enter password again">
													     </div>		
													</div>
												</div>
												

												<div class="form-group">
													<label class="col-md-3 control-label">From</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">													
														<input class="form-control form-control-inline input-medium date-picker" size="16" type="text" name="from" value=""/>
													     </div>		
													</div>
												</div>

																							
												
												<div class="form-group">
													<label class="col-md-3 control-label">TO</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">													
														<input class="form-control form-control-inline input-medium date-picker" size="16" type="text" name="to" value=""/>
													     </div>		
													</div>
												</div>

																																														
												
												<div class="form-group">
													<label class="col-md-3 control-label">Deadline For Applications</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">													
														<input class="form-control form-control-inline input-medium date-picker" size="16" type="text" name="deadline" value=""/>
													     </div>		
													</div>
												</div>

																							

												<div class="form-group">
													<label class="col-md-3 control-label">Festival Bio</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">													
														<textarea class="form-control" placeholder="Add Description to this festival" name="lol"></textarea>
													     </div>		
													</div>
												</div>
												
												
												<div class="form-group">
													<label class="col-md-3 control-label">Accepted Categories</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">
															<select name="accepted_categories" class="js-example-tags form-control input-circle" multiple="multiple">
																<option value="Fiction" choosed>Fiction</option>
																<option value="Documentary">Documentary</option>
																<option value="Animation">Animation</option>
																<option value="Experimental">Experimental</option>
															</select>

														</div>
													</div>
												</div>


												
												<div class="form-group">
													<label class="col-md-3 control-label">Country</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">
															<select name="country" class="form-control">
																<option disabled selected>Country</option>
								                                    <option value="AF">Afghanistan</option>
								                                    <option value="AX">Åland Islands</option>
								                                    <option value="AL">Albania</option>
								                                    <option value="DZ">Algeria</option>
								                                    <option value="AS">American Samoa</option>
								                                    <option value="AD">Andorra</option>
								                                    <option value="AO">Angola</option>
								                                    <option value="AI">Anguilla</option>
								                                    <option value="AQ">Antarctica</option>
								                                    <option value="AG">Antigua and Barbuda</option>
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
								                                    <option value="BO">Bolivia, Plurinational State of</option>
								                                    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
								                                    <option value="BA">Bosnia and Herzegovina</option>
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
								                                    <option value="CI">Côte d'Ivoire</option>
								                                    <option value="HR">Croatia</option>
								                                    <option value="CU">Cuba</option>
								                                    <option value="CW">Curaçao</option>
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
								                                    <option value="GG">Guernsey</option>
								                                    <option value="GN">Guinea</option>
								                                    <option value="GW">Guinea-Bissau</option>
								                                    <option value="GY">Guyana</option>
								                                    <option value="HT">Haiti</option>
								                                    <option value="HM">Heard Island and McDonald Islands</option>
								                                    <option value="VA">Holy See (Vatican City State)</option>
								                                    <option value="HN">Honduras</option>
								                                    <option value="HK">Hong Kong</option>
								                                    <option value="HU">Hungary</option>
								                                    <option value="IS">Iceland</option>
								                                    <option value="IN">India</option>
								                                    <option value="ID">Indonesia</option>
								                                    <option value="IR">Iran, Islamic Republic of</option>
								                                    <option value="IQ">Iraq</option>
								                                    <option value="IE">Ireland</option>
								                                    <option value="IM">Isle of Man</option>
								                                    <!--<option value="IL">Israel</option>-->
								                                    <option value="IT">Italy</option>
								                                    <option value="JM">Jamaica</option>
								                                    <option value="JP">Japan</option>
								                                    <option value="JE">Jersey</option>
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
								                                    <option value="LY">Libya</option>
								                                    <option value="LI">Liechtenstein</option>
								                                    <option value="LT">Lithuania</option>
								                                    <option value="LU">Luxembourg</option>
								                                    <option value="MO">Macao</option>
								                                    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
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
								                                    <option value="ME">Montenegro</option>
								                                    <option value="MS">Montserrat</option>
								                                    <option value="MA">Morocco</option>
								                                    <option value="MZ">Mozambique</option>
								                                    <option value="MM">Myanmar</option>
								                                    <option value="NA">Namibia</option>
								                                    <option value="NR">Nauru</option>
								                                    <option value="NP">Nepal</option>
								                                    <option value="NL">Netherlands</option>
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
								                                    <option value="PS">Palestinian Territory, Occupied</option>
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
								                                    <option value="RE">Réunion</option>
								                                    <option value="RO">Romania</option>
								                                    <option value="RU">Russian Federation</option>
								                                    <option value="RW">Rwanda</option>
								                                    <option value="BL">Saint Barthélemy</option>
								                                    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
								                                    <option value="KN">Saint Kitts and Nevis</option>
								                                    <option value="LC">Saint Lucia</option>
								                                    <option value="MF">Saint Martin (French part)</option>
								                                    <option value="PM">Saint Pierre and Miquelon</option>
								                                    <option value="VC">Saint Vincent and the Grenadines</option>
								                                    <option value="WS">Samoa</option>
								                                    <option value="SM">San Marino</option>
								                                    <option value="ST">Sao Tome and Principe</option>
								                                    <option value="SA">Saudi Arabia</option>
								                                    <option value="SN">Senegal</option>
								                                    <option value="RS">Serbia</option>
								                                    <option value="SC">Seychelles</option>
								                                    <option value="SL">Sierra Leone</option>
								                                    <option value="SG">Singapore</option>
								                                    <option value="SX">Sint Maarten (Dutch part)</option>
								                                    <option value="SK">Slovakia</option>
								                                    <option value="SI">Slovenia</option>
								                                    <option value="SB">Solomon Islands</option>
								                                    <option value="SO">Somalia</option>
								                                    <option value="ZA">South Africa</option>
								                                    <option value="GS">South Georgia and the South Sandwich Islands</option>
								                                    <option value="SS">South Sudan</option>
								                                    <option value="ES">Spain</option>
								                                    <option value="LK">Sri Lanka</option>
								                                    <option value="SD">Sudan</option>
								                                    <option value="SR">Suriname</option>
								                                    <option value="SJ">Svalbard and Jan Mayen</option>
								                                    <option value="SZ">Swaziland</option>
								                                    <option value="SE">Sweden</option>
								                                    <option value="CH">Switzerland</option>
								                                    <option value="SY">Syrian Arab Republic</option>
								                                    <option value="TW">Taiwan, Province of China</option>
								                                    <option value="TJ">Tajikistan</option>
								                                    <option value="TZ">Tanzania, United Republic of</option>
								                                    <option value="TH">Thailand</option>
								                                    <option value="TL">Timor-Leste</option>
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
								                                    <option value="VE">Venezuela, Bolivarian Republic of</option>
								                                    <option value="VN">Viet Nam</option>
								                                    <option value="VG">Virgin Islands, British</option>
								                                    <option value="VI">Virgin Islands, U.S.</option>
								                                    <option value="WF">Wallis and Futuna</option>
								                                    <option value="EH">Western Sahara</option>
								                                    <option value="YE">Yemen</option>
								                                    <option value="ZM">Zambia</option>
								                                    <option value="ZW">Zimbabwe</option>


															</select>

														</div>
													</div>
												</div>


												<div class="form-group">
													<label class="col-md-3 control-label">Max Film Duration</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">													
														<input type="number" name="max_film_duration" class="form-control input-circle" placeholder="Enter numbers only">
													     </div>		
													</div>
												</div>
												

												<div class="form-group">
													<label class="col-md-3 control-label">Fees</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge">													
														<input type="number" name="fees" class="form-control input-circle" placeholder="Enter Festival Fees in $$$">
													     </div>		
													</div>
												</div>

												
												<div class="form-group">
													<label class="col-md-3 control-label">Status</label>
													<div class="col-md-4">
														<div class="input-group input-xlarge" style="margin-top: 10px;">				
														<input type="checkbox" name="confirmed" value="0" class="icheck" data-checkbox="icheckbox_minimal-grey">Confirmed
													     </div>		
													</div>
												</div>
												
												<!-- add image -->
												<div class="form-group">
													<label class="col-md-3 control-label">Festival Logo</label>
													<div class="col-md-4">
														<div class="input-group">
													<div class="fileinput fileinput-new" data-provides="fileinput">
														<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
															<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
														</div>
														<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
														</div>
														<div>
															<span class="btn default btn-file">
															<span class="fileinput-new">
															Select image </span>
															<span class="fileinput-exists">
															Change </span>
															<input type="file" name="...">
															</span>
															<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
															Remove </a>
														</div>
													</div>
														</div>
													</div>
												</div>
												<!-- end add image -->


											</div>
											<div class="form-actions">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<button type="submit" class="btn btn-circle blue">Submit</button>
														<button type="reset" class="btn btn-circle default">Cancel</button>
													</div>
												</div>
											</div>

										</form>
										<!-- END FORM-->
									</div>
								</div>
								<!-- end div form -->

							</div>
							
						</div>


@stop

@section('footer.scripts')
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/components-form-tools.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/components-pickers.js"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/icheck/icheck.min.js"></script>

<script type="text/javascript">
  $('select').select2();
  $(".js-example-tags").select2({
  tags: true
})

</script>

<script>
jQuery(document).ready(function() {    
   ComponentsPickers.init();

});
</script>


@stop

