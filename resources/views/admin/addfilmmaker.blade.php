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
						<a href="{{ url('admin/filmmakers') }}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ url('admin/addfilmmaker') }}">Add Film Maker</a>
					</li>
				</ul>
			</div>
			<h3 class="page-title">
			Film Makers <small>reports & statistics</small>
			</h3>
			<!-- END PAGE HEADER-->


	<div class="tab-content">
		<div class="tab-pane active" id="tab_0">

			<!-- start div form -->
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Add New Film Maker
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
					<form action="{{ url('admin/addfilmmaker') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-body">


							<div class="form-group">
								<label class="col-md-3 control-label"> Film Maker Name</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" value="{{ old('fullname') }}" name="fullname" class="form-control input-circle" placeholder="Enter Name">
								     </div>		
								</div>
							</div>
							


							<div class="form-group">
								<label class="col-md-3 control-label"> Username</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" value="{{ old('username') }}"  name="username" class="form-control input-circle" placeholder="Enter Username">
								     </div>		
								</div>
							</div>
							

							<div class="form-group">
								<label class="col-md-3 control-label"> Film Maker Email</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="email" value="{{ old('email') }}"  name="email" class="form-control input-circle" placeholder="Enter Email">
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
								<label class="col-md-3 control-label">Birthdate</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input value="{{ old('birthdate') }}" class="form-control form-control-inline input-medium date-picker" size="16" type="text" name="birthdate" />
								     </div>		
								</div>
							</div>

																		

							<div class="form-group">
								<label class="col-md-3 control-label">Biography</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<textarea class="form-control" placeholder="Add Biography" name="biography"> {{ old('biography') }}</textarea>
								     </div>		
								</div>
							</div>
							
																		

							<div class="form-group">
								<label class="col-md-3 control-label">Filmography</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<textarea class="form-control" placeholder="Add Filmography" name="filmography">{{ old('filmography') }}</textarea>
								     </div>		
								</div>
							</div>
							
																		

							<div class="form-group">
								<label class="col-md-3 control-label">Awards and Achievements</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<textarea class="form-control" placeholder="Awards and Achievements" name="awards">{{ old('awards') }}</textarea>
								     </div>		
								</div>
							</div>
							

							<div class="form-group">
								<label class="col-md-3 control-label">Address</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<textarea class="form-control" placeholder="Address" name="address">{{ old('address') }}</textarea>
								     </div>		
								</div>
							</div>
							

							<div class="form-group">
								<label class="col-md-3 control-label">Phone</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input value="{{ old('phone') }}" class="form-control" type="text" name="phone" placeholder="0020-1013754233" />
								     </div>		
								</div>
							</div>

							
							
							
							<div class="form-group">
								<label class="col-md-3 control-label">Gender</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge" style="margin-top: 10px;">				
											<div class="icheck-list">
												<label>
												<input type="radio" name="gender" checked class="icheck" value="male"> Male </label>
												<label>
												<input type="radio" name="gender" class="icheck" value="female"> Female </label>
												<label>
											</div>
								     </div>		
								</div>
							</div>



							
							<div class="form-group">
								<label class="col-md-3 control-label">Country</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">
										<select name="country" class="form-control">
											<option disabled selected name="country">Country</option>
											@foreach(countryArray() as $count)
											<option value="{{ $count }}">{{ $count }}</option>
											@endforeach

										</select>

									</div>
								</div>
							</div>


		
						



							
							<div class="form-group">
								<label class="col-md-3 control-label">where to appear on film makers map</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">
										<select name="country_in_map" class="form-control">
											<option disabled selected name="country">Country</option>
											@foreach(countryArray() as $count)
											<option value="{{ $count }}">{{ $count }}</option>
											@endforeach

										</select>

									</div>
								</div>
							</div>


		
						


							<div class="form-group">
								<label class="col-md-3 control-label">City/Town</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" value="{{ old('city') }}" name="city" class="form-control input-circle" placeholder="Enter City/Town">
								     </div>		
								</div>
							</div>
							

							
							
							<div class="form-group">
								<label class="col-md-3 control-label">Profession</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">
										<select name="profession[]" class="js-example-tags form-control input-circle" multiple="multiple">
		                                    @foreach(filmProfession() as $cat)
                                        	<option value="{{ $cat }}">{{ $cat }}</option>
                                   			@endforeach
										</select>

									</div>
								</div>
							</div>


														

							<!-- add image -->
							<div class="form-group">
								<label class="col-md-3 control-label">Film Maker Photo</label>
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
										<input type="file" name="photo">
										</span>
										<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
										Remove </a>
									</div>
								</div>
									</div>
								</div>
							</div>
							<!-- end add image -->

													


							<div class="form-group">
								<label class="col-md-3 control-label">Facebook Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" value="{{ old('facebook_url') }}" name="facebook_url" class="form-control input-circle" placeholder="Enter Facebook Url">
								     </div>		
								</div>
							</div>
							

													


							<div class="form-group">
								<label class="col-md-3 control-label">Twitter Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" value="{{ old('linkedin_url') }}" name="linkedin_url" class="form-control input-circle" placeholder="Enter Twitter Url">
								     </div>		
								</div>
							</div>
							

													


							<div class="form-group">
								<label class="col-md-3 control-label">Instgram Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" value="{{ old('instagram_url') }}" name="instagram_url" class="form-control input-circle" placeholder="Enter Instgram Url">
								     </div>		
								</div>
							</div>
							

													


							<div class="form-group">
								<label class="col-md-3 control-label">Youtube Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" value="{{ old('youtube_url') }}" name="youtube_url" class="form-control input-circle" placeholder="Enter Youtube Url">
								     </div>		
								</div>
							</div>
							

													


							<div class="form-group">
								<label class="col-md-3 control-label">Vimeo Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" value="{{ old('vimeo_url') }}" name="vimeo_url" class="form-control input-circle" placeholder="Enter Vimeo Url">
								     </div>		
								</div>
							</div>
							
													


							<div class="form-group">
								<label class="col-md-3 control-label">IMDB Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" value="{{ old('imdb_url') }}" name="imdb_url" class="form-control input-circle" placeholder="Enter IMDB Url">
								     </div>		
								</div>
							</div>
							


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

