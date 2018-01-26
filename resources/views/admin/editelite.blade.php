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
						<a href="{{ url('admin/addelite') }}">Add Elite</a>
					</li>
				</ul>
			</div>
			<h3 class="page-title">
			Elite <small>reports & statistics</small>
			</h3>
			<!-- END PAGE HEADER-->


						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">

								<!-- start div form -->
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Edit Elite
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
				                       @if (Session::has('elite'))
				                                    <div class="note note-warning">            
				                                      <h4>this member has already been added to Elite</h4>
				                                    </div>
				                         @endif

				                       @if (Session::has('username'))
				                                    <div class="note note-danger">            
				                                      <h4>this username is not exist for any film maker</h4>
				                                    </div>
				                         @endif


	<!-- BEGIN FORM-->
	<form action="{{ url('admin/editelite').'/'.$el->id }}" method="post" class="form-horizontal">
		{!! csrf_field() !!}
		<div class="form-body">



			<div class="form-group">
				<label class="col-md-3 control-label">Username</label>
				<div class="col-md-4">
					<div class="input-group">													
					<input type="text" name="username" value="{{ $el->username }}" class="form-control input-circle-left" placeholder="Enter User Name">
						<span class="input-group-addon input-circle-right">
						<i class="fa fa-user"></i>
						</span>
				     </div>		
				</div>
			</div>
			
			<div class="form-group">
			<label class="col-md-3 control-label">Adding Private Film Fees </label>
				<div class="col-md-4">
					<div class="input-group">
						<input type="number" value="{{ $el->film_fees }}" name="film_fees" class="form-control input-circle-left" placeholder="Film Fees">
						<span class="input-group-addon input-circle-right">
						<i class="fa fa-money"></i>
						</span>

					</div>
				</div>
			</div>

			
		</div>
		<div class="form-actions">
			<div class="row">
				<div class="col-md-offset-3 col-md-9">
					<button type="submit" class="btn btn-circle blue">Edit</button>
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