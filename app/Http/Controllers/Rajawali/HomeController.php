<?php

namespace App\Http\Controllers\Rajawali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Response,View,Input,Auth,Session,Validator,File,Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Crypt;


use App\Models\Admin;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('rajawali.auth');
    }


    public function index()
    {
        return view('rajawali.home');
    }

    public function coba()
    {
        dd('coba');
    }

  

}
