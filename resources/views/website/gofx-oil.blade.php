@extends('layouts.website')
@section('content-website')


<div class="feed-content blog" style="padding-top:20px !important;">
                @if($isMobile)
                <div class="box-single-img" style="background-image: url('/public/assets/images/Banner Produk CRUDE OIL.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-top: 55px;height: 200px;margin-bottom: 0px !important;">
                @else
                <div class="box-single-img" style="background-image: url('/public/assets/images/Banner Produk CRUDE OIL.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-bottom: 0px !important;margin-top: 70px;">
                @endif            
                <div class="gr-back"></div>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-md-12 box-body-feed">
                        <div class="box-comment box-blog">
                            <h3>@if(Config::get('app.locale') == 'id') Minyak Mentah @elseif(Config::get('app.locale') == 'cn') 原油 @else Crude oil @endif </h3>
                            <p>
                            @if(Config::get('app.locale') == 'id')  Naik turunnya harga minyak dunia sangat mempengaruhi perekonomian global. Sebagai sumber bahan bakar utama harga minyak akan mempengaruhi biaya transportasi maupun biaya manufaktur sehingga mempengaruhi harga komoditi, barang dan jasa. @elseif(Config::get('app.locale') == 'cn') 世界石油价格的上升和下降极大地影响了全球经济。 石油价格是主要的燃料来源，会影响运输成本和制造成本，从而影响商品，商品和服务的价格。 @else The rise and fall of world oil prices greatly affects the global economy. As the main fuel source, oil prices will affect transportation costs and manufacturing costs, thereby affecting the prices of commodities, goods and services. @endif
                           
                            </p>
                                          
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                    <div class="gdlr-core-zoom-on-hover">
                                        <img src="/public/assets/images/gofx-oil.PNG" style="" alt="">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <h5>@if(Config::get('app.locale') == 'id') Spesifikasi Kontrak @elseif(Config::get('app.locale') == 'cn') 合约规格 @else Contract Specifications @endif </h5>
                                    <ul>
                                        <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;"><a href="/public/assets/files/GOFX-Oil - RKB.pdf" target="_blank">@if(Config::get('app.locale') == 'cn') 下载 @else Download @endif</a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
<br>
<br>
<br>
                            <h4>@if(Config::get('app.locale') == 'id') Ikhtisar @elseif(Config::get('app.locale') == 'cn') 总览 @else Overview @endif  </h4>
                            <ol>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Meskipun sering disebut "emas hitam," minyak mentah memiliki viskositas yang luas dan dapat bervariasi dalam warna untuk berbagai warna hitam dan kuning tergantung pada komposisi hidrokarbonnya. Minyak mentah dapat disuling untuk menghasilkan produk yang dapat digunakan seperti bensin, solar dan berbagai bentuk petrokimia. @elseif(Config::get('app.locale') == 'cn') 尽管通常被称为“黑金”，但原油具有较宽的粘度，并且根据其碳氢化合物的组成，其颜色可能会因黑色和黄色而变化。 可以提炼原油以生产可以使用的产品，例如汽油，柴油和各种形式的石化产品。@else Although often called "black gold," crude oil has a broad viscosity and can vary in color for a variety of black and yellow colors depending on its hydrocarbon composition. Crude oil can be refined to produce products that can be used such as gasoline, diesel and various forms of petrochemicals. @endif</li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Mayoritas cadangan minyak di dunia ada di Timur Tengah, dengan 48 persen dari cadangan yang diketahui dan diidentifikasi. Diikuti oleh Amerika Utara, Afrika, Amerika Tengah dan Selatan, Eurasia, Asia dan Oseania, dan Eropa. @elseif(Config::get('app.locale') == 'cn') 世界上大部分的石油储量都在中东，已知和已探明储量的48％。 紧随其后的是北美，非洲，中南美洲，欧亚大陆，亚洲和大洋洲以及欧洲。 @else The majority of the world's oil reserves are in the Middle East, with 48 percent of known and identified reserves. Followed by North America, Africa, Central and South America, Eurasia, Asia and Oceania, and Europe. @endif</li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') OPEC mengendalikan hampir 40 persen minyak mentah dunia, menyumbang sekitar 75 persen cadangan minyak dunia yang mengekspor 55 persen minyak yang diperdagangkan secara internasional. @elseif(Config::get('app.locale') == 'cn') 欧佩克控制着全球近40％的原油，约占世界石油储备的75％，出口了国际贸易石油的55％。 @else OPEC controls nearly 40 percent of the world's crude oil, contributing around 75 percent of world oil reserves which export 55 percent of oil that is traded internationally. @endif </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Dalam perdagangan minyak, teknik manajemen risiko sangat penting bagi berbagai pemangku kepentingan dan pelaku pasar, seperti produsen, eksportir, pemasar, pengolah, dan UKM. Teknik dan strategi manajemen risiko berbasis pasar seperti Crude Oil Futures, yang ditawarkan oleh bursa berjangka ICDX dapat meningkatkan efisiensi dan mengkonsolidasikan daya saing melalui manajemen risiko harga. @elseif(Config::get('app.locale') == 'cn') 在石油贸易中，风险管理技术对于各种利益相关者和市场参与者（例如生产商，出口商，销售商，加工商和中小型企业）非常重要。 ICDX期货交易所提供的基于市场的风险管理技术和策略，例如原油期货，可以通过价格风险管理提高效率并巩固竞争力。 @else In oil trading, risk management techniques are very important for various stakeholders and market participants, such as producers, exporters, marketers, processors, and SMEs. Market-based risk management techniques and strategies such as Crude Oil Futures, offered by the ICDX futures exchange, can improve efficiency and consolidate competitiveness through price risk management. @endif </li>

                            </ol>

                            <h4>@if(Config::get('app.locale') == 'id') Faktor-Faktor Yang Mempengaruhi Pasar Crude Oil  @elseif(Config::get('app.locale') == 'cn') 影响原油市场的因素 @else Factors Affecting the Crude Oil Market @endif</h4>
                            <ol>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Output atau pasokan OPEC @elseif(Config::get('app.locale') == 'cn') 欧佩克输出或供应 @else OPEC output or supply @endif</li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Perubahan skenario permintaan minyak dari negara-negara berkembang dan berkembang. @elseif(Config::get('app.locale') == 'cn') 发展中国家和发展中国家对石油的需求情况发生了变化。 @else Changes in the scenario of oil demand from developing and developing countries. @endif</li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Persediaan minyak mentah dan produk AS @elseif(Config::get('app.locale') == 'cn') 原油和美国产品库存 @else Inventories of crude oil and US products @endif</li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id')Tingkat pemanfaatan Kilang  @elseif(Config::get('app.locale') == 'cn') 炼厂利用率 @else Refinery utilization rate @endif</li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Geopolitik global @elseif(Config::get('app.locale') == 'cn') 全球地缘政治 @else Global Geopolitics @endif</li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Spekulatif pembelian dan penjualan @elseif(Config::get('app.locale') == 'cn') 投机买卖 @else Speculative buying and selling  @endif </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Kondisi cuaca @elseif(Config::get('app.locale') == 'cn') 天气状况 @else Weather conditions @endif </li>
                            </ol>
                        </div>

                        
                    </div>

                    

                </div>
            </div>
</div>

@endsection