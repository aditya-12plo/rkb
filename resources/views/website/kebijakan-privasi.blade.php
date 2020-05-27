@extends('layouts.website')
@section('content-website')


<div class="feed-content blog" style="padding-top:70px !important;">
            <div class="container">
                <div class="row">

                    <div class="col-md-8 box-body-feed">
                        <div class="box-comment box-blog">
                            <h3>@if(Config::get('app.locale') == 'id') Kebijakan Privasi @elseif(Config::get('app.locale') == 'cn') 隐私政策 @else Privacy policy @endif</h3>
                            <p>
                            <ol> 

                <li>@if(Config::get('app.locale') == 'id') Anda memahami bahwa Anda akan memberikan kami informasi pribadi yang akan kami gunakan untuk membuka, mengelola dan memelihara akun Anda dengan kami. @elseif(Config::get('app.locale') == 'cn') 您了解您将向我们提供个人信息，我们将使用这些信息来开设，管理和维护您在我们的帐户。 @else You understand that you will provide us with personal information that we will use to open, manage and maintain your account with us. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Kami tidak akan menjual atau menyampaikan informasi pribadi Anda kepada pihak ketiga kecuali bagi mereka yang kami perlukan dalam kaitannya dengan normal operasi bisnis kami. Termasuk pusat pengolahan dan verifikasi kartu kredit, lembaga penegak hukum, regulator, auditor, dan Introducing Broker yang memiliki perjanjian bisnis dengan kami. @elseif(Config::get('app.locale') == 'cn') 除与业务正常运营相关的需求外，我们不会将您的个人信息出售或传递给第三方。 包括与我们有业务协议的信用卡处理和验证中心，执法机构，监管机构，审计师和介绍经纪人。 @else We will not sell or pass your personal information to third parties except for those we need in connection with the normal operation of our business. Including credit card processing and verification centers, law enforcement agencies, regulators, auditors, and Introducing Brokers who have a business agreement with us. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Namun kami dapat menyampaikan informasi Anda ke perusahaan lain dalam grup kami yang kami rasakan mungkin dapat memberikan layanan kepada Anda. @elseif(Config::get('app.locale') == 'cn') 但是，我们可以将您的信息传递给我们组中可能认为可以为您提供服务的其他公司。 @else However, we can pass on your information to other companies in our group that we feel may be able to provide services to you. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Kami mungkin menggunakan Google Analytics Advertising Features yang memungkinkan Rajawali Kapital Berjangka untuk mengumpulkan informasi tentang demografi pengunjung website kami. Anda setiap saat dapat memilih keluar dari ini dengan menghubungi Google. @elseif(Config::get('app.locale') == 'cn') 我们可能会使用Google Analytics（分析）广告功能，使Eagle Capital Futures Ltd能够收集有关我们网站访问者的人口统计信息。 您可以随时与Google联系以选择退出。 @else We may use Google Analytics Advertising Features which allow Eagle Capital Futures Ltd to gather information about the demographics of visitors to our website. You can opt out of this at any time by contacting Google. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Kami dapat memberikan informasi pribadi untuk perusahaan margin trading lainnya yang mencari referensi, namun hal ini tidak akan mencakup rincian dari setiap open posisi. @elseif(Config::get('app.locale') == 'cn') 我们可能会为寻求参考的其他保证金交易公司提供个人信息，但这并不包括每个未平仓头寸的详细信息。 @else We may provide personal information for other margin trading companies who are looking for references, but this will not include details of every open position. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Kami memperoleh sebagian besar informasi tentang klien kami langsung dari mereka, tapi kami berhak untuk memperoleh informasi dari sumber lain seperti lembaga referensi kredit atau lembaga pencegahan penipuan. @elseif(Config::get('app.locale') == 'cn') 我们直接从客户那里获取有关客户的大多数信息，但是我们保留从其他来源（例如信贷咨询机构或欺诈预防机构）获取信息的权利。 @else We obtain most information about our clients directly from them, but we reserve the right to obtain information from other sources such as credit reference agencies or fraud prevention agencies. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Kami dapat menggunakan informasi yang kami miliki untuk membantu kami memberikan layanan yang lebih baik ataupun produk baru untuk Anda maupun klien kami lainnya melalui pemasaran langsung atau tidak langsung. @elseif(Config::get('app.locale') == 'cn') 我们可以利用我们所需要的信息来帮助我们通过直接或间接营销为您和我们的其他客户提供更好的服务或新产品。 @else We can use the information we have to help us provide better services or new products for you and our other clients through direct or indirect marketing. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Semua staf di Rajawali Kapital Berjangka sepenuhnya terlatih dalam penanganan kerahasiaan informasi pribadi. @elseif(Config::get('app.locale') == 'cn') Eagle Capital Futures Ltd的所有员工都经过全面培训，以处理个人信息的机密性。 @else All staff at Eagle Capital Futures Ltd are fully trained in handling the confidentiality of personal information. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Semua informasi pribadi yang kami simpan sedapat mungkin di fasilitas penyimpanan aman berbasis komputer. Jika tidak kami memegang informasi dalam file berbasis kertas aman. Tidak ada orang yang tidak sah dapat memperoleh akses ke fasilitas penyimpanan ini. @elseif(Config::get('app.locale') == 'cn') 我们存储的所有个人信息都尽可能放在基于计算机的安全存储设施中。 否则，我们会将信息保存在安全的纸质文件中。 任何未经授权的人都无法访问此存储设备。 @else All personal information that we store is as far as possible in a computer-based secure storage facility. Otherwise we hold the information in a secure paper-based file. No unauthorized person can gain access to this storage facility. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Website Rajawali Kapital Berjangka menggunakan Social Plugins yang mungkin memberi notifikasi bahwa browser Anda melihat website kami. Informasi ini juga dapat mencakup alamat IP Anda. Jika Anda tidak ingin informasi ini dibagikan maka Anda harus memastikan Anda keluar dari akun media sosial Anda sebelum melihat website kami. @elseif(Config::get('app.locale') == 'cn') Eagle Capital Furures Ltd网站使用社交插件，该插件可能会提供有关您的浏览器看到我们网站的通知。 此信息还可以包括您的IP地址。 如果您不希望共享此信息，则必须确保在查看我们的网站之前退出社交媒体帐户。 @else The Eagle Capital Futures Ltd Website uses Social Plugins which may provide a notification that your browser sees our website. This information can also include your IP address. If you do not want this information to be shared then you must ensure that you leave your social media account before viewing our website. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Website kami dapat menginstal cookie pada komputer Anda sehingga kami dapat lebih melayani kebutuhan Anda dengan mengetahui apa bagian dari situs kami yang Anda lihat dan mempercepat navigasi Anda. Anda memiliki pilihan untuk mengubah fungsi ini melalui pengaturan komputer Anda jika Anda ingin, meskipun ini dapat mempengaruhi kemampuan Anda untuk melihat bagian lain dari website. @elseif(Config::get('app.locale') == 'cn') 我们的网站可以在您的计算机上安装cookie，以便通过了解您看到网站的哪些部分并加快导航来更好地满足您的需求。 您可以根据需要通过计算机的设置更改此功能，尽管这可能会影响您查看网站其他部分的能力。 @else Our website can install cookies on your computer so that we can better serve your needs by knowing what parts of our site you see and speeding up your navigation. You have the option to change this function through your computer's settings if you want, although this can affect your ability to see other parts of the website. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Sementara kami melakukan segala upaya untuk memastikan semua informasi yang kami pegang adalah benar dan terkini, adalah tanggung jawab Anda untuk memberitahukan perubahan informasi pribadi Anda. @elseif(Config::get('app.locale') == 'cn') 尽管我们尽一切努力确保我们掌握的所有信息都是真实和最新的，但您有责任将您的个人信息更改通知您。 @else While we make every effort to ensure that all information we hold is true and current, it is your responsibility to notify you of changes to your personal information. @endif</li>
                <li>@if(Config::get('app.locale') == 'id') Pengguna yang tidak ingin menerima newsletter atau promosi email lagi bisa mengklik pada link bernama 'Unsubscribe' setiap saat tanpa biaya yang tercantum dalam setiap email yang dikirim oleh Rajawali Kapital Berjangka agar tidak menerima pesan di masa depan. @elseif(Config::get('app.locale') == 'cn') 不再希望接收新闻通讯或电子邮件促销的用户可以随时单击名为“取消订阅”的链接，而无需在Eagle Capital Futures Ltd发送的每封电子邮件中列出费用，以免将来收到消息。 @else Users who no longer wish to receive newsletters or e-mail promotions can click on the link named 'Unsubscribe' at any time without the costs listed in every e-mail sent by Eagle Capital Futures Ltd to not receive future messages. @endif</li>

</ol>
                        </p>
                              
                        </div>

                        
                    </div>

                    <div class="col-md-4 box-right-feed">
                        <div class="right-column">
                            <div class="component-1">
                                <div class="title-right-component">
                                    <h3>@if(Config::get('app.locale') == 'id') Butuh Bantuan ? @elseif(Config::get('app.locale') == 'cn') 需要帮忙 ？ @else Need Help ? @endif</h3>
                                </div>
                                <div class="body-right-component">
                                <p>@if(Config::get('app.locale') == 'id') Telepon @elseif(Config::get('app.locale') == 'cn') 电话 @else Phone @endif :  +6222 2058 5060</p>
                                <p>@if(Config::get('app.locale') == 'cn') 传真: +62 222 0582 219 @else Fax : +62 222 0582 219 @endif</p>
                                <p>@if(Config::get('app.locale') == 'cn') 电子邮件 @else Email @endif : INFO@RAJAWALIKAPITAL.CO.ID</p>
                                </div>
                            </div>
 

                            

                          

                        </div>
                    </div>

                </div>
            </div>
</div>

@endsection