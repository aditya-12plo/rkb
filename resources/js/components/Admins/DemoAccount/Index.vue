<template>
  <div> 



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">List Demo Account</h3>
    </div>
  </div>
</div>





<div class="col-md-12 padding-5">
  <div class="panel">
    <div class="panel-body">


      <div class="col-md-12">
    <button class="btn btn-danger pd-x-20" type="button" @click.prevent="uploadFile()">Upload File</button> 

 <div class="card-body">

<vue-good-table
    title="real-account"
    mode="remote"
    @on-selected-rows-change="selectionChanged"
    @on-page-change="onPageChange"
    @on-sort-change="onSortChange"
    @on-column-filter="onColumnFilter"
    @on-per-page-change="onPerPageChange"
    :totalRows="totalRecords"
    :line-numbers="true"
    :isLoading.sync="isLoading"
    :pagination-options="{
        enabled: true,
    }"
  :rows="rows"
  :columns="columns">
          <template slot="table-row" slot-scope="props">
        <span v-if="props.column.field == 'actions'">
            <button class="btn ripple btn-3d btn-danger" @click.prevent="updateById(props.index , props.row)">
                <div>
                    <span> update </span>
                    <span class="ink animate" style="height: 86px; width: 86px; top: -32px; left: -1px;"></span>
                </div>
            </button>
        </span>
        <span v-else>
            {{props.formattedRow[props.column.field]}}
        </span>
      </template> 
</vue-good-table>

</div>
 

      </div>
      
    </div>
  </div>
</div>
 


<!-- @upload Modal--->
        <modal  v-if="modal.get('upload')" @close="modal.set('upload', false)" >
        <template slot="header" ><h4 align="center">Upload Demo Account</h4></template>
        <template slot="body" >
            <form method="POST" action="" @submit.prevent="uploadData()">
                <div class="modal-body"> 
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="upload">File Upload</label>
                        <input type="file" name="file" class="form-control" id="file" v-on:change="file">
                        <span class="label label-danger" v-for="er of errors">
                       <span style="color:red;" v-for="r of er">{{ r }} <br> </span>
                    </span>
                    </div>
						

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" @click="modal.set('upload', false)" >Close</button>
                    <button type="button" class="btn btn-warning" @click.prevent="downloadTemplate()" >Download Template</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>

            </form>
        </template>
        </modal>

</div>
</template>

<script>
// CRUD MODAL
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
//  COMPONENT MODAL
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
 Vue.component('modal', Modal)
 
