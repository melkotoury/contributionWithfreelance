<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//use Illuminate\Pagination\Paginator as Paginator;
 use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use App\Film;
use App\User;
use App\Filmmaker;
use App\FilmCategory;
use App\FilmTheme;
use App\FilmGenre;
use App\FilmDirector;
use App\FilmProducer;
use App\FilmProductionCompany;
use App\FilmDistribution;
use App\FilmTeam;
use App\FestivalCompetetion;
use App\CompetetoinCategory as CompCat;
use Auth;
use Hash;
use DB;
use Session;
use File;
use Response;
use App\FilmSubmit;
use Image;


class FilmControllerCopy extends Controller
{
    


    public function showFilm($film_url)
    {
      
      $film = \App\Film::where('film_url',$film_url)->first();

      $youtube_url = "https://www.youtube.com/embed";
      $vimeo_url = "https://player.vimeo.com/video";

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
        $trailer_link = $this->getYoutubeId($film->trailer_link);
      


      return view('film.film-detailed',compact('film','sub_url','video_id','film_owner'));

    }


    /* form one */
    public function createFilmOne(Request $request)
    {


       $this->validate($request, [

	      'original_title' => 'required|min:2|max:255',
			  'english_title' => 'required|min:2|max:255',
			  'production_date' => 'required',
			  'film_url' => 'required|alpha_dash|min:3|unique:films',
			  'film_languages' => 'required',
			  'subtitles_languages' => 'required',
			  'duration' => 'required',
			  'production_country' => 'required',
			  'categories_name' => 'required',
			  'short_synopsis' => 'min:2',
			  'long_synopsis' => 'min:2',
			  'short_synopsis_english' => 'required|min:2',
			  'long_synopsis_english' => 'min:2',
			  'film_link' => 'required|active_url',

       ]);

       if (in_array($request->film_url, usernames())) {

             return response()->json(['done'=>'unique']);        
       }

        $film = new Film();
        $film->original_title = $request->original_title;
        $film->english_title = $request->english_title;
        $film->production_date = date("Y-m-d", strtotime( $request->production_date));
        $film->film_url = $request->film_url;
        $film->film_languages = $request->film_languages;
        $film->subtitles_languages = $request->subtitles_languages;
        $film->duration = $request->duration;
        $film->production_country = $request->production_country;
        $film->film_school = $request->film_school;
        $film->film_school_check = $request->film_school_check?: 0 ;
        $film->debut_film = $request->debut_film?: 0 ;
        $film->work_in_progress = $request->work_in_progress?: 0 ;
        $film->short_synopsis = $request->short_synopsis;
        $film->long_synopsis = $request->long_synopsis;
        $film->short_synopsis_english = $request->short_synopsis_english;
        $film->long_synopsis_english = $request->long_synopsis_english;
        $film->film_link = $request->film_link;
        $film->film_password = $request->film_password ?: 0;
        $film->user_id = Auth::user()->id;
        $film->status = $request->status;
        $film->completed = $request->status == 1 ? 1 : 0;       
        $film->save();


       if (count($request->categories_name) > 0) {
       
        foreach ($request->categories_name as  $value) {
  			
  			$film_cat = new FilmCategory();
  			$film_cat->name = $value;
  			$film_cat->film_id = $film->id;
  			$film_cat->save();

  	    }
      }


      if (count($request->themes_name) > 0) {

         foreach ($request->themes_name as  $value) {
  			
  			$film_the = new FilmTheme();
  			$film_the->name = $value;
  			$film_the->film_id = $film->id;
  			$film_the->save();
         
        }
      }


      if (count($request->genres_name) > 0) {

         foreach ($request->genres_name as  $value) {
  			
  			$film_gen = new FilmGenre();
  			$film_gen->name = $value;
  			$film_gen->film_id = $film->id;
  			$film_gen->save();

  	    }
      }

       Session::set('create_film', $film->id);
   //    Session::set('festival_id', $film_maker->id);
       
      return response()->json(['done'=>'true']);        
                




    }


////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
   /* edit_film */
    public function editFilm($id)
    {

      if (Auth::check() && Auth::user()->type == 'film_maker' && Film::find($id)) {

        $film_maker = \App\FilmMaker::where('user_id',Auth::user()->id)->first();
      
        if ($film_maker) {

      	$film = Film::find($id);
      	$categories_name = FilmCategory::where('film_id',$film->id)->pluck('name')->toArray();
      	$theme_name = FilmTheme::where('film_id',$film->id)->pluck('name')->toArray();
      	$genre_name = FilmGenre::where('film_id',$film->id)->pluck('name')->toArray();

      	$film_director = FilmDirector::where('film_id',$film->id)->get();
      	$film_producer = FilmProducer::where('film_id',$film->id)->get();
        $film_product  = FilmProductionCompany::where('film_id',$film->id)->get();
        $film_dist  = FilmDistribution::where('film_id',$film->id)->get();
        $film_team  = FilmTeam::where('film_id',$film->id)->get();

        
        return view('film.edit_film',compact('film','categories_name','theme_name','genre_name','film_director','film_producer','film_product','film_dist','film_team'));
        }


      }else{

        return redirect('/') ;

      }


    }



