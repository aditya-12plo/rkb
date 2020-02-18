<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Pendaftaran Akun Real</h3>
      <h4 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">Langkah 3</h4>
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
                <p style="text-align:center;"> <b>SURAT PERNYATAAN TELAH BERPENGALAMAN <br> MELAKSANAKAN TRANSAKSI PERDAGANGAN BERJANGKA KOMODITI </b></p>
            </div>
            <div class="form-group col-lg-12">
                <p style="text-align:left;"> Yang mengisi formulir di bawah ini :</p>
            </div>

            <div class="form-group col-lg-12">
               <table class="table table-striped table-bordered" width="100%" cellspacing="0">
<tr>
    <td width="30%">Nama Lengkap</td>
    <td width="2%">:</td>
    <td width="68%">{{this.forms.name}}</td>
</tr>
<tr>
    <td>ID Akun</td>
    <td>:</td>
    <td>{{this.forms.account_number}}</td>
</tr>
<tr>
    <td>Tempat Lahir / Tanggal Lahir</td>
    <td>:</td>
    <td>{{this.forms.place_of_birth}} / {{this.forms.date_of_birth}}</td>
</tr>
<tr>
    <td>Negara</td>
    <td>:</td>
    <td>{{this.forms.country}}</td>
</tr>
<tr>
    <td>Provinsi</td>
    <td>:</td>
    <td>{{this.forms.province}}</td>
</tr>
<tr>
    <td>Kota</td>
    <td>:</td>
    <td>{{this.forms.city}}</td>
</tr>
<tr>
    <td>Kecamatan</td>
    <td>:</td>
    <td>{{this.forms.area}}</td>
</tr>
<tr>
    <td>Kelurahan</td>
    <td>:</td>
    <td>{{this.forms.sub_area}}</td>
</tr>
<tr>
    <td>Desa</td>
    <td>:</td>
    <td>{{this.forms.village}}</td>
</tr>
<tr>
    <td>Postal Kode</td>
    <td>:</td>
    <td>{{this.forms.postal_code}}</td>
</tr>
<tr>
    <td>Alamat</td>
    <td>:</td>
    <td>{{this.forms.address}}</td>
</tr>
<tr>
    <td>Tipe Identitas</td>
    <td>:</td>
    <td>{{this.forms.type_of_identity_card}}</td>
</tr>
<tr>
    <td>No. Identitas</td>
    <td>:</td>
    <td>{{this.forms.identity_card_number}}</td>
</tr>
               </table>
            </div>
  
 
<div class="form-group col-lg-12">
<p>Dengan mengisi kolom <b>“YA”</b> di bawah ini, saya menyatakan bahwa saya telah memiliki pengalaman yang
mencukupi dalam melaksanakan transaksi Perdagangan Berjangka karena pernah bertransaksi pada
Perusahaan Pialang Berjangka <input v-model="forms.name_implementing_commodity_trade_transaction" type="text" class="form-control" required="" aria-required="true" placeholder="Tempat pernah melakukan transaksi Perdagangan Berjangka sebelum ini">, dan telah memahami tentang tata cara bertransaksi Perdagangan
Berjangka.</p>

<p>Demikian Pernyataan ini dibuat dengan sebenarnya dalam keadaan sadar, sehat jasmani dan rohani serta
tanpa paksaan apapun dari pihak manapun.</p>

</div>


<div class="form-group col-lg-12">
    <label for="input1">Pernyataan menerima / Tidak</label> 
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="aggrement_implementing_commodity_trade_transaction" name="aggrement_implementing_commodity_trade_transaction" v-model="forms.aggrement_implementing_commodity_trade_transaction" value="Ya" required>
            <label class="custom-control-label" for="aggrement_implementing_commodity_trade_transaction">Ya</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="aggrement_implementing_commodity_trade_transaction" name="aggrement_implementing_commodity_trade_transaction" v-model="forms.aggrement_implementing_commodity_trade_transaction" value="Tidak" required>
          <label class="custom-control-label" for="aggrement_implementing_commodity_trade_transaction">Tidak</label>
        </div>
</div>

<div class="form-group col-lg-12">
Pernyataan pada Tanggal <b> {{this.customFormatter(currentDate)}} </b>
</div>
 


<div class="form-group col-lg-12">
  
    <button class="btn btn-warning pd-x-20" type="button" @click.prevent="backLink()">Kembali</button> 
    <button class="btn btn-info pd-x-20" type="submit">Langkah 4</button> 
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
      forms: {id : '',account_number:'', place_of_birth:'', date_of_birth:'', type_of_identity_card:'', identity_card_number:'', aggrement_implementing_commodity_trade_transaction:'', status:'', country:'', province:'', city:'', area:'', sub_area:'', postal_code:'', village:'',address:''},
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
      return moment(date).format('YYYY-MM-DD');
    },
    fetchIt(){
    this.loading();
        this.idCode = this.dibalik(this.$route.params.idnya);
        axios.get('/clients-area/create-real-account/step/3/'+this.idCode).then((response) => {
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
        title: 'Lanjut Langkah ke 4 ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            axios.post('/clients-area/post-real-account/step-3', this.forms).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
                        this.success(response.data.message);
                        this.$router.push({name:'addRealAccount4', params: {idnya:this.diacak(response.data.data.id)}});
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