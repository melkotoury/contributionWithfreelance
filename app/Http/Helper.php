<?php

 function filmMaterial($name,$x,$y){

    if (file_exists(public_path('images/filmmaterials').'/'.$name)) {
        
        $path = public_path('images/filmmaterials').'/'.$name;
        $img  = Image::make($path)->resize($x,$y);

        return $img;

    }
 }


function festivalSubmitted($film)
{
   $festivals = \App\FilmSubmit::where('film_id',$film)->pluck('festival_id')->toArray();
   $festivals_ids = array_unique($festivals);
   $festivals = \App\Festival::whereIn('id',$festivals_ids)->get();

   return$festivals;     
}


function festivalsSubmitted($film)
{
   $festivals = \App\FilmSubmit::where('film_id',$film)->pluck('festival_id')->toArray();
   $festivals_ids = array_unique($festivals);
   $festivals = \App\Festival::whereIn('id',$festivals_ids)->pluck('id');

   return$festivals;     
}


function showFestival($id)
{
   $festival = \App\Festival::find($id);
   $user     = \App\User::find($festival->user_id);
   $festival = \App\User::showFestival($user->username);

   return$festival;     
}


function filmSeen($film_id,$festival_id)
{
    $sub =\App\FilmSubmit::where('film_id',$film_id)->where('festival_id',$festival_id)->first();

    if ($sub->seen == 1 ) {
      
      return true;

    }else{

      return false;
    }

}




// submitted films

 function showSubmittedFilms()
{

        // check if a user is a festival or programmer
        if (Auth::user()->type == 'festival'  ||  Auth::user()->type == 'festival_programmer') {
        
              if (Auth::user()->type == 'festival') {

                $festival = \App\User::showFestival(Auth::user()->username)->id;
            
             }

              if (Auth::user()->type == 'festival_programmer') {

                $festival = \App\FestivalProgrammer::where('user_id',Auth::user()->id)
                                                   ->first()->festival_id;
            
             }

              $festival = \App\Festival::find($festival);
              $comp     = $festival->competetions()->pluck('id');
              $sub      = \App\FilmSubmit::whereIn('competetion_id',$comp);
              $films    =  $sub->get()->pluck('film_id');
              $moved    = \App\Move::where('festival_id',$festival->id)->pluck('film_id');
              $films    = \App\Film::whereIn('id',$films)
                                   ->whereNotIn('id',$moved);

           return [$films,$festival,$sub];    

      }                  
}

// end submitted films 








// show Comp Submitted Films

 function showCompSubmittedFilms($comp_id)
{

        // check if a user is a festival or programmer
        if (Auth::user()->type == 'festival'  ||  Auth::user()->type == 'festival_programmer') {
        
              if (Auth::user()->type == 'festival') {

                $festival = \App\User::showFestival(Auth::user()->username)->id;
            
             }

              if (Auth::user()->type == 'festival_programmer') {

                $festival = \App\FestivalProgrammer::where('user_id',Auth::user()->id)
                                                   ->first()->festival_id;
            
             }

              $festival = \App\Festival::find($festival);
              //$comp     = $festival->competetions()->pluck('id');
              $sub      = \App\FilmSubmit::where('competetion_id',$comp_id);
              $films    =  $sub->get()->pluck('film_id');
              $moved    = \App\Move::where('festival_id',$festival->id)->pluck('film_id');
              $films    = \App\Film::whereIn('id',$films)
                                   ->whereNotIn('id',$moved);

           return [$films,$festival,$sub];    

      }                  
}

// show Comp Submitted Films 










// join films table with submitted films table

 function joinFilmsWithSubmitted($order_by = 'asc',$comp_id)
{

        // check if a user is a festival or programmer
        if (Auth::user()->type == 'festival'  ||  Auth::user()->type == 'festival_programmer') {
        
              if (Auth::user()->type == 'festival') {

                $festival = \App\User::showFestival(Auth::user()->username)->id;
            
             }

              if (Auth::user()->type == 'festival_programmer') {

                $festival = \App\FestivalProgrammer::where('user_id',Auth::user()->id)
                                                   ->first()->festival_id;
            
             }

              $festival = \App\Festival::find($festival);

              $films = DB::table('films')
                    ->join('film_submits', 'films.id', '=', 'film_submits.film_id')
                    ->where('film_submits.competetion_id','=',$comp_id)
                    ->orderBy('film_submits.created_at',$order_by)
                    ->select('films.*')
                    ;

           return [$films,$festival];    

      }                  
}

