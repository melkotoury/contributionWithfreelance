<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Film;
use App\User;
use App\Filmmaker;
use Auth;


class PagesController extends Controller
{


	// show home
	public function home()
	{
		//phpinfo();

	 return view('index');
	}
    //	show privacy

    public function privacy ()
    {

        return view('privacy');
    }
    //    show terms
    public function terms ()
    {

        return view('terms');
    }
    //  show Payment and Refund

    public function payrefund ()
    {
        return view('payrefund');
    }
	// show login
	public function login()
	{
		if (Auth::check()) {
			Auth::logout();
			return view('login');
		} else { 

			return view('login');
		}
	 
	}

	//  logout 
	public function logout()
	{
	  Auth::logout();
	  return redirect('/');
	}

	/* my films */
	public function showMyfilm()
	{
	  return view('film.myfilms');
	}

	/* showFilmMap */
	public function showFilmMap()
	{
	  return view('map_film_maker');
	}

	/* showFestivalMap */
	public function showFestivalMap()
	{
	  return view('map_festivals');
	}

	/* showContact */
	public function showContact()
	{
	  return view('contact');
	}


	/* film_detailed */
	public function showFilmDetails()
	{
	  return view('film_detailed');
	}

	/* about */
	public function about()
	{
	  return view('about');
	}

  	/* our festivals */
	public function our_festivals()
	{
	  return view('our_festivals');
	}


	///////////////////////////////////////////////////////////////////////////

    public function signup()
    {
      return view('festival_signup');
    }

    ///////////////////////////////////////////////////////////////////////////

    public function festival()
    {
      if (Auth::check()){

         return redirect(Auth::user()->username);
      
      } else {

         return redirect('login');
      }
    }

   //////////////////////////////////////////////////////////////////////////////
   
   /* createFilm */
    public function createFilm($status)
    {
      
      if (Auth::check() && Auth::user()->type == 'film_maker') {

          $film_maker = \App\FilmMaker::where('user_id',Auth::user()->id)->first();

          return view('film.create_film',compact('film_maker'));
      
      }

        return redirect('/');
    }

   //////////////////////////////////////////////////////////////////////////////


    /* showMyPrivatefilm */
    public function showMyPrivatefilm()
    {
       
       if (Auth::check() && Auth::user()->type == 'film_maker') {

         $film_maker = \App\FilmMaker::where('user_id',Auth::user()->id)->first();
         $films = \App\Film::where('user_id',Auth::user()->id)->where('status',0)->get();
         

         return view('film.my_private_films',compact('film_maker','films'));
      
      }

        return redirect('/');

    }

////////////////////////////////////////////////////////

   /* showMyPublicfilm */
    public function showMyPublicfilm()
    {

       if (Auth::check() && Auth::user()->type == 'film_maker') {

         $film_maker = \App\FilmMaker::where('user_id',Auth::user()->id)->first();
         $films = \App\Film::where('user_id',Auth::user()->id)->where('status',1)->get();

         return view('film.my_pub_films',compact('film_maker','films'));
      
      }

        return redirect('/');

    }

 ////////////////////////////////////////////////////////////


}
