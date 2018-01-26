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
use Auth;
use Hash;
use Mail;
use Session;
use DB;

class PasswordController extends Controller
{




  // reset password
  public function resetPassword(Request $request)
  {
    
    $emails = \App\User::pluck('email')->toArray();

    if (in_array($request->email, $emails)) {
        

      $token = str_random(30);

      $user = DB::table('password_resets')->insert([

          'email'=>$request->email,
          'token'=>$token
        ]);

      $email = $request->email;

       Mail::send('auth.emails.password', ['token' => $token,'email'=>$email], function($message) use($email)
            {
                $message->from('info@iamafilm.com', 'Iamafilm');
                $message->to($email)->subject('Confirmation');

            }
      );

      return response()->json(['success'=>'true']);

    }else{

      return response()->json(['success'=>'false']);
    }

  }

  //////////////////////////////////////////////////////////////////////////////////

  public function showResetForm(Request $request,$token)
  {

      $password = DB::table('password_resets')->where([

          'email'=>$request->email,
          'token'=>$token
        ])->first();


      if ($password) {
        
        $user = \App\User::where('email',$request->email)->first();

        return view('reset_pass',compact('user'));

      }

  }
//////////////////////////////////////////////////////////////////////////////////////

  public function changePassword(Request $request)
  {

    $this->validate($request,[

            'password' => 'required|confirmed|min:6',    

      ]);

     $user = \App\User::find($request->id);
     $user->password = bcrypt($request->password);
     $user->save();

  }

//////////////////////////////////////////////////////////////////////////////////////

}
