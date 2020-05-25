asda<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Pendaftaran Akun Real</h3>
      <h4 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">Langkah 5</h4>
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
			<b>FORMULIR PBK. CDDS. 04</b>
                <p style="text-align:center;"> <b>APLIKASI PEMBUKAAN REKENING TRANSAKSI<br> SECARA ELEKTRONIK ON-LINE</b></p>
            </div>

            <div class="form-group col-lg-12">
               <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <tr>
    <td colspan="3" style="text-align:center;"><b>DATA PRIBADI</b></td>
</tr>
<tr>
    <td width="30%">Nama Lengkap</td>
    <td width="2%">:</td>
    <td width="68%">{{this.forms.name}}</td>
</tr>
<tr>
    <td>Tempat Lahir / Tanggal Lahir</td>
    <td>:</td>
    <td>{{this.forms.place_of_birth}} / {{this.forms.date_of_birth}}</td>
</tr>
<tr>
    <td>Alamat</td>
    <td>:</td>
    <td>{{this.forms.address}} <br> 
        {{this.forms.province}} {{this.forms.city}} <br>
        {{this.forms.area}}, {{this.forms.sub_area}},<br>
        {{this.forms.country}} <br>
        Postal Kode : {{this.forms.postal_code}}
    </td>
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
<tr>
    <td>No. NPWP <span style="color:red;">*</span></td>
    <td>:</td>
    <td><input v-model="forms.no_npwp" type="text" class="form-control" required="" aria-required="true"></td>
</tr>
<tr>
    <td>Jenis Kelamin <span style="color:red;">*</span></td>
    <td>:</td>
    <td>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="gander" name="gander" v-model="forms.gander" value="Laki-laki" :checked="forms.gander=='Laki-laki'" required>
            <label class="custom-control-label" for="gander">Laki-laki</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="gander" name="gander" v-model="forms.gander" value="Perempuan" :checked="forms.gander=='Perempuan'" required>
          <label class="custom-control-label" for="gander">Perempuan</label>
        </div>      
    </td>
</tr>
<tr>
    <td>Status Perkawinan <span style="color:red;">*</span></td>
    <td>:</td>
    <td>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="marital_status" name="marital_status" v-model="forms.marital_status" value="Tidak Kawin" :checked="forms.marital_status=='Tidak Kawin'" required>
            <label class="custom-control-label" for="marital_status">Tidak Kawin</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="marital_status" name="marital_status" v-model="forms.marital_status" value="Kawin" :checked="forms.marital_status=='Kawin'" required>
          <label class="custom-control-label" for="marital_status">Kawin</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="marital_status" name="marital_status" v-model="forms.marital_status" value="Janda" :checked="forms.marital_status=='Janda'" required>
          <label class="custom-control-label" for="marital_status">Janda</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="marital_status" name="marital_status" v-model="forms.marital_status" value="Duda" :checked="forms.marital_status=='Duda'" required>
          <label class="custom-control-label" for="marital_status">Duda</label>
        </div>
    </td>
</tr>
<tr>
    <td>Nama Istri/Suami</td>
    <td>:</td>
    <td><input v-model="forms.nama_suami_atau_istri" type="text" class="form-control"></td>
</tr>
<tr>
    <td>Nama Ibu Kandung <span style="color:red;">*</span></td>
    <td>:</td>
    <td><input v-model="forms.mother_name" type="text" class="form-control" required="" aria-required="true"></td>
</tr>
<tr>
    <td>No. Telp Rumah</td>
    <td>:</td>
    <td><input v-model="forms.phone_house" type="text" minlength="2" maxlength="15" class="form-control" @keypress="isNumber($event)"></td>
</tr>
<tr>
    <td>No. Faksimili Rumah</td>
    <td>:</td>
    <td><input v-model="forms.fax_house" type="text" minlength="2" maxlength="15" class="form-control" @keypress="isNumber($event)"></td>
</tr>
<tr>
    <td>No. Telp Handphone <span style="color:red;">*</span></td>
    <td>:</td>
    <td><input v-model="forms.no_handphone" type="text" minlength="2" maxlength="15" class="form-control" @keypress="isNumber($event)" aria-required="true" required></td>
