<?php

namespace App\Http\Controllers\Rajawali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Response,View,Input,Auth,Session,Validator,File,Hash,PDF,Mail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Crypt;

use PHPExcel; 
use PHPExcel_IOFactory;

use App\Models\RealAccount;
use App\Models\VRealAccountUser;
use App\Models\User;

class RealAccountController extends Controller
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
        $name = $request->name;
        $email = $request->email;
        $status = $request->status;
        $date_start = $request->date_start;
        $date_end = $request->date_end;

        if(!$sort_field){
            $sort_field = "id";
            $sort_type = "DESC";
        }

        $query = VRealAccountUser::orderBy($sort_field,$sort_type);
        if ($account_number) {
            $like = "%{$account_number}%";
            $query = $query->where('account_number', 'LIKE', $like);
        }
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

    public function approvalRealAccount(Request $request)
    {
        $valid = $this->validate($request, [
            'id'        => 'required|max:255',
        ]);
        $model = RealAccount::with('user')->where("id",$request->id)->first();
        if($model){
            if($model->status == 'review'){
                $m = date('m', strtotime($model->created_at));
                $y = date('Y', strtotime($model->created_at));
                $ttl = RealAccount::whereNotNull('customer_code')->count();
                $jml = $ttl+1;
                $formNumber = sprintf("%05d", $jml).'.RKB.'. $m.'.'. $y;
                $customer_code = 'RKB-'.sprintf("%05d", $jml).'/'.$m.'/'. $y;
                $to = $model->user->email;
                
                $content = view('emails.email_notification_approval_real_account')->with(['data' => $model]);
                Mail::send('layouts.email', ['contentMessage' => $content], function($message)  use ($to){
                    $message->to($to)->subject('Persetujuan Akun Real');
                    $message->from('info@rajawalikapital.co.id','PT. Rajawali Kapital Berjangka');
                 });

                 User::where("id",$model->user_id)->update(["real_account" => 1]);
                 $model->admin_id = Auth::guard('rajawali')->user()->id;
                 $model->form_number = $formNumber;
                 $model->customer_code = $customer_code;
                 $model->status = 'approved';
                 $model->save();

                 return response()->json(['status'=>200,'data'=> '','message'=>'Approval has been sent to client']);

            }else{
                return response()->json(['status'=>402,'data'=> '','message'=>['error'=>['data not found.']]]);
            }
        }else{
            return response()->json(['status'=>402,'data'=> '','message'=>['error'=>['data not found.']]]);
        }
    }

    public function downloadPdf(Request $request)
    {
        $model = RealAccount::where("id",$request->id)->first();
        $pdf = PDF::loadview('website.aggrement_online',['data'=>$model])->setPaper('a4', 'potrait')->setWarnings(false);

        return $pdf->download($request->file_name);

    }
  
    public function download(Request $request)
    {       
        $account_number = $request->account_number;
        $name = $request->name;
        $email = $request->email;
        $status = $request->status;
        $date_start = $request->date_start;
        $date_end = $request->date_end;
        $query = VRealAccountUser::orderBy('id','DESC');
        if ($account_number) {
            $like = "%{$account_number}%";
            $query = $query->where('account_number', 'LIKE', $like);
        }
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
        ->setCellValue('A1', 'Name')
        ->setCellValue('B1', 'Email')
        ->setCellValue('C1', 'Client Status') 
        ->setCellValue('D1', 'Account Number')
        ->setCellValue('E1', 'Client Code')
        ->setCellValue('F1', 'Referral Code')
        ->setCellValue('G1', 'Form Number')
        ->setCellValue('H1', 'Gander')
        ->setCellValue('I1', 'Place / Date of Birth')
        ->setCellValue('J1', 'Type / Identity Number')
        ->setCellValue('K1', 'Tax Number')
        ->setCellValue('L1', 'Address')
        ->setCellValue('M1', 'Marital Status')
        ->setCellValue('N1', 'Name of Husband / Wife')
        ->setCellValue('O1', 'Mother Name')
        ->setCellValue('P1', 'House Status') 
        ->setCellValue('Q1', 'Phone')
        ->setCellValue('R1', 'Phone House')
        ->setCellValue('S1', 'Fax House')
        ->setCellValue('T1', 'Date Aggrement See Company Profile Date') 
        ->setCellValue('U1', 'Aggrement Simulation Commodity Trade Transaction Date') 
        ->setCellValue('V1', 'Name Implementing Commodity Trade Transaction') 
        ->setCellValue('W1', 'Aggrement Implementing Commodity Trade Transaction Date') 
        ->setCellValue('X1', 'Purpose Open Account') 
        ->setCellValue('Y1', 'Investment Experience') 
        ->setCellValue('Z1', 'Emergency Name') 
        ->setCellValue('AA1', 'Emergency Address / Postal Code') 
        ->setCellValue('AB1', 'Emergency Phone') 
        ->setCellValue('AC1', 'Emergency Relationship') 
        ->setCellValue('AD1', 'Job Category') 
        ->setCellValue('AE1', 'Job Company') 
        ->setCellValue('AF1', 'Business Fields') 
        ->setCellValue('AG1', 'Job Position') 
        ->setCellValue('AH1', 'Job Address / Postal Code') 
        ->setCellValue('AI1', 'Job Phone') 
        ->setCellValue('AJ1', 'Job Fax') 
        ->setCellValue('AK1', 'Bank Margin Name') 
        ->setCellValue('AL1', 'Bank Margin Branch') 
        ->setCellValue('AM1', 'Bank Nargin Number') 
        ->setCellValue('AN1', 'Bank Margin Type') 
        ->setCellValue('AO1', 'Bank Margin Name 2') 
        ->setCellValue('AP1', 'Bank Margin Branch 2') 
        ->setCellValue('AQ1', 'Bank Nargin Number 2') 
        ->setCellValue('AR1', 'Bank Margin Type 2') 
        ->setCellValue('AS1', 'Aggrement Statement of Truth And Responsibility') 
        ->setCellValue('AT1', 'Aggrement Notice of Risk') 
        ->setCellValue('AU1', 'Disputes Through') 
        ->setCellValue('AV1', 'Aggrement Electronic Authorization') 
        ->setCellValue('AW1', 'Aggrement Trading Rules') 
        ->setCellValue('AX1', 'Aggrement Personal Access Password') 
        ->setCellValue('AY1', 'Created At') 
        ->setCellValue('AZ1', 'Updated At') 
        ;

        $objPHPExcel->getActiveSheet()->getStyle('A1:BC1')->getFont()->setBold(true);  
        $no=1;
        $row=2; 

        if(count($data) > 0){
            foreach ($data as $a){ 
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $a->name);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $a->email);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $a->status);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $a->account_number);
                $objPHPExcel->getActiveSheet()->setCellValue('E'.$row, $a->customer_code);
                $objPHPExcel->getActiveSheet()->setCellValue('F'.$row, $a->referral_code);
                $objPHPExcel->getActiveSheet()->setCellValue('G'.$row, $a->form_number);
                $objPHPExcel->getActiveSheet()->setCellValue('H'.$row, $a->gander);
                $objPHPExcel->getActiveSheet()->setCellValue('I'.$row, $a->place_of_birth.' / '.$a->date_of_birth);
                $objPHPExcel->getActiveSheet()->setCellValue('J'.$row, $a->type_of_identity_card.' / '.$a->identity_card_number);
                $objPHPExcel->getActiveSheet()->setCellValue('K'.$row, $a->tax_number);
                $objPHPExcel->getActiveSheet()->setCellValue('L'.$row, $a->address.','.$a->province.','.$a->city.','.$a->area.','.$a->sub_area.','.$a->village.','.$a->country.','.$a->postal_code);
                $objPHPExcel->getActiveSheet()->setCellValue('M'.$row, $a->marital_status);
                $objPHPExcel->getActiveSheet()->setCellValue('N'.$row, $a->name_husband_or_wife);
                $objPHPExcel->getActiveSheet()->setCellValue('O'.$row, $a->mother_name);
                $objPHPExcel->getActiveSheet()->setCellValue('P'.$row, $a->house_status);
                $objPHPExcel->getActiveSheet()->setCellValue('Q'.$row, $a->phone);
                $objPHPExcel->getActiveSheet()->setCellValue('R'.$row, $a->phone_house);
                $objPHPExcel->getActiveSheet()->setCellValue('S'.$row, $a->fax_house);
                $objPHPExcel->getActiveSheet()->setCellValue('T'.$row, $a->aggrement_see_company_profile);
                $objPHPExcel->getActiveSheet()->setCellValue('U'.$row, $a->aggrement_simulation_commodity_trade_transaction);
                $objPHPExcel->getActiveSheet()->setCellValue('V'.$row, $a->name_implementing_commodity_trade_transaction);
                $objPHPExcel->getActiveSheet()->setCellValue('W'.$row, $a->aggrement_implementing_commodity_trade_transaction);
                $objPHPExcel->getActiveSheet()->setCellValue('X'.$row, $a->purpose_open_account);
                $objPHPExcel->getActiveSheet()->setCellValue('Y'.$row, $a->investment_experience);
                $objPHPExcel->getActiveSheet()->setCellValue('Z'.$row, $a->emergency_name);
                $objPHPExcel->getActiveSheet()->setCellValue('AA'.$row, $a->emergency_address.'/'.$a->emergency_postal_code);
                $objPHPExcel->getActiveSheet()->setCellValue('AB'.$row, $a->emergency_phone);
                $objPHPExcel->getActiveSheet()->setCellValue('AC'.$row, $a->emergency_relationship);
                $objPHPExcel->getActiveSheet()->setCellValue('AD'.$row, $a->job_category);
                $objPHPExcel->getActiveSheet()->setCellValue('AE'.$row, $a->job_company);
                $objPHPExcel->getActiveSheet()->setCellValue('AF'.$row, $a->business_fields);
                $objPHPExcel->getActiveSheet()->setCellValue('AG'.$row, $a->job_position);
                $objPHPExcel->getActiveSheet()->setCellValue('AH'.$row, $a->job_address.'/'.$a->job_postal_code);
                $objPHPExcel->getActiveSheet()->setCellValue('AI'.$row, $a->job_phone);
                $objPHPExcel->getActiveSheet()->setCellValue('AJ'.$row, $a->job_fax);
                $objPHPExcel->getActiveSheet()->setCellValue('AK'.$row, $a->bank_margin_name);
                $objPHPExcel->getActiveSheet()->setCellValue('AL'.$row, $a->bank_margin_branch);
                $objPHPExcel->getActiveSheet()->setCellValue('AM'.$row, $a->bank_margin_number);
                $objPHPExcel->getActiveSheet()->setCellValue('AN'.$row, $a->bank_margin_type);
                $objPHPExcel->getActiveSheet()->setCellValue('AO'.$row, $a->bank_margin_name_2);
                $objPHPExcel->getActiveSheet()->setCellValue('AP'.$row, $a->bank_margin_branch_2);
                $objPHPExcel->getActiveSheet()->setCellValue('AQ'.$row, $a->bank_margin_number_2);
                $objPHPExcel->getActiveSheet()->setCellValue('AR'.$row, $a->bank_margin_type_2);
                $objPHPExcel->getActiveSheet()->setCellValue('AS'.$row, $a->aggrement_statement_of_truth_and_responsibility);
                $objPHPExcel->getActiveSheet()->setCellValue('AT'.$row, $a->aggrement_notice_of_risk);
                $objPHPExcel->getActiveSheet()->setCellValue('AU'.$row, $a->disputes_through);
                $objPHPExcel->getActiveSheet()->setCellValue('AV'.$row, $a->aggrement_electronic_authorization);
                $objPHPExcel->getActiveSheet()->setCellValue('AW'.$row, $a->aggrement_trading_rules);
                $objPHPExcel->getActiveSheet()->setCellValue('AX'.$row, $a->aggrement_personal_access_password);
                $objPHPExcel->getActiveSheet()->setCellValue('AY'.$row, $a->created_at);
                $objPHPExcel->getActiveSheet()->setCellValue('AZ'.$row, $a->updated_at);
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

    
    public function uploadRealAccount(Request $request)
    {
        $valid = $this->validate($request, [
            'field'                 => 'required',
            'file_name'             => 'required|mimes:jpg,png,jpeg',
        ]);

        $destinationPath = 'public/client-files/'; // upload path
        $extension  = Input::file('file_name')->getClientOriginalExtension(); // getting image extension
        $fileName   = time().'.'.$extension; // renameing image

        if(file_exists($destinationPath.$fileName)){
            $fileName   = Crypt::encryptString(time()).'.'.$extension; // renameing image
        }

        Input::file('file_name')->move($destinationPath, $fileName);


        $cek = RealAccount::where("id",$request->id)->first();

        if($request->field == 'image_bank'){
            File::delete($destinationPath .$cek->image_bank);
            $cek->image_bank = $fileName;
            $cek->update();
        }
        if($request->field == 'image_profile'){
            File::delete($destinationPath .$cek->image_profile);
            $cek->image_profile = $fileName;
            $cek->update();
        }
        if($request->field == 'image_electricity'){
            File::delete($destinationPath .$cek->image_electricity);
            $cek->image_electricity = $fileName;
            $cek->update();
        }
        if($request->field == 'image_identity'){
            File::delete($destinationPath .$cek->image_identity);
            $cek->image_identity = $fileName;
            $cek->update();
        }
        if($request->field == 'image_other'){
            File::delete($destinationPath .$cek->image_other);
            $cek->image_other = $fileName;
            $cek->update();
        }
        if($request->field == 'image_other_2'){
            File::delete($destinationPath .$cek->image_other_2);
            $cek->image_other_2 = $fileName;
            $cek->update();
        }
        
        


        $data = $fileName;

        return response()->json(['status'=>200,'data'=> $data,'message'=>'Upload data berhasil']);
    }

    
    public function deleteFileRealAccount(Request $request)
    {
        $valid = $this->validate($request, [
            'field'                 => 'required',
            'file_name'             => 'required',
        ]);
        $destinationPath = 'public/client-files/'; // upload path
        if(file_exists($destinationPath.$request->file_name)){
            File::delete($destinationPath .$request->file_name);
        } 

        RealAccount::where("id",$request->id)
            ->update([
                $request->field  => null
        ]);

        return response()->json(['status'=>200,'data'=> '','message'=>'']);
    }

    public function updateRealAccountStatus(Request $request){
        $valid = $this->validate($request, [
            'id'                    => 'required',
            'status'                => 'required',
            'message'               => 'required',
        ]);

        $model = RealAccount::with('user')->where("id",$request->id)->first();
        $data = [
            "user"      => $model,
            "message"   => $request->message
        ];
        $to = $model->user->email;
                
        $content = view('emails.email_notification_repaired_real_account')->with($data);
        Mail::send('layouts.email', ['contentMessage' => $content], function($message)  use ($to){
            $message->to($to)->subject('Info Pendaftaran Akun Real');
            $message->from('info@rajawalikapital.co.id','PT. Rajawali Kapital Berjangka');
         });

         $model->status = 'on-progress';
         $model->save();

        return response()->json(['status'=>200,'data'=> '','message'=>'update successfully']);

    }

    
    public function updateRealAccount(Request $request){
        $valid = $this->validate($request, [
            'id'                    => 'required|numeric',
            'name'                  => 'required|max:225',
            'province'              => 'required|max:225',
            'city'                  => 'required|max:225',
            'area'                  => 'required|max:225',
            'sub_area'              => 'required|max:225',
            'village'               => 'max:225',
            'postal_code'           => 'required|max:15',
            'address'               => 'required',
            'type_of_identity_card' => 'required|max:225',
            'identity_card_number'  => 'required|max:225',
            'tax_number'            => 'required|max:225',
            'phone'                 => 'required|max:15',
            'fax_house'             => 'max:15',
            'phone_house'           => 'max:15',
            'bank_margin_name'      => 'required|max:225',
            'bank_margin_number'    => 'required|max:225',
            'bank_margin_name_2'    => 'max:225',
            'bank_margin_number_2'  => 'max:225'
        ]);

        RealAccount::where("id",$request->id)
            ->update([
                'name'                  => $request->name,
                'province'              => $request->province,
                'city'                  => $request->city,
                'area'                  => $request->area,
                'sub_area'              => $request->sub_area,
                'village'               => $request->village,
                'postal_code'           => $request->postal_code,
                'address'               => $request->address,
                'type_of_identity_card' => $request->type_of_identity_card,
                'identity_card_number'  => $request->identity_card_number,
                'tax_number'            => $request->tax_number,
                'phone'                 => $request->phone,
                'fax_house'             => $request->fax_house,
                'phone_house'           => $request->phone_house,
                'bank_margin_name'      => $request->bank_margin_name,
                'bank_margin_number'    => $request->bank_margin_number,
                'bank_margin_name_2'    => $request->bank_margin_name_2,
                'bank_margin_number_2'  => $request->bank_margin_number_2
        ]);

        return response()->json(['status'=>200,'data'=> '','message'=>'update successfully']);


    }

}
