<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Psr7\uri_for;
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
use Paypal;
use Redirect;
use PayPalConnectionException;
use Start_Error_Banking;
use Start_Error_Authentication;
use Start_Error_Request;
use Start_Error_SSLError;
use Start_Error;


class PaymentController extends Controller
{
//    private $_apiContext;
//    public function __construct()
//    {
//        $this->_apiContext = PayPal::ApiContext(
//            config('services.paypal.client_id'),
//            config('services.paypal.secret'));
//
//        $this->_apiContext->setConfig(array(
//            'mode' => 'sandbox',
//            'service.EndPoint' => 'https://api.sandbox.paypal.com',
//            'http.ConnectionTimeOut' => 30,
//            'log.LogEnabled' => true,
//            'log.FileName' => storage_path('logs/paypal.log'),
//            'log.LogLevel' => 'FINE'
//        ));
//
//    }


    public function ucService()
    {
        return view('tmp_service_under_construction');
    }
    public function showPayfortSuccess()
    {
        return view('payfort_success');
    }



    ////////////////////////////////////////////////////////////

    public function showPayment(Request $request,$comp,$film,$festival)
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

    ////////////////////////////////////////////////////////////

    public function showWaiverPayment(Request $request,$waiver_amount,$waiver)
    {
        $code    = $waiver;
        $coupons = \App\Waiver::pluck('waiver')->toArray();
        $active  = \App\Waiver::where('waiver',$code)->first();

        if ($active->value_waiver > 0 && $active->active === 0) {
            // di activate it
            $active->active = 1;
            $active->save();
        }


        $api_keys = array(
            "secret_key" => Site::firstOrCreate(['id' => 1])->secret_key,
            "open_key"   => Site::firstOrCreate(['id' => 1])->open_key
        );

        $fees = $waiver_amount;

        /* convert 10.00 AED to cents */
        $amount_in_cents = $fees * 100;
        $currency = Site::firstOrCreate(['id' => 1])->currency;
        $customer_email = Auth::user()->email;


        return view('pay_waiver',compact('api_keys','amount_in_cents','currency','customer_email'));
    }

    //////////////////////////////////////////////////////////////

    public function showPaymentFilm($film)
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

        }  catch(Start_Error_Banking $e) {
            // Since it's a decline, Start_Error_Banking will be caught
//            print('Status is:' . $e->getHttpStatus() . "\n");
//            print('Code is:' . $e->getErrorCode() . "\n");
//            print('Message is:' . $e->getMessage() . "\n");
            $status = $e->getHttpStatus();
            $code   = $e->getErrorCode();
            $message = $e->getMessage();
            return view("payment_fail",compact(['status','code' , 'message']));

        } catch (Start_Error_Request $e) {
            // Invalid parameters were supplied to Start's API
            $status = $e->getHttpStatus();
            $code   = $e->getErrorCode();
            $message = $e->getMessage();
            return view("payment_fail",compact(['status','code' , 'message']));

        } catch (Start_Error_Authentication $e) {
            // There's a problem with that API key you provided
            $status = $e->getHttpStatus();
            $code   = $e->getErrorCode();
            $message = $e->getMessage();
            return view("payment_fail",compact(['status','code' , 'message']));

        } catch (Start_Error $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email

            $status = $e->getHttpStatus();
            $code   = $e->getErrorCode();
            $message = $e->getMessage();
            return view("payment_fail",compact(['status','code' , 'message']));
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Start
            $status = $e->getHttpStatus();
            $code   = $e->getErrorCode();
            $message = $e->getMessage();
            return view("payment_fail",compact(['status','code' , 'message']));
        }

    }



    ///////////////////////////////////////////////////////////////

   public function processPaypal(Request $request,$amount){
       $payer = Paypal::Payer();
       $payer->setPaymentMethod('paypal');

       $paypal_amount = Paypal:: Amount();
       $paypal_amount->setCurrency('USD');
       $paypal_amount->setTotal($amount); // This is the simple way,
       // you can alternatively describe everything in the order separately;
       // Reference the PayPal PHP REST SDK for details.

       $transaction = Paypal::Transaction();
       $transaction->setAmount($paypal_amount);
       $transaction->setDescription('Film Submission Fees');

       $redirectUrls = Paypal:: RedirectUrls();
       $redirectUrls->setReturnUrl(action('PaymentController@getDone'));
       $redirectUrls->setCancelUrl(action('PaymentController@getCancel'));

       $payment = Paypal::Payment();
       $payment->setIntent('sale');
       $payment->setPayer($payer);
       $payment->setRedirectUrls($redirectUrls);
       $payment->setTransactions(array($transaction));

       $response = $payment->create($this->_apiContext);
       $redirectUrl = $response->links[1]->href;

       return Redirect::to( $redirectUrl );
   }

   public function getDone(Request $request)
   {
       $id = $request->get('paymentId');
       $token = $request->get('token');
       $payer_id = $request->get('PayerID');
       $payment = Paypal::getById($id, $this->_apiContext);

       $paymentExecution = Paypal::PaymentExecution();

       $paymentExecution->setPayerId($payer_id);
       $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

       // Clear the shopping cart, write to database, send notifications, etc.
       $sub = new \App\FilmSubmit();
       $sub->film_id = Session::get('my_film');
       $sub->competetion_id = Session::get('comp_id');
       $sub->amount = $amount/100;
       $sub->charge_id = $id;
       $sub->charge_state = $request->get('state');
       $sub->festival_id = Session::get('festival_id');
       $sub->save();
       // Thank the user for the purchase
       return view('payfort_success');
   }
   public function getCancel(Request $request){
       return view('payment_fail');
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

        }
