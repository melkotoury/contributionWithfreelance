<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

use App\Http\Requests;
use App\User;
use App\FilmMaker;
use App\Contact;
use App\Festival;
use App\FestivalCompetetion as Comp;
use App\SiteSetting as Site;
use App\FilmSubmit;
use App\Elite;
use Auth;
use Hash;
use Mail;
use Carbon\Carbon; 
use Session;
use DB;
use Start;
use Image;



class HomeController extends Controller
{
    

   /* submit_film */
    public function submitFilm(Request $request)
    {
    
     //get the open festival_competetions
     $festivalsopen = DB::table('festivals')
                ->join('festival_competetions', 'festivals.id', '=', 'festival_competetions.festival_id')
                ->orderBy('festival_competetions.deadline','asc')
		  			 ->where('festival_competetions.deadline','>=',date("Y-m-d"))
                ->select('festivals.*')
                ->groupBy('festivals.id')->get();
		   
     //get the closed festival_competetions
	  $festivalsclosed = DB::table('festivals')
                ->join('festival_competetions', 'festivals.id', '=', 'festival_competetions.festival_id')
                ->orderBy('festival_competetions.deadline','asc')
		  			 ->where('festival_competetions.deadline','<',date("Y-m-d"))
                ->select('festivals.*')
                ->groupBy('festivals.id')->get();
         
    	//merge the results of the both querys into a single big one
		 $array = array_merge($festivalsopen,$festivalsclosed);
		 //convert it into a collection to do slice 
		 $collection = new Collection($array);
		 
		   //Get current page form url e.g. #6
		 $currentPage = LengthAwarePaginator::resolveCurrentPage();
		 
		 //Define how many items we want to be visible in each page
		 $perPage = 15;
		 
       //Slice the collection to get the items to display in current page
		 $currentPageSearchResults = $collection->slice(($currentPage - 1) * $perPage, $perPage)->all();
            
		 //Create our paginator and pass it to the view
		 $festivals= new LengthAwarePaginator($currentPageSearchResults, count($collection), $perPage);
       
		 //CRY OUT LOUD 
		 
		 $films = \App\Film::where('user_id',Auth::user()->id)
                          ->where('status',0)
                          ->where('completed',1)
                          ->get();

      if ($request->ajax()) {
         
         $view = view('partials.fest_teaser',compact('festivals'))->render();
         return response()->json(['html'=>$view]);
      }

      $url = url('submit_film');

      if (Session::has('my_film')) {
          
          Session::forget('my_film');
      }

      return view('submit_film',compact('festivals','films','url'));
    }


 ///////////////////////////////////////////////////////////////////////////



	// show signup
	public function signup()
	{


    if (Auth::check()) {
        
        if (FilmMaker::where('user_id',Auth::user()->id)->first()) {
            
            $film_maker = FilmMaker::where('user_id',Auth::user()->id)->first();
        }
    }
    if (Auth::check()) {
        
        $user = Auth::user();

    }

	  return view('old-signup',compact('film_maker','user'));

	}




	// post sign up
	public function postSignup(CookieJar $cookieJar,Request $request)
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


       $data = [

            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),    
        
       ];

        Session::set('film_maker_signup', $data);


      return response()->json(['done'=>'true']);        
              	

  }


	// post sign up
  public function postSignupTwo(CookieJar $cookieJar,Request $request)
  {
 
       $this->validate($request, [

            'photo' => 'required|image|mimes:jpeg,jpg,bmp,png',
            'phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
            'birthdate' => 'required',
            'gender' => 'required',    
            'address' => 'required|min:2',    
            'city' => 'required|min:2',    
            'country' => 'required',    
            'country_in_map' => 'required',    

       ]);

       
        $file         = $request->file('photo');
        $path         = 'images/filmmakers';
        $filename     = str_random(15).'.'.$file->getClientOriginalExtension();
        $file->move($path,$filename);

        $data = [
            'photo' => $filename,
            'phone' => $request->phone,
            'birthdate' => date("Y-m-d", strtotime( $request->birthdate)),
            'gender' => $request->gender,    
            'address' => $request->address,    
            'city' => $request->city,    
            'country' => $request->country,    
            'country_in_map' => $request->country_in_map,    
       ];


        if (Session::has('film_maker_signup')) {

              $sess =  array_merge(Session::get('film_maker_signup'),$data);
              Session::set('film_maker',$sess);
        }

       
      return response()->json(['done'=>'true']);        
              

  }


