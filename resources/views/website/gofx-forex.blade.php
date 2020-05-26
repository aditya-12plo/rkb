@extends('layouts.website')
@section('content-website')

<div class="feed-content blog" style="padding-top:20px !important;">
                @if($isMobile)
                <div class="box-single-img" style="background-image: url('/public/assets/images/Banner Produk FOREX.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-top: 55px;height: 200px;margin-bottom: 0px !important;">
                @else
                <div class="box-single-img" style="background-image: url('/public/assets/images/Banner Produk FOREX.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;margin-bottom: 0px !important;margin-top: 70px;">
                @endif            
                <div class="gr-back"></div>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-md-12 box-body-feed">
                        <div class="box-comment box-blog">
                            <h3>@if(Config::get('app.locale') == 'id') Valuta Asing @elseif(Config::get('app.locale') == 'cn') 外汇兑换 @else Foreign exchange @endif </h3>
                            <p>
                                @if(Config::get('app.locale') == 'id')Pasar FX adalah pasar modal terbesar dan terdalam di dunia. Ini diperdagangkan hampir sepanjang waktu, di seluruh dunia, setiap hari. @elseif(Config::get('app.locale') == 'cn') 外汇市场是世界上最大和最深的资本市场。 它几乎每天都在世界各地进行交易。 @else The FX market is the largest and deepest capital market in the world. It is traded almost all the time, all over the world, every day. @endif  
                            </p>
                                          
                                          <div class="container">
                                              <div class="row">
                                                  <div class="col-lg-6">
                                                          <div class="gdlr-core-zoom-on-hover">
                                                              <img src="/public/assets/images/gofx-forex.PNG" style="" alt="">
                                                          </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                          <h5>@if(Config::get('app.locale') == 'id') Spesifikasi Kontrak @elseif(Config::get('app.locale') == 'cn') 合约规格 @else Contract Specifications @endif  </h5>
                                                          <ul>
                                                              <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;"><a href="/public/assets/files/GOFX-Forex - RKB.pdf" target="_blank">@if(Config::get('app.locale') == 'cn') 下载 @else Download @endif</a></li>
                                                          </ul>
                                                  </div>
                                              </div>
                                          </div>
                      <br>
                      <br>
                      <br>
                            <h4>@if(Config::get('app.locale') == 'id') Ikhtisar @elseif(Config::get('app.locale') == 'cn')总览 @else Overview @endif  </h4>
                            <ol>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Dunia menjadi lebih saling terhubung setiap hari. Bisnis dan individu di seluruh dunia semakin banyak melakukan transaksi yang melibatkan pembayaran satu mata uang ke mata uang lainnya. @elseif(Config::get('app.locale') == 'cn') 世界每天都变得越来越紧密。 世界各地的企业和个人越来越多地进行涉及将一种货币支付给另一种货币的交易。 @else The world is becoming more interconnected every day. Businesses and individuals around the world increasingly carry out transactions that involve payment of one currency to another. @endif  </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id')  Ini adalah pasar valuta asing, kadang-kadang disebut sebagai pasar mata uang, Forex atau hanya pasar FX. Pasar FX sangat besar, global dan sangat terfragmentasi. Transaksi FX dapat dilakukan oleh bank global besar, broker atau dealer regional dan bahkan butik kecil yang tidak diatur. @elseif(Config::get('app.locale') == 'cn') 这是外汇市场，有时也称为货币市场，外汇或只是外汇市场。 外汇市场非常庞大，全球化且高度分散。 外汇交易可以由大型的全球银行，经纪人或区域交易商，甚至小型不受监管的精品店进行。 @else This is the foreign exchange market, sometimes referred to as the currency market, Forex or just the FX market. The FX market is very large, global and highly fragmented. FX transactions can be carried out by large global banks, brokers or regional dealers and even small unregulated boutiques. @endif</li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id')  Pertumbuhan produk valuta asing yang diperdagangkan di bursa dan dikliringkan karena sifat produk perdagangan yang diperdagangkan sangat transparan dan juga keamanan yang berasal dari jaminan risiko kliring, yang mengurangi risiko pihak lawan. @elseif(Config::get('app.locale') == 'cn') 在交易所交易和结算的外汇产品的增长是由于交易产品的非常透明的性质，以及清算风险担保所产生的安全性，从而降低了交易对手的风险。 @else The growth of foreign exchange products traded on the stock exchange and cleared due to the very transparent nature of traded trading products and also the security that comes from clearing risk guarantees, which reduces the risk of the counterparty. @endif </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id')  Manajemen risiko sangat penting bagi para pelaku industri, seperti perusahaan export import.  @elseif(Config::get('app.locale') == 'cn') 风险管理对行业参与者（例如进出口公司）非常重要。 @else Risk management is very important for industry players, such as export import companies. @endif </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Hadirnya produk GOFX  khususnya produk Forex di dalam bursa berjangka ICDX dapat dimanfaatkan oleh pelaku pasar sebagai teknik dan strategi lindung nilai dari pergerakan volatilitas harga mata uang. @elseif(Config::get('app.locale') == 'cn') 市场参与者可以利用GOFX产品（尤其是ICDX期货交易所中的外汇产品）的存在作为货币对价格波动的对冲技术和策略。 @else The presence of GOFX products, especially Forex products in the ICDX futures exchange, can be utilized by market participants as a hedging technique and strategy from movements in currency price volatility. @endif  </li>
                            </ol>

                            <h4>@if(Config::get('app.locale') == 'id') Faktor-Faktor Yang Mempengaruhi Pasar Forex   @elseif(Config::get('app.locale') == 'cn') 影响外汇市场的因素 @else Factors That Affect the Forex Market @endif </h4>
                            <ol> 
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Perbedaan tingkat inflasi @elseif(Config::get('app.locale') == 'cn') 通货膨胀率差异 @else Differences in inflation rates @endif</li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Perbedaan tingkat suku bunga di antara setiap negara @elseif(Config::get('app.locale') == 'cn') 国家之间的利率差异 @else Differences in interest rates between countries @endif </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Stabilitas ekonomi dan politik di suatu negara @elseif(Config::get('app.locale') == 'cn') 一个国家的经济和政治稳定 @else Economic and political stability in a country @endif </li>
                                <li style="font-family: 'Open sans', sans-serif, sans-serif !important; font-size: 15px !important; font-weight: 400 !important; line-height: 1.7em !important;color: #535353 !important;">@if(Config::get('app.locale') == 'id') Neraca perdagangan serta ratio harga ekspor dan harga impor @elseif(Config::get('app.locale') == 'cn') 贸易差额与进出口价格之比 @else Trade balance and the ratio of export prices and import prices @endif </li>
                            </ol>
                        </div>

                        
                    </div>

                    

                </div>
            </div>
</div>

@endsection