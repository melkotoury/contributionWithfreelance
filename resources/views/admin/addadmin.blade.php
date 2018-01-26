@extends('admin.layouts.app')
@section('content')

			<!-- BEGIN PAGE HEADER-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{ url('admin/home') }}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="{{ url('admin/adduser') }}">Add Admin</a>
					</li>
				</ul>
			</div>
			<h3 class="page-title">
			Admin <small>reports & statistics</small>
			</h3>
			<!-- END PAGE HEADER-->


						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">

								<!-- start div form -->
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Add New Admin
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
				                                    <div class="note note-success">            
				                                      <h4>this email has already been token</h4>
				                                    </div>
				                         @endif

				                       @if (Session::has('username'))
				                                    <div class="note note-success">            
				                                      <h4>this username has already been token</h4>
				                                    </div>
				                         @endif


										<!-- BEGIN FORM-->
										<form action="{{ url('admin/adduser') }}" method="post" class="form-horizontal">
											{!! csrf_field() !!}
											<div class="form-body">


												<div class="form-group">
													<label class="col-md-3 control-label">Name</label>
													<div class="col-md-4">
														<div class="input-group">													
														<input type="text" name="name" class="form-control input-circle-left" placeholder="Enter text">
															<span class="input-group-addon input-circle-right">
															<i class="fa fa-user"></i>
															</span>
													     </div>		
													</div>
												</div>



												<div class="form-group">
													<label class="col-md-3 control-label">Username</label>
													<div class="col-md-4">
														<div class="input-group">													
														<input type="text" name="username" class="form-control input-circle-left" placeholder="Enter User Name">
															<span class="input-group-addon input-circle-right">
															<i class="fa fa-user"></i>
															</span>
													     </div>		
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label">Email Address</label>
													<div class="col-md-4">
														<div class="input-group">
															<input type="email" name="email" class="form-control input-circle-left" placeholder="Email Address">
															<span class="input-group-addon input-circle-right">
															<i class="fa fa-envelope"></i>
															</span>

														</div>
													</div>
												</div>
											
												<div class="form-group">
													<label class="col-md-3 control-label">Password</label>
													<div class="col-md-4">
														<div class="input-group">
															<input type="password" name="password" class="form-control input-circle-left" placeholder="Password">
															<span class="input-group-addon input-circle-right">
															<i class="fa fa-key"></i>
															</span>
														</div>
													</div>
												</div>
																						
												<div class="form-group">
													<label class="col-md-3 control-label">Password Confirmation</label>
													<div class="col-md-4">
														<div class="input-group">
															<input type="password" name="password_confirmation" class="form-control input-circle-left" placeholder="Password Confirmation">
															<span class="input-group-addon input-circle-right">
															<i class="fa fa-key"></i>
															</span>
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


@endsection

@section('footer.scripts')

<script>
jQuery(document).ready(function() {    

   FormSamples.init();
});
</script>


@endsectoin