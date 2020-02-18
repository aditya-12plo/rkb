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

use App\Models\News;

class NewsController extends Controller
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
        $title = $request->title;

        if(!$sort_field){
            $sort_field = "id";
            $sort_type = "DESC";
        }

        $query = News::orderBy($sort_field,$sort_type);
        if ($title) {
            $like = "%{$title}%";
            $query = $query->where('title_id', 'LIKE', $like);
        } 
        
        return $query->paginate($perPage);
    }

    public function add(Request $request)
    {
        $valid = $this->validate($request, [
            'title_id'              => 'required|max:255|unique:news,title_id',
            'description_id'        => 'required',
            'content_id'            => 'required',
            'image_upload'         => 'required|mimes:jpg,png,jpeg',
        ]);

        $destinationPath = 'public/news/'; // upload path
        $extension  = Input::file('image_upload')->getClientOriginalExtension(); // getting image extension
        $fileName   = time().'.'.$extension; // renameing image

        if(file_exists($destinationPath.$fileName)){
            $fileName   = Crypt::encryptString(time()).'.'.$extension; // renameing image
        }
        Input::file('image_upload')->move($destinationPath, $fileName);
        $masuk = array(
                'title_id'          => $request->title_id,
                'slug_id'           => $this->remove_special_character($request->title_id,'-'),
                'seo_img'           => $fileName,
                'tags_id'           => $this->remove_special_character($request->title_id,','),
                'description_id'    => $request->description_id,
                'content_id'        => $request->content_id,
            );

        News::create($masuk);
        return response()->json(['status'=>200,'data'=> '','message'=>'add successfully']);

    }


    public function update(Request $request)
    {
        if($request->image_upload != ''){
            $valid = $this->validate($request, [
                'title_id'              => 'required|max:255|unique:news,title_id,'.$request->id,
                'description_id'        => 'required',
                'content_id'            => 'required',
                'image_upload'          => 'required|mimes:jpg,png,jpeg',
            ]);

            $destinationPath = 'public/news/'; // upload path
            $extension  = Input::file('image_upload')->getClientOriginalExtension(); // getting image extension
            $fileName   = time().'.'.$extension; // renameing image


            if(file_exists($destinationPath.$fileName)){
                $fileName   = Crypt::encryptString(time()).'.'.$extension; // renameing image
            }
            Input::file('image_upload')->move($destinationPath, $fileName);
            File::delete($destinationPath .$request->seo_img);

            News::where("id",$request->id)
                ->update([
                    'title_id'          => $request->title_id,
                    'slug_id'           => $this->remove_special_character($request->title_id,'-'),
                    'seo_img'           => $fileName,
                    'tags_id'           => $this->remove_special_character($request->title_id,','),
                    'description_id'    => $request->description_id,
                    'content_id'        => $request->content_id,
            ]);
        }else{
            $valid = $this->validate($request, [
                'title_id'              => 'required|max:255|unique:news,title_id,'.$request->id,
                'description_id'        => 'required',
                'content_id'            => 'required',
            ]);
            News::where("id",$request->id)
                ->update([
                    'title_id'          => $request->title_id,
                    'slug_id'           => $this->remove_special_character($request->title_id,'-'),
                    'tags_id'           => $this->remove_special_character($request->title_id,','),
                    'description_id'    => $request->description_id,
                    'content_id'        => $request->content_id,
            ]);
        }  
        return response()->json(['status'=>200,'data'=> '','message'=>'update successfully']);

    }


    public function delete(Request $request){
        $destinationPath = 'public/news/'; // upload path
        File::delete($destinationPath .$request->seo_img);
        News::where('id',$request->id)->delete();
        return response()->json(['status'=>200,'data'=> '','message'=>'delete successfully']);
    }

    function remove_special_character($string,$code) {
 
        $t = $string;
     
        $specChars = array(
            ' ' => $code,    '!' => '',    '"' => '',
            '#' => '',    '$' => '',    '%' => '',
            '&amp;' => '',    '\'' => '',   '(' => '',
            ')' => '',    '*' => '',    '+' => '',
            ',' => '',    '₹' => '',    '.' => '',
            '/-' => '',    ':' => '',    ';' => '',
            '<' => '',    '=' => '',    '>' => '',
            '?' => '',    '@' => '',    '[' => '',
            '\\' => '',   ']' => '',    '^' => '',
            '_' => '',    '`' => '',    '{' => '',
            '|' => '',    '}' => '',    '~' => '',
            '-----' => '',    '----' => '',    '---' => '',
            '/' => '',    '--' => '',   '/_' => '',   
             
        );
     
        foreach ($specChars as $k => $v) {
            if($k == $code) continue;
            $t = str_replace($k, $v, $t);
        }
     
        return strtolower($t);
    }

}