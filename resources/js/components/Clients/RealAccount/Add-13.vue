<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Pendaftaran Akun Real</h3>
      <h4 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">Langkah 13</h4>
    </div>
  </div>
</div>


<form @submit.prevent="submitData" method="POST"> 
<div class="col-md-12 padding-5">
  <div class="panel">
    <div class="panel-body">
      <div class="col-md-12">
        <div class="form-row">

            <div class="form-group col-lg-12">
			<b>FORMULIR PBK. CDDS. 06. 1</b>
                <p style="text-align:center;"> <b>PERJANJIAN PEMBERIAN AMANAT SECARA ELEKTRONIK ON-LINE
UNTUK TRANSAKSI KONTRAK BERJANGKA</b></p>
            </div>

            <div class="form-group col-lg-12">
               <table class="table table-striped table-bordered" width="100%" cellspacing="0">
<tr>
    <td colspan="3" border="3">
      <p style="text-align:center;">
          <b>
PERHATIAN ! <br>
PERJANJIAN INI MERUPAKAN KONTRAK HUKUM. HARAP DIBACA DENGAN SEKSAMA.
          </b>
</p>
    </td>
</tr>

<tr>
    <td colspan="3">
      <p>
Pada hari ini {{this.getDay(this.currentDate)}}, tanggal {{this.getTanggal(this.currentDate)}}, bulan {{this.getMonth(this.currentDate)}}, tahun {{this.getTahun(this.currentDate)}} kami yang mengisi perjanjian
di bawah ini:
</p>
    </td>
</tr>

<tr>
    <td colspan="3">
<ol>
    <li>
        <table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="30%" style="border:0px !important;">Nama</td>
                <td width="1%" style="border:0px !important;">:</td>
                <td width="69%" style="border:0px !important;">{{this.forms.name}}</td>
            </tr>
            <tr>
                <td style="border:0px !important;">Pekerjaan / Jabatan</td>
                <td style="border:0px !important;">:</td>
                <td style="border:0px !important;">{{this.forms.job_category}} / {{this.forms.job_position}}</td>
            </tr>
            <tr>
                <td style="border:0px !important;">Alamat</td>
                <td style="border:0px !important;">:</td>
                <td style="border:0px !important;">{{this.forms.address}} <br> 
                    {{this.forms.province}} {{this.forms.city}} <br>
                    {{this.forms.area+' '+this.forms.sub_area}} <br>
                    {{this.forms.country}} <br>
                    Postal Kode : {{this.forms.postal_code}}</td>
            </tr>
        </table>
    </li>
</ol>
<p>dalam hal ini bertindak untuk dan atas nama sendiri, yang selanjutnya disebut Nasabah,</p>
<ol start="2">
    <li>
        <table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="30%" style="border:0px !important;">Nama</td>
                <td width="1%" style="border:0px !important;">:</td>
                <td width="69%" style="border:0px !important;">Salmun Baranna</td>
            </tr>
            <tr>
                <td style="border:0px !important;">Pekerjaan / Jabatan</td>
                <td style="border:0px !important;">:</td>
                <td style="border:0px !important;">Direktur Kepatuhan</td>
            </tr>
            <tr>
                <td style="border:0px !important;">Alamat</td>
                <td style="border:0px !important;">:</td>
                <td style="border:0px !important;"> Ruko Kopo Plaza Blok B No. 24, Jl. Peta (Lingkar Selatan) Suka Asih, Bojongloa Kaler <br>Bandung-Jawa Barat 40231</td>
            </tr>
        </table>
    </li>
</ol>

<p>Dalam hal ini bertindak untuk dan atas nama <b>PT. Rajawali Kapital Berjangka</b> yang selanjutnya
disebut Pialang Berjangka,</p>

<p>Nasabah dan Pialang Berjangka secara bersama – sama selanjutnya disebut <b>Para Pihak</b>.</p>

<p>Para Pihak sepakat untuk mengadakan Perjanjian Pemberian Amanat untuk melakukan transaksi
penjualan maupun pembelian Kontrak Berjangka dengan ketentuan sebagai berikut:
</p>
 <p>

<ol>
    <li><b>Margin dan Pembayaran Lainnya</b> <br>
<table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="100%" style="border:0px !important;">
                    <ol start="1">
                        <li>Nasabah menempatkan sejumlah dana (Margin) ke Rekening Terpisah (<i>Segregated
Account</i>) Pialang Berjangka sebagai Margin awal dan wajib mempertahankannya
sebagaimana ditetapkan.</li>
                        <li>membayar biaya-biaya yang diperlukan untuk transaksi yaitu biaya transaksi, pajak, komisi,
dan biaya pelayanan, biaya bunga sesuai tingkat yang berlaku, dan biaya lainnya yang
dapat dipertanggungjawabkan berkaitan dengan transaksi sesuai amanat Nasabah,
maupun biaya rekening Nasabah.</li>
                    </ol>
                </td>
            </tr>

            
        
        </table>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_1" name="button_1" value="Ya" required>