// END join films table with submitted films table






// join films table with submitted films table inside folders
function joinFilmsWithSubmittedInFolder($id = 0,$order_by = 'asc')
{
        $cop = \App\Copy::where('folder_id',$id)->pluck('film_id')->toArray();

        $mov = \App\Move::where('folder_id',$id)->pluck('film_id')->toArray();

        $films = array_unique(array_merge($cop,$mov));


        $festival_id = \App\Folder::find($id)->festival_id;
        $festival    = \App\Festival::find($festival_id);

        $films = DB::table('films')
              ->join('film_submits', 'films.id', '=', 'film_submits.film_id')
              ->where('film_submits.festival_id','=',$festival->id)
              ->whereIn('films.id',$films)
              ->orderBy('film_submits.created_at',$order_by)
              ->distinct()
              ->select('films.*');

        return [$films,$festival];    
      
}
// END join films table with submitted films table inside folders






// start show folder films
function showFolderFilms($id)
{
        $cop = \App\Copy::where('folder_id',$id)->pluck('film_id')->toArray();

        $mov = \App\Move::where('folder_id',$id)->pluck('film_id')->toArray();

        $films = array_unique(array_merge($cop,$mov));

        $films = \App\Film::whereIn('id',$films);

        $festival_id = \App\Folder::find($id)->festival_id;
        $festival    = \App\Festival::find($festival_id);

        return [$films,$festival];    
      
}
// end show folder films




function currency()
{
   return ['USD','EUR','GBP','AED'];
}


// get user details from film id
function userFromFilm($id)
{
      $film = \App\Film::find($id)->user_id;
      $user = \App\User::find($film);

      return $user;
}


// get user details from film id
function userFromFestival($id)
{
      $festival = \App\Festival::find($id)->user_id;
      $user = \App\User::find($festival);
      return $user;
}




// get competetion disabled or not when submitting
function compDisabled($comp)
{
      if ($comp->deadline < date("Y-m-d")) {
            
            return 'true';

          }else {

             return 'false';

          }
}






// get competetion disabled or not when submitting
function compCheckSubmissionDate($comp)
{
      if ($comp->submission_begins > date("Y-m-d")) {
            
            return 'true';

          }else {

             return 'false';

          }
}




// check if film submitted or not

function checkFilmSubmission($comp)
{

  
  if (Session::has('my_film')) {
    
      $submit =   \App\FilmSubmit::where(['film_id'=>Session::get('my_film'),
                                           'competetion_id'=>$comp]);

      if ($submit->exists()) {
        
        return 'true';

      } else {
        
        return 'false';
      }
    
  } else {

    return 'false';

  }

}
// end it

 
function filmSelected($film_id,$festival_id)
{
    $sub =\App\FilmSubmit::where('film_id',$film_id)->where('festival_id',$festival_id)->first();

    if ($sub->selected == 2 ) {
      
      return true;

    }else{

      return false;
    }

}


 
 function acceptedRegions()
 {
    return ['Mediterranean','Scandinavian','Arab','African','European','Eastern Europe'
     ,'Western Europe','Asian','Latin American','North American','Balkans'];
 }


// array to hold country + number of film makers
  function countriesForMap()
 {
     
     $array = [];

    foreach (array_keys(countryTable()) as $key => $value) {
       
      $array[] =  \App\FilmMaker::where('country_in_map',$value)->count();
    }

    $array = array_combine(array_keys(countryTable()), $array);

    return $array;
 }


