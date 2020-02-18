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

class AdminController extends Controller
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
        $role_id = $request->role_id;
        $status = $request->status;

        if(!$sort_field){
            $sort_field = "id";
            $sort_type = "DESC";
        }

        $query = Admin::whereNotIn('id',[Auth::guard('rajawali')->user()->id])->orderBy($sort_field,$sort_type);
        if ($name) {
            $like = "%{$name}%";
            $query = $query->where('name', 'LIKE', $like);
        } 
        
        if ($email) {
            $like = "%{$email}%";
            $query = $query->where('email', 'LIKE', $like);
        } 

        if ($role_id) {
            $query = $query->where('role_id',  $role_id);
        } 
        if ($status) {
            $query = $query->where('status',  $status);
        } 
        
        return $query->paginate($perPage);
    }

    public function add(Request $request)
    {
        $valid = $this->validate($request, [
            'email'                 => 'required|max:255|unique:admin,email',
            'role_id'               => 'required|max:255',
            'name'                  => 'required|max:255',
            'password'              => 'required|max:255',
            'status'                => 'required|max:255',
        ]);
        $masuk = array(
                'email'             => $request->email,
                'role_id'           => $request->role_id,
                'name'              => $request->name,
                'status'            => $request->status,
                'password'          => Hash::make($request->password),
            );

        Admin::create($masuk);
        return response()->json(['status'=>200,'data'=> '','message'=>'add successfully']);

    }


    public function update(Request $request)
    {
        if($request->password != ''){

            $valid = $this->validate($request, [
                'email'                 => 'required|max:255|unique:admin,email,'.$request->id,
                'role_id'               => 'required|max:255',
                'name'                  => 'required|max:255',
                'password'              => 'required|max:255',
                'status'                => 'required|max:255',
            ]);

            $update = array(
                'email'             => $request->email,
                'role_id'           => $request->role_id,
                'name'              => $request->name,
                'status'            => $request->status,
                'password'          => Hash::make($request->password),
            );
        }else{

            $valid = $this->validate($request, [
                'email'                 => 'required|max:255|unique:admin,email,'.$request->id,
                'role_id'               => 'required|max:255',
                'name'                  => 'required|max:255',
                'status'                => 'required|max:255',
            ]);

            $update = array(
                'email'             => $request->email,
                'role_id'           => $request->role_id,
                'name'              => $request->name,
                'status'            => $request->status,
            );
        }
        Admin::where("id",$request->id)->update($update);
        return response()->json(['status'=>200,'data'=> '','message'=>'update successfully']);

    }

    public function delete(Request $request)
    {
        Admin::where("id",$request->id)->delete();
        return response()->json(['status'=>200,'data'=> '','message'=>'delete successfully']);

    }

    public function download(Request $request)
    {       
        $name = $request->name;
        $email = $request->email;
        $status = $request->status;
        $role_id = $request->role_id;
        $query = Admin::whereNotIn('id',[Auth::guard('rajawali')->user()->id])->orderBy('id','DESC');
        
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
        if ($role_id) {
            $query = $query->where('role_id',  $role_id);
        } 

        $data = $query->get();
        
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        // Add column headers
        $objPHPExcel->getActiveSheet()
        ->setCellValue('A1', 'Role')
        ->setCellValue('B1', 'Name')
        ->setCellValue('C1', 'Email') 
        ->setCellValue('D1', 'Status')
        ->setCellValue('E1', 'Created At')
        ;

        $objPHPExcel->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true);  
        $no=1;
        $row=2; 

        if(count($data) > 0){
            foreach ($data as $a){ 
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $a->role_id);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $a->name);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $a->email);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $a->status);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $a->created_at);
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
}