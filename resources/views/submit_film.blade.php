

<!DOCTYPE html>
<html lang="en" data-ng-app="filmApp">

<head>
    <meta charset="utf-8">
    <title>I am a film | Submit Your Short Movie</title>
    <meta name="keywords" content="short films, films, festivals, submit your films, i am a film, film makers, submit
 to festivals">
    <meta name="description" content="submit your short film , film festivals , directors , editors , short films">
    <meta name="viewport" content="width=device-width">

    <meta property="og:title" content="Iamafilm | Designed By Root Cave">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://www.iamafilm.com">
    <meta property="og:site_name" content="Iamafilm">
    <meta property="og:description" content="short films, films, festivals, submit your films, i am a film, film makers, submit my film to festivals">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ url('site') }}/css/vendors/font-awesome.min.css">
    <link rel="stylesheet" href="{{ url('site') }}/css/vendors/animate.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>



    <link rel="stylesheet" href="{{ url('site') }}/css/vendors/bootstrap.min.css">
    <link href="{{ url('site') }}/css/vendors/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('site') }}/css/vendors/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('site') }}/css/vendors/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ url('site') }}/css/vendors/plugins.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ url('site') }}/css/main.css">

    <link rel="stylesheet" href="{{ url('site') }}/css/submit_film.css">
    <link rel="stylesheet" href="{{ url('site') }}/css/submit_modal.css">
    <link rel="stylesheet" type="text/css" href="{{ url('site') }}/css/vendors/sweetalert.min.css">


    <script src="{{ url('site') }}/js/lib/jquery-1.11.3.min.js"></script>

    <script src="{{ url('site') }}/js/lib/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ url('site') }}/../../../../../apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ url('site') }}/../../../../../apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ url('site') }}/../../../../../apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{ url('site') }}/../../../../../apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="{{ url('site') }}/../../../../../favicon.html">
        <style type="text/css">


            .btn-primary{
                background-color: #ff755a!important;
                color: white;
                border-color: #ff755a!important;
            }
            .btn-primary:hover,.btn-primary:active,.btn-primary:visited,.btn-primary:focus{

                background-color: #ff7752 !important;
                color: white;
                border-color: #ff7752!important;
            }
            .btn-inverse{
                background: white;
                color: #ff755a;
                border-color: white;
            }
            .btn-inverse:active,.btn-inverse:hover,.btn-inverse:visited{
                background: #fffcfb;
                color: #ff755a;
                border-color: #fffcfb;
            }
           .ajax-load{

                padding: 10px 0px;
                width: 100%;
            }

            .festival-info .basic {

                line-height: 7px;
                font-size: 17px;
                color: #31363a;
                font-weight: bold;
            }
            .festival-info .val {

                line-height: 7px;
                font-size: 13px;
                color: slategray;
                font-weight: bold;

            }
            .festival-info .break {

                margin-bottom: 7px;

            }
            @media screen and (max-width: 500px){
               .festival-info .basic {

                line-height: 6px;
                font-size: 14px;
                color: #31363a;
                font-weight: bold;
            }
            .festival-info .val {

                line-height: 6px;
                font-size: 11px;
                color: slategray;
                font-weight: bold;

            }
				.margin
				{
					margin-top: 10px;
				}
            .festival-info .break {

                margin-bottom: 7px;

            }
				.festival-img img
				{
					padding-left: 20px;
					padding-right: 20px;
				}
            }
    </style>

</head>

<body>


@include('partials.navbar')
<!--Start -->
<div class="container">
    <div class="box">
    <div id="submit-video" class="submit clearfix">

        <div class="festivals" >
            <div class="festival">

                <h1 class="text-center padded">Festivals</h1>