<label class="custom-control-label" for="button_1"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>
    <li><b>Pelaksanaan Amanat</b> <br>
<table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="100%" style="border:0px !important;">
                    <ol>
                        <li>Setiap amanat yang disampaikan oleh Nasabah atau kuasanya yang ditunjuk secara tertulis
oleh Nasabah, dianggap sah apabila diterima oleh Pialang Berjangka sesuai dengan
ketentuan yang berlaku, dapat berupa amanat tertulis yang ditandatangani oleh Nasabah
atau kuasanya, amanat telepon yang direkam, dan/atau amanat transaksi elektronik
lainnya.</li>
                        <li>Setiap amanat Nasabah yang diterima dapat langsung dilaksanakan sepanjang nilai Margin
yang tersedia pada rekeningnya mencukupi dan eksekusinya tergantung pada kondisi dan
sistem transaksi yang berlaku yang mungkin dapat menimbulkan perbedaan waktu
terhadap proses pelaksanaan amanat tersebut. Nasabah harus mengetahui posisi Margin
dan posisi terbuka sebelum memberikan amanat untuk transaksi berikutnya.</li>
                        <li>Amanat Nasabah hanya dapat dibatalkan dan/atau diperbaiki apabila transaksi atas
amanat tersebut belum terjadi. Pialang Berjangka tidak bertanggung jawab atas kerugian
yang timbul akibat tidak terlaksananya pembatalan dan/atau perbaikan sepanjang bukan
karena kelalaian Pialang Berjangka.</li>
                        <li>Pialang Berjangka berhak menolak amanat Nasabah apabila harga yang ditawarkan atau
diminta tidak wajar.</li> 
                    </ol>
                </td>
            </tr>

             
        </table>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_2" name="button_2" value="Ya" required>
<label class="custom-control-label" for="button_2"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Antisipasi penyerahan barang</b> <br>
<table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="100%" style="border:0px !important;">
                    <ol>
                        <li>Untuk kontrak-kontrak tertentu penyelesaian transaksi dapat dilakukan dengan
penyerahan atau penerimaan barang (<i>delivery</i>) apabila kontrak jatuh tempo. Nasabah
menyadari bahwa penyerahan atau penerimaan barang mengandung risiko yang lebih
besar daripada melikuidasi posisidengan <i>offset</i>. Penyerahan fisik barang memiliki
konsekuensi kebutuhan dana yang lebih besar serta tambahan biaya pengelolaan barang.</li>
                        <li>Pialang Berjangka tidak bertanggung jawab atas klasifikasi mutu (<i>grade</i>), kualitas atau
tingkat toleransi atas komoditi yang diserahkan atau akan diserahkan.</li>
                        <li>Pelaksanaan penyerahan atau penerimaan barang tersebut akan diatur dan dijamin oleh
Lembaga Kliring Berjangka.</li>
                    </ol>
                </td>
            </tr> 
           
        </table>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_3" name="button_3" value="Ya" required>
<label class="custom-control-label" for="button_3"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Kewajiban Memelihara Margin</b> <br>
<table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="100%" style="border:0px !important;">
                    <ol>
                        <li>Nasabah wajib memelihara/memenuhi tingkat Margin yang harus tersedia di rekening pada
Pialang Berjangka sesuai dengan jumlah yang telah ditetapkan baik diminta ataupun tidak
oleh Pialang Berjangka</li>
                        <li>Apabila jumlah Margin memerlukan penambahan maka Pialang Berjangka wajib
memberitahukan dan memintakan kepada Nasabah untuk menambah Margin segera</li>
                        <li>Apabila jumlah Margin memerlukan tambahan (<i>Call Margin</i>) maka Nasabah wajib
melakukan penyerahan <i>Call Margin</i> selambat-lambatnya sebelum dimulai hari
perdagangan berikutnya. Kewajiban Nasabah sehubungan dengan penyerahan <i>Call Margin</i>
tidak terbatas pada jumlah Margin awal.</li>
                        <li>Pialang Berjangka tidak berkewajiban melaksanakan amanat untuk melakukan transaksi
yang baru dari Nasabah sebelum <i>Call Margin</i> dipenuhi;</li>
                        <li> Untuk memenuhi kewajiban <i>Call Margin</i> dan keuangan lainnya dari Nasabah, Pialang
Berjangka dapat mencairkan dana Nasabah yang ada di Pialang Berjangka.</li> 
                    </ol>
                </td>
            </tr>
  
           
        </table>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_4" name="button_4" value="Ya" required>
