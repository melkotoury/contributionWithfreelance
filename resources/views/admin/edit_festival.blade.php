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
											<i class="fa fa-gift"></i>Edit Festival
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
				                       @if (Session::has('email'))
				                                    <div class="note note-danger">            
				                                      <h4>this email has already been token</h4>
				                                    </div>
				                         @endif

				                       @if (Session::has('username'))
				                                    <div class="note note-danger">            
				                                      <h4>this username has already been token</h4>
				                                    </div>
				                         @endif
				                         

					<!-- BEGIN FORM-->
					<form action="{{ url('admin/editfestival').'/'.$festival->id }}" method="post" class="form-horizontal" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-body">


							<div class="form-group">
								<label class="col-md-3 control-label">Festival Name</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" name="name" value="{{ $festival->fullname }}" class="form-control input-circle" placeholder="Enter Festival Name">
								     </div>		
								</div>
							</div>
							


							<div class="form-group">
								<label class="col-md-3 control-label">Festival Profile ID</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" name="username" value="{{ $festival->username }}"  class="form-control input-circle" placeholder="Enter Festival Profile ID">
								     </div>		
								</div>
							</div>
							

							<div class="form-group">
								<label class="col-md-3 control-label">Festival Email</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="email" name="email" value="{{ $festival->email }}"  class="form-control input-circle" placeholder="Enter Email">
								     </div>		
								</div>
							</div>
							


							


							<div class="form-group">
								<label class="col-md-3 control-label">Address</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" name="address" value="{{ $festival->address }}"  class="form-control input-circle" placeholder="Enter Address">
								     </div>		
								</div>
							</div>
							

							
						


							<div class="form-group">
								<label class="col-md-3 control-label">City/Town</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" name="city" value="{{ $festival->city }}"  class="form-control input-circle" placeholder="Enter City/Town">
								     </div>		
								</div>
							</div>
							




							<div class="form-group">
								<label class="col-md-3 control-label">Phone</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="number" name="phone" value="{{ $festival->phone }}"  class="form-control input-circle" placeholder="Enter Phone">
								     </div>		
								</div>
							</div>

											

							<div class="form-group">
								<label class="col-md-3 control-label">Festival Edition</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="number" name="edition" value="{{ $festival->edition }}"  class="form-control input-circle" placeholder="Enter Festival Edition">
								     </div>		
								</div>
							</div>

				
							<div class="form-group">
								<label class="col-md-3 control-label">Festival Info</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<textarea class="form-control" placeholder="Add Description to this festival" name="biography"> {{ $festival->biography }} </textarea>
								     </div>		
								</div>
							</div>
							
							
				
							<div class="form-group">
								<label class="col-md-3 control-label">Awards & Regulations</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<textarea class="form-control" placeholder="Add Awards & Regulations to this festival" name="awards">{{ $festival->awards }}</textarea>
								     </div>		
								</div>
							</div>
							
							
				
							<div class="form-group">
								<label class="col-md-3 control-label">Festival Team</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<textarea class="form-control" placeholder="Add Team to this festival" name="team">{{ $festival->team }}</textarea>
								     </div>		
								</div>
							</div>
							
							
							<div class="form-group">
								<label class="col-md-3 control-label">Accepted Categories</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">
										<select name="categories_name[]" class="js-example-tags form-control input-circle" multiple="multiple">
		                                    @foreach(filmCategory() as $cat)
                                        	<option value="{{ $cat }}" {{ in_array($cat,json_decode($festival->film_type)) ? 'selected' : '' }}>{{ $cat }}</option>
                                   			@endforeach
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
											@foreach(countryArray() as $count)
											<option value="{{ $count }}" {{ $festival->country == $count ? 'selected' : '' }} >{{ $count }}</option>
											@endforeach

										</select>

									</div>
								</div>
							</div>

						


							<div class="form-group">
								<label class="col-md-3 control-label">Festival Website Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" name="website_url" value="{{ $festival->website_url }}"  class="form-control input-circle" placeholder="Enter Website Url">
								     </div>		
								</div>
							</div>
							

													


							<div class="form-group">
								<label class="col-md-3 control-label">Facebook Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" name="facebook_url" value="{{ $festival->facebook_url }}"  class="form-control input-circle" placeholder="Enter Facebook Url">
								     </div>		
								</div>
							</div>
							

													


							<div class="form-group">
								<label class="col-md-3 control-label">Twitter Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" name="linkedin_url" value="{{ $festival->linkedin_url }}"  class="form-control input-circle" placeholder="Enter twitter Url">
								     </div>		
								</div>
							</div>
							

													


							<div class="form-group">
								<label class="col-md-3 control-label">Instgram Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" name="instagram_url" value="{{ $festival->instagram_url }}" class="form-control input-circle" placeholder="Enter Instgram Url">
								     </div>		
								</div>
							</div>
							

													


							<div class="form-group">
								<label class="col-md-3 control-label">Youtube Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" name="youtube_url" value="{{ $festival->youtube_url }}"  class="form-control input-circle" placeholder="Enter Youtube Url">
								     </div>		
								</div>
							</div>
							

													


							<div class="form-group">
								<label class="col-md-3 control-label">Vimeo Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" name="vimeo_url" value="{{ $festival->vimeo_url }}"  class="form-control input-circle" placeholder="Enter Vimeo Url">
								     </div>		
								</div>
							</div>
							
													


							<div class="form-group">
								<label class="col-md-3 control-label">IMDB Url</label>
								<div class="col-md-4">
									<div class="input-group input-xlarge">													
									<input type="text" name="imdb_url" value="{{ $festival->imdb_url }}"  class="form-control input-circle" placeholder="Enter IMDB Url">
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
									    @if(file_exists('images/festivals/'.$festival->logo_url))
										<img src="{{ url('images/festivals').'/'.$festival->logo_url }}" width="200" height="150" alt=""/>
										@else
										<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
										@endif

									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
									</div>
									<div>
										<span class="btn default btn-file">
										<span class="fileinput-new">
										Select image </span>
										<span class="fileinput-exists">
										Change </span>
										<input type="file" name="logo">
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









				<!-- start div form -->
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Edit Festival
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">


					<!-- BEGIN FORM-->
					<form action="{{ url('admin/editfestival_password').'/'.$festival->id }}" method="post" class="form-horizontal" enctype="multipart/form-data">
						{!! csrf_field() !!}
						<div class="form-body">



							

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

