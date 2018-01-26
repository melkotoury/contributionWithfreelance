@extends('admin.layouts.app')
@section('header.scripts')

<link href="{{ url('adminstration') }}/assets/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>

@endsection
@section('content')


<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Invoice <small>invoice sample</small>
			</h3>


			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="invoice">
				<div class="row invoice-logo">
					<div class="col-xs-6 invoice-logo-space">
						<img src="{{ url('site') }}/img/logo.png" class="img-responsive" alt=""/>
					</div>
					<div class="col-xs-6">
						<p>
							 #{{$order->charge_id}} / {{ $order->created_at->toFormattedDateString() }} <span class="muted">
							 </span>
						</p>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-xs-4">
						<h3>Film Maker :</h3>
						<ul class="list-unstyled">
							<li>
								 {{userFromFilm($order->film_id)->fullname}}
							</li>
						</ul>
					</div>
					<div class="col-xs-4">
						<h3>Festival :</h3>
						<ul class="list-unstyled">
							<li>
								 {{ userFromFestival($order->festival_id)->fullname }}
							</li>
						</ul>
					</div>
					<div class="col-xs-4 invoice-payment">
						<h3>Payment Details:</h3>
						<ul class="list-unstyled">
							<li>
								<strong>{{ $order->amount }}</strong> 
							</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<div class="well">
							<address>
							<strong>IAMAFILM, Inc.</strong><br/>
							Freezone, Dubai<br/>
							<br/>
							<abbr title="Phone">P:</abbr> (234) 145-1810 </address>
							<address>
							<strong>Full Name</strong><br/>
							<a href="mailto:#">
							info@iamafilm.com </a>
							</address>
						</div>
					</div>
					<div class="col-xs-8 invoice-block">
						<ul class="list-unstyled amounts">
							<li>
								<strong>Sub - Total amount:</strong> ${{ $order->amount }}
							</li>
							<li>
								<strong>Discount:</strong> 0
							</li>
							<li>
								<strong>VAT:</strong> -----
							</li>
							<li>
								<strong>Grand Total:</strong> ${{ $order->amount }}
							</li>
						</ul>
						<br/>
						<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
						Print <i class="fa fa-print"></i>
						</a>
						<a class="btn btn-lg green hidden-print margin-bottom-5">
						Submit Your Invoice <i class="fa fa-check"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->


@endsection