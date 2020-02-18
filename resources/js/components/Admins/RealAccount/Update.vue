<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Perubahan Akun Real</h3>
   
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
    <h3 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">CUSTOMER BANK ACCOUNT</h3>

 <div class="form-group">
    <label class="col-sm-3 control-label text-left">Bank Name</label>
    <div class="col-sm-9"><input type="text" v-model="forms.bank_margin_name" class="form-control border-bottom" required></div>
</div>
 <div class="form-group">
    <label class="col-sm-3 control-label text-left">A/C Number</label>
    <div class="col-sm-9"><input type="text" v-model="forms.bank_margin_number" class="form-control border-bottom" required></div>
</div>

 <div class="form-group">
    <label class="col-sm-3 control-label text-left">Bank Name 2</label>
    <div class="col-sm-9"><input type="text" v-model="forms.bank_margin_name_2" class="form-control border-bottom" required></div>
</div>
 <div class="form-group">
    <label class="col-sm-3 control-label text-left">A/C Number 2</label>
    <div class="col-sm-9"><input type="text" v-model="forms.bank_margin_number_2" class="form-control border-bottom" required></div>
</div>

</div>


<div class="form-group col-lg-12">
    <h3 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">PERSONAL DATA</h3>

<div class="form-group">
    <label class="col-sm-3 control-label text-left">Name</label>
    <div class="col-sm-9"><input type="text" v-model="forms.name" class="form-control border-bottom" required></div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label text-left">Provinsi / Provinsi</label>
    <div class="col-sm-9"><input type="text" v-model="forms.province" class="form-control border-bottom" required></div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label text-left">City / Kota</label>
    <div class="col-sm-9"><input type="text" v-model="forms.city" class="form-control border-bottom" required></div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label text-left">Area / Kecamatan</label>
    <div class="col-sm-9"><input type="text" v-model="forms.area" class="form-control border-bottom" required></div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label text-left">Sub Area / Kelurahan</label>
    <div class="col-sm-9"><input type="text" v-model="forms.sub_area" class="form-control border-bottom" required></div>
</div>
<div class="form-group">
    <label class="col-sm-3 control-label text-left">Village  / Desa</label>
    <div class="col-sm-9"><input type="text" v-model="forms.village" class="form-control border-bottom"></div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label text-left">Postal Code</label>
    <div class="col-sm-9"><input type="text" v-model="forms.postal_code" class="form-control border-bottom" required></div>
</div>

<div class="form-group">
    <label class="col-sm-3 control-label text-left">Address</label>
    <div class="col-sm-9"><textarea v-model="forms.address" class="form-control border-bottom" aria-required="true" required></textarea></div>
</div>

 <div class="form-group">
    <label class="col-sm-3 control-label text-left">Identity Type</label>
    <div class="col-sm-9">
        <select v-model="forms.type_of_identity_card" class="form-control" id="type_of_identity_card" required>
            <option value="KTP">KTP</option>
            <option value="SIM">SIM</option>
            <option value="PASPOR">PASPOR</option>
        </select>
    </div>
</div>
 <div class="form-group">
    <label class="col-sm-3 control-label text-left">Identity Number</label>
    <div class="col-sm-9"><input type="text" v-model="forms.identity_card_number" class="form-control border-bottom" @keypress="isNumber($event)" required></div>
</div>

 <div class="form-group">
    <label class="col-sm-3 control-label text-left">NPWP Number</label>
    <div class="col-sm-9"><input type="text" v-model="forms.tax_number" class="form-control border-bottom" required></div>
</div>
 <div class="form-group">
    <label class="col-sm-3 control-label text-left">Mobile Number</label>
    <div class="col-sm-9"><input type="text" v-model="forms.phone" class="form-control border-bottom" required></div>
</div>
 <div class="form-group">
    <label class="col-sm-3 control-label text-left">Fax House</label>
    <div class="col-sm-9"><input type="text" v-model="forms.fax_house" class="form-control border-bottom"></div>
</div>
 <div class="form-group">
    <label class="col-sm-3 control-label text-left">Phone House</label>
    <div class="col-sm-9"><input type="text" v-model="forms.phone_house" class="form-control border-bottom"></div>
</div>

</div>



