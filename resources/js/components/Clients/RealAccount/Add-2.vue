<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Pendaftaran Akun Real</h3>
      <h4 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">Langkah 2</h4>
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
                <p style="text-align:center;"> <b>PERNYATAAN TELAH MELAKUKAN SIMULASI <br> PERDAGANGAN BERJANGKA KOMODITI </b></p>
            </div>
            <div class="form-group col-lg-12">
                <p style="text-align:left;"> Yang mengisi formulir di bawah ini :</p>
            </div>
             
            <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="input1">Nama Lengkap <span style="color:red;">*</span></label>
                 <input v-model="forms.nama_lengkap" type="text" class="form-control" required="" aria-required="true" maxlength="255" palceholder="Nama Lengkap">
            </div>

            <div class="form-group col-lg-6">
                <label for="input1">No. Demo Acc / ID Demo Akun <span style="color:red;">*</span></label>
                 <input v-model="forms.account_number" type="text" class="form-control" required="" aria-required="true" minlength="2" maxlength="55" placeholder="ID Akun">
            </div>
            </div>

            <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="input1">Tempat Lahir<span style="color:red;">*</span></label>
                 <input v-model="forms.tempat_lahir" type="text" class="form-control" required="" aria-required="true" minlength="2" maxlength="255" placeholder="Tempat Lahir">
            </div>
            <div class="form-group col-lg-6">
                <label for="input1">Tanggal Lahir <span style="color:red;">*</span></label>
                 <datepicker v-model="forms.tanggal_lahir"  :typeable="true" :format="customFormatter" placeholder="YYYY-MM-DD"></datepicker>
            </div>

            </div>

           <div class="form-row">
            <div class="form-group col-lg-6">
                <label for="input1">Provinsi <span style="color:red;">*</span></label>
                 <input v-model="forms.provinsi" type="text" class="form-control" required="" aria-required="true">
            </div>

            <div class="form-group col-lg-6">
                <label for="input1">kota <span style="color:red;">*</span></label>
                 <input v-model="forms.kota" type="text" class="form-control" required="" aria-required="true">
            </div>
           </div>
           
            <div class="form-row">
            <div class="form-group col-lg-4">
                <label for="input1">Kecamatan <span style="color:red;">*</span></label>
                 <input v-model="forms.kecamatan" type="text" class="form-control" required="" aria-required="true">
            </div>

            <div class="form-group col-lg-4">
                <label for="input1">Kelurahan <span style="color:red;">*</span></label>
                 <input v-model="forms.kelurahan" type="text" class="form-control" required="" aria-required="true">
            </div>

            <div class="form-group col-lg-4">
                <label for="input1">Desa </label>
                 <input v-model="forms.desa" type="text" class="form-control" aria-required="true">
            </div>

            </div>

          <div class="form-row">

            <div class="form-group col-lg-6">
                <label for="input1">Kode Pos <span style="color:red;">*</span></label>
                 <input v-model="forms.kode_pos" type="text" class="form-control" minlength="2" maxlength="8" @keypress="isNumber($event)" required="" aria-required="true">
            </div>
            <div class="form-group col-lg-6">
                <label for="input1">Alamat <span style="color:red;">*</span></label>
                <textarea v-model="forms.alamat" class="form-control" aria-required="true" required></textarea>
            </div>
          </div>

          <div class="form-row">

            <div class="form-group col-lg-6">
                <label for="input1">Tipe Identitas <span style="color:red;">*</span></label>
                <select v-model="forms.tipe_identitas" class="form-control" id="tipe_identitas" required>
                    <option value="KTP">KTP</option>
                    <option value="SIM">SIM</option>
                    <option value="PASPOR">PASPOR</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
                <label for="input1">No. Identitas <span style="color:red;">*</span></label>
                 <input v-model="forms.nomor_identitas" type="text" class="form-control"minlength="2" maxlength="26" @keypress="isNumber($event)" required>
            </div>
          </div>

<div class="form-group col-lg-12">
<p>Dengan mengisi kolom <b>“YA”</b> di bawah ini, saya menyatakan bahwa saya telah melakukan simulasi bertransaksi
di bidang Perdagangan Berjangka Komoditi pada <b>PT. Rajawali Kapital Berjangka</b>, dan telah memahami
tentang tata cara bertransaksi di bidang Perdagangan Berjangka Komoditi.
</p>


<p>Demikian Pernyataan ini dibuat dengan sebenarnya dalam keadaan sadar, sehat jasmani dan rohani serta
tanpa paksaan apapun dari pihak manapun.</p>

</div>


<div class="form-group col-lg-12">
    <label for="input1">Pernyataan menerima / Tidak</label> 
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="aggrement_simulation_commodity_trade_transaction" name="aggrement_simulation_commodity_trade_transaction" v-model="forms.aggrement_simulation_commodity_trade_transaction" value="Ya" required>
            <label class="custom-control-label" for="aggrement_simulation_commodity_trade_transaction">Ya</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="aggrement_simulation_commodity_trade_transaction" name="aggrement_simulation_commodity_trade_transaction" v-model="forms.aggrement_simulation_commodity_trade_transaction" value="Tidak" required>
          <label class="custom-control-label" for="aggrement_simulation_commodity_trade_transaction">Tidak</label>
        </div>
</div>

<div class="form-group col-lg-12">
Pernyataan pada Tanggal <b> {{this.customLokalFormatter(currentDate)}} </b>
</div>
 


<div class="form-group col-lg-12">
  
    <button class="btn btn-warning pd-x-20" type="button" @click.prevent="backLink()">Kembali</button> 
    <button class="btn btn-info pd-x-20" type="submit">Langkah 3</button> 
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
      button_ya_tidak:'',
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
      forms: {id : '',nama_lengkap:'',account_number:'', tempat_lahir:'', tanggal_lahir:'', tipe_identitas:'', 
      nomor_identitas:'', aggrement_simulation_commodity_trade_transaction:'', status:'', country:'', 
      provinsi:'', kota:'', kecamatan:'', kelurahan:'', kode_pos:'', desa:'',alamat:''},
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
    customLokalFormatter(date) {
      return moment(date).format('DD-MM-YYYY');
    },
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    },
    fetchIt(){
    this.loading();
        this.idCode = this.dibalik(this.$route.params.idnya);
        axios.get('/clients-area/create-real-account/step/2/'+this.idCode).then((response) => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{ 
                if(response.data.status == 200){
                    if(response.data.data.status == 'on-progress'){
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
        title: 'Lanjut Langkah ke 3 ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            var data = {id : this.forms.id,nama_lengkap:this.forms.nama_lengkap,account_number:this.forms.account_number, 
            tempat_lahir: this.forms.tempat_lahir, tanggal_lahir:this.customFormatter(this.forms.tanggal_lahir), tipe_identitas:this.forms.tipe_identitas, 
      nomor_identitas:this.forms.nomor_identitas, aggrement_simulation_commodity_trade_transaction:this.forms.aggrement_simulation_commodity_trade_transaction, 
      status:this.forms.status, country:this.forms.country, provinsi:this.forms.provinsi, kota:this.forms.kota, 
      kecamatan:this.forms.kecamatan, kelurahan:this.forms.kelurahan, kode_pos:this.forms.kode_pos, 
      desa:this.forms.desa,alamat:this.forms.alamat};
            axios.post('/clients-area/post-real-account/step-2', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
                        this.success(response.data.message);
                        this.$router.push({name:'addRealAccount3', params: {idnya:this.diacak(response.data.data.id)}});
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