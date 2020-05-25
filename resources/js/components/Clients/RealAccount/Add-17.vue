<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Pendaftaran Akun Real</h3>
      <h4 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">Langkah 17</h4>
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
			<b>Formulir PBK. CDDS. 10</b>
                <p style="text-align:center;"> <b>VERIFIKASI KELENGKAPAN PROSES PENERIMAAN NASABAH SECARA<br>
ELEKTRONIK ONLINE DENGAN CDD SEDERHANA</b></p>
            </div>

            <div class="form-group col-lg-12">
               <table class="table table-striped table-bordered" width="100%" cellspacing="0">

<tr>
    <td width="1%"> No </td>
    <td width="40%"> FORM   </td>
    <td width="50%"> PROSES </td>
    <td width="9%"> STATUS </td>
</tr>

<tr>
    <td width="1%"> 1 </td>
    <td width="40%"> FORMULIR PBK. CDDS. 01   </td>
    <td width="50%"> PROFIL PERUSAHAAN PIALANG BERJANGKA </td>
    <td width="9%"> &#10004;  </td>
</tr>

  

<tr>
    <td width="1%"> 2 </td>
    <td width="40%"> FORMULIR PBK. CDDS. 02 </td>
    <td width="50%"> PERNYATAAN TELAH MELAKUKAN SIMULASI
PERDAGANGAN BERJANGKA ATAU PERNYATAAN TELAH
BERPENGALAMAN DALAM MELAKSANAKAN TRANSAKSI
PERDAGANGAN BERJANGKA </td>
    <td width="9%"> &#10004;  </td>
</tr>


<tr>
    <td width="1%"> 3 </td>
    <td width="40%"> FORMULIR PBK. CDDS. 03 </td>
    <td width="50%">PERNYATAAN PENGUNGKAPAN (<i>DISCLOSURE
STATEMENT</i>)</td>
    <td width="9%"> &#10004;  </td>
</tr>



<tr>
    <td width="1%"> 4 </td>
    <td width="40%"> FORMULIR PBK. CDDS. 04 </td>
    <td width="50%">APLIKASI PEMBUKAAN REKENING TRANSAKSI</td>
    <td width="9%"> &#10004;  </td>
</tr>



<tr>
    <td width="1%"> 5 </td>
    <td width="40%"> FORMULIR PBK. CDDS. 05 </td>
    <td width="50%"> DOKUMEN PEMBERITAHUAN ADANYA RISIKO </td>
    <td width="9%"> &#10004;  </td>
</tr>



<tr>
    <td width="1%"> 6 </td>
    <td width="40%"> FORMULIR PBK. CDDS. 06 </td>
    <td width="50%"> PERJANJIAN PEMBERIAN AMANAT </td>
    <td width="9%"> &#10004;  </td>
</tr>

    


<tr>
    <td width="1%"> 7 </td>
    <td width="40%"> FORMULIR PBK. CDDS. 07  </td>
    <td width="50%"> DAFTAR KONTRAK BERJANGKA, KONTRAK DERIVATIF
DAN KONTRAK DERIVATIF LAINNYA BESERTA
PERATURAN PERDAGANGAN (<i>TRADING RULES</i>)
 </td>
    <td width="9%"> &#10004;  </td>
</tr>

    



<tr>
    <td width="1%"> 8 </td>
    <td width="40%"> FORMULIR PBK. CDDS. 08   </td>
    <td width="50%"> PERNYATAAN BERTANGGUNG JAWAB ATAS KODE AKSES
TRANSAKSI NASABAH (<i>PERSONAL ACCESS PASSWORD</i>)
 </td>
    <td width="9%"> &#10004;  </td>
</tr>




<tr>
    <td width="1%"> 9 </td>
    <td width="40%"> FORMULIR PBK. CDDS. 09  </td>
    <td width="50%">PERNYATAAN BAHWA DANA YANG DIGUNAKAN
SEBAGAI MARGIN MERUPAKAN DANA MILIK NASABAH
SENDIRI
 </td>
    <td width="9%"> &#10004;  </td>
</tr>

    

               </table>
            </div>
  
 <div class="form-group col-lg-12">
	<p align="justify">Dengan mengisi kolom “YA” di bawah ini, saya menyatakan bahwa saya telah membaca dan
memahami seluruh isi dokumen yang disampaikan dalam FORMULIR PBK. CDDS. 01 sampai dengan
FORMULIR PBK. CDDS. 09.
</p>
<p align="justify">
Demikian Pernyataan ini dibuat dengan sebenarnya dalam keadaan sadar, sehat jasmani dan rohani
serta tanpa paksaan apapun dari pihak manapun.
</p>
 </div>

<div class="form-group col-lg-12">
<table class="table table-striped table-bordered" width="100%" cellspacing="0">
<tr>
    <td width="30%">Pernyataan menerima / Tidak </td>
    <td width="70%" colspan="2">
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="aggrement" name="aggrement" v-model="forms.aggrement" value="Ya" required>
            <label class="custom-control-label" for="aggrement">Ya</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="aggrement" name="aggrement" v-model="forms.aggrement" value="Tidak" required>
          <label class="custom-control-label" for="aggrement">Tidak</label>
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
    <button class="btn btn-info pd-x-20" type="submit">Langkah 18</button> 
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
      forms: {id : '', name:'', place_of_birth:'', date_of_birth:'', address:'',country:'' , province:'' , city:'', area:'', sub_area:'', village:'', postal_code:'' , type_of_identity_card:'',
      identity_card_number:'', account_number:'', aggrement:'' ,status:''},
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
        axios.get('/clients-area/create-real-account/step/17/'+this.idCode).then((response) => {
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
        title: 'Lanjut Langkah ke 18 ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
              var data = {id : this.forms.id, aggrement: this.forms.aggrement ,
              status:this.forms.status, button_ya_tidak:this.button_ya_tidak}
            axios.post('/clients-area/post-real-account/step-17', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
                        this.success(response.data.message);
                        this.$router.push({name:'addRealAccount18', params: {idnya:this.diacak(response.data.data.id)}});
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