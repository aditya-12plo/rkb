@extends('layouts.website')
@section('content-website')

<div class="feed-content blog" style="padding-top:20px !important;">
                @if($isMobile)
                <div class="box-single-img" style="background-image: url('/public//assets/images/Banner akun institusi corporate.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-top: 55px;height: 200px;margin-bottom: 0px !important;">
                @else
                <div class="box-single-img" style="background-image: url('/public//assets/images/Banner akun institusi corporate.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-bottom: 0px !important;margin-top: 70px;">
                @endif
            <div class="gr-back"></div>
                
            </div>
            <div class="container box-about">
                <div class="row box-exchange" style="padding-top:70px !important;padding-bottom:0% !important;">
 
                    <div class="col-md-12 box-desc-about">
                        <h3 align="center">@if(Config::get('app.locale') == 'id') Akun Institusi / Corporate @elseif(Config::get('app.locale') == 'cn') 机构/企业账户 @else Institution / Corporate Account @endif</h3>
                        <div class="line-centered-circolar"></div>
                        <p>
                            @if(Config::get('app.locale') == 'id') Rajawali Kapital melayani nasabah korporasi atau institusi yang ingin berinvestasi atau bertransaksi di produk bursa berjangka. @elseif(Config::get('app.locale') == 'cn') Eagle Capital为希望投资或进行期货交易产品交易的公司或机构客户提供服务。 @else Eagle Capital serves corporate or institutional customers who want to invest or transact on futures exchange products. @endif
                        
                        </p><p>
                            @if(Config::get('app.locale') == 'id') Untuk memberikan pelayanan dan konsistensi kami sebagai perusahaan pialang / brokerage, kami berkomitmen untuk memberikan pelayanan terbaik, dengan menjaga mutu produk, jasa dan sumber daya manusia yang berkualitas serta mengikuti perkembangan pertumbuhan ekonomi global.  @elseif(Config::get('app.locale') == 'cn') 为了提供我们作为经纪公司的服务和一贯的作风，我们致力于通过维持优质的产品，服务和优质的人力资源，并随着全球经济增长的发展，提供最佳的服务。 @else To provide our services and consistency as a brokerage company, we are committed to providing the best service, by maintaining quality products, services and quality human resources and following the development of global economic growth. @endif
                        
                        </p><p>
                            @if(Config::get('app.locale') == 'id') Rajawali Kapital Berjangka merupakan gerbang bagi berbagai korporasi atau institusi untuk mengakses produk-produk bursa berjangka di indonesia dengan berbagai pilihan produk. Kami  memiliki kapabilitas dalam perantara transaksi produk Gold, Crude Oil dan Forex yang transaksinya langsung dilakukan di dalam bursa Indonesia Commodity & Derivatives Exchange <a href="http://icdx.co.id/" style="color:#f18109;" target="_blank">(ICDX)</a>. @elseif(Config::get('app.locale') == 'cn') Eagle Capital Futures Ltd是各种公司或机构使用各种产品选择访问印尼期货交易所产品的门户。 我们有能力调解黄金，原油和外汇产品的交易，这些交易直接在印尼商品和衍生品交易所<a href="http://icdx.co.id/" style="color:#f18109;" target="_blank"> (ICDX) </a>上进行。 @else Eagle Capital Futures Ltd is a gateway for various corporations or institutions to access futures exchange products in Indonesia with a variety of product choices. We have the capability to mediate transactions of Gold, Crude Oil and Forex products, the transactions of which are carried out directly on the Indonesia Commodity & Derivatives Exchange <a href="http://icdx.co.id/" style="color:#f18109;" target="_blank">(ICDX)</a>. @endif
                        

                        </p><p>
                            @if(Config::get('app.locale') == 'id') Di Rajawali Kapital, kami berkomitmen untuk membantu nasabah korporasi atau institusi untuk mencapai tujuan transaksi serta investasinya, dengan berbagai layanan seperti: @elseif(Config::get('app.locale') == 'cn') 在Eagle Capital，我们致力于通过各种服务帮助公司或机构客户实现交易和投资目标： @else At Eagle Capital, we are committed to helping corporate or institutional customers to achieve their transaction and investment goals, with various services such as: @endif
                        </p>
                    <p>
                    <ol>
                        <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;"><h5>@if(Config::get('app.locale') == 'cn') 贸易/投资 @else Trading / Investment @endif </h5>
                            <p>
                                @if(Config::get('app.locale') == 'id') Rajawali Kapital memberikan layanan platform trading yang dirancang kusus untuk memberikan berbagai kemudahan bagi semua kalangan investor dan trader dalam melakukan transaksi produk-produk berjangka khususnya GOFX. Satu-satunya produk berjangka komoditi yang transaksinya langsung terjadi di dalam BURSA. @elseif(Config::get('app.locale') == 'cn') Eagle Capital提供的交易平台服务专门设计用于为所有投资者和交易者提供各种便利，以进行期货产品交易，尤其是GOFX。 直接在EXCHANGE中进行交易的唯一商品期货产品。 @else Eagle Capital provides trading platform services that are specifically designed to provide various facilities for all investors and traders in conducting futures product transactions, especially GOFX. The only commodity futures product which transactions occur directly in EXCHANGE. @endif
                            </p>
                            <p>
                                @if(Config::get('app.locale') == 'id') Dengan menjadi nasabah online trading Rajawali Kapital, anda dapat bertransaksi Gold, Oil dan Forex kapanpun dan dimanapun berada dengan berbagai aplikasi yang tersedia di PC atau Mobile.  @elseif(Config::get('app.locale') == 'cn') 通过成为Eagle Capital的在线交易客户，您可以随时随地使用PC或Mobile上提供的各种应用程序进行黄金，石油和外汇交易。 @else By becoming an online trading customer of Eagle capital, you can trade Gold, Oil and Forex whenever and wherever you are with a variety of applications available on PC or Mobile. @endif
                            </p>
                        </li>
                        <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;"><h5>@if(Config::get('app.locale') == 'id') Hedging / Lindung Nilai @elseif(Config::get('app.locale') == 'cn') 套期保值 @else Hedging @endif </h5>
                        <p>
                            @if(Config::get('app.locale') == 'id') Kami memfasilitasi nasabah korporasi atau institusi dan para pelaku transaksi lindung nilai (Hedging) untuk bisa memanfaatkan pasar GOFX sebagai alat untuk melakukan mitigasi resiko. @elseif(Config::get('app.locale') == 'cn') 我们为企业或机构客户和对冲代理提供便利，使其能够利用GOFX市场作为降低风险的工具。 @else  We facilitate corporate or institutional customers and hedging agents to be able to utilize the GOFX market as a tool to mitigate risk. @endif
                        </p>
                        <p style="margin-bottom:0% !important;">
                            @if(Config::get('app.locale') == 'id') Korporasi atau Institusi apa saja yang biasanya sebagai Pelaku Hedging tersebut (Hedger) : @elseif(Config::get('app.locale') == 'cn') 哪个公司或机构通常是套期保值参与者（套期保值者）： @else What Corporation or Institution is usually the Hedging Actor (Hedger): @endif
                            </p>
                        <ol type="a">
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Pelaku Pasar Fisik (Emas, Minyak & Valas) @elseif(Config::get('app.locale') == 'cn') 实物市场参与者（黄金，石油和外汇） @else Physical Market Participants (Gold, Oil & Forex) @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Perusahaan Pertambangan Emas / Minyak @elseif(Config::get('app.locale') == 'cn') 黄金/石油开采公司 @else Gold / Oil Mining Company @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Perantara Pasar Emas / Minyak @elseif(Config::get('app.locale') == 'cn') 黄金/石油市场中介 @else Gold / Oil Market Intermediaries @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id')Pebisnis Emas, Minyak & Valas  @elseif(Config::get('app.locale') == 'cn') 黄金，石油和外汇业务 @else Gold, Oil & Forex Business @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Importir & Eksportir @elseif(Config::get('app.locale') == 'cn') 进出口商 @else Importer & Exporter @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Instansi Keuangan @elseif(Config::get('app.locale') == 'cn') 金融机构 @else Financial Institution @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') dll @elseif(Config::get('app.locale') == 'cn') 等等 @else etc @endif</li>
                        </ol>
                        <p style="margin-top:30px !important;">@if(Config::get('app.locale') == 'id')kami juga memberikan layanan bagi para pelaku transaksi spekulatif, trader dan arbitrageur yang sudah terbiasa dengan transaksi langsung di dalam Bursa, seperti pelaku perdagangan pasar saham, trader komoditi, dll untuk dapat berdagang Emas , Minyak dan Mata Uang dengan cara yang lebih efisien. @elseif(Config::get('app.locale') == 'cn') 我们还为熟悉交易所直接交易的投机交易商，交易员和仲裁员（例如股票交易员，商品交易员等）提供服务，以便他们能够更高效地交易黄金，石油和货币。 @else We also provide services for speculative transaction traders, traders and arbitrators who are familiar with direct transactions on the Exchange, such as stock market traders, commodity traders, etc. to be able to trade Gold, Oil and Currencies in a more efficient way. @endif</p>
                        </li> 
                    </ol>
                    </p>
                    </div>

                </div> 

                 
                <div class="row box-body-services mb-4">

                <div class="col-12 col-md-6">
                    <div class="box-single-service">
                        <h3>@if(Config::get('app.locale') == 'id') Yuk, Buka Akun @elseif(Config::get('app.locale') == 'cn') 来吧，开一个账户 @else Come on, Open an Account @endif</h3>
                        <p><button class="md-trigger box-lang btn btn-more" data-modal="modal-demo" type="button">@if(Config::get('app.locale') == 'id')AKUN DEMO @elseif(Config::get('app.locale') == 'cn') 模拟账户 @else DEMO ACCOUNT @endif</button></p>
                        <p><button class="md-trigger box-lang btn btn-more" data-modal="modal-real" type="button" style="background-color:#2e3192;">@if(Config::get('app.locale') == 'id')AKUN REAL @elseif(Config::get('app.locale') == 'cn') 真实账户 @else REAL ACCOUNT @endif</button></p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="box-single-service">
                        <h3>@if(Config::get('app.locale') == 'id') Butuh Bantuan ? @elseif(Config::get('app.locale') == 'cn') 需要帮忙 ？ @else Need Help ? @endif</h3>
                        <p>@if(Config::get('app.locale') == 'id') Telepon @elseif(Config::get('app.locale') == 'cn') 电话 @else Phone @endif :  +6222 2058 5060</p>
                        <p>@if(Config::get('app.locale') == 'cn') 电子邮件 @else Email @endif : INFO@RAJAWALIKAPITAL.CO.ID</p>
                    </div>
                </div>

                </div>

                        
</div>

@endsection