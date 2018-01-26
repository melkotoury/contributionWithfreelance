@foreach($films as $film)                    
<tr id="filmNumber{{ $film->id }}">
            <td>
                <div id="corto_13494" class="corto768">
                    <div class="sup"></div>
                    <div class="med">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td width="160" rowspan="2" valign="top">
                                        <a target="_blanck" href="{{ url($film->film_url) }}">

                    @if(file_exists('images/filmssubmitted/'.$film->film_poster))                
                    <img width="168" height="98" src="{{ url('/').'/images/filmssubmitted/'.$film->film_poster }}" border="0" class="borde">
                    @else
                    <img width="168" height="98" src="http://placehold.it/168x98?text=no image" border="0" class="borde">

                    @endif


                    </a>

                                    </td>
                                    <td width="210"><a target="_blanck" href="{{ url($film->film_url) }}"><span class="titulo black"> {{ $film->english_title }}

    
                                        <br>           
                                        </span></a> <span class="black">{{ implode(json_decode($film->production_country),',') }}</span>
                                        <br> 

                    @foreach(\App\Film::find($film->id)->categories as  $theme)
                     <span class="black">{{ $theme->name }}</span>
                    @endforeach

                                        <br> 

                   @foreach(\App\Film::find($film->id)->directors as $dir)
                    <span class="black"> {{ $dir->name }},{{ $dir->email }}</span><br>
                     
                    @endforeach

                                        <br>
                                        <div class="film_icons">
                                            <ul>
                                                <li>
                                                    <a href="#" class="film_id" data-toggle="modal" data-target="#move_modal" data-id="{{ $film->id }}" title="move film">
                                                        <i class="fa fa-arrows"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a target="_blanck" href="{{ url(userFromFilm($film->id)->username) }}" class="film_id" title="Submitter profile">
                                                        <i class="fa fa-link"></i>
                                                    </a>
                                                </li>
                                                </li>
                                                <li>
                                                    <a href="#" class="film_id" data-toggle="modal" data-target="#copy_modal"  data-id="{{ $film->id }}"  title="copy film">
                                                        <i class="fa fa-files-o"></i>
                                                    </a>
                                                </li>
                                                </li>
                                                <li>
                                                    <a href="#" data-id="{{ $film->id }}" class="film_id film_status" title="film status">
                                                        <i class="fa fa-cogs"></i>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="#" data-id="{{ $film->id }}" class="film_id film_owner_contacts" title="Submitter contact info">
                                                        <i class="fa fa-address-card"></i>
                                                    </a>
                                                </li>

                                                </li>
                                                @if(Auth::user()->type == 'festival')
                                                <li>
                                                    <a href="#" data-id="{{ $film->id }}" class="film_id festival_votes" title="film votes">
                                                        <i class="fa fa-commenting"></i>
                                                    </a>
                                                </li>
                                                </li>
                                                @endif

                                                @if(Auth::user()->type == 'festival_programmer')
                                                <li>
                                                    <a href="#" data-id="{{ $film->id }}" class="film_id" data-toggle="modal" data-target="#programmer_votes" title="film votes">
                                                        <i class="fa fa-commenting"></i>
                                                    </a>
                                                </li>
                                                </li>
                                                @endif

                                            </ul>
                                        </div>
                                    </td>
                                    <td width="280" valign="top">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                            <tbody>
                        <tr>
                            <td width="95" align="center" valign="bottom"><span class="black">{{ $film->duration }} min</span></td>

                            <td width="133" align="center" valign="bottom">
                            <span class="black">{{ date("d-m-Y", strtotime($film->production_date)) }}</span></td>
                            <td width="90" align="center" valign="bottom">
                                 </td>

                        <td width="60" align="center" valign="bottom">
         <?php $sub = \App\FilmSubmit::where(['film_id'=>$film->id,
      'festival_id'=>$festival->id])->first(); ?>                    
         <input type="checkbox" class="film_check" data-id="{{ $film->id }}" value="1" {{ $sub->seen == 1 ? 'checked' : '' }}>

                            </td>
                        </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div style="display:none;" id="corto_id13494">
                                            <form name="frm_envio" id="frm_envio" method="post" action="#">
                                                <input type="hidden" name="frm_envio" id="frm_envio" value="frm_envio">
                                                <input type="hidden" name="corto_id" id="corto_id" value="13494">

                                                <table width="100%" border="0" cellpadding="1" cellspacing="1">
                                                    <tbody>
                                                        <tr>
                                                            <td width="20%">Status:</td>
                                                            <td width="20%">
                                                                <select id="envio_estado" name="envio_estado" class="campo">
                                                                    <option value="1" selected="selected">Sent</option>
                                                                    <option value="2">No selected</option>
                                                                    <option value="3">Selected</option>
                                                                    <option value="4">Preselected</option>
                                                                </select>
                                                            </td>
                                                            <td width="20%">Reference:</td>
                                                            <td width="20%">
                                                                <input type="text" name="envio_ref" id="envio_ref" value="001MUNIC2016" class="campo">
                                                            </td>
                                                            <td width="20%">
                                                                <input type="submit" name="btn_envio" id="btn_envio" value="ACCEPT" class="boton_oscuro">
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="inf"></div>
                </div>
            </td>
        </tr>






@endforeach

                            