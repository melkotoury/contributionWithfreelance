@extends('admin.layouts.app')
@section('header.scripts')
<!-- BEGIN THEME STYLES -->
<!-- END THEME STYLES -->
@endsection
@section('content')

			<!-- BEGIN PAGE HEADER-->
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Dashboard</a>
					</li>
				</ul>
			</div>
			<h3 class="page-title">
			Dashboard <small>reports & statistics</small>
			</h3>
			<!-- END PAGE HEADER-->


			<!-- BEGIN DASHBOARD STATS -->
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat blue-madison">
						<div class="visual">
							<i class="fa fa-comments"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{ $count_filmmakers }}
							</div>
							<div class="desc">
								 Film Makers
							</div>
						</div>
						<a class="more" href="{{ url('admin/filmmakers') }}">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat red-intense">
						<div class="visual">
							<i class="fa fa-bar-chart-o"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{ \App\FilmSubmit::sum('amount') +  \App\Transaction::sum('amount')  }}$
							</div>
							<div class="desc">
								 Total Sales
							</div>
						</div>
						<a class="more" href="{{ url('admin/transactions') }}">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat green-haze">
						<div class="visual">
							<i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{ $count_festivals }}
							</div>
							<div class="desc">
								 Festivals
							</div>
						</div>
						<a class="more" href="{{ url('admin/festivals') }}">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat yellow">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{ $count_films }}
							</div>
							<div class="desc">
								 Films
							</div>
						</div>
						<a class="more" href="{{ url('admin/films') }}">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat purple-plum">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{ $count_submitted_films }}
							</div>
							<div class="desc">
								Submitted Films
							</div>
						</div>
						<a class="more" href="{{ url('admin/submitted_films') }}">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="dashboard-stat grey">
						<div class="visual">
							<i class="fa fa-globe"></i>
						</div>
						<div class="details">
							<div class="number">
								 {{ $count_submitted_films }}
							</div>
							<div class="desc">
								 Number Of Orders
							</div>
						</div>
						<a class="more" href="{{ url('admin/transactions') }}">
						View more <i class="m-icon-swapright m-icon-white"></i>
						</a>
					</div>
				</div>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix">
			</div>



					<!-- FESTIVAL CHART ROW -->
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN CHART PORTLET-->
							<div class="portlet light bordered">
								<div class="portlet-title">
									<div class="caption">
										<i class="icon-bar-chart font-green-haze"></i>
										<span class="caption-subject bold uppercase font-green-haze"> Festivals Chart</span>
										<span class="caption-helper">top countries having festivals</span>
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										<a href="#portlet-config" data-toggle="modal" class="config">
										</a>
										<a href="javascript:;" class="reload">
										</a>
										<a href="javascript:;" class="fullscreen">
										</a>
										<a href="javascript:;" class="remove">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div id="chart_5" class="chart" style="height: 400px;">
									</div>
									<div class="well margin-top-20">
										<div class="row">
											<div class="col-sm-3">
												<label class="text-left">Top Radius:</label>
												<input class="chart_5_chart_input" data-property="topRadius" type="range" min="0" max="1.5" value="1" step="0.01"/>
											</div>
											<div class="col-sm-3">
												<label class="text-left">Angle:</label>
												<input class="chart_5_chart_input" data-property="angle" type="range" min="0" max="89" value="30" step="1"/>
											</div>
											<div class="col-sm-3">
												<label class="text-left">Depth:</label>
												<input class="chart_5_chart_input" data-property="depth3D" type="range" min="1" max="120" value="40" step="1"/>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- END CHART PORTLET-->
						</div>
					</div>
					<!-- END FESTIVAL CHART -->




					<!-- BEGIN FILM MAKER CHART  -->
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN CHART PORTLET-->
							<div class="portlet light bordered">
								<div class="portlet-title">
									<div class="caption">
										<i class="icon-bar-chart font-green-haze"></i>
										<span class="caption-subject bold uppercase font-green-haze"> Film Makers</span>
										<span class="caption-helper">  </span>
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										<a href="#portlet-config" data-toggle="modal" class="config">
										</a>
										<a href="javascript:;" class="reload">
										</a>
										<a href="javascript:;" class="fullscreen">
										</a>
										<a href="javascript:;" class="remove">
										</a>
									</div>
								</div>
								<div class="portlet-body">
									<div id="chart_4" class="chart" style="height: 400px;">
									</div>
								</div>
							</div>
							<!-- END CHART PORTLET-->
						</div>
					</div>
					<!-- END ROW -->


