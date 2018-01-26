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

			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->

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
						<th colspan="3">
							<div class="btn-group">
								
							</div>
						</th>
						<th class="pagination-control" colspan="3">
							<span class="pagination-info">
							1-30 of 789 </span>
							<a class="btn btn-sm blue">
							<i class="fa fa-angle-left"></i>
							</a>
							<a class="btn btn-sm blue">
							<i class="fa fa-angle-right"></i>
							</a>
						</th>
					</tr>
					</thead>
					<tbody>
					@if(count($messages) > 0)
					@foreach($messages as $message)
					
					<tr class="{{ $message->seen == 0 ? 'unread' : ''}}">
						<td class="inbox-small-cells">
						  <i class="fa fa-inbox"></i>
						</td>
						<td class="inbox-small-cells">
						</td>
                        
						<td class="view-message hidden-xs">
                         <a href="{{ url('admin/message').'/'.$message->id }}">
							 {{ $message->name }}</a>
						</td>
						
						<td class="view-message ">
							  {{ str_limit($message->message,60) }}
						</td>
						<td class="view-message text-right">
						{{  \Carbon\Carbon::createFromTimeStamp(strtotime($message->created_at))->diffForHumans() }}
						</td>
						<td class="view-message inbox-small-cells">
						</td>

					</tr>
					
					@endforeach
					</tbody>
					</table>
					<!-- end inbox table -->
					@else
					<h1>No Messages</h1>
					@endif

					</div>
				</div>
			</div>
</div></div>

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