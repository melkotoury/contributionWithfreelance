
@extends('partials.partialsapp')



@section('header.scripts')

    <link rel="stylesheet" href="{{ asset('site') }}/js/lib/vendors/jqvmap/jqvmap/jqvmap.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/vendors/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('site') }}/css/map_film_maker.css">

@stop


@section('content')

<!--Map Section-->
<!--<div class="map-section" id="map"></div>-->
<div class="map-section">

    
    <!-- START SEARCH DIV -->
    <div class="row">
        <div class="col-md-3" style="padding-left: 11%" >
        <label style="margin-top: 10px; font-size: 16px;">Search Film Makers : </label>
        </div>
        <form action="{{ url('search_film_makers') }}" method="post" id="searchFilmMaker">
        <div class="col-md-3" >            
            <input type="text" class="form-control" name="film_maker" placeholder="Film Maker Name">
        </div>
        <div class="col-md-3">  

            <select class="form-control" name="country">
                <option value="0">Choose A Country</option>
                @foreach(countriesForMap() as $key => $value)
                   <option value="{{ $key }}">{{ $key.' '.$value }}</option>
                 @endforeach
            </select>

        </div>    
        <div class="col-md-3">
            <button id="editdirsubmit" type="submit" class="btn btn-primary"> <i class="fa fa-search"></i> Search</button>
        </div></form>          
    </div><br>
    <!-- END SEARCH DIV -->


    <div class="container">
        <div class="row">
    <div class="col-sm-12">
        <div class="box" ng-controller="directorListCtrl">
            <!--<div id="map" style="height:350px"></div>-->
            <div id="vmap" style=" height: 400px;"></div>

        </div> <!--Box ends -->


        <div class="profile_list" id="profile_list">
            <!-- <div class="profilewrapper">
            <div class="profile">
                <div class="pic">
                    <div class="img"><img src="{{ asset('site') }}/img/users/bahaa.jpg"/></div>
                    <i class="icon-plus"></i>
                    <i class="icon-ok"></i>
                </div>
                <h4>Bahaa El Gamal</h4>
                <p>Film Director</p>
            </div>
        </div>
            <div class="profilewrapper">
                <div class="profile">
                    <div class="pic">
                        <div class="img"><img src="{{ asset('site') }}/img/users/bahaa.jpg"/></div>
                        <i class="icon-plus"></i>
                        <i class="icon-ok"></i>
                    </div>
                    <h4>Bahaa El Gamal</h4>
                    <p>Film Director</p>
                </div>
            </div>
            <div class="profilewrapper">
                <div class="profile">
                    <div class="pic">
                        <div class="img"><img src="{{ asset('site') }}/img/users/bahaa.jpg"/></div>
                        <i class="icon-plus"></i>
                        <i class="icon-ok"></i>
                    </div>
                    <h4>Bahaa El Gamal</h4>
                    <p>Film Director</p>
                </div>
            </div> -->
        </div> <!--End List -->


            <!--<table id= "users-table" class="table table-bordered table-hover" >-->
                <!--<tr>-->
                    <!--<th>Profile Pic</th>-->
                    <!--<th>Director Name</th>-->
                    <!--<th>Country</th>-->
                <!--</tr>-->
                <!--<tr class="text-center" >-->
                    <!--<td><img class="img-circle " id="dirImg0" width="50" height="50" src="{{ asset('site') }}/"></td>-->
                    <!--<td id="dirName0"></td>-->
                    <!--<td id="dirCountry0"> </td>-->
                <!--</tr>-->
                <!--<tr class="text-center" >-->
                    <!--<td><img class="img-circle " id="dirImg1" width="50" height="50" src="{{ asset('site') }}/"></td>-->
                    <!--<td id="dirName1"></td>-->
                    <!--<td id="dirCountry1"> </td>-->
                <!--</tr>-->
                <!--<tr class="text-center" >-->
                    <!--<td><img class="img-circle " id="dirImg2" width="50" height="50" src="{{ asset('site') }}/"></td>-->
                    <!--<td id="dirName2"></td>-->
                    <!--<td id="dirCountry2"> </td>-->
                <!--</tr>-->
                <!--<tr class="text-center" >-->
                    <!--<td><img class="img-circle " id="dirImg3" width="50" height="50" src="{{ asset('site') }}/"></td>-->
                    <!--<td id="dirName3"></td>-->
                    <!--<td id="dirCountry3"> </td>-->
                <!--</tr>-->


            <!--</table>-->


        </div>
        </div>
    </div>
</div>
<!--End Map Secton-->