<label class="custom-control-label" for="button_4"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Hak Pialang Berjangka Melikuidasi Posisi Nasabah</b> <br>
<p>Nasabah bertanggung jawab memantau/mengetahui posisi terbukanya secara terus-menerus
dan memenuhi kewajibannya. Apabila dalam jangka waktu tertentu dana pada rekening
Nasabah kurang dari yang dipersyaratkan, Pialang Berjangka dapat menutup posisi terbuka
Nasabah secara keseluruhan atau sebagian, membatasi transaksi, atau tindakan lain untuk
melindungi diri dalam pemenuhan Margin tersebut dengan terlebih dahulu memberitahu atau
tanpa memberitahu Nasabah dan Pialang Berjangka tidak bertanggung jawab atas kerugian yang
timbul akibat tindakan tersebut.</p>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_5" name="button_5" value="Ya" required>
<label class="custom-control-label" for="button_5"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Penggantian Kerugian Tidak Menyerahkan Barang</b> <br>
<p>Apabila Nasabah tidak mampu menyerahkan komoditi atas Kontrak Berjangka yang jatuh tempo,
Nasabah memberikan kuasa kepada Pialang Berjangka untuk meminjam atau membeli komoditi
untuk penyerahan tersebut.Nasabah wajib membayar secepatnya semua biaya, kerugian dan
premi yang telah dibayarkan oleh Pialang Berjangka atas tindakan tersebut. Apabila Pialang
Berjangka harus menerima penyerahan komoditi atau surat berharga maka Nasabah
bertanggung jawab atas penurunan nilai dari komoditi atas surat berharga tersebut.</p>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_6" name="button_6" value="Ya" required>
<label class="custom-control-label" for="button_6"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Penggantian Kerugian Tidak Adanya Penutupan Posisi</b> <br>
<p>Apabila Nasabah tidak mampu melakukan penutupan atas transaksi yang jatuh tempo, Pialang
Berjangka dapat melakukan penutupan atas transaksi di Bursa. Nasabah wajib membayar biayabiaya, termasuk biaya kerugian dan premi yang telah dibayarkan oleh Pialang Berjangka, dan
apabila Nasabah lalai untuk membayar biaya-biaya tersebut, Pialang Berjangka berhak untuk
mengambil pembayaran dari dana Nasabah.
</p>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_7" name="button_7" value="Ya" required>
<label class="custom-control-label" for="button_7"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Pialang Berjangka Dapat Membatasi Posisi</b> <br>
<p>Nasabah mengakui hak Pialang Berjangka untuk membatasi posisi terbuka Kontrak Berjangka
Nasabah dan Nasabah tidak melakukan transaksi melebihi batas yang telah ditetapkan tersebut.
</p>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_8" name="button_8" value="Ya" required>
<label class="custom-control-label" for="button_8"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Tidak Ada Jaminan atas Informasi atau Rekomendasi</b> <br>
<p>Nasabah mengakui bahwa :</p>

<table class="table" width="100%" cellspacing="0"> <tr>
                <td width="100%" style="border:0px !important;">
                    <ol>
                        <li>Informasi dan rekomendasi yang diberikan oleh Pialang Berjangka kepada Nasabah tidak
selalu lengkap dan perlu diverifikasi.</li>
                        <li>Pialang Berjangka tidak menjamin bahwa informasi dan rekomendasi yang diberikan
merupakan informasi yang akurat dan lengkap.</li>
                        <li>Informasi dan rekomendasi yang diberikan oleh Wakil Pialang Berjangka yang satu dengan
yang lain mungkin berbeda karena perbedaan analisis fundamental atau teknikal. Nasabah
menyadari bahwa ada kemungkinan Pialang Berjangka dan pihak terafiliasinya memiliki
posisi di pasar dan memberikan rekomendasi tidak konsisten kepada Nasabah.</li>
                    </ol>
                </td>
            </tr>
 
          
        </table>    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_9" name="button_9" value="Ya" required>
<label class="custom-control-label" for="button_9"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Pembatasan Tanggung Jawab Pialang Berjangka</b> <br>
<table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="1%" style="border:0px !important;">
                        <ol>
                            <li>Pialang Berjangka tidak bertanggung jawab untuk memberikan penilaian kepada Nasabah
mengenai iklim, pasar, keadaan politik dan
ekonomi nasional dan internasional, nilai kontrak berjangka, kolateral, atau memberikan
nasihat mengenai keadaan pasar. Pialang Berjangka hanya memberikan pelayanan untuk
melakukan transaksi secara jujur serta memberikan laporan atas transaksi tersebut.</li>
                            <li>Perdagangan sewaktu-waktu dapat dihentikan oleh pihak yang memiliki otoritas
(Bappebti/Bursa Berjangka) tanpa pemberitahuan terlebih dahulu kepada Nasabah. Atas
posisi terbuka yang masih dimiliki oleh Nasabah pada saat perdagangan tersebut
dihentikan, maka akan diselesaikan (likuidasi) berdasarkan pada peraturan/ketentuan
yang dikeluarkan dan ditetapkan oleh pihak otoritas tersebut, dan semua kerugian serta
biaya yang timbul sebagai akibat dihentikannya transaksi oleh pihak otoritas perdagangan
tersebut, menjadi beban dan tanggung jawab Nasabah sepenuhnya.</li>
                        </ol>
                </td>
            </tr>
  
        </table>    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_10" name="button_10" value="Ya" required>
