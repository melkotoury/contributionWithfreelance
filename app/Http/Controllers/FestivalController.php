<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Film;
use App\User;
use App\Filmmaker;
use App\Festival;
use App\FestivalCompetetion;
use App\CompetetoinCategory;
use App\FestivalEdition;
use App\FestivalProgrammer;
use App\Folder;
use App\Move;
use App\Copy;
use App\Vote;
use Auth;
use Hash;
use DB;
use Session;
use Mail;
use Image;




class FestivalController extends Controller
{




    public function showSubmitted(Request $request)
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

            if (!$festival->competetions()->first()) {

              return view('no_competition_submitted_films');

            }

            $comp     = $festival->competetions()->first();
            $sub      = \App\FilmSubmit::where('competetion_id',$comp->id)->get();
            $films    =  $sub->pluck('film_id');

            $moved    = \App\Move::where('festival_id',$festival->id)->pluck('film_id');
            $films    = \App\Film::whereIn('id',$films)
                                 ->whereNotIn('id',$moved)->paginate(5);

            if ($request->ajax()) {

               $view = view('layouts.film',compact('films','festival'))->render();
               return response()->json(['html'=>$view]);
            }

            $folders = $festival->folders()->where('sub',0)->get();


            return view('submitted_films',compact('films','festival','folders','moved'));

       }
    }

    ///////////////////////////////////////////////////////////////////////////////

    public function addProgrammer()
    {
       return view('programmers');
    }


    //////////////////////////////////////////////////////////////////////////////

    public function addPostProgrammer(Request $request)
    {


       $this->validate($request, [
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|alpha_dash|min:3|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
       ]);

       if (in_array($request->username, filmnames())) {

             return response()->json(['done'=>'unique']);
       }




       $user = new User();
       $user->fullname = $request->fullname;
       $user->username = $request->username;
       $user->email = $request->email;
       $user->confirmed = 1;
       $user->type = 'festival_programmer';
       $user->password = bcrypt($request->password);
       $user->save();

       $prog = new FestivalProgrammer();
       $prog->user_id     = $user->id;
       $prog->festival_id = User::showFestival(Auth::user()->username)->id;
       $prog->save();

       return response()->json(['success'=>'true']);

    }


   ///////////////////////////////////////////////////////////////////////////////

    public function showEditions()
    {
        $festival = \App\User::showFestival(Auth::user()->username);
        $editions = \App\FestivalEdition::where('festival_id',$festival->id)->get();

       return view('editions.editions',compact('editions','festival'));
    }

    //////////////////////////////////////////////////////////////////////

    public function showEditionDetails($id)
    {

        $edition  = \App\FestivalEdition::find($id);
        $user_id  = \App\Festival::find($edition->festival_id)->user_id;
        $username = \App\User::find($user_id)->username;
        $festival = \App\User::showFestival($username);

       return view('editions.edition_details',compact('edition','festival'));
    }

    //////////////////////////////////////////////////////////////////

    public function addPoster(Request $request, $id =null)
    {

        $this->validate($request, [

            'edition_poster' => 'required|image|mimes:jpeg,jpg,bmp,png',

        ]);

        if ($id == null) {

            $id = Session::get('add_edition');

        }

        $path  = 'images/festivaledition';

        if ($request->file('edition_poster')) {
            $edition_poster         = $request->file('edition_poster');
            $edition_poster_name     = str_random(15).'.'.$edition_poster->getClientOriginalExtension();
            $edition_poster->move($path,$edition_poster_name);
        }




        $edition = \App\FestivalEdition::find($id);
        $edition->edition_poster = $edition_poster_name;

        $edition->save();

        return response()->json(['success'=>'done']);


    }

    ////////////////////////////////////////////////////////////////////////

    public function addEdition()
    {

       $festival = \App\User::showFestival(Auth::user()->username);
       return view('editions.add_edition',compact('festival'));
    }


    //////////////////////////////////////////////////////////////////////

    public function postAddEdition(Request $request)
    {


           $this->validate($request, [

                  'edition_number' => 'required|numeric',
                  'jury'           => 'required',
                  'edition_year'   => 'required|numeric',
                  'edition_poster' => 'required|image|mimes:jpeg,jpg,bmp,png',

             ]);


          ini_set('memory_limit', '-1');

          $file         = $request->file('edition_poster');
          $path         = 'images/festivals';
          $filename     = str_random(15).'.'.$file->getClientOriginalExtension();
          $file->move($path,$filename);


          $path = 'images/festivals/'.$filename;


          // edition teaser view
          $teaserview = 'images/editions/teaserview';
          $background = Image::canvas(81, 121);
          $image = Image::make($path)->resize(81, 121, function ($c) {
              $c->aspectRatio();
              $c->upsize();
          });

          $background->insert($image, 'center');
          $background->save($teaserview.'/'.$filename);


          // edition full view
          $fullview   = 'images/editions/profileview';
          $background = Image::canvas(140, 209);
          $image = Image::make($path)->resize(140, 209, function ($c) {
              $c->aspectRatio();
              $c->upsize();
          });

          $background->insert($image, 'center');
          $background->save($fullview.'/'.$filename);




           $edition = new FestivalEdition();

           $edition->number         = $request->edition_number ;
           $edition->awards         = $request->awards ;
           $edition->edition_poster = $path ;
           $edition->year           = $request->edition_year ;
           $edition->path           = $filename ;
           $edition->jury           = $request->jury ;
           $edition->selections     = $request->selections ;
           $edition->festival_id    = Festival::where('user_id',Auth::user()->id)->first()->id ;
           $edition->save();

           return response()->json(['success'=>'true']);

    }

