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

use App\Models\Files;

class FilesController extends Controller
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

        if(!$sort_field){
            $sort_field = "id";
            $sort_type = "DESC";
        }

        $query = Files::orderBy($sort_field,$sort_type);
        if ($name) {
            $like = "%{$name}%";
            $query = $query->where('name', 'LIKE', $like);
        } 
        
        return $query->paginate($perPage);
    }

    public function add(Request $request){
        $valid = $this->validate($request, [
            'name'                  => 'required|max:225',
            'image_upload'          => 'required',
        ]);

        $destinationPath = 'public/assets/files-upload/'; // upload path
        $extension  = Input::file('image_upload')->getClientOriginalExtension(); // getting image extension
        $fileName   = time().'.'.$extension; // renameing image

        if(file_exists($destinationPath.$fileName)){
            $fileName   = Crypt::encryptString(time()).'.'.$extension; // renameing image
        }
        Input::file('image_upload')->move($destinationPath, $fileName);
        $masuk = array(
                'name'              => $request->name,
                'file_name'         => $fileName
            );

        Files::create($masuk);
        return response()->json(['status'=>200,'data'=> '','message'=>'add successfully']);
    }



    public function download(Request $request){
        $destinationPath = 'public/assets/files-upload/'.$request->fileName; // upload path
        return response()->download($destinationPath);
    }


    public function update(Request $request){
        if($request->image_upload != ""){
            $valid = $this->validate($request, [
                'id'                    => 'required|numeric',
                'name'                  => 'required|max:225',
                'image_upload'          => 'required|mimes:jpg,png,jpeg',
            ]);
        }else{
            $valid = $this->validate($request, [
                'id'                    => 'required|numeric',
                'name'                  => 'required|max:225',
            ]);
        }
        $check = Files::where("id" , $request->id)->first();
        if($request->image_upload != ""){
            $destinationPath = 'public/assets/files-upload/'; // upload path
            $extension  = Input::file('image_upload')->getClientOriginalExtension(); // getting image extension
            $fileName   = time().'.'.$extension; // renameing image
    
            if(file_exists($destinationPath.$fileName)){
                $fileName   = Crypt::encryptString(time()).'.'.$extension; // renameing image
            }
            Input::file('image_upload')->move($destinationPath, $fileName);
            File::delete($destinationPath .$check->file_name);
            $check->file_name     = $fileName;
        }

        $check->name           = $request->name;
        $check->save();
        return response()->json(['status'=>200,'data'=> '','message'=>'update successfully']);
    }

    public function delete(Request $request){
        $destinationPath = 'public/assets/files-upload/'; // upload path
        File::delete($destinationPath .$request->file_name);
        Files::where('id',$request->id)->delete();
        return response()->json(['status'=>200,'data'=> '','message'=>'delete successfully']);
    }

}