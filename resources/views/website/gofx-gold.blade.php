@extends('layouts.website')
@section('content-website')


<div class="feed-content blog" style="padding-top:20px !important;">
                @if($isMobile)
                <div class="box-single-img" style="background-image: url('/public/assets/images/Banner produk GOLD.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-top: 55px;height: 200px;margin-bottom: 0px !important;">
                @else
                <div class="box-single-img" style="background-image: url('/public/assets/images/Banner produk GOLD.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-bottom: 0px !important;margin-top: 70px;">
                @endif            
                <div class="gr-back"></div>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-md-12 box-body-feed">
                        <div class="box-comment box-blog">
                            <h3>@if(Config::get('app.locale') == 'id') Emas @elseif(Config::get('app.locale') == 'cn') 金 @else Gold @endif</h3>
                            <p>
                            @if(Config::get('app.locale') == 'id') Emas adalah salah satu instrumen pengelola kekayaan tertua di dunia dan selama ribuan tahun telah dihargai sebagai mata uang global, komoditas, investasi, dan sekadar sebagai obyek kecantikan. @elseif(Config::get('app.locale') == 'cn') 黄金是世界上最古老的财富管理工具之一，几千年来，它一直被视为全球货币，商品，投资以及仅仅是作为美丽的对象而被重视。@else Gold is one of the oldest wealth management instruments in the world and for thousands of years it has been valued as a global currency, commodity, investment and simply as an object of beauty. @endif
                            
                            </p>
                                 
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                    <div class="gdlr-core-zoom-on-hover">
                                        <img src="/public/assets/images/gofx-gold.PNG" style="" alt="">
                                    </div>
                            </div>
                            <div class="col-lg-6">
                                    <h5>@if(Config::get('app.locale') == 'id') Spesifikasi Kontrak @elseif(Config::get('app.locale') == 'cn') 合约规格 @else Contract Specifications @endif</h5>
                                    <ul>
                                        <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;"><a href="/public/assets/files/GOFX-Gold - RKB.pdf" target="_blank">@if(Config::get('app.locale') == 'cn') 下载 @else Download @endif</a></li>
                                    </ul>
                            </div>
                        </div>
                    </div>
<br>
<br>
<br>
                            <h4>@if(Config::get('app.locale') == 'id') Ikhtisar @elseif(Config::get('app.locale') == 'cn') 总览  @else Overview @endif</h4>
                            <ol>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Emas, yang paling dicari dari semua logam mulia, diperoleh di seluruh dunia karena keindahan, likuiditas, kualitas investasi, dan properti industri. Sebagai sarana investasi, emas biasanya dipandang sebagai aset keuangan yang mempertahankan nilainya dan daya beli selama periode inflasi. @elseif(Config::get('app.locale') == 'cn') 黄金是所有贵金属中最受欢迎的黄金，因为其美丽，流动性，投资质量和工业产权而在世界范围内获得。 作为一种投资手段，黄金通常被视为在通货膨胀时期保持其价值和购买力的金融资产。 @else Gold, the most sought after of all precious metals, is obtained worldwide because of its beauty, liquidity, investment quality, and industrial property. As a means of investment, gold is usually seen as a financial asset that maintains its value and purchasing power during a period of inflation. @endif
                                </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Emas memiliki sejarah penggunaan yang panjang dan menarik dalam beragam industri dan aplikasi. Dalam setiap aplikasi yang digunakan, emas memberikan kinerja yang luar biasa karena sifat uniknya sebagai salah satu logam yang paling mudah dibentuk dan lentur dengan titik lebur yang tinggi dan daur ulang yang mudah. @elseif(Config::get('app.locale') == 'cn') 黄金在各种行业和应用中都有悠久而有趣的使用历史。 在每种所用的应用中，金都具有卓越的性能，这是因为其独特的性能，是熔点高，易于回收利用的最易成型和柔性金属之一。 @else Gold has a long and interesting history of use in a variety of industries and applications. In every application used, gold provides exceptional performance because of its unique properties as one of the most easily formed and flexible metals with high melting points and easy recycling. @endif
                                </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id')  Permintaan global untuk emas berpusat pada empat kategori utama: perhiasan, investasi, cadangan bank sentral, dan teknologi. @elseif(Config::get('app.locale') == 'cn') 全球对黄金的需求集中在四个主要类别上：珠宝，投资，中央银行储备和技术。 @else Global demand for gold centers on four main categories: jewelry, investment, central bank reserves, and technology. @endif
                                </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Manajemen risiko sangat penting bagi para pelaku pasar emas, seperti perusahaan pertambangan, pengolah, perusahaan yang bergerak dalam produk emas dan perhiasan. @elseif(Config::get('app.locale') == 'cn') 风险管理对于黄金市场参与者（例如矿业公司，加工商，从事黄金和珠宝产品的公司）非常重要。@else Risk management is very important for gold market players, such as mining companies, processors, companies engaged in gold and jewelry products. @endif
                                </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Hadirnya produk GOFX  khususnya produk Gold di dalam bursa berjangka ICDX dapat dimanfaatkan oleh pelaku pasar emas sebagai teknik dan strategi lindung nilai dari pergerakan volatilitas harga. @elseif(Config::get('app.locale') == 'cn') 黄金市场参与者可以利用GOFX产品（尤其是ICDX期货市场中的黄金产品）的存在作为价格波动的一种技术和对冲策略。 @else The presence of GOFX products, especially Gold products in the ICDX futures market, can be utilized by gold market players as a technique and hedging strategy from price volatility movements. @endif
                                </li>
                            </ol>

                            <h4>@if(Config::get('app.locale') == 'id') Faktor-Faktor Yang Mempengaruhi Pasar Emas @elseif(Config::get('app.locale') == 'cn') 影响黄金市场的因素 @else Factors That Affect the Gold Market @endif</h4>
                            <ol>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Cadangan emas bank-bank sentral dunia @elseif(Config::get('app.locale') == 'cn') 世界各国央行黄金储备 @else The world's central banks gold reserves @endif
                                </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Permintaan industri perhiasan india, china dan amerika @elseif(Config::get('app.locale') == 'cn') 对印度，中国和美国珠宝业的需求 @else Demand for the Indian, Chinese and American jewelry industries @endif
                                </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Faktor makro ekonomi dunia, seperti pergerakan dolar dan suku bunga, dan peristiwa ekonomi. @elseif(Config::get('app.locale') == 'cn') 世界宏观经济因素，例如美元和利率的变动以及经济事件。 @else Macroeconomic factors of the world, such as the movement of the dollar and interest rates, and economic events. @endif
                                </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Di India dan china, permintaan emas juga dipengaruhi oleh musim, yaitu pernikahan dan panen. @elseif(Config::get('app.locale') == 'cn') 在印度和中国，对黄金的需求也受到结婚和收获季节的影响。 @else In India and China, the demand for gold is also influenced by the seasons, namely marriage and harvest. @endif
                                </li>
                            </ol>
                        </div>

                        
                    </div>

                    

                </div>
            </div>
</div>

@endsection