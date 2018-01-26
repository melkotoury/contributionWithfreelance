<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use Carbon;
use Session;
use DB;
use Start;
use Image;
 
class SortingController extends Controller
{
    

	public function sortAlpha(Request $request)
	{

        $status    = $request->status; // toggle between click
        $type      = $request->type; // o means COMP, 1 means FOLDER
        $folder_id = $request->folder; // folder ID
        $comp_id   = $request->id; // COMPETETION ID

		if ($type == 0) {

			$films = showCompSubmittedFilms($comp_id)[0];
			$festival = showCompSubmittedFilms($comp_id)[1];

		} else {

			$films = showFolderFilms($folder_id)[0];
			$festival = showFolderFilms($folder_id)[1];
		}

		$status = $request->status;

		// check status
		if ($status ==  0) {

		$films = $films->orderBy('english_title','asc')->paginate(5);


		} else {

		$films = $films->orderBy('english_title','desc')->paginate(5);


		}
		// end check status



	      if (count($films) > 0) {

	          $view = view('layouts.film',['films' => $films,'festival'=>$festival ])->render();
	          return response()->json(['success'=>'true','html'=>$view]);

	      }else{

	         return response()->json(['success'=>'false']);
	      }


	}


	/* ================================================
	=
	=
	=  SORT ACCORDING TO SUBMISSION DATE
	=
	=
	=====================================================*/


	public function sortSubDate(Request $request)
	{

		

        $status    = $request->status; // toggle between click
        $type      = $request->type; // o means COMP, 1 means FOLDER
        $folder_id = $request->folder; // folder ID
        $comp_id   = $request->id; // COMPETETION ID

		// check status
		if ($status ==  0) {


			if ($type == 0) {

				$films = joinFilmsWithSubmitted('asc',$comp_id)[0]->paginate(5);
				$festival = showSubmittedFilms()[1];
			} else {

				$films = joinFilmsWithSubmittedInFolder($folder_id,'asc')[0]->paginate(5);
				$festival = showFolderFilms($folder_id)[1];
			}



		} else {


			if ($type == 0) {

				$films = joinFilmsWithSubmitted('desc',$comp_id)[0]->paginate(5);
				$festival = showSubmittedFilms()[1];
			} else {

				$films = joinFilmsWithSubmittedInFolder($folder_id,'desc')[0]->paginate(5);
				$festival = showFolderFilms($folder_id)[1];
			}





		}
		// end check status



	      if (count($films) > 0) {

	          $view = view('layouts.film',['films' => $films,'festival'=>$festival ])->render();
	          return response()->json(['success'=>'true','html'=>$view]);

	      }else{

	         return response()->json(['success'=>'false']);
	      }


	}





	/* ================================================
	=
	=
	=  SORT ACCORDING TO FILM PRODUCTION DATE
	=
	=
	=====================================================*/


	public function sortProdDate(Request $request)
	{
        $status    = $request->status; // toggle between click
        $type      = $request->type; // o means COMP, 1 means FOLDER
        $folder_id = $request->folder; // folder ID
        $comp_id   = $request->id; // COMPETETION ID

		if ($type == 0) {

			$films = showCompSubmittedFilms($comp_id)[0];
			$festival = showCompSubmittedFilms($comp_id)[1];

		} else {

			$films = showFolderFilms($folder_id)[0];
			$festival = showFolderFilms($folder_id)[1];
		}

		$status = $request->status;

		// check status
		if ($status ==  0) {

		$films = $films->orderBy('production_date','asc')->paginate(5);


		} else {

		$films = $films->orderBy('production_date','desc')->paginate(5);


		}
		// end check status



	      if (count($films) > 0) {

	          $view = view('layouts.film',['films' => $films,'festival'=>$festival ])->render();
	          return response()->json(['success'=>'true','html'=>$view]);

	      }else{

	         return response()->json(['success'=>'false']);
	      }



	}








	/* ================================================
	=
	=
	=  SORT ACCORDING TO FILM DURATION.
	=
	=
	=====================================================*/


