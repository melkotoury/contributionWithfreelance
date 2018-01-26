                @foreach($festivals as $fest)
                <div class="festival-box" id="festival{{ $fest->id }}">

                    <div class="col-sm-4">
                        <div class="festival-img">

                @if(file_exists( public_path().'/images/festivals/'.$fest->logo_url ))
                <img alt="" src="{{ url('/') }}/images/festivals/{{$fest->logo_url}}" style="height: 250px; width: 350px;" alt="" class="img-responsive">
                @else
                <img alt="" src="http://placehold.it/350x250">
                @endif

                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="festival-info">
                            <h4>
                                {{ \App\User::find($fest->user_id)->fullname }}
                            </h4>
                            <p class="white">
                                {{ $fest->biography }}
                            </p>
                            <span style="text-transform: capitalize;">
                            {{ $fest->country .' ' }} </span>
                            <span class="show-deadline">
                              {{ date("d-m-Y", strtotime($fest->competetions()->first()->deadline)) }}  
                            </span>
                            
                            
                            <p class="white " id="compCat" > 
                               <button data-id="{{ implode(json_decode($fest->competetions()->first()->countries),', ') }}" class="btn btn-inverse acountry"><i class="fa fa-eye" aria-hidden="true"></i> Accepted Countries</button>
                            </p>
                            <p class="white" id="compCats" > 
                               <button data-id="{{ implode(json_decode($fest->competetions()->first()->accepted_regions),', ') }}" class="btn btn-inverse aregion"><i class="fa fa-eye" aria-hidden="true"></i> Accepted Regions</button></p>

                        </div>
                        <form>

                            <div class="form-group">

                    
                    <a id="sub-film" data-id="{{ $fest->competetions()->first()->id }}" data-festival="{{ $fest->id }}" class="btn btn-inverse pull-right">Submit</a>

                                <select name="comp"
                                        class="form-control pull-right select_comp" data-id="{{ $fest->id }}" style="width:130px; margin-right: 10px;">
                                    @foreach($fest->competetions as $comp)
                                    <option value="{{ $comp->id }}">{{ $comp->comp_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>

                    </div>

                    <span class="@{{festival.type[0]}}"></span>
                </div>
                @endforeach