// array to hold country + number of festivals
  function countriesForFestivalMap()
 {
     
         $array = [];

          foreach (array_keys(countryTable()) as $key => $value) {
             
            $array[] =  \App\Festival::where('country',$value)->count();
          }

          $array = array_combine(array_keys(countryTable()), $array);
          return $array;

 }


 function langArray()
{
	return [
                  'No Dialogue',
                  'Abkhazian',
                  'Afar',
                  'Afrikaans',
                  'Albanian',
                  'Amharic',
                  'Arabic',
                  'Aragonese',
                  'Armenian',
                  'Assamese',
                  'Aymara',
                  'Azerbaijani',
                  'Bashkir',
                  'Basque',
                  'Bengali(Bangla)',
                  'Bhutani',
                  'Bihari',
                  'Bislama',
                  'Breton',
                  'Bulgarian',
                  'Burmese',
                  'Byelorussian(Belarusian)',
                  'Catalan',
                  'Cherokee',
                  'Chewa',
                  'Chinese',
                  'Chinese (Simplified)',
                  'Chinese (Traditional)',
                  'Croatian',
                  'Czech',
                  'Danish',
                  'Divehi',
                  'Dutch',
                  'Edo',
                  'English',
                  'Esperanto',
                  'Estonian',
                  'Faeroese',
                  'Farsi',
                  'Fiji',
                  'Finnish',
                  'Flemish',
                  'French',
                  'Frisian',
                  'Fulfulde',
                  'Galician',
                  'Gaelic (Scottish)',
                  'Gaelic(Manx)',
                  'Georgian',
                  'German',
                  'Greek',
                  'Greenlandic',
                  'Guarani',
                  'Gujarati',
                  'Haitian Creole',
                  'Hausa',
                  'Hawaiian',
                  'Hebrew',
                  'Hindi',
                  'Hungarian',
                  'Ibibio',
                  'Icelandic',
                  'Ido',
                  'Igbo',
                  'Indonesian',
                  'Interlingua',
                  'Interlingue',
                  'Inuktitut',
                  'Inupiak',
                  'Irish',
                  'Italian',
                  'Japanese',
                  'Javanese',
                  'Kannada',
                  'Kanuri',
                  'Kashmiri',
                  'Kazakh',
                  'Kinyarwanda(Ruanda)',
                  'Kirghiz',
                  'Kirundi(Rundi)',
                  'Konkani',
                  'Korean',
                  'Kurdish',
                  'Laothian',
                  'Latin',
                  'Latvian (Lettish)',
                  'Limburgish( Limburger)',
                  'Lingala',
                  'Lithuanian',
                  'Macedonian',
                  'Malagasy',
                  'Malay',
                  'Malayalam',
                  'Maltese',
                  'Maori',
                  'Marathi',
                  'Moldavian',
                  'Mongolian',
                  'Nauru',
                  'Nepali',
                  'Norwegian',
                  'Occitan',
                  'Oriya',
                  'Oromo(Afaan Oromo)',
                  'Papiamentu',
                  'Pashto(Pushto)',
                  'Polish',
                  'Portuguese',
                  'Punjabi',
                  'Quechua',
                  'haeto-Romance',
                  'Romanian',
                  'Russian',
                  'Sami(Lappish)',
                  'Samoan',
                  'Sangro',
                  'Sanskrit',
                  'Serbian',
                  'Serbo-Croatian',
                  'Sesotho',
                  'Setswana',
                  'Shona',
                  'Sichuan Yi',
                  'Sindhi',
                  'Sinhalese',
                  'Siswati',
                  'Slovak',
                  'Slovenian',
                  'Somali',
                  'Spanish',
                  'Sundanese',
                  'Swahili(Kiswahili)',
                  'Swedish',
                  'Syriac',
                  'Tagalog',
                  'Tajik',
                  'Tamazight',
                  'Tamil',
                  'Tatar',
                  'Telugu',
                  'Thai',
                  'Tibetan',
                  'Tigrinya',
                  'Tonga',
                  'Tsonga',
                  'Turkish',
                  'Turkmen',
                  'Twi',
                  'Uighur',
                  'Ukrainian',
                  'Urdu',
                  'Uzbek',
                  'Venda',
                  'Vietnamese',
                  'Volapük',
                  'Wallon',
                  'Welsh',
                  'Wolof',
                  'Xhosa',
                  'Yi',
                  'Yiddish',
                  'Yoruba',
                  'Zulu',
                                                      

	];
}