<label class="custom-control-label" for="button_10"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Transaksi Harus Mematuhi Peraturan Yang Berlaku</b> <br>
<p>Semua transaksi baik yang dilakukan sendiri oleh Nasabah maupun melalui Pialang Berjangka
wajib mematuhi peraturan perundang-undangan di bidang Perdagangan Berjangka, kebiasaan
dan interpretasi resmi yang ditetapkan oleh Bappebti atau Bursa Berjangka.</p>   
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_11" name="button_11" value="Ya" required>
<label class="custom-control-label" for="button_11"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Pialang Berjangka tidak Bertanggung jawab atas Kegagalan Komunikasi</b> <br>
<p>Pialang Berjangka tidak bertanggung jawab atas keterlambatan atau tidak tepat waktunya
pengiriman amanat atau informasi lainnya yang disebabkan oleh kerusakan fasilitas komunikasi
atau sebab lain diluar kontrol Pialang Berjangka.
</p>   
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_12" name="button_12" value="Ya" required>
<label class="custom-control-label" for="button_12"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Konfirmasi</b> <br>
<table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="1%" style="border:0px !important;">
                    <ol>
                        <li>Konfirmasi dari Nasabah dapat berupa surat, telex, media lain, secara tertulis ataupun
rekaman suara.</li>
                        <li>Pialang Berjangka berkewajiban menyampaikan konfirmasi transaksi, laporan rekening,
permintaan Call Margin, dan pemberitahuan lainnya kepada Nasabah secara akurat, benar
dan secepatnya pada alamat Nasabah sesuai dengan yang tertera dalam rekening
Nasabah. Apabila dalam jangka waktu 2 x 24 jam setelah amanat jual atau beli
disampaikan, tetapi Nasabah belum menerima konfirmasi tertulis, Nasabah segera
memberitahukan hal tersebut kepada Pialang Berjangka melalui telepon dan disusul
dengan pemberitahuan tertulis.</li>
                        <li>Jika dalam waktu 2 x 24 jam sejak tanggal penerimaan konfirmasi tertulis tersebut tidak
ada sanggahan dari Nasabah maka konfirmasi Pialang Berjangka dianggap benar dan sah.</li>
                        <li>Kekeliruan atas konfirmasi yang diterbitkan Pialang Berjangka akan diperbaiki oleh Pialang
Berjangka sesuai keadaan yang sebenarnya dan demi hukum konfirmasi yang lama batal.</li>
                        <li>Nasabah tidak bertanggung jawab atas transaksi yang dilaksanakan atas rekeningnya
apabila konfirmasi tersebut tidak disampaikan secara benar dan akurat.</li>
                    </ol>
                </td>
            </tr>  
              
        </table>  
 
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_13" name="button_13" value="Ya" required>
<label class="custom-control-label" for="button_13"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Kebenaran Informasi Nasabah</b> <br>
<p>Nasabah memberikan informasi yang benar dan akurat mengenai data Nasabah yang diminta
oleh Pialang Berjangka dan akan memberitahukan paling lambat dalam waktu 3 (tiga) hari kerja
setelah terjadi perubahan, termasuk perubahan kemampuan keuangannya untuk terus
melaksanakan transaksi.
</p>   
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_14" name="button_14" value="Ya" required>
<label class="custom-control-label" for="button_14"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Komisi Transaksi</b> <br>
<p>Nasabah mengetahui dan menyetujui bahwa Pialang Berjangka berhak untuk memungut komisi
atas transaksi yang telah dilaksanakan, dalam jumlah sebagaimana akan ditetapkan dari waktu
ke waktu oleh Pialang Berjangka. Perubahan beban (<i>fees</i>) dan biaya lainnya harus disetujui
secara tertulis oleh Para Pihak.
</p>   
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_15" name="button_15" value="Ya" required>
<label class="custom-control-label" for="button_15"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Pemberian Kuasa</b> <br>
<p>Nasabah memberikan kuasa kepada Pialang Berjangka untuk menghubungi bank, lembaga
keuangan, Pialang Berjangka lain, atau institusi lain yang terkait untuk memperoleh keterangan
atau verifikasi mengenai informasi yang diterima dari Nasabah. Nasabah mengerti bahwa
penelitian mengenai data hutang pribadi dan bisnis dapat dilakukan oleh Pialang Berjangka
apabila diperlukan.Nasabah diberikan kesempatan untuk memberitahukan secara tertulis
dalam jangka waktu yang telah disepakati untuk melengkapi persyaratan yang diperlukan.
</p>   
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_16" name="button_16" value="Ya" required>
<label class="custom-control-label" for="button_16"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Pemindahan Dana</b> <br>
<p>Pialang Berjangka dapat setiap saat mengalihkan dana dari satu rekening ke rekening lainnya
berkaitan dengan kegiatan transaksi yang dilakukan Nasabah seperti pembayaran komisi,
pembayaran biaya transaksi, kliring,
dan keterlambatan dalam memenuhi kewajibannya, tanpa terlebih dahulu memberitahukan
kepada Nasabah. Transfer yang telah dilakukan akan segera diberitahukan secara tertulis
kepada Nasabah.
</p>   
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_17" name="button_17" value="Ya" required>
<label class="custom-control-label" for="button_17"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Pemberitahuan</b> <br>

