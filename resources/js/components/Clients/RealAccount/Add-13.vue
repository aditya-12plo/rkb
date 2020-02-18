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
                <p style="text-align:center;"> <b>PERATURAN PERDAGANGAN (TRADING RULES)</b></p>
            </div>

            <div class="form-group col-lg-12">
               <table class="table table-striped table-bordered" width="100%" cellspacing="0">

<tr>
    <td colspan="3">
<h4><b>TRADING RULES KONTRAK BERJANGKA : </b></h4>
<br>
<table class="table" width="100%" cellspacing="0">
  <tr>
    <td colspan="3" style="text-align:center;background-color:#bec4c0;"><b>SPESIFIKASI KONTRAK EMAS LOCO LONDON (MINI)</b></td>
  </tr>
  <tr>
    <td style="text-align:center;background-color:#f18109;color:black;"> <b> SIMBOL </b> </td>
    <td style="text-align:center;background-color:#f18109;color:black;"> <b> GOLDUD </b></td>
    <td style="text-align:center;background-color:#f18109;color:black;"> <b> GOLDID </b></td>
  </tr>
  <tr>
    <td style="text-align:left;">Bulan Kontrak </td>
    <td style="text-align:left;" colspan="2"> </td> 
  </tr>
  <tr>
    <td style="text-align:left;">Satuan Kontrak (Per
Lot) </td>
    <td style="text-align:left;"> 10 troy ounce (1 lot)</td>
    <td style="text-align:left;"> 10 troy ounce (1 lot)</td>
  </tr>
  <tr>
    <td style="text-align:left;">Hari & Jam
