<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Pendaftaran Akun Real</h3>
      <h4 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">Langkah 1</h4>
    </div>
  </div>
</div>


<form @submit.prevent="submitData" method="POST"> 
<div class="col-md-12 padding-5">
  <div class="panel">
    <div class="panel-body">
      <div class="col-md-12">
        

<div class="form-group col-lg-12">
<h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;"><u>PROFIL PERUSAHAAN PIALANG BERJANGKA</u></h3>
</div>


<div class="form-group col-lg-12">
<div class="responsive-table">
   <table class="table table-striped table-bordered" width="100%" cellspacing="0">
      <tr>
        <td>Nama</td>
        <td width="2%">:</td>
        <td><b>PT. RAJAWALI KAPITAL BERJANGKA</b></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td width="2%">:</td>
        <td>Ruko Kopo Plaza Blok B No. 24, Jl. Peta (Lingkar Selatan) <br>Suka Asih, <br>Bojongloa Kaler<br>
            Bandung-Jawa Barat 40231</td>
      </tr>
      <tr>
        <td>No. Telepon</td>
        <td width="2%">:</td>
        <td><b>022-20585060</b></td>
      </tr>
      <tr>
        <td>Faksimili</td>
        <td width="2%">:</td>
        <td><b>022-20582219</b></td>
      </tr>
      <tr>
        <td>E-mail</td>
        <td width="2%">:</td>
        <td><b>info@rajawalikapital.co.id</b></td>
      </tr>
      <tr>
        <td>Home-page</td>
        <td width="2%">:</td>
        <td><b>www.rajawalikapital.co.id</b></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:center;"><b><u>Susunan Pengurus Perusahaan</u></b></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Direksi</u></b></td>
      </tr>
      <tr>
        <td>Direktur Utama</td>
        <td width="2%">:</td>
        <td><b>Eri Ria Djulia</b></td>
      </tr>
      <tr>
        <td>Direktur</td>
        <td width="2%">:</td>
        <td><b>Benny Fery Fransiscus</b></td>
      </tr>
      <tr>
        <td>Direktur Kepatuhan</td>
        <td width="2%">:</td>
        <td><b>Salmun Baranna</b></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Dewan Komisaris</u></b></td>
      </tr>
      <tr>
        <td>Komisaris Utama</td>
        <td width="2%">:</td>
        <td><b>Drs. Monang Siringoringo, MM</b></td>
      </tr>
      <tr>
        <td>Komisaris</td>
        <td width="2%">:</td>
        <td><b>Marcelline Rosavina</b></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Susunan Pemegang Saham Perusahaan</u></b></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><ol><li>Drs. Monang Siriongoringo, MM</li><li>Marcelline Rosavina</li><li>Eri Ria Djulia</li></ol></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Nomor dan Tanggal Izin Usaha Dari Bappebti </u></b></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b>No. /BAPPEBTI/ Tanggal :  </b></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Nomor dan Tanggal Keanggotaan Bursa Berjangka</u>  </b></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b>No. Tanggal :  </b></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Nomor dan Tanggal Keanggotaan Lembaga Kliring Berjangka</u> </b></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b>No. Tanggal :  </b></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Kontrak Berjangka Yang Diperdagangkan : </u></b> <br> 
        <ol>
          <li><b>Kontrak Multilateral Mini dan Mikro Mata Uang (Forex)</b></li>
          <li><b>Kontrak Multilateral Mini dan Mikro Emas (Gold)</b></li>
          <li><b>Kontrak Multilateral Mini dan Mikro Minyak Mentah (Crude Oil)</b></li>
          </ol>
          </td>
      </tr>
      
      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Biaya Secara Rinci yang Di Bebankan Pada Nasabah</u></b> <br> 
        <ol><li>Komisi</li><li>Interest Biaya / Bunga</li></ol></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Nomor atau alamat email jika terjadi keluhan</u></b> <br><br> <ul><li>info@rajawalikapital.co.id</li></ul></td>
      </tr>
      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Sarana Penyelesaian perselisihan yang dipergunakan apabila terjadi perselisihan</u></b> <br> 
        Penyelesaian Perselisihan Mempergunakan Sarana Melalui Prosedur Sebagai Berikut
        <br>
        <ol>
          <li>Nasabah menyampaikan pengaduannya dengan mengisi ringkasan kasusnya pada Form Pengaduan
Nasabah dan diserahkan kepada Departement Compliance
</li>
          <li>Depertement Compliance berkoordinasi dengan departmen lainnya yang terkait akan melakukan
verifikasi kasus atas dokumen-dokumen dan bukti-bukti pendukung lainnya dengan mengacu pada
ketentuan yang berlaku di Perusahaan serta peraturan yang telah di tetapkan oleh instansi yang
berwenang di bidang Perdagangan Berjangka Komoditi.</li>
          <li>Setelah diperoleh hasil verifikasi atas dokumen-dokumen dan bukti-bukti pendukung tersebut ,
