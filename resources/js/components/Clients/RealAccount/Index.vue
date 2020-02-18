<template>
  <div> 



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">List Akun Real</h3>
    </div>
  </div>
</div>





<div class="col-md-12 padding-5">
  <div class="panel">
    <div class="panel-body">
      <div class="col-md-12">

<div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="zero_configuration_table_length">
                                <div class="row row-xs">
                                    <div class="col-md-6">
                                        <label>Date From :</label>
                                        <datepicker v-model="startTime.time"  :typeable="true" :format="customFormatter" placeholder="YYYY-MM-DD" @keyup.enter="doFilter"></datepicker>
                                    </div>
                                    <div class="col-md-6 mt-3 mt-md-0">
                                        <label>Date To : </label>
                                        <datepicker v-model="endtime.time"  :typeable="true" :format="customFormatter" placeholder="YYYY-MM-DD" @keyup.enter="doFilter"></datepicker>    
                                    </div> 
                                    <div class="col-md-12">
                                        <br>
                                        <label>Search for : </label>
                                        <input type="text" v-model="filterText" class="form-control form-control-sm" @keyup.enter="doFilter" placeholder="ID Akun"> 
                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <button class="btn btn-primary m-1" @click.prevent="doFilter"><i class="fa fa-search"></i> Cari</button>
                                        <button class="btn btn-warning m-1" @click.prevent="resetFilter"><i class="fa fa-retweet"></i> Ulangi Pencarian</button>
                                        <button type="button" class="btn btn-info m-1"  @click="createItem()"><i class="fa fa-plus"></i> Daftar Akun real</button>
                                    </div>
                                </div> 
                            </div>
                        </div> 
                        <div class="col-sm-12 col-md-6">
                            <div id="zero_configuration_table_filter" class="dataTables_filter">
                                <label>Per Page: 
                                <select v-model="perPage" aria-controls="zero_configuration_table" class="form-control form-control-sm">
                                    <option :value=10>10</option>
                                    <option :value=25>25</option>
                                    <option :value=50>50</option>
                                    <option :value=75>75</option>
                                    <option :value=100>100</option>
                                </select>
                                </label>
                            </div>
                        </div>

      </div>
      <div class="col-md-12">
  <vuetable ref="vuetable"
        api-url="/clients-area/get-list-real-account"
        :fields="fields"
        pagination-path=""
        :per-page="perPage"
        :css="css.table"
        :append-params="moreParams" 
        @vuetable:pagination-data="onPaginationData"
        @vuetable:loading="onLoading"        
        @vuetable:load-error="onLoadingError"        
        @vuetable:load-success="onLoaded"
    ></vuetable> 
    <div class="vuetable-pagination">
        <vuetable-pagination-info ref="paginationInfo"
            info-class="pagination-info"
        ></vuetable-pagination-info>
        <vuetable-pagination ref="pagination"
            :css="css.pagination"
            @vuetable-pagination:change-page="onChangePage"
        ></vuetable-pagination>
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
import Datepicker from 'vuejs-datepicker' 
import Hashids from 'hashids'
import {Vuetable, VuetablePagination, VuetablePaginationInfo} from 'vuetable-2'


import RealButton from '../Buttons/RealButton.vue' 
Vue.component('real-button-actions', RealButton)

Vue.use(VueSweetalert2)
Vue.use(Loading)
Vue.use(VueEvents)


