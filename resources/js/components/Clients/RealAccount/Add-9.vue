<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Pendaftaran Akun Real</h3>
      <h4 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">Langkah 9</h4>
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
                    <td colspan="3" style="text-align:center;"><b>DOKUMEN YANG DILAMPIRKAN</b></td>
                </tr>

<tr>
    <td>Rekening Koran Bank / Tagihan Kartu Kredit <span style="color:red;">*</span>
        <br>
   <div v-if="forms.rekening_koran_bank">     
        <a v-bind:href="url+forms.rekening_koran_bank" target="_blank"><button type="button" class="btn btn-success">Download</button></a> <button type="button" class="btn btn-danger" @click.prevent="DeleteFile('rekening_koran_bank',forms.rekening_koran_bank)">Hapus File</button>
   </div>
    </td>
    <td>:</td>
    <td><input type="file" name="rekening_koran_bank" class="form-control" id="rekening_koran_bank" v-on:change="rekening_koran_bank"> </td>
</tr>

<tr>
    <td>Rekening Listrik / Telepon <span style="color:red;">*</span>
        <br>
   <div v-if="forms.rekening_listrik">     
        <a v-bind:href="url+forms.rekening_listrik" target="_blank"><button type="button" class="btn btn-success">Download</button></a> <button type="button" class="btn btn-danger" @click.prevent="DeleteFile('rekening_listrik',forms.rekening_listrik)">Hapus File</button>
   </div>

    </td>
    <td>:</td>
    <td><input type="file" name="rekening_listrik" class="form-control" id="rekening_listrik" v-on:change="rekening_listrik"> </td>
</tr>

<tr>
    <td>Tambahan dokumen lain 1 (apabila diperlukan)
        <br>
   <div v-if="forms.tambahan_dokumen">     
        <a v-bind:href="url+forms.tambahan_dokumen" target="_blank"><button type="button" class="btn btn-success">Download</button></a> <button type="button" class="btn btn-danger" @click.prevent="DeleteFile('tambahan_dokumen',forms.tambahan_dokumen)">Hapus File</button>
   </div>

    </td>
    <td>:</td>
    <td><input type="file" name="tambahan_dokumen" class="form-control" id="tambahan_dokumen" v-on:change="tambahan_dokumen"> </td>
</tr>

<tr>
    <td>Tambahan dokumen lain 2 (apabila diperlukan)
        <br>
   <div v-if="forms.tambahan_dokumen_2">     
        <a v-bind:href="url+forms.tambahan_dokumen_2" target="_blank"><button type="button" class="btn btn-success">Download</button></a> <button type="button" class="btn btn-danger" @click.prevent="DeleteFile('tambahan_dokumen_2',forms.tambahan_dokumen_2)">Hapus File</button>
   </div>

    </td>
    <td>:</td>
    <td><input type="file" name="tambahan_dokumen_2" class="form-control" id="tambahan_dokumen_2" v-on:change="tambahan_dokumen_2"> </td>
</tr>

<tr>
    <td>Foto Terkini <span style="color:red;">*</span>
        <br>
   <div v-if="forms.foto_terkini">     
        <a v-bind:href="url+forms.foto_terkini" target="_blank"><button type="button" class="btn btn-success">Download</button></a> <button type="button" class="btn btn-danger" @click.prevent="DeleteFile('foto_terkini',forms.foto_terkini)">Hapus File</button>
   </div>

    </td>
    <td>:</td>
    <td><input type="file" name="foto_terkini" class="form-control" id="foto_terkini" v-on:change="foto_terkini"> </td>
</tr>

<tr>
    <td>KTP/SIM/Passpor <span style="color:red;">*</span>
        <br>
   <div v-if="forms.scan_identitas">     
        <a v-bind:href="url+forms.scan_identitas" target="_blank"><button type="button" class="btn btn-success">Download</button></a> <button type="submit" class="btn btn-danger" @click.prevent="DeleteFile('scan_identitas',forms.scan_identitas)">Hapus File</button>
   </div>

    </td>
    <td>:</td>
    <td><input type="file" name="scan_identitas" class="form-control" id="scan_identitas" v-on:change="scan_identitas"> </td>