    ////////////////////////////////////////////////////////////////////////////////////////

    //editFilmOne
    public function editFilmOne($id,Request $request)
    {


       $this->validate($request, [

        'original_title' => 'required|min:2|max:255',
        'english_title' => 'required|min:2|max:255',
        'production_date' => 'required',
        'film_languages' => 'required',
        'subtitles_languages' => 'required',
        'duration' => 'required',
        'production_country' => 'required',
        'categories_name' => 'required',
        'short_synopsis' => 'min:2',
        'long_synopsis' => 'min:2',
        'short_synopsis_english' => 'required|min:2',
        'long_synopsis_english' => 'min:2',
        'film_link' => 'required|active_url',

       ]);


       $film = Film::find($id);

       if ($request->status == 0 ) {
         
         $this->validate($request, [

          'film_password' => 'required|min:3'

         ]);
       }


       if ($request->film_url != $film->film_url ) {
         
         $this->validate($request, [

          'film_url' => 'required|alpha_dash|min:3|unique:films',

         ]);
       }

       if (in_array($request->film_url, usernames())) {

             return response()->json(['done'=>'unique']);        
       }


       $film->original_title = $request->original_title;
       $film->english_title = $request->english_title;
       $film->production_date = date("Y-m-d", strtotime( $request->production_date));
       $film->film_url = $request->film_url;
       $film->film_languages = $request->film_languages;
       $film->subtitles_languages = $request->subtitles_languages;
       $film->duration = $request->duration;
       $film->production_country = $request->production_country;
       $film->film_school = $request->film_school;
       $film->film_school_check = $request->film_school_check ?: 0;
       $film->debut_film = $request->debut_film ?: 0 ;
       $film->work_in_progress = $request->work_in_progress ?: 0 ;
       $film->short_synopsis = $request->short_synopsis;
       $film->long_synopsis = $request->long_synopsis;
       $film->short_synopsis_english = $request->short_synopsis_english;
       $film->long_synopsis_english = $request->long_synopsis_english;
       $film->film_link = $request->film_link;
       $film->film_password = $request->film_password;
       $film->user_id = Auth::user()->id;
       $film->status = $request->status;
       $film->save();

       DB::table('film_categories')->where('film_id',$id)->delete();
       DB::table('film_themes')->where('film_id',$id)->delete();
       DB::table('film_genres')->where('film_id',$id)->delete();

       foreach ($request->categories_name as  $value) {
			
			$film_cat = new FilmCategory();
			$film_cat->name = $value;
			$film_cat->film_id = $film->id;
			$film_cat->save();

	   }

     if (count($request->themes_name) > 0) {

         foreach ($request->themes_name as  $value) {
  			
  			$film_the = new FilmTheme();
  			$film_the->name = $value;
  			$film_the->film_id = $film->id;
  			$film_the->save();

  	   }
     }  

     if (count($request->genres_name) > 0) {

         foreach ($request->genres_name as  $value) {
        
        $film_gen = new FilmGenre();
        $film_gen->name = $value;
        $film_gen->film_id = $film->id;
        $film_gen->save();
       }

	   }

        \Session::flash('update', 'prok!');

	   return redirect()->back();

    	
    }


    //////////////////////////////////////////////////////////////

    public function addDir(Request $request,$id=null)
    {

       $this->validate($request, [

	      'director_name' => 'required|min:2',
			  'director_phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
			  'director_email' => 'required|email',

       ]);

       if ($id == null) {
         
            $id = Session::get('create_film');

       }

       $dir = new FilmDirector();
       $dir->name = $request->director_name;
       $dir->film_id = $id;
       $dir->email = $request->director_email;
       $dir->phone = $request->director_phone;
       $dir->save();
       
       $data = view('partials.render',['name'=>$dir->name , 'id'=> $dir->id,'phone'=> $dir->phone,'email'=> $dir->email])->render();

        if(!empty($data))
        {
        return response()->json($data);
        }else{
        return response()->json('false');
        }

    }
    //////////////////////////////////////////////////////////////

