@extends('admin.layouts.app')

@section('header.scripts')

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->
    <script type="text/javascript" src="{{ asset('site/js') }}/tooltipster-master/dist/css/tooltipster.bundle.min.css"></script>

    <script>
        $(document).ready(function() {
            $('.tooltip').tooltipster();
        });
    </script>

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
						<a href="{{ url('admin/waivers') }}">Waivers</a>
					</li>
				</ul>
			</div>
			<h3 class="page-title">
			Waivers <small>reports & statistics</small>
			</h3>
			<!-- END PAGE HEADER-->


			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Waivers Table
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">
									<div class="col-md-6">

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

									</div>
									<div class="col-md-6">
									</div>
								</div>
							</div>
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr><th> # </th>
								<th>
									 Festival ID
								</th>
                <th>
                   Waiver
                </th>
								<th>
									Waiver Value ($)
								</th>
                <th>
                   Copy
                </th>
								<th>
									 Status
								</th>
							</tr>
							</thead>
							<tbody class="append">
							<!-- start foreach -->
							@foreach($waivers as $order)
							<tr class="odd gradeX"><th></th>
								<td>
									<a target="_blanck" href="{{ url(userFromFestival($order->festival_id)->username) }}">				
									{{ str_limit(userFromFestival($order->festival_id)->fullname,50) }}
									</a>
								</td>
								<td>
								<span class="label foo{{$order->id}} label-{{$order->active == 0 ? 'success' : 'danger'}}">
                    {{ $order->waiver }}         
                </span>
								</td>
                                <td>{{$order->value_waiver}}</td>
                <td>
                   <button class="btn btn-info copy" data-clipboard-target=".foo{{$order->id}}" title="This is my span's tooltip message!"> copy
                </button> 

                </td>
								<td>
									
                  {{ $order->active == 0 ? 'active' : 'diactivated' }}

								</td>
								
							</tr>
							@endforeach
							<!-- end foreach -->
							
							</tbody>
							</table>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>






@endsection


@section('footer.scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="{{ asset('adminstration') }}/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('adminstration') }}/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ asset('adminstration') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="{{ asset('adminstration') }}/assets/global/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/table-managed.js"></script>

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/ui-confirmations.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.0/clipboard.min.js"></script>
    <script type="text/javascript" src="{{ asset('site/js') }}/tooltipster-master/dist/js/tooltipster.bundle.min.js"></script>

<script>
jQuery(document).ready(function() {

   new Clipboard('.copy');
   TableManaged.init();
   UIConfirmations.init(); // init page demo

});
</script>


@endsection