Departement Compliance akan menghubungi Nasabah serta pihak-pihak yang terkait pada kasus
tersebut untuk melakukan musyawarah dengan tujuan mencapai mufakat </li>
          <li>Apabila perselisihan ternyata belum terselesaikan dalam musyawarah tersebut, maka selanjutnya
penyelesainya akan memanfaatkan sarana penyelesaian yang tersedia di Bursa Berjangka (ICDX)
 </li>
          <li> Apabila Perselisihan ternyata belum terselesaikan di bursa berjangka, maka selanjutnya perselisihan
akan di selesaikan melalui Badan Arbitrase Perdagangan Berjangka Komoditi (BAKTI) atau Pengadilan
Negeri yang berwenang.</li>
        </ol>
        </td>
      </tr>
     
      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Nama-nama Wakil Pialang Berjangka yang Bekerja di Perusahaan Pialang Berjangka</u></b> <br>
         <ol>
           <li> No. </li>
           <li>  </li>
           <li>  </li>
           <li>  </li>
           </ol>
         </td>
      </tr>

      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Nama – Nama Wakil Pialang Berjangka yang secara khusus ditunjuk oleh Pialang Berjangka untuk
melakukanVerifikasi dalam rangka penerimaan Nasabah elektronik on- Line</u></b> <br>
         <ol>
           <li> No. </li>
           <li> No. </li>
           </ol>
         </td>
      </tr>


      <tr>
        <td colspan="3" style="text-align:left;"><b><u>Nomor Rekening Terpisah (segreted Account) Perusahaan Pialang Berjangka</u></b> <br>
        <table width="100%" cellspacing="0" class="table table-striped table-bordered">
          <tr>
            <td><b> Mandiri - (Rupiah) <br> 130-0021-00333-3 </b></td>
            <td><b> Mandiri - (dollar) <br> -  </b></td>
          </tr>
        </table>
         </td>
      </tr>

      <tr>
        <td colspan="3" style="text-align:center;">
          <h4 style="text-align:center;font-size: 1.5em;"><b>PERNYATAAN TELAH MEMBACA PROFIL PERUSAHAAN PIALANG BERJANGKA</b></h4>
         </td>
      </tr>

      <tr>
        <td colspan="3" style="text-align:left;">
          Dengan mengisi Kolom <b>“YA”</b> dibawah Ini, saya menyatakan bahwa saya telah membaca
dan menerima informasi <b>PROFIL PERUSAHAAN PIALANG BERJANGKA</b>, mengerti dan
memahami isinya.
         </td>
      </tr>
 
      <tr>
        <td colspan="3" style="text-align:left;">Pernyataan menerima / Tidak  
           <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="aggrement_see_company_profile" name="aggrement_see_company_profile" v-model="forms.aggrement_see_company_profile" value="Ya" required>
                <label class="custom-control-label" for="aggrement_see_company_profile">Ya</label>
            </div>
            <div class="custom-control custom-radio">
              <input type="radio" class="custom-control-input" id="aggrement_see_company_profile" name="aggrement_see_company_profile" v-model="forms.aggrement_see_company_profile" value="Tidak" required>
              <label class="custom-control-label" for="aggrement_see_company_profile">Tidak</label>
            </div></td>
      </tr>

      <tr>
        <td colspan="3" style="text-align:left;">Pernyataan pada Tanggal <br>
         <b> {{this.customFormatter(currentDate)}} </b>
         </td>
        
      </tr> 



   </table>
</div>
</div>



<div class="form-group col-lg-12">
    <button class="btn btn-warning pd-x-20" type="button" @click.prevent="backLink()">Kembali</button> 
    <button class="btn btn-info pd-x-20" type="submit">Langkah 2</button> 
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
      currentDate: new Date(),
      position: 'up right',
      closeBtn: true,  
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
      forms: {id : '', user_id:'',aggrement_see_company_profile:'',status:''},
    }
  },
  watch: { 

  },
  methods: {
      
    
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
      return moment(date).format('DD-MM-YYYY');
    },
    fetchIt(){
    this.loading();
        this.idCode = this.dibalik(this.$route.params.idnya);
        axios.get('/clients-area/create-real-account/step/1/'+this.idCode).then((response) => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{ 
                if(response.data.status == 200){ 
                  if(response.data.data.status == "" || response.data.data.status == "on-progress"){
                    this.forms = response.data.data;

                  }else{
                     this.$router.push('/list-real-account/index');
                  }
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
        title: 'Lanjut langkah ke 2 ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
           var data = {id : this.idCode, user_id:this.forms.user_id,aggrement_see_company_profile:this.forms.aggrement_see_company_profile}            
            axios.post('/clients-area/post-real-account/step-1', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
                        this.success(response.data.message);
                        this.$router.push({name:'addRealAccount2', params: {idnya:this.diacak(response.data.data.id)}});
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