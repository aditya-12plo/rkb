<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Response,View,Input,Auth,Session,Validator,File,Hash,PDF,Mail;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Models;
 

class HomeClientsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->keywords = 'rejawali kapital berjangka, rajawali, rajawali kapital, broker forex, broker indonesia, indonesia, broker oil, broker gold,rkb broker, berjangka forex, global kapital, rajawali kapital forex , rkb trade, komoditi indonesia';
		$agent = new Agent();
        if($agent->isMobile()){
            $this->data['isMobile'] = true;
        }else{
            $this->data['isMobile'] = false;
        }
        $this->data['menuName'] = Route::currentRouteName();
    }


    public function index()
    {
        $this->data['title'] = 'Rajawali Kapital Berjangka';
        $this->data['description'] = 'Rajawali Kapital hadir sebagai perusahaan atau broker yang bertumpu pada tujuan untuk memberikan manfaat dan kontribusi bagi masyarakat.';
        $this->data['imageseo'] = asset('/images/RKB-Logo.jpeg');
        $this->data['keywords'] = $this->keywords;
        return view('clients.home')->with($this->data);
    }

    public function changePassword(Request $request)
    {
        $valid = $this->validate($request, [
            'password' => 'required|max:255',
            'password_confirmation' => 'required|max:255|same:password'
        ]);
            Models\User::where("id",Auth::user()->id)->update(['password' => Hash::make($request->password)]);
            return response()->json(['status'=>200,'data'=>'','message'=>'Password anda berhasil dirubah']); 
        
    }

    public function getUserDetail()
    {
        $user = Models\UserDetail::where("user_id",Auth::user()->id)->first();
        if($user){
            $data = array('id' => $user->id,'phone'=>Auth::user()->phone, 'user_id' => Auth::user()->id, 'country' => $user->country, 'province'  => $user->province, 'city' => $user->city, 'area' => $user->area, 'sub_area' => $user->sub_area, 'postal_code' => $user->postal_code, 'village' => $user->village , 'address' => $user->address, 'created_at' => $user->created_at, 'updated_at' => $user->updated_at);
        }else{
            $data = array('id' => '','phone'=>Auth::user()->phone, 'user_id' => Auth::user()->id, 'country' => 'Indonesia', 'province'  => '', 'city' => '', 'area' => '', 'sub_area' => '', 'postal_code' => '', 'village' => '' , 'address' => '', 'created_at' => '', 'updated_at' => '');
        }
        return response()->json(['status'=>200,'data'=>$data,'message'=>'']);
        
    }


    public function postUserDetail(Request $request)
    {
        $valid = $this->validate($request, [
            'phone'     => 'required|max:15',
            'country'   => 'required|max:255',
            'province'  => 'required|max:255',
            'city'      => 'required|max:255',
            'address'   => 'required'
        ]);
        
        if(empty($request->id)){
            // add new data
            $masuk = array(
                'user_id'      => Auth::user()->id,
                'country'      => $request->country,
                'province'     => $request->province,
                'city'         => $request->city,
                'area'         => $request->area,
                'sub_area'     => $request->sub_area,
                'postal_code'  => $request->postal_code,
                'village'      => $request->village,
                'address'      => $request->address,
            );
            $detail = Models\UserDetail::create($masuk);
            $user = Models\User::where("id",Auth::user()->id)->update(['phone' => $request->phone]);
            $id = $detail->id;
        }else{
            // update data
            $update = array(
                'country'      => $request->country,
                'province'     => $request->province,
                'city'         => $request->city,
                'area'         => $request->area,
                'sub_area'     => $request->sub_area,
                'postal_code'  => $request->postal_code,
                'village'      => $request->village,
                'address'      => $request->address,
            );
            $detail = Models\UserDetail::where([["id",$request->id],["user_id",Auth::user()->id]])->update($update);
            $user = Models\User::where("id",Auth::user()->id)->update(['phone' => $request->phone]);
            $id = $request->id;

        }
        $check =  Models\UserDetail::where([["id",$id],["user_id",Auth::user()->id]])->first();
        $data = array('id' => $check->id, 'phone' => $request->phone, 'user_id' => Auth::user()->id, 'country' => $request->country, 'province'  => $request->province, 'city' => $request->city, 'area' => $request->area, 'sub_area' => $request->sub_area, 'postal_code' => $request->postal_code, 'village' => $request->village , 'address' => $request->address, 'created_at' => $check->created_at, 'updated_at' => $check->updated_at);
        return response()->json(['status'=>200, 'data'=>$data, 'message'=>'Your detail contact has been change.']);
    }

    public function getListDemoAccount(Request $request){
        $perPage = $request->per_page;
        $search = $request->filter;
        $min = $request->min;
        $max = $request->max;
        $query = Models\MetaAccount::where([['user_id',Auth::user()->id],['used',1]])->orderBy('id','DESC');
        if ($search) {
            $like = "%{$search}%";
            $query = $query->where('username', 'LIKE', $like);
        }
        if($min && !$max)
        {
            $query = $query->whereDate('updated_at','=',$min);
        }
        if(!$min && $max)
        {
            $query = $query->whereDate('updated_at','=',$max);
        }
        if($min && $max)
        {
            $query = $query->whereDate('updated_at','>=',$min)->whereDate('updated_at','<=',$max);
        }
         
        return $query->paginate($perPage);
    }

    public function getUserDemoAccount(){
        $account = Models\MetaAccount::where('used',0)->first();
        $check = Models\User::where('id',Auth::user()->id)->first();
        if($account){
            $total =  Models\MetaAccount::where('user_id',Auth::user()->id)->count();
            if($total < 2){
                $account->used     = 1;
                $account->user_id  = Auth::user()->id;
                $account->update();
                return response()->json(['status'=>200, 'data'=>'', 'message'=>'Demo Akun berhasil ditambahkan.']);    
            }else{
                return response()->json(['status'=>400, 'data'=>'', 'message'=>['error'=>['Maksimal permintaan data demo 2 ID']]]);
            }
        }else{
            $send = array(
                'title'             => 'Demo Account Out Of Stock',
                'user'              => $check,
            ); 
            $content = view('emails.email_notification')->with($send);
            Mail::send('layouts.email', ['contentMessage' => $content], function($message) {
                $message->to('info@rajawalikapital.co.id')->subject('Demo Account Out Of Stock');
                $message->from('info@rajawalikapital.co.id','Website Admin');
             });
            return response()->json(['status'=>400, 'data'=>'', 'message'=>['error'=>['Data Demo Akun Habis, team kami akan segera mengirimkan data kepada langsung.']]]);
        }
    }

    

    public function getListRealAccount(Request $request){
        $perPage = $request->per_page;
        $search = $request->filter;
        $min = $request->min;
        $max = $request->max;
        $query = Models\RealAccount::where('user_id',Auth::user()->id)->orderBy('id','DESC');
        if ($search) {
            $like = "%{$search}%";
            $query = $query->where('account_number', 'LIKE', $like);
        }
        if($min && !$max)
        {
            $query = $query->whereDate('date_of_being_a_customer','=',$min);
        }
        if(!$min && $max)
        {
            $query = $query->whereDate('date_of_being_a_customer','=',$max);
        }
        if($min && $max)
        {
            $query = $query->whereDate('date_of_being_a_customer','>=',$min)->whereDate('date_of_being_a_customer','<=',$max);
        }
         
        return $query->paginate($perPage);
    }



    public function createRealAccount($step,$id)
    {
        $stts = 200;
        $message = '';
        $data = '';
        
        if($step == 1){
            $res = $this->step_one($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 2){
            $res = $this->step_two($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 3){
            $res = $this->step_three($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 4){
            $res = $this->step_four($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 5){
            $res = $this->step_five($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 6){
            $res = $this->step_six($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 7){
            $res = $this->step_seven($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 8){
            $res = $this->step_eight($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 9){
            $res = $this->step_nine($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 10){
            $res = $this->step_teen($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 11){
            $res = $this->step_eleven($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 12){
            $res = $this->step_twelve($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 13){
            $res = $this->step_thirteen($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 14){
            $res = $this->step_fourteen($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }elseif($step == 15){
            $res = $this->step_fiveteen($id);
            $stts = $res['status'];
            $message = $res['message'];
            $data = $res['data'];
        }else{
            $stts = 402;
            $message = ['error'=>['ID akun Tidak bisa didaftarkan']];
            $data = '';
        }
       
        
        return response()->json(['status'=>$stts,'data'=>$data,'message'=>$message]);
    }

    private function step_one($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check){
            if($check->status == "on-progress"){
                $stts = 200;
                $message = '';
                $data = array('id' => $check->id, 'user_id' => Auth::user()->id, 'aggrement_see_company_profile' => 'Ya', "status" => $check->status);
            }else{
                $stts = 402;
                $message = ['error' => ['Terjadi Kesalahan']];
                $data = '';
            }
        }else{
            $total = Models\RealAccount::where('user_id',Auth::user()->id)->count();
            if($total < 2){
                $stts = 200;
                $message = '';
                $data = array('id' => $id, 'user_id' => Auth::user()->id, 'aggrement_see_company_profile' => 'Ya' , "status" => "on-progress");
            }else{
                $stts = 402;
                $message = ['error' => ['Silahkan selesaikan data yang sudah ada.']];
                $data = '';
            }
        }
        $res =  ['status'=>$stts,'data'=>$data,'message'=>$message];
        return $res;
    }

    
    public function postRealAccountStep1(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                $valid = $this->validate($request, [
                    'aggrement_see_company_profile'        => 'required',
                ]);
                if($request->aggrement_see_company_profile == 'Tidak'){
                    $stts = 402;
                    $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
                }else{
                    $stts = 200;
                    $message = 'Langkah ke 2';
                    Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->update(["aggrement_see_company_profile" => date('Y-m-d')]);
                }
            }else{
                $stts = 402;
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
            }
        }else{
            $valid = $this->validate($request, [
                'aggrement_see_company_profile'        => 'required',
            ]);
            if($request->aggrement_see_company_profile == 'Tidak'){
                $stts = 402;
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
            }else{
                $stts = 200;
                $message = 'Langkah ke 2';
                $masuk = ["user_id" => Auth::user()->id, "aggrement_see_company_profile" =>date('Y-m-d'), "status" => "on-progress"];
                $masukModel = Models\RealAccount::create($masuk);
                $data = ["id" => $masukModel->id, "status" => "on-progress"];
                   
            }
        }
        

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }



    private function step_two($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check){
            if($check->aggrement_see_company_profile){
                if($check->account_number){
                    $account_number = $check->account_number;
                }else{
                    $demo = Models\MetaAccount::where("user_id",Auth::user()->id)->first();
                    $account_number = $demo['username'];
                }
                $status = 200;
                $message = '';
                $data = array('id' => $check->id, 
                'nama_lengkap' => $check->name, 
                'tempat_lahir' => $check->place_of_birth, 
                'tanggal_lahir' => $check->date_of_birth, 
                'country' => 'Indonesia', 
                'provinsi'  => $check->province, 
                'kota' => $check->city, 
                'kecamatan' => $check->area, 
                'kelurahan' => $check->sub_area, 
                'kode_pos' => $check->postal_code, 
                'desa' => $check->village , 
                'alamat' => $check->address, 
                'account_number' => $account_number, 
                'tipe_identitas' => $check->type_of_identity_card, 
                'nomor_identitas'=>$check->identity_card_number , 
                'aggrement_simulation_commodity_trade_transaction' => 'Ya', 
                'status' => $check->status);
            }else{
                $status = 402;
                $data = '';
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
            }
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }



    public function postRealAccountStep2(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){

                $valid = $this->validate($request, [
                    'nama_lengkap'                  => 'required|max:255',
                    'tempat_lahir'                  => 'required|max:255',
                    'tanggal_lahir'                 => 'required|date|date_format:Y-m-d',
                    'account_number'                => 'required|max:255',
                    'tipe_identitas'                => 'required|max:255',
                    'nomor_identitas'               => 'required|max:255',
                    'aggrement_simulation_commodity_trade_transaction'  => 'required|max:255',
                    'country'                       => 'required|max:255',
                    'provinsi'                      => 'required|max:255',
                    'kota'                          => 'required|max:255',
                    'kecamatan'                     => 'required|max:255',
                    'kelurahan'                     => 'required|max:255',
                    'desa'                          => 'max:255',
                    'kode_pos'                      => 'required|max:15',
                    'alamat'                        => 'required'
                ]);
                if($request->aggrement_simulation_commodity_trade_transaction == 'TIDAK'){
                    $stts = 402;
                    $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
                }else{        
                        $check = Models\MetaAccount::where([["username",$request->account_number],["user_id",Auth::user()->id]])->first();
                        if($check){
                            $birthDate = $request->tanggal_lahir;
                            $birthDate = explode("-", $birthDate);
                            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
                            ? ((date("Y") - $birthDate[0]) - 1)
                            : (date("Y") - $birthDate[0]));

                            if($age > 17){
								$account_number = Models\RealAccount::where('account_number',$request->account_number)->first();
								if($account_number){
									if($account_number->user_id == Auth::user()->id && $account_number->status == 'on-progress'){
										$data = ["id" => $request->id , "status" => $request->status];
										$stts = 200;
										$message = 'Langkah ke 3';
										Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
											->update([
												"name"              => $request->nama_lengkap,
												"account_number"    => $request->account_number,
												"place_of_birth"    => $request->tempat_lahir,
												"date_of_birth"     => $request->tanggal_lahir,
												"country"           => 'Indonesia',
												"province"          => $request->provinsi,
												"city"              => $request->kota,
												"area"              => $request->kecamatan, 
												"sub_area"          => $request->kelurahan,
												"village"           => $request->desa,
												"address"           => $request->alamat,
												"postal_code"       => $request->kode_pos,
												"type_of_identity_card" => $request->tipe_identitas,
												"identity_card_number"  => $request->nomor_identitas,
												"aggrement_simulation_commodity_trade_transaction" => date('Y-m-d')
												]);
										
									}else{
										$stts = 402;
										$message = ['error'=>['ID akun Tidak bisa didaftarkan']];
									}
								}else{
									$data = ["id" => $request->id , "status" => $request->status];
									$stts = 200;
									$message = 'Langkah ke 3';
									Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
										->update([
											"name"              => $request->nama_lengkap,
											"account_number"    => $request->account_number,
											"place_of_birth"    => $request->tempat_lahir,
											"date_of_birth"     => $request->tanggal_lahir,
											"country"           => 'Indonesia',
											"province"          => $request->provinsi,
											"city"              => $request->kota,
											"area"              => $request->kecamatan, 
											"sub_area"          => $request->kelurahan,
											"village"           => $request->desa,
											"address"           => $request->alamat,
											"postal_code"       => $request->kode_pos,
											"type_of_identity_card" => $request->tipe_identitas,
											"identity_card_number"  => $request->nomor_identitas,
											"aggrement_simulation_commodity_trade_transaction" => date('Y-m-d')
											]);
								}
                            }else{
                                $data = $request;
                                $stts = 402;
                                $message = ['error'=>['Anda masih dibawah umur']];
                            }
                        }else{
                            $stts = 402;
                            $message = ['error'=>['ID akun Tidak bisa didaftarkan']];
                        }
                }
            }else{
                $stts = 402;
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
            }
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }




    private function step_three($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check){
            if($check->aggrement_simulation_commodity_trade_transaction && $check->status == "on-progress"){
                $status = 200;
                $message = '';
                $data = array('id' => $check->id, 'name' => $check->name, 'place_of_birth' => $check->place_of_birth, 'date_of_birth' => $check->date_of_birth, 'country' => $check->country, 'province'  => $check->province, 'city' => $check->city, 'area' => $check->area, 'sub_area' => $check->sub_area, 'postal_code' => $check->postal_code, 'village' => $check->village , 'address' => $check->address, 'account_number' => $check->account_number, 'type_of_identity_card' => $check->type_of_identity_card, 'identity_card_number'=>$check->identity_card_number ,'name_implementing_commodity_trade_transaction' => $check->name_implementing_commodity_trade_transaction, 'aggrement_implementing_commodity_trade_transaction' => 'Ya', 'status' => $check->status);
            }else{
                $status = 402;
                $data = '';
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
            }
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }



    public function postRealAccountStep3(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                $valid = $this->validate($request, [
                    'name_implementing_commodity_trade_transaction'             => 'required|max:255',
                    'aggrement_implementing_commodity_trade_transaction'        => 'required|max:255',
                ]);

                if($request->aggrement_implementing_commodity_trade_transaction == "Tidak"){
                    $stts = 402;
                    $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
                }else{
                    $data = ["id" => $request->id , "status" => $request->status];
                    $stts = 200;
                    $message = 'Langkah ke 4';
                    Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                        ->update([
                            "name_implementing_commodity_trade_transaction"    => $request->name_implementing_commodity_trade_transaction,
                            "aggrement_implementing_commodity_trade_transaction" => date('Y-m-d')
                            ]);
                }

            }else{
                $stts = 200;
                $message = 'Langkah ke 4';
            }
                 
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }



    private function step_four($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check){
            if($check->aggrement_implementing_commodity_trade_transaction && $check->status == "on-progress"){
                $status = 200;
                $message = '';
                $data = array('id' => $check->id, 'name' => $check->name, 'place_of_birth' => $check->place_of_birth, 
                'date_of_birth' => $check->date_of_birth, 'type_of_identity_card' => $check->type_of_identity_card, 
                'identity_card_number'=>$check->identity_card_number , 'no_npwp' => $check->tax_number, 
                'gander' => $check->gander, 'marital_status' => $check->marital_status , 
                'nama_suami_atau_istri' => $check->name_husband_or_wife, 'mother_name' => $check->mother_name , 
                'postal_code' => $check->postal_code, 'country' => $check->country, 'province' => $check->province,
                'city' => $check->city, 'area' => $check->area,  'sub_area' => $check->sub_area,   'village' => $check->village, 'address' => $check->address, 
                'no_handphone' => $check->phone, 'phone_house' => $check->phone_house, 'fax_house' => $check->fax_house, 
                'house_status' => $check->house_status, 'purpose_open_account' => $check->purpose_open_account , 
                'investment_experience' => $check->investment_experience, 'bappebti_family' => $check->bappebti_family, 
                'bankruptcy_by_court' => $check->bankruptcy_by_court , 'status' => $check->status);
            }else{
                $status = 402;
                $data = '';
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
            }
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }



    
    public function postRealAccountStep4(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                $valid = $this->validate($request, [
                    'no_npwp'                => 'required|max:255',
                    'gander'                 => 'required|max:255',
                    'gander'                 => 'required|max:255',
                    'marital_status'         => 'required|max:255',
                    'nama_suami_atau_istri'  => 'max:255',
                    'mother_name'            => 'max:255',
                    'no_handphone'           => 'required|max:15',
                    'phone_house'            => 'max:15',
                    'fax_house'              => 'max:15',
                    'house_status'           => 'required|max:255',
                    'purpose_open_account'   => 'required|max:255',
                    'investment_experience'  => 'required|max:255',
                    'bappebti_family'        => 'required|max:255',
                    'bankruptcy_by_court'    => 'required|max:255'
                ]);
                   
              if($request->marital_status == 'Kawin'){
                $valid = $this->validate($request, [
                    'nama_suami_atau_istri'   => 'required|max:255'
                ]);
              }
               
              $house_status = $request->house_status;
              if($request->house_status == 'Lainnya'){
                $valid = $this->validate($request, [
                    'house_status_lainnya'   => 'required|max:255'
                ]);
                $house_status = $request->house_status_lainnya;
              }
               
              $purpose_open_account = $request->purpose_open_account;
              if($request->purpose_open_account == 'Lainnya'){
                $valid = $this->validate($request, [
                    'purpose_open_account_lainnya'   => 'required|max:255'
                ]);
                $purpose_open_account = $request->purpose_open_account_lainnya;
              }

               
              $investment_experience = $request->investment_experience;
              if($request->investment_experience == 'Ya'){
                $valid = $this->validate($request, [
                    'investment_experience_lainnya'   => 'required|max:255'
                ]);
                $investment_experience = $request->investment_experience_lainnya;
              }
 
              if($request->bappebti_family == 'Ya'){
                $stts = 402;
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
              }else{

                    if($request->bankruptcy_by_court == 'Ya'){
                        $stts = 402;
                        $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
                    }else{
                        $stts = 200;
                        $message = 'Langkah ke 5';
                        Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                            ->update([
                                "tax_number"             => $request->no_npwp,
                                "gander"              => $request->gander,
                                "marital_status"      => $request->marital_status,
                                "name_husband_or_wife"=> $request->nama_suami_atau_istri,
                                "mother_name"         => $request->mother_name,
                                "phone"               => $request->no_handphone,
                                "phone_house"         => $request->phone_house,
                                "fax_house"           => $request->fax_house,
                                "house_status"        => $house_status,
                                "purpose_open_account"=> $purpose_open_account,
                                "investment_experience"=> $investment_experience,
                                "bappebti_family"     => $request->bappebti_family,
                                "bankruptcy_by_court" => $request->bankruptcy_by_court
                                ]);
                    }
              }
            }else{
                $stts = 200;
                $message = 'Langkah ke 5';
            }
                 
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }


    


    

   

    private function step_five($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check){
            if($check->bankruptcy_by_court && $check->status == "on-progress"){
                $status = 200;
                $message = '';
                $data = array('id' => $check->id, 'nama_lengkap' => $check->emergency_name, 
                'alamat_lengkap' => $check->emergency_address, 'kode_pos' => $check->emergency_postal_code, 
                'no_handphone' => $check->emergency_phone, 'hubungan'=>$check->emergency_relationship  , 
                'status' => $check->status);    
            }else{
                $status = 402;
                $data = '';
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
            }
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }


    public function postRealAccountStep5(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                $valid = $this->validate($request, [
                    'nama_lengkap'           => 'required|max:255',
                    'alamat_lengkap'         => 'required',
                    'kode_pos'               => 'max:15',
                    'no_handphone'           => 'required|max:15',
                    'hubungan'               => 'required|max:255'
                ]);
                

              $stts = 200;
              $message = 'Langkah ke 6';
              Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                  ->update([
                      "emergency_name"          => $request->nama_lengkap,
                      "emergency_address"       => $request->alamat_lengkap,
                      "emergency_postal_code"   => $request->kode_pos,
                      "emergency_phone"         => $request->no_handphone,
                      "emergency_relationship"  => $request->hubungan
                      ]);
            }else{
                $stts = 200;
                $message = 'Langkah ke 6';
            }
                 
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }

    

    private function step_six($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check){
            if($check->emergency_name && $check->status == "on-progress"){
                $status = 200;
                $message = '';
                $data = array('id' => $check->id, 'pekerjaan' => $check->job_category, 'nama_perusahaan' => $check->job_company, 
                'bidang_usaha' => $check->business_fields, 'jabatan' => $check->job_position, 'lama_bekerja'=>$check->job_length_of_work  , 
                'kantor_sebelumnya' => $check->job_length_of_work_before,'alamat_kantor' => $check->job_address,
                'kode_pos' => $check->job_postal_code, 'no_telp_kantor' => $check->job_phone, 'no_faksimili' => $check->job_fax ,'status' => $check->status);
    
            }else{
                $status = 402;
                $data = '';
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
            }
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }
    


    public function postRealAccountStep6(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                $valid = $this->validate($request, [
                    'pekerjaan'             => 'required|max:255',
                    'nama_perusahaan'       => 'required|max:255',
                    'bidang_usaha'          => 'required|max:15',
                    'jabatan'               => 'required|max:15',
                    'lama_bekerja'          => 'required|max:5',
                    'kantor_sebelumnya'     => 'required|max:5',
                    'kode_pos'              => 'required|max:15',
                    'no_telp_kantor'        => 'required|max:15',
                    'no_faksimili'          => 'max:255',
                    'pekerjaan_others'      => 'max:255'
                ]);
                
                $pekerjaan_others = $request->pekerjaan;
                if($request->pekerjaan == 'Lainnya'){
                    $pekerjaan_others = $request->pekerjaan_others;
                }

              $stts = 200;
              $message = 'Langkah ke 7';
              Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                  ->update([
                      "job_category"            => $pekerjaan_others,
                      "job_company"             => $request->nama_perusahaan,
                      "business_fields"         => $request->bidang_usaha,
                      "job_position"            => $request->jabatan,
                      "job_length_of_work"      => $request->lama_bekerja,
                      "job_length_of_work_before"=> $request->kantor_sebelumnya,
                      "job_address"             => $request->alamat_kantor,
                      "job_postal_code"         => $request->kode_pos,
                      "job_phone"               => $request->no_telp_kantor,
                      "job_fax"                 => $request->no_faksimili
                      ]);
            }else{
                $stts = 200;
                $message = 'Langkah ke 7';
            }
                 
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }


    private function step_seven($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check->job_category && $check->status == "on-progress"){
            $status = 200;
            $message = '';
            $data = array('id' => $check->id, 'penghasilan_per_tahun' => $check->wealth_list_price, 
            'rumah_lokasi' => $check->wealth_list_house_address, 'nilai_njop' => $check->wealth_list_njop, 
            'jumlah_deposit_bank' => $check->wealth_list_bank_deposit, 'lainnya'=>$check->wealth_list_bank_others,
            'status' => $check->status);
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }
    

    public function postRealAccountStep7(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                $valid = $this->validate($request, [
                    'penghasilan_per_tahun' => 'required|max:255',
                    'nilai_njop'            => 'max:25',
                    'jumlah_deposit_bank'   => 'max:25',
                    'lainnya'               => 'max:25'
                ]);

              $stts = 200;
              $message = 'Langkah ke 8';
              Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                  ->update([
                      "wealth_list_price"             => $request->penghasilan_per_tahun,
                      "wealth_list_house_address"     => $request->rumah_lokasi,
                      "wealth_list_njop"              => $request->nilai_njop,
                      "wealth_list_bank_deposit"      => $request->jumlah_deposit_bank,
                      "wealth_list_bank_others"       => $request->lainnya
                      ]);
            }else{
                $stts = 200;
                $message = 'Langkah ke 8';
            }
                 
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }



    private function step_eight($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check->wealth_list_price && $check->status == "on-progress"){
            $status = 200;
            $message = '';
            $data = array('id' => $check->id, 'nama_bank' => $check->bank_margin_name, 
            'cabang' => $check->bank_margin_branch, 'nomor_a_c' => $check->bank_margin_number, 
            'no_telepon' => $check->bank_margin_phone, 'jenis_rekening'=>$check->bank_margin_type,
            'nama_bank_2' => $check->bank_margin_name_2, 
            'cabang_2' => $check->bank_margin_branch_2, 'nomor_a_c_2' => $check->bank_margin_number_2, 
            'no_telepon_2' => $check->bank_margin_phone_2, 'jenis_rekening_2'=>$check->bank_margin_type_2,
            'status' => $check->status);
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }

    public function postRealAccountStep8(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                $valid = $this->validate($request, [
                    'nama_bank'             => 'required|max:255',
                    'cabang'                => 'required|max:255',
                    'nomor_a_c'             => 'required|max:25',
                    'no_telepon'            => 'max:15',
                    'jenis_rekening'        => 'required|max:255',
                    'nama_bank_2'           => 'max:255',
                    'cabang_2'              => 'max:255',
                    'nomor_a_c_2'           => 'max:25',
                    'no_telepon_2'          => 'max:15',
                    'jenis_rekening_2'      => 'max:255'
                ]);

                $jenis_rekening = $request->jenis_rekening;
                if($request->jenis_rekening == 'Lainnya'){
                  $valid = $this->validate($request, [
                      'jenis_rekening_others'   => 'required|max:255'
                  ]);
                  $jenis_rekening = $request->jenis_rekening_others;
                }
  
                $jenis_rekening_2 = $request->jenis_rekening_2;
                if($request->jenis_rekening_2 == 'Lainnya'){
                  $valid = $this->validate($request, [
                      'jenis_rekening_others_2'   => 'required|max:255'
                  ]);
                  $jenis_rekening_2 = $request->jenis_rekening_others_2;
                }

                if(empty($request->nama_bank_2)){
                    $jenis_rekening_2 = null;
                }

              $stts = 200;
              $message = 'Langkah ke 9';
              Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                  ->update([
                      "bank_margin_name"              => $request->nama_bank,
                      "bank_margin_branch"            => $request->cabang,
                      "bank_margin_number"            => $request->nomor_a_c,
                      "bank_margin_phone"             => $request->no_telepon,
                      "bank_margin_type"              => $jenis_rekening,
                      "bank_margin_name_2"            => $request->nama_bank_2,
                      "bank_margin_branch_2"          => $request->cabang_2,
                      "bank_margin_number_2"          => $request->nomor_a_c_2,
                      "bank_margin_phone_2"           => $request->no_telepon_2,
                      "bank_margin_type_2"            => $jenis_rekening_2
                      ]);
            }else{
                $stts = 200;
                $message = 'Langkah ke 9';
            }
                 
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }



    private function step_nine($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check->bank_margin_number && $check->status == "on-progress"){
            $status = 200;
            $message = '';
            $data = array('id' => $check->id, 'foto_terkini' => $check->image_profile, 
            'rekening_koran_bank' => $check->image_bank, 'rekening_listrik' => $check->image_electricity, 
            'scan_identitas' => $check->image_identity, 'tambahan_dokumen'=>$check->image_other,
            'tambahan_dokumen_2' => $check->image_other_2, 'status' => $check->status);
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }


    public function postRealAccountStep9(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                if(empty($model->image_identity)){
                    $stts = 402;
                    $message = ['error'=>['Silahkan upload foto KTP/SIM/Passpor anda.']];
                }elseif(empty($model->image_electricity)){
                    $stts = 402;
                    $message = ['error'=>['Silahkan upload Rekening Listrik / Telepon.']];
                }elseif(empty($model->image_profile)){
                    $stts = 402;
                    $message = ['error'=>['Silahkan upload Foto Terkini anda.']];
                }elseif(empty($model->image_bank)){
                    $stts = 402;
                    $message = ['error'=>['Silahkan upload Rekening Koran Bank / Tagihan Kartu Kredit.']];
                }else{
                    $stts = 200;
                    $message = 'Langkah ke 10';
                }
            }else{
                $stts = 200;
                $message = 'Langkah ke 10';
            }
                 
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }

    
    private function step_teen($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check->image_identity && $check->status == "on-progress"){
            $status = 200;
            $message = '';
                $date = date('Y-m-d');
            $data = array('id' => $check->id, 'aggrement_statement_of_truth_and_responsibility' => 'Ya', 
            'status' => $check->status);
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }
    

    public function postRealAccountStep10(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                if($request->aggrement_statement_of_truth_and_responsibility == 'Ya'){
                $stts = 200;
                $message = 'Langkah ke 11';
                Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                ->update([
                    "aggrement_statement_of_truth_and_responsibility"              => date('Y-m-d')
                    ]);
                }else{
                    $stts = 402;
                    $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya.']];

                }
            }else{
                $stts = 200;
                $message = 'Langkah ke 11';
            }
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }

    
    
   
    private function step_eleven($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check->aggrement_statement_of_truth_and_responsibility && $check->status == "on-progress"){
            $status = 200;
            $message = '';
                $date = date('Y-m-d');
            $data = array('id' => $check->id, 'aggrement_notice_of_risk' => 'Ya', 
            'status' => $check->status);
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }

    public function postRealAccountStep11(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                if($request->aggrement_notice_of_risk == 'Ya'){
                $stts = 200;
                $message = 'Langkah ke 12';
                Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                ->update([
                    "aggrement_notice_of_risk"  =>date('Y-m-d')
                    ]);
                }else{
                    $stts = 402;
                    $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya.']];

                }
            }else{
                $stts = 200;
                $message = 'Langkah ke 12';
            }
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }
    
    
    
    private function step_twelve($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check->aggrement_notice_of_risk && $check->status == "on-progress"){
            $status = 200;
            $message = '';
            $date = date('Y-m-d');
            $data = array('id' => $check->id, 'name' =>$check->name, 'job_category'=>$check->job_category, 'postal_code' => $check->postal_code,
            'job_position' => $check->job_position, 'address' => $check->address,'country' => $check->country, 'province' => $check->province, 'city' => $check->city, 'area' => $check->area,  'sub_area' => $check->sub_area,   'village' => $check->village, 'disputes_through' => $check->disputes_through,
            'aggrement_electronic_authorization' => 'Ya', 'office_authorization' => $check->office_authorization , 'status' => $check->status);
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }

    public function postRealAccountStep12(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                if($request->aggrement_electronic_authorization == 'Ya'){

                    if($request->disputes_through == 'Badan Arbitrase Perdagangan Berjangka Komoditi (BAKTI)'){
                        $stts = 200;
                        $message = 'Langkah ke 13';
                        Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                        ->update([
                            "disputes_through"                    => 'Badan Arbitrase Perdagangan Berjangka Komoditi (BAKTI)',
                            "aggrement_electronic_authorization"  => date('Y-m-d'),
                            "office_authorization"                => $request->office_authorization
                            ]);
                    }else{
                        $valid = $this->validate($request, [
                            'pengadilan_negeri'             => 'required|max:255'
                        ]);


                        $stts = 200;
                        $message = 'Langkah ke 13';
                        Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                        ->update([
                            "disputes_through"                    => $request->pengadilan_negeri,
                            "aggrement_electronic_authorization"  => date('Y-m-d'),
                            "office_authorization"                => $request->office_authorization
                            ]);
                    }
                }else{
                    $stts = 402;
                    $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya.']];

                }
            }else{
                $stts = 200;
                $message = 'Langkah ke 13';
            }
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }

   
    private function step_thirteen($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check){
            if($check->aggrement_electronic_authorization && $check->status == "on-progress"){
                $status = 200;
                $message = '';
                $date = date('Y-m-d');
                $data = array('id' => $check->id, 'aggrement_trading_rules' =>'Ya',
                'status' => $check->status);
            }else{
                $status = 402;
                $data = '';
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];                
            }
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }


    public function postRealAccountStep13(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                if($request->aggrement_trading_rules == 'Ya'){
                $stts = 200;
                $message = 'Langkah ke 14';
                Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                ->update([
                    "aggrement_trading_rules"  => date('Y-m-d')
                    ]);
                }else{
                    $stts = 402;
                    $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya.']];

                }
            }else{
                $stts = 200;
                $message = 'Langkah ke 14';
            }
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }
    
   
    private function step_fourteen($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check){
            if($check->aggrement_trading_rules && $check->status == "on-progress"){
                $status = 200;
                $message = '';
                $date = date('Y-m-d');
                $data = array('id' => $check->id, 'name' => $check->name , 'place_of_birth' => $check->place_of_birth , 
                'date_of_birth' => $check->date_of_birth, 'address' => $check->address , 'country' => $check->country, 'province' => $check->province, 'city' => $check->city, 'area' => $check->area,  'sub_area' => $check->sub_area,   'village' => $check->village,
                'postal_code' => $check->postal_code, 'type_of_identity_card' => $check->type_of_identity_card, 
                'identity_card_number' => $check->identity_card_number ,'account_number' => $check->account_number ,
                'aggrement_personal_access_password' =>'Ya', 'status' => $check->status);
            }else{
                $status = 402;
                $data = '';
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];                
            }
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }

    public function postRealAccountStep14(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                if($request->aggrement_personal_access_password == 'Ya'){
                $stts = 200;
                $message = '';
                Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                ->update([
                    "aggrement_personal_access_password"  => date('Y-m-d')
                    ]);

                    

                }else{
                    $stts = 402;
                    $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya.']];

                }
            }else{
                $stts = 200;
                $message = 'Tim Kami akan menghubungi anda segera';
            }
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }



    private function step_fiveteen($id){
        $check = Models\RealAccount::where([["id",$id],['user_id',Auth::user()->id]])->first();
        if($check){
            if($check->aggrement_trading_rules && $check->status == "on-progress"){
                $status = 200;
                $message = '';
                $data = array('id' => $check->id);
            }else{
                $status = 402;
                $data = '';
                $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];                
            }
        }else{
            $status = 402;
            $data = '';
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }
        $res =  ['status'=>$status,'data'=>$data,'message'=>$message];
        return $res;

    }


    public function postRealAccountStep15(Request $request)
    {
        $data = ["id" => $request->id , "status" => $request->status];
        $stts = 200;
        $message = '';

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        if($model){
            if($model->status == 'on-progress'){
                $stts = 200;
                $message = 'Pendaftaran akun telah selesai';
                Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
                ->update([
                    'status' => 'review'
                ]);
				$encrypted = Crypt::encryptString($request->id);
                $email = Auth::user()->email;

                $send = array(
                    'title'             => 'Terima kasih, anda telah melakukan pendaftaran <b>Akun Real</b>',
                    'name'              => Auth::user()->name,
                    'message'           => 'Data anda sedang direview oleh tim kami. Tunggu kabar baiknya yah.',
                    'id'                => $encrypted,
                ); 
                $content = view('emails.email_notification_real_account')->with($send);
                Mail::send('layouts.email', ['contentMessageAkunReal' => $content], function($message) use ($email){
                    $message->to($email)->subject('Pendaftaran Akun Real');
                    $message->from('info@rajawalikapital.co.id','PT. Rajawali Kapital Berjangka');
                });

                $send = array(
                    'title'             => 'User telah melakukan pendaftaran <b>Akun Real</b>',
                    'name'              => Auth::user()->name,
                    'message'           => 'Silahkan review data yang telah dimasukan.',
                    'id'                => $encrypted,
                ); 
                $content = view('emails.email_notification_real_account')->with($send);
                Mail::send('layouts.email', ['contentMessageAkunReal' => $content], function($message) use ($email){
                    $message->to('info@rajawalikapital.co.id')->cc(["compliance@rajawalikapital.co.id","marketing@rajawalikapital.co.id"])->subject('Pendaftaran Akun Real');
                    $message->from('info@rajawalikapital.co.id','PT. Rajawali Kapital Berjangka');
                });
            }else{
                $stts = 200;
                $message = 'Tim Kami akan menghubungi anda segera';
            }
        }else{
            $stts = 402;
            $message = ['error'=>['Maaf anda tidak bisa melanjutkan tahap selanjutnya']];
        }

        return response()->json(['status'=>$stts,'data'=> $data,'message'=>$message]);
    }

    public function uploadFile(Request $request)
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

        if($request->field == 'rekening_koran_bank'){
            $field = 'image_bank';
        }
        if($request->field == 'foto_terkini'){
            $field = 'image_profile';
        }
        if($request->field == 'rekening_listrik'){
            $field = 'image_electricity';
        }
        if($request->field == 'scan_identitas'){
            $field = 'image_identity';
        }
        if($request->field == 'tambahan_dokumen'){
            $field = 'image_other';
        }
        if($request->field == 'tambahan_dokumen_2'){
            $field = 'image_other_2';
        }

        Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
            ->update([
                $field   => $fileName
        ]);
        
        $data = $fileName;

        return response()->json(['status'=>200,'data'=> $data,'message'=>'Upload data berhasil']);
    }

    public function deleteFile(Request $request)
    {
        $valid = $this->validate($request, [
            'field'                 => 'required',
            'file_name'             => 'required',
        ]);
        $destinationPath = 'public/client-files/'; // upload path
        if(file_exists($destinationPath.$request->file_name)){
            File::delete($destinationPath .$request->file_name);
        } 

        if($request->field == 'rekening_koran_bank'){
            $field = 'image_bank';
        }
        if($request->field == 'foto_terkini'){
            $field = 'image_profile';
        }
        if($request->field == 'rekening_listrik'){
            $field = 'image_electricity';
        }
        if($request->field == 'scan_identitas'){
            $field = 'image_identity';
        }
        if($request->field == 'tambahan_dokumen'){
            $field = 'image_other';
        }
        if($request->field == 'tambahan_dokumen_2'){
            $field = 'image_other_2';
        }

        Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])
            ->update([
                $field   => null
        ]);

        return response()->json(['status'=>200,'data'=> '','message'=>'']);
    }




    public function getListDeposit(Request $request){
        $perPage = $request->per_page;
        $search = $request->filter;
        $min = $request->min;
        $max = $request->max;
        $query = Models\Deposit::where('user_id',Auth::user()->id)->orderBy('id','DESC');
        if ($search) {
            $like = "%{$search}%";
            $query = $query->where('account_number', 'LIKE', $like);
        }
        if($min && !$max)
        {
            $query = $query->whereDate('updated_at','=',$min);
        }
        if(!$min && $max)
        {
            $query = $query->whereDate('updated_at','=',$max);
        }
        if($min && $max)
        {
            $query = $query->whereDate('updated_at','>=',$min)->whereDate('updated_at','<=',$max);
        }
         
        return $query->paginate($perPage);
    }


    public function postDeposit(Request $request)
    {
         $valid = $this->validate($request, [
            'account_number'        => 'required|max:255',
            'total_deposit'         => 'required|numeric|min:2',
            'image_deposit'         => 'required|mimes:pdf,jpg,png,jpeg',
        ]);

        $model = Models\RealAccount::where([["account_number",$request->account_number],
        ['user_id',Auth::user()->id],
        ['status' , 'approved']])->first();
        if($model){
        $destinationPath = 'public/client-deposit/'; // upload path
        $extension  = Input::file('image_deposit')->getClientOriginalExtension(); // getting image extension
        $fileName   = time().'.'.$extension; // renameing image
		
        if(file_exists($destinationPath.$fileName)){
            $fileName   = Crypt::encryptString(time()).'.'.$extension; // renameing image
        }

            Input::file('image_deposit')->move($destinationPath, $fileName);

            $masuk = array(
                    'user_id'           => Auth::user()->id,
                    'total_deposit'     => $request->total_deposit,
                    'account_number'    => $request->account_number,
                    'image_deposit'     => $fileName,
                    'status'            => 'review'
                );
    
            Models\Deposit::create($masuk);
			
				$attach = $destinationPath.$fileName;
				$content = view('emails.email_deposit')->with($masuk);
                Mail::send('layouts.email', ['contentMessage' => $content], function($message)  use ($masuk,$attach){
                    $message->to('finance@rajawalikapital.co.id')->cc(["dealing@rajawalikapital.co.id","settlement@rajawalikapital.co.id"])->subject('Deposit Info');
                    $message->attach($attach);
                });
				
            return response()->json(['status'=>200,'data'=> '','message'=>'Upload data berhasil']);
        }else{
            return response()->json(['status'=>402,'data'=> '','message'=>['error'=>['Anda tidak memiliki Akun Real.']]]);
        }

    }




    public function getListWithdrawal(Request $request){
        $perPage = $request->per_page;
        $search = $request->filter;
        $min = $request->min;
        $max = $request->max;
        $query = Models\Withdrawal::where('user_id',Auth::user()->id)->orderBy('id','DESC');
        if ($search) {
            $like = "%{$search}%";
            $query = $query->where('account_number', 'LIKE', $like)->orWhere('status', 'LIKE', $like);
        }
        if($min && !$max)
        {
            $query = $query->whereDate('updated_at','=',$min);
        }
        if(!$min && $max)
        {
            $query = $query->whereDate('updated_at','=',$max);
        }
        if($min && $max)
        {
            $query = $query->whereDate('updated_at','>=',$min)->whereDate('updated_at','<=',$max);
        }
         
        return $query->paginate($perPage);
    }

    
    public function postWithdrawal(Request $request)
    {
        $valid = $this->validate($request, [
            'account_number'        => 'required|max:255',
            'total_withdrawal'         => 'required|numeric|min:2',
        ]);

        $model = Models\RealAccount::where([["account_number",$request->account_number],
        ['user_id',Auth::user()->id],
        ['status' , 'approved']])->first();
        if($model){
            $masuk = array(
                    'user_id'           => Auth::user()->id,
                    'total_withdrawal'  => $request->total_withdrawal,
                    'account_number'    => $request->account_number,
                    'status'            => 'review'
                );
    
            Models\Withdrawal::create($masuk);
            return response()->json(['status'=>200,'data'=> '','message'=>'Upload data berhasil']);
        }else{
            return response()->json(['status'=>402,'data'=> '','message'=>['error'=>['Anda tidak memiliki Akun Real.']]]);
        }

    }





    public function downloadDeposit(Request $request)
    {
        $valid = $this->validate($request, [
            'fileName'         => 'required',
        ]);

        $destinationPath = 'public/client-deposit/'.$request->fileName; // upload path

        return response()->download($destinationPath, $request->fileName);
    }



    public function downloadRegitrasiFile(Request $request)
    {
        $valid = $this->validate($request, [
            'id'         => 'required',
            'file_name'  => 'required',
        ]);

        $model = Models\RealAccount::where([["id",$request->id],['user_id',Auth::user()->id]])->first();
        $pdf = PDF::loadview('website.aggrement_online',['data'=>$model])->setPaper('a4', 'potrait')->setWarnings(false);

        return $pdf->download($request->file_name);
    }


    public function coba(){
        $get = Models\RealAccount::where([["id",1],['user_id',Auth::user()->id]])->first();
        $pdf = PDF::loadview('website.aggrement_online',['data'=>$get])->setPaper('a4', 'potrait')->setWarnings(false);
        /*
        $pdf->output();
        $dom_pdf = $pdf->getDomPDF();
        $canvas = $dom_pdf ->get_canvas();
        $canvas->page_text(500, 820, "Page {PAGE_NUM} of {PAGE_COUNT}", null, 10, array(0, 0, 0));
        */
        return $pdf->stream('aggrement_online.pdf');
    }
}
