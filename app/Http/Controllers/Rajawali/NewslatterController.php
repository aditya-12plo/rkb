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

use App\Models\Newslaters;

class NewslatterController extends Controller
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
        $email = $request->email;
        $date_start = $request->date_start;
        $date_end = $request->date_end;

        if(!$sort_field){
            $sort_field = "id";
            $sort_type = "DESC";
        }

        $query = Newslaters::orderBy($sort_field,$sort_type);
        if ($email) {
            $like = "%{$email}%";
            $query = $query->where('email', 'LIKE', $like);
        } 
        
        if($date_start && $date_end)
        {
            $query = $query->whereDate('created_at','>=',$date_start)->whereDate('created_at','<=',$date_end);
        }
        return $query->paginate($perPage);
    }

    public function download(Request $request)
    {       
        $email = $request->email;
        $date_start = $request->date_start;
        $date_end = $request->date_end;

        $query = Newslaters::orderBy('id','DESC');
        
        if ($email) {
            $like = "%{$email}%";
            $query = $query->where('email', 'LIKE', $like);
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
        ->setCellValue('A1', 'Email')
        ->setCellValue('B1', 'Created At')
        ;

        $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);  
        $no=1;
        $row=2; 

        if(count($data) > 0){
            foreach ($data as $a){ 
                $objPHPExcel->getActiveSheet()->setCellValue('A'.$row, $a->email);
                $objPHPExcel->getActiveSheet()->setCellValue('B'.$row, $a->created_at);
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