</tr>
<tr>
    <td>Status Kepemilikan Rumah <span style="color:red;">*</span></td>
    <td>:</td>
    <td>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="house_status" name="house_status" v-model="forms.house_status" value="Pribadi" :checked="forms.house_status=='Pribadi'" required>
            <label class="custom-control-label" for="house_status">Pribadi</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="house_status" name="house_status" v-model="forms.house_status" value="Keluarga" :checked="forms.house_status=='Keluarga'" required>
          <label class="custom-control-label" for="house_status">Keluarga</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="house_status" name="house_status" v-model="forms.house_status" value="Sewa/Kontrak" :checked="forms.house_status=='Sewa/Kontrak'" required>
          <label class="custom-control-label" for="house_status">Sewa/Kontrak</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="house_status" name="house_status" v-model="forms.house_status" value="Lainnya" :checked="forms.house_status=='Lainnya'" required>
          <label class="custom-control-label" for="house_status">Lainnya</label>
          <div v-if="this.checkHouseStatus(this.forms.house_status)">
          <input v-model="house_status_lainnya" type="text" class="form-control" required="" aria-required="true">
          </div>
        </div>
    </td>
</tr>
<tr>
    <td>Tujuan Pembukaan Rekening <span style="color:red;">*</span></td>
    <td>:</td>
    <td>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="purpose_open_account" name="purpose_open_account" v-model="forms.purpose_open_account" value="Lindung Nilai" :checked="forms.purpose_open_account=='Lindung Nilai'" required>
            <label class="custom-control-label" for="purpose_open_account">Lindung Nilai</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="purpose_open_account" name="purpose_open_account" v-model="forms.purpose_open_account" value="Gain" :checked="forms.purpose_open_account=='Gain'" required>
          <label class="custom-control-label" for="purpose_open_account">Gain</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="purpose_open_account" name="purpose_open_account" v-model="forms.purpose_open_account" value="Spekulasi" :checked="forms.purpose_open_account=='Spekulasi'" required>
          <label class="custom-control-label" for="purpose_open_account">Spekulasi</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="purpose_open_account" name="purpose_open_account" v-model="forms.purpose_open_account" value="Lainnya" :checked="forms.purpose_open_account=='Lainnya'" required>
          <label class="custom-control-label" for="purpose_open_account">Lainnya</label>
          <div v-if="this.checkPurposeStatus(this.forms.purpose_open_account)">
          <input v-model="purpose_open_account_lainnya" type="text" class="form-control" required="" aria-required="true">
          </div>
        </div>
    </td>
</tr>
<tr>
    <td>Pengalaman Investasi <span style="color:red;">*</span></td>
    <td>:</td>
    <td>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="investment_experience" name="investment_experience" v-model="forms.investment_experience" value="Ya" :checked="forms.investment_experience=='Ya'" required>
          <label class="custom-control-label" for="investment_experience">Ya</label>
          <div v-if="this.checkExperienceStatus(this.forms.investment_experience)">
          <input v-model="investment_experience_lainnya" type="text" class="form-control" required="" aria-required="true">
          </div>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="investment_experience" name="investment_experience" v-model="forms.investment_experience" value="Tidak" :checked="forms.investment_experience=='Tidak'" required>
            <label class="custom-control-label" for="investment_experience">Tidak</label>
        </div>
    </td>
</tr>
<tr>
    <td>Apakah Anda memiliki anggota keluarga yang bekerja di BAPPEBTI/Bursa Berjangka/ Kliring
Berjangka ? <span style="color:red;">*</span></td>
    <td>:</td>
    <td>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="bappebti_family" name="bappebti_family" v-model="forms.bappebti_family" value="Ya" :checked="forms.bappebti_family=='Ya'" required>
          <label class="custom-control-label" for="bappebti_family">Ya</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="bappebti_family" name="bappebti_family" v-model="forms.bappebti_family" value="Tidak" :checked="forms.bappebti_family=='Tidak'" required>
            <label class="custom-control-label" for="bappebti_family">Tidak</label>
        </div>
    </td>
