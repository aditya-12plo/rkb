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

use App\Models\User;
use App\Models\MetaAccount;
use App\Models\RealAccount;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('rajawali.auth');
    }

    public function index(Request $request)
    {
        $perPage = $request->per_page;
        $sort_field = $request->sort_field;
        $sort_type = $request->sort_type;
        $name = $request->name;
        $email = $request->email;
        $status = $request->status;
        $date_start = $request->date_start;
        $date_end = $request->date_end;

        if(!$sort_field){
            $sort_field = "id";
            $sort_type = "DESC";
        }

        $query = User::orderBy($sort_field,$sort_type);
        if ($name) {
            $like = "%{$name}%";
            $query = $query->where('name', 'LIKE', $like);
        } 
        
        if ($email) {
            $like = "%{$email}%";
            $query = $query->where('email', 'LIKE', $like);
        } 
 
        if ($status) {
            $query = $query->where('status',  $status);
        }
        
        if($date_start && $date_end)
        {
            $query = $query->whereDate('created_at','>=',$date_start)->whereDate('created_at','<=',$date_end);
        }
        
        return $query->paginate($perPage);
    }

    public function add(Request $request)
    {
        $valid = $this->validate($request, [
            'email'                 => 'required|max:255|unique:users,email',
            'referral_code'         => 'max:255',
            'phone'                 => 'required|max:20',
            'name'                  => 'required|max:255',
            'password'              => 'required|max:255',
            'status'                => 'required|max:255',
        ]);
        $masuk = array(
                'email'             => $request->email,
                'referral_code'     => $this->checkString($request->referral_code),
                'phone'             => $request->phone,
                'name'              => $request->name,
                'status'            => $request->status,
                'password'          => Hash::make($request->password),
            );

        User::create($masuk);
        return response()->json(['status'=>200,'data'=> '','message'=>'add successfully']);

    }

    private function checkString($value){
        $res = '';
        if($value == null){
            $res = '';
        }elseif($value == ''){
            $res = '';
        }elseif($value == 'null'){
            $res = '';
        }else{
            $res = $value;
        }
        return $res;
    }


    public function update(Request $request)
    {
        if($request->password != ''){

            $valid = $this->validate($request, [
                'email'                 => 'required|max:255|unique:users,email,'.$request->id,
                'referral_code'         => 'max:255',
                'phone'                 => 'required|max:20',
                'name'                  => 'required|max:255',
                'password'              => 'required|max:255',
                'status'                => 'required|max:255',
            ]);

            $update = array(
                'email'             => $request->email,
                'referral_code'     => $this->checkString($request->referral_code),
                'phone'             => $request->phone,
                'name'              => $request->name,
                'status'            => $request->status,
                'password'          => Hash::make($request->password),
            );
        }else{

            $valid = $this->validate($request, [
                'email'                 => 'required|max:255|unique:users,email,'.$request->id,
                'referral_code'         => 'max:255',
                'phone'                 => 'required|max:20',
                'name'                  => 'required|max:255',
                'status'                => 'required|max:255',
            ]);

            $update = array(
                'email'             => $request->email,
                'referral_code'     => $this->checkString($request->referral_code),
                'phone'             => $request->phone,
                'name'              => $request->name,
                'status'            => $request->status,
            );
        }
        User::where("id",$request->id)->update($update);
        return response()->json(['status'=>200,'data'=> '','message'=>'update successfully']);

    }

    public function delete(Request $request)
    {
        User::where("id",$request->id)->delete();
        return response()->json(['status'=>200,'data'=> '','message'=>'delete successfully']);

    }

    public function download(Request $request)
    {       
        $name = $request->name;
        $email = $request->email;
        $status = $request->status;
        $role_id = $request->role_id;
        $date_start = $request->date_start;
        $date_end = $request->date_end;

        $query = User::orderBy('id','DESC');
        
        if ($name) {
            $like = "%{$name}%";
            $query = $query->where('name', 'LIKE', $like);
        }
        if ($email) {
            $like = "%{$email}%";
            $query = $query->where('email', 'LIKE', $like);
        }
        if ($status) {
            $query = $query->where('status',  $status);
        }
        
        if($date_start && $date_end)
        {
            $query = $query->whereDate('created_at','>=',$date_start)->whereDate('created_at','<=',$date_end);
        }

        $data = $query->get();
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        // Add column headers
        $objPHPExcel->getActiveSheet()
        ->setCellValue('A1', 'Referral Code')
        ->setCellValue('B1', 'Name')
        ->setCellValue('C1', 'Phone') 
        ->setCellValue('D1', 'Email')
        ->setCellValue('E1', 'Status')
        ->setCellValue('F1', 'Created At')
        ;

        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);  
        $no=1;
        $row=2; 

        if(count($data) > 0){
            foreach ($data as $a){ 
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $a->referral_code);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $a->name);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $a->phone);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $a->email);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $a->status);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $a->created_at);
                $no++; 
                $row++;   
            }

        }

        // Set worksheet title
        $objPHPExcel->getActiveSheet()->setTitle('Sheet1');

        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $request->file_name . '.xls"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
    
    public function getDemoNReal($id)
    {
        $demo = MetaAccount::select('username')->where('user_id', $id)->get();
        $real = RealAccount::select('account_number')->where('user_id', $id)->get();
        return response()->json(['status'=>200,'data'=> array("demo" => $demo , "real" => $real) ,'message'=>'']);

    }
}