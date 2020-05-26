@extends('layouts.website')
@section('content-website')
 
<div class="about" style="padding-top:40px !important;">
            <div class="container box-about">
                <div class="row box-exchange">
 
                    <div class="col-md-12 box-desc-about">
                    <h3 class="title" align="center"><span>MetaTrader 5</span></h3>
                    <h3 class="title" align="center"><span>@if(Config::get('app.locale') == 'cn') 外汇交易市场的强大平台 @else A Powerful Platform for Forex and Exchange Markets @endif</span></h3>
                    <div class="line-centered-circolar"></div>
                        <p>
                            @if(Config::get('app.locale') == 'id') MetaTrader 5 merupakan platform trading yang paling populer di seluruh dunia. Kami memberikan kemudahan untuk para Trader agar bisa bertransaksi produk Gold, Oil & Forex langsung di Bursa melalui platform MT 5. @elseif(Config::get('app.locale') == 'cn') MetaTrader 5是全球最受欢迎的交易平台。 我们使交易者可以通过MT 5平台直接在交易所上轻松交易黄金，石油和外汇产品。@else MetaTrader 5 is the most popular trading platform in the whole world. We make it easy for traders to trade Gold, Oil & Forex products directly on the Exchange through the MT 5 platform. @endif  
                        
                        </p>
                        <p>
                                @if(Config::get('app.locale') == 'id') MetaTrader 5 juga merupakan sebuah platform multi aset yang menyediakan sistem trading yang berbeda dari versi sebelumnya dan memberikan fasilitas analisa teknikal lebih luas serta fasilitas Expert Advisor (EA)  dan Copy Trading yang dapat ditambahkan dalam MT5. @elseif(Config::get('app.locale') == 'cn') MetaTrader 5还是一个多资产平台，提供与以前版本不同的交易系统，并提供了更广泛的技术分析工具以及可在MT5中添加的Expert Advisor（EA）和复制交易工具。 @else MetaTrader 5 is also a multi-asset platform that provides a trading system that is different from the previous version and provides a broader technical analysis facility and Expert Advisor (EA) and Copy Trading facilities which can be added in MT5. @endif  
                        </p>
                        <p>
                            @if(Config::get('app.locale') == 'id') Keuntungan Bertransaksi GOFX Dengan MetaTrader 5 ? @elseif(Config::get('app.locale') == 'cn') 使用MetaTrader 5进行GOFX交易的优势？ @else Advantages of GOFX Transaction With MetaTrader 5? @endif  
                        <br>
                        <ol>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'cn') 世界第一的多资产平台 @else The world # 1 Multi-asset platform @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'cn') 市场信息深度 @else Depth of Market Information     @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'cn') 适用于台式机和移动设备的平台 @else Platform for your dekstop & Mobile @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'cn') 进入自动交易 @else Access to automated trading @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'cn') 6个待定订单类型 @else 6 pending Order type @endif</li>
                            <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'cn') 21个时间表 @else 21 Timeframes @endif</li>
                        </ol>
                        </p>
                        <p style="text-align:center !important;">
                                @if(Config::get('app.locale') == 'id') Download sekarang, dan nikmati pengalaman transaksi terbaik melalui MT 5 @elseif(Config::get('app.locale') == 'cn') 立即下载，并通过MT 5享受最佳交易体验 @else Download now, and enjoy the best transaction experience through MT 5 @endif  
                        </p>
                         
                        <div class="gdlr-core-zoom-on-hover" style="text-align: center !important;">
                                <a href="https://download.mql5.com/cdn/web/14021/mt5/icdx5setup.exe" target="_blank"><img src="{{asset('/public/assets/images/GOFX-laptop.png')}}" style="width: 30%;height:30%;" alt="RKB multiple device"></a>
                                <a href="https://play.google.com/store/apps/details?id=net.metaquotes.metatrader5" target="_blank"><img src="{{asset('/public/assets/images/GOFX-on-Playstore.png')}}" style="width: 30%;height:30%;" alt="RKB multiple device"></a>
                                <a href="https://apps.apple.com/us/app/metatrader-5/id413251709" target="_blank"><img src="{{asset('/public/assets/images/GOFX-MT5-on-Appstore.png')}}" style="width: 30%;height:30%;" alt="RKB multiple device"></a>
                        </div>
                    </div>

                </div> 
 
 
            </div>
</div>
@endsection