    public function editDir(Request $request,$id = null)
    {


       $this->validate($request, [

	          'name' => 'required|min:2',
			  'phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
			  'email' => 'required|email',

       ]);

       if ($id == null) {
         
            $id = Session::get('create_film');

       }


       $dir = FilmDirector::find($request->dir_id);
       $dir->name = $request->name;
       $dir->film_id = $id;
       $dir->email = $request->email;
       $dir->phone = $request->phone;
       $dir->save();
       
       $data = view('partials.render',['name'=>$request->name , 'id'=> $request->dir_id,'phone'=> $request->phone,'email'=> $request->email])
       							->render();

        if(!empty($data))
        {
        return response()->json(['data'=>$data,'id'=>$request->dir_id]);
        }else{
        return response()->json('false');
        }

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////

    public function deleteDir($id =null)
    {
    	$film = FilmDirector::find($id);
    	$film->delete();

    	return response()->json(['success'=>'done']);
    }




    //////////////////////////////////////////////////////////////
    //////////////////////////////////////////////////////////////

    public function addProd(Request $request, $id =null)
    {

       $this->validate($request, [

              'producer_name' => 'required|min:2',
              'producer_phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
              'producer_email' => 'required|email',

       ]);


       
       if ($id == null) {
         
            $id = Session::get('create_film');

       }

       $prod = new FilmProducer();
       $prod->name = $request->producer_name;
       $prod->film_id = $id;
       $prod->email = $request->producer_email;
       $prod->phone = $request->producer_phone;
       $prod->save();
       
       $data = view('partials.render_prod',['name'=>$prod->name , 'id'=> $prod->id,'phone'=> $prod->phone,'email'=> $prod->email])->render();

        if(!empty($data))
        {
        return response()->json($data);
        }else{
        return response()->json('false');
        }

    }
    //////////////////////////////////////////////////////////////

    public function editProd(Request $request, $id =null)
    {


       $this->validate($request, [

              'name' => 'required|min:2',
              'phone' => 'required|regex:/^(?=.*[0-9])[- +()0-9]+$/',
              'email' => 'required|email',

       ]);


       
       if ($id == null) {
         
            $id = Session::get('create_film');

       }

       $prod = FilmProducer::find($request->prod_id);
       $prod->name = $request->name;
       $prod->film_id = $id;
       $prod->email = $request->email;
       $prod->phone = $request->phone;
       $prod->save();
       
       $data = view('partials.render_prod',['name'=>$request->name , 'id'=> $request->prod_id,'phone'=> $request->phone,'email'=> $request->email])
                                ->render();

        if(!empty($data))
        {
        return response()->json(['data'=>$data,'id'=>$request->prod_id]);
        }else{
        return response()->json('false');
        }

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////

    public function deleteProd($id)
    {
        $film = FilmProducer::find($id);
        $film->delete();

        return response()->json(['success'=>'done']);
    }


  //////////////////////////////////////////////////////////////////////////////////////////////


    public function addProduct(Request $request, $id =null)
    {

       $this->validate($request, [

              'product_name' => 'required|min:2',

       ]);


       
       if ($id == null) {
         
            $id = Session::get('create_film');

       }

       $product = new FilmProductionCompany();
       $product->name = $request->product_name;
       $product->film_id = $id;
       $product->save();
       
       $data = view('partials.render_product',['name'=>$product->name , 'id'=> $product->id])->render();

        if(!empty($data))
        {
        return response()->json($data);
        }else{
        return response()->json('false');
        }

    }
    //////////////////////////////////////////////////////////////

    public function editProduct(Request $request, $id =null)
    {


       $this->validate($request, [

              'name' => 'required|min:2',

       ]);


       
       if ($id == null) {
         
            $id = Session::get('create_film');

       }

       $product = FilmProductionCompany::find($request->product_id);
       $product->name = $request->name;
       $product->film_id = $id;
       $product->save();
       
       $data = view('partials.render_product',['name'=>$request->name , 'id'=> $request->product_id])
                                ->render();

        if(!empty($data))
        {
        return response()->json(['data'=>$data,'id'=>$request->product_id]);
        }else{
        return response()->json('false');
        }

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////

    public function deleteProduct($id)
    {
        $film = FilmProductionCompany::find($id);
        $film->delete();

        return response()->json(['success'=>'done']);
    }

    ////////////////////////////////////////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////////////////////////////////


    public function addDist(Request $request, $id =null)
    {

       $this->validate($request, [

              'dist_name' => 'required|min:2',

       ]);


       
       if ($id == null) {
         
            $id = Session::get('create_film');

       }

       $dist = new FilmDistribution();
       $dist->name = $request->dist_name;
       $dist->film_id = $id;
       $dist->save();
       
       $data = view('partials.render_dist',['name'=>$dist->name , 'id'=> $dist->id])->render();

        if(!empty($data))
        {
        return response()->json($data);
        }else{
        return response()->json('false');
        }

    }
    //////////////////////////////////////////////////////////////

    public function editDist(Request $request, $id =null)
    {


       $this->validate($request, [

              'name' => 'required|min:2',

       ]);


       
       if ($id == null) {
         
            $id = Session::get('create_film');

       }

       $dist = FilmDistribution::find($request->dist_id);
       $dist->name = $request->name;
       $dist->film_id = $id;
       $dist->save();
       
       $data = view('partials.render_dist',['name'=>$request->name , 'id'=> $request->dist_id])
                                ->render();

        if(!empty($data))
        {
        return response()->json(['data'=>$data,'id'=>$request->dist_id]);
        }else{
        return response()->json('false');
        }

    }

    ////////////////////////////////////////////////////////////////////////////////////////////////

    public function deleteDist($id)
    {
        $film = FilmDistribution::find($id);
        $film->delete();

        return response()->json(['success'=>'done']);
    }

      //////////////////////////////////////////////////////////////////////////////////////////////


    public function addTeam(Request $request, $id =null)
    {


       
       if ($id == null) {
         
            $id = Session::get('create_film');

       }

       $this->validate($request, [

              'first_name' => 'required|min:2',
              'last_name' => 'required|min:2',
              'role' => 'required',

       ]);

       $dist = new FilmTeam();
       $dist->first_name = $request->first_name;
       $dist->last_name = $request->last_name;
       $dist->type = $request->role;
       $dist->film_id = $id;
       $dist->save();
       
       $data = view('partials.render_team',
                    ['first_name'=>$dist->first_name ,'last_name'=>$dist->last_name ,
                    'role'=>$dist->type , 'id'=> $dist->id])->render();

        if(!empty($data))
        {
        return response()->json($data);
        }else{
        return response()->json('false');
        }

    }
    //////////////////////////////////////////////////////////////



      //////////////////////////////////////////////////////////////////////////////////////////////


    public function editTeam(Request $request, $id =null)
    {

       $this->validate($request, [

              'first_name' => 'required|min:2',
              'last_name' => 'required|min:2',
              'role' => 'required',

       ]);


       
       if ($id == null) {
         
            $id = Session::get('create_film');

       }

       $dist = FilmTeam::find($request->team_id);
       $dist->first_name = $request->first_name;
       $dist->last_name = $request->last_name;
       $dist->type = $request->role;
       $dist->film_id = $id;
       $dist->save();
       
       $data = view('partials.render_team',
                    ['first_name'=>$dist->first_name ,'last_name'=>$dist->last_name ,
                    'role'=>$dist->type , 'id'=> $dist->id])->render();

        if(!empty($data))
        {
        return response()->json(['data'=>$data,'id'=>$request->team_id]);
        }else{
        return response()->json('false');
        }

    }
    //////////////////////////////////////////////////////////////

    

    public function deleteTeam($id)
    {
        $film = FilmTeam::find($id);
        $film->delete();

        return response()->json(['success'=>'done']);
    }


    //////////////////////////////////////////////////////////////////

    public function addPoster(Request $request, $id =null)
    {
      
         $this->validate($request, [

            'film_poster' => 'required|image|mimes:jpeg,jpg,bmp,png',

         ]);

       if ($id == null) {
         
            $id = Session::get('create_film');

       }

        $path  = 'images/filmmaterials';

        if ($request->file('film_poster')) { 

        $film_poster  = $request->file('film_poster');
        $film_poster_name  = str_random(15).'.'.$film_poster
                                         ->getClientOriginalExtension();

        $film_poster->move($path,$film_poster_name);




        // start processing first image          
        $processed_path = 'images/processedfilms';
        $background = Image::canvas(159, 319);
        $image = Image::make($path.'/'.$film_poster_name)->resize(159, 319, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($processed_path.'/'.$film_poster_name);
        // end processing first image          




        // start processing second image          
        $processed = 'images/filmsprofile';        
        $background = Image::canvas(140, 209);
        $image = Image::make($path.'/'.$film_poster_name)->resize(140, 209, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($processed.'/'.$film_poster_name);
        // end processing second image          




        // start processing third image          
        $processed = 'images/filmssubmitted';        
        $background = Image::canvas(186, 98);
        $image = Image::make($path.'/'.$film_poster_name)->resize(186, 98, function ($c) {
            $c->aspectRatio();
            $c->upsize();
        });

        $background->insert($image, 'center');
        $background->save($processed.'/'.$film_poster_name);
        // end processing third image          

        }




          $film = \App\Film::find($id);
          $film->film_poster = $film_poster_name;

          $film->save();

          return response()->json(['success'=>'done']);


    }


    //////////////////////////////////////////////////////////////////

    public function addStill(Request $request, $id =null)
    {
      

       if ($id == null) {
         
            $id = Session::get('create_film');

       }

        $path  = 'images/filmmaterials';

        if ($request->file('film_still_one')) {
        $film_still_one         = $request->file('film_still_one');
        $film_still_one_name     = str_random(15).'.'.$film_still_one->getClientOriginalExtension();
        $film_still_one->move($path,$film_still_one_name);
        }

        if ($request->file('film_still_two')) {
          $film_still_two         = $request->file('film_still_two');
          $film_still_two_name     = str_random(15).'.'.$film_still_two->getClientOriginalExtension();
          $film_still_two->move($path,$film_still_two_name);
        }

        if ($request->file('film_still_three')) {
          $film_still_three         = $request->file('film_still_three');
          $film_still_three_name     = str_random(15).'.'.$film_still_three->getClientOriginalExtension();
          $film_still_three->move($path,$film_still_three_name);
        }

        if ($request->file('film_still_four')) {
          $film_still_four         = $request->file('film_still_four');
          $film_still_four_name     = str_random(15).'.'.$film_still_four->getClientOriginalExtension();
          $film_still_four->move($path,$film_still_four_name);
        }



          $film = \App\Film::find($id);


          if ($request->file('film_still_one')) {
            $film->film_still_one = $film_still_one_name;
          }

          if ($request->file('film_still_two')) {
            $film->film_still_two = $film_still_two_name;
          }

          if ($request->file('film_still_three')) {
             $film->film_still_three = $film_still_three_name;
          }

          if ($request->file('film_still_four')) {
            $film->film_still_four = $film_still_four_name;
          }


          $film->save();



         return back();

    }

//////////////////////////////////////////////////////////////////

    public function addDirPhoto(Request $request, $id =null)
    {
      
         $this->validate($request, [

             'director_photo' => 'required|image|mimes:jpeg,jpg,bmp,png',

         ]);

       if ($id == null) {
         
            $id = Session::get('create_film');

       }

        $path  = 'images/filmmaterials';

        if ($request->file('director_photo')) {

        $director_photo         = $request->file('director_photo');
        $director_photo_name     = str_random(15).'.'.$director_photo->getClientOriginalExtension();
        $director_photo->move($path,$director_photo_name);

        }

          $film = \App\Film::find($id);

         if ($request->file('director_photo')) {
         
           $film->director_photo = $director_photo_name;
         }  

          $film->save();

          return response()->json(['success'=>'done']);


    }


//////////////////////////////////////////////////////////////////

    public function addDialogue(Request $request, $id =null)
    {
      

       if ($id == null) {
         
            $id = Session::get('create_film');

       }

        $path  = 'images/filmmaterials';

        if ($request->file('dialogue_list')) {
        $dialogue_list         = $request->file('dialogue_list');
        $dialogue_list_name     = str_random(15).'.'.$dialogue_list->getClientOriginalExtension();
        $dialogue_list->move($path,$dialogue_list_name);
        }

          $film = \App\Film::find($id);

          if ($request->file('dialogue_list')) {

            $film->dialogue_list = $dialogue_list_name;
            $film->dialogue_list_original = $dialogue_list->getClientOriginalName();

          }


          $film->save();

          return response()->json(['success'=>'done']);


    }


//////////////////////////////////////////////////////////////////

    public function addPress(Request $request, $id =null)
    {


       if ($id == null) {
         
            $id = Session::get('create_film');

       }

        $path  = 'images/filmmaterials';

        if ($request->file('press_kit')) {
        $press_kit         = $request->file('press_kit');
        $press_kit_name     = str_random(15).'.'.$press_kit->getClientOriginalExtension();
        $press_kit->move($path,$press_kit_name);
        }

          $film = \App\Film::find($id);

          if ($request->file('press_kit')) {
          $film->press_kit = $press_kit_name;
          $film->press_kit_original = $press_kit->getClientOriginalName();

          }


          $film->save();

          return response()->json(['success'=>'done']);


    }


    //////////////////////////////////////////////////////////////////

    public function addSubtitle(Request $request,$id = null)
    {


         if ($id == null) {
           
              $id = Session::get('create_film');

         }

        $path  = 'images/filmmaterials';

        $file = $request->file('subtitles');

        $name = str_random(4).$file->getClientOriginalName();

        $file->move('uploads',$name);
       
         $film = Film::find($id);
         $film->subtitles()->create(['path'=> url($path.'/'.$name),
                                     'name'=>$file->getClientOriginalName() ]);


         return back();



    }


    //////////////////////////////////////////////////////////////////

    public function addOtherMaterial(Request $request,$id = null)
    {

         if ($id == null) {
           
              $id = Session::get('create_film');

         }

        $path  = 'images/filmmaterials';

        $file = $request->file('other_material');

        $name = str_random(4).$file->getClientOriginalName();

        $file->move($path,$name);
       
         $film = Film::find($id);

         $film->otherMaterial()->create(['path'=> url($path.'/'.$name),
                                     'name'=>$file->getClientOriginalName() ]);

         return back();



    }

   ////////////////////////////////////////////////////////////////

        public function addLinks(Request $request, $id =null)
    {


       $this->validate($request, [

              'website_url' => 'active_url',
              'facebook_link' => 'active_url',
              'twitter_link' => 'active_url',
              'instagram_link' => 'active_url',
              'trailer_link' => 'active_url',
              'imdb_link' => 'active_url',

       ]);


       if ($id == null) {
         
            $id = Session::get('create_film');

       }

       $dist = Film::find($id);
       $dist->website_url = $request->website_url;
       $dist->facebook_link = $request->facebook_link;
       $dist->twitter_link = $request->twitter_link;
       $dist->instagram_link = $request->instagram_link;
       $dist->trailer_link = $request->trailer_link;
       $dist->imdb_link = $request->imdb_link;
       $dist->save();
       
        return response()->json(['success'=>'done']);

    }


   ////////////////////////////////////////////////////////////////

      public function addAwards(Request $request, $id =null)
    {



       if ($id == null) {
         
            $id = Session::get('create_film');

       }


       $ids = DB::table('films')->where(function ($query)
       {
        
           $query->where('film_poster','=','sowkfko.xsr')
                      ->orWhere('film_still_one','=','sowkfko.xsr')
                      ->orWhere('director_photo','=','sowkfko.xsr');

       })->pluck('id');      


      if (in_array($id, $ids)) {
        return response()->json(['success'=>'completed']);
      }


       $this->validate($request, [

              'awards' => 'min:8',
              'selection' => 'min:8',

       ]);


       $dist = Film::find($id);
       $dist->awards = $request->awards;
       $dist->selection = $request->selection;
       $dist->save();
       
       if ($request->private == 'pr') {

        
        return response()->json(['success'=>'done','type'=>'pr','id'=>$id]);

       } else {

        return response()->json(['success'=>'done','type'=>'pu']);
       }
       

    }
    //////////////////////////////////////////////////////////////

    public function deleteFilm($id)
    {
       $film = Film::find($id);
       $film->delete();

       return response()->json(['sucsess'=>'true']);
    }

    ////////////////////////////////////////////////////////////////

    public function showMap(Request $request)
    {

          $array = [];

          foreach (array_keys(countryTable()) as $key => $value) {
             
            $array[] =  \App\FilmMaker::where('country_in_map',$value)->count();
          }

          $array = array_combine(array_values(countryTable()), $array);

          return response()->json(['data' => $array]);


    }

    ///////////////////////////////////////////////////////////////////////

    public function dialogueList(Request $request,$id)
    {

          $file_name = \App\Film::find($id)->dialogue_list; 

          $file = 'images/filmmaterials'.'/'.$file_name;

          if (file_exists($file))
          {
              $file = File::get($file);
              $response = Response::make($file, 200);
              // using this will allow you to do some checks on it (if pdf/docx/doc/xls/xlsx)

            $content_types = [
                  'application/octet-stream', // txt etc
                  'application/msword', // doc
                  'application/vnd.openxmlformats-officedocument.wordprocessingml.document', //docx
                  'application/vnd.ms-excel', // xls
                  'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // xlsx
                  'application/pdf', // pdf
              ];


              $response->header('Content-Type', $content_types);

              return $response;
          }else{

            return 'lol';
          }

    }
    ///////////////////////////////////////////////////////////////////////

    public function pressKit(Request $request,$id)
    {

          $file_name = \App\Film::find($id)->press_kit; 

          $file = 'images/filmmaterials'.'/'.$file_name;

          if (file_exists($file))
          {
              $file = File::get($file);
              $response = Response::make($file, 200);

              // using this will allow you to do some checks on it (if pdf/docx/doc/xls/xlsx)
              $content_types = [
                  'application/octet-stream', // txt etc
                  'application/msword', // doc
                  'application/vnd.openxmlformats-officedocument.wordprocessingml.document', //docx
                  'application/vnd.ms-excel', // xls
                  'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // xlsx
                  'application/pdf', // pdf
              ];

              $response->header('Content-Type', 'application/msword');

              return $response;
          }else{

            return 'lol';
          }

    }
    //////////////////////////////////////////////////////////

    public function deleteDialogue(Request $request, $id)
    {
          $film = \App\Film::find($id);
          $film->dialogue_list = 'nofile.no';
          $film->save();
    }


    //////////////////////////////////////////////////////////

    public function deletePress(Request $request, $id)
    {
          $film = \App\Film::find($id);
          $film->press_kit = 'nofile.no';
          $film->save();
    }




    //////////////////////////////////////////////////////////

    public function deleteSub(Request $request, $id, $film_id)
    {

          $film = \App\FilmSubtitle::find($id);

          $film->delete();

          return back();
    }






    //////////////////////////////////////////////////////////

    public function deleteMat(Request $request, $id, $film_id)
    {

          $film = \App\FilmOtherMaterial::find($id);

          $film->delete();

          return back();
    }


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

    /* filter festivals */
    public function filterFestival(Request $request)
    {



        $my_film       = $request->my_film;
        $film_category = $request->film_category;
        $country       = $request->country;
        $duration_time = $request->duration_time;
        $fees          = $request->fees;

        if ($my_film != '0') {

          Session::set('my_film',$my_film);
        
        }

        $query = DB::table('festival_competetions')->select('*');

        
        $festivals_coutries = [];
        $check = 0;

        if ($country != 'cat') {


          $festivals_coutries = \App\Festival::where('country',$country)
                                  ->pluck('id')
                                  ->toArray();

          if (count($festivals_coutries) == 0) {
            
            $check = 1;
          }                        
       
        }
    


        if ($fees == 'no') {

           $query->where('fees',0);

        }elseif($fees == "yes"){
          $query->where('fees','>',0);
        }

        if ($duration_time != '0') {

           $query->where('max_duration', '<=', $duration_time);

        }



        if ($film_category != 'cate') {

          $comp_ids = [];
          foreach (CompCat::all() as $key) {
              
              if ($key->name != 'all') {
                 
                 $comp_ids[] = $key->competetion_id;
              }

          }

         $comp_ids = array_unique($comp_ids);
         $comp_all = CompCat::whereIn('competetion_id',$comp_ids)
                            ->where('name',$film_category)
                            ->pluck('competetion_id');

         $query->whereIn('id',$comp_all);                   

        }
        


        $festivals = array_unique($query->pluck('festival_id'));



        $film = Session::get('my_film');


        $submitted_festivals_ids = array_unique(\App\FilmSubmit::where('film_id',$film)
                                              ->pluck('festival_id')
                                              ->toArray());


        $festivals = array_unique($query->pluck('festival_id'));

        


        if (count($festivals_coutries) > 0 || $check == 1) {

           $festivals = array_intersect($festivals, $festivals_coutries);
        }



        if (count($festivals) == 0) {

            return response()->json('false');

        }   


        $submitted_festivals_ids = array_intersect($submitted_festivals_ids, $festivals);
        $submitted_festivals = \App\Festival::whereIn('id',$submitted_festivals_ids);
                                            
        $page = $request->get('page', 1);

        $paginate = 2;

        $festivals = \App\Festival::whereIn('id',$festivals)
                                   ->whereNotIn('id',$submitted_festivals_ids)
                                   ->union($submitted_festivals)
                                   ->get()
                                   ->toArray();


        $slice = array_slice($festivals, $paginate * ($page - 1), $paginate);
        $festivals = new Paginator($slice,count($festivals), $paginate);

        $fesivals = \App\Festival::whereIn('id',$festivals)->get();


        $data = view('partials.festivals_pagination',compact('festivals'))->render();


        if(!empty($data))
        {
        return response()->json(['html'=>$data]);
        }else{
        return response()->json('false');
        }


    }

////////////////////////////////////////////////////////////////////////

    public function submitAfilm(Request $request)
    {


        $comp = \App\FestivalCompetetion::find($request->comp);

        if ($comp->submission_begins > date("Y-m-d")) {
              
              $sub_date = 'true';

        }else {

              $sub_date = 'false';          
        }




        $reasons = [];


          if ($comp->submission_begins > date("Y-m-d")) {
            
              $reasons[] = 'date';              

              $view = view('partials.obstacles',compact('reasons','comp'))->render();
              return response()->json(['view'=>$view,'sub_date'=>$sub_date,'success'=>'bug']);

          }




       if (Session::has('my_film')) {
          
          $film = \App\Film::find(Session::get('my_film'));

          $comp = \App\FestivalCompetetion::find($request->comp);
          $festival_id = $comp->festival_id;




        /* start check film production_country */
        if ($film->production_country == "") {

            $comp_country = json_decode($comp->countries);
            if (in_array('all',$comp_country) == false) {

            $reasons[] = 'country';              

            } 
        }

        if ($film->production_country != "") {
          
            $comp_country = json_decode($comp->countries);
            $prod_country = json_decode($film->production_country);
            $arr = array_intersect($comp_country,$prod_country);

            if (in_array('all',$comp_country) == false && count($arr) == 0) {

            $reasons[] = 'country';              

            } 
            
        }
        /* end check film production_country */



        /* start check film languages */ 
        if ($film->film_languages == "") {

            $comp_country = json_decode($comp->film_languages);
            if (in_array('All Languages',$comp_country) == false) {

            $reasons[] = 'languages';              

            } 
        }


        if ($film->film_languages != "") {
          
            $comp_country = json_decode($comp->film_languages);
            $prod_country = json_decode($film->film_languages);
            $arr = array_intersect($comp_country,$prod_country);

            if (in_array('All Languages',$comp_country) == false && count($arr) == 0) {

         //   return response()->json(['success'=>'languages']);              
            $reasons[] = 'languages';              

            } 
            
        }
        /* end check film languages */



        /* start check film languages of subtitle */        
        if ($film->subtitles_languages == "") {

            $comp_country = json_decode($comp->film_lang_subtitle);
            if (in_array('All Languages',$comp_country) == false) {

            $reasons[] = 'subtitles';              

            } 
        }


        if ($film->subtitles_languages != "") {
          
            $comp_country = json_decode($comp->film_lang_subtitle);
            $prod_country = json_decode($film->subtitles_languages);
            $arr = array_intersect($comp_country,$prod_country);

            if (in_array('All Languages',$comp_country) == false && count($arr) == 0) {

           // return response()->json(['success'=>'subtitles']);              
            $reasons[] = 'subtitles';              


            } 
            
        }
        /* end check film languages of subtitles */



          // start check max duration
          if ($comp->max_duration < $film->duration) {
            
        //    return response()->json(['success'=>'max_duration']);
            $reasons[] = 'max_duration';              

          }
          /* end check max duration */


          /* start check film deadline  */
          if ($comp->deadline < date("Y-m-d")) {
            
          //  return response()->json(['success'=>'deadline']);
            $reasons[] = 'deadline';              

          }
         /* start check film deadline  */



          /* start check film production_date  */
          if ($comp->production_date > $film->production_date) {
            
            //return response()->json(['success'=>'production_date']);
            $reasons[] = 'production_date';              

          }
         /* start check film production_date  */



          /* start check film submission_begins  */
          if ($comp->submission_begins > date("Y-m-d")) {
            
           // return response()->json(['success'=>'submission','date'=>
             // date("d-m-Y", strtotime($comp->submission_begins))]);
            $reasons[] = 'submission';              

          }
         /* start check film submission_begins  */



        /* start check film themes  */
          $themes = [];
          foreach ($film->themes as $key) {
            $themes[]= $key->name;
          }


        if (count($themes) == 0) {

            $comp_themes = json_decode($comp->film_themes);
            if (in_array('all',$comp_themes) == false) {

            $reasons[] = 'themes';              

            } 
        }
            
        if (count($themes) > 0) {
          
            $comp_themes = json_decode($comp->film_themes);
            $themes_arr = array_intersect($comp_themes,$themes);
            if (in_array('all',$comp_themes) == false && count($themes_arr) == 0) {

            $reasons[] = 'themes';              

            } 
            
        }
        /* end check film themes  */



        /* start check film categories  */
        $categories = [];
          foreach ($film->categories as $key) {
            $categories[]= $key->name;
          }

        if (count($categories) == 0) {

            $comp_categories = json_decode($comp->film_categories);
            if (in_array('all',$comp_categories) == false) {

            $reasons[] = 'categories';              

            } 
        }
            

        if (count($categories) > 0) {
          
            $comp_categories = json_decode($comp->film_categories);
            $categories_arr = array_intersect($comp_categories,$categories);

            if (in_array('all',$comp_categories) == false && count($categories_arr) == 0) {

          //  return response()->json(['success'=>'categories']);              
            $reasons[] = 'categories';              

            } 
            
        }
        /* end check film categories  */



        /* start check film genres  */      
          $genres = [];
          foreach ($film->genres as $key) {
            $genres[]= $key->name;
          }

        if (count($genres) == 0) {

            $comp_genres = json_decode($comp->film_genres);
            if (in_array('all',$comp_genres) == false) {

            $reasons[] = 'genres';              

            } 
        }
            

        if (count($genres) > 0) {
          
            $comp_genres = json_decode($comp->film_genres);
            $genres_arr = array_intersect($comp_genres,$genres);

            if (in_array('all',$comp_genres) == false && count($genres_arr) == 0) {

            $reasons[] = 'genres';              

            } 
            
        }
        /* end check film genres  */


            if (count($reasons) > 0) {

              $view = view('partials.obstacles',compact('reasons'))->render();
              return response()->json(['view'=>$view,'success'=>'bug','sub_date'=>$sub_date]);
            }

           
          if (!\App\FilmSubmit::where(['film_id'=>Session::get('my_film'),
                                         'competetion_id'=>$request->comp])->exists()) {
            
            if ($comp->fees < 1) {

                $sub = new \App\FilmSubmit();
                $sub->film_id = Session::get('my_film');
                $sub->competetion_id = $request->comp;
                $sub->amount = 0;
                $sub->charge_id = 0;
                $sub->charge_state = 'free';
                $sub->festival_id = $festival_id;
                $sub->save();

              return response()->json(['success'=>'free']);

              }else{

              Session::set('comp_id',$request->comp);
              Session::set('festival_id',$festival_id);

               return response()->json(['success'=>'true','my_film'=>Session::get('my_film'), 'comp' => $request->comp ,'festival_id' => $festival_id]);

              }



            }else{
              return response()->json(['success'=>'submitted_before','sub_date'=>$sub_date]);
            }



       }else{

            return response()->json(['success'=>'no_film','sub_date'=>$sub_date]);

       }
       
    }

/////////////////////////////////////////////////////////////////

    public function searchMap(Request $request)
    {
     
      $query = DB::table('users')
            ->join('film_makers', 'users.id', '=', 'film_makers.user_id')
            ->select('users.*', 'film_makers.*')
            ->orderBy('users.id','asc');

      if ($request->country != '0') {
        
        $query->where('film_makers.country_in_map',$request->country);

      }

      if ($request->film_maker != '') {
        
        $query->where('users.fullname','like','%'.$request->film_maker.'%');

      }

      $users = $query->get();

      $html = view('layouts.profile',compact('users'))->render();

      if ($html != '') {
        
         return response()->json(['html'=>$html]);

      } else {

         return response()->json(false);
      }
      
    
    }

/////////////////////////////////////////////////////////////////    
}