function yearArray()
{
  return [

      '2017' => '2017',
      '2018' => '2018',
      '2019' => '2019',
      '2020' => '2020',
      '2021' => '2021',
      '2022' => '2022',
      '2023' => '2023',
      '2024' => '2024',
      '2025' => '2025',
      '2026' => '2026',
      '2027' => '2027',
      '2028' => '2028',
      '2029' => '2029',
      '2030' => '2030',
      '2031' => '2031',
      '2032' => '2032',
      '2033' => '2033',
      '2034' => '2034',
      '2035' => '2035',
      '2036' => '2036',
      '2037' => '2037',
      '2038' => '2038',
      '2039' => '2039',
      '2040' => '2040',

       ];
}


 function countryArray(){

     return \App\Country::pluck('name')->toArray();
}


 function usernames(){

     return \App\User::pluck('username')->toArray();
}

 function filmnames(){

     return \App\Film::pluck('film_url')->toArray();
}

 function festivalProgrammers($id){

     $arr_one  =  \App\FestivalProgrammer::where('festival_id',$id)->pluck('user_id')->toArray();
     $arr_two  =  \App\User::whereIn('id', $arr_one)->pluck('fullname')->toArray();

     return array_combine($arr_one, $arr_two);
}


function filmCategory()
{
	return[ 'Short Fiction','Feature Fiction','Short Documentary','Feature Documentary','Short Animation','Feature Animation','Experimental','Music Video' ];
}

function filmTeam()
{
      return [

                    'art_director' => 'Art Director',
                    'costume_designer' => 'Costume Designer',
                    'dop' => 'D.O.P ',
                    'editor' => 'Editor',
                    'executive_producer' => 'Executive Producer',
                    'graphic_designer' => 'Graphic Designer',
                    'lead_actor' => 'Lead Actor',
                    'lead_actress' => 'Lead Actress',
                    'music_composer' => 'Music Composer',
                    'sound_designer' => 'Sound Designer',
                    'sound_mixer' => 'Sound Mixer',
                    'vfx' => 'V.F.X',
                    'writer' => 'Writer',
      ];
}

function filmThemes()
{
	return[

            'Adolescence',
            'Alcohol',
            'Ancient',
            'Animals',
            'Archaeology',
            'Childhood',
            'Cinema Beur',
            'Cinema Verite',
            'Circus',
            'Climate Change',
            'Country Life',
            'Culture',
            'Cycling',
            'Dance',
            'Death',
            'Diary',
            'Direct Cinema',
            'Disability',
            'Dream',
            'Drugs',
            'Eat/Drink',
            'Ecology',
            'Emigration/Inmigration',
            'Employment',
            'Eroticism',
            'Family',
            'Film written by the director',
            'Freedom',
            'Hate',
            'Historical',
            'Homosexuality',
            'Humour',
            'Global Warming',
            'Identities',
            'Indian',
            'Journey',
            'Loneliness',
            'Love',
            'Macabre',
            'Mafia',
            'Music',
            'Minorities',
            'Nature',
            'Other',
            'political',
            'Politics',
            'Pollution',
            'Poverty',
            'Prison',
            'Queer Cinema',
            'Racism',
            'Relationship',
            'Religion',
            'Revenge',
            'School',
            'Sexuality',
            'Sports',
            'Terrorism',
            'Thievery',
            'Violence',
            'War',
            'Water Issues',
            'Women',

	 ];
}