export default {    
    props: {},
  components: { 
    DateRangePicker,  
  },
  data () {
    return {
    file_data:'',
    direction: 'ltr',
    format: moment.localeData().longDateFormat('L'),
    separator: ' - ',
    applyLabel: 'Apply',
    cancelLabel: 'Cancel',
    weekLabel: 'W',
    customRangeLabel: 'Custom Range',
    daysOfWeek: moment.weekdaysMin(),
    monthNames: moment.monthsShort(),
    firstDay: moment.localeData().firstDayOfWeek(),
        isLoading: false,
        dateRange:'',
        date_end:'',
        date_start:'',
        errors: [],
        seletedData:[],
        columns: [
            {
                label: 'Username',
                field: 'username',
                filterOptions: {
                  enabled: true, // enable filter for this column
                  placeholder: "Filter Username", // placeholder for filter input
                  filterValue: "", // initial populated value for this filter
                  filterDropdownItems: [], // dropdown (with selected values) instead of text input
                  trigger: "enter" //only trigger on enter not on keyup
                }
            },
            {
                label: 'Password',
                field: 'password',
                sortable: false,
            },
            {
                label: 'Used',
                field: 'used',
                filterOptions: {
                  enabled: true, // enable filter for this column
                  placeholder: "Filter Used", // placeholder for filter input
                  filterValue: "", // initial populated value for this filter
                  filterDropdownItems: [], // dropdown (with selected values) instead of text input
                  trigger: "enter" //only trigger on enter not on keyup
                }
            },
            {
              label: 'Action',
              field: 'actions',
              sortable: false,
            },
        ],
        rows: [],
        modal:new CrudModal({upload:false}),
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
    uploadData(){
  let masuk = new FormData();
   masuk.set('file_data', this.file_data)
    axios.post('/rajawaliadmin/upload-demo-account' , masuk)
        .then(response => {
            if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                    this.loadItems();
                    this.file_data = "";
                    this.modal.set('upload', false);
                    this.success(response.data.message);
                  }else{
                    // this.modal.set('upload', false);
                      this.errors = response.data.message;
                    //   this.resultError(response.data.message)
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
    } ,

    file(event){
        let files = event.target.files || e.dataTransfer.files;
        if (files.length)  this.file_data = files[0];
    },

    downloadTemplate(){
      this.isLoading = true;
      var file_name = 'demo-account.xlsx';
      let masuk = new FormData();
        masuk.set('file_name', file_name)
         axios({
            url: '/rajawaliadmin/download-demo-account',
            method: 'POST',
            data: masuk,
            responseType: 'blob',
        }).then((response) => {
          this.isLoading = false;
          const url = window.URL.createObjectURL(new Blob([response.data]));
          const link = document.createElement('a');
          link.href = url;
          link.setAttribute('download', file_name);
          document.body.appendChild(link);
          link.click();
        });

    },

    uploadFile(){
        this.file_data = "";
        this.errors = [];
      this.modal.set('upload', true);
    },

    clearFilter() { 

      try {
        let newCols = JSON.parse(JSON.stringify(this.columns));

        let username = newCols.find(c => {
          return c.field == 'username';
        });
        username.filterOptions.filterValue = "";
  
        this.seletedData = [];
        this.columns = newCols;
      } catch {
        alert(`Unable to clear filter`);
      }
    },
        
    updateById(index,item){
      
      this.$swal({
        title: 'Are you sure ?',
        text: 'update demo account',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
          if (result.value) {
            var data = {id:item.id}
            axios.post('/rajawaliadmin/used-demo-account', data).then(response => {
                if(!response.data){ 
                  window.location.href = window.webURL; 
                }else{ 
                  if(response.data.status == 200){
                      this.loadItems();
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

    selectionChanged(params) {
        console.log(params);
    },

    onSelectAll(params){
      if(params.selectedRows.length > 0){
        this.seletedData.push = params;
      }
    },

    onRowClick(params){
        console.log(params);
    },
    updateParams(newProps) {
      this.serverParams = Object.assign({}, this.serverParams, newProps);
      this.loadItems();
    },
     
    onPageChange(params) {
      this.updateParams({page: params.currentPage});
    },

    onPerPageChange(params) {
      this.updateParams({per_page: params.currentPerPage});
    },
    updateValues(){
      var date_start = this.customFormatter(this.dateRange.startDate)
      var date_end = this.customFormatter(this.dateRange.endDate)
      this.updateParams({
        dateRange: {
          start: date_start,
          end: date_end,
        },
      });
    },


    onSortChange(params) {
        // console.log(params[0].field)
      this.updateParams({
        sort: {
          type: params[0].type,
          field: params[0].field,
        },
      });
    },
    
    onColumnFilter(params) {
      this.updateParams(params);
    },

    // load items is what brings back the rows from server
    loadItems() {
        return axios.get(`/rajawaliadmin/get-list-demo-account?per_page=${this.serverParams.per_page}&page=${this.serverParams.page}&sort_field=${this.serverParams.sort.field}&sort_type=${this.serverParams.sort.type}&username=${this.serverParams.columnFilters.username}&used=${this.serverParams.columnFilters.used}`).then((response) => {
            this.rows = response.data.data
            this.totalRecords  = response.data.total
        })
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
    printItem(item ,index = this.indexOf(item)){
        this.isLoading = true;
      var file_name = item.name+'_'+item.account_number+'.pdf';
      let masuk = new FormData();
        masuk.set('id', item.id)
        masuk.set('file_name', file_name)
         axios({
            url: '/rajawaliadmin/download-registrasi-file',
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
.row{
  margin-left: 0px !important;
}
.daterangepicker .drp-calendar {
    display: none;
    max-width: 250px;
}
</style>