<div class="form-group col-lg-12">
    <h3 class="animated fadeInLeft" style="text-align:center;font-size: 2em;">FILES</h3>

 <table class="table table-striped table-bordered" width="100%" cellspacing="0">
    <tr>
        <td>Profile Image
                    <br>
    <div v-if="forms.image_profile">
        <a v-bind:href="url+forms.image_profile" target="_blank"><button type="button" class="btn btn-success">Download</button></a> 
        <button type="button" class="btn btn-danger" @click.prevent="DeleteFile('image_profile',forms.image_profile)">Delete File</button>
    </div>
        </td>
        <td> <input type="file" name="image_profile" class="form-control" id="image_profile" v-on:change="image_profile"></td>
    </tr>
    <tr>
        <td>Bank accounts / Credit Card Bill
                    <br>
    <div v-if="forms.image_bank">
        <a v-bind:href="url+forms.image_bank" target="_blank"><button type="button" class="btn btn-success">Download</button></a> 
        <button type="button" class="btn btn-danger" @click.prevent="DeleteFile('image_bank',forms.image_bank)">Delete File</button>
    </div>
        </td>
        <td><input type="file" name="image_bank" class="form-control" id="image_bank" v-on:change="image_bank"></td>
    </tr>
    <tr>
        <td>Electric / Phone Bill
                    <br>
    <div v-if="forms.image_electricity">
    <a v-bind:href="url+forms.image_electricity" target="_blank"><button type="button" class="btn btn-success">Download</button></a> 
    <button type="button" class="btn btn-danger" @click.prevent="DeleteFile('image_electricity',forms.image_electricity)">Delete File</button>        
    </div>
    </td>
    <td> <input type="file" name="image_electricity" class="form-control" id="image_electricity" v-on:change="image_electricity"></td>
    </tr>
    <tr>
        <td>Additional Document
                    <br>
        <div v-if="forms.image_other">
        <a v-bind:href="url+forms.image_other" target="_blank"><button type="button" class="btn btn-success">Download</button></a> 
        <button type="button" class="btn btn-danger" @click.prevent="DeleteFile('image_other',forms.image_other)">Delete File</button>
        </div>
        </td>
        <td> <input type="file" name="image_other" class="form-control" id="image_other" v-on:change="image_other"></td>
    </tr>
    <tr>
        <td>Additional Document 2
                    <br>
        <div v-if="forms.image_other_2">
        <a v-bind:href="url+forms.image_other_2" target="_blank"><button type="button" class="btn btn-success">Download</button></a> 
        <button type="button" class="btn btn-danger" @click.prevent="DeleteFile('image_other_2',forms.image_other_2)">Delete File</button>
        </div>
        </td>
        <td> <input type="file" name="image_other_2" class="form-control" id="image_other_2" v-on:change="image_other_2"></td>
    </tr>
 </table>

   


</div>


<div class="form-group col-lg-12">
     <button class="btn btn-primary pd-x-20" type="button" @click.prevent="backLink()">Back</button> 

    <button v-if="this.forms.status == 'review' || this.forms.status == 'approved'" class="btn btn-warning pd-x-20" type="button" @click.prevent="updateToOnProgress()">Set Repaired</button> 
 
    <button v-if="this.forms.status == 'review'" class="btn btn-danger pd-x-20" type="button" @click.prevent="ApprovedById()">Set Approved</button> 

    <button class="btn btn-info pd-x-20" type="submit">Update</button> 
</div>

      </div>
    </div>
  </div>
</div>
</div>
</form>


<!-- @message Modal--->
        <modal  v-if="modal.get('message')" @close="modal.set('message', false)" >
        <template slot="header" ><h4 align="center">Send Message To Customer</h4></template>
        <template slot="body" >
            <form method="POST" action="" @submit.prevent="updateToOnProgressSubmit()">
                <div class="modal-body"> 
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="message">Message Text</label>
                        <textarea v-model="message" class="form-control border-bottom" aria-required="true" required></textarea>
                        <span class="label label-danger" v-for="er of error['message']">
                        {{ error }}
                    </span>
                    </div>
						

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" @click="modal.set('message', false)" >Close</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

            </form>
        </template>
        </modal>
 
</div>
</template>

<script>

        /* --------------------------------------- CRUD MODAL -------- */
        class CrudModal{
            constructor(data){
                this.modal = data;
            }
            get(value){
                if(this.modal[value]){
                    return this.modal[value];
                }
            }
            set(data , value){
                this.modal[data] = value;
            }
        }
        /* ---  COMPONENT MODAL -------- */
        const Modal = {
            template: `   <transition name="modal">
                                <div class="modal-mask">
                                  <div class="modal-wrapper">
                                    <div :class="modalStyle">
                                    <a class="close-modal" @click="$emit('close')" ></a>
                                      <div class="modal-header">
                                           <p class="modal-card-title"><slot name="header" class="modal-card-title "></slot></p>
                                      </div>
                                        <slot name="body">
                                          default body
                                        </slot>
                                    </div>
                                  </div>
                                </div>
                              </transition>` ,
            props: {
                modalsize: {type: String},
            } ,
            computed: {
                modalStyle() {
                    return this.modalsize == null ? 'modal-container' : this.modalsize + ' modal-container';
                },
                created(){

                }
            }
        };
        
        
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
Vue.component('modal', Modal)


