            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">.</h3>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">
                            General Info
                            </a></li>
                            <li><a href="#tab2" data-toggle="tab">Themes</a></li>
                            <li><a href="#tab3" data-toggle="tab">Languages</a></li>
                            <li><a href="#tab4" data-toggle="tab">Countries</a></li>
                            <li><a href="#tab5" data-toggle="tab">Genres</a></li>
                            <li><a href="#tab6" data-toggle="tab">Categories</a></li>
                            <li><a href="#tab7" data-toggle="tab">Subtitles</a></li>

                        </ul>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tab-content">


                        <div class="tab-pane active" id="tab1">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{ $comp->comp_name }}</td>
                            </tr>
                            <tr>
                                <th>Student Film Only</th>
                                <td>{{ $comp->student_only == 0 ? 'Yes' : 'No' }}</td>
                            </tr>
                            <tr>
                                <th>Fees</th>
                                <td>{{ $comp->fees }}$</td>
                            </tr>
                            <tr>
                                <th>Max Film Duration</th>
                                <td>{{ $comp->max_duration }} min</td>
                            </tr>
                            <tr>
                                <th>Film Production Date</th>
                                <td>{{ date("d-m-Y", strtotime($comp->production_date)) }}</td>
                            </tr>
                            <tr>
                                <th>Submission Begins</th>
                                <td>{{ date("d-m-Y", strtotime($comp->submission_begins)) }}</td>
                            </tr>
                            <tr>
                                <th>Deadline</th>
                                <td>{{ date("d-m-Y", strtotime($comp->deadline)) }}</td>
                            </tr>
                            @if($comp->requirements != '')
                            <tr>
                                <th>Requirements</th>
                                <td>{{ $comp->requirements }}</td>
                            </tr>
                            @endif
                        </table>
                        </div>


                        <div class="tab-pane" id="tab2">
                            <p class="text-center" style="font-size: 25px;font-weight: bold;">
                                <?php $lol = json_decode($comp->film_themes); ?>
                                @if(in_array('all',$lol))
                                all themes are accepted
                                @else
                                {{ implode($lol,' , ') }}
                                @endif

                            </p>
                        </div>


                        <div class="tab-pane" id="tab3">
                            <p class="text-center" style="font-size: 25px;font-weight: bold;">
                                <?php $lol = json_decode($comp->film_languages); ?>
                                @if(in_array('All Languages',$lol))
                                all languages are accepted
                                @else
                                {{ implode($lol,' , ') }}
                                @endif

                            </p>



                        </div>

                        <div class="tab-pane" id="tab4">
                            <table class="table">
                            <tr>
                            <th>Accepted Countries</th>
                            <td class="text-center" style="font-size: 25px;font-weight: bold;">
                                <?php $lol = json_decode($comp->countries); ?>
                                @if(in_array('all',$lol))
                                all countries are accepted
                                    @else
                                {{ implode($lol,' , ') }}
                                @endif
                            </td>
                            </tr>
                            <tr>
                            <th>Accepted Regions</th>
                            <td class="text-center" style="font-size: 25px;font-weight: bold;">
                                <?php $lol = json_decode($comp->accepted_regions); ?>
                                @if(in_array('all',$lol))
                                    all regions are accepted
                                @else
                                    {{ implode($lol,' , ') }}
                                @endif


                            </td>
                            </tr>
                            </table>
                        </div>


                        <div class="tab-pane" id="tab5">
                            <p class="text-center" style="font-size: 25px;font-weight: bold;">
                                <?php $lol = json_decode($comp->film_genres); ?>
                                @if(in_array('all',$lol))
                                all genres are accepted
                                @else
                                {{ implode($lol,' , ') }}
                                @endif

                            </p>

                        </div>


                        <div class="tab-pane" id="tab6">
                            <p class="text-center" style="font-size: 25px;font-weight: bold;">
                                <?php $lol = json_decode($comp->film_categories); ?>
                                @if(in_array('all',$lol))
                                all categories are accepted
                                @else
                                {{ implode($lol,' , ') }}
                                @endif

                            </p>

                        </div>



                       <div class="tab-pane" id="tab7">
                            <p class="text-center" style="font-size: 25px;font-weight: bold;">
                                <?php $lol = json_decode($comp->film_lang_subtitle); ?>
                                @if(in_array('All Languages',$lol))
                                all languages are accepted
                                @else
                                {{ implode($lol,' , ') }}
                                @endif

                            </p>


                        </div>




                    </div>
                </div>
            </div>

