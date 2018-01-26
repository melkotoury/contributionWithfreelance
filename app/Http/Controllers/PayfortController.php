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



class PayfortController extends Controller
{


  public function showPayfortSuccess()
  {
    return view('payfort_success');
  }

  ////////////////////////////////////////////////////////////

    public function showPayfort(Request $request,$comp,$film,$festival)
    {
    
        $api_keys = array(
            "secret_key" => Site::firstOrCreate(['id' => 1])->secret_key,
            "open_key"   => Site::firstOrCreate(['id' => 1])->open_key
        );
    
        $comp = Comp::find($comp);
        $fees = $comp->fees;

        /* convert 10.00 AED to cents */
        $amount_in_cents = $fees * 100;
        $currency = Site::firstOrCreate(['id' => 1])->currency;
        $customer_email = Auth::user()->email;


        return view('payfort',compact('api_keys','amount_in_cents','currency','customer_email'));
    }

  //////////////////////////////////////////////////////////////

  public function showPayfortFilm($film)
  {
        $api_keys = array(
            "secret_key" => Site::firstOrCreate(['id' => 1])->secret_key,
            "open_key"   => Site::firstOrCreate(['id' => 1])->open_key
        );
    
        $fees = Site::firstOrCreate(['id' => 1])->film_fees;

        /* convert 10.00 AED to cents */
        $amount_in_cents = $fees * 100;
        $currency = Site::firstOrCreate(['id' => 1])->currency;
        $customer_email = Auth::user()->email;

        $elites = array_unique(\App\Elite::pluck('user_id')->toArray());

        if (in_array(Auth::user()->id, $elites) ) {
          
          $elit_fees = \App\Elite::where('user_id',Auth::user()
                                       ->id)->first()
                                       ->film_fees;

          if ($elit_fees != 0) {

          $amount_in_cents = \App\Elite::where('user_id',Auth::user()
                                       ->id)->first()
                                       ->film_fees * 100;

          } else {

            $amount_in_cents = 0;

          }

        }

        return view('show_film_pay',compact('api_keys','amount_in_cents','currency','customer_email','film'));
  }

  ///////////////////////////////////////////////////////////////

  public function processPayfort(Request $request,$amount)
  {


      $api_keys = array(
          "secret_key" => Site::firstOrCreate(['id' => 1])->secret_key,
          "open_key"   => Site::firstOrCreate(['id' => 1])->open_key
      );



      # Read the fields that were automatically submitted by beautiful.js
      $token = $request->startToken;
      $email = $request->startEmail;

      # Setup the Start object with your private API key
      Start::setApiKey($api_keys["secret_key"]);

      # Process the charge
      try {
          $charge = \Start_Charge::create(array(
              "amount"      => $amount,
              "currency"    => Site::firstOrCreate(['id' => 1])->currency,
              "card"        => $token,
              "email"       => $email,
              "ip"          => $_SERVER["REMOTE_ADDR"],
              "description" => "Charge Description"
          ));

          //echo "<h1>Successfully charged 10.00 AED</h1>";
          //echo "<p>Charge ID: ".$charge["id"]."</p>";
          //echo "<p>Charge State: ".$charge["state"]."</p>";

          $sub = new \App\FilmSubmit();
          $sub->film_id = Session::get('my_film');
          $sub->competetion_id = Session::get('comp_id');
          $sub->amount = $amount/100;
          $sub->charge_id = $charge["id"];
          $sub->charge_state = $charge["state"];
          $sub->festival_id = Session::get('festival_id');
          $sub->save();

          return view('payfort_success');

      } catch (Start_Error $e) {

          $error_code = $e->getErrorCode();
          $error_message = $e->getMessage();

          /* depending on $error_code we can show different messages */
          if ($error_code === "card_declined") {
              echo "<h1>Charge was declined</h1>";
          } else {
              echo "<h1>Charge was not processed</h1>";
          }
          echo "<p>".$error_message."</p>";
      }

  }

  

  ///////////////////////////////////////////////////////////////

  public function processFilmPayfort(Request $request,$amount,$film)
  {


      $api_keys = array(
          "secret_key" => Site::firstOrCreate(['id' => 1])->secret_key,
          "open_key"   => Site::firstOrCreate(['id' => 1])->open_key
      );



      # Read the fields that were automatically submitted by beautiful.js
      $token = $request->startToken;
      $email = $request->startEmail;

      # Setup the Start object with your private API key
      Start::setApiKey($api_keys["secret_key"]);

      # Process the charge
      try {
          $charge = \Start_Charge::create(array(
              "amount"      => $amount,
              "currency"    => Site::firstOrCreate(['id' => 1])->currency,
              "card"        => $token,
              "email"       => $email,
              "ip"          => $_SERVER["REMOTE_ADDR"],
              "description" => "Charge Description"
          ));

          $sub = new \App\Transaction();
          $sub->film_id = $film;
          $sub->amount = $amount/100;
          $sub->charge_id = $charge["id"];
          $sub->charge_state = $charge["state"];
          $sub->save();

          $fil = \App\Film::find($film);
          $fil->completed = 1;
          $fil->save();

          return view('process_film_pay');

      } catch (Start_Error $e) {

          $error_code = $e->getErrorCode();
          $error_message = $e->getMessage();

          /* depending on $error_code we can show different messages */
          if ($error_code === "card_declined") {
              echo "<h1>Charge was declined</h1>";
          } else {
              echo "<h1>Charge was not processed</h1>";
          }
          echo "<p>".$error_message."</p>";
      }

  }

  /////////////////////////////////////////////////////////




}
