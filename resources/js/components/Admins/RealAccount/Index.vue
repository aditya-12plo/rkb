<template>
  <div> 



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">List Real Account</h3>
    </div>
  </div>
</div>





<div class="col-md-12 padding-5">
  <div class="panel">
    <div class="panel-body">


      <div class="col-md-12">

<!-- <button class="btn btn-primary m-1" @click.prevent="createData"><i class="fa fa-plus"></i> Create Data </button>  -->
 <date-range-picker
            ref="picker"
            :locale-data="{ firstDay: 1, format: 'DD-MM-YYYY HH:mm:ss' }"
@update="updateValues"
            v-model="dateRange"
    ><div slot="input" slot-scope="picker" style="min-width: 350px;">
            {{ customFormatter(picker.startDate) }} - {{ customFormatter(picker.endDate) }}
        </div>
    </date-range-picker>
    
<button class="btn btn-warning m-1" @click.prevent="downloadData"><i class="fa fa-download"></i> Download Data </button>
<button class="btn btn-danger m-1" @click.prevent="clearFilter"><i class="fa fa-trash"></i> Clear Filter </button>

 <div v-if="this.isCrud == 'crud'" class="card-body">

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
            <button class="btn ripple btn-3d btn-info" @click.prevent="downloadById(props.index , props.row)">
                <div>
                    <span> download </span>
                    <span class="ink animate" style="height: 86px; width: 86px; top: -32px; left: -1px;"></span>
                </div>
            </button>
<br><br>
            <button class="btn ripple btn-3d btn-danger" @click.prevent="updateById(props.index , props.row)">
                <div>
                    <span> update </span>
                    <span class="ink animate" style="height: 86px; width: 86px; top: -32px; left: -1px;"></span>
                </div>
            </button>
<br><br>
            <button v-if="props.row.status == 'review'" class="btn ripple btn-3d btn-primary" @click.prevent="ApprovedById(props.index , props.row)">
                <div>
                    <span> approval </span>
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


 <div v-else class="card-body">

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
            <button class="btn ripple btn-3d btn-info" @click.prevent="downloadById(props.index , props.row)">
                <div>
                    <span> download </span>
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
		isCrud:'',
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
                label: 'ID Account',
                field: 'account_number',
                filterOptions: {
                  enabled: true, // enable filter for this column
                  placeholder: "Filter ID", // placeholder for filter input
                  filterValue: "", // initial populated value for this filter
                  filterDropdownItems: [], // dropdown (with selected values) instead of text input
                  trigger: "enter" //only trigger on enter not on keyup
                }
            },
            {
                label: 'User Name',
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
                  filterDropdownItems: ["on-progress","review","approved"], // dropdown (with selected values) instead of text input
                  trigger: "enter" //only trigger on enter not on keyup
                }
            },
            {
                label: 'Register Date',
                field: 'created_at',
              sortable: true,
            },
            {
                label: 'Action',
              field: 'actions',
              sortable: false,
            },
        ],
        rows: [],
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
        axios.get('/rajawaliadmin/check-access/real-account').then((response) => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{ 
                if(response.data.status == 200){ 
                    this.isCrud = response.data.message;
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
    createData(){
      this.$router.push('/root/add-real-account');
    },

    clearFilter() { 

      try {
        let newCols = JSON.parse(JSON.stringify(this.columns));

        let account_number = newCols.find(c => {
          return c.field == 'account_number';
        });
        account_number.filterOptions.filterValue = "";

        let name = newCols.find(c => {
          return c.field == 'name';
        });
        name.filterOptions.filterValue = "";

        let email = newCols.find(c => {
          return c.field == 'email';
        });
        email.filterOptions.filterValue = "";

        let status = newCols.find(c => {
          return c.field == 'status';
        });
        status.filterOptions.filterValue = "";

 
        this.serverParams.dateRange.end = "";
        this.serverParams.dateRange.start = "";
        this.dateRange = "";
        this.seletedData = [];
        this.columns = newCols;
      } catch {
        alert(`Unable to clear filter`);
      }
    },

    downloadData(){
      this.isLoading = true;
        var now = moment().format("YYYY-MM-DD-HH:mm:ss")
      var file_name = now+'.xls';
      let masuk = new FormData();
        masuk.set('account_number', this.serverParams.columnFilters.account_number)
        masuk.set('name', this.serverParams.columnFilters.name)
        masuk.set('email', this.serverParams.columnFilters.email)
        masuk.set('status', this.serverParams.columnFilters.status)
        masuk.set('date_start', this.serverParams.dateRange.start)
        masuk.set('date_end', this.serverParams.dateRange.end)
        masuk.set('file_name', file_name)
         axios({
            url: '/rajawaliadmin/download-real-account',
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

    ApprovedById(index,item){
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
            var data = {id:item.id}
            axios.post('/rajawaliadmin/approval-real-account', data).then(response => {
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

    downloadById(index,item){
      this.isLoading = true;
      var file_name = item.name+'_'+item.account_number+'.pdf';
      let masuk = new FormData();
        masuk.set('id', item.id)
        masuk.set('file_name', file_name)
         axios({
            url: '/rajawaliadmin/download-real-account-pdf',
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

    updateById(index,item){
      this.$router.push({name:'updateRealAccount', params: {id: this.diacak(item.id),typenya:'update-real-account',rowDatanya:item}});
    },


    deleteById(index,item){
        console.log(item);
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
        return axios.get(`/rajawaliadmin/get-list-real-account?per_page=${this.serverParams.per_page}&page=${this.serverParams.page}&sort_field=${this.serverParams.sort.field}&sort_type=${this.serverParams.sort.type}&account_number=${this.serverParams.columnFilters.account_number}&name=${this.serverParams.columnFilters.name}&email=${this.serverParams.columnFilters.email}&status=${this.serverParams.columnFilters.status}&date_start=${this.serverParams.dateRange.start}&date_end=${this.serverParams.dateRange.end}`).then((response) => {
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