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


			<div class="row inbox">
				<div class="col-md-2">
					<ul class="inbox-nav margin-bottom-10">
						<li class="compose-btn">
							<a href="{{ url('admin/compose')}}" data-title="Compose" class="btn green">
							<i class="fa fa-edit"></i> Compose </a>
						</li>
						<li class="inbox active">
							<a href="javascript:;" class="btn" data-title="Inbox">
							Inbox(3) </a>
							<b></b>
						</li>
				
					</ul>
				</div>
				<div class="col-md-10">
					<div class="inbox-header">
						<h1 class="pull-left">Inbox</h1>
					</div>
				<div class="inbox-content">
					<!-- start inbox table -->
					<table class="table table-striped table-advance table-hover">
					<thead>
					<tr>
						<h3><span class="bold">Name : </span> :{{ $message->name }}</h3>
					</tr>
					<tr>
						<h3><span class="bold">Subject : </span> :{{ $message->subject }}</h3>
					</tr>
					<tr>
						<h3><span class="bold">Email : </span> :{{ $message->email }}</h3>
					</tr>
					</thead>
					<br><br>
					<tbody>
					<tr>
						<p class="lead">{{ $message->message }}</p>
					</tr>
					</tbody>
					</table>
					<!-- end inbox table -->

					</div>
				</div>
			</div>


@endsection

@section('footer.scripts')

<!-- <script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/inbox.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {       
 
   Inbox.init();
});
</script> -->
<!-- END JAVASCRIPTS -->
@endsection