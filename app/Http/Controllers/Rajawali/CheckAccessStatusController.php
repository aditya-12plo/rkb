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

use App\Models\Admin;

class CheckAccessStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('rajawali.auth');
    }
	
	public static function index($status)
    {
		$model 	= Admin::where('id',[Auth::guard('rajawali')->user()->id])->first();
		$res	=[ 'status'=>403,'data'=> '','message'=>'no have access'];
		
		if($status == "deposit"){
			if($model->role_id == "compliance" || $model->role_id == "settlement"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'view'];
			}
			if($model->role_id == "finance" || $model->role_id == "admin"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'crud'];
			}
		}
		
		if($status == "withdrawal"){
			if($model->role_id == "compliance" || $model->role_id == "settlement"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'view'];
			}
			if($model->role_id == "finance" || $model->role_id == "admin"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'crud'];
			}
		}
		
		if($status == "ib"){
			if($model->role_id == "ib" || $model->role_id == "admin"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'crud'];
			}
		}
		
		if($status == "client-demo"){
			if($model->role_id == "marketing" || $model->role_id == "admin"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'crud'];
			}
		}
		
		if($status == "web-contact"){
			if($model->role_id == "maintenace" || $model->role_id == "admin"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'crud'];
			}
		}
		
		if($status == "web-banner"){
			if($model->role_id == "maintenace" || $model->role_id == "admin"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'crud'];
			}
		}
		
		if($status == "web-files"){
			if($model->role_id == "maintenace" || $model->role_id == "admin"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'crud'];
			}
		}
		
		if($status == "web-news"){
			if($model->role_id == "maintenace" || $model->role_id == "admin"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'crud'];
			}
		}
		
		if($status == "newslatter"){
			if($model->role_id == "maintenace" || $model->role_id == "admin"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'crud'];
			}
		}
		
		if($status == "demo-account"){
			if($model->role_id == "settlement" || $model->role_id == "admin"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'crud'];
			}
		}
		
		
		if($status == "real-account"){
			if($model->role_id == "finance" || $model->role_id == "settlement"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'view'];
			}
			if($model->role_id == "compliance" || $model->role_id == "admin"){
				$res	=[ 'status'=>200,'data'=> '','message'=>'crud'];
			}
		}
		
		return $res;
	}
}