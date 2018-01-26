<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Film;
use App\Festival;
use App\FilmMaker;
use App\User;
use App\FestivalProgrammer;
use App\FilmSubmit;
use App\SiteSetting;
use App\Contact;
use App\Elite;
use DB;
use Auth;
use Mail;
use Image;

class AdminController extends Controller
{


    // admin route edits
    public function showHome()
    {

       if (Auth::check()) {
          return redirect('admin/home');
       } else {
          return redirect('admin/login');
       }

    }

	// admin home
    public function home()
    {

        $count_films = count(Film::all());
        $count_festivals = count(Festival::all());
        $count_filmmakers = count(FilmMaker::all());
        $count_submitted_films = count(FilmSubmit::all());


        $festivals       = array_count_values(Festival::pluck('country')->toArray());
        $film_makers     = array_count_values(FilmMaker::pluck('country')->toArray());



      function quicksort( $festivals ) {
          if( count( $festivals ) < 2 ) {
              return $festivals;
          }
          $left = $right = array( );
          reset( $festivals );
          $pivot_key  = key( $festivals );
          $pivot  = array_shift( $festivals );
          foreach( $festivals as $k => $v ) {
              if( $v < $pivot )
                  $left[$k] = $v;
              else
                  $right[$k] = $v;
          }
          return array_merge(quicksort($left), array($pivot_key => $pivot), quicksort($right));
      }

          $festivals = quicksort($festivals);

          $festivals = array_slice($festivals, -12);

          $festivals =array_reverse($festivals);



          $film_makers = quicksort($film_makers);

          $film_makers = array_slice($film_makers, -5);

          $film_makers =array_reverse($film_makers);




         return view('admin.home',compact('count_films','count_festivals','count_filmmakers','festivals','film_makers','count_submitted_films'));

    }


    // show users
    public function showUsers(User $user)
    {

        $user = $user->where('type','admin')->orderBy('id', 'desc')->get();

    	return view('admin.users',compact('user'));

    }

    // add admin
    public function addAdmin()
    {

    	return view('admin.addadmin');
    }

