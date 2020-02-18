<template>
<div> 


<div class="col-md-12 padding-5">
  <div class="panel">
    <div class="panel-body">
      <div class="col-md-12">

<div class="col-md-12 padding-0">

  <div v-if="this.currentUrl == '/rajawaliadmin'" class="badges-v1" style="background-image: url('/public/assets/images/banner-admin.jpg');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;width: 100% !important; height: 600px !important ;">
    <div class="badges-ribbon" style="width: 185px !important;height: 188px !important;">
      <div class="badges-ribbon-content badge-danger" style="width: 250px !important;top: 57px !important;">TOP BROKER</div>
    </div>
  </div>
  
  <div v-else class="badges-v1" style="background-image: url('/public/assets/images/banner-client-area.png');background-size: 100% !important;background-repeat: no-repeat !important;background-position: center !important;width: 100% !important; height: 600px !important ;">
    <div class="badges-ribbon" style="width: 185px !important;height: 188px !important;">
      <div class="badges-ribbon-content badge-danger" style="width: 250px !important;top: 57px !important;">TOP BROKER</div>
    </div>
  </div>

</div>


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
      currentUrl:'',
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
    this.currentUrl = window.location.pathname;
  }

}
</script>
<style> 
</style>