export default {
	    props: {
      rowDatanya: {
        type: Object,
        required: true
      },
      typenya: {
        type: String,
        required: true
      }
    },
    components: { 
        Datepicker,  
        Loading
    },
  data () {
    return { 
      isLoading: false,
	    url:'/public/client-files/',
      webURL:window.webURL,
      maxToasts: 100,
      idCode:'',
      message:'',
      button_ya_tidak:'',
      position: 'up right',
      closeBtn: true,
      currentDate:new Date(),
      modal:new CrudModal({message:false}),
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
      forms: {id : '',name : '',province : '',city : '',area : '',sub_area : '',
      village : '',address : '',postal_code : '',bank_margin_name:'',bank_margin_number:'',
      bank_margin_name_2:'',bank_margin_number_2:'',phone:'',type_of_identity_card:'',
      identity_card_number:'',tax_number:'',fax_house:'',phone_house:'',image_profile:'',
      image_bank:'',image_electricity:'',image_identity:'',image_other:'',image_other_2:'',
      status:''},
    }
  },
  watch: { 

  },
  methods: {
    
    ApprovedById(){
      this.$swal({
        title: 'Are you sure ?',
        text: 'approval real account',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            var data = {id:this.forms.id}
            axios.post('/rajawaliadmin/approval-real-account', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.forms.status = 'approved';
                        this.message = ''; 
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
                                        
              })
            }
        })
    },
    updateToOnProgress() {
      this.message = '';
      this.modal.set('message', true);
    } ,
    updateToOnProgressSubmit(){
      this.modal.set('message', false);
      this.$swal({
        title: 'are you sure ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            var data = {id: this.forms.id , status : 'on-progress' , message: this.message};
            axios.post('/rajawaliadmin/update-real-account-status', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.forms.status = 'on-progress';
                        this.message = '';
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
                                        
                        })
                    }
                })
    },

    DeleteFile(field,fileName) {
        let masuk = new FormData();
        masuk.set('id', this.forms.id)
        masuk.set('field', field)
        masuk.set('file_name', fileName)
        axios.post('/rajawaliadmin/delete-file-real-account' , masuk).then(response => {
                if(field == 'image_bank'){
                    this.forms.image_bank = '';
                }
                if(field == 'image_profile'){
                    this.forms.image_profile = '';
                }
                if(field == 'image_electricity'){
                    this.forms.image_electricity = '';
                }
                if(field == 'image_identity'){
                    this.forms.image_identity = '';
                }
                if(field == 'image_other'){
                    this.forms.image_other = '';
                }
                if(field == 'image_other_2'){
                    this.forms.image_other_2 = '';
                }
        });
    },
    uploadFile(field , fileName ){
        this.loading();
        let masuk = new FormData();
        masuk.set('id', this.forms.id)
        masuk.set('field', field)
        masuk.set('file_name', fileName)
        axios.post('/rajawaliadmin/upload-file-user-real' , masuk).then(response => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{
                if(response.data.status == 200){ 
                    if(field == 'image_bank'){
                        this.forms.image_bank = response.data.data;
                    }
                    if(field == 'image_profile'){
                        this.forms.image_profile = response.data.data;
                    }
                    if(field == 'image_electricity'){
                        this.forms.image_electricity = response.data.data;
                    }
                    if(field == 'image_identity'){
                        this.forms.image_identity = response.data.data;
                    }
                    if(field == 'image_other'){
                        this.forms.image_other = response.data.data;
                    }
                    if(field == 'image_other_2'){
                        this.forms.image_other_2 = response.data.data;
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

    image_profile(event) {
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.uploadFile('image_profile',files[0]);
                
    },
    
    image_electricity(event) {
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.uploadFile('image_electricity',files[0]);
                
    },
    
    image_bank(event) {
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.uploadFile('image_bank',files[0]);
                
    },
    
    image_other(event) {
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.uploadFile('image_other',files[0]);
                
    },

    image_other_2(event) {
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.uploadFile('image_other_2',files[0]);
                
    },

    dataAction () {
      if(this.typenya === "update-real-account"){
          this.forms = this.rowDatanya;
      }else{
			this.$router.push('/page-not-found');
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
    customLokalFormatter(date) {
      return moment(date).format('DD-MM-YYYY');
    },
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    },
    
    submitData(){
      this.$swal({
        title: 'update Data ?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            axios.post('/rajawaliadmin/update-real-account', this.forms).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                        this.errors = '';
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
    this.dataAction();
  }

}
</script>
<style> 
</style>