<table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="1%" style="border:0px !important;">
                    <ol>
                        <li>Semua komunikasi, uang, surat berharga, dan kekayaan lainnya harus dikirimkan
langsung ke alamat Nasabah seperti tertera dalam rekeningnya atau alamat lain yang
ditetapkan/diberitahukan secara tertulis oleh Nasabah.</li>
                        <li>Semua uang, harus disetor atau ditransfer langsung oleh Nasabah ke:
   <table class="table table-striped table-bordered" width="100%" cellspacing="0">
        <tr>
            <td width="20%" style="border:0px !important;">Nama</td>
            <td width="1%" style="border:0px !important;">:</td>
            <td width="79%" style="border:0px !important;"><b>PT. Rajawali Kapital Berjangka</b></td>
        </tr>
        <tr>
            <td width="20%" style="border:0px !important;">Alamat</td>
            <td width="1%" style="border:0px !important;">:</td>
            <td width="79%" style="border:0px !important;">Ruko Kopo Plaza Blok B No. 24, Jl. Peta (Lingkar Selatan), Suka Asih,
Bojongloa Kaler-Bandung Jawa Barat</td>
        </tr>
        <tr>
            <td width="20%" style="border:0px !important;">Bank Mandiri</td>
            <td width="1%" style="border:0px !important;">:</td>
            <td width="79%" style="border:0px !important;">130-0021-00333-3 (IDR)</td>
        </tr>
        <tr>
            <td width="20%" style="border:0px !important;">Bank Mandiri</td>
            <td width="1%" style="border:0px !important;">:</td>
            <td width="79%" style="border:0px !important;"> ............. (USD)</td>
        </tr>
        <tr>
            <td width="20%" style="border:0px !important;">Bank Sinarmas</td>
            <td width="1%" style="border:0px !important;">:</td>
            <td width="79%" style="border:0px !important;"> ............. (USD)</td>
        </tr>
   </table> </li>
                        <li>Semua surat berharga, kekayaan lainnya, atau komunikasi harus dikirim kepada Pialang
Berjangka :
 <table class="table table-striped table-bordered" width="100%" cellspacing="0">
        <tr>
            <td width="20%" style="border:0px !important;">Nama</td>
            <td width="1%" style="border:0px !important;">:</td>
            <td width="79%" style="border:0px !important;"><b>PT. Rajawali Kapital Berjangka</b></td>
        </tr>
        <tr>
            <td width="20%" style="border:0px !important;">Alamat</td>
            <td width="1%" style="border:0px !important;">:</td>
            <td width="79%" style="border:0px !important;">Ruko Kopo Plaza Blok B No. 24, Jl. Peta (Lingkar Selatan), Suka Asih,
Bojongloa Kaler-Bandung Jawa Barat</td>
        </tr>
        <tr>
            <td width="20%" style="border:0px !important;">Telepon</td>
            <td width="1%" style="border:0px !important;">:</td>
            <td width="79%" style="border:0px !important;">022 – 20585060, 022 - 20582432</td>
        </tr>
        <tr>
            <td width="20%" style="border:0px !important;">Faksimili</td>
            <td width="1%" style="border:0px !important;">:</td>
            <td width="79%" style="border:0px !important;">022 - 20582219</td>
        </tr>
        <tr>
            <td width="20%" style="border:0px !important;">E-mail</td>
            <td width="1%" style="border:0px !important;">:</td>
            <td width="79%" style="border:0px !important;">info@rajawalikapital.co.id</td>
        </tr>
   </table>  </li>
                    </ol>    
                </td>
            </tr> 
          
            
            <tr>
                <td style="border:0px !important;">dan dianggap sudah diterima oleh Pialang Berjangka apabila sudah ada tanda bukti
penerimaan dari pegawai Pialang Berjangka.</td>
            </tr>
        </table>  

<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_18" name="button_18" value="Ya" required>
<label class="custom-control-label" for="button_18"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

    <li><b>Dokumen Pemberitahuan Adanya Risiko</b> <br>

<p>Nasabah mengakui menerima dan mengerti Dokumen Pemberitahuan Adanya Risiko.</p>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_19" name="button_19" value="Ya" required>
<label class="custom-control-label" for="button_19"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

    <li><b>Jangka Waktu Perjanjian dan Pengakhiran</b> <br>

<table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="100%" style="border:0px !important;">
                    <ol>
                        <li>Perjanjian ini mulai berlaku terhitung sejak tanggal ditandatanganinya sampai
