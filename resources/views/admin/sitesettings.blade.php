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
						<a href="{{ url('admin/sitesettings') }}">Site Settings</a>
					</li>
				</ul>
			</div>
			<h3 class="page-title">
			Site Settings <small>reports & statistics</small>
			</h3>
			<!-- END PAGE HEADER-->


						<div class="tab-content">
							<div class="tab-pane active" id="tab_0">

								<!-- start div form -->
								<div class="portlet box green">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Edit Site Settings
										</div>
										<div class="tools">
											<a href="javascript:;" class="collapse">
											</a>
										</div>
									</div>
									<div class="portlet-body form">

								    @if (Session::has('updated'))
		                            <div class="note note-success">            
		                              <h4>Updated Successfully</h4>
		                            </div>
						            @endif

										<!-- BEGIN FORM-->
		<form action="{{ url('admin/sitesetting') }}" class="form-horizontal" method="post">
			<div class="form-body">
	
										
		<div class="form-group">
			<label class="col-md-3 control-label">Website Fees For Private Films</label>
			<div class="col-md-4">
				<input value="{{ $site->film_fees ?: 0 }}" type="number" name="film_fees" class="form-control input-circle" placeholder="Enter Website Fees">
			</div>
		</div>
										
		<div class="form-group">
			<label class="col-md-3 control-label">Secret Key Number</label>
			<div class="col-md-4">
			<input value="{{ $site->secret_key ?: 0 }}" type="text" name="secret_key" class="form-control input-circle" placeholder="Enter Credit Card Number">
			</div>
		</div>
										
															
		<div class="form-group">
			<label class="col-md-3 control-label">Open Key Number</label>
			<div class="col-md-4">
			<input value="{{ $site->open_key ?: 0 }}" type="text" name="open_key" class="form-control input-circle" placeholder="Enter Credit Card Number">
			</div>
		</div>
										
															
			<div class="form-group">
				<label class="col-md-3 control-label">Currency</label>
				<div class="col-md-4">
						<select name="currency" class="form-control">
							@foreach(currency() as $count)
							<option value="{{ $count }}" {{ $site->currency == $count ? 'selected' : '' }}>{{ $count }}</option>
							@endforeach

						</select>
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
						</form>.
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