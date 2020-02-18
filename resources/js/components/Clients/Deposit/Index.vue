<template>
  <div> 



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Riwayat Deposit</h3>
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
                                        <button type="button" class="btn btn-info m-1"  @click="createItem()"><i class="fa fa-plus"></i> Tambah Deposit</button>
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
        api-url="/clients-area/get-deposit"
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
 


<!-- @create --->
        <modal  v-if="modal.get('create')" @close="modal.set('create', false)"  >
        <template slot="header"><h4 style="text-align:center;">Tambah Deposit Akun Real</h4></template>
        <template slot="body" >
            <form method="POST"  action="" @submit.prevent="addItem()" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- form Group -->
                    <div class="form-group">
                        <span class="label label-danger" v-for="error of errorNya['error']">
                            {{ error }}
                        </span>
                    </div>
                    
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="account_number">ID Akun</label>
                        <input v-model="account_number" type="text" minlength="2" maxlength="25" class="form-control" required>
                        <span class="label label-danger" v-for="error of errorNya['account_number']">
                            {{ error }}
                        </span>
                    </div>
                     
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="total_deposit">Total Deposit</label>
                        <input v-model="total_deposit" type="text" minlength="2" maxlength="25" class="form-control" @keypress="isNumber($event)" required>
                        <span class="label label-danger" v-for="error of errorNya['total_deposit']">
                            {{ error }}
                        </span>
                    </div>
                     
                     
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="image_deposit">Bukti Deposit</label>
                        <input type="file" name="image_deposit" class="form-control" id="image_deposit" v-on:change="imageDeposit" required>
                        <span class="label label-danger" v-for="error of errorNya['image_deposit']">
                            {{ error }}
                        </span>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" @click="modal.set('create', false)" >Close</button>
					<button type="submit" class="btn btn-success">Submit</button>
                </div>
				</form>
        </template>
        </modal>


</div>
</template>

<script>
        /* ------------------------------------------------------------------------------------- CRUD MODAL
         ---------------------------------------------------------------------------------------------------- */
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
        // -----------------------------------------------------------------------------------------------  COMPONENT MODAL
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
import VueEvents from 'vue-events'
import Loading from 'vue-loading-overlay'
import 'vue-loading-overlay/dist/vue-loading.css'
import accounting from 'accounting'
import Datepicker from 'vuejs-datepicker' 
import Hashids from 'hashids'
import {Vuetable, VuetablePagination, VuetablePaginationInfo} from 'vuetable-2'


Vue.use(VueSweetalert2)
Vue.use(Loading)
Vue.use(VueEvents)
Vue.component('modal', Modal)


import HistoryButton from '../Buttons/HistoryButton.vue' 
Vue.component('history-button-actions', HistoryButton)

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
       account_number:'',
       total_deposit:'',
       image_deposit:'',
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
        errorNya:[],
        submitSelectedItems:[],
        modal:new CrudModal({ create:false }),
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
                name: 'total_deposit',
                title: 'Jumlah Deposit',
                titleClass: 'text-center',
                dataClass: 'text-center',
                callback: 'formatNumberRupiah'
            }, 
            {
                name: '__component:history-button-actions',
                title: 'Download Lampiran',
                titleClass: 'text-center',
                dataClass: 'text-center'
            }, 
            {
                name: 'reason',
                title: 'Pesan',
                titleClass: 'text-center',
                dataClass: 'text-center'
            }, 
            {
                name: 'status',
                title: 'Status',
                titleClass: 'text-center',
                dataClass: 'text-center'
            }, 
            {
                name: 'updated_at',
                title: 'Tanggal Pengajuan',
                titleClass: 'text-center',
                dataClass: 'text-center',
                callback: 'formatDate|DD-MM-YYYY HH:mm:ss'
            }
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

    imageDeposit(){
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.image_deposit = files[0];
    },

	formatNumberRupiah (value) {
      return accounting.formatMoney(value,  "", 0, ".")
    },
    addItem(){
        this.loading();
        let masuk = new FormData();
        masuk.set('account_number', this.account_number)
        masuk.set('total_deposit', this.total_deposit)
        masuk.set('image_deposit', this.image_deposit)

        axios.post('/clients-area/post-deposit' , masuk).then(response => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{
                if(response.data.status == 200){
                     this.account_number = '';
                     this.total_deposit = '';
                     this.image_deposit = '';
                     this.resetFilter();
                    this.modal.set('create', false);
                    this.success(response.data.message);
                }else{
                    this.errorNya = response.data.message;
                }
            }
        }).catch(error => {
            if (! _.isEmpty(error.response)) {
                if (error.response.status = 422) {
                    this.errorNya = error.response.data.errors;
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

    createItem() {
        this.errors = [];
        this.account_number = '';
       this.total_deposit = '';
       this.image_deposit = '';
        this.modal.set('create', true);
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
    },
    downloadItem(data,index){
        this.isLoading = true;
        var masuk = {fileName:data.image_deposit};		
                    axios({
        url: '/clients-area/download-deposit-file',
        method: 'POST',
        data: masuk,
        responseType: 'blob', // important
        }).then((response) => {
        const url = window.URL.createObjectURL(new Blob([response.data]));
        const link = document.createElement('a');
        link.href = url;
        link.setAttribute('download', data.image_deposit);
        document.body.appendChild(link);
        link.click();
        this.isLoading = false;

        });
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
    this.$root.$on('downloaditem', function(data,index){
      self.downloadItem(data,index);
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
.modal-backdrop {
z-index: -1;
}
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, .5);
  display: table;
  transition: opacity .3s ease;
}
.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}
.modal-container {
  width: 80%;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
  transition: all .3s ease;
  font-family: Helvetica, Arial, sans-serif;
}
.modal-header h3 {
  margin-top: 0;
  color: #42b983;
}
.modal-body {
  margin: 20px 0;
     max-height: calc(100vh - 210px);
    overflow-y: auto;
}
.modal-default-button {
  float: right;
}
/*
 * The following styles are auto-applied to elements with
 * transition="modal" when their visibility is toggled
 * by Vue.js.
 *
 * You can easily play with the modal transition by editing
 * these styles.
 */
.modal-enter {
  opacity: 0;
}
.modal-leave-active {
  opacity: 0;
}
.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>