// post sign up
  public function postSignupThree(CookieJar $cookieJar,Request $request)
  {
       
        $messsages = array(
        'linkedin_url.active_url'=>'Please add a valid twitter link',
        );

       $this->validate($request, [

            'biography' => 'min:6',
            'filmography' => 'min:6',
            'profession' => 'required',
            'facebook_url' => 'active_url',    
            'linkedin_url'   => 'active_url',
            'instagram_url' => 'active_url',    
            'youtube_url' => 'active_url',    
            'vimeo_url' => 'active_url',    
            'imdb_url' => 'active_url',    
            'awards' => 'min:6',    

       ],$messsages);
     
       $data = Session::get('film_maker');



      $user = new User();
      $user->fullname = $data['fullname'];
      $user->username = $data['username'];
      $user->email = $data['email'];
      $user->type = 'film_maker';
      $user->password = $data['password'];           
      $user->save();

      $film_maker = new FilmMaker();
      $film_maker->user_id = $user->id;   
      $film_maker->photo            = $data['photo'];
      $film_maker->address          = $data['address'];
      $film_maker->city             = $data['city'];
      $film_maker->country          = $data['country'];
      $film_maker->country_in_map   = $data['country_in_map'];
      $film_maker->birthdate        = $data['birthdate'];
      $film_maker->gender           = $data['gender'];
      $film_maker->phone            = $data['phone'];
      $film_maker->biography = $request->biography;
      $film_maker->filmography = $request->filmography;
      $film_maker->Profession  = json_encode($request->profession);
      $film_maker->facebook_url = $request->facebook_url;
      $film_maker->linkedin_url = $request->linkedin_url;
      $film_maker->instagram_url = $request->instagram_url;
      $film_maker->youtube_url = $request->youtube_url;
      $film_maker->vimeo_url = $request->vimeo_url;
      $film_maker->imdb_url = $request->imdb_url;
      $film_maker->awards  = $request->awards;
      $film_maker->save();



      $confirmation_code = str_random(30);

      $user = User::find($user->id);
      $user->confirmation_code  = $confirmation_code ;
      $user->save();


      $to = User::find($user->id)->email;

       Mail::send('emails.reminder', ['confirmation_code' => $confirmation_code], function($message) use($to)
            {
                $message->from('info@iamafilm.com', 'I am a film registration');
                $message->to($to)->subject('Confirmation');

            });


       
      return response()->json(['done'=>'true']);        
              

  }


  /* get profile */

  public function getProfile($username)
  {

      // check if username is existing
      if (\App\User::where('username',$username)->first()) {
     

           $user = \App\User::where('username',$username)->first(); 

            // check if a user is film maker
           if ($user->type == 'film_maker') {

              // film maker details
              $user = \App\User::showFilmMaker($username);

              $films   = \App\Film::where('user_id',$user->user_id)
                                    ->where('completed',1)
                                    ->get();

              $film_ids           = $films->pluck('id'); 
              $submitted_films_id = \App\FilmSubmit::whereIn('film_id',$film_ids)->pluck('film_id');
              $submitted_films    =  \App\Film::whereIn('id',$submitted_films_id)->get();

              if (isset($user->birthdate)) {

               $date = Carbon::parse(Carbon::createFromFormat('Y-m-d',$user->birthdate)
                                          ->toDateTimeString());
               $birthdate = $date->day.'-'.$date->month.'-'.$date->year;

              } 

              return view('profile',compact('user','films','birthdate','submitted_films'));


           /* show festival  */ 
           }elseif ($user->type == 'festival') {

              // Festival details
              $user = \App\User::showFestival($username);
              $editions = \App\FestivalEdition::where('festival_id',$user->id)->get();


               return view('festival_profile',compact('user','editions'));

           }elseif ($user->type == 'festival_programmer') {

               return redirect('/');


           }
      
      
  }
      // check if username is existing
      if (\App\Film::where('film_url',$username)->first()) {

      $film = \App\Film::where('film_url',$username)->first();        

      $youtube_url = "https://www.youtube.com/embed";
      $vimeo_url   = "https://player.vimeo.com/video";

        $youtube_vimeo_check = $this->videoType($film->film_link);
        if ($youtube_vimeo_check === "youtube"){

            $sub_url=$youtube_url;
            $video_id = $this->getYoutubeId($film->film_link);
        }elseif($youtube_vimeo_check === "vimeo"){

            $sub_url=$vimeo_url;
            $video_id = $this->getVimeoId($film->film_link);
        }


        if (Auth::check() && Auth::user()->type == 'film_maker') {

            $film_owner = \App\FilmMaker::where('user_id',Auth::user()->id)->first();

        }


        /* get festival submitted by this film */
        if (Auth::check() && Auth::user()->type == 'festival') {

            $fest_ids =  festivalsSubmitted($film->id)->toArray();

            $festival = \App\Festival::where('user_id',Auth::user()->id)->first()->id;

            if (in_array($festival,$fest_ids)) {
              
                $fest_owner = true;

            } else {

                $fest_owner = false;
            }
            
        }




        /* get festival programmers submitted by this film */
        if (Auth::check() && Auth::user()->type == 'festival_programmer') {

            $fest_ids =  festivalsSubmitted($film->id)->toArray();

            $festival = \App\FestivalProgrammer::where('user_id',Auth::user()->id)->first()->festival_id;

            if (in_array($festival,$fest_ids)) {
              
                $prog_owner = true;

            } else {

                $prog_owner = false;
            }
            
        }




          $trailer_link = $this->getYoutubeId($film->trailer_link);
      


           return view('film.film-detailed',compact('film','fest_owner','sub_url','video_id','film_owner','prog_owner'));
          

       }
      


     
  }


  // edit profile
  public function editProfile($username)
  {

     // check if username is existing
          if (\App\User::where('username',$username)->first()) {
         

               $user = \App\User::where('username',$username)->first(); 

                // check if a user is film maker
               if ($user->type == 'film_maker') {

                  if ($user->username == Auth::user()->username) {
                    // user films
                    $films = \App\Film::where('user_id',$user->id)->count();
                    $films_all = \App\Film::where('user_id',$user->id)->get();
                    // film maker details
                    $user = \App\User::showFilmMaker($username);

                    $film_ids           = $films_all->pluck('id'); 
                    $submitted_films_id = \App\FilmSubmit::whereIn('film_id',$film_ids)->pluck('film_id');
                    $submitted_films    =  \App\Film::whereIn('id',$submitted_films_id)->get();

                    return view('edit_profile',compact('user','films','submitted_films'));
                  }else{

                    abort(404);
                  }
               }
              // check if a user is film maker
               if ($user->type == 'festival') {

                  if ($user->username == Auth::user()->username) {
                    // film maker details
                    $user = \App\User::showFestival($username);
                    $festival = \App\Festival::find($user->id);

                    return view('edit_festival_profile',compact('user','festival'));
                  }else{

                    abort(404);
                  }
               }
          
          }else{

            abort(404);
          }
      }


  // post edit profile
  public function postEditProfile($username, Request $request)
  {

       $this->validate($request, [

                  'fullname' => 'required|min:2|max:255',
                  'email' => 'required|email|max:255',
                  'username' => 'required|min:3|alpha_dash|max:255',
                  'phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
                  'birthdate' => 'required',
                  'gender' => 'required',    
                  'address' => 'required',    
                  'city' => 'required',    
                  'country' => 'required',    
                  'country_in_map' => 'required',    
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

           $user = User::where('username',$username)->first();

         if (\App\User::where('email',$request->email)->count() > 0 && $user->email != $request->email)
            {
           

             \Session::flash('unique_email', 'prok!');
            return redirect()->back()->with('success', 'this email already has been taken.');

           }elseif (\App\User::where('username',$request->username)->count() > 0 && $user->username != $request->username) {

             \Session::flash('unique_username', 'prok!');
            return redirect()->back()->with('success', 'this email already has been taken.');

           }else{

             $user = \App\User::where('username',$username)->first();
             $user->fullname = $request->fullname;
             $user->username = $request->username;
             $user->email = $request->email;
             $user->save();


            $film_maker = FilmMaker::where('user_id',$user->id)->first();
            $film_maker->biography   = $request->biography;
            $film_maker->filmography = $request->filmography;

            $film_maker->gender   = $request->gender;
            $film_maker->address   = $request->address;
            $film_maker->city   = $request->city;
            $film_maker->country   = $request->country;
            $film_maker->country_in_map   = $request->country_in_map;
            $film_maker->profession   = json_encode($request->profession);


            $film_maker->facebook_url    = $request->facebook_url;
            $film_maker->linkedin_url    = $request->linkedin_url;
            $film_maker->instagram_url    = $request->instagram_url;
            $film_maker->youtube_url    = $request->youtube_url;
            $film_maker->vimeo_url     = $request->vimeo_url;
            $film_maker->imdb_url    = $request->imdb_url;
            $film_maker->awards      = $request->awards;
            $film_maker->birthdate    = date("Y-m-d", strtotime( $request->birthdate));
            $film_maker->phone      = $request->phone;
            $film_maker->save();

           }

        \Session::flash('update', 'prok!');
    
        return redirect()->back();

     }

///////////////////////////////////////////////////////////////////////////////

      public function postEditPhoto($username,Request $request)
      {
        
         $this->validate($request, [

            'photo' => 'required|image|mimes:jpeg,jpg,bmp,png',

         ]);

       
        $file         = $request->file('photo');
        $path         = 'images/filmmakers';
        $filename     = str_random(15).'.'.$file->getClientOriginalExtension();
        $file->move($path,$filename);


       $film_maker = FilmMaker::where('user_id',Auth::user()->id)->first();
       
       $film_maker->photo        = $filename;

       $film_maker->save();


       \Session::flash('update', 'prok!');
    
        return redirect()->back();


      }    

////////////////////////////////////////////////////////////////////////////////

      public function postEditPasword($username,Request $request)
       {


          $this->validate($request, [
              'password' => 'min:6',    
         ]);
       
          $user = User::where('username',$username)->first();

          if (Hash::check($request->password,$user->password)) {

            $user->fill(['password'=>bcrypt($request->npass)])->save();
         
           \Session::flash('update', 'prok!');   
             return redirect()->back();        


          }else{

            \Session::flash('old-password', 'prok!');
             return redirect()->back();        

          }



       }       

////////////////////////////////////////////////////////////////////////////////
  // post login
  public function postLogin(Request $request)
  {

        $this->validate($request,[

            'username'=>'required',
            'password'=> 'required',

            ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
//            'confirmed' => 1
        ];



          $user = \App\User::where('username',$request->username)
                            ->where('confirmed',0);

        if ($user->exists()) {
           
         
           \Session::flash('resend', 'prok!');

            return redirect()->back();

          }

        


            /* make auth by this check */
            if(!Auth::attempt($credentials)){

               \Session::flash('bad', 'prok!');

                return redirect()->back();
            }


           // get the user
           $user = \App\User::where('username',$request->username)->first(); 

            // check if a user is film maker
           if ($user) {

               if ($user->type == 'film_maker') {
                  // film maker details
                  $user = \App\User::showFilmMaker($user->username);
                 
                 return redirect($user->username);

                  }elseif ($user->type == 'festival') {

                  // festivals details
                  $user = \App\User::showFestival($request->username);
                  return redirect($user->username);

                 }elseif ($user->type == 'festival_programmer') {

                  // festivals details
                  $user = \App\User::where('username',$request->username)->first();
                  return redirect($user->username);

                 }

           }else{

              abort(404);
           }
  }
////////////////////////////////////////////////////////////////////////
  public function postContact(Request $request)
  {

       $name = $request->name;
       $message = $request->message;
       $email = $request->email;
       $subject = $request->subject;

       $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required',
       ]);


       $contact = new Contact();
       $contact->name = $name;
       $contact->email = $email;
       $contact->subject = $subject;
       $contact->message = $message;
       $contact->save();


       \Session::flash('added', 'Successfully added!');
      
             Mail::send('emails.contact',['name' => $name,'email'=>$email,'subject'=>$subject,'content'=>$message], function($message) use($email)
            {
                $message->from($email,'Iamafilm');
                $message->to('info@iamafilm.com')->subject('iamamfilm message');

            });
      

       
      return redirect()->back();        
     }

  ////////////////////////////////////////////////

    public function confMail($confirmation_code)
    {

       if (User::where('confirmation_code',$confirmation_code)->exists()) {

       $user = User::where('confirmation_code',$confirmation_code)->first();

       $user->confirmed = 1;
       $user->save();

       \Session::flash('confirmed','Confirmed Successfully');

       return redirect('login');

       }else{

       \Session::flash('failed','failed to confirm your account');

       return redirect('login');


       }
    }

     ///////////////////////////////////////////////////////////





    ////////////////////////////////////////////////////////////

    /*
    * get Youtube Id By URL
    * @param  string  $url         youtube url 
    * @return string 
    */
    public function getYoutubeId($url)
    {
      try {
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        return  $my_array_of_vars['v'];   
      } catch (\Exception $e) {
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
        $video = isset($matches[0]) ? $matches[0] : '';
        return $video;
      }
    }


    ////////////////////////////////////////////////////////////

    /*
    * get Vimeo Id By URL
    * @param  string  $url         vimeo url
    * @return string
    */
    public function getVimeoId($url)
    {
        if (preg_match("/https?:\/\/(?:www\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)(?:$|\/|\?)/", $url, $id)) {
            $videoId = $id[3];
            return $videoId;
        }
    }

    /////////////////////////////////////////////////////////////
    /*
     * Check if url is vimeo or
     * @param  string  $url         vimeo url
     * @return string
     */

    function videoType($url) {

        if (strpos($url, 'youtube') > 0) {
            return 'youtube';
        } elseif (strpos($url, 'vimeo') > 0) {
            return 'vimeo';
        } else {
            return 'unknown';
        }
    }

    /////////////////////////////////////////////////////////////////


    public function redeemCoupon(Request $request)
    {

      $code    = trim($request->waiver_code);
      $coupons = \App\Waiver::pluck('waiver')->toArray();
      $active  = \App\Waiver::where('waiver',$code)->first();

      // check if it exist
      if (!in_array($code,$coupons)) {

          return response()->json(['success'=>'exist']);
      }

      // used before
      if ($active->active == 1) {

          return response()->json(['success'=>'used']);
      }

      if ($active->value_waiver == 0){
          // di activate it
          $active->active = 1;
          $active->save();

          // submit it

          $sub = new \App\FilmSubmit();
          $sub->film_id = Session::get('my_film');
          $sub->competetion_id = Session::get('comp_id');
          $sub->amount = 0;
          $sub->charge_id = 0;
          $sub->charge_state = 'waiver code';
          $sub->festival_id = Session::get('festival_id');
          $sub->save();

          return response()->json(['success'=>'true']);
      }
      if($active->value_waiver > 0 & $active->active === 0){

//          $value_waiver = $active->value_waiver;
          return response()->json(['success' => 'discount', 'amount' => $active->value_waiver,'waiver' => $code]);

//          return redirect('checkout_redeem', ['waiver_amount' => $value_waiver]);

      }
        if($active->value_waiver > 0 & $active->active === 1){

//          $value_waiver = $active->value_waiver;
            return response()->json(['success' => 'used']);

//          return redirect('checkout_redeem', ['waiver_amount' => $value_waiver]);

        }



    }

    /////////////////////////////////////////////////////////////////


    public function waiverUsed()
    {
        return view("waiver_used");
    }

    ////////////////////////////////////////////////////////////////////

    public function processEliteSubmit($film)
    {

        $elites = array_unique(\App\Elite::pluck('user_id')->toArray());

        if (in_array(Auth::user()->id, $elites) ) {
          
          $elit_fees = \App\Elite::where('user_id',Auth::user()
                                       ->id)->first()
                                       ->film_fees;

            if ($elit_fees == 0) {

            // proceed
              $sub = new \App\Transaction();
              $sub->film_id = $film;
              $sub->amount = 0;
              $sub->charge_id = 0;
              $sub->charge_state = 'elite';
              $sub->save();

              $fil = \App\Film::find($film);
              $fil->completed = 1;
              $fil->save();

              return redirect('my_private_films');


            } else {

              abort(404);
            }


       } else {

          abort(404);
        }
   

    }


    ///////////////////////////////////////////////////////////////////////



}
