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

use App\Models\Contacts;

class ContactController extends Controller
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
        $contact_name = $request->contact_name;
        $contact_email = $request->contact_email;
        $date_start = $request->date_start;
        $date_end = $request->date_end;

        if(!$sort_field){
            $sort_field = "id";
            $sort_type = "DESC";
        }

        $query = Contacts::orderBy($sort_field,$sort_type);
        if ($contact_name) {
            $like = "%{$contact_name}%";
            $query = $query->where('contact_name', 'LIKE', $like);
        } 
        if ($contact_email) {
            $like = "%{$contact_email}%";
            $query = $query->where('contact_email', 'LIKE', $like);
        } 
        
        if($date_start && $date_end)
        {
            $query = $query->whereDate('created_at','>=',$date_start)->whereDate('created_at','<=',$date_end);
        }
        return $query->paginate($perPage);
    }

    public function download(Request $request)
    {       
        $contact_name = $request->contact_name;
        $contact_email = $request->contact_email;
        $date_start = $request->date_start;
        $date_end = $request->date_end;

        $query = Contacts::orderBy('id','DESC');
        
        if ($contact_name) {
            $like = "%{$contact_name}%";
            $query = $query->where('contact_name', 'LIKE', $like);
        }
        if ($contact_email) {
            $like = "%{$contact_email}%";
            $query = $query->where('contact_email', 'LIKE', $like);
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
        ->setCellValue('C1', 'Phone') 
        ->setCellValue('D1', 'Company Name')
        ->setCellValue('E1', 'Message')
        ->setCellValue('F1', 'Created At')
        ;

        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->getFont()->setBold(true);  
        $no=1;
        $row=2; 

        if(count($data) > 0){
            foreach ($data as $a){ 
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $a->contact_name);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $a->contact_email);
                $objPHPExcel->getActiveSheet()->setCellValue('C'.$row, $a->contact_phone);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $a->contact_company);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $a->contact_message);
                $objPHPExcel->getActiveSheet()->setCellValue('D'.$row, $a->created_at);
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