export default {
  components: { 
    Vuetable, 
    VuetablePagination,
    VuetablePaginationInfo,
    Datepicker,  
  },
  data () {
    return { 
      isLoading: false,
       errors: [],
       perPage: 10,
        startTime: {
            time: ''
        },
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
        submitSelectedItems:[],
        fields: [ 
            {
                name: '__sequence',
                title: 'No',
                titleClass: 'text-center',
                dataClass: 'text-center'
            },
            {
                name: 'account_number',
                title: 'ID Akun',
                titleClass: 'text-center',
                dataClass: 'text-center'
            },    
            {
                name: 'created_at',
                title: 'Tanggal Registrasi',
                titleClass: 'text-center',
                dataClass: 'text-center',
                callback: 'formatDate|DD-MM-YYYY HH:mm:ss'
            },
            {
                name: 'status',
                title: 'Status',
                titleClass: 'text-center',
                dataClass: 'text-center',
            },
            {
                name: '__component:real-button-actions',
                title: 'Ulasan Data',
                titleClass: 'text-center',
                dataClass: 'text-center'
            },   
        ],
        filterText: '',
        css: {
            table: {
                tableClass: 'table table-bordered table-striped table-hover',
                ascendingIcon: 'glyphicon glyphicon-chevron-up',
                descendingIcon: 'glyphicon glyphicon-chevron-down'
            },
            pagination: {
                wrapperClass: 'pagination',
                activeClass: 'active',
                disabledClass: 'disabled',
                pageClass: 'page',
                linkClass: 'link',
                icons: {
                    first: '',
                    prev: '',
                    next: '',
                    last: '',
                },
            },
            icons: {
                first: 'glyphicon glyphicon-step-backward',
                prev: 'glyphicon glyphicon-chevron-left',
                next: 'glyphicon glyphicon-chevron-right',
                last: 'glyphicon glyphicon-step-forward',
            },
        },
        moreParams: {}
    }
  },
  watch: { 
    'perPage'(newValue, oldValue) {
        this.$events.fire('filter-set', this.filterText)
    }, 
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

    createItem() {
        this.$router.push({name:'addRealAccount', params: {idnya:this.diacak(0)}});
    },
    editItem(item ,index = this.indexOf(item)){
      this.$router.push({name:'addRealAccount', params: {idnya:this.diacak(item.id)}});
    },
    printItem(item ,index = this.indexOf(item)){
        this.isLoading = true;
      var file_name = item.name+'_'+item.account_number+'.pdf';
      let masuk = new FormData();
        masuk.set('id', item.id)
        masuk.set('file_name', file_name)
         axios({
            url: '/clients-area/download-registrasi-file',
            method: 'POST',
            data: masuk,
            responseType: 'blob',
        }).then((response) => {
          const url = window.URL.createObjectURL(new Blob([response.data]));
          const link = document.createElement('a');
          link.href = url;
          link.setAttribute('download', file_name);
          document.body.appendChild(link);
          link.click();
          this.isLoading = false;
        });
    },

    doFilter () {
        if(!this.startTime.time && !this.endtime.time){
            this.$events.fire('filter-set', this.filterText, this.startTime.time, this.endtime.time )
        }else if(this.startTime.time && !this.endtime.time){
            var startTime = this.customFormatter(this.startTime.time)
             this.$events.fire('filter-set', this.filterText, startTime, this.endtime.time )
        }else if(!this.startTime.time && this.endtime.time){
            var endtime = this.customFormatter(this.endtime.time)
            this.$events.fire('filter-set', this.filterText, this.startTime.time, endtime)
        }else if(this.startTime.time && this.endtime.time){ 
            if(this.endtime.time < this.startTime.time){
                alert('Input Date Wrong');
            }else{
                var startTime = this.customFormatter(this.startTime.time)
                var endtime = this.customFormatter(this.endtime.time)
                this.$events.fire('filter-set', this.filterText, startTime, endtime )
             }
        }else{
            this.$events.fire('filter-set', this.filterText, this.startTime.time, this.endtime.time )
        }
    },

    diacak(id){
        var hashids = new Hashids('',1000,'abcdefghijklmnopqrstuvwxyz0987654321ABCDEFGHIJKLMNOPQRSTUVWXYZ'); // no padding
        return hashids.encode(id); 
    },

    serverName() {
        return 'PTGlobalKapitalInv-MT5-Live';
    },
    
    onChangePage (page) {
        this.$refs.vuetable.changePage(page)
    },
    onPaginationData (paginationData) {
        this.$refs.pagination.setPaginationData(paginationData)
        this.$refs.paginationInfo.setPaginationData(paginationData)
    },
    onLoading() {
        this.loading();
        this.isLoading = true;
    },
    onLoaded() {
        this.isLoading = false;
    },
    onLoadingError() {
        window.location.href = window.webURL;  
    },
    resetFilter () {
        this.filterText = ''
        this.startTime.time = ''
        this.endtime.time = ''
        this.$events.fire('filter-reset')
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
    'filter-set' (filterText,startTime,endtime) {
        this.moreParams = {
            filter: filterText,min: startTime, max: endtime
        }
         Vue.nextTick(() => this.$refs.vuetable.refresh() )
    },
    'filter-reset' () {
        this.moreParams = {}
        Vue.nextTick(() => this.$refs.vuetable.refresh() )
    } 

  },
  created: function() { 
    let self = this;
    this.$root.$on('printitem', function(data,index){
      self.printItem(data,index);
    });
    this.$root.$on('edititem', function(data,index){
      self.editItem(data,index);
    });

  },
	mounted(){  
  }

}
</script>
<style> 
.pagination {
  margin: 0;
  float: right;
}
.pagination a.page {
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 10px;
  margin-right: 2px;
}
.pagination a.page.active {
  color: white;
  background-color: #337ab7;
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 10px;
  margin-right: 2px;
}
.pagination a.btn-nav {
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 7px;
  margin-right: 2px;
}
.pagination a.btn-nav.disabled {
  color: lightgray;
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 7px;
  margin-right: 2px;
  cursor: not-allowed;
}
.pagination-info {
  float: left;
}
</style>