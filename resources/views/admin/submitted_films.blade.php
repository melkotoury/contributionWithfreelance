@extends('admin.layouts.app')

@section('header.scripts')

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="{{ asset('adminstration') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL STYLES -->


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
						<a href="{{ url('admin/films') }}">Submitted Films</a>
					</li>
				</ul>
			</div>
			<h3 class="page-title">
			Submitted Films <small>reports & statistics</small>
			</h3>
			<!-- END PAGE HEADER-->


			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box grey-cascade">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i>Submitted Films Table
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							</div>
						</div>
						<div class="portlet-body">
							<div class="table-toolbar">
								<div class="row">

								</div>
							</div>
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr><th> # </th>
								<th>
									 Film Name
								</th>
								<th>
									 Film Id
								</th>
								<th>
									  User Name
								</th>
								<th>
									Festival Name
								</th>
								<th>
									  Festival Country
								</th>
								<th>
									  Submitted at
								</th>
							</tr>
							</thead>
							<tbody>

							@foreach($submitted_films as $film)

							<tr class="odd gradeX" id="product{{$film->id}}"><th></th>
								<td>
									 {{ $film->english_title }}
								</td>
								<td>
									{{ $film->film_url }}
								</td>
								<td>

										{{-- {{ $film->fullname }} --}}
											{{\App\User::getFilmmaker($film->film_id)->fullname}}

								</td>
								<td>

										{{-- {{ $film->fullname }} --}}
										{{\App\User::getFestival($film->festival_id)->fullname}}
								</td>
								<td>

									{{$film->country}}


								</td>

								<td>
									{{  \Carbon\Carbon::createFromTimeStamp(strtotime($film->created_at)) }}
								</td>

							</tr>
							@endforeach

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
<!-- END PAGE LEVEL PLUGINS -->

<script src="{{ asset('adminstration') }}/assets/admin/pages/scripts/table-managed.js"></script>
"></script>
<script>
jQuery(document).ready(function() {

   TableManaged.init();
});
</script>


@endsection
