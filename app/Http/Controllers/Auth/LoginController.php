<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Route;
Use Alert;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/clients-area';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['guest','checkuserstatus'])->except('logout');
        $this->username = $this->findUsername();
        $this->keywords = 'rejawali kapital berjangka, rajawali, rajawali kapital, broker forex, broker indonesia, indonesia, broker oil, broker gold,rkb broker, berjangka forex, global kapital, rajawali kapital forex , rkb trade, komoditi indonesia';
		$agent = new Agent();
        if($agent->isMobile()){
            $this->data['isMobile'] = true;
        }else{
            $this->data['isMobile'] = false;
        }
        $this->data['menuName'] = Route::currentRouteName();
        //$this->middleware('guest')->except('logout');
    }
  /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function findUsername()
    {
        $login = request()->input('email');
 
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
 
        request()->merge([$fieldType => $login]);
 
        return $fieldType;
    }
 
    /**
     * Get username property.
     *
     * @return string
     */
    public function username()
    {
        return $this->username;
    }
    public function showLoginForm(){
        $this->data['title'] = 'Client Area - PT. Rajawali Kapital Berjangka';
        $this->data['description'] = 'Rajawali Kapital hadir sebagai perusahaan atau broker yang bertumpu pada tujuan untuk memberikan manfaat dan kontribusi bagi masyarakat.';
        $this->data['imageseo'] = asset('/images/RKB-Logo.jpeg');
        $this->data['keywords'] = $this->keywords;
        return view('auth.login')->with($this->data);
    }
 
}