    // post add admin
    public function postAddAdmin(Request $request)
    {

       $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'username' => 'required|min:3|unique:users',
       ]);


       $user = new User();

       $user->fullname = $request->name;
       $user->email = $request->email;
       $user->username = $request->username;
       $user->confirmed = 1;
       $user->type = 'admin';
       $user->password = bcrypt($request->password);

       $user->save();

      \Session::flash('added', 'Added Successfully !');


      return redirect()->back();

    }

    ///////////////////////////////////////////////////////////////////////////////

     public function showEditUser($id)
      {

        $user = User::find($id);

        return view('admin.edituser')->with('user',$user);

      }

   ////////////////////////////////////////////////////////////////////////

    public function editUser(Request $request,$id){


        $this->validate($request, [
            'name' => 'max:255',
            'email' => 'email|max:255',
            'username' => 'required|min:3',
            'password' => 'confirmed|min:6',
         ]);


       $user = User::find($id);


       if (User::where('email',$request->email)->exists() && $request->email != $user->email)
        {

          \Session::flash('email', 'Successfully updated!');
           return redirect()->back();
       }


        if (User::where('username',$request->username)->exists() && $request->username != $user->username)
        {

          \Session::flash('username', 'Successfully updated!');
          return redirect()->back();

       }



          $user = User::find($id);

           $user->fullname = $request->name;
           $user->email = $request->email;
           $user->username = $request->username;
           $user->password = bcrypt($request->password);

           $user->save();

          \Session::flash('updated', 'Successfully updated!');

          return redirect('admin/users');




    }

  //////////////////////////////////////////////////////////////////////////////

    public function deleteUser($id){

        $users = User::find($id);
        $users->delete();

      \Session::flash('deleted', 'Successfully deleted!');


      return redirect()->back();

    }



 ///////////////////////////////////////////////////////////////////////////////////////////////
    // show festivals
    public function showFestivals()
    {
    	return view('admin.festivals');

    }

    // add festival
    public function addFestival()
    {

    	return view('admin.addfestival');
    }


    // post add admin
    public function postAddFestival(Request $request)
    {


    $messsages = array(
        'username.required'=>'You cant leave Profile ID empty',
        'username.min'=>'The Profile ID has to be :min chars long',
        'username.unique'=>'The Profile ID has already been taken.',
        'username.max'=>'The Profile ID may not be greater than :max characters',
        'username.alpha_dash'=>'The Profile ID should not contain spaces .',
        'linkedin_url.active_url'=>'Please add a valid twitter link',

    );

       $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|min:3|alpha_dash|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'logo' => 'required|image|mimes:jpeg,jpg,bmp,png',
            'address' => 'required',
            'edition' => 'required',
            'city' => 'required',
            'phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
            'country' => 'required',
            'categories_name' => 'required',
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


       $file         = $request->file('logo');
       $path         = 'images/festivals';
       $filename     = str_random(15).'.'.$file->getClientOriginalExtension();




        $background = Image::canvas(180, 120);
        $image = Image::make($request->file('logo'))->resize(180, 120, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/'.$filename);



        /* start image */
        $background = Image::canvas(80, 104);
        $image = Image::make($request->file('logo'))->resize(80, 104, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/profiles/'.$filename);
        /* end image */



        /* start image */
        $background = Image::canvas(300, 300);
        $image = Image::make($request->file('logo'))->resize(300, 300, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/square/'.$filename);
        /* end image */


       $user = new User();
       $user->fullname = $request->name;
       $user->username = $request->username;
       $user->email = $request->email;
       $user->confirmed = 1;
       $user->type = 'festival';
       $user->password = bcrypt($request->password);
       $user->save();

       $film_maker = new Festival();
       $film_maker->user_id = $user->id;
       $film_maker->logo_url      = $filename;
       $film_maker->address    = $request->address;
       $film_maker->city        = $request->city;
       $film_maker->country    = $request->country;
       $film_maker->phone      = $request->phone;
       $film_maker->edition    = $request->edition;
       $film_maker->film_type      = json_encode($request->categories_name);
       $film_maker->biography      = $request->biography;
       $film_maker->awards         = $request->awards;
       $film_maker->team           = $request->team;
       $film_maker->website_url    = $request->website_url;
       $film_maker->facebook_url   = $request->facebook_url;
       $film_maker->linkedin_url    = $request->linkedin_url;
       $film_maker->instagram_url  = $request->instagram_url;
       $film_maker->youtube_url    = $request->youtube_url;
       $film_maker->vimeo_url      = $request->vimeo_url;
       $film_maker->imdb_url       = $request->imdb_url;


       $film_maker->save();





      \Session::flash('added', 'Added Successfully !');


      return redirect()->back();




    }

    ///////////////////////////////////////////////////////////////////////////////

     public function showEditFestival($id)
      {

        $user_id = \App\Festival::find($id)->user_id;
        $festival = \App\User::find($user_id);
        $festival = $festival::showFestival($festival->username);

        return view('admin.edit_festival')->with('festival',$festival);

      }

   ////////////////////////////////////////////////////////////////////////

    public function editFestival(Request $request,$id){



    $messsages = array(
        'username.required'=>'You cant leave Profile ID empty',
        'username.min'=>'The Profile ID has to be :min chars long',
        'username.unique'=>'The Profile ID has already been taken.',
        'username.max'=>'The Profile ID may not be greater than :max characters',
        'username.alpha_dash'=>'The Profile ID should not contain spaces .',
        'linkedin_url.active_url'=>'Please add a valid twitter link',

    );

       $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:225',
            'username' => 'required|min:3|alpha_dash|max:255',
           // 'password' => 'required|confirmed|min:6',
            'logo' => 'image|mimes:jpeg,jpg,bmp,png',
            'address' => 'required',
            'edition' => 'required',
            'city' => 'required',
            'phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
            'country' => 'required',
            'categories_name' => 'required',
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

       $film_maker = Festival::find($id);
       $user = User::find($film_maker->user_id);



       if (User::where('email',$request->email)->exists() && $request->email != $user->email)
        {

          \Session::flash('email', 'Successfully updated!');
           return redirect()->back();
       }


        if (User::where('username',$request->username)->exists() && $request->username != $user->username)
        {

          \Session::flash('username', 'Successfully updated!');
          return redirect()->back();

       }


       if ($request->file('logo')) {

       $file         = $request->file('logo');
       $path         = 'images/festivals';
       $filename     = str_random(15).'.'.$file->getClientOriginalExtension();




        $background = Image::canvas(180, 120);
        $image = Image::make($request->file('logo'))->resize(180, 120, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/'.$filename);



        /* start image */
        $background = Image::canvas(80, 104);
        $image = Image::make($request->file('logo'))->resize(80, 104, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/profiles/'.$filename);
        /* end image */



        /* start image */
        $background = Image::canvas(300, 300);
        $image = Image::make($request->file('logo'))->resize(300, 300, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($path.'/square/'.$filename);
        /* end image */


       }


       $film_maker->user_id = $user->id;
       $film_maker->address    = $request->address;
       $film_maker->city        = $request->city;
       $film_maker->country    = $request->country;
       $film_maker->phone      = $request->phone;
       $film_maker->edition    = $request->edition;
       $film_maker->film_type      = json_encode($request->categories_name);
       $film_maker->biography      = $request->biography;
       $film_maker->awards         = $request->awards;
       $film_maker->team           = $request->team;
       $film_maker->website_url    = $request->website_url;
       $film_maker->facebook_url   = $request->facebook_url;
       $film_maker->linkedin_url    = $request->linkedin_url;
       $film_maker->instagram_url  = $request->instagram_url;
       $film_maker->youtube_url    = $request->youtube_url;
       $film_maker->vimeo_url      = $request->vimeo_url;
       $film_maker->imdb_url       = $request->imdb_url;


       $film_maker->save();

       $user->fullname = $request->name;
       $user->username = $request->username;
       $user->email = $request->email;
       $user->save();





          \Session::flash('updated', 'Successfully updated!');

          return redirect()->back();




    }

  //////////////////////////////////////////////////////////////////////////////


    public function editFestivalPassword(Request $request,$id)
    {
       $this->validate($request, [

         'password' => 'required|confirmed|min:6',

       ]);


       $festival = Festival::find($id);
       $user = User::find($festival->user_id);
       $user->password = bcrypt($request->password);

       $user->save();

        \Session::flash('updated', 'Successfully updated!');

        return redirect()->back();


    }


  ////////////////////////////////////////////////////////////////////////////

    public function deleteFestival($id){

        $fest = \App\Festival::find($id);
        $id = \App\Festival::find($id)->user_id;

        $fest->delete();
        $user = User::find($id);
        $user->delete();

      \Session::flash('deleted', 'Successfully deleted!');


      return redirect()->back();

    }



 ///////////////////////////////////////////////////////////////////////////////////////////////


      public function postAddFilmMaker(Request $request)
      {



       $this->validate($request, [

            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|alpha_dash|min:3|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'photo' => 'required|image|mimes:jpeg,jpg,bmp,png',
            'phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
            'birthdate' => 'required',
            'gender' => 'required',
            'address' => 'required|min:2',
            'city' => 'required|min:2',
            'country' => 'required',
            'biography' => 'min:6',
            'filmography' => 'required|min:6',
            'profession' => 'required',
            'facebook_url' => 'active_url',
            'linkedin_url' => 'active_url',
            'instagram_url' => 'active_url',
            'youtube_url' => 'active_url',
            'vimeo_url' => 'active_url',
            'imdb_url' => 'active_url',
            'awards' => 'min:6',


       ]);

       $user = new User();
       $user->fullname = $request->fullname;
       $user->username = $request->username;
       $user->email = $request->email;
       $user->confirmed = 1;
       $user->type = 'film_maker';
       $user->password = bcrypt($request->password);
       $user->save();

       $film_maker = new FilmMaker();
       $film_maker->user_id = $user->id;

       $file         = $request->file('photo');
       $path         = 'images/filmmakers';
       $filename     = str_random(15).'.'.$file->getClientOriginalExtension();
       $file->move($path,$filename);


       $film_maker->photo        = $filename;
       $film_maker->address      = $request->address;
       $film_maker->city        = $request->city;
       $film_maker->country    = $request->country;
       $film_maker->country_in_map    = $request->country_in_map;
       $film_maker->birthdate    = date("Y-m-d", strtotime($request->birthdate));
       $film_maker->gender     = $request->gender;
       $film_maker->phone      = $request->phone;
       $film_maker->biography   = $request->biography;
       $film_maker->filmography = $request->filmography;
       $film_maker->Profession    = json_encode($request->profession);
       $film_maker->facebook_url    = $request->facebook_url;
       $film_maker->linkedin_url    = $request->linkedin_url;
       $film_maker->instagram_url    = $request->instagram_url;
       $film_maker->youtube_url    = $request->youtube_url;
       $film_maker->vimeo_url     = $request->vimeo_url;
       $film_maker->imdb_url    = $request->imdb_url;
       $film_maker->awards      = $request->awards;


       $film_maker->save();




      \Session::flash('added', 'Added Successfully !');


      return redirect()->back();




      }

    ///////////////////////////////////////////////////////////////////////////////

     public function showEditFilmmaker($id)
      {

        $user_id = \App\FilmMaker::find($id)->user_id;
        $festival = \App\User::find($user_id);
        $film = $festival::showFilmmaker($festival->username);

        return view('admin.edit_filmmaker')->with('film',$film);

      }

   /////////////////////////////////////////////////////////////////////////////////



    public function editFilmmaker(Request $request,$id){



     $this->validate($request, [

            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|alpha_dash|min:3|max:255',
            'photo' => 'image|mimes:jpeg,jpg,bmp,png',
            'phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
            'birthdate' => 'required',
            'gender' => 'required',
            'address' => 'required|min:2',
            'city' => 'required|min:2',
            'country' => 'required',
            'biography' => 'min:6',
            'filmography' => 'required|min:6',
            'profession' => 'required',
            'facebook_url' => 'active_url',
            'linkedin_url' => 'active_url',
            'instagram_url' => 'active_url',
            'youtube_url' => 'active_url',
            'vimeo_url' => 'active_url',
            'imdb_url' => 'active_url',
            'awards' => 'min:6',


       ]);



       $film_maker = FilmMaker::find($id);
       $user = User::find($film_maker->user_id);



       if (User::where('email',$request->email)->exists() && $request->email != $user->email)
        {

          \Session::flash('email', 'Successfully updated!');
           return redirect()->back();
       }


        if (User::where('username',$request->username)->exists() && $request->username != $user->username)
        {

          \Session::flash('username', 'Successfully updated!');
          return redirect()->back();

       }



       $user->fullname = $request->fullname;
       $user->username = $request->username;
       $user->email = $request->email;
       $user->save();

      if ($request->file('photo')) {

         $file         = $request->file('photo');
         $path         = 'images/filmmakers';
         $filename     = str_random(15).'.'.$file->getClientOriginalExtension();
         $file->move($path,$filename);
         $film_maker->photo        = $filename;

      }


       $film_maker->address      = $request->address;
       $film_maker->city        = $request->city;
       $film_maker->country    = $request->country;
       $film_maker->country_in_map    = $request->country_in_map;
       $film_maker->birthdate    = date("Y-m-d", strtotime($request->birthdate));
       $film_maker->gender     = $request->gender;
       $film_maker->phone      = $request->phone;
       $film_maker->biography   = $request->biography;
       $film_maker->filmography = $request->filmography;
       $film_maker->Profession    = json_encode($request->profession);
       $film_maker->facebook_url    = $request->facebook_url;
       $film_maker->linkedin_url    = $request->linkedin_url;
       $film_maker->instagram_url    = $request->instagram_url;
       $film_maker->youtube_url    = $request->youtube_url;
       $film_maker->vimeo_url     = $request->vimeo_url;
       $film_maker->imdb_url    = $request->imdb_url;
       $film_maker->awards      = $request->awards;


       $film_maker->save();




          \Session::flash('updated', 'Successfully updated!');

          return redirect()->back();




    }
  //////////////////////////////////////////////////////////////////////////////


    public function editFilmmakerPassword(Request $request,$id)
    {
       $this->validate($request, [

         'password' => 'required|confirmed|min:6',

       ]);


       $festival = FilmMaker::find($id);
       $user = User::find($festival->user_id);
       $user->password = bcrypt($request->password);

       $user->save();

        \Session::flash('updated', 'Successfully updated!');

        return redirect()->back();


    }


  ////////////////////////////////////////////////////////////////////////////

  //////////////////////////////////////////////////////////////////////////////

    public function deleteFilmmaker($id)
    {

        $film = \App\FilmMaker::find($id);
        $id = \App\FilmMaker::find($id)->user_id;
        $user = User::find($id);
        $film->delete();
        $user->delete();

      \Session::flash('deleted', 'Successfully deleted!');


      return redirect()->back();


    }


  //////////////////////////////////////////////////////////////////////////////
    // show films
    public function showProgrammers()
    {
      return view('admin.programmers');

    }

  ////////////////////////////////////////////////////////////////////////

    // show films
    public function addProgrammer()
    {
      return view('admin.addprogrammer');

    }

  ////////////////////////////////////////////////////////////////////////

    // show films
    public function postAddProgrammer(Request $request)
    {


       $this->validate($request, [
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|alpha_dash|min:3|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
       ]);



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
       $prog->festival_id = $request->festival_id;

       $prog->save();



      \Session::flash('added', 'Added Successfully !');


      return redirect()->back();




    }
    /////////////////////////////////////////////////////////////////////

    public function showEditProgrammer($id)
    {
        $id = \App\User::showProgrammer($id);
        return view('admin.edit_programmer')->with('user',$id);

    }

    ///////////////////////////////////////////////////////////////////////

    public function editProgrammer(Request $request,$id)
    {



       $this->validate($request, [
            'fullname' => 'required|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|alpha_dash|min:3|max:255',
            'password' => 'required|confirmed|min:6',
       ]);


       $prog = FestivalProgrammer::find($id);
       $user = User::find($prog->user_id);



       if (User::where('email',$request->email)->exists() && $request->email != $user->email)
        {

          \Session::flash('email', 'Successfully updated!');
           return redirect()->back();
       }


        if (User::where('username',$request->username)->exists() && $request->username != $user->username)
        {

          \Session::flash('username', 'Successfully updated!');
          return redirect()->back();

       }




       $user->fullname = $request->fullname;
       $user->username = $request->username;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->save();

       $prog = FestivalProgrammer::find($id);
       $prog->user_id     = $user->id;
       $prog->festival_id = $request->festival_id;

       $prog->save();



      \Session::flash('updated', 'Added Successfully !');


      return redirect()->back();




    }


    ////////////////////////////////////////////////////////////////////////

    // add film
    public function addFilm()
    {

    	return view('admin.addfilm');
    }


    // show film makers
    public function showFilmMakers()
    {
    	return view('admin.filmmakers');

    }
      // show films
    public function showFilms()
    {
    	return view('admin.films');

    }
    // show submitted films
  public function showSubmittedFilms()
  {
    $submitted_films = DB::table('film_submits')
                        ->join('festivals', 'film_submits.festival_id', '=', 'festivals.id')
                        ->join('films', 'film_submits.film_id', '=', 'films.id')
                        ->select('film_submits.*','films.english_title','films.film_url','festivals.country')
                        ->orderBy('film_submits.id', 'desc')
                        ->get();

    return view('admin.submitted_films',compact('submitted_films'));

  }
    // add film maker
    public function addFilmMaker()
    {

    	return view('admin.addfilmmaker');
    }

    // show messages
    public function showMessages()
    {

    	$messages = DB::table('contacts')
                          ->orderBy('id', 'desc')
                          ->get();

    	return view('admin.inbox',compact('messages'));
    }

    ////////////////////////////////////////////////////////

    public function showMessage($id)
    {

      $message = DB::table('contacts')
                          ->find($id);

      $messages = Contact::find($id);
      $messages->seen = 1;
      $messages->save();

      return view('admin.message',compact('message'));
    }

    // compose message
    public function compose($id=null)
    {
    	/* if id send mail */
    	return view('admin.compose',compact('id'));
    }

    ///////////////////////////////////////////////////////////////

    public function postCompose(Request $request)
    {

      $this->validate($request,[

          'to' => 'required|email',
          'subject' => 'required',
          'message' => 'required'

        ]);

        $to = $request->to;
        $from = Auth::user()->email;
        $subject = $request->subject;
        $content = $request->message;

       Mail::send('emails.admin', ['content' => $content], function($message) use($to,$from,$subject)
            {
                $message->from($from , 'Iamafilm');
                $message->to($to)->subject($subject);

            });
       \Session::flash('added','sent successfully');

       return back();

    }

    /////////////////////////////////////////////////////////////

    // showSiteSettings
    public function showSiteSettings(SiteSetting $site)
    {

      $site = \App\SiteSetting::firstOrCreate(['id' => 1]);
    	return view('admin.sitesettings',compact('site'));
    }

    //////////////////////////////////////////////////////////////////

    public function login()
    {

       return view('admin.login');
    }

    //////////////////////////////////////////////////////////

    public function postLogin(Request $request)
    {
       $this->validate($request,[

            'username'=>'required',
            'password'=> 'required',

            ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,

        ];

           // get the user
           $user = \App\User::where('username',$request->username);

           if ($user->exists() && $user->first()->type != 'admin') {

                \Session::flash('not_admin', 'prok!');

                return redirect()->back();

           }

            /* make auth by this check */
            if(!Auth::attempt($credentials)){

               \Session::flash('bad', 'prok!');

                return redirect()->back();
            }


           return redirect('admin/home');

        }
    /////////////////////////////////////////////////////////////////////

    public function logout()
    {
      Auth::logout();
      return redirect('admin/login');
    }
//////////////////////////////////////////////////////////////////

    public function postSiteSettings(Request $request)
    {

        $site = \App\SiteSetting::firstOrCreate(['id' => 1]);
        $site->secret_key = $request->secret_key;
        $site->open_key = $request->open_key;
        $site->currency = $request->currency;
        $site->film_fees = $request->film_fees;
//        $site->film_fees_currency = $request->film_fees_currency;
        $site->save();

        \Session::flash('updated','Updated Successfully');

        return back();

    }

/////////////////////////////////////////////////////////////

    public function showTransactions()
    {

       $orders = \App\FilmSubmit::all();

       return view('admin.transactions',compact('orders'));
    }

 ///////////////////////////////////////////////////////////

    public function showFilmTransactions($value='')
    {
       $orders = \App\Transaction::all();

       return view('admin.film_transactions',compact('orders'));
    }

 ///////////////////////////////////////////////////////////
    public function showInvoice($id)
    {

      $order = \App\FilmSubmit::find($id);

      return view('admin.invoice',compact('order'));

    }
//////////////////////////////////////////////////////////////

    public function showElite()
    {

        $elite = \App\Elite::all();

        return view('admin.elite',compact('elite'));

    }

 /////////////////////////////////////////////////////////////

    public function addElite()
    {

      return view('admin.addelite');
    }

////////////////////////////////////////////////////////////////

    public function postAddElite(Request $request,Elite $elite)
    {
      $user = \App\User::where('type','film_maker')
                       ->where('username',$request->username);

      if (!$user->exists()) {

          \Session::flash('username','Username Is Not Exist');
          return back();

         } else {

          if ($elite->where('username',$request->username)->exists()) {

          \Session::flash('elite','Username Is Already Exists in Elite Members');
            return back();

          } else {

            $elite = new \App\Elite();
            $elite->username = $request->username;
            $elite->user_id = \App\User::where('username',$request->username)
                                       ->first()->id;
            $elite->film_fees = $request->film_fees;
            $elite->save();

           \Session::flash('added','Added Successfully');

            return redirect('admin/elite');


          }


         }

    }

  ///////////////////////////////////////////////////////////

  public function editElite($id)
    {

      $el = \App\Elite::find($id);
      return view('admin.editelite',compact('el'));
    }

  ///////////////////////////////////////////////////////////

    public function postEditElite(Request $request,$id)
    {

      $user = \App\User::where('type','film_maker')
                       ->where('username',$request->username);

      if (!$user->exists()) {

          \Session::flash('username','Username Is Not Exist');
          return back();

         } else {

            $elite = \App\Elite::find($id);
            $elite->username = $request->username;
            $elite->user_id = \App\User::where('username',$request->username)
                                       ->first()->id;
            $elite->film_fees = $request->film_fees;
            $elite->save();

           \Session::flash('updated','updated Successfully');

            return redirect('admin/elite');


         }


    }

  //////////////////////////////////////////////////////////

    public function deleteElite($id)
    {
       $el = \App\Elite::find($id);
       $el->delete();

      \Session::flash('deleted', 'Successfully deleted!');


      return redirect()->back();

    }

  /////////////////////////////////////////////////////////

    public function showWaivers()
    {
      $waivers = array_unique(\App\Waiver::pluck('festival_id')->toArray());
      $waivers = \App\Festival::whereIn('id',$waivers)->get();
      return view('admin.waivers',compact('waivers'));
    }

  //////////////////////////////////////////////////////

  public function postWaivers(Request $request,$id=null)
    {

      if ($id == null) {

        return response()->json(['success'=>'null']);

      }
      // check if it belongs to festival or not
      $usernames = \App\User::where('type','festival')->pluck('username')->toArray();
      if (!in_array($id, $usernames)) {

        return response()->json(['success'=>'not_festival']);
      }


      // check if it exists in waivers
//      $festivals = array_unique(\App\Waiver::pluck('festival_id')->toArray());
//      $users     = \App\Festival::whereIn('id',$festivals)
//                                ->pluck('user_id')
//                                ->toArray();
//
//     $usernames = \App\User::whereIn('id',$users)->pluck('username')->toArray();
//     if (in_array($id, $usernames)) {
//
//       return response()->json(['success'=>'exist']);
//     }


     $waiver = new \App\Waiver();
     $waiver->festival_id = \App\User::showFestival($id)->id;
     $waiver->waiver = str_random(8);
     $waiver->admin = Auth::user()->fullname;
     $waiver->save();

     $html = view('layouts.waiver',['festival_id'=> $waiver->festival_id])->render();

     return response()->json(['html'=>$html,'success'=>'done']);


    }

 //////////////////////////////////////////////////////

    public function addWaivers(Request $request)
    {

     for ($x=0; $x <= $request->num_waiver; $x++) {

       $waiver = new \App\Waiver();
       $waiver->festival_id = $request->festival_id;
       $waiver->waiver = str_random(8);
       $waiver->value_waiver = $request->value_waiver;
       $waiver->admin = Auth::user()->fullname;
       $waiver->save();

     }

     return response()->json(['success'=> 'true']);

    }

//////////////////////////////////////////////////////////

    public function showFestivalWaivers($id)
    {

      $waivers = \App\Waiver::where('festival_id',$id)->get();

      return view('admin.festival_waivers',compact('waivers'));

    }

////////////////////////////////////////////////////////


}