disampaikannya pemberitahuan pengakhiran secara tertulis oleh Nasabah atau Pialang
Berjangka.</li>
                        <li>Nasabah dapat mengakhiri Perjanjian ini hanya jika Nasabah sudah tidak lagi memiliki
posisi terbuka dan tidak ada kewajiban Nasabah yang diemban oleh atau terhutang kepada
Pialang Berjangka.</li>
                        <li>Pengakhiran tidak membebaskan salah satu Pihak dari tanggung jawab atau kewajiban
yang terjadi sebelum pemberitahuan tersebut.</li>
                    </ol>
                </td>
            </tr>
            
           
        </table> 
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_20" name="button_20" value="Ya" required>
<label class="custom-control-label" for="button_20"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>


    <li><b>Berakhirnya Perjanjian</b> <br>
Perjanjian dapat berakhir dalam hal Nasabah :
<table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="1%" style="border:0px !important;"> 
                    <ol>
                        <li>dinyatakan pailit, memiliki hutang yang sangat besar, dalam proses peradilan, menjadi
hilang ingatan, mengundurkan diri atau meninggal;</li>
                        <li>tidak dapat memenuhi atau mematuhi perjanjian ini dan/atau melakukan pelanggaran
terhadapnya;</li>
                        <li>berkaitan dengan angka (1) dan (2) tersebut di atas, Pialang Berjangka dapat :  <br>
                            <ol type="i">
                                <li>meneruskan atau menutup posisi Nasabah tersebut setelah mempertimbangkannya
secara cermat dan jujur; dan</li>
                                <li>menolak perintah dari Nasabah atau kuasanya.</li>
                            </ol>
                        </li>
                        <li>Pengakhiran Perjanjian sebagaimana dimaksud dengan angka (1) dan (2) tersebut di atas
tidak melepaskan kewajiban dari Para Pihak yang berhubungan dengan penerimaan atau
kewajiban pembayaran atau pertanggungjawaban kewajiban lainnya yang timbul dari
Perjanjian.</li>
                    </ol>
                </td>
            </tr>
           
           
        </table> 
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_21" name="button_21" value="Ya" required>
<label class="custom-control-label" for="button_21"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b><i>Force Majeur</i></b> <br>
<p>Tidak ada satupun pihak di dalam Perjanjian dapat diminta pertanggungjawabannya untuk
suatu keterlambatan atau terhalangnya memenuhi kewajiban berdasarkan Perjanjian yang
diakibatkan oleh suatu sebab yang berada di luar kemampuannya atau kekuasaannya (<i>force
majeur</i>), sepanjang pemberitahuan tertulis mengenai sebab itu disampaikannya kepada pihak
lain dalam Perjanjian dalam waktu tidak lebih dari 24 (dua puluh empat) jam sejak timbulnya
sebab itu. Yang dimaksud dengan <i>Force Majeur</i> dalam Perjanjian adalah peristiwa kebakaran,
bencana alam (seperti gempa bumi, banjir, angin topan, petir), pemogokan umum, huru hara,
peperangan, perubahan terhadap peraturan perundang-undangan yang berlaku dan kondisi di
bidang ekonomi, keuangan dan Perdagangan Berjangka, pembatasan yang dilakukan oleh
otoritas Perdagangan Berjangka dan Bursa Berjangka serta terganggunya sistem perdagangan,
kliring dan penyelesaian transaksi Kontrak Berjangka di mana transaksi dilaksanakan yang
secara langsung mempengaruhi pelaksanaan pekerjaan berdasarkan Perjanjian.</p>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_22" name="button_22" value="Ya" required>
<label class="custom-control-label" for="button_22"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Perubahan atas Isian dalam Perjanjian Pemberian Amanat</b> <br>
<p>Perubahan atas isian dalam Perjanjian ini hanya dapat dilakukan atas persetujuan Para Pihak,
atau Pialang Berjangka telah memberitahukan secara tertulis perubahan yang diinginkan, dan
Nasabah tetap memberikan perintah untuk transaksi dengan tanpa memberikan tanggapan
secara tertulis atas usul perubahan tersebut. Tindakan Nasabah tersebut dianggap setuju atas
usul perubahan tersebut.
</p>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_23" name="button_23" value="Ya" required>
<label class="custom-control-label" for="button_23"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Penyelesaian Perselisihan</b> <br>

<table class="table" width="100%" cellspacing="0">
            <tr>
                <td width="100%" style="border:0px !important;">
                    <ol>
                        <li>Semua perselisihan dan perbedaan pendapat yang timbul dalam pelaksanaan Perjanjian
ini wajib diselesaikan terlebih dahulu secara musyawarah untuk mencapai mufakat
antara Para Pihak.</li>
                        <li>
						Kantor atau kantor cabang Pialang Berjangka terdekat dengan domisili Nasabah tempat
