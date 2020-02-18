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

use App\Models\MetaAccount;

class DemoAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('rajawali.auth');
    }

    public function index(Request $request){
        $perPage    = $request->per_page;
        $sort_field = $request->sort_field;
        $sort_type  = $request->sort_type;
        $username   = $request->username;
        $used       = $request->used;

        if(!$sort_field){
            $sort_field = "id";
            $sort_type = "DESC";
        }

        $query = MetaAccount::orderBy($sort_field,$sort_type);
        if ($username) {
            $like = "%{$username}%";
            $query = $query->where('username', 'LIKE', $like);
        } 
        if ($used) {
            $query = $query->where('used', $used);
        } 
        return $query->paginate($perPage);
    }

    public function updateDemoAccount(Request $request){
        $valid = $this->validate($request, [
            'id'        => 'required|max:255',
        ]); 
        $model = MetaAccount::where("id",$request->id)->first();
        if($model->used == 0){
            $used = 1;
        }else{
            $used = 0;
        }
        
        $model->used =  $used;
        $model->save();
        return response()->json(['status'=>200,'data'=> '','message'=>'update successfully']);
    }

    public function downloadDemoAccount(Request $request){
        $destinationPath = 'public/assets/files/'.$request->file_name; // upload path
        return response()->download($destinationPath);
    }

    
    public function uploadDemoAccount(Request $request){
        $valid = $this->validate($request, [
            'file_data'             => 'required|mimes:xlsx',
        ]);

        $path = $request->file('file_data')->getRealPath();
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        
        $reader->setLoadSheetsOnly(["Sheet1"]);
        $spreadsheet = $reader->load($path);
        $worksheet = $spreadsheet->getActiveSheet();
        $rows = $worksheet->toArray();
        $x = 0;
         $error = false;   
        for($x; $x < count($rows); $x++){
            if($x == 0) continue;

            if(count($rows[$x]) == 2){
                $check = MetaAccount::where("username",$rows[$x][0])->first();
                if($check){
                    $error = true;
                    break;
                }else{
                    $insert[] = ['user_id' => 0, 
                    'used'      => 0, 
                    'username'  => $rows[$x][0], 
                    'password'  => $rows[$x][1], 
                    'created_at'=> Carbon::now(),
                    'updated_at'=>Carbon::now()];   
                    $rules['*.username'] =  'required|max:255'; 
                    $rules['*.password'] =  'required|max:255'; 
                } 
            }else{
                $error = true;
                break;
            }

        }

        if($error){
            return response()->json(['status'=>402,'data'=> '','message'=>['file_data'=>["please check your file."]]]);
        }else{
            $validator = Validator::make($insert, $rules);
            if($validator->fails()) {
                return response()->json(['status'=>402,'data'=> '','message'=>['upload'=>$validator->errors()]]);
            } else {                     
                DB::table('meta_account')->insert($insert);
                return response()->json(['status'=>200,'data'=> '','message'=>'Upload Successfully']);            
            } 
        }

/*
        $x = 0;
        $path = $request->file('file_data')->getRealPath();
        $data = Excel::load($path, function($reader) {})->get();
        if(!empty($data) && $data->count()){
            foreach ($data->toArray() as $key => $value) {
                if(!empty($value)){
                    foreach ($value as $key => $v) {
                        $insert[] = ['user_id' => 0, 
                        'used'      => 0, 
                        'username'  => $v['username'], 
                        'password'  => $v['password'], 
                        'created_at'=> Carbon::now(),
                        'updated_at'=>Carbon::now()];   
                        $rules[$key.'.username'] =  'required|max:255';    
                        $rules[$key.'.password'] =  'required|max:255';
                    }
                }
            }

            if(!empty($insert))
            {
                $validator = Validator::make($insert, $rules);
                if($validator->fails()) {
                    return response()->json(['status'=>402,'data'=> '','message'=>['file_data'=>$validator->errors()]]);
                } else {                     
                    DB::table('meta_account')->insert($insert);
                    return response()->json(['status'=>200,'data'=> '','message'=>'Upload Successfully']);            
                }                   
            }
            else
            {
                return response()->json(['status'=>402,'data'=> '','message'=>['error'=>['data not found.']]]);
            }

            
        }else{
            return response()->json(['status'=>402,'data'=> '','message'=>['error'=>['data not found.']]]);
        }


*/

    }
    
}