///////////////////////////////////////////////////////////////////////////////

    public function editEdition($id)
    {

       $festival = \App\User::showFestival(Auth::user()->username);
       $edition = FestivalEdition::find($id);

       return view('editions.edit_edition',compact('edition','festival'));
    }

/////////////////////////////////////////////////////////////////////////////

    public function postEditEdition(Request $request,$id)
    {

           $this->validate($request, [

                  'edition_number' => 'required|numeric',
                  'jury'           => 'required',
                  'edition_year'   => 'required|numeric',
                  'edition_poster' => 'image|mimes:jpeg,jpg,bmp,png',

             ]);


          if ($request->file('edition_poster')) {

          ini_set('memory_limit', '-1');


          $file         = $request->file('edition_poster');
          $path         = 'images/festivals';
          $filename     = str_random(15).'.'.$file->getClientOriginalExtension();
          $file->move($path,$filename);


          $path = 'images/festivals/'.$filename;


          // edition teaser view
          $teaserview = 'images/editions/teaserview';
          $background = Image::canvas(81, 121);
          $image = Image::make($path)->resize(81, 121, function ($c) {
              $c->aspectRatio();
              $c->upsize();
          });

          $background->insert($image, 'center');
          $background->save($teaserview.'/'.$filename);


          // edition full view
          $fullview   = 'images/editions/profileview';
          $background = Image::canvas(140, 209);
          $image = Image::make($path)->resize(140, 209, function ($c) {
              $c->aspectRatio();
              $c->upsize();
          });

          $background->insert($image, 'center');
          $background->save($fullview.'/'.$filename);




          }



           $edition = FestivalEdition::find($id);
           $edition->number         = $request->edition_number ;
           $edition->awards         = $request->awards ;

           if ($request->file('edition_poster')) {

           $edition->edition_poster = $path ;
           $edition->path           = $filename ;

           }

           $edition->year           = $request->edition_year ;
           $edition->jury           = $request->jury ;
           $edition->selections     = $request->selections ;
           $edition->save();

           return response()->json(['success'=>'true']);
    }


//////////////////////////////////////////////////////////////

    public function deleteEdition($id)
    {
       $film = FestivalEdition::find($id);
       $film->delete();

       return response()->json(['sucsess'=>'true']);
    }


