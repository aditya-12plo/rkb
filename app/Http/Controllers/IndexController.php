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
            $this->data['description'] = 'Eagle Capital Futures is a trusted brokerage company member of the Indonesian Commodity and Derivatives Exchange (ICDX), which is currently focusing in Southeast Asia, which provides services for both retail and corporate customers in conducting commodity futures products that transact directly on the stock exchange.';
            $this->data['keywords'] = $this->keywords.',eagle capital futures profiles, rkb profiles';
		}elseif($default_locale == 'cn'){
			$this->data['title'] = 'Eagle Capital Futures Ltd 个人资料';
            $this->data['description'] = 'Eagle Capital Futures是一家经纪公司，隶属于印度尼西亚商品和衍生品交易所（ICDX），该公司目前致力于为零售和企业客户提供东南亚服务，以进行直接在商品交易所进行的商品期货产品交易。 交换。';
            $this->data['keywords'] = $this->keywords.',eagle capital futures ltd profiles, rkb profiles,rkb 个人资料, eagle capital futures ltd 个人资料';
		}else{
			$this->data['title'] = 'Profil Rajawali Kapital Berjangka';
            $this->data['description'] = 'Rajawali kapital berjangka adalah perusahaan broker anggota Bursa Komoditi dan Derivatif
            Indonesia (ICDX) yang terpercaya, yang saat ini fokus di Asia Tenggara yang menyediakan
            layanan untuk para customer baik retail maupun corporate dalam melakukan transaksi produk-
            produk berjangka komoditi yang transaksinya langsung di dalam bursa.';
            $this->data['keywords'] = $this->keywords.',profil rajawali kapital berjangka,profil rkb';
        };
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
			$this->data['title'] = 'Institutional Account';
            $this->data['description'] = 'Segregated Account or a separate account is an account whose use is intended only for the needs of customer transactions and resolve obligations that arise at the request of a transaction from the customer. The use of separate accounts is regulated and monitored by the Commodity Futures Trading Regulatory Agency (BAPPEBTI).';
            $this->data['keywords'] = $this->keywords.', company trading account, company account, open real account, real trading, open real trading account, account, commodity trading account';
		}elseif($default_locale == 'cn'){
			$this->data['title'] = '机构账户';
            $this->data['description'] = '独立帐户或单独帐户是仅用于满足客户交易需求并解决客户在交易请求时产生的义务的帐户。 商品期货交易监管机构（BAPPEBTI）对单独帐户的使用进行监管。';
            $this->data['keywords'] = $this->keywords.', company trading account, company account, open real account, real trading, open real trading account, account, commodity trading account，公司交易账户，公司账户，开设真实账户，真实交易，开设真实交易账户，账户，商品交易账户';
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
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'cn'){
			$this->data['title'] = '原油-GOFX产品';
            $this->data['description'] = '原油GOFX产品。 世界石油价格的上升和下降极大地影响了全球经济。 石油价格是主要的燃料来源，会影响运输成本和制造成本，从而影响商品，商品和服务的价格。';
            $this->data['keywords'] = $this->keywords.', crude oil, trading of petroleum commodities, oil, petroleum, oil, commodities，原油，石油商品贸易，石油，石油，石油，商品';
		}elseif($default_locale == 'en'){
			$this->data['title'] = 'Crude Oil - GOFX product';
            $this->data['description'] = 'Crude Oil GOFX products. The rise and fall of world oil prices greatly affects the global economy. As the main fuel source, oil prices will affect transportation costs and manufacturing costs, thereby affecting the prices of commodities, goods and services.';
            $this->data['keywords'] = $this->keywords.', crude oil, trading of petroleum commodities, oil, petroleum, oil, commodities';
		}else{
            $this->data['title'] = 'Crude Oil - Produk GOFX';
            $this->data['description'] = 'Crude Oil produk GOFX. Naik turunnya harga minyak dunia sangat mempengaruhi perekonomian global. Sebagai sumber bahan bakar utama harga minyak akan mempengaruhi biaya transportasi maupun biaya manufaktur sehingga mempengaruhi harga komoditi, barang dan jasa.';
            $this->data['keywords'] = $this->keywords.',crude oil,trading komoditi minyak bumi,oil,minyak bumi,minyak,komoditi';
        }
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');


        return view('website.gofx-oil')->with($this->data);
    }

	public function gofxForex(){ 
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'cn'){
			$this->data['title'] = '外汇-GOFX产品';
            $this->data['description'] = '外汇GOFX产品。 外汇市场是世界上最大和最深的资本市场。 它几乎每天都在世界各地进行交易。';
            $this->data['keywords'] = $this->keywords.', forex trading, playing forex, foreign exchange trading，外汇交易，玩外汇，外汇交易';
		}elseif($default_locale == 'en'){
			$this->data['title'] = 'Forex - GOFX products';
            $this->data['description'] = 'Forex GOFX products. The FX market is the largest and deepest capital market in the world. It is traded almost all the time, all over the world, every day.';
            $this->data['keywords'] = $this->keywords.', forex trading, playing forex, foreign exchange trading';
		}else{
            $this->data['title'] = 'Forex - Produk GOFX';
            $this->data['description'] = 'Forex produk GOFX.Pasar FX adalah pasar modal terbesar dan terdalam di dunia. Ini diperdagangkan hampir sepanjang waktu, di seluruh dunia, setiap hari.';
            $this->data['keywords'] = $this->keywords.',forex trading,bermain forex, trading valuta asing';
        }
        
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        
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
            //$recaptcha = '{"success":true}';
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
    public function addContactTest(){ 

			$masuk = array(
				'contact_name'                  => "asd name", 
                'contact_company'               => "asd company",
                'contact_email'                 => "asd email",
				'contact_phone'                 =>"08587554545",
				'contact_message'                => "testing",);
				 
			$crypt = Crypt::encrypt('email');
			$masuk['url'] = url('/').'/akun-demo-konfirmasi/'.$crypt;
            $masuk['type'] = 'demo';
                //blade body emails.email_register_konfirmasi
            $content = view('emails.email_content_contact')->with($masuk);
            return view('emails.email_content_contact')->with($masuk);

    }
    public function addNewslater(Request $request){ 
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'cn'){
			$pesan  = '感谢您发送电子邮件。';
		}elseif($default_locale == 'en'){
			$pesan  = 'Thank you for sending your e-mail.';
		}else{
           $pesan   = 'Terima kasih telah mengirimkan email anda.';
        }
        $valid = $this->validate($request, [
            'email'     => 'required|max:255|email'
        ]); 
        $masuk = array(
                    'email'      => $request->get('email')
                );
        Models\Newslaters::create($masuk);

        Session::flash('success', $pesan);
        return redirect()->back();
    }

	public function hubungiPerusahaan(){
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'cn'){
			$this->data['title'] = '联系我们';
            $this->data['description'] = 'Eagle Capital Futures Ltd位于Ruko Kopo Plaza Blok B no 24 jl。 Peta（lingkar selatan）西爪哇省万隆市。';
            $this->data['keywords'] = $this->keywords.', Eagle Capital Futures Ltd, 鹰资本期货有限公司';
		}elseif($default_locale == 'en'){
			$this->data['title'] = 'Contact us';
            $this->data['description'] = 'Eagle Capital Futures Ltd is located at Ruko Kopo Plaza Blok B no 24 jl. peta (lingkar selatan) Bandung City, West Java.';
            $this->data['keywords'] = $this->keywords.', Eagle Capital Futures Ltd';
		}else{
            $this->data['title'] = 'Hubungi Kami';
            $this->data['description'] = 'PT. Rajawali Kapital Berjangka beralamat di Ruko Kopo Plaza Blok B no 24 jl. peta (lingkar selatan) Kota Bandung,Jawa Barat.';
            $this->data['keywords'] = $this->keywords.',Rajawali Kapital Berjangka';
        }
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        
        return view('website.hubungi-perusahaan')->with($this->data);
    }


	public function technology(){ 
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'cn'){
			$this->data['title'] = 'Eagle Capital Futures Ltd中的技术';
            $this->data['description'] = 'MetaTrader 5是全球最受欢迎的交易平台。 我们使交易者可以通过MT 5平台直接在交易所上轻松交易黄金，石油和外汇产品。';
            $this->data['keywords'] = $this->keywords.', meta trader, meta 5.5, meta，元交易者，元5.5，元';
		}elseif($default_locale == 'en'){
			$this->data['title'] = 'Technology in Eagle Capital Futures Ltd';
            $this->data['description'] = 'MetaTrader 5 is the most popular trading platform in the whole world. We make it easy for traders to trade Gold, Oil & Forex products directly on the Exchange through the MT 5 platform.';
            $this->data['keywords'] = $this->keywords.', meta trader, meta 5.5, meta';
		}else{
            $this->data['title'] = 'Teknologi di Rajawali Kapital Berjangka';
            $this->data['description'] = 'MetaTrader 5 merupakan platform trading yang paling populer di seluruh dunia. Kami memberikan kemudahan untuk para Trader agar bisa bertransaksi produk Gold, Oil & Forex langsung di Bursa melalui platform MT 5.';
            $this->data['keywords'] = $this->keywords.',meta trader, meta 5,5,meta';
        }
        
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        
        return view('website.technology')->with($this->data);
    }
    
	public function partnership(){ 
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'cn'){
			$this->data['title'] = 'Eagle Capital Futures Ltd中的技术';
            $this->data['description'] = '作为印度尼西亚值得信赖的真实经纪人之一，Rajawali Kapital为所有客户以及希望从您的网络中赚取额外收入的客户（您邀请他们通过我们进行交易）提供了合作机会。';
            $this->data['keywords'] = $this->keywords.', partnership, 合伙';
		}elseif($default_locale == 'en'){
			$this->data['title'] = 'Technology in Eagle Capital Futures Ltd';
            $this->data['description'] = 'As one of the trusted real brokers in Indonesia, Eagle Capital provides a partnership opportunity for all customers and those of you who want to earn extra income from your networking that you invite to transact through us.';
            $this->data['keywords'] = $this->keywords.', partnership';
		}else{
            $this->data['title'] = 'Teknologi di Rajawali Kapital Berjangka';
            $this->data['description'] = 'Sebagai salah satu real broker tepercaya di Indonesia, Rajawali Kapital memberikan peluang pertnership bagi seluruh nasabah dan  anda yang ingin mendapatkan penghasilan tambahan dari networking anda yang anda ajak untuk bertransaksi melalui kami. ';
            $this->data['keywords'] = $this->keywords.',partnership';
        }
        
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        
		 
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
        $config = app('config');
        $default_locale = $config['app.locale'];
        if($default_locale == 'cn'){
            $successMessage = '请检查您的电子邮件，然后单击确认链接。';
            $failMessage = '电子邮件未发送，请使用您的电子邮件和密码登录';
            $subjectMail = '确认模拟账户注册';
            $companyName = 'Eagle Capital Futures Ltd';
		}elseif($default_locale == 'en'){
            $successMessage = 'Please check your email and click the confirmation link.';
            $failMessage = 'Email not sent, please login with your email and password';
            $subjectMail = 'Confirm Demo Account Registration';
            $companyName = 'Eagle Capital Futures Ltd';
		}else{
           $successMessage = 'Silahkan cek email anda dan klik link konfirmasi.';
           $failMessage = 'Email tidak terkirimkan silahkan login dengan email dan password';
           $subjectMail = 'Konfirmasi Pendaftaran Akun Demo';
           $companyName = 'PT. Rajawali Kapital Berjangka';
        }

		$url = 'https://www.google.com/recaptcha/api/siteverify?secret=6LcINMUUAAAAAD5h_Eew3DNiipI2NB0kn-nm7Bsw&response='.$request->get('g-recaptcha-response');   
        $recaptcha = file_get_contents($url);
        //$recaptcha = '{"success":true}';
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
                //blade body emails.email_register_konfirmasi
            $content = view('emails.email_register_konfirmasi')->with($masuk);
            
            // blade header  layouts.email
			Mail::send('layouts.email', ['contentMessage' => $content], function($message)  use ($masuk,$subjectMail,$companyName){
				$message->to($masuk['email'])->subject($subjectMail);
				$message->from('info@rajawalikapital.co.id',$companyName);
			});
			if (Mail::failures()) {
				Session::flash('success', $failMessage .$uniqid);
			}else{
				Session::flash('success', $successMessage);
			}
			return redirect()->back();
		}
    }
    public function addDemoAccountTest(Request $request){ 
        $config = app('config');
        $default_locale = $config['app.locale'];
        if($default_locale == 'cn'){
            $successMessage = '请检查您的电子邮件，然后单击确认链接。';
            $failMessage = '电子邮件未发送，请使用您的电子邮件和密码登录';
            $subjectMail = '确认模拟账户注册';
            $companyName = 'Eagle Capital Futures Ltd';
		}elseif($default_locale == 'en'){
            $successMessage = 'Please check your email and click the confirmation link.';
            $failMessage = 'Email not sent, please login with your email and password';
            $subjectMail = 'Confirm Demo Account Registration';
            $companyName = 'Eagle Capital Futures Ltd';
		}else{
           $successMessage = 'Silahkan cek email anda dan klik link konfirmasi.';
           $failMessage = 'Email tidak terkirimkan silahkan login dengan email dan password';
           $subjectMail = 'Konfirmasi Pendaftaran Akun Demo';
           $companyName = 'PT. Rajawali Kapital Berjangka';
        }

			$number = $this->generateBarcodeNumber(); 
			$uniqid = uniqid();
			if(empty($request->get('newslater_register'))){
				$newslater_register = 0;
			}else{
				$newslater_register = $request->get('newslater_register');
			}
			$masuk = array(
                'name'                          => "asd name", 
                'email'                         => "asd email",
                'phone'                         => "asd phone",
                'referral_code'                 => "asd referral_code",
                'password_first'                => $uniqid, 
                'newslater'                     => $newslater_register, 
                'terms_and_conditions'          => $request->get('terms_and_conditions'), 
                'password'                      => Hash::make($uniqid), 
                'status'                        => 'active');
            $crypt = Crypt::encrypt($request->get('email'));
            $masuk['url'] = url('/').'/akun-demo-konfirmasi/'.$crypt;
            $masuk['type'] ='demo';
                //blade body emails.email_register_konfirmasi
            $content = view('emails.email_register_konfirmasi')->with($masuk);
            return view('emails.email_register_konfirmasi')->with($masuk);


            
    }
    public function addRealAccount(Request $request){
        $config = app('config');
        $default_locale = $config['app.locale'];
        if($default_locale == 'cn'){
            $message = '请检查您的电子邮件，然后单击确认链接。';
            $informationEmail = "您的电子邮件已经注册，请登录到客户区。";
            $subjectMail = "与确认真实账户注册";
            $companyName = "Eagle Capital Futures Ltd";
		}elseif($default_locale == 'en'){
            $message = 'Please check your email and click the confirmation link.';
            $informationEmail = "Your email is already registered, please log in to the client area.";
            $subjectMail = "Confirm Real Account Registration";
            $companyName = "Eagle Capital Futures Ltd";
		}else{
           $message = 'Silahkan cek email anda dan klik link konfirmasi.';
           $informationEmail = "Email anda sudah terdaftar, silahkan login ke client area.";
           $subjectMail = "Konfirmasi Pendaftaran Akun Real";
           $companyName = "PT. Rajawali Kapital Berjangka";
           
        }
        $check =  Models\User::where('email',$request->get('email'))->first();
        if($check){
            Session::flash('success', $informationEmail);
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
            //$recaptcha = '{"success":true}';
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
                Mail::send('layouts.email', ['contentMessage' => $content], function($message)  use ($masuk,$subjectMail,$companyName){
                    $message->to($masuk['email'])->subject($subjectMail);
                    $message->from('info@rajawalikapital.co.id',$companyName);
                });
    
                Session::flash('success', $message);
                return redirect()->back();
            }

        }
    }
    public function addRealAccountTest(Request $request){ 
        $config = app('config');
        $default_locale = $config['app.locale'];
        if($default_locale == 'cn'){
            $message = '请检查您的电子邮件，然后单击确认链接。';
            $informationEmail = "您的电子邮件已经注册，请登录到客户区。";
            $subjectMail = "与确认真实账户注册";
            $companyName = "Eagle Capital Futures Ltd";
        }elseif($default_locale == 'en'){
            $message = 'Please check your email and click the confirmation link.';
            $informationEmail = "Your email is already registered, please log in to the client area.";
            $subjectMail = "Confirm Real Account Registration";
            $companyName = "Eagle Capital Futures Ltd";
        }else{
           $message = 'Silahkan cek email anda dan klik link konfirmasi.';
           $informationEmail = "Email anda sudah terdaftar, silahkan login ke client area.";
           $subjectMail = "Konfirmasi Pendaftaran Akun Real";
           $companyName = "PT. Rajawali Kapital Berjangka"; 
        }

			$number = $this->generateBarcodeNumber(); 
			$uniqid = uniqid();
			if(empty($request->get('newslater_register'))){
				$newslater_register = 0;
			}else{
				$newslater_register = $request->get('newslater_register');
			}
			$masuk = array(
                'name'                          => "asd name", 
                'email'                         => "asd email",
                'phone'                         => "asd phone",
                'referral_code'                 => "asd referral_code",
                'password_first'                => $uniqid, 
                'newslater'                     => $newslater_register, 
                'terms_and_conditions'          => $request->get('terms_and_conditions'), 
                'password'                      => Hash::make($uniqid), 
                'status'                        => 'active');
				 
            $crypt = Crypt::encrypt($request->get('email'));
            $masuk['url'] = url('/').'/akun-real-konfirmasi/'.$crypt;
            $masuk['type'] ='real';
                //blade body emails.email_register_konfirmasi
            $content = view('emails.email_register_konfirmasi')->with($masuk);
            return view('emails.email_register_konfirmasi')->with($masuk);


            
    }
    
    public function addPartnership(Request $request){ 
        $config = app('config');
        $default_locale = $config['app.locale'];
        if($default_locale == 'cn'){
            $message = '请检查您的电子邮件，我们将尽快与您联系。';
            $informationEmail = "您的电子邮件已经被注册！";
            $subjectMail = "与Eagle Capital合作";
            $companyName = "Eagle Capital Futures Ltd";
		}elseif($default_locale == 'en'){
            $message = 'Please check your email and we will contact you soon.';
            $informationEmail = "Your email has already been registered !!!";
            $subjectMail = "Partnership with Eagle Capital";
            $companyName = "Eagle Capital Futures Ltd";
		}else{
           $message = 'Silahkan cek email anda dan pihak kami akan segera menghubungi anda.';
           $informationEmail = "Email anda sudah terdaftar !!!";
           $subjectMail = "Partnership dengan Rajawali Kapital";
           $companyName = "PT. Rajawali Kapital Berjangka";
        }
        $valid = $this->validate($request, [
            'name'                  => 'required|max:255',
            'email'                 => 'required|max:191|email|unique:partnership,email',
            'phoneNumber'           => 'required|max:15',
            'terms_and_conditions'  => 'required|in:0,1',
            'g-recaptcha-response'=>'required'
        ]); 
        $url = 'https://www.google.com/recaptcha/api/siteverify?secret=6LcINMUUAAAAAD5h_Eew3DNiipI2NB0kn-nm7Bsw&response='.$request->get('g-recaptcha-response');   
        $recaptcha = file_get_contents($url);
        //$recaptcha = '{"success":true}';
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
                Session::flash('info', $informationEmail);
                return redirect()->back();
            }else{
				
                Models\Partnership::create($masuk);
                $content = view('emails.email_partnership')->with($masuk);
                Mail::send('layouts.email', ['contentMessage' => $content], function($message)  use ($masuk,$subjectMail,$companyName){
                    $message->to($masuk['email'])->subject($subjectMail);
                    $message->attach('public/assets/files/IB-Registration.pdf', ['mime' => 'application/pdf']);
                    $message->attach('public/assets/files/IB-Declaration.pdf', ['mime' => 'application/pdf']);
                    $message->attach('public/assets/files/IB-Scheme.pdf', ['mime' => 'application/pdf']);
                    $message->from('info@rajawalikapital.co.id',$companyName);
                });
    
                Session::flash('success', $message);
                return redirect()->back();

            }
        }
		 
    }
    public function addPartnershipTest(){ 
        $config = app('config');
        $default_locale = $config['app.locale'];
        if($default_locale == 'cn'){
            $message = '请检查您的电子邮件，我们将尽快与您联系。';
            $informationEmail = "您的电子邮件已经被注册！";
            $subjectMail = "与Eagle Capital合作";
		}elseif($default_locale == 'en'){
            $message = 'Please check your email and we will contact you soon.';
            $informationEmail = "Your email has already been registered !!!";
            $subjectMail = "Partnership with Eagle Capital";
		}else{
           $message = 'Silahkan cek email anda dan pihak kami akan segera menghubungi anda.';
           $informationEmail = "Email anda sudah terdaftar !!!";
           $subjectMail = "Partnership dengan Rajawali Kapital";
        }

			$number = $this->generateBarcodeNumber(); 
			$uniqid = uniqid();
			
			$masuk = array(
				'name'                  => "asd name", 
                'email'                 => "asd email",
				'phone'                 =>"08587554545",
				'terms_and_conditions'  => "testing",);
				 
			$crypt = Crypt::encrypt('email');
			$masuk['url'] = url('/').'/akun-demo-konfirmasi/'.$crypt;
            $masuk['type'] = 'demo';
                //blade body emails.email_register_konfirmasi
            $content = view('emails.email_partnership')->with($masuk);
            return view('emails.email_partnership')->with($masuk);

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
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'cn'){
			$this->data['title'] = '市场新闻';
            $this->data['description'] = '商品市场是从主要经济领域以实物形式和通过衍生合同买卖商品的地方。 通常，有两种商品交易，即软商品和硬商品。';
            $this->data['keywords'] = $this->keywords.', commodity market news, market news, commodity markets, commodity market prices, commodity prices，商品市场新闻，市场新闻，商品市场，商品市场价格，商品价格';
		}elseif($default_locale == 'en'){
			$this->data['title'] = 'Market News';
            $this->data['description'] = 'Commodity Market is a place for buying and selling goods from the primary economic sector, both in physical form and through derivative contracts. In general, there are two types of commodities traded, namely Soft Commodities and Hard Commodities.';
            $this->data['keywords'] = $this->keywords.', commodity market news, market news, commodity markets, commodity market prices, commodity prices';
		}else{
            $this->data['title'] = 'Berita Pasar';
            $this->data['description'] = 'Pasar Komoditi adalah tempat jual beli barang dari sektor ekonomi primer, baik dalam bentuk fisik maupun melalui kontrak derivatif. Secara umum, ada dua jenis komoditi yang diperdagangkan, yaitu Soft Commodities dan Hard Commodities.';
            $this->data['keywords'] = $this->keywords.',berita pasar komoditi,berita pasar, pasar komoditi, harga pasar komoditi, harga komoditi';
        }
        $this->data['imageseo'] = asset('/public/images/RKB-Logo.jpeg');
        
		 
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
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'cn'){
			$this->data['title'] = '新闻日历-Ealge Capital Futures期货';
            $this->data['description'] = '新闻日历-Ealge Capital Futures期货';
            $this->data['keywords'] = 'capital eagle calendar futures, forexfactory.com, rkb, eagle, 大鹰日历期货，forexfactory.com，rkb，鹰'.$this->keywords;
		}elseif($default_locale == 'en'){
			$this->data['title'] = 'News Calendar - Ealge Capital Futures';
            $this->data['description'] = 'News Calendar - Ealge Capital Futures';
            $this->data['keywords'] = 'capital eagle calendar futures, forexfactory.com, rkb, eagle'.$this->keywords;
		}else{
            $this->data['title'] = 'Kalender Berita - Rajawali Kapital Berjangka';
            $this->data['description'] = 'Kalender Berita - Rajawali Kapital Berjangka';
            $this->data['keywords'] = 'kalender rajawali kapital berjangka, forexfactory.com, rkb,rajawali'.$this->keywords;
        }
		// $forex = new Models\ForexFactory;
		// $res = $forex->getCalender();
		// $xml = simplexml_load_string($res);
		// $str_replace = str_replace('timezone.php', '', $xml);
		// $str_replace = str_replace('<a class="calendar__detail-link calendar__detail-link--graph-icon calendar_chart"></a>', '-', $str_replace);
		
        $this->data['imageseo'] = '';
             
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
        
        $config = app('config');
        $default_locale = $config['app.locale'];

        if($default_locale == 'cn'){
			$this->data['title'] = '新闻日历-Ealge Capital Futures期货';
            $this->data['description'] = '新闻日历-Ealge Capital Futures期货';
            $this->data['keywords'] = 'economic news eagle capital futures, forexfactory.com, rkb, eagle, 经济新闻鹰资本期货，forexfactory.com，rkb，鹰'.$this->keywords;
		}elseif($default_locale == 'en'){
			$this->data['title'] = 'Economic News - Ealge Capital Futures';
            $this->data['description'] = 'Economic News - Ealge Capital Futures';
            $this->data['keywords'] = 'economic news eagle capital futures, forexfactory.com, rkb, eagle'.$this->keywords;
		}else{
            $this->data['title'] = 'Berita Ekonomi - Rajawali Kapital Berjangka';
            $this->data['description'] = 'Berita Ekonomi - Rajawali Kapital Berjangka';
            $this->data['keywords'] = 'berita ekonomi rajawali kapital berjangka, forexfactory.com, rkb,rajawali'.$this->keywords;
        }
		
        $this->data['imageseo'] = '';
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