penyelesaian dalam hal terjadi perselisihan
<table class="table" width="100%" cellspacing="0">
<tr>
<td>Daftar Kantor</td>
<td>Kantor yang dipilih (salah satu)</td>
</tr>
<tr>
<td>Kantor A</td>
<td>

<div class="custom-control custom-radio">
<input type="radio" class="custom-control-input" id="office_authorization" name="office_authorization" v-model="forms.office_authorization" value="office_1" :checked="forms.office_authorization=='office_1'" required>
<label class="custom-control-label" for="office_authorization">Pilih</label>
</div>    
Ruko Kopo Plaza Blok B No. 24, Jl. Peta (Lingkar Selatan), Suka Asih,
Bojongloa Kaler-Bandung Jawa Barat
</td>
</tr>
</table>
						</li>
<li>
Apabila perselisihan dan perbedaan pendapat yang timbul tidak dapat diselesaikan
secara musyawarah untuk mencapai mufakat, maka Para Pihak sepakat untuk
menyelesaikan perselisihan melalui Badan Arbitrase Perdagangan Berjangka Komoditi
(BAKTI) dengan prosedur beracara khusus terkait dengan Penerimaan Nasabah Secara
Elektronik Online dengan Customer Due Diligence (CDD) Sederhana sesuai dengan
peraturan BAKTI.
</li>
                    </ol>
                </td>
            </tr>
          
             
        </table>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_24" name="button_24" value="Ya" required>
<label class="custom-control-label" for="button_24"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

<li><b>Bahasa</b> <br>
<p>Perjanjian ini dibuat dalam Bahasa Indonesia.</p>
    
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_25" name="button_25" value="Ya" required>
<label class="custom-control-label" for="button_25"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
<br>
</li>

</ol>

</p>


<p style="text-align:center;">
Demikian Perjanjian Pemberian Amanat ini dibuat oleh Para Pihak dalam keadaan sadar,
sehat jasmani rohani dan tanpa unsur paksaan dari pihak manapun.
</p>

<p style="text-align:center;">
Dengan mengisi kolom <b>“YA”</b> di bawah, saya menyatakan bahwa saya telah
</p>

<p style="text-align:center;">
menerima
</p>

<p style="text-align:center;">
“PERJANJIAN PEMBERIAN AMANAT TRANSAKSI KONTRAK BERJANGKA”
</p>

<p style="text-align:center;">
mengerti dan menyetujui isinya.
</p>

<p style="text-align:center;">
“Saya telah membaca, mengerti dan setuju terhadap semua ketentuan yang tercantum dalam
perjanjian ini”.
</p>

    </td>
</tr>


<tr>
    <td width="30%">Pernyataan menerima / Tidak </td>
    <td width="70%" colspan="2">
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="aggrement_electronic_authorization" name="aggrement_electronic_authorization" v-model="forms.aggrement_electronic_authorization" value="Ya" required>
            <label class="custom-control-label" for="aggrement_electronic_authorization">Ya</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="aggrement_electronic_authorization" name="aggrement_electronic_authorization" v-model="forms.aggrement_electronic_authorization" value="Tidak" required>
          <label class="custom-control-label" for="aggrement_electronic_authorization">Tidak</label>
        </div> </td>
</tr>

<tr>
    <td width="30%">Menerima pada Tanggal </td>
    <td width="70%" colspan="2"> {{this.customLokalFormatter(currentDate)}}</td>
</tr>

               </table>
            </div>
  


<div class="form-group col-lg-12">
  
    <button class="btn btn-warning pd-x-20" type="button" @click.prevent="backLink()">Kembali</button> 
    <button class="btn btn-info pd-x-20" type="submit">Langkah 14</button> 
</div>

      </div>
    </div>
  </div>
</div>
</div>
</form>

 
</div>
</template>

<script>
    
import Vue from 'vue' 
import VueSweetalert2 from 'vue-sweetalert2'
import moment from 'moment'
import Datepicker from 'vuejs-datepicker'
import VueEvents from 'vue-events'
import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css'
import Hashids from 'hashids'


Vue.use(VueSweetalert2)
Vue.use(Loading)
Vue.use(VueEvents)


