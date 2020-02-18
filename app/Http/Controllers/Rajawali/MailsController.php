<?php

namespace App\Http\Controllers\Rajawali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Response,View,Input,Auth,Session,Validator,File,Hash,PDF,Mail,Excel,DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Crypt;

use Carbon\Carbon;
use PHPExcel; 
use PHPExcel_IOFactory;

use App\Models\Mails;

class MailsController extends Controller
{
    public function __construct()
    {
        $this->middleware('rajawali.auth');
    }

    public function index(){
        $query = Mails::where('id', 1)->first();
        return response()->json(['status'=>200,'data'=> $query,'message'=>'']);
    }

    public function update(Request $request)
    {
        $valid = $this->validate($request, [
            'name'                  => 'required|max:255',
            'email'                 => 'required|max:255',
            'password'              => 'required|max:255',
            'driver'                => 'required|max:255',
            'host'                  => 'required|max:255',
            'port'                  => 'required|max:255',
            'encryption'            => 'required|max:255',
        ]);

        Mails::where('id', 1)->update([
            'name'                  => $request->name,
            'email'                 => $request->email,
            'password'              => $request->password,
            'driver'                => $request->driver,
            'host'                  => $request->host,
            'port'                  => $request->port,
            'encryption'            => $request->encryption,
        ]);
        return response()->json(['status'=>200,'data'=> '','message'=>'update successfully']);


    }

}