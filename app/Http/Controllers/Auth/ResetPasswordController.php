<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Route;
Use Alert;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
        $this->keywords = 'rejawali kapital berjangka, rajawali, rajawali kapital, broker forex, broker indonesia, indonesia, broker oil, broker gold,rkb broker, berjangka forex, global kapital, rajawali kapital forex , rkb trade, komoditi indonesia';
		$agent = new Agent();
        if($agent->isMobile()){
            $this->data['isMobile'] = true;
        }else{
            $this->data['isMobile'] = false;
        }
        $this->data['menuName'] = Route::currentRouteName();
    }
    
    public function showResetForm($token)
    {
        $this->data['title'] = 'Client Area - PT. Rajawali Kapital Berjangka';
        $this->data['description'] = 'Rajawali Kapital hadir sebagai perusahaan atau broker yang bertumpu pada tujuan untuk memberikan manfaat dan kontribusi bagi masyarakat.';
        $this->data['imageseo'] = asset('/images/RKB-Logo.jpeg');
        $this->data['keywords'] = $this->keywords;
        $this->data['token'] = $token;
        return view('auth.passwords.reset')->with($this->data);
    }
}