////////////////////////////////////////////////////////////////////////////////
  // post sign up
  // form one
	public function postSignup(Request $request)
	{

    $messsages = array(
        'username.required'=>'You cant leave Profile ID empty',
        'username.min'=>'The Profile ID has to be :min chars long',
        'username.unique'=>'The Profile ID has already been taken.',
        'username.max'=>'The Profile ID may not be greater than :max characters',
        'username.alpha_dash'=>'The Profile ID should not contain spaces .',
    );

       $this->validate($request, [
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|min:3|alpha_dash|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
       ],$messsages);

       if (in_array($request->username, filmnames())) {

             return response()->json(['done'=>'unique']);
       }


       $data = [

          'fullname' => $request->fullname,
          'username' => $request->username,
          'email' => $request->email,
          'type' => 'festival',
          'password' => bcrypt($request->password),

       ];




       // first array data
       Session::set('data_festival', $data);


//       Session::set('festival_id', $festival->id);

      return response()->json(['done'=>'true']);


  }


 //////////////////////////////////////////////////////////////////

  public function postSignupTwo(Request $request)
  {

/*      ini_set('max_execution_time', 300);
      ini_set('post_max_size', '64M');
      ini_set('upload_max_filesize', '64M');
      ini_set('max_input_time', 300);
      ini_set('memory_limit', '64M');
*/

       $this->validate($request, [

            'photo' => 'required|image|mimes:jpeg,jpg,bmp,png|max:10000',
            'address' => 'required',
            'edition' => 'required',
            'city' => 'required',
            'phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
            'country' => 'required',
            'categories_name' => 'required',

       ]);

       ini_set('memory_limit', '-1');


        $file         = $request->file('photo');
        $path         = 'images/festivals';
        $filename     = str_random(15).'.'.$file->getClientOriginalExtension();


        $background = Image::canvas(180, 120);
        $image = Image::make($request->file('photo'))->resize(180, 120, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/'.$filename);



        /* start image */
        $background = Image::canvas(80, 104);
        $image = Image::make($request->file('photo'))->resize(80, 104, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/profiles/'.$filename);
        /* end image */



        /* start image */
        $background = Image::canvas(300, 300);
        $image = Image::make($request->file('photo'))->resize(300, 300, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/square/'.$filename);
        /* end image */


/*
       $festival = Festival::where('user_id',Session::get('festival_signup'))->first();

       $festival->logo_url   = $filename;
       $festival->address    = $request->address;
       $festival->city       = $request->city;
       $festival->country    = $request->country;
       $festival->phone      = $request->phone;
       $festival->edition    = $request->edition;
       $festival->film_type  = json_encode($request->categories_name);

       $festival->save();
       */

       $data = [

            'filename' => $filename,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'phone' => $request->phone,
            'edition' => $request->edition,
            'film_type' => json_encode($request->categories_name),
       ];



       // first array data
       Session::set('data_festival_two', $data);


      return response()->json(['done'=>'true']);


  }


  //////////////////////////////////////////////////////////////////////

  public function postSignupThree(Request $request)
  {

        $messsages = array(
        'linkedin_url.active_url'=>'Please add a valid twitter link',
    );



       $this->validate($request, [

            'biography' => 'min:6',
            'awards' => 'min:6',
            'team' => 'min:6',
            'website_url'=>'active_url',
            'facebook_url' => 'active_url',
            'linkedin_url' => 'active_url',
            'instagram_url' => 'active_url',
            'youtube_url' => 'active_url',
            'vimeo_url' => 'active_url',
            'imdb_url' => 'active_url',


       ],$messsages);

       $data_one = Session::get('data_festival');
       $data_two = Session::get('data_festival_two');


       $user = new User();
       $user->fullname = $data_one['fullname'];
       $user->username = $data_one['username'];
       $user->email = $data_one['email'];
       $user->type = 'festival';
       $user->password = $data_one['password'];
       $user->save();


      $festival = new Festival();
      $festival->user_id = $user->id;

      $festival->logo_url   = $data_two['filename'];
      $festival->address    = $data_two['address'];
      $festival->city       = $data_two['city'];
      $festival->country    = $data_two['country'];
      $festival->phone      = $data_two['phone'];
      $festival->edition    = $data_two['edition'];
      $festival->film_type  = $data_two['film_type'];

      $festival->biography      = $request->biography;
      $festival->awards         = $request->awards;
      $festival->team           = $request->team;
      $festival->website_url    = $request->website_url;
      $festival->facebook_url   = $request->facebook_url;
      $festival->linkedin_url    = $request->linkedin_url;
      $festival->instagram_url  = $request->instagram_url;
      $festival->youtube_url    = $request->youtube_url;
      $festival->vimeo_url      = $request->vimeo_url;
      $festival->imdb_url       = $request->imdb_url;

      $festival->save();


      $confirmation_code = str_random(30);

      $user = User::find($user->id);
      $user->confirmation_code  = $confirmation_code ;
      $user->save();




       Session::set('festival_signup', $festival->id);



       $to = $data_one['email'];

       Mail::send('emails.reminder', ['confirmation_code' => $confirmation_code], function($message) use($to)
            {
                $message->from('info@iamafilm.com', 'Confirmation');
                $message->to($to)->subject('Confirmation');

        });



      return response()->json(['done'=>'true']);

  }


  ///////////////////////////////////////////////////////////////////////////

  public function addCompetition(Request $request)
  {

           $this->validate($request, [

            'comp_name' => 'required|min:2',
            'student_only' => 'required',
            'film_categories' => 'required',
            'countries' => 'required',
            'film_languages' => 'required',
            'fees' => 'numeric|required',
            'production_date' => 'required',
            'deadline' => 'required',
            'submission_begins' => 'required',
            'requirements' => 'min:2',
            'film_lang_subtitle' => 'required',

       ]);
//dd(Festival::where('user_id',Auth::user()->id)->first()->id);
       $deadline  = date("Y-m-d", strtotime($request->deadline));
       $begins    = date("Y-m-d", strtotime($request->submission_begins));
       $comp_from = date("Y-m-d", strtotime($request->comp_from));
       $comp_to   = date("Y-m-d", strtotime($request->comp_to));

       if ($begins > $deadline) {

         return response()->json('dead');

       }


       if ($comp_from > $comp_to) {

         return response()->json('comp_from');

       }



      $festival = new FestivalCompetetion();

      $festival->comp_name    = $request->comp_name;
      $festival->student_only          = $request->student_only;
      $festival->film_categories       = json_encode($request->film_categories);
      $festival->countries             = json_encode($request->countries);
      $festival->film_themes           = json_encode($request->film_themes);
      $festival->film_genres           = json_encode($request->film_genres);
      $festival->film_languages        = json_encode($request->film_languages);
      $festival->accepted_regions      = json_encode($request->accepted_regions);
      $festival->requirements          = $request->requirements;
      $festival->fees                  = $request->fees;
      $festival->max_duration          = $request->max_duration;
      $festival->deadline              = date("Y-m-d", strtotime($request->deadline));
      $festival->comp_from             = date("Y-m-d", strtotime($request->comp_from));
      $festival->comp_to               = date("Y-m-d", strtotime($request->comp_to));
      $festival->production_date= date("Y-m-d", strtotime($request->production_date));
      $festival->submission_begins= date("Y-m-d", strtotime($request->submission_begins));
      $festival->film_lang_subtitle= json_encode($request->film_lang_subtitle);

       if (Auth::check() && Auth::user()->type == 'festival') {
         $festival->festival_id    = Festival::where('user_id',Auth::user()->id)->first()->id;
       }else{
         $festival->festival_id    = Session::get('festival_signup');
       }

       $festival->save();



       //categories table
       if (count($request->film_categories) > 0) {


            if (in_array('all', $request->film_categories)) {

              $film_cat = new CompetetoinCategory();
              $film_cat->name = 'all';
              $film_cat->competetion_id = $festival->id;
              $film_cat->save();

            } else {

              foreach ($request->film_categories as  $value) {

              $film_cat = new CompetetoinCategory();
              $film_cat->name = $value;
              $film_cat->competetion_id = $festival->id;
              $film_cat->save();

               }

            }

       }
       //end categories table


       $data = view('partials.competetion',['id'=>$festival->id ,'comp_name'=>$festival->comp_name ,'student_only'=>$festival->student_only ,'film_categories'=>$festival->film_categories ,'film_themes'=>$festival->film_themes ,'film_genres'=>$festival->film_genres ,'deadline'=>$festival->deadline ,'fees'=>$festival->fees ,'submission_begins'=>$festival->submission_begins ,'countries'=>$festival->countries])->render();

        if(!empty($data))
        {
        return response()->json($data);
        }else{
        return response()->json('false');
        }


  }


  /////////////////////////////////////////////////////////////

  public function editComp($id)
  {

     $comp = FestivalCompetetion::find($id);

      return view('edit_competetion',compact('comp'));

  }

//////////////////////////////////////////////////////////////

public function postEditComp(Request $request,$id)
{

           $this->validate($request, [

            'comp_name' => 'required|min:2',
            'student_only' => 'required',
            'fees' => 'numeric|required',
            'film_categories' => 'required',
            'max_duration' => 'required|numeric',
            'deadline' => 'required',
            'production_date' => 'required',
            'countries' => 'required',
            'film_languages' => 'required',
            'submission_begins' => 'required',
            'requirements' => 'min:2',
            'film_lang_subtitle' => 'required',

       ]);


       $deadline  = date("Y-m-d", strtotime($request->deadline));
       $begins    = date("Y-m-d", strtotime($request->submission_begins));
       $comp_from = date("Y-m-d", strtotime($request->comp_from));
       $comp_to   = date("Y-m-d", strtotime($request->comp_to));

       if ($begins > $deadline) {

         return response()->json('dead');

       }


       if ($comp_from > $comp_to) {

         return response()->json('comp_from');

       }



      $festival =  FestivalCompetetion::find($id);

      $festival->comp_name    = $request->comp_name;
      $festival->student_only        = $request->student_only;
      $festival->countries           = json_encode($request->countries);
      $festival->film_categories     = json_encode($request->film_categories);
      $festival->film_themes         = json_encode($request->film_themes);
      $festival->film_genres         = json_encode($request->film_genres);
      $festival->film_languages      = json_encode($request->film_languages);
      $festival->accepted_regions    = json_encode($request->accepted_regions);
      $festival->max_duration        = $request->max_duration;
      $festival->deadline              = date("Y-m-d", strtotime($request->deadline));
      $festival->comp_from             = date("Y-m-d", strtotime($request->comp_from));
      $festival->comp_to               = date("Y-m-d", strtotime($request->comp_to));
      $festival->production_date= date("Y-m-d", strtotime($request->production_date));
      $festival->submission_begins= date("Y-m-d", strtotime($request->submission_begins));
      $festival->requirements        = $request->requirements;
      $festival->fees                = $request->fees;
      $festival->film_lang_subtitle  = json_encode($request->film_lang_subtitle);

       if (Auth::check() && Auth::user()->type == 'festival') {
         $festival->festival_id    = Festival::where('user_id',Auth::user()->id)->first()->id;
       }else{
         $festival->festival_id    = Session::get('festival_signup');
       }

       $festival->save();


       //categories table
       if (count($request->film_categories) > 0) {

          $cat = \App\CompetetoinCategory::where('competetion_id',$id);
          $cat->delete();

            if (in_array('all', $request->film_categories)) {

              $film_cat = new CompetetoinCategory();
              $film_cat->name = 'all';
              $film_cat->competetion_id = $festival->id;
              $film_cat->save();

            } else {

              foreach ($request->film_categories as  $value) {

              $film_cat = new CompetetoinCategory();
              $film_cat->name = $value;
              $film_cat->competetion_id = $festival->id;
              $film_cat->save();

             }

          }

       }
       //end categories table


       $data = view('partials.competetion',['id'=>$festival->id ,'comp_name'=>$festival->comp_name ,'student_only'=>$festival->student_only ,'film_categories'=>$festival->film_categories ,'film_themes'=>$festival->film_themes ,'film_genres'=>$festival->film_genres ,'deadline'=>$festival->deadline,'submission_begins'=>$festival->submission_begins ,'fees'=>$festival->fees ,'countries'=>$festival->countries])->render();

        if(!empty($data))
        {
        return response()->json(['data'=>$data,'id'=>$festival->id]);
        }else{
        return response()->json('false');
        }

}

/////////////////////////////////////////////////////////////////

  public function deleteComp($id)
  {
     $comp = FestivalCompetetion::find($id);
     $comp->delete();

     return response()->json(['success'=>'true']);
  }

/////////////////////////////////////////////////////////////////////

  public function postEditProfile($username, Request $request)
    {

        $messsages = array(
        'linkedin_url.active_url'=>'Please add a valid twitter link',
        );

       $this->validate($request, [

          'fullname' => 'required|min:2|max:255',
          'email' => 'required|email|max:255',
          'username' => 'required|alpha_dash|min:2|max:255',
          'phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
          'edition' => 'required',
          'biography' => 'min:6',
          'film_type' => 'required',
          'address' => 'required',
          'city' => 'required',
          'country' => 'required',
          'team' => 'min:3',
          'awards' => 'min:3',
          'website_url'=>'active_url',
          'facebook_url' => 'active_url',
          'linkedin_url' => 'active_url',
          'instagram_url' => 'active_url',
          'youtube_url' => 'active_url',
          'vimeo_url' => 'active_url',
          'imdb_url' => 'active_url',

       ],$messsages);


           $user = User::where('username',$username)->first();

         if (\App\User::where('email',$request->email)->count() > 0 && $user->email != $request->email)
            {


             \Session::flash('unique_email', 'prok!');
            return redirect()->back()->with('success', 'this email already has been token.');

           }elseif (\App\User::where('username',$request->username)->count() > 0 && $user->username != $request->username) {

             \Session::flash('unique_username', 'prok!');
            return redirect()->back()->with('success', 'this Profile ID already has been token.');

           }else{

             $user = \App\User::where('username',$username)->first();
             $user->fullname = $request->fullname;
             $user->username = $request->username;
             $user->email = $request->email;
             $user->save();


            $festival = Festival::where('user_id',$user->id)->first();
            $festival->biography            = $request->biography;
            $festival->awards               = $request->awards;
            $festival->edition              = $request->edition;
            $festival->team                 = $request->team;
            $festival->phone                = $request->phone;

            $festival->film_type            = json_encode($request->film_type);
            $festival->address              = $request->address;
            $festival->city                 = $request->city;
            $festival->country              = $request->country;

            $festival->website_url = $request->website_url;
            $festival->facebook_url = $request->facebook_url;
            $festival->linkedin_url = $request->linkedin_url;
            $festival->instagram_url = $request->instagram_url;
            $festival->youtube_url = $request->youtube_url;
            $festival->vimeo_url = $request->vimeo_url;
            $festival->imdb_url = $request->imdb_url;


            $festival->save();

           }

        \Session::flash('update', 'prok!');

        return redirect()->back();
    }


   ////////////////////////////////////////////////////////////////////////////

      public function postEditPhoto($username,Request $request)
      {

         $this->validate($request, [

            'photo' => 'required|image|mimes:jpeg,jpg,bmp,png',

         ]);


         ini_set('memory_limit', '-1');

        $file         = $request->file('photo');
        $path         = 'images/festivals';
        $filename     = str_random(15).'.'.$file->getClientOriginalExtension();


        $background = Image::canvas(180, 120);
        $image = Image::make($request->file('photo'))->resize(180, 120, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/'.$filename);



        /* start image */
        $background = Image::canvas(80, 104);
        $image = Image::make($request->file('photo'))->resize(80, 104, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/profiles/'.$filename);
        /* end image */



        /* start image */
        //$background = Image::canvas(300, 300);
        $image = Image::make($request->file('photo'));

        //$background->insert($image, 'center');
        $image->save($path.'/square/'.$filename);
        /* end image */





       $film_maker = Festival::where('user_id',Auth::user()->id)->first();

       $film_maker->logo_url        = $filename;

       $film_maker->save();


       \Session::flash('update', 'prok!');

        return redirect()->back();


      }


    ///////////////////////////////////////////////////////////////////////////


    public function showMap(Request $request)
    {
          $array = [];

          foreach (array_keys(countryTable()) as $key => $value) {

            $array[] =  \App\Festival::where('country',$value)->count();
          }

          $array = array_combine(array_values(countryTable()), $array);
          return response()->json(['data' => $array]);

    }

//lol
   /////////////////////////////////////////////////////////////////////////////

    public function showComp($id)
    {

       $comp = \App\FestivalCompetetion::find($id);
       $fest = \App\Festival::find($comp->festival_id);
       $html = view('partials.comp_teaser',compact('comp','fest'))->render();



        if ($comp->submission_begins > date("Y-m-d")) {

              $sub_date = 'true';

        }else {

              $sub_date = 'false';
        }


        /* start check film submission_begins  */
        if ($comp->deadline < date("Y-m-d")) {

            $disabled = 'true';

          }else {

             $disabled = 'false';

          }

          $submitted = checkFilmSubmission($id);

       return response()->json(['id'=>$id,'html'=>$html,'disabled'=>$disabled,
                                                        'submitted'=>$submitted,
                                                        'sub_date'=>$sub_date]);
    }

  //////////////////////////////////////////////////////////////////////

  public function addFolder(Request $request, $id)
    {

         $this->validate($request, [

             'en_name' => 'required|min:2',


         ]);

       $festival = \App\Festival::find($id);
       $folder = new \App\Folder();
       $folder->en_name     = $request->en_name;

       if ($request->parent == 0 || $request->parent == null) {
       $folder->sub         = 0;
       }else{
       $folder->sub         = 1;
       }

       if ($request->parent) {
       $folder->parent      = $request->parent;
       }

       $folder->festival_id = $id;
       $folder->save();




           if (Auth::user()->type == 'festival') {

              $festival = \App\User::showFestival(Auth::user()->username)->id;

           }

            if (Auth::user()->type == 'festival_programmer') {

              $festival = \App\FestivalProgrammer::where('user_id',Auth::user()->id)
                                                 ->first()->festival_id;

           }

            $festival = \App\Festival::find($festival);
            $folders = $festival->folders()->where('sub',0)->get();


            if (count($folders) > 0) {

                 if ($folder->sub == 1) {

                    $view = view('partials.folders',compact('folders'))->render();
                    return response()->json(['sub'=>'true','name'=>$folder->en_name,'id'=>$folder->id,'html'=>$view]);

                 }


                 if ($folder->sub == 0) {

                    $view = view('partials.folders',compact('folders'))->render();
                    return response()->json(['sub'=>'false','name'=>$folder->en_name,'id'=>$folder->id,'html'=>$view]);
                 }

            }


    }


 //////////////////////////////////////////////////////////////////////////////


    public function moveFilm(Request $request)
    {



        if (!\App\Move::where(['film_id'=>$request->film_id,
                               'folder_id'=>$request->folder_name])->exists()) {

           if ($request->folder_name == 0) {



           } else {

             $mv = new Move();
             $mv->film_id = $request->film_id;
             $mv->folder_id = $request->folder_name;
             $mv->festival_id = $request->festival_id;
             $mv->save();

           }



           // if film copied in new folder
            if (\App\Copy::where(['film_id'=>$request->film_id,
                               'folder_id'=>$request->folder_name])->exists()) {

              $film = \App\Copy::where(['film_id'=>$request->film_id,
                               'folder_id'=>$request->folder_name])->first();
              $film->delete();
            }



           // check  if folder exist
           if ($request->folder_id != 0) {

             // if film copied in old folder == delete it
              if (\App\Copy::where(['film_id'=>$request->film_id,
                                 'folder_id'=>$request->folder_id])->exists()) {

                $film = \App\Copy::where(['film_id'=>$request->film_id,
                                 'folder_id'=>$request->folder_id])->first();
                $film->delete();
              }

             // if film moved in old folder == delete it
              if (\App\Move::where(['film_id'=>$request->film_id,
                                 'folder_id'=>$request->folder_id])->exists()) {

                $film = \App\Move::where(['film_id'=>$request->film_id,
                                 'folder_id'=>$request->folder_id])->first();
                $film->delete();
              }

            }






           // check  if he wants to move to home
           if ($request->folder_name == 0) {

             // if film copied in old folder == delete it
              if (\App\Copy::where(['film_id'=>$request->film_id,
                                 'folder_id'=>$request->folder_id])->exists()) {

                $film = \App\Copy::where(['film_id'=>$request->film_id,
                                 'folder_id'=>$request->folder_id])->first();
                $film->delete();
              }

             // if film moved in old folder == delete it
              if (\App\Move::where(['film_id'=>$request->film_id,
                                 'folder_id'=>$request->folder_id])->exists()) {

                $film = \App\Move::where(['film_id'=>$request->film_id,
                                 'folder_id'=>$request->folder_id])->first();
                $film->delete();
              }

            }




           if (Auth::user()->type == 'festival') {

              $festival = \App\User::showFestival(Auth::user()->username)->id;

           }

            if (Auth::user()->type == 'festival_programmer') {

              $festival = \App\FestivalProgrammer::where('user_id',Auth::user()->id)
                                                 ->first()->festival_id;

           }

            $festival = \App\Festival::find($festival);
            $folders = $festival->folders()->where('sub',0)->get();
            $view = view('partials.folders',compact('folders'))->render();



          return response()->json(['success'=>'true','html'=>$view,'id'=>$request->film_id]);

        }

           return response()->json(['success'=>'false','id'=>$request->film_id]);

    }

 //////////////////////////////////////////////////////////////////////////////

    public function statusFilm(Request $request)
    {

       if (\App\FilmSubmit::where(['film_id'=>$request->film_id ,
                            'festival_id'=>$request->festival_id])->exists())
          {
                $sub = \App\FilmSubmit::where(['film_id'=>$request->film_id,
                            'festival_id'=>$request->festival_id])->first();

                $sub->selected = $request->status;

                $sub->save();

                return response()->json(['success'=>'true']);

            }else{

              return response()->json(['success'=>'false']);

            }



   }

/////////////////////////////////////////////////////////////////////////////

    public function copyFilm(Request $request)
    {

        if (!\App\Copy::where(['film_id'=>$request->film_id,'folder_id'=>$request->folder_name])
                                        ->exists()) {

           $mv = new Copy();
           $mv->film_id = $request->film_id;
           $mv->folder_id = $request->folder_name;
           $mv->festival_id = $request->festival_id;
           $mv->save();



           if (Auth::user()->type == 'festival') {

              $festival = \App\User::showFestival(Auth::user()->username)->id;

           }

            if (Auth::user()->type == 'festival_programmer') {

              $festival = \App\FestivalProgrammer::where('user_id',Auth::user()->id)
                                                 ->first()->festival_id;

           }

            $festival = \App\Festival::find($festival);
            $folders = $festival->folders()->where('sub',0)->get();
            $view = view('partials.folders',compact('folders'))->render();



           return response()->json(['success'=>'true','html'=>$view,'id'=>$request->film_id]);

        }

           return response()->json(['success'=>'false','id'=>$request->film_id]);

    }

 /////////////////////////////////////////////////////////////////////////////////

    public function searchFilm(Request $request)
    {



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
            $sub      = \App\FilmSubmit::whereIn('competetion_id',$comp)->get();
            $films    =  $sub->pluck('film_id');
            $moved    = \App\Move::where('festival_id',$festival->id)->pluck('film_id');


          $query = DB::table('films')->select('*');

      if ($request->country && $request->country != '0') {

          $query->where('production_country', 'like', '%'.$request->country.'%');

       }



      if ($request->genre) {

          $genre = array_unique(\App\FilmGenre::where('name',$request->genre)
                                             ->pluck('film_id')->toArray());
          $query->whereIn('id',$genre);
      }


      if ($request->theme) {

          $theme = array_unique(\App\FilmTheme::where('name',$request->theme)
                                              ->pluck('film_id')->toArray());
          $query->whereIn('id',$theme);
      }


      if (!empty($request->year_from)) {

          $query->where('production_date','>=', date("Y-m-d", strtotime($request->year_from)));
      }



      if (!empty($request->year_to)) {

          $query->where('production_date','<=', date("Y-m-d", strtotime($request->year_to)));
      }



      if (!empty($request->length_from) && !empty($request->length_to)) {

          $query->whereBetween('duration',[$request->length_from,$request->length_to]);
      }


      if (isset($request->text)) {

          $query->where('english_title', 'like', '%'.$request->text.'%');
      }


       $query   = $query->whereIn('id',$films)
                                 ->whereNotIn('id',$moved);


      $films = $query->pluck('id');
      $films = \App\Film::whereIn('id',$films)->paginate(5);

      if (count($films) > 0) {

          $view = view('layouts.film',['films' => $films,'festival'=>$festival ])->render();
          return response()->json(['success'=>'true','html'=>$view]);
      }else{

         return response()->json(['success'=>'false']);
      }


      }

    }


 /////////////////////////////////////////////////////////////////////////////////////

    public function addProgrammerVote(Request $request,$id)
    {

         $this->validate($request, [

             'content' => 'required|min:2',

         ]);

       $vote = new Vote();
       $vote->content       = $request->content;
       $vote->film_id       = $request->film_id;
       $vote->festival_id   = $request->festival_id;
       $vote->programmer_id = Auth::user()->id;
       $vote->save();

       return response()->json(['success'=>'true']);

    }


//////////////////////////////////////////////////////////////////////////

    public function filterFilm(Request $request,$id)
    {

        $cop = \App\Copy::where('folder_id',$id)->pluck('film_id')->toArray();

        $mov = \App\Move::where('folder_id',$id)->pluck('film_id')->toArray();

        $films = array_unique(array_merge($cop,$mov));

        $films = \App\Film::whereIn('id',$films)->paginate(5);

        $festival_id = \App\Folder::find($id)->festival_id;
        $festival    = \App\Festival::find($festival_id);

       $view = view('layouts.film',compact('films','festival'))->render();

       return response()->json(['html'=>$view]);

    }


////////////////////////////////////////////////////////////////////////////


    public function filmViewed(Request $request)
    {


         if (\App\FilmSubmit::where(['film_id'=>$request->film_id ,
                              'festival_id'=>$request->festival_id])->exists())
          {
                  $sub = \App\FilmSubmit::where(['film_id'=>$request->film_id,
                              'festival_id'=>$request->festival_id])->first();

                  if ($sub->seen == 1 ) {

                      $sub->seen = 0;

                  }else {

                      $sub->seen = 1;
                  }
                      $sub->save();





                  return response()->json(['success'=>'true']);

              }else{

                return response()->json(['success'=>'false']);

        }

    }

//////////////////////////////////////////////////////////////////////////////

    public function showVotes(Request $request)
    {

      $festival = \App\Festival::find($request->festival_id);
      $votes = $festival->votes()->where('film_id',$request->id)->get();
      $html = view('partials.votes',compact('votes'))->render();

      if (count($votes) > 0) {

            return response()->json(['html'=>$html]);

      } else {

            return response()->json(['success'=>'false']);
      }

    }

/////////////////////////////////////////////////////////////////

    public function showFilmStatus(Request $request)
    {

      $festival = \App\Festival::find($request->festival_id);
      $sub      = \App\FilmSubmit::where('film_id',$request->id)
                                  ->where('festival_id',$request->festival_id)
                                  ->first();

       $html = view('partials.status',compact('sub'))->render();
       return response()->json(['html'=>$html]);


    }



/////////////////////////////////////////////////////////////////

    public function showFilmOwnerContacts(Request $request)
    {

       $user = userFromFilm($request->id);
       $html = view('partials.film_contacts',compact('user'))->render();
       return response()->json(['html'=>$html]);


    }




/////////////////////////////////////////////////////////////////


    public function searchMap(Request $request)
    {

      $query = DB::table('users')
            ->join('festivals', 'users.id', '=', 'festivals.user_id')
            ->select('users.*', 'festivals.*')
            ->orderBy('users.id','asc');

      if ($request->country != '0') {

        $query->where('festivals.country',$request->country);

      }

      if ($request->film_maker != '') {

        $query->where('users.fullname','like','%'.$request->film_maker.'%');

      }

      $users = $query->get();

      $html = view('layouts.profile_festival',compact('users'))->render();

      if ($html != '') {

         return response()->json(['html'=>$html]);

      } else {

         return response()->json(false);
      }


    }

/////////////////////////////////////////////////////////////////


    public function compCountry(Request $request,$id)
    {

       $comp = \App\FestivalCompetetion::find($id);

       $html = view('layouts.comp_details',compact('comp'))->render();


       return response()->json(['html'=>$html]);

    }

/////////////////////////////////////////////////////////////////


    public function compRegion(Request $request,$id)
    {

       $comp = \App\FestivalCompetetion::find($id);

       $html = view('layouts.comp_details',compact('comp'))->render();

       return response()->json(['html'=>$html]);
    }

/////////////////////////////////////////////////////////////////////

    public function deleteFolder($folder)
    {

      $folder = \App\Folder::find($folder);
      $folder->delete();



         if (Auth::user()->type == 'festival') {

            $festival = \App\User::showFestival(Auth::user()->username)->id;

         }

          if (Auth::user()->type == 'festival_programmer') {

            $festival = \App\FestivalProgrammer::where('user_id',Auth::user()->id)
                                               ->first()->festival_id;

         }

          $festival = \App\Festival::find($festival);
          $folders = $festival->folders()->where('sub',0)->get();
          $view = view('partials.folders',compact('folders'))->render();



         return response()->json(['success'=>'true','html'=>$view]);

    }

}
