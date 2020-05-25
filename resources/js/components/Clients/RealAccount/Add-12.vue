<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Pendaftaran Akun Real</h3>
      <h4 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">Langkah 12</h4>
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
			<b>Formulir PBK. CDDS. 05. 1</b>
                <p style="text-align:center;"> <b>DOKUMEN PEMBERITAHUAN ADANYA RISIKO <br> YANG HARUS DISAMPAIKAN OLEH PIALANG
BERJANGKA<br> UNTUK TRANSAKSI KONTRAK BERJANGKA</b></p>
            </div>

            <div class="form-group col-lg-12">
               <table class="table table-striped table-bordered" width="100%" cellspacing="0">
<tr>
    <td colspan="3">
      <p>Dokumen Pemberitahuan Adanya Risiko ini disampaikan kepada Anda sesuai dengan Pasal 50 ayat
(2) Undang-Undang Nomor 32 Tahun 1997 tentang Perdagangan Berjangka Komoditi sebagaimana
telah diubah dengan Undang-Undang Nomor 10 Tahun 2011 tentang Perubahan Atas UndangUndang Nomor 32 Tahun 1997 Tentang Perdagangan Berjangka Komoditi.
</p>
    </td>
</tr>

<tr>
    <td colspan="3">
      <p>
Maksud dokumen ini adalah memberitahukan bahwa kemungkinan kerugian atau keuntungan dalam
perdagangan Kontrak Berjangka bisa mencapai jumlah yang sangat besar. Oleh karena itu, Anda
harus berhati-hati dalam memutuskan untuk melakukan transaksi, apakah kondisi keuangan Anda
mencukupi.
</p>
    </td>
</tr>

<tr>
    <td colspan="3">
      <p>

<ol>
    <li><b><u>Perdagangan Kontrak Berjangka belum tentu layak bagi semua investor.</u></b> Anda dapat
