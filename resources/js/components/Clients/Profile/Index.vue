<template>
  <div> 


<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Data Profil</h3>
    </div>
  </div>
</div>

<div class="col-md-12 padding-5">

<div class="col-md-6">
  <div class="panel box-v1">
    <div class="panel-heading bg-white border-none">
      <div class="col-md-6 col-sm-6 col-xs-6 text-right">
        <h4><span class="icon-user icons icon text-right"></span></h4>
       </div>
    </div>
    <div class="panel-body text-center">
      <h1 style="color: #f18109 !important;"> <router-link :to="{ name: 'UserDetailContact' }">Detail Kontak</router-link></h1>
      <p>Halaman ini untuk merubah detail Kontak anda. </p>
      <hr>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="panel box-v1">
    <div class="panel-heading bg-white border-none">
      <div class="col-md-6 col-sm-6 col-xs-6 text-right">
        <h4><span class="icon-user icons icon text-right"></span></h4>
       </div>
    </div>
    <div class="panel-body text-center">
      <h1 style="color: #f18109 !important;"><router-link :to="{ name: 'UserChangePassword' }">Rubah Password</router-link></h1>
      <p>Halaman ini untuk merubah password masuk ke client area. </p>
      <hr>
    </div>
  </div>
</div>

</div> 
 
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

  },
  data () {
    return { 
      isLoading: false,
      user:{}
    }
  },
  watch: { 

  },
  methods: { 
    fetchIt(){ 
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