<?php

namespace App\Http\Controllers\Rajawali\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $guard = 'rajawali';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/rajawaliadmin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('rajawali.guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('rajawali.auth.login');
    }

    public function guard()
    {
        return auth()->guard('rajawali');
    }

    public function logout(Request $request)
   {
       $this->guard()->logout();
       $request->session()->flush();
       $request->session()->regenerate();
       return redirect('/rajawaliadmin/login');
   }
 
}
