                @foreach($festivals as $fest)
<!--                --><?php //$fest = \App\Festival::find($fest['id']) ?>
                
                <div class="festival-box" id="festival{{ $fest->id }}">

                    <div class="col-sm-2">
                        <div class="festival-img">

                @if(file_exists('images/festivals/'.$fest->logo_url ))
                <img alt="" src="{{ url('/') }}/images/festivals/{{$fest->logo_url}}" style="height: 120px; width: 180px;" alt="" class="img-responsive">
                @else
                <img alt="" src="http://placehold.it/180x120?text=no image">
                @endif

                        </div>
                    </div>

                    <div class="col-sm-10">
                        <div class="festival-info">



                            <div class="row break">
                                <div class="col-xs-12 col-md-12">
                              <span class="basic">Name :
                                <span class="val">
                                {{  str_limit(\App\User::find($fest->user_id)->fullname,30) }}
                                  </span>
                                </span>
                                </div>
                            <div class="col-md-4">
                                 <span class="basic">Country : 
                                <span class="val"> 
                                {{  $fest->country }} 
                                  </span>
                                </span>
   
                            </div>
                            <div class="col-md-8">
                                 <span class="basic">Date From : 
                                <span class="val"> 
                                {{  date("d-m-Y", strtotime($fest->competetions()->first()->comp_from)) }} 
                                  </span>
                                </span>
                                 <span class="basic">To : 
                                <span class="val"> 
                                {{  date("d-m-Y", strtotime($fest->competetions()->first()->comp_to)) }} 
                                  </span>
                                </span>
   
                            </div>

                            </div>
                            
                            <div class="row break">

                            <div class="col-md-12">
                                 <span class="basic">Film Type : 
                                <span class="val"> 
                                {{   implode(json_decode($fest->competetions()->first()->film_categories),', ') }} 
                                  </span>
                                </span>
   
                            </div>

                            </div>
                            



                            <div class="row" style="margin-bottom: -10px; ">

                            <div class="col-md-4">
                                 <span class="basic">Max Duration : 
                                <span class="val"> 
                                {{  $fest->competetions()->first()->max_duration }} 
                                 min </span>
                                </span>
   
                                </div>

                           <div class="col-md-4">
                              <span class="basic">Fees : 
                                <span class="val"> 
                                {{  $fest->competetions()->first()->fees == 0 ? 'No Fees' : $fest->competetions()->first()->fees.' $' }} 
                                </span>
                            </span>
                            </div>


                            <div class="col-md-4">
                                <span class="basic">Deadline : 
                                <span class="val"> {{ date("d-m-Y", strtotime($fest->competetions()->first()->deadline)) }} </span>
                                </span>
                                </div>
                            </div>
                            



                        </div>
                        <form>

                            <div class="form-group">

                    
                            <a id="sub-film" data-id="{{ $fest->competetions()->first()->id }}" data-festival="{{ $fest->id }}" class="btn btn-inverse pull-right"
                             >Submit</a>

            <script>
                $(document).ready(function() {

                    var status = '{{  compDisabled($fest->competetions()->first())  }}';
                    var fest_id = '{{  $fest->competetions()->first()->festival_id  }}';
                    var submitted = '{{ checkFilmSubmission($fest->competetions()->first()->id) }}';
                    var date = '{{ compCheckSubmissionDate($fest->competetions()->first()) }}';




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




                                <select name="comp"
                                        class="form-control pull-right select_comp" data-id="{{ $fest->id }}" style="width:130px; margin-right: 10px;">
                                    @foreach($fest->competetions as $comp)
                                    <option value="{{ $comp->id }}">{{ $comp->comp_name }}</option>
                                    @endforeach
                                </select>
                                <span class="pull-right" style="padding-top: 8px;padding-right: 10px;">Select Competition</span>

                               <p class="white " id="compCat" > 
                               <button data-id="{{ $fest->competetions()->first()->id }}" class="btn btn-inverse acountry"><i class="fa fa-eye" aria-hidden="true"></i> Competetion Details</button>
                            </p>

                            </div>
                        </form>

                    <!-- errors -->
                    </div>

                    <span class="@{{festival.type[0]}}"></span>
                </div>
                @endforeach
                {{ $festivals->links() }}