</tr>



               </table>
            </div>
  


<div class="form-group col-lg-12">
  
    <button class="btn btn-warning pd-x-20" type="button" @click.prevent="backLink()">Kembali</button> 
    <button class="btn btn-info pd-x-20" type="submit">Langkah 10</button> 
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
      forms: {id : '', foto_terkini:'', rekening_koran_bank:'', rekening_listrik:'', 
      scan_identitas:'',tambahan_dokumen:'',tambahan_dokumen_2:'',status:''},
    }
  },
  watch: { 

  },
  methods: {
    DeleteFile(field,fileName) {
        let masuk = new FormData();
        masuk.set('id', this.forms.id)
        masuk.set('field', field)
        masuk.set('file_name', fileName)
        axios.post('/clients-area/delete-file' , masuk).then(response => {
                if(field == 'rekening_koran_bank'){
                    this.forms.rekening_koran_bank = '';
                }
                if(field == 'foto_terkini'){
                    this.forms.foto_terkini = '';
                }
                if(field == 'rekening_listrik'){
                    this.forms.rekening_listrik = '';
                }
                if(field == 'scan_identitas'){
                    this.forms.scan_identitas = '';
                }
                if(field == 'tambahan_dokumen'){
                    this.forms.tambahan_dokumen = '';
                }
                if(field == 'tambahan_dokumen_2'){
                    this.forms.tambahan_dokumen_2 = '';
                }
        });
    },

    tambahan_dokumen_2(event) {
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.uploadFile('tambahan_dokumen_2',files[0]);
                
    },

    tambahan_dokumen(event) {
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.uploadFile('tambahan_dokumen',files[0]);
                
    },

    scan_identitas(event) {
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.uploadFile('scan_identitas',files[0]);
                
    },

    rekening_listrik(event) {
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.uploadFile('rekening_listrik',files[0]);
                
    },

    rekening_koran_bank(event) {
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) {
            // this.forms.rekening_koran_bank = files[0];
            this.uploadFile('rekening_koran_bank',files[0]);
        }
                
    },
    
    foto_terkini(event) {
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.uploadFile('foto_terkini',files[0]);
                
    },

    uploadFile(field , fileName ){
        this.loading();
        let masuk = new FormData();
        masuk.set('id', this.forms.id)
        masuk.set('field', field)
        masuk.set('file_name', fileName)
        axios.post('/clients-area/upload-file' , masuk).then(response => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{
                if(response.data.status == 200){ 
                    if(field == 'rekening_koran_bank'){
                        this.forms.rekening_koran_bank = response.data.data;
                    }
                    if(field == 'foto_terkini'){
                        this.forms.foto_terkini = response.data.data;
                    }
                    if(field == 'rekening_listrik'){
                        this.forms.rekening_listrik = response.data.data;
                    }
                    if(field == 'scan_identitas'){
                        this.forms.scan_identitas = response.data.data;
                    }
                    if(field == 'tambahan_dokumen'){
                        this.forms.tambahan_dokumen = response.data.data;
                    }
                    if(field == 'tambahan_dokumen_2'){
                        this.forms.tambahan_dokumen_2 = response.data.data;
                    }


                     this.success(response.data.message);
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
                                        
                        });

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
        axios.get('/clients-area/create-real-account/step/9/'+this.idCode).then((response) => {
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
        title: 'Lanjut Langkah ke 10 ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            var data = {id : this.forms.id, status:this.forms.status};
            axios.post('/clients-area/post-real-account/step-9', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
                        this.success(response.data.message);
                        this.$router.push({name:'addRealAccount10', params: {idnya:this.diacak(response.data.data.id)}});
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