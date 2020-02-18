<template>
  <div> 



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Email Configuration</h3>
    </div>
  </div>
</div>





<div class="col-md-12 padding-5">
  <div class="panel">
    <div class="panel-body">


      <div class="col-md-12">

<div class="card-body">
    <!-- form Group -->
    
            <form method="POST"  action="" @submit.prevent="updateItem()" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input v-model="forms.name" type="text" minlength="2" maxlength="225" class="form-control" required>
                        <span class="label label-danger" v-for="error of errors['name']">
                            {{ error }}
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input v-model="forms.email" type="email" maxlength="225" class="form-control" required>
                        <span class="label label-danger" v-for="error of errors['email']">
                            {{ error }}
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input v-model="forms.password" type="text" maxlength="225" class="form-control" required>
                        <span class="label label-danger" v-for="error of errors['password']">
                            {{ error }}
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="driver">Driver</label>
                        <input v-model="forms.driver" type="text" maxlength="225" class="form-control" required>
                        <span class="label label-danger" v-for="error of errors['driver']">
                            {{ error }}
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="host">Host</label>
                        <input v-model="forms.host" type="text" maxlength="225" class="form-control" required>
                        <span class="label label-danger" v-for="error of errors['host']">
                            {{ error }}
                        </span>
                    </div>


                    <div class="form-group">
                        <label for="port">Port</label>
                        <input v-model="forms.port" type="text" maxlength="225" class="form-control" required>
                        <span class="label label-danger" v-for="error of errors['port']">
                            {{ error }}
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="encryption">Encryption</label>
                        <input v-model="forms.encryption" type="text" maxlength="225" class="form-control" required>
                        <span class="label label-danger" v-for="error of errors['encryption']">
                            {{ error }}
                        </span>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

            </form>
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
import accounting from 'accounting'
import DateRangePicker from 'vue2-daterange-picker'
import 'vue2-daterange-picker/dist/vue2-daterange-picker.css'
import Hashids from 'hashids'
import VueGoodTablePlugin from 'vue-good-table'
import 'vue-good-table/dist/vue-good-table.css'
import 'vue2-daterange-picker/dist/vue2-daterange-picker.css'

import pagination from '../Paginator/Index.vue' 
Vue.component('pagination', pagination)

Vue.use(VueSweetalert2)
Vue.use(Loading)
Vue.use(VueEvents)
Vue.use(VueGoodTablePlugin)
 
export default {    
    props: {},
  components: { 
    DateRangePicker,  
  },
  data () {
    return {
       direction: 'ltr',
    format: moment.localeData().longDateFormat('L'),
    separator: ' - ',
    applyLabel: 'Apply',
    cancelLabel: 'Cancel',
    weekLabel: 'W',
    customRangeLabel: 'Custom Range',
    daysOfWeek: moment.weekdaysMin(),
    monthNames: moment.monthsShort(),
    forms : {id:'',name:'',email:'',password:'',driver:'',host:'',port:'',encryption:''},
    firstDay: moment.localeData().firstDayOfWeek(),
        isLoading: false,
        dateRange:'',
        date_end:'',
        date_start:'',
        errors: [],
        seletedData:[],
        columns: [
            {
                label: 'Name',
                field: 'name',
                filterOptions: {
                  enabled: true, // enable filter for this column
                  placeholder: "Filter Name", // placeholder for filter input
                  filterValue: "", // initial populated value for this filter
                  filterDropdownItems: [], // dropdown (with selected values) instead of text input
                  trigger: "enter" //only trigger on enter not on keyup
                }
            },
            {
                label: 'Email',
                field: 'email',
                filterOptions: {
                  enabled: true, // enable filter for this column
                  placeholder: "Filter Email", // placeholder for filter input
                  filterValue: "", // initial populated value for this filter
                  filterDropdownItems: [], // dropdown (with selected values) instead of text input
                  trigger: "enter" //only trigger on enter not on keyup
                }
            },
            {
                label: 'Status',
                field: 'status',
                filterOptions: {
                  enabled: true, // enable filter for this column
                  placeholder: "Filter Status", // placeholder for filter input
                  filterValue: "", // initial populated value for this filter
                  filterDropdownItems: ['active','inactive'], // dropdown (with selected values) instead of text input
                  trigger: "enter" //only trigger on enter not on keyup
                }
            },
            {
              label: 'Created At',
              field: 'created_at',
              sortable: false,
            },
            {
              label: 'Action',
              field: 'actions',
              sortable: false,
            },
        ],
        rows: [],
        image_upload:'',
        totalRecords: 0,
        serverParams: {
        columnFilters: {},
        sort: {
            field: '', 
            type: '',
        },
        dateRange:{
          start:'',
          end:''
        },
        page: 1, 
        per_page: 10
        },
    }
  },
  watch: {  
  },
  methods: {
    fetchIt(){
    this.loading();
        axios.get('rajawaliadmin/get-email').then((response) => {
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
    isNumber: function(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
            evt.preventDefault();
        }else {
            return true;
        }
    },

    updateItem(){
        this.loading();

        axios.post('/rajawaliadmin/update-email', this.forms).then(response => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{ 
                if(response.data.status == 200){
                    this.success(response.data.message);
                }else{
                    this.errors  = response.data.message;
                }
            }
        }).catch(error => {
            if (! _.isEmpty(error.response)) {
                if (error.response.status = 422) {
                    this.errors = error.response.data.errors;
                }else if (error.response.status = 500) {
                    this.$router.push('/server-error');
                }else{
                    this.$router.push('/page-not-found');
                }
            }                            
        })
    },
 
	formatNumberRupiah (value) {
      return accounting.formatMoney(value,  "", 0, ".")
    }, 

    diacak(id){
      var hashids = new Hashids('',1000,'abcdefghijklmnopqrstuvwxyz0987654321ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // no padding
      return hashids.encode(id); 
    },
    dibalik(id){
      var hashids = new Hashids('',1000,'abcdefghijklmnopqrstuvwxyz0987654321ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // no padding
      return hashids.decode(id); 
    },

    createItem() {
        this.$router.push({name:'addRealAccount', params: {idnya:this.diacak(0)}});
    },
    editItem(item ,index = this.indexOf(item)){
      this.$router.push({name:'addRealAccount', params: {idnya:this.diacak(item.id)}});
    },
   
    formatDate (value, fmt = 'DD-MM-YYYY HH:mm:ss') {
        return (value == null) ? '' : moment(value, 'YYYY-MM-DD HH:mm:ss').format(fmt)
    },
 
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
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
.row{
  margin-left: 0px !important;
}
.daterangepicker .drp-calendar {
    display: none;
    max-width: 250px;
}
</style>