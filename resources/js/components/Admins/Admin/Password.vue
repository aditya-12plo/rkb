<template>
  <div> 
  <loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Change Password</h3>
    </div>
  </div>
</div>


<form @submit.prevent="submitData" method="POST"> 
<div class="col-md-12 padding-0">
  <div class="panel form-element-padding">
  <div class="panel-body" style="padding-bottom:30px;">

            <div class="form-group col-lg-12">
                <label for="input1">Password *</label>
                <input v-model="forms.password" type="password" class="form-control" required="" aria-required="true">
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">Password Konfirmasi *</label>
                 <input v-model="forms.password_confirmation" type="password" class="form-control" required="" aria-required="true">
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
      forms: {password : '', password_confirmation:''},
    }
  },
  watch: { 

  },
  methods: { 
    submitData(){
      this.$swal({
        title: 'Are you?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            axios.post('/rajawaliadmin/change-password', this.forms).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){ 
                                    this.errors = '';
                                    this.forms.password_confirmation = '';
                                    this.forms.password = '';
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
  }

}
</script>
<style> 
</style>