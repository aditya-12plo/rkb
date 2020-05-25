<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Pendaftaran Akun Real</h3>
      <h4 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">Langkah 4</h4>
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
                <p style="text-align:left;"> <b>FORMULIR PKB. CDDS. 03</b></p>
                <p style="text-align:center;"> <b>PERNYATAAN PENGUNGKAPAN <br>
			(DISCLOSURE STATEMENT)</b></p>
            </div>

            <div class="form-group col-lg-12">
               <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <tr>
    <td colspan="3" style="text-align:center;"> 
	<ol>
					<li>Perdagangan Berjangka BERISIKO SANGAT TINGGI tidak cocok untuk semua orang. Pastikan bahwa
anda SEPENUHNYA MEMAHAMI RISIKO ini sebelum melakukan perdagangan.<br><br></li>
<li>Perdagangan Berjangka merupakan produk keuangan dengan leverage dan dapat menyebabkan
KERUGIAN ANDA MELEBIHI setoran awal Anda. Anda harus siap apabila SELURUH DANA ANDA HABIS.<br><br></li>
<li>TIDAK ADA PENDAPATAN TETAP (<i>FIXED INCOME</i>) dalam Perdagangan Berjangka.</li>
<li>Apabila anda PEMULA kami sarankan untuk mempelajari mekanisme transaksinya, PERDAGANGAN BERJANGKA membutuhkan pengetahuan dan pemahaman khusus.
<br><br>
</li>
<li>ANDA HARUS MELAKUKAN TRANSAKSI SENDIRI, segala risiko yang akan timbul akibat transaksi
sepenuhnya akan menjadi tanggung jawab Saudara.<br><br></li>
<li><i>User id</i> dan <i>password</i> BERSIFAT PRIBADI DAN RAHASIA, anda bertanggung jawab atas
penggunaannya, JANGAN SERAHKAN ke pihak lain terutama Wakil Pialang Berjangka dan pegawai
Pialang Berjangka.<br><br></li>
<li>ANDA berhak menerima LAPORAN ATAS TRANSAKSI yang anda lakukan. Waktu anda 2 X 24 JAM
UNTUK MEMBERIKAN SANGGAHAN. Untuk transaksi yang TELAH SELESAI (<i>DONE</i>/<i>SETTLE</i>) DAPAT
ANDA CEK melalui ystem informasi transaksi nasabah yang berfungsi untuk memastikan transaksi
anda telah terdaftar di Lembaga Kliring Berjangka.<br><br>
</li>
				</ol>
    </td>
</tr>
               </table>
            </div>
  
<div class="form-group col-lg-12">
			<br> 
<p style="text-align: center;"> <b>
SECARA DETAIL BACA DOKUMEN PEMBERITAHUAN ADANYA RISIKO DAN <br>
DOKUMEN PERJANJIAN PEMBERIAN AMANAT
</b>
</p>

</div>


<div class="form-group col-lg-12">
    <label for="input1">Pernyataan menerima / Tidak</label> 
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="disclosure_statement" name="disclosure_statement" v-model="forms.disclosure_statement" value="Ya" required>
            <label class="custom-control-label" for="disclosure_statement">Ya</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="disclosure_statement" name="disclosure_statement" v-model="forms.disclosure_statement" value="Tidak" required>
          <label class="custom-control-label" for="disclosure_statement">Tidak</label>
        </div>
</div>

<div class="form-group col-lg-12">
Pernyataan pada Tanggal <b> {{this.customLokalFormatter(currentDate)}} </b>
</div>

<div class="form-group col-lg-12">
  
    <button class="btn btn-warning pd-x-20" type="button" @click.prevent="backLink()">Kembali</button> 
    <button class="btn btn-info pd-x-20" type="submit">Langkah 5</button> 
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
      position: 'up right',
      closeBtn: true,
      house_status_lainnya:'',
      purpose_open_account_lainnya:'',
      investment_experience_lainnya:'',
      bappebti_family_others:'',
      bankruptcy_by_court_others:'',
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
      forms: {id : '', disclosure_statement:'', status:''},
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
        axios.get('/clients-area/create-real-account/step/4/'+this.idCode).then((response) => {
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

    checkHouseStatus(stts){
      if(stts == 'Pribadi'){
        return false;
      }else if(stts == 'Keluarga'){
        return false;
      }else if(stts == 'Sewa/Kontrak'){
        return false;
      }else{
        return true;
      }
    },

    checkPurposeStatus(stts){
      if(stts == 'Lindung Nilai'){
        return false;
      }else if(stts == 'Gain'){
        return false;
      }else if(stts == 'Spekulasi'){
        return false;
      }else{
        return true;
      }
    },

    checkExperienceStatus(stts){
      if(stts == 'Tidak'){
        return false;
      }else{
        return true;
      }
    },

    checkBappebtiStatus(stts){
      if(stts == 'Tidak'){
        return false;
      }else{
        return true;
      }
    },

    submitData(){
      this.$swal({
        title: 'Lanjut Langkah ke 5 ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            var data = {id:this.forms.id , disclosure_statement: this.forms.disclosure_statement};
            axios.post('/clients-area/post-real-account/step-4', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
                        this.success(response.data.message);
                        this.$router.push({name:'addRealAccount5', params: {idnya:this.diacak(response.data.data.id)}});
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