@stop
@section('footer.scripts')

<script src="{{ asset('site') }}/js/lib/angular.js"></script>
<script>
  var ajax_url = '{{ url('num_film_maker') }}';
</script>
<script src="{{ asset('site') }}/js/lib/vendors/jqvmap/jqvmap/maps/jquery.vmap.js"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jqvmap/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="{{ asset('site') }}/js/lib/vendors/jqvmap/jqvmap/data/jquery.vmap.sampledata.js"></script>
<script>
    
  var filmmakers=[
  @if(count(\App\FilmMaker::all()) > 0)
  @foreach(\App\FilmMaker::orderBy('id','asc')->get() as $film_maker)
  @if($film_maker->country_in_map != '')
      {

         @if(file_exists('images/filmmakers/'.$film_maker->photo))  
          profilePic: '{{ url('/') }}/images/filmmakers/{{$film_maker->photo}}',
         @else
          profilePic: 'http://placehold.it/100x100?text=no image',
         @endif 
          name: '{{ \App\User::where('id',$film_maker->user_id)->first()->fullname }}',
          country: '{{ $film_maker->country }}',
          country_code: '{{ \App\Country::where('name',$film_maker->country_in_map)->first()->code }}',
        link:'{{ url('/').'/'.\App\User::where('id',$film_maker->user_id)->first()->username }}',
        @if($film_maker->Profession != '')
        type:'{{ implode(json_decode($film_maker->Profession),',') }}'
        @endif
      },
 @endif    
 @endforeach
 @endif
 
  ];
jQuery('#vmap').vectorMap({
    // map: 'world_en',
    // backgroundColor: null,
    // color: '#ffffff',
    // hoverOpacity: 0.7,
    // selectedColor: '#666666',
    // enableZoom: true,
    // showTooltip: true,
    // values: sample_data,
    // scaleColors: ['#C8EEFF', '#006491'],
    // normalizeFunction: 'polynomial',
    map: 'world_en',
    backgroundColor: '#a5bfdd',
    borderColor: '#818181',
    borderOpacity: 0.25,
    borderWidth: 1,
    color: '#f4f3f0',
    enableZoom: true,
    hoverColor: '#c9dfaf',
    hoverOpacity: null,
    normalizeFunction: 'linear',
    scaleColors: ['#b6d6ff', '#005ace'],
    selectedColor: '#c9dfaf',
    selectedRegions: null,
    showTooltip: true,
    onRegionClick: function (element, code, region) {
    // var message = 'You clicked "'
    //     + region
    //     + '" which has the code: '
    //     + code;
    //
    //
    // alert(message);
      document.getElementById("profile_list").innerHTML = '';
    for (var i = 0; i < filmmakers.length; i++) {
      if (code == filmmakers[i].country_code) {
         var htmlAppear = `<div class="profilewrapper"><a href="`+ filmmakers[i].link + `">  <div class="profile">
              <div class="pic">
                  <div class="img"><img class="profile_img" src="`+ filmmakers[i].profilePic + `"/></div>
                  <i class="icon-plus"></i>
                  <i class="icon-ok"></i>
              </div>
              <h4>`+filmmakers[i].name+`</h4>
              <p>`+filmmakers[i].type +` </p>
          </div></a> </div>`;
           document.getElementById("profile_list").innerHTML += htmlAppear;
    }
        // document.getElementById("profile_list").innerHTML = htmlAppear;
    }
},
});
</script>
<script src="{{ asset('site') }}/js/lib/jquery.form.js"></script>
<script>
        
     $(document).ready(function() {
         
        
        $('#searchFilmMaker').ajaxForm({

            beforeSubmit: function() {

                $('#editdirsubmit').html('searching...');

            },
            success: function(response) {

                $('#editdirsubmit').html(' <i class="fa fa-search"></i> Search');
                if (response == false) {

                $('#profile_list').html('<h3 class="text-center">No Results Found With Your Search</h3>');

                }
                $('#profile_list').html(response.html);

            },
            error: function(error) {
                //process validation errors here.
                var errors = error.responseJSON; //this will get the errors response data.
                //show them somewhere in the markup
                //e.g
                errorsHtml = '<div class="alert alert-danger"><ul>';

                $.each(errors, function(key, value) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul></div>';
                $('#dirEditErrors').html(errorsHtml); //appending to a <div id="form-errors"></div> inside form
                // alert(errorsHtml); //appending to a <div id="form-errors"></div> inside form

                $('#editdirsubmit').html(' <i class="fa fa-search"></i> Search');


            },

        });

     });   

</script>

@stop