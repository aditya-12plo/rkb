@extends('layouts.website')
@section('content-website')
 
<div class="about" style="padding-top:40px !important;">
            <div class="container box-about">
                <div class="row box-exchange">
 
                    <div class="col-md-12 box-desc-about">
                    <h3 class="title" align="center"><span>@if(Config::get('app.locale') == 'id') PT. Rajawali Kapital Berjangka @else Eagle Capital Futures Ltd @endif</span></h3>
                    <div class="line-centered-circolar"></div>
                        <p>
                            @if(Config::get('app.locale') == 'id') Revolusi industri keuangan di Indonesia khususnya di bursa komoditi dan derivatif saat ini sudah memiliki dampak yang positif terhadap pelaku industry dan masyarakat. kami bekerja keras untuk membantu investor / customer retail &amp; corporate mengakses dan mempelajari lebih banyak tentang perdagangan langsung di bursa komoditi dan derivatif. @elseif(Config::get('app.locale') == 'cn') 印度尼西亚的金融业革命，特别是在商品和衍生品交易所，对工业和社会产生了积极影响。 我们努力帮助投资者/零售和公司客户访问并了解有关商品和衍生产品交易所直接交易的更多信息。@else The financial industry revolution in Indonesia, especially in the commodity and derivatives exchanges, has had a positive impact on industry and society. We work hard to help investors / retail &amp; corporate customers access and learn more about direct trading on commodity and derivative exchanges. @endif
                        
                        </p>
                        <p>
                            @if(Config::get('app.locale') == 'id') Sebagai pelopor awal dalam industri perdagangan berjangka yang langsung dilakukan di dalam bursa, kami merasa itu adalah tugas kami untuk memberikan pengetahuan serta arahan yang tepat ke seluruh customer dan pelaku industri. @elseif(Config::get('app.locale') == 'cn') 作为直接在证券交易所进行的期货交易行业的早期开拓者，我们感到有责任为所有客户和行业参与者提供正确的知识和方向。 @else As an early pioneer in the futures trading industry which is directly carried out in the stock exchange, we feel it is our duty to provide the right knowledge and direction to all customers and industry players. @endif 
                        </p>
                        <p>
                            @if(Config::get('app.locale') == 'id') Rajawali Kapital berjangka adalah perusahaan broker anggota <a href="https://www.icdx.co.id/" target="_blank" style="color:#f18109;">Bursa Komoditi dan Derivatif Indonesia (ICDX)</a> yang terpercaya, yang saat ini fokus di Asia Tenggara yang menyediakan layanan untuk para customer baik retail maupun corporate dalam melakukan transaksi produk-produk berjangka komoditi yang transaksinya langsung di dalam bursa. @elseif(Config::get('app.locale') == 'cn') Eagle Capital Futures是成员经纪公司<a href="https://www.icdx.co.id/" target="_blank" style="color:#f18109;">印尼商品和衍生品交易所（ICDX）</a>受信任的公司，目前专注于东南亚，为零售和企业客户提供服务，以进行直接在证券交易所进行交易的商品期货产品交易。 @else Eagle capital futures is a member brokerage company <a href="https://www.icdx.co.id/" target="_blank" style="color:#f18109;"> Indonesian Commodity and Derivative Exchange (ICDX) </a> trusted company, which is currently focusing on Southeast Asia which provides services for both retail and corporate customers in conducting commodity futures product transactions that are directly traded on the stock exchange. @endif
                        </p>
                        <p>
                            @if(Config::get('app.locale') == 'id') Sebagai titik awal perjalanan, kami percaya akselerasi bisnis Rajawali Kapital yang didukung oleh sumber daya manusia berkualitas, budaya kerja yang solid, sistem informasi yang handal, serta praktik tata kelola perusahaan yang baik, akan menciptakan kesuksesan serta menjadi mitra pilihan bagi customer sehingga mendorong dan meningkatkan kemajuan perekonomian Indonesia. Dengan ambisi terbesar serta inovasi-inovasi yang kami lakukan, kami ingin menciptakan keunggulan bagi perusahaan dan menciptakan dampak yang positif dan membangun kemajuan industri. @elseif(Config::get('app.locale') == 'cn') 作为我们旅程的出发点，我们相信Eagle Capital的业务加速将获得成功，并成为客户的首选合作伙伴，而高质量的人力资源，扎实的工作文化，可靠的信息系统以及良好的公司治理实践将为他们带来成功。 鼓励和改善印尼经济的进步。 凭借我们最大的野心和创新，我们希望为公司创造卓越，并产生积极影响并建立行业进步。@else As a starting point for our journey, we believe that Eagle Capital's business acceleration which is supported by quality human resources, a solid work culture, a reliable information system, and good corporate governance practices, will create success and become a partner of choice for customers to encourage and improve progress of the Indonesian economy. With the biggest ambition and innovations that we do, we want to create excellence for the company and create a positive impact and build industry progress. @endif
                        </p>
                        <p>
                            @if(Config::get('app.locale') == 'id') Kami memahami dan menemukan solusi untuk nasabah dengan pemahaman tentang risiko yang terjadi. Kami memfasilitasi nasabah dengan portofolio yang beragam dari nasabah yang agresif (short term) hingga nasabah yang bersifat long investment dengan menempatkan mereka untuk bertransaksi langsung ke dalam bursa (Direct to the exchange). @elseif(Config::get('app.locale') == 'cn') 我们了解并为客户解决方案，并了解所发生的风险。 我们通过将客户直接交易到交易所，为拥有积极投资组合（短期）到长期投资客户的多样化投资组合的客户提供便利。 @else We understand and find solutions for customers with an understanding of the risks that occur. We facilitate customers with a diverse portfolio from aggressive (short term) customers to long investment customers by placing them to transact Direct to the exchange. @endif 
                        
                        </p>
                         
                    </div>

                </div> 

                
                <div class="row">
                    <div class="col-md-12 box-header-team" style="padding-top:0px;">
                        <h3 class="title">@if(Config::get('app.locale') == 'id') Visi @elseif(Config::get('app.locale') == 'cn') 视觉公司 @else Vision @endif</h3>
                        <div class="line-centered-circolar"></div>
                        <p style="padding-left: 5%; padding-right: 5%;">
                            @if(Config::get('app.locale') == 'id') Menjadi perusahaan broker terbaik dan terpercaya di Indonesia serta memberikan layanan terbaik bagi nasabahnya secara berkesinambungan. @elseif(Config::get('app.locale') == 'cn') 成为印度尼西亚最佳和最受信任的经纪公司，并持续为其客户提供最佳服务。 @else To be the best and most trusted brokerage company in Indonesia and provide the best service to its customers on an ongoing basis. @endif
                        </p>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-md-12 box-header-team">
                        <h3 class="title">@if(Config::get('app.locale') == 'id') Misi @elseif(Config::get('app.locale') == 'cn') 任务公司 @else Mission @endif</h3>
                        <div class="line-centered-circolar"></div>
                        <p style="padding-left: 5%; padding-right: 5%;">@if(Config::get('app.locale') == 'id') Meningkatkan kualitas dan kuantitas perdagangan di bursa berjangka dan komoditi dengan memperluas jaringan dalam pengembangan program pendidikan mengenai perdagangan di bursa berjangka dan komoditi di indonesia. Pandangan ke masa depan untuk menciptakan kesempatan dan memenangkan pasar (Market Leader). @elseif(Config::get('app.locale') == 'cn') 通过扩大印度尼西亚制定有关期货和商品交易所交易教育计划的网络，提高期货和商品交易所交易的质量和数量。 展望未来，创造机会并赢得市场（市场领导者）。 @else Improving the quality and quantity of trading on futures and commodity exchanges by expanding the network in developing educational programs on trading on futures and commodity exchanges in Indonesia. A view to the future to create opportunities and win the market (Market Leader). @endif 
                        </p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 box-header-team">
                        <h3 class="title">@if(Config::get('app.locale') == 'id') Filosofi @elseif(Config::get('app.locale') == 'cn') 哲学 @else Philosophy @endif</h3>
                        <div class="line-centered-circolar"></div>
                        
                    </div>
                </div>

                <div class="row box-team">

                    <div class="col-md-3">
                        <div class="box-content-img">
                            <img src="/public/assets/images/Long-term-relationship.jpg" alt="" />
                            <div class="team-details">
                                <div class="content-content">
                                    <h3 style="margin-top:0% !important;">@if(Config::get('app.locale') == 'id') Hubungan jangka panjang @elseif(Config::get('app.locale') == 'cn') 长期的关系 @else Long term relationship @endif</h3>
                                    <p style="margin-top:0% !important;">
                                    @if(Config::get('app.locale') == 'id') Memberikan solusi yang sejalan dengan kepentingan nasabah. @elseif(Config::get('app.locale') == 'cn') 提供符合客户利益的解决方案。@else Providing solutions that are in line with customer interests. @endif</p>
                                </div>
                            </div>
                        </div>

                        <h3 style="text-align: center;">Longterm Relationship</h3>
                    </div>
                    <div class="col-md-3">
                        <div class="box-content-img">
                            <img src="/public/assets/images/Advance.jpg" alt="" />
                            <div class="team-details">
                                <div class="content-content">
                                    <h3 style="margin-top:0% !important;">@if(Config::get('app.locale') == 'id') Keunggulan @elseif(Config::get('app.locale') == 'cn') 预先 @else Advance @endif </h3>
                                    <p style="margin-top:0% !important;">
                                    @if(Config::get('app.locale') == 'id') Satu langkah yang tepat dan lebih cepat dari perusahaan pada umumnya atau pesaing. @elseif(Config::get('app.locale') == 'cn') 比一般公司或竞争对手更快，更正确的一步。@else One step that is right and faster than the company in general or competitors. @endif
                                    </p>
                                    
                                </div>
                            </div>
                        </div>

                        <h3 style="text-align: center;">Advance</h3>
                    </div>
                    <div class="col-md-3">
                        <div class="box-content-img">
                            <img src="/public/assets/images/Integrity.jpg" alt="" />
                            <div class="team-details">
                                <div class="content-content">
                                    <h3 style="margin-top:0% !important;">@if(Config::get('app.locale') == 'id') Integritas @elseif(Config::get('app.locale') == 'cn') 廉洁 @else Integtity @endif</h3>
                                    <p style="margin-top:0% !important;">
                                            @if(Config::get('app.locale') == 'id') Berkomitmen memberikan pelayanan terbaik disertai dengan sikap yang konsisten sehingga dapat menjaga etika usaha. @elseif(Config::get('app.locale') == 'cn') 致力于以一致的态度提供最好的服务，以保持商业道德。 @else Committed to providing the best service accompanied by a consistent attitude so as to maintain business ethics. @endif
                                    </p>
                                   
                                </div>
                            </div>
                        </div>

                        <h3 style="text-align: center;">Integrity</h3>
                    </div>


                    <div class="col-md-3">
                        <div class="box-content-img">
                            <img src="/public/assets/images/More-Value.jpg" alt="" />
                            <div class="team-details">
                                <div class="content-content">
                                    <h3 style="margin-top:0% !important;">@if(Config::get('app.locale') == 'id') Nilai tambah @elseif(Config::get('app.locale') == 'cn') 更多价值 @else More Value @endif</h3>
                                    <p style="margin-top:0% !important;">
                                            @if(Config::get('app.locale') == 'id') Berkomitmen tinggi terhadap pertumbuhan ekonomi dan meningkatkan kualitas literacy keuangan di indonesia. @elseif(Config::get('app.locale') == 'cn') 高度致力于印度尼西亚的经济增长和提高金融知识的质量。 @else Highly committed to economic growth and improving the quality of financial literacy in Indonesia. @endif 
                                    </p> 
                                </div>
                            </div>
                        </div>

                        <h3 style="text-align: center;">More Value</h3>
                    </div>

                </div>
            </div>
</div>
@endsection