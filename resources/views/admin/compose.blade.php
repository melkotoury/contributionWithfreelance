@extends('admin.layouts.app')
@section('header.scripts')
<link href="{{ asset('adminstration') }}/assets/admin/pages/css/inbox.css" rel="stylesheet" type="text/css"/>

@endsection
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
						<a href="{{ url('admin/inbox') }}">Inbox</a>
					</li>
				</ul>
			</div>
			<h3 class="page-title">
			Inbox <small>reports & statistics</small>
			</h3>
			<!-- END PAGE HEADER-->

		 @if (count($errors) > 0)
                <div class="note note-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

           @if (Session::has('added'))
                        <div class="note note-success">            
                          <h4>Sent Successfully</h4>
                        </div>
             @endif

			
			<!-- start Compose -->
			<form class="inbox-compose form-horizontal" id="fileupload" action="{{ url('admin/compose') }}" method="POST">
				<div class="inbox-compose-btn">
					<button type="submit" class="btn blue"><i class="fa fa-check"></i>Send</button>
				</div>
				<div class="inbox-form-group">
					<label class="control-label">To:</label>
					<div class="controls">
						<input type="text" class="form-control" name="to">
						
					</div>
				</div>
				<div class="inbox-form-group">
					<label class="control-label">Subject:</label>
					<div class="controls">
						<input type="text" class="form-control" name="subject">
					</div>
				</div>
				<div class="inbox-form-group">
					<textarea class="inbox-editor inbox-wysihtml5 form-control" name="message" rows="12"></textarea>
				</div>
				
				<div class="inbox-compose-btn">
					<button type="submit" class="btn blue"><i class="fa fa-check"></i>Send</button>
				</div>

			</form>
			<!-- end compose -->


@endsection

@section('footer.scripts')

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/inbox.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {       
 
   Inbox.init();
});
</script> 
<!-- END JAVASCRIPTS -->
@endsection