menderita kerugian dalam jumlah besar dan dalam jangka waktu singkat. Jumlah kerugian
uang dimungkinkan dapat melebihi jumlah uang yang pertama kali Anda setor (Margin awal)
ke Pialang Berjangka Anda.
Anda mungkin menderita kerugian seluruh Margin dan Margin tambahan yang ditempatkan
pada Pialang Berjangka untuk mempertahankan posisi Kontrak Berjangka Anda.
Hal ini disebabkan Perdagangan Berjangka sangat dipengaruhi oleh mekanisme leverage,
dimana dengan jumlah investasi dalam bentuk yang relatif kecil dapat digunakan untuk
membuka posisi dengan aset yang bernilai jauh lebih tinggi. Apabila Anda tidak siap dengan
risiko seperti ini, sebaiknya Anda tidak melakukan perdagangan Kontrak Berjangka.
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_satu" name="button_satu" value="Ya" required>
<label class="custom-control-label" for="button_satu"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li><b><u>Perdagangan Kontrak Berjangka mempunyai risiko dan mempunyai kemungkinan kerugian
yang tidak terbatas yang jauh lebih besar dari jumlah uang yang disetor (Margin) ke
Pialang Berjangka.</u></b> Kontrak Berjangka sama dengan produk keuangan lainnya yang
mempunyai risiko tinggi, Anda sebaiknya tidak menaruh risiko terhadap dana yang Anda
tidak siap untuk menderita rugi, seperti tabungan pensiun, dana kesehatan atau dana untuk
keadaan darurat, dana yang disediakan untuk pendidikan atau kepemilikan rumah, dana
yang diperoleh dari pinjaman pendidikan atau gadai, atau dana yang digunakan untuk
memenuhi kebutuhan sehari-hari.
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_dua" name="button_dua" value="Ya" required>
<label class="custom-control-label" for="button_dua"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li><b><u>Berhati-hatilah terhadap pernyataan bahwa Anda pasti mendapatkan keuntungan besar
dari perdagangan Kontrak Berjangka.</u></b> Meskipun perdagangan Kontrak Berjangka dapat
memberikan keuntungan yang besar dan cepat, namun hal tersebut tidak pasti, bahkan
dapat menimbulkan kerugian yang besar dan cepat juga. Seperti produk keuangan lainnya,
tidak ada yang dinamakan “pasti untung”.
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_tiga" name="button_tiga" value="Ya" required>
<label class="custom-control-label" for="button_tiga"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li><b><u>Disebabkan adanya mekanisme leverage dan sifat dari transaksi Kontrak Berjangka, Anda
dapat merasakan dampak bahwa Anda menderita kerugian dalam waktu cepat.</u></b>
Keuntungan maupun kerugian dalam transaksi Kontrak Berjangka akan langsung dikredit
atau didebet ke rekening Anda, paling lambat secara harian. Apabila pergerakan di pasar
terhadap Kontrak Berjangka menurunkan nilai posisi Anda dalam Kontrak Berjangka, Anda
diwajibkan untuk menambah dana untuk pemenuhan kewajiban Margin ke Pialang
Berjangka. Apabila rekening Anda berada dibawah minimum Margin yang telah ditetapkan
Lembaga Kliring Berjangka atau Pialang Berjangka, maka posisi Anda dapat dilikuidasi pada
saat rugi, dan Anda wajib menyelesaikan defisit (jika ada) dalam rekening Anda.
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_empat" name="button_empat" value="Ya" required>
<label class="custom-control-label" for="button_empat"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li><b><u>Pada saat pasar dalam keadaan tertentu, Anda mungkin akan sulit atau tidak mungkin
melikuidasi posisi.</u></b> Pada umumnya Anda harus melakukan transaksi offset jika ingin
melikuidasi posisi dalam Kontrak Berjangka. Apabila Anda tidak dapat melikuidasi posisi
Kontrak Berjangka, Anda tidak dapat merealisasikan keuntungan pada nilai posisi tersebut
atau mencegah kerugian yang lebih tinggi. Kemungkinan tidak dapat melikuidasi dapat
terjadi, antara lain: jika perdagangan berhenti dikarenakan aktivitas perdagangan yang tidak
lazim pada Kontrak Berjangka atau subjek Kontrak Berjangka, terjadi kerusakan sistem pada
Bursa Berjangka atau Pialang Berjangka, atau posisi Anda berada dalam pasar yang tidak
likuid. Bahkan apabila Anda dapat melikuidasi posisi tersebut, Anda mungkin terpaksa
melakukannya pada harga yang menimbulkan kerugian besar.
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_lima" name="button_lima" value="Ya" required>
<label class="custom-control-label" for="button_lima"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li><b><u>Pada saat pasar dalam keadaan tertentu, Anda mungkin akan sulit atau tidak mungkin
mengelola risiko atas posisi terbuka Kontrak Berjangka dengan cara membuka posisi
dengan nilai yang sama namun dengan posisi yang berlawanan dalam kontrak bulan yang
berbeda, dalam pasar yang berbeda atau dalam “subjek Kontrak Berjangka” yang berbeda.</u></b>
Kemungkinan untuk tidak dapat mengambil posisi dalam rangka membatasi risiko yang
timbul, contohnya: jika perdagangan dihentikan pada pasar yang berbeda disebabkan
aktivitas perdagangan yang tidak lazim pada Kontrak Berjangka atau “subjek Kontrak
Berjangka”.
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_enam" name="button_enam" value="Ya" required>
<label class="custom-control-label" for="button_enam"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li><b><u>Anda dapat diwajibkan untuk menyelesaikan Kontrak Berjangka dengan penyerahan fisik
dari “subjek Kontrak Berjangka”.</u></b> Jika Anda mempertahankan posisi penyelesaian fisik
dalam Kontrak Berjangka sampai hari terakhir perdagangan berdasarkan tanggal jatuh
tempo Kontrak Berjangka, Anda akan diwajibkan menyerahkan atau menerima penyerahan
“subjek Kontrak Berjangka” yang dapat mengakibatkan adanya penambahan biaya.
Pengertian penyelesaian dapat berbeda untuk suatu Kontrak Berjangka dengan Kontrak
Berjangka lainnya atau suatu Bursa Berjangka dengan Bursa Berjangka lainnya. Anda harus
melihat secara teliti mengenai penyelesaian dan kondisi penyerahan sebelum membeli atau
menjual Kontrak Berjangka.
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_tujuh" name="button_tujuh" value="Ya" required>
<label class="custom-control-label" for="button_tujuh"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li><b><u>Anda dapat menderita kerugian yang disebabkan kegagalan sistem informasi.</u></b>
Sebagaimana yang terjadi pada setiap transaksi keuangan, Anda dapat menderita kerugian
jika amanat untuk melaksanakan transaksi Kontrak Berjangka tidak dapat dilakukan karena
kegagalan sistem informasi di Bursa Berjangka, penyelenggara maupun sistem informasi di
Pialang Berjangka yang mengelola posisi Anda. Kerugian Anda akan semakin besar jika
Pialang Berjangka yang mengelola posisi Anda tidak memiliki sistem informasi cadangan atau
prosedur yang layak.
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_delapan" name="button_delapan" value="Ya" required>
<label class="custom-control-label" for="button_delapan"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li><b><u>Semua Kontrak Berjangka mempunyai risiko, dan tidak ada strategi berdagang yang dapat
menjamin untuk menghilangkan risiko tersebut.</u></b> Strategi dengan menggunakan kombinasi
posisi seperti spread, dapat sama berisiko seperti posisi long atau short. Melakukan
Perdagangan Berjangka memerlukan pengetahuan mengenai Kontrak Berjangka dan pasar
berjangka.
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_9" name="button_9" value="Ya" required>
<label class="custom-control-label" for="button_9"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li><b><u>Strategi perdagangan harian dalam Kontrak Berjangka dan produk lainnya memiliki risiko
khusus.</u></b> Seperti pada produk keuangan lainnya, pihak yang ingin membeli atau menjual
Kontrak Berjangka yang sama dalam satu hari untuk mendapat keuntungan dari perubahan
harga pada hari tersebut (“<i>day traders</i>”) akan memiliki beberapa risiko tertentu antara lain
jumlah komisi yang besar, risiko terkena efek pengungkit (“exposure to leverage”), dan
persaingan dengan pedagang profesional. Anda harus mengerti risiko tersebut dan memiliki
pengalaman yang memadai sebelum melakukan perdagangan harian (“<i>day trading</i>”).
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_10" name="button_10" value="Ya" required>
<label class="custom-control-label" for="button_10"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li><b><u>Menetapkan amanat bersyarat, seperti Kontrak Berjangka dilikuidasi pada keadaan
tertentu untuk membatasi rugi (<i>stop loss</i>), mungkin tidak akan dapat membatasi kerugian
Anda sampai jumlah tertentu saja.</u></b> Amanat bersyarat tersebut mungkin tidak dapat
dilaksanakan karena terjadi kondisi pasar yang tidak memungkinkan melikuidasi Kontrak
Berjangka.