Perdagangan </td>
    <td style="text-align:left;" colspan="2"> Senin - Jumat (06-00-04.30 GMT +7 (06:00 - 03:30 GMT +7 Selama DST</td>
  </tr>
  <tr>
    <td style="text-align:left;"> Hari Perdagangan
Terakhir</td>
    <td style="text-align:left;" colspan="2"> </td>
  </tr>
  <tr>
    <td style="text-align:left;">Mutu </td>
    <td style="text-align:left;" colspan="2">Emas Loco London </td>
  </tr>
  <tr>
    <td style="text-align:left;"> Kuotasi Harga </td>
    <td style="text-align:left;"> US Dollar (USD) </td>
    <td style="text-align:left;"> Rupiah (IDR) </td>
  </tr>
  <tr>
    <td style="text-align:left;">Perubahan Harga
Minimum </td>
    <td style="text-align:left;"> USD 0.1 per troy ounce (USD 1 per
satuan kontrak)</td>
    <td style="text-align:left;"> IDR 1.000 per troy ounce IDR 10.000 per
satuan kontrak)
</td>
  </tr>
  <tr>
    <td style="text-align:left;"> Harga Penyelesaian</td>
    <td style="text-align:left;"> <ul>
  <li>Harga Penyelesaian Harian akan
ditetapkan dengan merujuk pada
harga sumber acuan pada saat jam
penutupan perdagangan
GOLDUD</li>
  <li>Sumber acuan berasal dari harga
Loco London pada saat jam
penutupan perdagangan
GOLDUD
</li>
</ul> </td>
    <td style="text-align:left;"> <ol>
      <li>Harga Penyelesaian Harian akan
ditetapkan dengan merujuk pada harga
sumber acuan pada saat jam penutupan
perdagangan GOLDID</li>
      <li>Sumber acuan berasal dari harga Loco
London pada saat jam penutupan
perdagangan GOLDID</li>
      <li>Harga Loco London akan dikonversikan
ke dalam Rupiah menggunakan kurs yang
ditetapkan oleh Lembaga Kliring</li>
      </ol></td>
  </tr>
  <tr>
    <td style="text-align:left;">Biaya Gulir </td>
    <td style="text-align:left;" colspan="2"> Biaya Gulir akan diumumkan oleh Bursa dan Lembaga Kliring</td>
  </tr>
  <tr>
    <td style="text-align:left;"> Margin</td>
    <td style="text-align:left;" colspan="2"> 1,5% (Margin dapat berubah sewaktu-waktu oleh Bursa dan Lembaga Kliring</td>
  </tr>
  <tr>
    <td style="text-align:left;">Batas Posisi </td>
    <td style="text-align:center;" colspan="2"> 5.000 lot</td>
  </tr>
  <tr>
    <td style="text-align:left;">Posisi Wajib Lapor  </td>
    <td style="text-align:center;" colspan="2"> 2.500 lot </td>
  </tr>
  <tr>
    <td style="text-align:left;">Metode Penyelesaian </td>
    <td style="text-align:center;" colspan="2"> Penyelesaian secara tunai</td>
  </tr>
  <tr>
    <td style="text-align:left;"> Komisi Transaksi </td>
    <td style="text-align:left;"> Maksimal USD 10/lot/side</td>
    <td style="text-align:left;">Rp 30.000/lot/side </td>
  </tr>
  <tr>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center;background-color:#bec4c0;"><b>SPESIFIKASI KONTRAK MINYAK (MINI)</b></td>
  </tr>
  <tr>
    <td style="text-align:center;background-color:#f18109;color:black;"> <b> SIMBOL </b> </td>
    <td style="text-align:center;background-color:#f18109;color:black;" colspan="2"> <b> COFR </b></td>
  </tr>
  <tr>
    <td style="text-align:left;"> Bulan Kontrak</td>
    <td style="text-align:left;" colspan="2"> 3 (Tiga) Bulan Kontrak berturut-turut ditambah 2 (dua) bulan kontrak
terdekat setelahnya (Maret, Mei, Juli, September, Desember)</td>
  </tr>
  <tr>
    <td style="text-align:left;"> Satuan Kontrak (Per Lot)</td>
    <td style="text-align:left;" colspan="2"> 100 barel</td>
  </tr>
  <tr>
    <td style="text-align:left;">Hari & Jam Perdagangan </td>
    <td style="text-align:left;" colspan="2">Senin - Jumat (06-00-04.30 GMT +7 (06:00 - 03:30 GMT +7 Selama DST) </td>
  </tr>
  <tr>
    <td style="text-align:left;"> Hari Perdagangan Terakhir</td>
    <td style="text-align:left;" colspan="2">1 (satu) hari kerja sebelum Hari Perdagangan Terakhir dari Kontrak
Berjangka WTI Crude Oil di New York Mercantile Exchange (NYMEX) </td>
  </tr>
  <tr>
    <td style="text-align:left;"> Mutu</td>
    <td style="text-align:left;" colspan="2">Sesuai dengan mutu WTI Crude Oil yang diperdagangkan di NYMEX </td>
  </tr>
  <tr>
    <td style="text-align:left;">Kuotasi Harga </td>
    <td style="text-align:left;" colspan="2">Rupiah (IDR) per Barel </td>
  </tr>
  <tr>
    <td style="text-align:left;"> Perubahan Harga Minimum </td>
    <td style="text-align:left;" colspan="2">IDR 100 (seratus) per barel (IDR 10.000 persatuan kontrak)
 </td>
  </tr>
  <tr>
    <td style="text-align:left;"> Batas Perubahan Harga </td>
    <td style="text-align:left;" colspan="2">4% dari harga penyelesaian hari sebelumnya </td>
  </tr>
  <tr>
    <td style="text-align:left;"> Harga Penyelesaian </td>
    <td style="text-align:left;" colspan="2"><b>Harga Penyelesaian Harian,</b> Volume Weighted Average Price (VWAP)
semua transaksi yang terjadi di 5 (lima) menit terakhir di bursa pada Hari
perdagangan tersebut.<br><br> <b>Harga Penyelesaian Akhir,</b> Harga penyelesaian kontrak WTI Crude Oil di
New York Mercantile Exchange (NMEX) yang telah dikonversikan ke
dalam Rupiah menggunakan kurs yang ditetapkan oleh Lembaga Kliring.</td>
  </tr>
  <tr>
    <td style="text-align:left;">Biaya Gulir </td>
    <td style="text-align:left;" colspan="2">Biaya Gulir akan diumumkan oleh Bursa dan Lembaga Kliring </td>
  </tr>
  <tr>
    <td style="text-align:left;"> Margin</td>
    <td style="text-align:left;" colspan="2">4% (Margin dapat berubah sewaktu-waktu oleh Bursa dan Lembaga
Kliring) </td>
  </tr>
  <tr>
    <td style="text-align:left;">Batas Posisi </td>
    <td style="text-align:left;" colspan="2">1.500 lot </td>
  </tr>
  <tr>
    <td style="text-align:left;"> Posisi Wajib Lapor</td>
    <td style="text-align:left;" colspan="2">750 lot </td>
  </tr>
  <tr>
    <td style="text-align:left;">Metode Penyelesaian </td>
    <td style="text-align:left;" colspan="2">Penyelesaian secara tunai
 </td>
  </tr>
  <tr>
    <td style="text-align:left;">Komisi Transaksi </td>
    <td style="text-align:left;" colspan="2">Rp 50.000/lot/side </td>
  </tr> 
  <tr>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center;background-color:#bec4c0;"><b>SPESIFIKASI KONTRAK FOREX / MATA UANG (MINI)</b></td>
  </tr>
  <tr>
    <td colspan="3">
      <table class="table" width="100%" cellspacing="0">
        <tr>
          <td style="text-align:center;background-color:#f18109;color:black;">SIMBOL</td>
          <td style="text-align:center;background-color:#f18109;color:black;">EUR/USD</td>
          <td style="text-align:center;background-color:#f18109;color:black;">AUD/USD</td>
          <td style="text-align:center;background-color:#f18109;color:black;">USD/JPY</td>
          <td style="text-align:center;background-color:#f18109;color:black;">GBP/USD</td>
          <td style="text-align:center;background-color:#f18109;color:black;">USD/CHF</td>
          <td style="text-align:center;background-color:#f18109;color:black;">NZD/USD</td>
          <td style="text-align:center;background-color:#f18109;color:black;">USD/CAD</td>
        </tr>
        <tr>
          <td>Satuan Kontrak
(Per Lot)
</td>
          <td>EUR 10.000</td>
          <td>AAUD 10.000</td>
          <td>USD 10.000</td>
          <td>GBP 10.000</td>
          <td>USD 10.000</td>
          <td>NZD 10.000</td>
          <td>USD 10.000</td>
        </tr>
        <tr>
          <td>Hari & Jam
Perdagangan
</td>
          <td colspan="7">Senin - Jumat (06-00-04.30 GMT +7 (06:00 - 03:30 GMT +7 Selama DST)</td>
        </tr>
        <tr>
          <td>Kuotasi harga</td>
          <td>US Dollar
(USD)</td>
          <td>US Dollar
(USD)</td>
          <td>Japanese
Yen (JPY)</td>
          <td>US Dollar
(USD)</td>
          <td>Swiss Franc
(CHF)</td>
          <td>US Dollar
(USD)</td>
          <td>Canadian
(CAD)</td>
        </tr>
        <tr>
          <td>Perubahan
Harga Minimum</td>
          <td>0.00001 (USD
0.1 per lot)</td>
          <td>0.00001 (USD
0.1 per lot)</td>
          <td>0.001 (JPY
10 per lot)</td>
          <td>0.00001 (USD
0.1 per lot)</td>
          <td>0.00001 (CHF
0.1 per lot)</td>
          <td>0.00001 (USD
0.1 per lot)</td>
          <td>0.00001 (CAD
0.1 per lot)</td>
        </tr>
        <tr>
          <td>Harga
Penyelesaian</td>
          <td colspan="7"><ol><li>Harga Penyelesaian Harian akan merujuk pada harga transaksi akhir (last trade price)
dari sumber acuan di hari akhir perdagangan,</li><li>Sumber acuan akan ditetapkan Bursa melalui SEB.</li></ol></td>
        </tr>
        <tr>
          <td>Biaya Gulir</td>
          <td colspan="7">Biaya Gulir akan diumumkan oleh Bursa dan Lembaga Kliring melalui SEB</td>
        </tr>
        <tr>
          <td>Margin</td>
          <td colspan="7">1,5% (Margin dapat berubah sewaktu-waktu oleh Bursa dan Lembaga Kliring</td>
        </tr>
        <tr>
          <td>Batas Posisi</td>
          <td colspan="7">5.000 lot
</td>
        </tr>
        <tr>
          <td>Posisi Wajib Lapor</td>
          <td colspan="7">2.500 lot</td>
        </tr>
        <tr>
          <td>Penyelesaian</td>
          <td colspan="7">Penyelesaian secara tunai</td>
        </tr>
        <tr>
          <td>Komisi</td>
          <td colspan="7">USD 3 /lot/side</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
  </tr> 
  <tr>
    <td colspan="3" style="text-align:center;background-color:#bec4c0;"><b>SPESIFIKASI KONTRAK EMAS LOCO LONDON (MIKRO)</b></td>
  </tr>
  <tr>
    <td style="text-align:center;background-color:#f18109;color:black;"> <b> SIMBOL </b> </td>
    <td style="text-align:center;background-color:#f18109;color:black;"> <b> GOLDUD </b></td>
    <td style="text-align:center;background-color:#f18109;color:black;">  </td>
  </tr>
  <tr>
    <td style="text-align:left;">Bulan Kontrak</td>
    <td style="text-align:left;" colspan="2"> </td>
  </tr>
  <tr>
    <td style="text-align:left;"> Satuan Kontrak (Per
Lot)
</td>
    <td style="text-align:left;">1 troy ounce (1 lot) </td>
    <td style="text-align:left;"> </td>
  </tr>
  <tr>
    <td style="text-align:left;">Hari & Jam
Perdagangan </td>
    <td style="text-align:left;" colspan="2"> Senin - Jumat (06-00-04.30 GMT +7 (06:00 - 03:30 GMT +7 Selama DST</td>
  </tr>
  <tr>
    <td style="text-align:left;"> Hari Perdagangan
Terakhir
</td>
    <td style="text-align:left;" colspan="2"> </td>
  </tr>
  <tr>
    <td style="text-align:left;">Mutu </td>
    <td style="text-align:left;" colspan="2"> <b>Emas Loco London (LBMA Minimum Purity Standard)</b> </td>
  </tr>
  <tr>
    <td style="text-align:left;">Kuotasi Harga </td>
    <td style="text-align:left;">US Dollar (USD)
 </td>
    <td style="text-align:left;"> </td>
  </tr>
  <tr>
    <td style="text-align:left;">Perubahan Harga
Minimum </td>
    <td style="text-align:left;"> USD 0.1 per troy ounce (USD 0,1 per
satuan kontrak)
</td>
    <td style="text-align:left;"> </td>
  </tr>
  <tr>
    <td style="text-align:left;">Harga Penyelesaian </td>
    <td style="text-align:left;"><ul>
      <li>Harga Penyelesaian Harian akan
ditetapkan dengan merujuk pada
harga sumber acuan pada saat jam
penutupan perdagangan
GOLDUD</li><li>Sumber acuan berasal dari harga
Loco London pada saat jam
penutupan perdagangan
GOLDUD
</li>
      </ul> </td>
    <td style="text-align:left;"> </td>
  </tr>
  <tr>
    <td style="text-align:left;">Biaya Gulir  </td>
    <td style="text-align:left;" colspan="2">Biaya Gulir akan diumumkan oleh Bursa dan Lembaga Kliring </td>
  </tr>
  <tr>
    <td style="text-align:left;">Margin  </td>
    <td style="text-align:left;" colspan="2">1,5% (Margin dapat berubah sewaktu-waktu oleh Bursa dan Lembaga Kliring)
 </td>
  </tr>
  <tr>
    <td style="text-align:left;">Batas Posisi</td>
    <td style="text-align:left;" colspan="2">50.000 lot
 </td>
  </tr>
  <tr>
    <td style="text-align:left;">Posisi Wajib Lapor</td>
    <td style="text-align:left;" colspan="2">25.000 lot

 </td>
  </tr>
  <tr>
    <td style="text-align:left;">Metode Penyelesaian</td>
    <td style="text-align:left;" colspan="2">Penyelesaian secara tunai
 </td>
  </tr>
  <tr>
    <td style="text-align:left;">Komisi Transaksi </td>
    <td style="text-align:left;" colspan="2"> Maksimal USD 5/lot/side</td>
  </tr>
  <tr>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center;background-color:#bec4c0;"><b>SPESIFIKASI KONTRAK FOREX / MATA UANG (MIKRO)</b></td>
  </tr>
  <tr>
    <td colspan="3">
      <table class="table" width="100%" cellspacing="0">
        <tr>
          <td style="text-align:center;background-color:#f18109;color:black;">SIMBOL</td>
          <td style="text-align:center;background-color:#f18109;color:black;">EUR/USD</td>
          <td style="text-align:center;background-color:#f18109;color:black;">AUD/USD</td>
          <td style="text-align:center;background-color:#f18109;color:black;">USD/JPY</td>
          <td style="text-align:center;background-color:#f18109;color:black;">GBP/USD</td>
          <td style="text-align:center;background-color:#f18109;color:black;">USD/CHF</td>
          <td style="text-align:center;background-color:#f18109;color:black;">NZD/USD</td>
          <td style="text-align:center;background-color:#f18109;color:black;">USD/CAD</td>
        </tr>
        <tr>
          <td>Satuan Kontrak
(Per Lot)</td>
          <td>EUR 1000</td>
          <td>AUD 1000</td>
          <td>USD 1000</td>
         <td>GBP 1000</td>
          <td>USD 1000</td>
          <td>NZD 1000</td>
          <td>USD 1000</td>
        </tr>
        <tr>
          <td>Hari & Jam
Perdagangan
</td>
          <td colspan="6">Senin - Jumat (06-00-04.30 GMT +7 (06:00 - 03:30 GMT +7 Selama DST)</td>
        </tr>
        <tr>
          <td>Kuotasi harga</td>
          <td>US Dollar
(USD</td>
          <td>US Dollar
(USD)</td>
          <td>Japanese
Yen (JPY)</td>
         <td>US Dollar
(USD)</td>
          <td>Swiss Franc
(CHF)
</td>
          <td>US Dollar
(USD)</td>
          <td>Canadian
(CAD)
</td>
        </tr>
        <tr>
          <td>Perubahan
Harga Minimum</td>
          <td>0.00001 (USD
0.01 per lot)</td>
          <td>0.00001 (USD
0.01 per lot)</td>
          <td>0.001 (JPY
1 per lot)
</td>
         <td>0.00001 (USD
0.01 per lot)</td>
          <td>0.00001 (CHF
0.01 per lot)</td>
          <td>0.00001 (USD
0.01 per lot)</td>
          <td>0.00001 (CAD
0.01 per lot)</td>
        </tr>
        <tr>
          <td>Harga
Penyelesaian
</td>
          <td colspan="7"><ol>
            <li>Harga Penyelesaian Harian akan merujuk pada harga transaksi akhir (last trade
price) dari sumber acuan di hari akhir perdagangan,
            </li>
            <li>Sumber acuan akan ditetapkan Bursa melalui SEB.</li>
            </ol></td>
        </tr>
        <tr>
          <td>Biaya Gulir</td>
          <td colspan="7">Biaya Gulir akan diumumkan oleh Bursa dan Lembaga Kliring melalui SEB</td> 
        </tr>
        <tr>
          <td>Margin</td>
          <td colspan="7">1,5% (Margin dapat berubah sewaktu-waktu oleh Bursa dan Lembaga Kliring</td>
        </tr>
        <tr>
          <td>Batas Posisi </td>
          <td colspan="7">50.000 lot</td>
        </tr>
        <tr>
          <td>Posisi Wajib Lapor </td>
          <td colspan="7">25.000 lot</td>
        </tr>
        <tr>
          <td>Penyelesaian </td>
          <td colspan="7">Penyelesaian secara tunai</td>
        </tr>
        <tr>
          <td>Komisi </td>
          <td colspan="7">Maksimum USD 5 /lot/side</td>
        </tr>

      </table>
    </td>
  </tr>
   
  <tr>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
  </tr>
  <tr>
    <td style="text-align:left;" colspan="3"> 
      <ol>
        <li><b>Transaksi</b> <br> Semua transaksi dilakukan dengan sistem online menggunakan platform Meta Trader 5
(MT5) dan Smart Trader secara langsung terkoneksi ke bursa <b>Indonesia Commodity and
Derivatives Exchange (ICDX)</b>. </li>
        <li><b>Deposit Margin</b><br> Deposit Margin Awal Untuk Akun Mini, Minimal <b>Rp. 5.000.000,- (lima juta rupiah)</b>
<br>
Deposit Margin Awal Untuk Akun Mikro, Minimal <b>Rp. 500.000,- (lima ratus ribu rupiah)</b>
<br>
Nasabah dapat menyetor dana untuk Account nya ke <i>segregated bank account</i> (Rekening
Terpisah): 
<ul>
<li><b>Bank Mandiri (IDR) Rekening : 130 000 060 3333 a/n PT. Rajawali Kapital Berjangka</b></li>
</ul>
Semua dana transfer harus dilakukan antara <b>segregated bank account PT. Rajawali Kapital
Berjangka</b> dan bank account atas nama Nasabah yang bersangkutan.
Catatan : bukti transfer harap di fax ke 022-20582219.
</li>
        <li><b>Penarikan Dana (Withdrawal)</b><br>Nasabah yang ingin melakukan penarikan dana diharuskan mengisi formulir penarikan dana
yang disediakan oleh PT. Rajawali Kapital Berjangka dapat di download pada
http://www.rajawalikapital.co.id kemudian di fax ke 022-20582219 atau email ;<br>
dealing@rajawalikapital.co.id <br>
Formulir yang diterima PT. Rajawali Kapital Berjangka sebelum jam 11.00 wib, proses
transfer dana akan ditransfer pada hari yang sama, kecuali hari libur Nasional/Perbankan. <br>
Formulir yang diterima PT. Rajawali Kapital Berjangka sebelum jam 11.00 wib, proses
transfer dana akan ditransfer pada hari yang sama, kecuali hari libur Nasional/Perbankan. 
<br>
Sedangkan Formulir yang diterima PT. Rajawali Kapital Berjangka setelah jam 11.00 wib,
proses transfer dana akan dilakukan pada hari berikutnya, kecuali hari libur
Nasional/Perbankan.<br>
Semua dana transfer harus dilakukan antara segregated bank account PT. Rajawali Kapital
Berjangka dan bank account atas nama Nasabah yang bersangkutan. Apabila nama penyetor
berbeda dengan nama pada Akun Nasabah, maka otomatis ditolak oleh sistem.
</li>
        <li><b>Laporan Secara Elektronik</b><br>Nasabah tidak akan menerima laporan fisik namun laporan transaksi akan dikirim ke
Nasabah sesuai dengan alamat email yang tercantum dalam Formulir Pembukaan Rekening.
Agar pengiriman laporan sesuai, Nasabah harus menginformasikan alamat email yang benar
atau menginformasikan jika adanya perubahan alamat email ke<b> PT. Rajawali Kapital
Berjangka.</b></li>
        <li><b>Limit Order</b><br>Limit Order adalah jenis tipe order untuk melakukan Buy atau Sell pada harga dan volume
Lot yang ditentukan Nasabah<br>
Limit Order Buy = input order price sama dengan harga market atau di bawah lebih rendah
dari harga market.<br>
Limit Order Sell = input order price sama dengan harga market atau lebih tinggi dari harga
market.
</li>
        <li><b>Stop Limit</b><br>Stop limit adalah jenis tipe order yang dapat memasukan dua harga berbeda yang ditentukan
oleh Nasabah, ketika harga yang pertama sebagai stop order akan aktif saat tercapainya harga
last price sama dengan harga stop order yang di pesan oleh Nasabah, maka order stop limit
pada harga yang kedua akan aktif menjadi limit order untuk Buy atau Sell pada harga yang
telah ditentukan, biasanya Stop Order digunakan untuk meminimalkan atau membatasi
kerugian. </li>
        <li><b>Limit FAK</b><br>Adalah jenis tipe order yang segera langsung filled dengan harga pasar untuk Buy atau Sell
pada harga dan jumlah volume Lot yang ditentukan oleh Nasabah. Menggunakan LIMIT
(FILL AND KILL) maka Nasabah akan mencoba untuk bertransaksi sebanyak jumlah volume
Lot dan harganya yang diinginkan Nasabah dengan kondisi Order yang dapat dieksekusi
filled dengan sebagian volume lot dan sisanya dapat dibatalkan.</li>
        <li><b>Limit – Maket FOK</b><br>Adalah jenis tipe order yang segera langsung filled dengan harga pasar untuk Buy atau Sell
pada harga dan jumlah volume Lot yang ditentukan oleh Nasabah. Menggunakan LIMIT
(FILL OR KILL) maka Nasabah akan bertransaksi dengan kondisi harus sesuai harga dan
jumlah seluruh volume yang telah Order dijalankan atau, tidak dapat melaksanakan Order
akan secara total dibatalkan.</li>
        <li><b>Stop Order</b>
<br>
Adalah jenis tipe Order untuk melakukan Buy atau Sell pada harga yang telah ditentukan
oleh Naabah, yang dikenal sebagai order price. Ketika harga stop order yang dipesan akan
aktif saat tercapainya harga last price sama dengan harga stop order yang sudah dipesan oleh
Nasabah, maka order stop akan menjadi Market Order.
</li>
        <li><b>Limit I Touch</b><br>Adalah jenis tipe order yang dapat memasukan dua harga berbeda yang ditentukan oleh
Nasabah, ketika harga yang pertama if-touch order akan aktif saat tercapainya harga last price
sama dengan harga if-touch order yang dipesan oleh Nasabah, maka order limit if-touch pada
harga yang kedua akan aktif menjadi limit order untuk Buy atau Sell pada harga yang telah
ditentukan Nasabah.</li>
        <li><b>Auto Pull/Cancel Order
</b><br>
Pada waktu penutupan hari perdagangan setiap hari nya,semua transaksi nasabah atau
working order akan cancel secara otomatis oleh system.
</li>
        <li><b>Margin Call dan Auto Cut Equity</b><br>
        <ul>
          <li>Nasabah wajib memelihara/memenuhi tingkat Margin yang harus tersedia di rekening
sesuai dengan jumlah yang telah ditetapkan baik diminta maupun tidak oleh perusahaan.</li>
          <li>Margin Call terjadi apabila Equity ratio Nasabah dibawah <b>100% (seratus persen)</b> dari
Margin Requirement atas posisi terbuka. Nasabah diwajibkan menambah sejumlah dana
supaya memenuhi Margin yang dibutuhkan.</li>
          <li>Nasabah dilarang membuka posisi baru sampai kewajiban Margin Call tersebut terpenuhi,
yang mana jika kewajiban tersebut tidak dilaksanakan oleh Nasabah maka perusahaan
berhak sepenuhnya untuk me-likuidasi posisi terbuka Nasabah baik sebagian atau
seluruhnya tanpa perlu persetujuan dari Nasabah terlebih dahulu.</li>
          <li>Apabila Equity nasabah turun mencapai atau lebih sedikit dari <b>30% ( tiga puluh persen)</b>
dari Margin Requirement maka PT. Rajawali Kapital Berjangka akan melikuidasi seluruh
posisi nasabah secara otomatis tanpa perlu persetujuan nasabah.</li>
        </ul>
        </li>
        <li><b>Over Trading</b><br>Sistem akan menolak posisi Nasabah apabila Nasabah melakukan transaksi yang melebihi
dana atau margin yang ada. </li>
        <li><b>Penyelesaian Fisik </b><br>Apabila terjadi penyerahan fisik maka akan diatur sesuai dengan ketentuan bursa ICDX
(Indonesia Commodity and Derivatives Exchange) dan ICH (Indonesia Clearing House),
dengan berdasarkan ketentuan-ketentuan yang berlaku pada saat melakukan
transaksi/penyelesaian fisik.
</li> 
      </ol>

      Kode akses transaksi atau Login dan Password akan dikirim ke email Nasabah yang terdaftar,
dan disarankan untuk merubah Pasword pada saat Login pertama kali dilakukan. PT. Rajawali
Kapital Berjangka tidak bertanggung jawab Terhadap Penggunaan Login dan Password dari
segala bentuk penyalahgunaan sehubungan dengan kehilangan, pencurian atau penggunaan
oleh pihak yang tidak berhak atas Kode Akses tersebut. 

<br>
<br>

<b>Dengan melakukan ceklist dokumen ini, saya menyatakan bahwa saya telah membaca tentang
PERATURAN PERDAGANGAN (TRADING RULES), mengerti dan memahami ketentuan
dalam bertransaksi”.</b>

    </td>
  </tr>
  <tr>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
    <td style="text-align:left;"> </td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:left;"><div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_12" name="button_12" value="Ya" required>
<label class="custom-control-label" for="button_1"><b  style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div></td>
  </tr>
</table
<br>
<p>*)Perusahaan berhak untuk merubah segala ketentuan/ peraturan yang ada dalam peraturan
transaksi ini tanpa pemberitahuan terlebih dahulu</p>

<p style="text-align:center;">Dengan mengisi kolom “YA” di bawah ini, saya menyatakan bahwa saya telah
membaca tentang PERATURAN PERDAGANGAN (TRADING RULES), mengerti dan
menerima ketentuan dalam bertransaksi.</p>
    </td>
</tr>




<tr>
    <td width="30%">Pernyataan menerima / Tidak </td>
    <td width="70%" colspan="2">
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="aggrement_trading_rules" name="aggrement_trading_rules" v-model="forms.aggrement_trading_rules" value="Ya" required>
            <label class="custom-control-label" for="aggrement_trading_rules">Ya</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="aggrement_trading_rules" name="aggrement_trading_rules" v-model="forms.aggrement_trading_rules" value="Tidak" required>
          <label class="custom-control-label" for="aggrement_trading_rules">Tidak</label>
        </div> </td>
</tr>

<tr>
    <td width="30%">Menerima pada Tanggal </td>
    <td width="70%" colspan="2"> {{this.customLocalFormatter(currentDate)}}</td>
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
      idCode:'',
	    url:'/public/client-files/',
      position: 'up right',
      button_ya_tidak:'',
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
      forms: {id : '', aggrement_trading_rules:'',status:''},
    }
  },
  watch: { 

  },
  methods: {

    customLocalFormatter(date) {
      return moment(date).format('DD-MM-YYYY');
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
              var data = {aggrement_trading_rules:this.forms.aggrement_trading_rules , id:this.forms.id , status:this.forms.status}
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