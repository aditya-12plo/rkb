<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Pendaftaran Akun Real</h3>
      <h4 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">Langkah 14</h4>
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
                <p style="text-align:center;"> <b>PERNYATAAN BERTANGGUNG JAWAB ATAS
KODE AKSES TRANSAKSI NASABAH (Personal Access Password)</b></p>
            </div>

            <div class="form-group col-lg-12">
               <table class="table table-striped table-bordered" width="100%" cellspacing="0">

<tr>
    <td colspan="3">
<p style="text-align:left;">Yang mengisi formulir di bawah ini:</p>
    </td>
</tr>


<tr>
    <td width="20%"> Nama Lengkap   </td>
    <td width="1%"> :   </td>
    <td width="79%"> {{this.forms.name}}   </td>
</tr>


<tr>
    <td width="20%"> Tempat/Tanggal Lahir   </td>
    <td width="1%"> :   </td>
    <td width="79%"> {{this.forms.place_of_birth}} / {{this.forms.date_of_birth}}   </td>
</tr>

<tr>
    <td width="20%"> Alamat Rumah   </td>
    <td width="1%"> :   </td>
    <td width="79%"> {{this.forms.address}} <br> 
        {{this.forms.province}} {{this.forms.city}} <br>
        {{this.forms.area}}, {{this.forms.sub_area}}, <br>
         {{this.forms.country}} <br>
        Kode Pos : {{this.forms.postal_code}}  </td>
</tr>


<tr>
    <td width="20%"> No. Identitas ({{this.forms.type_of_identity_card}})     </td>
    <td width="1%"> :   </td>
    <td width="79%"> {{this.forms.identity_card_number}}   </td>
</tr>



<tr>
    <td width="20%">No. Demo Acc. </td>
    <td width="1%"> :   </td>
    <td width="79%"> {{this.forms.account_number}}   </td>
</tr>


<tr>
    <td colspan="3">
<p style="text-align:left;">Dengan mengisi kolom “YA” di bawah ini, saya menyatakan bahwa saya bertanggungjawab sepenuhnya
terhadap kode akses transaksi Nasabah (Personal Access Password) dan tidak menyerahkan kode akses
transaksi Nasabah (Personal Access Password) ke pihak lain, terutama kepada pegawai Pialang Berjangka atau
pihak yang memiliki kepentingan dengan Pialang Berjangka.</p>
    </td>
</tr>

<tr>
    <td colspan="3">
<p style="text-align:center;"><b>PERINGATAN !!!
Pialang Berjangka, Wakil Pialang Berjangka, pegawai Pialang Berjangka, atau pihak yang memiliki
kepentingan dengan dengan Pialang Berjangka dilarang menerima kode akses transaksi Nasabah
(Personal Access Password).</b></p>
    </td>
</tr>


<tr>
    <td colspan="3">
<p style="text-align:left;">Demikian Pernyataan ini dibuat dengan sebenarnya dalam keadaan sadar, sehat jasmani dan rohani serta
tanpa paksaan apapun dari pihak manapun.</p>
    </td>
</tr>

<tr>
    <td width="30%">Pernyataan menerima / Tidak </td>
    <td width="70%" colspan="2">
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="aggrement_personal_access_password" name="aggrement_personal_access_password" v-model="forms.aggrement_personal_access_password" value="Ya" required>
            <label class="custom-control-label" for="aggrement_personal_access_password">Ya</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="aggrement_personal_access_password" name="aggrement_personal_access_password" v-model="forms.aggrement_personal_access_password" value="Tidak" required>
          <label class="custom-control-label" for="aggrement_personal_access_password">Tidak</label>
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
    <button class="btn btn-info pd-x-20" type="submit">Selesai</button> 
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
      identity_card_number:'', account_number:'', aggrement_personal_access_password:'' ,status:''},
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
        axios.get('/clients-area/create-real-account/step/14/'+this.idCode).then((response) => {
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
        title: 'Apakah anda sudah yakin dengan data yang akan di berikan ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
              var data = {id : this.forms.id, aggrement_personal_access_password: this.forms.aggrement_personal_access_password ,
              status:this.forms.status, button_ya_tidak:this.button_ya_tidak}
            axios.post('/clients-area/post-real-account/step-14', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
                        this.success(response.data.message);
                        this.$router.push({name:'addRealAccount15', params: {idnya:this.diacak(response.data.data.id)}});
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