<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_11" name="button_11" value="Ya" required>
<label class="custom-control-label" for="button_11"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li><b><u>Anda harus membaca dengan seksama dan memahami Perjanjian Pemberian Amanat
dengan Pialang Berjangka Anda sebelum melakukan transaksi Kontrak Berjangka.</u></b>

<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_12" name="button_12" value="Ya" required>
<label class="custom-control-label" for="button_12"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li>Pernyataan singkat ini tidak dapat memuat secara rinci seluruh risiko atau aspek penting
lainnya tentang Perdagangan Berjangka. Oleh karena itu Anda harus mempelajari kegiatan
Perdagangan Berjangka secara cermat sebelum memutuskan melakukan transaksi.


<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_13" name="button_13" value="Ya" required>
<label class="custom-control-label" for="button_13"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
    <li>Dokumen Pemberitahuan Adanya Risiko (<i>Risk Disclosure</i>) ini dibuat dalam Bahasa Indonesia
<div class="custom-control custom-radio">
<input type="checkbox" class="custom-control-input" id="button_14" name="button_14" value="Ya" required>
<label class="custom-control-label" for="button_14"><b style="color:#eb4034;">Saya sudah membaca dan memahami</b></label>
</div>
</li>
</ol>

</p>
<p style="text-align:center;">
PERNYATAAN MENERIMA PEMBERITAHUAN ADANYA RISIKO
</p>
<p style="text-align:center;">
Dengan mengisi kolom “YA” di bawah, saya menyatakan bahwa saya telah menerima “DOKUMEN
PEMBERITAHUAN ADANYA RISIKO” mengerti dan menyetujui isinya.

</p>
    </td>
</tr>


<tr>
    <td width="30%">Pernyataan menerima / Tidak </td>
    <td width="70%" colspan="2">
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="aggrement_notice_of_risk" name="aggrement_notice_of_risk" v-model="forms.aggrement_notice_of_risk" value="Ya" required>
            <label class="custom-control-label" for="aggrement_notice_of_risk">Ya</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="aggrement_notice_of_risk" name="aggrement_notice_of_risk" v-model="forms.aggrement_notice_of_risk" value="Tidak" required>
          <label class="custom-control-label" for="aggrement_notice_of_risk">Tidak</label>
        </div> </td>
</tr>

<tr>
    <td width="30%">Menerima pada Tanggal </td>
    <td width="70%" colspan="2">{{this.customLokalFormatter(currentDate)}}</td>
</tr>

               </table>
            </div>
  


<div class="form-group col-lg-12">
  
    <button class="btn btn-warning pd-x-20" type="button" @click.prevent="backLink()">Kembali</button> 
    <button class="btn btn-info pd-x-20" type="submit">Langkah 13</button> 
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
      forms: {id : '', aggrement_notice_of_risk:'',status:''},
    }
  },
  watch: { 

  },
  methods: {

    customLokalFormatter(date) {
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
        axios.get('/clients-area/create-real-account/step/12/'+this.idCode).then((response) => {
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
        title: 'Lanjut Langkah ke 13 ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            var data = {id : this.forms.id, button_ya_tidak:this.button_ya_tidak , aggrement_notice_of_risk:this.forms.aggrement_notice_of_risk,status:this.forms.status};
            axios.post('/clients-area/post-real-account/step-12', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
                        this.success(response.data.message);
                        this.$router.push({name:'addRealAccount13', params: {idnya:this.diacak(response.data.data.id)}});
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