export default {
    props: {
    },
    components: { 
        Datepicker,  
        Loading
    },
  data () {
    return { 
      isLoading: false,
      webURL:window.webURL,
      maxToasts: 100,
      pengadilan_negeri:'',
      idCode:'',
	    url:'/public/client-files/',
      position: 'up right',
      closeBtn: true,
      jenis_rekening_others:'',
      jenis_rekening_others_2:'',
      currentDate:new Date(),
      errors: [],
        endtime: {
            time: ''
        },
        option: {
            type: 'day',
            week: ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
            month: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            format: 'YYYY-MM-DD',
            placeholder: 'YYYY-MM-DD',
            inputStyle: {
            'display': 'inline-block',
            'padding': '6px',
            'line-height': '22px',
            'font-size': '16px',
            'border': '2px solid #fff',
            'box-shadow': '0 1px 3px 0 rgba(0, 0, 0, 0.2)',
            'border-radius': '2px',
            'color': '#5F5F5F'
            },
            color: {
            header: '#B799DA',
            headerText: '#f00'
            },
            buttons: {
            ok: 'Ok',
            cancel: 'Cancel'
            },
            overlayOpacity: 0.5, // 0.5 as default 
            dismissible: true // as true as default 
        },
        position: 'up right',
        closeBtn: true,
      forms: {id : '', job_category: '' , job_position:'', country:'' , province:'' , city:'', area:'', sub_area:'', village:'', postal_code:'' , address:'',office_authorization:'', aggrement_electronic_authorization:'',status:''},
    }
  },
  watch: { 

  },
  methods: {

    customLokalFormatter(date) {
      return moment(date).format('DD-MM-YYYY');
    },
    checkPurposeStatus(stts){
      if(stts == 'Badan Arbitrase Perdagangan Berjangka Komoditi (BAKTI)'){
        return false;
      }else{
        return true;
      }
    },
    diacak(id){
      var hashids = new Hashids('',1000,'abcdefghijklmnopqrstuvwxyz0987654321ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // no padding
      return hashids.encode(id); 
    },
    dibalik(id){
      var hashids = new Hashids('',1000,'abcdefghijklmnopqrstuvwxyz0987654321ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // no padding
      return hashids.decode(id); 
    },
    backLink() {
		  this.$router.go(-1);
    } ,
    getDay(date) {
       moment.locale('id');
      return moment(date).format('dddd');
    },
    getTanggal(date) {
       moment.locale('id');
      return moment(date).format('DD');
    },
    getTahun(date) {
       moment.locale('id');
      return moment(date).format('YYYY');
    },
    getMonth(date) {
       moment.locale('id');
      return moment(date).format('MMMM');
    },
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    },
    fetchIt(){
    this.loading();
        this.idCode = this.dibalik(this.$route.params.idnya);
        axios.get('/clients-area/create-real-account/step/13/'+this.idCode).then((response) => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{ 
                if(response.data.status == 200){ 
                    this.forms = response.data.data; 
                }else{
                    window.location.href = window.webURL; 
                }
            }
        }).catch(error => {
            if (! _.isEmpty(error.response)) {
                if (error.response.status = 422) {
                    this.$router.push('/server-error');
                }else if (error.response.status = 500) {
                    this.$router.push('/server-error');
                }else{
                    this.$router.push('/page-not-found');
                }
            }
        });
    },


    submitData(){
      this.$swal({
        title: 'Lanjut Langkah ke 14 ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            var data = {id : this.forms.id, aggrement_electronic_authorization:this.forms.aggrement_electronic_authorization ,office_authorization:this.forms.office_authorization, pengadilan_negeri:this.pengadilan_negeri,status:this.forms.status};
            axios.post('/clients-area/post-real-account/step-13', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
                        this.success(response.data.message);
                        this.$router.push({name:'addRealAccount14', params: {idnya:this.diacak(response.data.data.id)}});
                    }else{
                        this.resultError(response.data.message)
                    }
                }
            }).catch(error => {
                if (! _.isEmpty(error.response)) {
                                if (error.response.status = 422) {
                                   this.resultError(error.response.data.errors)
                                }else if (error.response.status = 500) {
                                    this.$router.push('/server-error');
                                }else{
                                    this.$router.push('/page-not-found');
                                }
                            }
                                        
                        })
                    }
                })
    },

    formatDate (value, fmt = 'YYYY-MM-DD H:mm:ss') {
        return (value == null)
            ? ''
            : moment(value).format(fmt)
    },

    isNumber: function(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
            evt.preventDefault();
        }else {
            return true;
        }
    },

    resultError(data) {  
      var count = Object.keys(data).length;
      for(var x=0; x < count;x++){ 
        var nameOb      = Object.keys(data)[x];
        var objectData  = data[nameOb];
        for(var y=0; y < objectData.length;y++){ 
          this.error(objectData[y]);
        }
      }
    },
    success(kata) {
      this.$swal({
        position: 'top-end',
        type: 'success',
        title: kata,
        showConfirmButton: false,
        timer: 1500
      })
    },
    error(kata) {
      this.$swal({
        position: 'top-end',
                    type: 'error',
                    title: kata,
                    showConfirmButton: false,
                    timer: 1500
      })
    },
    loading(){ 
      let loader = this.$loading.show({
        // Optional parameters
        container: this.fullPage ? null : this.$refs.formContainer,
        loader:'dots',
        color:'#2196F3',
        canCancel: true, 
        onCancel: this.onCancelLoading,
       }); 
       setTimeout(() => {
       loader.hide()
       },1000);
    },
    onCancelLoading() {
      console.log('User cancelled the loader.'); 
    }  	
  },
  events: { 

  },
  created: function() { 

  },
  mounted(){
    this.fetchIt();
  }

}
</script>
<style> 
</style>