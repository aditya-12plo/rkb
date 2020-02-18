<template>
<div> 
<loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Perubahan Detail Kontak</h3>
    </div>
  </div>
</div>


<form @submit.prevent="submitData" method="POST"> 
<div class="col-md-12 padding-0">
  <div class="panel form-element-padding">
  <div class="panel-body" style="padding-bottom:30px;">

 
    
            <div class="form-group col-lg-12">
                <label for="input1">Negara <span style="color:red;">*</span></label>
                <select class="form-control" v-model="forms.country" required="" aria-required="true">
                   <option v-for="(ctr, index) in countrys" :value="ctr.country">{{ ctr.country }}</option>
                </select> 
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">Provinsi <span style="color:red;">*</span></label>
                 <input v-model="forms.province" type="text" class="form-control" required="" aria-required="true">
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">kota <span style="color:red;">*</span></label>
                 <input v-model="forms.city" type="text" class="form-control" required="" aria-required="true">
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">Kecamatan</label>
                 <input v-model="forms.area" type="text" class="form-control" required="">
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">Kelurahan</label>
                 <input v-model="forms.sub_area" type="text" class="form-control">
            </div>


            <div class="form-group col-lg-12">
                <label for="input1">Postal Kode</label>
                 <input v-model="forms.postal_code" type="text" class="form-control"minlength="2" maxlength="6" @keypress="isNumber($event)">
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">Desa</label>
                 <input v-model="forms.village" type="text" class="form-control">
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">Alamat Lengkap <span style="color:red;">*</span></label>
                <textarea v-model="forms.address" class="form-control" aria-required="true"></textarea>
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">Waktu Perubahan Pertama : {{this.formatDate(forms.created_at)}}</label>
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">Waktu Perubahan terakhir : {{this.formatDate(forms.updated_at)}}</label>
            </div>

<div class="form-group col-lg-12">
          <button class="btn btn-info pd-x-20" type="submit">Simpan</button> 
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
import VueEvents from 'vue-events'
import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css'


Vue.use(VueSweetalert2)
Vue.use(Loading)
Vue.use(VueEvents)


export default {
  components: { 
    Loading
  },
  data () {
    return { 
      isLoading: false,
      webURL:window.webURL,
      maxToasts: 100,
      position: 'up right',
      closeBtn: true,  
      errors: [],
      countrys:[],
      forms: {id : '', phone:'', user_id:'', country:'', province:'', city:'', area:'', sub_area:'', postal_code:'', village:'', address:'', created_at:'', updated_at:''},
    }
  },
  watch: { 

  },
  methods: {
    fetchIt(){
    this.loading();
        axios.get('/clients-area/get-user-detail').then((response) => {
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
    getCountry(){
        axios.get('/get-json-country').then((response) => {
             this.countrys = response.data.data;
        });
    },
    submitData(){
      this.$swal({
        title: 'Are you sure ?',
        text: 'change detail contact',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            var data = {id :this.forms.id, phone:this.forms.phone, user_id:this.forms.user_id, country:this.forms.country, province:this.forms.province, city:this.forms.city, area:this.forms.area, sub_area:this.forms.sub_area, postal_code:this.forms.postal_code, village:this.forms.village, address:this.forms.address};
            axios.post('/clients-area/post-user-detail', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){ 
                                    this.errors = '';
                                    this.forms = response.data.data;
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
        this.fetchIt(); 
        this.getCountry(); 
  }

}
</script>
<style> 
</style>