@endsection

@section('footer.scripts')
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ url('adminstration') }}/assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
<script src="{{ url('adminstration') }}/assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
<script src="{{ url('adminstration') }}/assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
<script src="{{ url('adminstration') }}/assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
<script src="{{ url('adminstration') }}/assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
<script src="{{ url('adminstration') }}/assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
<script src="{{ url('adminstration') }}/assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script src="{{ url('adminstration') }}/assets/admin/pages/scripts/charts-amcharts.js"></script>
<script>




    var initChartSample5 = function() {
        var chart = AmCharts.makeChart("chart_5", {
            "theme": "light",
            "type": "serial",
            "startDuration": 2,

            "fontFamily": 'Open Sans',

            "color":    '#888',

            "dataProvider": [
            @if($count_festivals > 0)
            @foreach($festivals as $key => $value)
            {
                "country": "{{ $key }}",
                "visits": '{{$value}}',
                "color": "#0D8ECF"
            },
            @endforeach
            @endif


            ],
            "valueAxes": [{
                "position": "left",
                "axisAlpha": 0,
                "gridAlpha": 0
            }],
            "graphs": [{
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "colorField": "color",
                "fillAlphas": 0.85,
                "lineAlpha": 0.1,
                "type": "column",
                "topRadius": 1,
                "valueField": "visits"
            }],
            "depth3D": 40,
            "angle": 30,
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "country",
            "categoryAxis": {
                "gridPosition": "start",
                "axisAlpha": 0,
                "gridAlpha": 0

            },
            "exportConfig": {
                "menuTop": "20px",
                "menuRight": "20px",
                "menuItems": [{
                    "icon": '/lib/3/images/export.png',
                    "format": 'png'
                }]
            }
        }, 0);

        jQuery('.chart_5_chart_input').off().on('input change', function() {
            var property = jQuery(this).data('property');
            var target = chart;
            chart.startDuration = 0;

            if (property == 'topRadius') {
                target = chart.graphs[0];
            }

            target[property] = this.value;
            chart.validateNow();
        });

        $('#chart_5').closest('.portlet').find('.fullscreen').click(function() {
            chart.invalidateSize();
        });
    }




</script>
<script>




     var initChartSample4 = function() {
        var chart = AmCharts.makeChart("chart_4", {
            "type": "serial",
            "theme": "light",


            "handDrawn": true,
            "handDrawScatter": 3,
            "legend": {
                "useGraphSettings": true,
                "markerSize": 12,
                "valueWidth": 0,
                "verticalGap": 0
            },
            "dataProvider": [

            @if($count_filmmakers > 0)
            @foreach($film_makers as $key => $value)

            {
                "year": '{{$key}}',
                "income": '{{$value}}'
            },

            @endforeach
            @endif

            ],
            "valueAxes": [{
                "minorGridAlpha": 0.08,
                "minorGridEnabled": true,
                "position": "top",
                "axisAlpha": 0
            }],
            "startDuration": 1,
            "graphs": [{
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
                "title": "Film Makers",
                "type": "column",
                "fillAlphas": 0.8,

                "valueField": "income"
            }, {
                "balloonText": "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>",
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletColor": "#FFFFFF",
                "useLineColorForBulletBorder": true,
                "fillAlphas": 0,
                "lineThickness": 2,
                "lineAlpha": 1,
                "bulletSize": 7,
                "title": "Country",
                "valueField": "expenses"
            }],
            "rotate": true,
            "categoryField": "year",
            "categoryAxis": {
                "gridPosition": "start"
            }
        });

        $('#chart_4').closest('.portlet').find('.fullscreen').click(function() {
            chart.invalidateSize();
        });
    }


</script>

@endsection