	public function sortDuration(Request $request,$id = 0)
	{

        $status    = $request->status; // toggle between click
        $type      = $request->type; // o means COMP, 1 means FOLDER
        $folder_id = $request->folder; // folder ID
        $comp_id   = $request->id; // COMPETETION ID

		if ($type == 0) {

			$films = showCompSubmittedFilms($comp_id)[0];
			$festival = showCompSubmittedFilms($comp_id)[1];

		} else {

			$films = showFolderFilms($folder_id)[0];
			$festival = showFolderFilms($folder_id)[1];
		}

		$status = $request->status;

		// check status
		if ($status ==  0) {

		$films = $films->orderBy('duration','asc')->paginate(5);


		} else {

		$films = $films->orderBy('duration','desc')->paginate(5);


		}
		// end check status



	      if (count($films) > 0) {

	          $view = view('layouts.film',['films' => $films,'festival'=>$festival ])->render();
	          return response()->json(['success'=>'true','html'=>$view]);

	      }else{

	         return response()->json(['success'=>'false']);
	      }




	}




	/* ================================================
	=
	=
	=  SORT ALL FESTIVALS
	=
	=
	=====================================================*/



	public function sortFestivalsAll()
	{



     $festivals = DB::table('festivals')
                ->join('festival_competetions', 'festivals.id', '=', 'festival_competetions.festival_id')
                ->orderBy('festival_competetions.deadline','asc')
                ->where('festival_competetions.deadline','>=',date("Y-m-d"))
                ->select('festivals.*')
                ->groupBy('festivals.id')
				->paginate(15);
                    

        $data = view('partials.fest_teaser',compact('festivals'))->render();


        if(!empty($data))
        {
        return response()->json(['html'=>$data]);
        }else{
        return response()->json('false');
        }

     }


	/* ================================================
	=
	=
	=  SORT ALL FESTIVALS
	=
	=
	=====================================================*/



	public function sortFestivalsDate()
	{


     $festivals = DB::table('festivals')
                ->join('festival_competetions', 'festivals.id', '=', 'festival_competetions.festival_id')
                ->orderBy('festival_competetions.comp_from','asc')
                ->where('festival_competetions.comp_from','>',date("Y-m-d"))
                ->select('festivals.*')
                ->groupBy('festivals.id')
				->paginate(15);
                    
					

        $data = view('partials.fest_teaser',compact('festivals'))->render();


        if(!empty($data))
        {
        return response()->json(['html'=>$data]);
        }else{
        return response()->json('false');
        }
	}


	/* ================================================
	=
	=
	=  SORT ALL FESTIVALS
	=
	=
	=====================================================*/


	public function sortFestivalsDeadline()
	{




     $festivals = DB::table('festivals')
                ->join('festival_competetions', 'festivals.id', '=', 'festival_competetions.festival_id')
                ->orderBy('festival_competetions.deadline','asc')
             	 ->where('festival_competetions.deadline','>=',date("Y-m-d"))
                ->select('festivals.*')
                ->groupBy('festivals.id')
				->paginate(15);
        
        $data = view('partials.fest_teaser',compact('festivals'))->render();


        if(!empty($data))
        {
        return response()->json(['html'=>$data]);
        }else{
        return response()->json('false');
        }
	}


	/* ================================================
	=
	=
	=  SORT ALL FESTIVALS
	=
	=
	=====================================================*/



	public function sortComp($id,$festival_id)
	{


		$festival = \App\Festival::find($festival_id);
		$comp     = \App\FestivalCompetetion::find($id);
		$sub      = \App\FilmSubmit::where('competetion_id',$comp->id);
		$films    =  $sub->get()->pluck('film_id');

		$moved    = \App\Move::where('festival_id',$festival->id)->pluck('film_id');
		$films    = \App\Film::whereIn('id',$films)
		                   ->whereNotIn('id',$moved)
		                   ->paginate(5);


	      if (count($films) > 0) {

	          $view = view('layouts.film',['films' => $films,'festival'=>$festival ])->render();
	          return response()->json(['success'=>'true','html'=>$view]);

	      }else{

	         return response()->json(['success'=>'false']);
	      }

	}







}
