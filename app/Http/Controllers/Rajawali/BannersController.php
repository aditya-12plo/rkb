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

use App\Models\Banners;

class BannersController extends Controller
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
        $sequence = $request->sequence;

        if(!$sort_field){
            $sort_field = "id";
            $sort_type = "DESC";
        }

        $query = Banners::orderBy($sort_field,$sort_type);
        if ($sequence) {
            $query = $query->where('sequence', $sequence);
        } 
        
        return $query->paginate($perPage);
    }

    public function add(Request $request){
        $valid = $this->validate($request, [
            'sequence'              => 'required|numeric',
            'image_upload'          => 'required|mimes:jpg,png,jpeg',
        ]);

        $destinationPath = 'public/assets/images/banner/'; // upload path
        $extension  = Input::file('image_upload')->getClientOriginalExtension(); // getting image extension
        $fileName   = time().'.'.$extension; // renameing image

        if(file_exists($destinationPath.$fileName)){
            $fileName   = Crypt::encryptString(time()).'.'.$extension; // renameing image
        }
        Input::file('image_upload')->move($destinationPath, $fileName);
        $masuk = array(
                'sequence'          => $request->sequence,
                'description_id'    => $request->description_id,
                'description_en'    => $request->description_en,
                'images_name'       => $fileName
            );

        Banners::create($masuk);
        return response()->json(['status'=>200,'data'=> '','message'=>'add successfully']);
    }


    public function update(Request $request){
        if($request->image_upload != ""){
            $valid = $this->validate($request, [
                'id'                    => 'required|numeric',
                'sequence'              => 'required|numeric',
                'image_upload'          => 'required|mimes:jpg,png,jpeg',
            ]);
        }else{
            $valid = $this->validate($request, [
                'id'                    => 'required|numeric',
                'sequence'              => 'required|numeric',
            ]);
        }
        $check = Banners::where("id" , $request->id)->first();
        if($request->image_upload != ""){
            $destinationPath = 'public/assets/images/banner/'; // upload path
            $extension  = Input::file('image_upload')->getClientOriginalExtension(); // getting image extension
            $fileName   = time().'.'.$extension; // renameing image
    
            if(file_exists($destinationPath.$fileName)){
                $fileName   = Crypt::encryptString(time()).'.'.$extension; // renameing image
            }
            Input::file('image_upload')->move($destinationPath, $fileName);
            File::delete($destinationPath .$check->images_name);
            $check->images_name     = $fileName;
        }

        $check->sequence           = $request->sequence;
        $check->description_id     = $this->checkString($request->description_id);
        $check->description_en     =  $this->checkString($request->description_en);
        $check->save();
        return response()->json(['status'=>200,'data'=> '','message'=>'update successfully']);
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

    public function delete(Request $request){
        $destinationPath = 'public/assets/images/banner/'; // upload path
        File::delete($destinationPath .$request->images_name);
        Banners::where('id',$request->id)->delete();
        return response()->json(['status'=>200,'data'=> '','message'=>'delete successfully']);
    }

}