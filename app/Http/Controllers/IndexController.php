<?php
namespace App\Http\Controllers;
use App;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
Use Alert,Response,View,Input,Session,Validator,File,Hash,Mail,PDF;

use App\Models;

class IndexController extends Controller
{
	
	public function __construct(){
        $this->keywords = 'rajawali kapital berjangka, rajawali, rajawali kapital, broker forex, broker indonesia, indonesia, broker oil, broker gold,rkb broker, berjangka forex, global kapital, rajawali kapital forex , rkb trade, komoditi indonesia';
        $this->keywordsEn = 'eagle capital futures ltd, eagle capital futures, eagle capital, eagle futures , broker forex, commodities, futures, oil, gold, indonesia commodity,';
        $this->keywordsCn = 'eagle capital futures ltd, eagle capital futures, eagle capital, eagle futures , broker forex, commodities, futures, oil, gold, indonesia commodity, 鹰资本期货有限公司，鹰资本期货，鹰资本，鹰期货，经纪人外汇，商品，期货，石油，黄金，印度尼西亚商品，';
		$agent = new Agent();
        if($agent->isMobile()){
            $this->data['isMobile'] = true;
        }else{
            $this->data['isMobile'] = false;
        }
        $this->data['menuName'] = Route::currentRouteName();
	}
	
	public function index(){ 

        
		$config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'en'){
			$this->data['title'] = 'Eagle Capital Futures Ltd';
			$this->data['description'] = 'Eagle Capital Futures Ltd exists as a company or broker that relies on the goal of providing benefits and contributions to the community.';
		}elseif($default_locale == 'cn'){
			$this->data['title'] = 'Eagle Capital Futures Ltd';
			$this->data['description'] = 'Eagle Capital Futures Ltd 作为一家公司或经纪人存在，其目标是为社区提供利益和贡献.';
		}else{
			$this->data['title'] = 'Rajawali Kapital Berjangka';
			$this->data['description'] = 'Rajawali Kapital Berjangka hadir sebagai perusahaan atau broker yang bertumpu pada tujuan untuk memberikan manfaat dan kontribusi bagi masyarakat.';
		}
        
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        $this->data['keywords'] = $this->keywords;
        $this->data['banners'] =  Models\Banners::orderBy('sequence','ASC')->get();
		 
