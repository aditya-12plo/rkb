<?php

namespace App\Http\Controllers\Rajawali\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Models\Admin;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }


    public function showLinkRequestForm()
    {
        return view('rajawali.auth.passwords.email');
    }

         //Password Broker for admins Model
         public function broker()
         {
              return Password::broker('rajawalis');
         }

    public function sendResetLinkEmail(Request $request){
    $this->validate($request, ['email' => 'required|email']);
    $user_check = Admin::where('email', $request->email)->first();
    if(!$user_check){
        return back()->with('status', 'These credentials do not match our records.');
       }else{
   
           if ($user_check->status != 'active') {
               return back()->with('status', 'Your account is not activated. Please activate it first.');
           } else {
               $response = $this->broker()->sendResetLink(
                   $request->only('email')
               );
   
               if ($response === Password::RESET_LINK_SENT) {
                   return back()->with('status', trans($response));
               }
   
               return back()->withErrors(
                   ['status' => trans($response)]
               );
           }
       }
    }
}