function filmGenres()
{

    return[ 

                  'Action',
                  'Adventure',
                  'Art',
                  'Catastrophe',
                  'Children',
                  'Choreography',
                  'Comedy',
                  'Crime',
                  'Dance',
                  'Drama',
                  'Eroticism',
                  'Fantasy',
                  'Film Noir',
                  'Historical',
                  'Horror',
                  'Human Rights',
                  'Melodrama',
                  'Mockumentary',
                  'Musical',
                  'Other',
                  'Portrait',
                  'Psychological',
                  'Reality Recorder',
                  'Road Movie',
                  'Romantic',
                  'Science Fiction',
                  'Sexual',
                  'Silent Movie',
                  'Sports',
                  'Teen Movie',
                  'Thriller',
                  'Video Art',
                  'War Movie',
                  'Western',
                  'Wildlife Movie',

     ];
}


 function filmLangArray()
{
      return [
                  "No Dialogue",
                  'All Languages',
                  'Afar',
                  'Abkhazian',
                  'Afrikaans',
                  'Albanian',
                  'Amharic',
                  'Arabic',
                  'Aragonese',
                  'Armenian',
                  'Assamese',
                  'Aymara',
                  'Azerbaijani',
                  'Bashkir',
                  'Basque',
                  'Bengali(Bangla)',
                  'Bhutani',
                  'Bihari',
                  'Bislama',
                  'Breton',
                  'Bulgarian',
                  'Burmese',
                  'Byelorussian(Belarusian)',
                  'Catalan',
                  'Cherokee',
                  'Chewa',
                  'Chinese',
                  'Chinese (Simplified)',
                  'Chinese (Traditional)',
                  'Croatian',
                  'Czech',
                  'Danish',
                  'Divehi',
                  'Dutch',
                  'Edo',
                  'English',
                  'Esperanto',
                  'Estonian',
                  'Faeroese',
                  'Farsi',
                  'Fiji',
                  'Finnish',
                  'Flemish',
                  'French',
                  'Frisian',
                  'Fulfulde',
                  'Galician',
                  'Gaelic (Scottish)',
                  'Gaelic(Manx)',
                  'Georgian',
                  'German',
                  'Greek',
                  'Greenlandic',
                  'Guarani',
                  'Gujarati',
                  'Haitian Creole',
                  'Hausa',
                  'Hawaiian',
                  'Hebrew',
                  'Hindi',
                  'Hungarian',
                  'Ibibio',
                  'Icelandic',
                  'Ido',
                  'Igbo',
                  'Indonesian',
                  'Interlingua',
                  'Interlingue',
                  'Inuktitut',
                  'Inupiak',
                  'Irish',
                  'Italian',
                  'Japanese',
                  'Javanese',
                  'Kannada',
                  'Kanuri',
                  'Kashmiri',
                  'Kazakh',
                  'Kinyarwanda(Ruanda)',
                  'Kirghiz',
                  'Kirundi(Rundi)',
                  'Konkani',
                  'Korean',
                  'Kurdish',
                  'Laothian',
                  'Latin',
                  'Latvian (Lettish)',
                  'Limburgish( Limburger)',
                  'Lingala',
                  'Lithuanian',
                  'Macedonian',
                  'Malagasy',
                  'Malay',
                  'Malayalam',
                  'Maltese',
                  'Maori',
                  'Marathi',
                  'Moldavian',
                  'Mongolian',
                  'Nauru',
                  'Nepali',
                  'Norwegian',
                  'Occitan',
                  'Oriya',
                  'Oromo(Afaan Oromo)',
                  'Papiamentu',
                  'Pashto(Pushto)',
                  'Polish',
                  'Portuguese',
                  'Punjabi',
                  'Quechua',
                  'haeto-Romance',
                  'Romanian',
                  'Russian',
                  'Sami(Lappish)',
                  'Samoan',
                  'Sangro',
                  'Sanskrit',
                  'Serbian',
                  'Serbo-Croatian',
                  'Sesotho',
                  'Setswana',
                  'Shona',
                  'Sichuan Yi',
                  'Sindhi',
                  'Sinhalese',
                  'Siswati',
                  'Slovak',
                  'Slovenian',
                  'Somali',
                  'Spanish',
                  'Sundanese',
                  'Swahili(Kiswahili)',
                  'Swedish',
                  'Syriac',
                  'Tagalog',
                  'Tajik',
                  'Tamazight',
                  'Tamil',
                  'Tatar',
                  'Telugu',
                  'Thai',
                  'Tibetan',
                  'Tigrinya',
                  'Tonga',
                  'Tsonga',
                  'Turkish',
                  'Turkmen',
                  'Twi',
                  'Uighur',
                  'Ukrainian',
                  'Urdu',
                  'Uzbek',
                  'Venda',
                  'Vietnamese',
                  'Volapük',
                  'Wallon',
                  'Welsh',
                  'Wolof',
                  'Xhosa',
                  'Yi',
                  'Yiddish',
                  'Yoruba',
                  'Zulu',
                                                      

      ];
}


 function filmProfession()
{
      return [

      'Director',
      'Producer',
      'Writer',
      'Cinematographer',
      'Editor',
      'Actor/Actress',
      'Sound Designer/Mixer',
      'Music Composer',
      'Art Director',
      'Production Company ',
      'Distribution/Sales Company',
      'Festival Director',
      'Festival Programmer',
      'Animator',

      ];
}


 function profArray()
{
      return [

      'Director',
      'Producer',
      'Writer',
      'Cinematographer',
      'Editor',
      'Actor/Actress',
      'Sound Designer/Mixer',
      'Music Composer',
      'Art Director',
      'Production Company ',
      'Distribution/Sales Company',
      'Festival Director',
      'Festival Programmer',
      'Animator',

      ];
}