        return view('website.index')->with($this->data);

    }

	public function kebijakanPrivasi(){ 
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'en'){
			$this->data['title'] = 'Eagle Capital Futures Ltd Privacy Policy';
            $this->data['description'] = 'Eagle Capital futures Ltd We will not sell or transmit your personal information to third parties except for those we need in connection with the normal operation of our business. Including credit card processing and verification centers, law enforcement agencies, regulators, auditors, and Introducing Brokers who have a business agreement with us.';
            $this->data['keywords'] = $this->keywords.',eagle capital futures privacy policy, rkb profile';
		}elseif($default_locale == 'cn'){
			$this->data['title'] = 'Eagle Capital Futures Ltd期货隐私政策';
            $this->data['description'] = 'Eagle Capital Futures Ltd除我们正常业务需要的信息外，我们不会将您的个人信息出售或传输给第三方。 包括与我们有业务协议的信用卡处理和验证中心，执法机构，监管机构，审计师和介绍经纪人。';
            $this->data['keywords'] = $this->keywords.',eagle capital futures privacy policy, rkb profile，鹰资本期货隐私政策，rkb个人资料';
		}else{
			$this->data['title'] = 'Kebijakan Privasi Rajawali Kapital Berjangka';
            $this->data['description'] = 'Rajawali kapital berjangka Kami tidak akan menjual atau menyampaikan informasi pribadi Anda kepada pihak ketiga kecuali bagi mereka yang kami perlukan dalam kaitannya dengan normal operasi bisnis kami. Termasuk pusat pengolahan dan verifikasi kartu kredit, lembaga penegak hukum, regulator, auditor, dan Introducing Broker yang memiliki perjanjian bisnis dengan kami.';
            $this->data['keywords'] = $this->keywords.',kebijakan privasi rajawali kapital berjangka,profil rkb';
		}
        
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        
		 
        return view('website.kebijakan-privasi')->with($this->data);
    }

	public function akunDemo(){
        $config = app('config');
        $default_locale = $config['app.locale']; 
        if($default_locale == 'en'){
			$this->data['title'] = 'Register a Demo Account in Eagle Capital Futures Ltd';
            $this->data['description'] = 'Demo account registration in Eagle Capital Futures Ltd.';
            $this->data['keywords'] = $this->keywords.', trading account registration, trading account, capital eagle account';
		}elseif($default_locale == 'cn'){
			$this->data['title'] = '在Eagle Capital Futures Ltd中注册模拟账户';
            $this->data['description'] = '在Eagle Capital Futures Ltd.中注册模拟账户';
            $this->data['keywords'] = $this->keywords.', trading account registration, trading account, capital eagle account，交易账户注册，交易账户，资本鹰账户';
		}else{
			$this->data['title'] = 'Daftar Akun Demo di Rajawali Kapital Berjangka';
            $this->data['description'] = 'Pendaftaran akun demo di Rajawali kapital berjangka.';
            $this->data['keywords'] = $this->keywords.',pendaftaran akun trading, akun trading,akun rajawali kapital';
		}
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        
		 
        return view('website.daftar-demo')->with($this->data);
    }

	public function akunReal(){ 
        $config = app('config');
        $default_locale = $config['app.locale']; 
        if($default_locale == 'en'){
			$this->data['title'] = 'Register a Real Account in Eagle Capital Futures Ltd';
            $this->data['description'] = 'Real account registration in Eagle Capital Futures Ltd.';
            $this->data['keywords'] = $this->keywords.', trading account registration, trading account, capital eagle account';
		}elseif($default_locale == 'cn'){
			$this->data['title'] = '在Eagle Capital Futures Ltd中注册真实账户';
            $this->data['description'] = '在Eagle Capital Futures Ltd.中进行真实帐户注册';
            $this->data['keywords'] = $this->keywords.', trading account registration, trading account, capital eagle account，交易账户注册，交易账户，资本鹰账户';
		}else{
			$this->data['title'] = 'Daftar Akun Real di Rajawali Kapital Berjangka';
            $this->data['description'] = 'Pendaftaran akun real di Rajawali kapital berjangka.';
            $this->data['keywords'] = $this->keywords.',pendaftaran akun trading, akun trading,akun rajawali kapital';
		}
        
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
		 
        return view('website.akun-real')->with($this->data);
    }
 
	public function profilPerusahaan(){ 
        $config = app('config');
        $default_locale = $config['app.locale']; 
        if($default_locale == 'en'){
			$this->data['title'] = 'Profile of Eagle Capital Futures Ltd';
            $this->data['description'] = 'Real account registration in Eagle Capital Futures Ltd.';
            $this->data['keywords'] = $this->keywords.',eagle capital futures profiles, rkb profiles';
		}elseif($default_locale == 'cn'){
			$this->data['title'] = '老鹰资本期货简介';
            $this->data['description'] = 'Rajawali capital futures is a brokerage company that is a member of the Commodity and Derivatives Exchange
            Trusted Indonesia (ICDX), which currently focuses on providing Southeast Asia
            services for both retail and corporate customers in conducting commodity-futures product transactions that are transacted directly on the exchange.';
            $this->data['keywords'] = $this->keywords.',eagle capital futures ltd profiles, rkb profiles,rkb 个人资料, eagle capital futures ltd 个人资料';
		}else{
			$this->data['title'] = 'Profil Rajawali Kapital Berjangka';
            $this->data['description'] = 'Rajawali kapital berjangka adalah perusahaan broker anggota Bursa Komoditi dan Derivatif
            Indonesia (ICDX) yang terpercaya, yang saat ini fokus di Asia Tenggara yang menyediakan
            layanan untuk para customer baik retail maupun corporate dalam melakukan transaksi produk-
            produk berjangka komoditi yang transaksinya langsung di dalam bursa.';
            $this->data['keywords'] = $this->keywords.',profil rajawali kapital berjangka,profil rkb';
		}
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
		 
        return view('website.profil-perusahaan')->with($this->data);
    }
	
 
	public function danaPerusahaan(){ 
        $config = app('config');
        $default_locale = $config['app.locale']; 
        if($default_locale == 'en'){
			$this->data['title'] = 'Separate Funds of the Company';
            $this->data['description'] = 'Segregated Account is an account whose purpose is intended only for the needs of customer transactions and to settle obligations arising from transaction requests from customers. The use of separate accounts is regulated and monitored by the Commodity Futures Trading Regulatory Agency (BAPPEBTI).';
            $this->data['keywords'] = $this->keywords.',separate funds, commodity futures trading watchdogs, bappebti, commodity exchanges';
		}elseif($default_locale == 'cn'){
			$this->data['title'] = '公司自有资金';
            $this->data['description'] = '隔离帐户是一种帐户，其目的仅用于满足客户交易的需要并解决因客户的交易请求而产生的义务。 商品期货交易监管机构（BAPPEBTI）对单独帐户的使用进行监管。';
            $this->data['keywords'] = $this->keywords.',独立基金，商品期货交易监管机构，bappebti，商品交易所, separate funds, commodity futures trading watchdogs, bappebti, commodity exchanges';
		}else{
			$this->data['title'] = 'Dana Terpisah Perusahaan';
            $this->data['description'] = 'Segregated Account atau rekening terpisah adalah rekening yang kegunaannya ditujukan hanya untuk keperluan transaksi nasabah dan menyelesaikan kewajiban yang muncul atas permintaan transaksi dari nasabah. Penggunaan rekening terpisah diatur dan diawasi oleh Badan Pengawas Perdagangan Berjangka Komoditi (BAPPEBTI).';
            $this->data['keywords'] = $this->keywords.',dana terpisah,badan pengawas perdagangan berjangka komoditi, bappebti,bursa komoditi';
		}
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        
        return view('website.dana-perusahaan')->with($this->data);
    }
 
	public function akunIndividu(){ 

        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'en'){
			$this->data['title'] = 'Individual Account';
            $this->data['description'] = 'Segregated Account or a separate account is an account whose use is intended only for the needs of customer transactions and resolve obligations that arise at the request of a transaction from the customer. The use of separate accounts is regulated and monitored by the Commodity Futures Trading Regulatory Agency (BAPPEBTI).';
            $this->data['keywords'] = $this->keywords.',individual trading accounts, personal accounts, open demo accounts, open real trading accounts, accounts, commodity trading accounts';
		}elseif($default_locale == 'cn'){
			$this->data['title'] = '个人账户';
            $this->data['description'] = '独立帐户或单独帐户是仅用于满足客户交易需求并解决客户在交易请求时产生的义务的帐户。 商品期货交易监管机构（BAPPEBTI）对单独帐户的使用进行监管。';
            $this->data['keywords'] = $this->keywords.',individual trading accounts, personal accounts, open demo accounts, open real trading accounts, accounts, commodity trading accounts，个人交易账户，个人账户，开设模拟账户，开设真实交易账户，账户，商品交易账户';
		}else{
			$this->data['title'] = 'Akun Individu';
            $this->data['description'] = 'Segregated Account atau rekening terpisah adalah rekening yang kegunaannya ditujukan hanya untuk keperluan transaksi nasabah dan menyelesaikan kewajiban yang muncul atas permintaan transaksi dari nasabah. Penggunaan rekening terpisah diatur dan diawasi oleh Badan Pengawas Perdagangan Berjangka Komoditi (BAPPEBTI).';
            $this->data['keywords'] = $this->keywords.',akun trading individu, akun personal,buka akun demo, buka akun trading real, akun, akun trading komoditi';
        }
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');

        return view('website.akun-individu')->with($this->data);
    }
 
	public function akunInstitusi(){ 
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'en'){
			$this->data['title'] = 'Individual Account';
            $this->data['description'] = 'Segregated Account or a separate account is an account whose use is intended only for the needs of customer transactions and resolve obligations that arise at the request of a transaction from the customer. The use of separate accounts is regulated and monitored by the Commodity Futures Trading Regulatory Agency (BAPPEBTI).';
            $this->data['keywords'] = $this->keywords.',individual trading accounts, personal accounts, open demo accounts, open real trading accounts, accounts, commodity trading accounts';
		}elseif($default_locale == 'cn'){
			$this->data['title'] = '个人账户';
            $this->data['description'] = '独立帐户或单独帐户是仅用于满足客户交易需求并解决客户在交易请求时产生的义务的帐户。 商品期货交易监管机构（BAPPEBTI）对单独帐户的使用进行监管。';
            $this->data['keywords'] = $this->keywords.',individual trading accounts, personal accounts, open demo accounts, open real trading accounts, accounts, commodity trading accounts，个人交易账户，个人账户，开设模拟账户，开设真实交易账户，账户，商品交易账户';
		}else{
			$this->data['title'] = 'Akun Institusi';
            $this->data['description'] = 'Segregated Account atau rekening terpisah adalah rekening yang kegunaannya ditujukan hanya untuk keperluan transaksi nasabah dan menyelesaikan kewajiban yang muncul atas permintaan transaksi dari nasabah. Penggunaan rekening terpisah diatur dan diawasi oleh Badan Pengawas Perdagangan Berjangka Komoditi (BAPPEBTI).';
            $this->data['keywords'] = $this->keywords.',akun trading perusahaan, akun perusahaan,buka akun real ,trading beneran, buka akun trading real, akun, akun trading komoditi';
        }
        
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        return view('website.akun-institusi')->with($this->data);
    }

	public function gofxGold(){ 
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'cn'){
			$this->data['title'] = '黄金-GOFX产品';
            $this->data['description'] = '黄金GOFX产品。 黄金是世界上最古老的财富管理工具之一，几千年来，它一直被视为全球货币，商品，投资以及仅仅是作为美丽的对象而被重视。';
            $this->data['keywords'] = $this->keywords.',trading in gold, gold, commodity,交易黄金，黄金，商品';
		}elseif($default_locale == 'en'){
			$this->data['title'] = 'GOLD - GOFX products';
            $this->data['description'] = 'Gold GOFX products. Gold is one of the oldest wealth management instruments in the world and for thousands of years it has been valued as a global currency, commodity, investment and simply as an object of beauty.';
            $this->data['keywords'] = $this->keywords.',trading in gold, gold, commodity';
		}else{
            $this->data['title'] = 'GOLD - Produk GOFX';
            $this->data['description'] = 'Gold produk GOFX. Emas adalah salah satu instrumen pengelola kekayaan tertua di dunia dan selama ribuan tahun telah dihargai sebagai mata uang global, komoditas, investasi, dan sekadar sebagai obyek kecantikan.';
            $this->data['keywords'] = $this->keywords.',trading komoditi emas,emas,komoditi';
        }
       
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
		 
        return view('website.gofx-gold')->with($this->data);
    }

	public function gofxOil(){ 
        $this->data['title'] = 'Crude Oil - Produk GOFX';
        $this->data['description'] = 'Crude Oil produk GOFX. Naik turunnya harga minyak dunia sangat mempengaruhi perekonomian global. Sebagai sumber bahan bakar utama harga minyak akan mempengaruhi biaya transportasi maupun biaya manufaktur sehingga mempengaruhi harga komoditi, barang dan jasa.';
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        $this->data['keywords'] = $this->keywords.',crude oil,trading komoditi minyak bumi,oil,minyak bumi,minyak,komoditi';
		 
        return view('website.gofx-oil')->with($this->data);
    }

	public function gofxForex(){ 
        $this->data['title'] = 'Forex - Produk GOFX';
        $this->data['description'] = 'Forex produk GOFX.Pasar FX adalah pasar modal terbesar dan terdalam di dunia. Ini diperdagangkan hampir sepanjang waktu, di seluruh dunia, setiap hari.';
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        $this->data['keywords'] = $this->keywords.',forex trading,bermain forex, trading valuta asing';
		 
        return view('website.gofx-forex')->with($this->data);
    }

	public function addContact(Request $request){
        $valid = $this->validate($request, [
            'contact_name'      => 'required|max:255',
            'contact_company'   => 'max:255',
            'contact_email'     => 'required|max:255|email',
            'contact_phone'     => 'required|max:15',
            'contact_message'   => 'required',
            'g-recaptcha-response'=>'required'
        ]); 
        
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=6LcINMUUAAAAAD5h_Eew3DNiipI2NB0kn-nm7Bsw&response='.$request->get('g-recaptcha-response');   
            $recaptcha = file_get_contents($url);
            // $recaptcha = '{"success":true}';
            $recaptcha = json_decode($recaptcha, true);
            if (!$recaptcha['success']) {
				Session::flash('error', 'Oppsss, Human !!!');
                return redirect()->back();
            }else {
                $masuk = array(
                        'contact_name'      => $request->get('contact_name'),
                        'contact_company'   => $request->get('contact_company'),
                        'contact_email'     => $request->get('contact_email'),
                        'contact_phone'     => $request->get('contact_phone'),
                        'contact_message'   => $request->get('contact_message')
                    );
            
                $content = view('emails.email_content_contact')->with($masuk);
                Models\Contacts::create($masuk);
                Mail::send('layouts.email', ['contentMessage' => $content], function($message) {
                    $message->to('marketing@rajawalikapital.co.id')->subject('User Contact From Website');
                    $message->from('info@rajawalikapital.co.id','PT. Rajawali Kapital Berjangka');
                });

                Session::flash('success', 'Terima kasih telah menghubungi kami');
                return redirect()->back();
            }
    }

    public function addNewslater(Request $request){ 
        $valid = $this->validate($request, [
            'email'     => 'required|max:255|email'
        ]); 
        $masuk = array(
                    'email'      => $request->get('email')
                );
        Models\Newslaters::create($masuk);

        Session::flash('success', 'Terima kasih telah mengirimkan email anda.');
        return redirect()->back();
    }

	public function hubungiPerusahaan(){
        $this->data['title'] = 'Hubungi Kami';
        $this->data['description'] = 'PT. Rajawali Kapital Berjangka beralamat di Ruko Kopo Plaza Blok B no 24 jl. peta (lingkar selatan) Kota Bandung,Jawa Barat';
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        $this->data['keywords'] = $this->keywords.',Rajawali Kapital Berjangka';
		 
        return view('website.hubungi-perusahaan')->with($this->data);
    }


	public function technology(){ 
        $this->data['title'] = 'Teknologi di Rajawali Kapital Berjangka';
        $this->data['description'] = 'MetaTrader 5 merupakan platform trading yang paling populer di seluruh dunia. Kami memberikan kemudahan untuk para Trader agar bisa bertransaksi produk Gold, Oil & Forex langsung di Bursa melalui platform MT 5.';
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        $this->data['keywords'] = $this->keywords.',meta trader, meta 5,5,meta';
		 
        return view('website.technology')->with($this->data);
    }
    
	public function partnership(){ 
        $this->data['title'] = 'Teknologi di Rajawali Kapital Berjangka';
        $this->data['description'] = 'Sebagai salah satu real broker tepercaya di Indonesia, Rajawali Kapital memberikan peluang pertnership bagi seluruh nasabah dan  anda yang ingin mendapatkan penghasilan tambahan dari networking anda yang anda ajak untuk bertransaksi melalui kami. ';
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        $this->data['keywords'] = $this->keywords.',partnership';
		 
        return view('website.partnership')->with($this->data);
    }

    public function addDemoAccount(Request $request){ 
        $valid = $this->validate($request, [
            'name'                  => 'required|max:255',
            'email'                 => 'required|max:191|email|unique:users,email',
            'phoneNumber'           => 'required|max:15',
            'newslater_register'    => 'in:0,1',
            'terms_and_conditions'  => 'required|in:0,1',
            'g-recaptcha-response'=>'required'
        ]); 

		$url = 'https://www.google.com/recaptcha/api/siteverify?secret=6LcINMUUAAAAAD5h_Eew3DNiipI2NB0kn-nm7Bsw&response='.$request->get('g-recaptcha-response');   
        $recaptcha = file_get_contents($url);
        $recaptcha = json_decode($recaptcha, true);
		if(!$recaptcha['success']) {
			Session::flash('error', 'Oppsss, Human !!!');
            return redirect()->back();
        }else{
			$number = $this->generateBarcodeNumber(); 
			$uniqid = uniqid();
			if(empty($request->get('newslater_register'))){
				$newslater_register = 0;
			}else{
				$newslater_register = $request->get('newslater_register');
			}

			$masuk = array(
				'name'                          => $request->get('name'), 
				'email'                         => $request->get('email'),
				'phone'                         => $request->get('phoneNumber'),
				'password_first'                => $uniqid, 
				'newslater'			            => $newslater_register, 
				'terms_and_conditions'          => $request->get('terms_and_conditions'), 
				'password'                      => Hash::make($uniqid), 
				'status'                        => 'active');
				
			Models\User::create($masuk);
			$crypt = Crypt::encrypt($request->get('email'));
			$masuk['url'] = url('/').'/akun-demo-konfirmasi/'.$crypt;
            $masuk['type'] = 'demo';
			$content = view('emails.email_register_konfirmasi')->with($masuk);
			Mail::send('layouts.email', ['contentMessage' => $content], function($message)  use ($masuk){
				$message->to($masuk['email'])->subject('Konfirmasi Pendaftaran Akun Demo');
				$message->from('info@rajawalikapital.co.id','PT. Rajawali Kapital Berjangka');
			});
			if (Mail::failures()) {
				Session::flash('success', 'Email tidak terkirimkan silahkan login dengan email dan password '.$uniqid);
			}else{
				Session::flash('success', 'Silahkan cek email anda dan klik link konfirmasi.');
			}
			return redirect()->back();
		}
    }
	
    public function addRealAccount(Request $request){
        $check =  Models\User::where('email',$request->get('email'))->first();
        if($check){
            Session::flash('success', 'Email anda sudah terdaftar, silahkan login ke client area.');
            return redirect()->route('login');
        }else{
            $valid = $this->validate($request, [
                'name'                  => 'required|max:255',
                'email'                 => 'required|max:191|email|unique:users,email',
                'phoneNumber'           => 'required|max:15',
                'referral_code'         => 'max:255',
                'newslater_register'    => 'in:0,1',
                'terms_and_conditions'  => 'required|in:0,1',
                'g-recaptcha-response'=>'required'
            ]); 
    
            $url = 'https://www.google.com/recaptcha/api/siteverify?secret=6LcINMUUAAAAAD5h_Eew3DNiipI2NB0kn-nm7Bsw&response='.$request->get('g-recaptcha-response');   
            $recaptcha = file_get_contents($url);
            $recaptcha = json_decode($recaptcha, true);
            if(!$recaptcha['success']) {
                Session::flash('error', 'Oppsss, Human !!!');
                return redirect()->back();
            }else{ 
                $uniqid = uniqid();
                if(empty($request->get('newslater_register'))){
                    $newslater_register = 0;
                }else{
                    $newslater_register = $request->get('newslater_register');
                }
    
                $masuk = array(
                    'name'                          => $request->get('name'), 
                    'email'                         => $request->get('email'),
                    'phone'                         => $request->get('phoneNumber'),
                    'referral_code'                 => $request->get('referral_code'),
                    'password_first'                => $uniqid, 
                    'newslater'                     => $newslater_register, 
                    'terms_and_conditions'          => $request->get('terms_and_conditions'), 
                    'password'                      => Hash::make($uniqid), 
                    'status'                        => 'active');
                    
                Models\User::create($masuk);
                $crypt = Crypt::encrypt($request->get('email'));
                $masuk['url'] = url('/').'/akun-real-konfirmasi/'.$crypt;
                $masuk['type'] ='real';
                $content = view('emails.email_register_konfirmasi')->with($masuk);
                Mail::send('layouts.email', ['contentMessage' => $content], function($message)  use ($masuk){
                    $message->to($masuk['email'])->subject('Konfirmasi Pendaftaran Akun Real');
                    $message->from('info@rajawalikapital.co.id','PT. Rajawali Kapital Berjangka');
                });
    
                Session::flash('success', 'Silahkan cek email anda dan klik link konfirmasi.');
                return redirect()->back();
            }

        }
    }
    
    public function addPartnership(Request $request){ 
        $valid = $this->validate($request, [
            'name'                  => 'required|max:255',
            'email'                 => 'required|max:191|email|unique:partnership,email',
            'phoneNumber'           => 'required|max:15',
            'terms_and_conditions'  => 'required|in:0,1',
            'g-recaptcha-response'=>'required'
        ]); 
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=6LcINMUUAAAAAD5h_Eew3DNiipI2NB0kn-nm7Bsw&response='.$request->get('g-recaptcha-response');   
        $recaptcha = file_get_contents($url);
        $recaptcha = json_decode($recaptcha, true);
        if(!$recaptcha['success']) {
			Session::flash('error', 'Oppsss, Human !!!');
            return redirect()->back();
        }else{
			$masuk = array(
				'name'                          => $request->name, 
				'email'                         => $request->email,
				'phone'                         => $request->phoneNumber,
				'terms_and_conditions'          => $request->terms_and_conditions);

            $check = Models\Partnership::where('email',$request->email)->first();
            if($check){
                Session::flash('info', 'Email anda sudah terdaftar !!!');
                return redirect()->back();
            }else{
				
                Models\Partnership::create($masuk);
                $content = view('emails.email_partnership')->with($masuk);
                Mail::send('layouts.email', ['contentMessage' => $content], function($message)  use ($masuk){
                    $message->to($masuk['email'])->subject('Partnership dengan Rajawali Kapital');
                    $message->attach('public/assets/files/IB-Registration.pdf', ['mime' => 'application/pdf']);
                    $message->attach('public/assets/files/IB-Declaration.pdf', ['mime' => 'application/pdf']);
                    $message->attach('public/assets/files/IB-Scheme.pdf', ['mime' => 'application/pdf']);
                    $message->from('info@rajawalikapital.co.id','PT. Rajawali Kapital Berjangka');
                });
    
                Session::flash('success', 'Silahkan cek email anda dan pihak kami akan segera menghubungi anda.');
                return redirect()->back();

            }
        }
		 
    }
    
    public function aktivasiAkun($token){
        $email = Crypt::decrypt($token);
        $check = Models\User::where([['email',$email],['email_verified_at',null]])->first();
        if($check){
            $account = Models\MetaAccount::where('used',0)->first(); 
            if($account){
                
                $check->username          = $check->email;
                $check->email_verified_at = date('Y-m-d H:i:s');
                $check->update(); 

                $account->used  = 1;
                $account->user_id  = 1;
                $account->update();


                $send = array(
                    'user'              => $check,
                    'account'           => $account
                ); 
                $content = view('emails.email_akun_demo')->with($send);
                Mail::send('layouts.email', ['contentMessage' => $content], function($message)  use ($check) {
                    $message->to($check->email)->cc(["compliance@rajawalikapital.co.id","marketing@rajawalikapital.co.id"])->subject('Akun Demo Rajawali Kapital Berjangka');
                    $message->from('info@rajawalikapital.co.id','Info Rajawali Kapital Berjangka');
                 });

                Session::flash('warning', 'Silahkan cek email anda dan selamat Trading');
                return redirect()->route('indexWeb'); 
 
            }else{
                $send = array(
                    'title'             => 'Demo Account Out Of Stock',
                    'user'              => $check,
                ); 
                $content = view('emails.email_notification')->with($send);
                Mail::send('layouts.email', ['contentMessage' => $content], function($message) {
                    $message->to('info@rajawalikapital.co.id')->cc(["compliance@rajawalikapital.co.id","marketing@rajawalikapital.co.id"])->subject('Demo Account Out Of Stock');
                    $message->from('info@rajawalikapital.co.id','PT. Rajawali Kapital Berjangka');
                 });

                Session::flash('warning', 'Data Demo Akun Habis, team kami akan segera mengirimkan data kepada langsung.');
                return redirect()->route('indexWeb');
            }
        }else{
            Session::flash('warning', 'Silahkan lakukan pendaftaran.');
            return redirect()->route('akunDemoPerusahaanWeb');
        }
    }
	
	
    public function aktivasiAkunReal($token){
        $email = Crypt::decrypt($token);
        $check = Models\User::where([['email',$email],['email_verified_at',null]])->first();
        if($check){
            $account = Models\MetaAccount::where('used',0)->first(); 
            if($account){
                $check->username          = $check->email;
                $check->email_verified_at = date('Y-m-d H:i:s');
                $check->update(); 

                $account->used     = 1;
                $account->user_id  = $check->id;
                $account->update();


                $send = array(
                    'user'              => $check,
                    'account'           => $account
                ); 
                $content = view('emails.email_akun_real')->with($send);
                Mail::send('layouts.email', ['contentMessage' => $content], function($message)  use ($check) {
                    $message->to($check->email)->cc(["compliance@rajawalikapital.co.id","marketing@rajawalikapital.co.id"])->subject('Akun Real Rajawali Kapital Berjangka');
                    $message->from('info@rajawalikapital.co.id','Info Rajawali Kapital Berjangka');
                 });

                Session::flash('success', 'Silahkan cek email anda dan selamat Trading');
                return redirect()->route('indexWeb'); 
 
            }else{
                $send = array(
                    'title'             => 'Real Account Out Of Stock',
                    'user'              => $check,
                ); 
                $content = view('emails.email_notification')->with($send);
                Mail::send('layouts.email', ['contentMessage' => $content], function($message) {
                    $message->to('info@rajawalikapital.co.id')->cc(["compliance@rajawalikapital.co.id","marketing@rajawalikapital.co.id"])->subject('Real Account Out Of Stock');
                    $message->from('info@rajawalikapital.co.id','PT. Rajawali Kapital Berjangka');
                 });

                Session::flash('warning', 'Data Real Akun Habis, team kami akan segera mengirimkan data kepada langsung.');
                return redirect()->route('indexWeb');
            }
        }else{
            Session::flash('warning', 'Silahkan lakukan pendaftaran.');
            return redirect()->route('akunDemoPerusahaanWeb');
        }
    }
    
	public function getJsonCountry(){
        $country = Models\Country::orderBy('id','ASC')->get();
        return response()->json(['status'=>200,'data'=>$country,'message'=>'']);
    }

	public function lang($lang){
        App::setLocale($lang);
        session()->put('locale', $lang);
        return redirect()->back();
    }

    

	public function newsPerusahaanWeb(){

        $this->data['title'] = 'Berita Pasar';
        $this->data['description'] = 'Pasar Komoditi adalah tempat jual beli barang dari sektor ekonomi primer, baik dalam bentuk fisik maupun melalui kontrak derivatif. Secara umum, ada dua jenis komoditi yang diperdagangkan, yaitu Soft Commodities dan Hard Commodities.';
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        $this->data['keywords'] = $this->keywords.',berita pasar komoditi,berita pasar, pasar komoditi, harga pasar komoditi, harga komoditi';
		 
        $this->data['news'] =  Models\News::orderBy('id','DESC')->paginate(10);

        return view('website.news')->with($this->data);

    }
    
	public function newsDetailPerusahaanWeb($slug){

        $check = Models\News::where('slug_id',$slug)->first();
        if($check){
            $this->data['title'] = $check->title_id.' - Rajawali Kapital Berjangka';
            $this->data['description'] = $check->description_id;
            $this->data['imageseo'] = asset('/public/news/'.$check->seo_img);
            $this->data['keywords'] = $this->keywords.','.$check->tags_id;
             
            $this->data['news'] = $check;
    
            return view('website.news_detail')->with($this->data);
        }else{
            Session::flash('warning', 'data yang anda cari tidak ditemukan.');
            return redirect()->route('indexWeb');
        }

    }

	public function coba(){ 
		$forex = new Models\ForexFactory;
		$res = $forex->getNews();
		print_r($res);
		
		// $xml = simplexml_load_string($res);
		// $str_replace = str_replace('<span>More</span>', '', $xml);
		// $str_replace = str_replace('<span class="loader"></span>', '', $str_replace);
		// $str_replace = str_replace('/news/', '/berita-ekonomi/', $str_replace);
        // $this->data['title'] = 'PT. Rajawali Kapital Berjangka'; 
        // $this->data['name'] = 'PT. Rajawali Kapital Berjangka'; 
        // $this->data['url'] = 'PT. Rajawali Kapital Berjangka'; 
        // $link = 'PT. Rajawali Kapital Berjangka';


        // $this->data['contact_name'] = 'PT. Rajawali Kapital Berjangka'; 
        // $this->data['contact_company'] = 'PT. Rajawali Kapital Berjangka'; 
        // $this->data['contact_email'] = 'PT. Rajawali Kapital Berjangka';
        // $this->data['contact_phone'] = 'PT. Rajawali Kapital Berjangka'; 
        // $this->data['contact_message'] = 'PT. Rajawali Kapital Berjangka'; 

        // $check = Models\User::where('email','nugrohoaditya10@gmail.com')->first();
        // $account = Models\MetaAccount::where('used',0)->first();
        // $real = Models\RealAccount::where('id',4)->first();
        // $send = array(
            // 'title'             => 'Terima kasih, anda telah melakukan pendaftaran <b>Akun Real</b>',
            // 'name'              => 'Auth::user()->name',
            // 'message'           => 'Data anda sedang direview oleh tim kami. Tunggu kabar baiknya yah.',
            // 'id'                => '$encrypted',
			// 'user'              => $check,
			// 'account'           => $account
        // ); 
		 
			// $masuk = array(
				// 'name'                          => 'aaa', 
				// 'email'                         => 'assdd',
				// 'phone'                         => '98230802',
				// 'terms_and_conditions'          => 'aa');
				
        // return view('emails.email_akun_demo')->with($send);
        // return view('emails.email_akun_demo')->with($this->data);
        // return view('emails.email_notification_approval_real_account')->with(['data' => $real]);
	}
         
	
    public function detailDataAkunReal($id){
        // $decrypted = Crypt::decryptString($id);
        $model = Models\RealAccount::where("id",$id)->first();
        if($model){
            $pdf = PDF::loadview('website.aggrement_online',['data'=>$model])->setPaper('a4', 'potrait')->setWarnings(false);
            return $pdf->stream('aggrement_online.pdf');
        }else{
            Session::flash('warning', 'Silahkan lakukan pendaftaran.');
            return redirect()->route('akunDemoPerusahaanWeb');
        }
    }
	
	
	
    function generateBarcodeNumber() { 
        $count =  Models\User::count();
        $code = 'RJL-'.sprintf("%08d", $count);
        return $code;
		/*
        $number = mt_rand(1000000000, 9999999999); // better than rand()
    
        // call the same function if the barcode exists already
        if ($this->barcodeNumberExists($number)) {
            return $this->generateBarcodeNumber();
        }
    
        // otherwise, it's valid and can be used
        return $number;
		*/
    }
    
    function barcodeNumberExists($number) {
        return Models\User::where('username',$number)->exists();
    }


