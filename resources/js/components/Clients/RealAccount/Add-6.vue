<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Pendaftaran Akun Real</h3>
      <h4 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">Langkah 6</h4>
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
                <p style="text-align:center;"> <b>APLIKASI PEMBUKAAN REKENING TRANSAKSI<br> SECARA ELEKTRONIK ON-LINE</b></p>
            </div>

            <div class="form-group col-lg-12">
               <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                 <tr>
                    <td colspan="3" style="text-align:center;"><b>PEKERJAAN</b></td>
                </tr>
<tr>
    <td>Pekerjaan <span style="color:red;">*</span></td>
    <td>:</td>
    <td>
        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="pekerjaan" name="pekerjaan" v-model="forms.pekerjaan" value="Swasta" :checked="forms.pekerjaan=='Swasta'" required>
            <label class="custom-control-label" for="pekerjaan">Pegawai Swasta</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="pekerjaan" name="pekerjaan" v-model="forms.pekerjaan" value="Wiraswasta" :checked="forms.pekerjaan=='Wiraswasta'" required>
          <label class="custom-control-label" for="pekerjaan">Wiraswasta</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="pekerjaan" name="pekerjaan" v-model="forms.pekerjaan" value="Ibu RT" :checked="forms.pekerjaan=='Ibu RT'" required>
          <label class="custom-control-label" for="pekerjaan">Ibu RT</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="pekerjaan" name="pekerjaan" v-model="forms.pekerjaan" value="Profesional" :checked="forms.pekerjaan=='Profesional'" required>
          <label class="custom-control-label" for="pekerjaan">Profesional</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="pekerjaan" name="pekerjaan" v-model="forms.pekerjaan" value="Pegawai Negeri" :checked="forms.pekerjaan=='Pegawai Negeri'" required>
          <label class="custom-control-label" for="pekerjaan">Pegawai Negeri</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="pekerjaan" name="pekerjaan" v-model="forms.pekerjaan" value="Mahasiswa" :checked="forms.pekerjaan=='Mahasiswa'" required>
          <label class="custom-control-label" for="pekerjaan">Mahasiswa</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" class="custom-control-input" id="pekerjaan" name="pekerjaan" v-model="forms.pekerjaan" value="Lainnya" :checked="forms.pekerjaan=='Lainnya'" required>
          <label class="custom-control-label" for="pekerjaan">Lainnya</label>
          <div v-if="this.checkPekerjaanStatus(this.forms.pekerjaan)">
          <input v-model="pekerjaan_others" type="text" class="form-control" required="" aria-required="true">
          </div>
        </div>
      
    </td>
</tr>
<tr>
    <td>Nama Perusahaan <span style="color:red;">*</span></td>
    <td>:</td>
    <td><input v-model="forms.nama_perusahaan" type="text" class="form-control"></td>
</tr>
<tr>
    <td>Bidang Usaha <span style="color:red;">*</span></td>
    <td>:</td>
    <td><input v-model="forms.bidang_usaha" type="text" class="form-control"></td>
</tr>
<tr>
    <td>Jabatan <span style="color:red;">*</span></td>
    <td>:</td>
    <td><input v-model="forms.jabatan" type="text" class="form-control"></td>
</tr>
<tr>
    <td>Lama Bekerja <span style="color:red;">*</span></td>
    <td>:</td>
    <td><input v-model="forms.lama_bekerja" type="text" minlength="1" maxlength="2" class="form-control" @keypress="isNumber($event)" required></td>
</tr>
<tr>
    <td>Kantor Sebelumnya <span style="color:red;">*</span></td>
    <td>:</td>
    <td><input v-model="forms.kantor_sebelumnya" type="text" minlength="1" maxlength="2" class="form-control" @keypress="isNumber($event)" required></td>
</tr>
<tr>
    <td>Alamat Kantor <span style="color:red;">*</span></td>
    <td>:</td>
    <td>
      <textarea v-model="forms.alamat_kantor" class="form-control" aria-required="true" required></textarea>
      </td>
</tr>
<tr>
    <td>Kode Pos <span style="color:red;">*</span></td>
    <td>:</td>
    <td><input v-model="forms.kode_pos" type="text" minlength="2" maxlength="8" class="form-control" @keypress="isNumber($event)" required></td>
</tr>
<tr>
    <td>No. Telp Kantor <span style="color:red;">*</span></td>
    <td>:</td>
    <td><input v-model="forms.no_telp_kantor" type="text" minlength="2" maxlength="15" class="form-control" @keypress="isNumber($event)" required></td>
</tr>
<tr>
    <td>No. Faksimili</td>
    <td>:</td>
    <td><input v-model="forms.no_faksimili" type="text" minlength="2" maxlength="15" class="form-control" @keypress="isNumber($event)"></td>
</tr>

               </table>
            </div>
  


<div class="form-group col-lg-12">
  
    <button class="btn btn-warning pd-x-20" type="button" @click.prevent="backLink()">Kembali</button> 
    <button class="btn btn-info pd-x-20" type="submit">Langkah 7</button> 
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
      house_status_others:'',
      pekerjaan_others:'',
      investment_experience_others:'',
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
      forms: {id : '', pekerjaan:'', nama_perusahaan:'', bidang_usaha:'', jabatan:'',
      lama_bekerja:'', kantor_sebelumnya:'',alamat_kantor:'',kode_pos:'',no_telp_kantor:'',no_faksimili:'', status:''},
    }
  },
  watch: { 

  },
  methods: {

    checkPekerjaanStatus(stts){
      if(stts == 'Swasta'){
        return false;
      }else if(stts == 'Wiraswasta'){
        return false;
      }else if(stts == 'Ibu RT'){
        return false;
      }else if(stts == 'Profesional'){
        return false;
      }else if(stts == 'Pegawai Negeri'){
        return false;
      }else if(stts == 'Mahasiswa'){
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
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    },
    fetchIt(){
    this.loading();
        this.idCode = this.dibalik(this.$route.params.idnya);
        axios.get('/clients-area/create-real-account/step/6/'+this.idCode).then((response) => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{ 
                if(response.data.status == 200){ 
                    this.forms = response.data.data;
                    if(this.checkPekerjaanStatus(response.data.data.pekerjaan)){
                      this.pekerjaan_others = response.data.data.pekerjaan;
                      this.forms.pekerjaan = 'Lainnya';
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
        title: 'Lanjut Langkah ke 7 ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            var data = {id : this.forms.id, pekerjaan:this.forms.pekerjaan, nama_perusahaan:this.forms.nama_perusahaan, bidang_usaha:this.forms.bidang_usaha, jabatan:this.forms.jabatan,
      lama_bekerja:this.forms.lama_bekerja, kantor_sebelumnya:this.forms.kantor_sebelumnya,alamat_kantor:this.forms.alamat_kantor,kode_pos:this.forms.kode_pos,
      no_telp_kantor:this.forms.no_telp_kantor,no_faksimili:this.forms.no_faksimili, status:this.forms.status,pekerjaan_others:this.pekerjaan_others};
            axios.post('/clients-area/post-real-account/step-6',data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
                        this.success(response.data.message);
                        this.$router.push({name:'addRealAccount7', params: {idnya:this.diacak(response.data.data.id)}});
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