<!--                 <div class="festival-color">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="festival-clolr-box">
                                <span style="background: #00FFA1;"></span>submission
                                <span style="background: #FFD400;"></span>approaching deadline
                                <span style="background: #ff2525;"></span>closed
                            </div>
                        </div>
                    </div>
                </div>


                   

 -->			<div class="row">	
				
                <div class="festival-filter col-md-3 gray">
					<h3 class="orag catalog">Film To Submit</h3>
                    <div class="form-group clearfix">
                    <form action="{{ url('film/filter_festival') }}" method="get" id="filterFestivals">
                        <select id="my_film" class="form-control pull-left" name="my_film">
                            <option value="0" selected disabled>choose a film to submit</option>
                            @foreach($films as $film)
                            <option value="{{ $film->id }}" >{{ $film->english_title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group clearfix">
						<h3 class="orag catalog">Film Category</h3>
                        <select id="category"  name="film_category" class="form-control pull-left" >
                            <option value="cate" selected>All</option>
                                @foreach(filmCategory() as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="form-group clearfix ">
						<h3 class="orag catalog">Country</h3>
                            <select class=" form-control pull-left" id="country" name="country" >
                                <option value="cat" selected>All</option>
                                @foreach(countryArray() as $value)
                                <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach

                            </select>

                    </div>
                    <div class="col-md-6 margin-0">
						<h5 class="orag ">With Fees ?</h5>
                        <div class="form-group clearfix">
                            <select id="fees" name="fees"  class="form-control pull-left">
                            <option disabled selected value="0">Any</option>
                             <option value="yes">Yes</option>
                             <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 margin-0">
						<h5 class="orag ">Max Duration</h5>
                        <div class="form-group clearfix">
                            <select id="duration_time" name="duration_time"  class="form-control pull-left">
                                <option value="0" disabled selected>Any</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                                <option value="30">30</option>
                                <option value="35">35</option>
                                <option value="40">40</option>
                                <option value="45">45</option>
                                <option value="50">50</option>
                                <option value="55">55</option>
                                <option value="60">60</option>
                                <option value="65">65</option>
                                <option value="70">70</option>
                                <option value="75">75</option>
                                <option value="80">80</option>
                                <option value="85">85</option>
                                <option value="90">90</option>
                            </select>
                        </div>
						
                    </div>
						
                        <div class="form-group search-fest">
                                
                                <button type="submit" id="applyFilter" class="btn btn-inverse btn-block">Apply Filter</button>

                        </div>
                </div>
					
                <!--
                <div class="form-group clearfix">
                    <p class="col-xs-4 text-right white" >Show As</p>
                    <div class="col-xs-8">
                        <select class="form-control" data-ng-model="pageSize">
                            <option ng-selected="pageSize == pageSize" value="10" selected>10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>

                </div>
-->
<!--                 <div id="FestivalLoad" class="text-center"></div>
 -->               
					<div class="col-md-9">
						 <div class="form-group" data-ng-model='festivalFilter'>

                        </form>
                        <div class="films-filter festival-filter">
                            <span id="sortAll">All</span>
                            <span id="sortDate">Festival Date</span>
                            <span id="sortDeadline">Approaching Deadline</span>
                        </div>
                    </div>
					<div id="Festival">

                    @include('partials.fest_teaser')




                </div>
						</div>
					</div>
<div class="ajax-load text-center" style="display: none;">
<p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More Festivals</p>
</div>                       


            </div>


        </div>

    </div>
    </div>
</div>
<!--End-->





    <!-- start Competetion Details modal -->
    <div class="modal fade" id="modal-container-3495" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
               
              <h4 class="modal-title" id="myModalLabel21">
                Competetion Details
              <button  type="button" class="close " data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              </h4>
            </div>
            <div class="modal-body">
              <!-- start modal body -->
                         <div id="compCountries">
                           
                             
                           
                         </div>
                     

                      </div>
                 </form>
           <div class="modal-footer">
                             <form role="form" id="form_delete">
                      <div class="form-group">

                      </div>
                      <div class="form-group">
                       <input type="hidden" id="product_id_delete" name="product_id" value="0">

                          <button type="button" class="btn btn-primary" data-dismiss="modal"> Close <i class="fa fa-remove" aria-hidden="true"></i>
                           
                          </button> 


                      </div>
                 </form>

           </div>
        </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end Competetion Details modal -->












    <!-- start erros modal -->
    <div class="modal fade" id="modal-container-3496" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
               
              <h4 class="modal-title text-center" style="color: #ff755a;" id="myModalLabel21">
                Oops.. 
              <button  type="button" class="close " data-dismiss="modal" aria-hidden="true">
                ×
              </button>
              </h4>
            </div>
            <div class="modal-body">
              <!-- start modal body -->
                         <div id="obstacles">
                           
                             
                           
                         </div>
                     

                      </div>
                 </form>
           <div class="modal-footer">
                             <form role="form" id="form_delete">
                      <div class="form-group">

                      </div>
                      <div class="form-group">
                       <input type="hidden" id="product_id_delete" name="product_id" value="0">

                          <button type="button" class="btn btn-primary" data-dismiss="modal"> Close <i class="fa fa-remove" aria-hidden="true"></i>
                           
                          </button> 


                      </div>
                 </form>

           </div>
        </div>
               
             
              
          </div>
          
        </div>
        
      </div>
      <!-- end Competetion Details modal -->








<!--Bottom Section-->



@if(count($festivals) < 5)

<!--Bottom Section-->
<section id="bottom">
    <div class="container">
        <div class="row margin-40">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <p>Dubai Media City Second Floor, Bldg. No. 2 (CNN Bldg.) | 00201222848061 | <a href="mailto:info@iamafilm.com"><i class="icon-envelope-alt"></i> info@iamafilm.com</a></p>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 text-center">
                <!--Social Icons-->
                <ul class="social-icons">
                    <li><a class="twitter" href="http://www.twitter.com/rootcave" target="_blank"><i class="fa fa-twitter fa-3x"></i></a></li>
                    <li><a class="facebook" href="http://www.facebook.com/" target="_blank"><i class="fa fa-facebook fa-3x"></i></a></li>
                    <li><a class="google" href="http://www.googleplus.com/" target="_blank"><i class="fa fa-google-plus fa-3x"></i></a></li>
                    <li><a class="instagram" href="http://www.instagram.com/" target="_blank"><i class="fa fa-camera-retro fa-3x"></i></a></li>
                    <li><a class="pinterest" href="http://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest fa-3x"></i></a></li>
                    <li><a class="linkedin" href="http://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin fa-3x"></i></a></li>
                    <li><a class="Github" href="http://www.github.com/" target="_blank"><i class="fa fa-github-alt fa-3x"></i></a></li>
                </ul>
            </div>
        </div>

    </div>
</section>


@endif

<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>@ Copyright. All Rights Reserved. Created by <a href="http://www.rootcave.com/">Root Cave.</a></p>
            </div>
        </div>
    </div>
</section>


<!-- Javascript
================================================== -->
<!-- JavaScript Files -->
<!-- Include all compiled plugins (below), or include individual files as needed -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ url('site') }}/js/lib/js.cookie.min.js" type="text/javascript"></script>
<script src="{{ url('site') }}/js/lib/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="{{ url('site') }}/js/lib/vendors/jquery.blockui.min.js" type="text/javascript"></script>
<!-- BootstrapJs -->
<script src="{{ url('site') }}/js/lib/bootstrap.min.js"></script>




<!-- magnfic popup plugin -->
<script src="{{ url('site') }}/js/lib/jquery.magnific-popup.min.js"></script>
<script src="{{ url('site') }}/js/lib/vendors/scripts/app.min.js" type="text/javascript"></script>

<script src="{{ url('site') }}/js/lib/vendors/select2/js/select2.full.min.js"></script>
<script src="{{ url('site') }}/js/lib/vendors/scripts/components-select2.min.js" type="text/javascript"></script>
<script src="{{ asset('site') }}/js/lib/jquery.form.js"></script>
<script src="{{ asset('site') }}/js/lib/sweetalert.min.js"></script>
<script>
    
    var gif_url = '{{ url('site/img/facebook1.gif') }}';
    var sort = '{{ url('filter_festivals').'/' }}';

</script>

<!-- Google-map -->
<!--<script src="{{ url('site') }}/http://maps.google.com/maps/api/js?sensor=false"></script>-->

<!-- mapJs -->
<!--<script src="{{ url('site') }}/assets/js/map.js"></script>-->

{{--<!-- AngularJs -->--}}
{{--<script src="{{ url('site') }}/js/lib/angular.min.js"></script>--}}

{{--<!-- AngularJs Route -->--}}
{{--<script src="{{ url('site') }}/js/lib/angular-route.min.js"></script>--}}

<!-- CustomJs -->
<script src="{{ url('site') }}/js/app/submit_film.js"></script>


<script src="{{ url('site') }}/js/lib/dirPagination.js"></script>

<!-- appJs -->
<script src="{{ url('site') }}/js/app/app.js"></script>



<!--- JavaScript Files -->



<script>
    !function ($) {
        $(function(){
            $('#header').carousel()
        })


    }(window.jQuery)
</script>
<script>
        
    $(document).ready(function(){


        var gif_url = '{{ url('site/img/reload.gif') }}';  

        $('body').on('change','.select_comp', function() {

         var id = this.value;
         var fest_id = $(this).data('id');

         $.ajax({

            url:'{{ url('festival/competetions').'/' }}'+ id,
            method:'get',
            beforeSend:function() {

                $('#festival'+ fest_id +' .festival-info').html('<div  class="text-center"><img class="text-center" src="'+gif_url+'"></img></div>');
            },
            success:function(data) {

                var dis = data.disabled;
                var submitted = data.submitted;
                var date = data.sub_date;



                    if (dis == 'true') {

                        if (submitted == 'true') {

                             $('#festival'+ fest_id +' #sub-film').prop('disabled', true).html('submitted before');

                        } else if(date == 'true'){

                            // $('#festival'+ fest_id +' #sub-film');
                             $('#festival'+ fest_id +' #sub-film').html('Check Submission Date');
                        } else {

                             $('#festival'+ fest_id +' #sub-film').prop('disabled', true).html('closed');
                        }

                    } else {

                        if (submitted == 'true') {

                             $('#festival'+ fest_id +' #sub-film').prop('disabled', true).html('submitted before');

                        } else if(date == 'true'){

                            // $('#festival'+ fest_id +' #sub-film');
                             $('#festival'+ fest_id +' #sub-film').html('Check Submission Date');
                        } else {

                           $('#festival'+ fest_id +' #sub-film').prop('disabled', false).html('Submit');

                        }


                    }






                $('#festival'+ fest_id +' .acountry').data('id',data.id);
                $('#festival'+ fest_id +' #sub-film').data('id',data.id);
                $('#festival'+ fest_id +' .festival-info').html(data.html);



            },
            error:function(error) {

                alert(error);
            }

         });

       });  



      /* competetion details */
       $('body').on('click','.acountry',function(e){
       
        e.preventDefault();
        
        var id = $(this).data('id');


          $.ajax({

            url:'{{ url('comp_country').'/' }}'+id,
            type:'post',
            beforeSend:function (argument) {

              $("#compCountries").html('<h3 class="text-center"><img src=' + gif_url +'></h3>');

            },
            success:function (data) {
              $("#compCountries").html(data.html);
            },
            error:function (argument) {
              swal('error');
            }

          });

          $('#modal-container-3495').modal('show');


      });
       /* end competetion details */

   

     var url = '{{ url('film_submit') }}';

      $('body').on('click','#sub-film',function(){

        var comp     = $(this).data('id');
        var festival = $(this).data('festival');

       var url = '{{ url('film/filter_festival') }}';


        $.ajax({

            url:'{{ url('film/submit') }}',
            method:'post',
            data:{comp:comp,festival:festival},
            beforeSend:function() {
                
                $('#festival'+ festival +' #sub-film').html('loading...');
            },
            success:function(data) {

                if (data.success == 'no_film') {

                    swal('please choose a film and apply filters')

                    if (data.sub_date == 'true') {

                      $('#festival'+ festival +' #sub-film').html('Check Submission Date');                 
                    } else {

                      $('#festival'+ festival +' #sub-film').html('Submit');             

                    }

                }
                
                if (data.success == 'submitted_before') {

                    swal('This Film Has Been Submitted Before')

                    if (data.sub_date == 'true') {

                      $('#festival'+ festival +' #sub-film').html('Check Submission Date');                 
                    } else {

                      $('#festival'+ festival +' #sub-film').html('Submitted Before');   
                    }

                }
                
                if (data.success == 'free') {

                    swal(' Submitted Successfully')
                   $('#festival'+ festival +' #sub-film').html('Submit');                 
                }
                
                if (data.success == 'true') {

                    // window.location.href = "checkout/"+data.comp+"/"+data.my_film+"/"+data.festival_id;
                    window.location.href = "server_under_construction";
                    //window.location.href = "paypal/"+data.comp+"/"+data.my_film+"/"+data.festival_id;
                   // $('#festival'+ festival +' #sub-film').html('Submit');
                }
                                
                if (data.success == 'bug') {

                   $('#obstacles').html(data.view)
                   $('#modal-container-3496').modal('show');
                    if (data.sub_date == 'true') {

                      $('#festival'+ festival +' #sub-film').html('Check Submission Date');                 
                    } else {

                      $('#festival'+ festival +' #sub-film').html('Submit');   
                    }
                }
                    


                
            },
            error:function (error) {
                // body...
            }
        });


      });

   


      /* modal tabs js */

       

      /* end modal tabs js */





  });

</script>

<script type="text/javascript">
    var page = 1;

$(document).ready(function(){

     var url = '{{ url('submit_film') }}' + '?page=';
    location.hash = 1;
      $('body').on('click','#applyFilter',function(){
          location.hash = 1;
        var country   = $('#country :selected').val();
        var my_film   = $('#my_film :selected').val();
        var category  = $('#category :selected').val();
        var fees   = $('#fees :selected').val();
        var duration_time = $('#duration_time :selected').val();

        url = '{{ url('film/filter_festival') }}'+'?my_film='+ my_film +'&film_category='+category+'&country='+country+'&fees='+fees+'&duration_time='+duration_time+'&page=';
        page = 1;

    });
$(document).on('click','#sortAll', function(e){
	location.hash = 1;
	
})

$(document).on('click','#sortDate', function(e){
	location.hash = 1;
	
})
$(document).on('click','#sortDeadline', function(e){
	location.hash = 1;
	
})
	$(document).on('click','.pagination a', function(e){
		e.preventDefault();
		console.log( $(this).attr('href'));
		var page = $(this).attr('href').split('page=')[1];
		location.hash = page;

	})
	$(window).on('hashchange',function(){
			page = window.location.hash.replace('#','');
			loadMoreData(page);
		});

   function loadMoreData(page){
      $.ajax(
            {
                url: url + page,
                type: "get",
                beforeSend: function()
                {
                    $('.ajax-load').show();
                }
            })
            .done(function(data)
            {      console.log(data.html);
                if(data.html == " "){
                    $('.ajax-load').html("No more records found");
                    return;
                }
                $('.ajax-load').hide();
                $("#Festival").html(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError)
            {
                  swal('No More Festivals...');
            });
    }
})
</script>
<!-- END JAVA SCRIPT -->



</body>

</html>