//        catch (Start_Error $e) {
//
//            $error_code = $e->getErrorCode();
//            $error_message = $e->getMessage();
//
//
//
//            /* depending on $error_code we can show different messages */
//            if ($error_code === "card_declined") {
////                echo "<h1>Charge was declined</h1>";
//                $message = "Card Was declined";
//                return view("payfort_failed",compact([$error_message]));
//            } else {
////                echo "<h1>Charge was not processed</h1>";
//                $message = "Charge was not Processed";
//                return view("payfort_failed",compact([$error_message]));
//
//            }
////            echo "<p>".$error_message."</p>";
//        }

        catch(Start_Error_Banking $e) {
            // Since it's a decline, Start_Error_Banking will be caught
//            print('Status is:' . $e->getHttpStatus() . "\n");
//            print('Code is:' . $e->getErrorCode() . "\n");
//            print('Message is:' . $e->getMessage() . "\n");
                $status = $e->getHttpStatus();
                $code   = $e->getErrorCode();
                $message = $e->getMessage();
            return view("payfort_failed",compact(['status','code' , 'message']));

        } catch (Start_Error_Request $e) {
            // Invalid parameters were supplied to Start's API
            $status = $e->getHttpStatus();
            $code   = $e->getErrorCode();
            $message = $e->getMessage();
            return view("payfort_failed",compact(['status','code' , 'message']));

        } catch (Start_Error_Authentication $e) {
            // There's a problem with that API key you provided
            $status = $e->getHttpStatus();
            $code   = $e->getErrorCode();
            $message = $e->getMessage();
            return view("payfort_failed",compact(['status','code' , 'message']));

        } catch (Start_Error $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email

            $status = $e->getHttpStatus();
            $code   = $e->getErrorCode();
            $message = $e->getMessage();
            return view("payfort_failed",compact(['status','code' , 'message']));
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Start
            $status = $e->getHttpStatus();
            $code   = $e->getErrorCode();
            $message = $e->getMessage();
            return view("payfort_failed",compact(['status','code' , 'message']));
        }

    }

    /////////////////////////////////////////////////////////
   public function processFilmPaypal(Request $request,$amount,$film){

           $payer = Paypal::Payer();
           $payer->setPaymentMethod('paypal');

           $paypal_amount = Paypal:: Amount();
           $paypal_amount->setCurrency('USD');
           $paypal_amount->setTotal($amount/100); // This is the simple way,
           // you can alternatively describe everything in the order separately;
           // Reference the PayPal PHP REST SDK for details.

           $transaction = Paypal::Transaction();
           $transaction->setAmount($paypal_amount);
           $transaction->setDescription('Private Film Fees');

           $redirectUrls = Paypal:: RedirectUrls();
           $redirectUrls->setReturnUrl(action('PaymentController@getPayFilmDone'));
           $redirectUrls->setCancelUrl(action('PaymentController@getPayFilmCancel'));

           $payment = Paypal::Payment();
           $payment->setIntent('sale');
           $payment->setPayer($payer);
           $payment->setRedirectUrls($redirectUrls);
           $payment->setTransactions(array($transaction));


           $response = $payment->create($this->_apiContext);
           $redirectUrl = $response->links[1]->href;

           return Redirect::to( $redirectUrl );


   }

   public function getPayFilmDone(Request $request)
   {
       $id = $request->get('paymentId');
       $token = $request->get('token');
       $payer_id = $request->get('PayerID');
       $payment = Paypal::getById($id, $this->_apiContext);

       $paymentExecution = Paypal::PaymentExecution();

       $paymentExecution->setPayerId($payer_id);
       $executePayment = $payment->execute($paymentExecution, $this->_apiContext);

       // Clear the shopping cart, write to database, send notifications, etc.
       $sub = new \App\Transaction();
       $sub->film_id =  Session::get('my_film');
       $sub->amount = $request->get('amount');
       $sub->charge_id = $id;
       $sub->charge_state = $request->get('state');
       $sub->save();

       $fil = \App\Film::find($film);
       $fil->completed = 1;
       $fil->save();

       // Thank the user for the purchase
       return view('process_film_pay');

   }
   public function getPayFilmCancel()
   {
       return view('payment_film_fail');
   }
}
