
@foreach($festivals as $fest)
    <?php

    $ids = \App\FestivalCompetetion::where('festival_id',$fest->id)
        ->orderBy('id','asc')->pluck('id')
        ->toArray();

    $id = $ids[0];
    $comp = \App\FestivalCompetetion::find($id);
    $comps = \App\FestivalCompetetion::whereIn('id',$ids)->get();


    ?>


    <div class="festival-box" id="festival{{ $fest->id }}">

        <div class="col-xs-12 col-md-2">
            <div class="festival-img">

                @if(file_exists('images/festivals/'.$fest->logo_url ))
                    <img alt="" src="{{ url('/') }}/images/festivals/{{$fest->logo_url}}" style="height: 120px; width: 180px;" alt="" class="img-responsive">
                @else
                    <img alt="" src="http://placehold.it/180x120?text=no image">
                @endif

            </div>
        </div>

        <div class="col-xs-12 col-md-9 fest-info margin">
            <div class="festival-info">


                <div class="row break">
                    <div class="col-xs-12 col-md-12 break ">
                              <span class="basic">Name : 
                                <span class="val"> 
                                {{  \App\User::find($fest->user_id)->fullname }}
                                  </span>
                                </span>
                    </div>
                    <div class="col-xs-12 col-md-12 break ">
                                 <span class="basic">Country : 
                                <span class="val"> 
                                {{  $fest->country }} 
                                  </span>
                                </span>

                    </div>
                    <div class="col-xs-12 col-md-8 ">
                                 <span class="basic">Date From : 
                                <span class="val"> 
                                {{  date("d-m-Y", strtotime($comp->comp_from)) }} 
                                  </span>
                                </span>
                        <span class="basic">To :
                                <span class="val"> 
                                {{  date("d-m-Y", strtotime($comp->comp_to)) }} 
                                  </span>
                                </span>

					</div>

                </div>

                <div class="row break">

                    <div class="col-xs-12 col-md-12">
                                 <span class="basic">Film Type : 
                                <span class="val"> 
                                {{--{{   implode(json_decode($comp->film_categories),', ') }}--}}
                                    {{   implode(json_decode($fest->film_type),', ') }}

                                  </span>
                                </span>

                    </div>

                </div>




                <div class="row" style="margin-bottom: 10px; ">

                    <div class="col-xs-12 col-md-12">
                                 <span class="basic">Max Duration : 
                                <span class="val"> 
                                {{  $comp->max_duration }}
                                    min </span>
                                </span>

                    </div>
                </div>
				<div class="row" style="margin-bottom: 10px; ">

					<div class="col-xs-12 col-md-6 break">
                              <span class="basic">Fees : 
                                <span class="val"> 
                                {{  $comp->fees == 0 ? 'No Fees' : $comp->fees.' $' }} 
                                </span>
                            </span>
                    </div>


                    <div class="col-xs-12 col-md-6">
                                <span class="basic">Deadline : 
                                <span class="val"> {{ date("d-m-Y", strtotime($comp->deadline)) }} </span>
                                </span>
                    </div>


                </div>
				




            </div>
			                    <span class=" hidden-xs" style="color: black!important;">Select Competition :</span>
            <div class="row">
			<form>
				






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




					<div class="col-md-4 col-xs-12">
                    <select name="comp"
                            class="form-control select_comp" data-id="{{ $fest->id }}" style="width:130px;">
                        @foreach($comps as $compl)
                            <option value="{{ $compl->id }}">{{ $compl->comp_name }}</option>
                        @endforeach
                    </select>
						</div>

					<div class="col-md-4 col-xs-12 ">
                    <p class="white fish-eye" id="compCat" >
                        <button data-id="{{ $comp->id }}" class="btn btn-inverse acountry"><i class="fa fa-eye" aria-hidden="true"></i> Competetion Details</button>
                    </p>
						</div>


            <div class="form-group">
                <div class="col-md-4 col-xs-12">
                    <a id="sub-film" data-id="{{ $comp->id }}" data-festival="{{ $fest->id }}" class="btn btn-inverse"
                    >Submit</a>
                </div>
            </div>
            </form>
			</div>
            <!-- errors -->
        </div>

        <span class="@{{festival.type[0]}}"></span>


    </div>
@endforeach
{{ $festivals->links() }}
                