private function getBodyNews($string, $start, $end){
		$string = ' ' . $string;
		$ini = strpos($string, $start);
		if ($ini == 0) return '';
		$ini += strlen($start);
		$len = strpos($string, $end, $ini) - $ini;
		return substr($string, $ini, $len);
	}
	
	
	

	public function econimicCalender(){
		// $forex = new Models\ForexFactory;
		// $res = $forex->getCalender();
		// $xml = simplexml_load_string($res);
		// $str_replace = str_replace('timezone.php', '', $xml);
		// $str_replace = str_replace('<a class="calendar__detail-link calendar__detail-link--graph-icon calendar_chart"></a>', '-', $str_replace);
		$this->data['title'] = 'Kalender Berita - Rajawali Kapital Berjangka';
        $this->data['description'] = 'Kalender Berita - Rajawali Kapital Berjangka';
        $this->data['imageseo'] = '';
        $this->data['keywords'] = 'kalender rajawali kapital berjangka, forexfactory.com, rkb,rajawali'.$this->keywords;
             
        // $this->data['forexFactory'] = $str_replace;
        return view('website.forex-factory-calender')->with($this->data);
		
	}
	
	public function econimicCalenderDetail($id){
		// $forex = new Models\ForexFactory;
		// $res = $forex->getCalenderDetail($id);
		// $xml = simplexml_load_string($res);
		// $str_replace = str_replace('calendar.php', 'https://www.forexfactory.com/calendar.php', $xml);
		// $str_replace = str_replace('/news/', '/berita-ekonomi/', $str_replace);
		// $str_replace = str_replace('legal.php', 'https://www.forexfactory.com/legal.php', $str_replace);
		// $str_replace = str_replace('<span>More</span>', '', $str_replace);
		// $str_replace = str_replace('<span>Exit Graph</span>', '', $str_replace);
		// $str_replace = str_replace('<span>Graph</span>', '', $str_replace);
		// $str_replace = str_replace('<span class="loader"></span>', '', $str_replace);
		// $str_replace = str_replace('Exit Detail View', '<a href="/kalender-ekonomi">Exit Detail View</a>', $str_replace);
		$this->data['title'] = 'Kalender Ekonomi - Rajawali Kapital Berjangka';
        $this->data['description'] = 'Kalender Ekonomi - Rajawali Kapital Berjangka';
        $this->data['imageseo'] = '';
        $this->data['keywords'] = 'kalender rajawali kapital berjangka, forexfactory.com, rkb,rajawali'.$this->keywords;
        $this->data['detailForexFactory'] = $str_replace;
		
		// echo $str_replace;
        return view('website.forex-factory-calender-detail')->with($this->data);
		
	}
	
	public function newsForexFactory(){
		$forex = new Models\ForexFactory;
		$res = $forex->getNews();
		$xml = simplexml_load_string($res);
		$str_replace = str_replace('<span>More</span>', '', $xml);
		$str_replace = str_replace('<span class="loader"></span>', '', $str_replace);
		$str_replace = str_replace('/news/', '/berita-ekonomi/', $str_replace);
		$this->data['title'] = 'Berita Ekonomi - Rajawali Kapital Berjangka';
        $this->data['description'] = 'Berita Ekonomi - Rajawali Kapital Berjangka';
        $this->data['imageseo'] = '';
        $this->data['keywords'] = 'berita ekonomi rajawali kapital berjangka, forexfactory.com, rkb,rajawali'.$this->keywords;
        $this->data['newsForexFactory'] = $str_replace;
		
		// echo $str_replace;
        return view('website.forex-factory-new')->with($this->data);
		
	}
	
	public function detailNewsForexFactory($id){
		$forex = new Models\ForexFactory;
		$res = $forex->getDetailNews($id);
		$text = $this->getBodyNews($res , '<ul class="flexBox__body" data-index="main">', '</ul>');
		$myArray = explode('-', $id);
		$implode = implode(" ",$myArray);
		$this->data['title'] = 'Berita Ekonomi - '.$implode;
        $this->data['description'] = 'Berita Ekonomi - Rajawali Kapital Berjangka '.$implode;
        $this->data['imageseo'] = '';
        $this->data['keywords'] = 'berita ekonomi rajawali kapital berjangka, forexfactory.com, rkb,rajawali'.implode(" ",$myArray) ;
        $this->data['detailNewsForexFactory'] = $text;
		
		// echo $str_replace;
        return view('website.forex-factory-new-detail')->with($this->data);
		
	}


}