function countryTable()
{ 

       return[  
        'Afghanistan' => 'af',
        'Albania' => 'al',
        'Algeria' => 'dz',
        'American Samoa' => 'as',
        'Andorra' => 'ad',
        'Angola' => 'ao',
        'Anguilla' => 'ai',
        'Antarctica' => 'aq',
        'Antigua and Barbuda' => 'ag',
        'Argentina' => 'ar',
        'Armenia' => 'am',
        'Aruba' => 'aw',
        'Australia' => 'au',
        'Austria' => 'at',
        'Azerbaijan' => 'az',
        'Bahamas' => 'bs',
        'Bahrain' => 'bh',
        'Bangladesh' => 'bd',
        'Barbados' => 'bb',
        'Belarus' => 'by',
        'Belgium' => 'be',
        'Belize' => 'bz',
        'Benin' => 'bj',
        'Bermuda' => 'bm',
        'Bhutan' => 'bt',
        'Bolivia, Plurinational State of' => 'bo',
        'Bonaire, Sint Eustatius and Saba' => 'bq',
        'Bosnia and Herzegovina' => 'ba',
        'Botswana' => 'bw',
        'Bouvet Island' => 'bv',
        'Brazil' => 'br',
        'British Indian Ocean Territory' => 'io',
        'Brunei Darussalam' => 'bn',
        'Bulgaria' => 'bg',
        'Burkina Faso' => 'bf',
        'Burundi' => 'bi',
        'Cambodia' => 'kh',
        'Cameroon' => 'cm',
        'Canada' => 'ca',
        'Cape Verde' => 'cv',
        'Cayman Islands' => 'ky',
        'Central African Republic' => 'cf',
        'Chad' => 'td',
        'Chile' => 'cl',
        'China' => 'cn',
        'Christmas Island' => 'cx',
        'Cocos (Keeling) Islands' => 'cc',
        'Colombia' => 'co',
        'Comoros' => 'km',
        'Congo' => 'cg',
        'Congo, The Democratic Republic of the' => 'cd',
        'Cook Islands' => 'ck',
        'Costa Rica' => 'cr',
        'Cote d Ivoire ' => 'ci',
        ' Croatia ' => 'hr',
        ' Cuba ' => 'cu',
        ' Curacao ' => 'cw',
        ' Cyprus ' => 'cy',
        ' Czech Republic ' => 'cz',
        ' Denmark ' => 'dk',
        ' Djibouti ' => 'dj',
        ' Dominica ' => 'dm',
        ' Dominican Republic ' => 'do',
        ' Ecuador ' => 'ec',
        ' Egypt ' => 'eg',
        ' El Salvador ' => 'sv',
        ' Equatorial Guinea ' => 'gq',
        ' Eritrea ' => 'er',
        ' Estonia ' => 'ee',
        ' Ethiopia ' => 'et',
        ' Falkland Islands(Malvinas) ' => 'fk',
        ' Faroe Islands ' => 'fo',
        ' Fiji ' => 'fj',
        ' Finland ' => 'fi',
        ' France ' => 'fr',
        ' French Guiana ' => 'gf',
        ' French Polynesia ' => 'pf',
        ' French Southern Territories ' => 'tf',
        ' Gabon ' => 'ga',
        ' Gambia ' => 'gm',
        ' Georgia ' => 'ge',
        ' Germany ' => 'de',
        ' Ghana ' => 'gh',
        ' Gibraltar ' => 'gi',
        ' Greece ' => 'gr',
        ' Greenland ' => 'gl',
        ' Grenada ' => 'gd',
        ' Guadeloupe ' => 'gp',
        ' Guam ' => 'gu',
        ' Guatemala ' => 'gt',
        ' Guernsey ' => 'gg',
        ' Guinea ' => 'gn',
        ' Guinea - Bissau ' => 'gw',
        ' Guyana ' => 'gy',
        ' Haiti ' => 'ht',
        ' Heard Island and McDonald Islands ' => 'hm',
        ' Holy See(Vatican City State) ' => 'va',
        ' Honduras ' => 'hn',
        ' Hong Kong ' => 'hk',
        ' Hungary ' => 'hu',
        ' Iceland ' => 'is',
        ' India ' => 'in',
        ' Indonesia ' => 'id',
        ' Iran, Islamic Republic of ' => 'ir',
        ' Iraq ' => 'iq',
        ' Ireland ' => 'ie',
        ' Isle of Man ' => 'im',
        ' Italy ' => 'it',
        ' Jamaica ' => 'jm',
        ' Japan ' => 'jp',
        ' Jersey ' => 'je',
        ' Jordan ' => 'jo',
        ' Kazakhstan ' => 'kz',
        ' Kenya ' => 'ke',
        ' Kiribati ' => 'ki',
        ' Korea, Democratic People  s Republic of ' => 'kp',
        ' Korea, Republic of ' => 'kr',
        ' Kuwait ' => 'kw',
        ' Kyrgyzstan ' => 'kg',
        ' Lao People  s Democratic Republic ' => 'la',
        ' Latvia ' => 'lv',
        ' Lebanon ' => 'lb',
        ' Lesotho ' => 'ls',
        ' Liberia ' => 'lr',
        ' Libyan Arab Jamahiriya ' => 'ly',
        ' Liechtenstein ' => 'li',
        ' Lithuania ' => 'lt',
        ' Luxembourg ' => 'lu',
        ' Macao ' => 'mo',
        ' Macedonia, The former Yugoslav Republic of ' => 'mk',
        ' Madagascar ' => 'mg',
        ' Malawi ' => 'mw',
        ' Malaysia ' => 'my',
        ' Maldives ' => 'mv',
        ' Mali ' => 'ml',
        ' Malta ' => 'mt',
        ' Marshall Islands ' => 'mh',
        ' Martinique ' => 'mq',
        ' Mauritania ' => 'mr',
        ' Mauritius ' => 'mu',
        ' Mayotte ' => 'yt',
        ' Mexico ' => 'mx',
        ' Micronesia, Federated States of ' => 'fm',
        ' Moldova, Republic of ' => 'md',
        ' Monaco ' => 'mc',
        ' Mongolia ' => 'mn',
        ' Montenegro ' => 'me',
        ' Montserrat ' => 'ms',
        ' Morocco ' => 'ma',
        ' Mozambique ' => 'mz',
        ' Myanmar ' => 'mm',
        ' Namibia ' => 'na',
        ' Nauru ' => 'nr',
        ' Nepal ' => 'np',
        ' Netherlands ' => 'nl',
        ' New Caledonia ' => 'nc',
        ' New Zealand ' => 'nz',
        ' Nicaragua ' => 'ni',
        ' Niger ' => 'ne',
        ' Nigeria ' => 'ng',
        ' Niue ' => 'nu',
        ' Norfolk Island ' => 'nf',
        ' Northern Mariana Islands ' => 'mp',
        ' Norway ' => 'no',
        ' Oman ' => 'om',
        ' Pakistan ' => 'pk',
        ' Palau ' => 'pw',
        ' Palestine ' => 'ps',
        ' Panama ' => 'pa',
        ' Papua New Guinea ' => 'pg',
        ' Paraguay ' => 'py',
        ' Peru ' => 'pe',
        ' Philippines ' => 'ph',
        ' Pitcairn ' => 'pn',
        ' Poland ' => 'pl',
        ' Portugal ' => 'pt',
        ' Puerto Rico ' => 'pr',
        ' Qatar ' => 'qa',
        ' Reunion ' => 're',
        ' Romania ' => 'ro',
        ' Russian Federation ' => 'ru',
        ' Rwanda ' => 'rw',
        ' Saint Barthelemy ' => 'bl',
        ' Saint Helena, Ascension and Tristan Da Cunha ' => 'sh',
        ' Saint Kitts and Nevis ' => 'kn',
        ' Saint Lucia ' => 'lc',
        ' Saint Martin(French Part) ' => 'mf',
        ' Saint Pierre and Miquelon ' => 'pm',
        ' Saint Vincent and The Grenadines ' => 'vc',
        ' Samoa ' => 'ws',
        ' San Marino ' => 'sm',
        ' Sao Tome and Principe ' => 'st',
        ' Saudi Arabia ' => 'sa',
        ' Senegal ' => 'sn',
        ' Serbia ' => 'rs',
        ' Seychelles ' => 'sc',
        ' Sierra Leone ' => 'sl',
        ' Singapore ' => 'sg',
        ' Sint Maarten(Dutch Part) ' => 'sx',
        ' Slovakia ' => 'sk',
        ' Slovenia ' => 'si',
        ' Solomon Islands ' => 'sb',
        ' Somalia ' => 'so',
        ' South Africa ' => 'za',
        ' South Georgia and The South Sandwich Islands ' => 'gs',
        ' South Sudan ' => 'ss',
        ' Spain ' => 'es',
        ' Sri Lanka ' => 'lk',
        ' Sudan ' => 'sd',
        ' Suriname ' => 'sr',
        ' Svalbard and Jan Mayen ' => 'sj',
        ' Swaziland ' => 'sz',
        ' Sweden ' => 'se',
        ' Switzerland ' => 'ch',
        ' Syrian Arab Republic ' => 'sy',
        ' Taiwan, Province of China ' => 'tw',
        ' Tajikistan ' => 'tj',
        ' Tanzania, United Republic of ' => 'tz',
        ' Thailand ' => 'th',
        ' Timor - Leste ' => 'tl',
        ' Togo ' => 'tg',
        ' Tokelau ' => 'tk',
        ' Tonga ' => 'to',
        ' Trinidad and Tobago ' => 'tt',
        ' Tunisia ' => 'tn',
        ' Turkey ' => 'tr',
        ' Turkmenistan ' => 'tm',
        ' Turks and Caicos Islands ' => 'tc',
        ' Tuvalu ' => 'tv',
        ' Uganda ' => 'ug',
        ' Ukraine ' => 'ua',
        ' United Arab Emirates ' => 'ae',
        ' United Kingdom ' => 'gb',
        ' United States ' => 'us',
        ' United States Minor Outlying Islands ' => 'um',
        ' Uruguay ' => 'uy',
        ' Uzbekistan ' => 'uz',
        ' Vanuatu ' => 'vu',
         ' Vietnam '=> 'vnm',
        ' Venezuela, Bolivarian Republic of ' => 've',
        ' Wallis and Futuna ' => 'wf',
        ' Western Sahara ' => 'eh',
        ' Yemen ' => 'ye',
        ' Zambia ' => 'zm',
        ' Zimbabwe ' => 'zw',
      ];
}

?>