</tr>
<tr>
    <td>Apakah Anda telah dinyatakan pailit oleh Pengadilan ? <span style="color:red;">*</span></td>
    <td>:</td>
    <td>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="bankruptcy_by_court" name="bankruptcy_by_court" v-model="forms.bankruptcy_by_court" value="Ya" :checked="forms.bankruptcy_by_court=='Ya'" required>
          <label class="custom-control-label" for="bankruptcy_by_court">Ya</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="bankruptcy_by_court" name="bankruptcy_by_court" v-model="forms.bankruptcy_by_court" value="Tidak" :checked="forms.bankruptcy_by_court=='Tidak'" required>
            <label class="custom-control-label" for="bankruptcy_by_court">Tidak</label>
        </div>
    </td>
</tr>
               </table>
            </div>
  


<div class="form-group col-lg-12">
		<p style="text-align: left;font-size: 10px;">
		*) Wajib diisi<br>
**) Isi sesuai dengan nama Pialang Berjangka tempat pernah melakukan transaksi Perdagangan
Berjangka sebelum ini<br>
***) Dalam hal Nasabah belum cakap hukum, maka Nasabah wajib membuat Surat Pernyataan di
atas bermaterai cukup yang isinya menerangkan bahwa orang tua/wali Nasabah yang
bersangkutan menyetujui Nasabah untuk bertransaksi di bidang Perdagangan Berjangka. Surat 
		</p>
</div>

<div class="form-group col-lg-12">
  
    <button class="btn btn-warning pd-x-20" type="button" @click.prevent="backLink()">Kembali</button> 
    <button class="btn btn-info pd-x-20" type="submit">Langkah 6</button> 
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
      forms: {id : '', name:'', place_of_birth:'', date_of_birth:'', 
      type_of_identity_card:'', identity_card_number:'', no_npwp:'',gander:'',
      marital_status:'', nama_suami_atau_istri:'', mother_name:'', postal_code:'', country:'',province:'',city:'',
      area:'',sub_area:'',village:'', address:'', no_handphone:'', phone_house:'', fax_house:'', house_status:'',
      purpose_open_account:'',investment_experience:'' , bappebti_family:'', bankruptcy_by_court:'', status:''},
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
        axios.get('/clients-area/create-real-account/step/5/'+this.idCode).then((response) => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{ 
                if(response.data.status == 200){ 
                    this.forms = response.data.data;
                    if(this.checkHouseStatus(response.data.data.house_status)){
                      this.house_status_lainnya = response.data.data.house_status;
                      this.forms.house_status = 'Lainnya';
                    }
                    
                    if(this.checkPurposeStatus(response.data.data.purpose_open_account)){
                      this.purpose_open_account_lainnya = response.data.data.purpose_open_account;
                      this.forms.purpose_open_account = 'Lainnya';
                    }

                    if(this.checkExperienceStatus(response.data.data.investment_experience)){
                      this.investment_experience_lainnya = response.data.data.investment_experience;
                      this.forms.investment_experience = 'Ya';
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
        title: 'Lanjut Langkah ke 6 ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            var data = {id:this.forms.id , name: this.forms.name , place_of_birth:this.forms.place_of_birth, 
            date_of_birth:this.forms.date_of_birth, type_of_identity_card:this.forms.type_of_identity_card,
            identity_card_number:this.forms.identity_card_number , no_npwp:this.forms.no_npwp,
            gander:this.forms.gander , marital_status:this.forms.marital_status,nama_suami_atau_istri:this.forms.nama_suami_atau_istri,
            mother_name:this.forms.mother_name, postal_code:this.forms.postal_code,address:this.forms.address,
            no_handphone:this.forms.no_handphone, phone_house:this.forms.phone_house, fax_house:this.forms.fax_house,
            house_status:this.forms.house_status, purpose_open_account:this.forms.purpose_open_account, 
            investment_experience:this.forms.investment_experience , bappebti_family:this.forms.bappebti_family,
            bankruptcy_by_court:this.forms.bankruptcy_by_court, status:this.forms.status,
            house_status_lainnya:this.house_status_lainnya , purpose_open_account_lainnya:this.purpose_open_account_lainnya,
            investment_experience_lainnya:this.investment_experience_lainnya, bappebti_family_others:this.bappebti_family_others,
            bankruptcy_by_court_others:this.bankruptcy_by_court_others};
            axios.post('/clients-area/post-real-account/step-5', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
                        this.success(response.data.message);
                        this.$router.push({name:'addRealAccount6', params: {idnya:this.diacak(response.data.data.id)}});
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