@foreach($festivals as $fest)
    <?php

    $ids = \App\FestivalCompetetion::where('festival_id',$fest->id)
        ->orderBy('id','asc')->pluck('id')
        ->toArray();

    $id = $ids[0];
    $comp = \App\FestivalCompetetion::find($id);
    $comps = \App\FestivalCompetetion::whereIn('id',$ids)->get();


//    echo '<div style="margin-top: 100px; color: red;"> ';
//    dd($comps);
//    echo '</div>';

    ?>


<div class="restaurant-list-wrapper">
  <div class="home-3-top-seller-content restaurant-block" id="festival{{ $fest->id }}">
  <div class="content">
  <div class="top-sell-content-sec-1">
  <div class="row">
    <div class="col-md-8 col-sm-7">
      @if(file_exists('images/festivals/'.$fest->logo_url ))
                    <img alt="" src="{{ url('/') }}/images/festivals/{{$fest->logo_url}}" style="height: 120px; width: 180px;" alt="" class="img-responsive">
                @else
                    <img alt="" src="http://placehold.it/180x120?text=no image">
                @endif

                <strong>{{  str_limit(\App\User::find($fest->user_id)->fullname,30) }} </strong>
                <div class="sub-content-in-top-seller">
                  <div class="sub-category">
                    <p>{{  $fest->country }} </p>
                    <p> {{   implode(json_decode($fest->film_type),', ') }}</p>
                      <form>
                    <p>Select Competition  <select name="comp"
                            class="form-control select_comp " data-id="{{ $fest->id }}" >
                        @foreach($comps as $compl)
                            <option value="{{ $compl->id }}">{{ $compl->comp_name }}</option>

                        @endforeach
                    </select>
                    </p>
                    <p class="white " id="compCat" >
                        <button data-id="{{ $comp->id }}" class="btn btn-primary acountry"><i class="fa fa-eye" aria-hidden="true"></i> Competetion Details</button>
                    </p>
                  </div>
                </div>
    </div>

    <div class="col-sm-5 col-md-4">
      <ul class="meta-list">
          <li><span>From : </span> <span class="val">{{  date("d-m-Y", strtotime($comp->comp_from)) }}</span> </li>
          <li><span>To: </span> <span class="val">{{  date("d-m-Y", strtotime($comp->comp_to)) }}</span> </li>
          <li><span>Max Duration : </span>  <span class="val">{{  $comp->max_duration }}</span> min</li>
          <li><span>Fees : </span> <span class="val">{{  $comp->fees == 0 ? 'No Fees' : $comp->fees.' $' }}</span> </li>
          <li><span>Deadline : </span>  <span class="val">{{ date("d-m-Y", strtotime($comp->deadline)) }}</span></li>

              <div class="form-group">
        <li><a id="sub-film" data-id="{{ $comp->id }}" data-festival="{{ $fest->id }}" class="btn btn-primary btn-block"
                    >Submit</a>
            <script>
                $(document).ready(function() {

                    var status = '{{  compDisabled($comp)  }}';
                    var date = '{{  compCheckSubmissionDate($comp)  }}';
                    var fest_id = '{{  $comp->festival_id  }}';
                    var submitted = '{{ checkFilmSubmission($comp->id) }}';


                    if (status == 'true') {

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

                            $('#festival'+ fest_id +' #sub-film').prop('disabled', false);

                        }


                    }

                });
            </script>
        </li>
              </div>

      </ul>
    </div>
  </div>


                            
                             
                            
                            </div>

                            </div>

             </div>

</div>








            <!-- errors -->


        <span class="@{{festival.type[0]}}"></span>




   
@endforeach

{{ $festivals->links() }}
