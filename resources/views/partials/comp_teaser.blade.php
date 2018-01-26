

                            <div class="row break">
                            <div class="col-md-12">
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

                            <div class="col-md-12">
                                 <span class="basic">Film Type : 
                                <span class="val"> 
                                {{   implode(json_decode($fest->film_type),', ') }}
                                  </span>
                                </span>
   
                            </div>

                            </div>
                            



                            <div class="row" style="margin-bottom: -10px; ">

                            <div class="col-md-4">
                                 <span class="basic">Max Duration : 
                                <span class="val"> 
                                {{  $comp->max_duration }} 
                                 min </span>
                                </span>
   
                                </div>

                           <div class="col-md-4">
                              <span class="basic">Fees : 
                                <span class="val"> 
                                {{  $comp->fees == 0 ? 'No Fees' : $comp->fees.' $' }} 
                                </span>
                            </span>
                            </div>


                            <div class="col-md-4">
                                <span class="basic">Deadline : 
                                <span class="val"> {{ date("d-m-Y", strtotime($comp->deadline)) }} </span>
                                </span>
                                </div>
                            </div>
                            


