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

use App\Models\Deposit;
use App\Models\RealAccount;

class DepositController extends Controller
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
        $account_number = $request->account_number;
        $status = $request->status;
        $date_start = $request->date_start;
        $date_end = $request->date_end;

        if(!$sort_field){
            $sort_field = "id";
            $sort_type = "DESC";
        }

        $query = Deposit::with(['user','admin'])->orderBy($sort_field,$sort_type);
        if ($account_number) {
            $like = "%{$account_number}%";
            $query = $query->where('account_number', 'LIKE', $like);
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

    public function add(Request $request){
        $valid = $this->validate($request, [
            'account_number'        => 'required|max:255',
            'reason'                => 'required|max:255',
            'total_deposit'         => 'required|numeric|min:2',
            'image_deposit'         => 'required|mimes:pdf,jpg,png,jpeg',
        ]);

        $model = RealAccount::where([["account_number",$request->account_number], ['status' , 'approved']])->first();
        if($model){
            $destinationPath = 'public/client-deposit/'; // upload path
            $extension  = Input::file('image_deposit')->getClientOriginalExtension(); // getting image extension
            $fileName   = $request->account_number.'-'.time().'.'.$extension; // renameing image
    
            if(file_exists($destinationPath.$fileName)){
                $fileName   = $request->account_number.'-'.Crypt::encryptString(time()).'.'.$extension; // renameing image
            }

            Input::file('image_deposit')->move($destinationPath, $fileName);
            $masuk = array(
                    'user_id'           => $model->user_id,
                    'admin_id'          => Auth::guard('rajawali')->user()->id,
                    'total_deposit'     => $request->total_deposit,
                    'account_number'    => $request->account_number,
                    'reason'            => $request->reason,
                    'image_deposit'     => $fileName,
                    'status'            => 'approved'
                );

            Deposit::create($masuk);
            return response()->json(['status'=>200,'data'=> '','message'=>'add successfully']);

        }else{
            return response()->json(['status'=>402,'data'=> '','message'=>['error'=>['Account ID not found.']]]);
        }
    }

    public function downloadDepositFile(Request $request){
        $destinationPath = 'public/client-deposit/'.$request->fileName; // upload path
        return response()->download($destinationPath);
    }

    public function update(Request $request){
        if($request->image_upload != ''){
            $valid = $this->validate($request, [
                'account_number'        => 'required|max:255',
                'user_id'               => 'required|max:255',
                'reason'                => 'required|max:255',
                'total_deposit'         => 'required|numeric|min:2',
                'status'                => 'required|max:255',
                'image_upload'         => 'required|mimes:pdf,jpg,png,jpeg',
            ]);

        }else{
            $valid = $this->validate($request, [
                'account_number'        => 'required|max:255',
                'user_id'               => 'required|max:255',
                'reason'                => 'required|max:255',
                'status'                => 'required|max:255',
                'total_deposit'         => 'required|numeric|min:2'            
                ]);
        }

        $check = Deposit::where('id',$request->id)->first();
        $model = RealAccount::where([["account_number",$request->account_number], ['status' , 'approved'] , ['user_id' , $request->user_id]])->first();
        if($model){
            $destinationPath = 'public/client-deposit/'; // upload path

            if($request->image_upload != ''){
                File::delete($destinationPath .$check->image_deposit);
                $extension  = Input::file('image_upload')->getClientOriginalExtension(); // getting image extension
                $fileName   = $request->account_number.'-'.time().'.'.$extension; // renameing image
        
                if(file_exists($destinationPath.$fileName)){
                    $fileName   = $request->account_number.'-'.Crypt::encryptString(time()).'.'.$extension; // renameing image
                }
    
                Input::file('image_upload')->move($destinationPath, $fileName);
                $check->admin_id        = Auth::guard('rajawali')->user()->id;
                $check->total_deposit   = $request->total_deposit;
                $check->account_number  = $request->account_number;
                $check->reason          = $request->reason;
                $check->status          = $request->status;
                $check->image_deposit   = $fileName;
                $check->update(); 
            }else{
                $check->admin_id        = Auth::guard('rajawali')->user()->id;
                $check->total_deposit   = $request->total_deposit;
                $check->account_number  = $request->account_number;
                $check->reason          = $request->reason;
                $check->status          = $request->status;
                $check->update();
            }
            return response()->json(['status'=>200,'data'=> '','message'=>'update successfully']);
        }else{
            return response()->json(['status'=>402,'data'=> '','message'=>['error'=>['Account ID not found.']]]);
        }
    }

    public function download(Request $request){

        $account_number = $request->account_number;
        $status = $request->status;
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $query = Deposit::with(['user','admin'])->orderBy('id','DESC');
        if ($account_number) {
            $like = "%{$account_number}%";
            $query = $query->where('account_number', 'LIKE', $like);
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
        ->setCellValue('A1', 'Account Number')
        ->setCellValue('B1', 'Client Name')
        ->setCellValue('C1', 'Admin Name') 
        ->setCellValue('D1', 'Total Deposit')
        ->setCellValue('E1', 'Reason')
        ->setCellValue('F1', 'Status')
        ->setCellValue('G1', 'Created at')
        ->setCellValue('H1', 'Updated at')
        ;
        $objPHPExcel->getActiveSheet()->getStyle('A1:BC1')->getFont()->setBold(true);  
        $no=1;
        $row=2; 
        
        if(count($data) > 0){
            foreach ($data as $a){ 
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $a->account_number);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $a->user->name);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $a->admin->name);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $a->total_deposit);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $a->reason);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $a->status);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $a->created_at);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $a->updated_at);
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