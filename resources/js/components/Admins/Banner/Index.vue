<template>
  <div> 



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">List Home Banner</h3>
    </div>
  </div>
</div>





<div class="col-md-12 padding-5">
  <div class="panel">
    <div class="panel-body">


      <div class="col-md-12">
<button class="btn btn-primary m-1" @click.prevent="createData"><i class="fa fa-plus"></i> Create Banner </button>
   
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
            <button class="btn ripple btn-3d btn-default" @click.prevent="detailData(props.index , props.row)">
                <div>
                    <span> detail </span>
                    <span class="ink animate" style="height: 86px; width: 86px; top: -32px; left: -1px;"></span>
                </div>
            </button>
<br><br>
            <button class="btn ripple btn-3d btn-warning" @click.prevent="updateData(props.index , props.row)">
                <div>
                    <span> update </span>
                    <span class="ink animate" style="height: 86px; width: 86px; top: -32px; left: -1px;"></span>
                </div>
            </button>
<br><br>
            <button class="btn ripple btn-3d btn-danger" @click.prevent="deleteData(props.index , props.row)">
                <div>
                    <span> delete </span>
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
 

<!-- @create --->
        <modal  v-if="modal.get('create')" @close="modal.set('create', false)"  >
        <template slot="header"><h4 style="text-align:center;">Add Banner</h4></template>
        <template slot="body" >
            <form method="POST"  action="" @submit.prevent="addItem()" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- form Group -->
                    <div class="form-group">
                        <span class="label label-danger" v-for="error of errors['error']">
                            {{ error }}
                        </span>
                    </div>
                    
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="sequence">Sequence</label>
                        <input v-model="forms.sequence" type="text" minlength="1" maxlength="2" class="form-control" @keypress="isNumber($event)" required>
                        <span class="label label-danger" v-for="error of errors['sequence']">
                            {{ error }}
                        </span>
                    </div>
                      
                     
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="description_id">Description ID</label>
                        <textarea v-model="forms.description_id" class="form-control border-bottom"></textarea>
                        <span class="label label-danger" v-for="error of errors['description_id']">
                            {{ error }}
                        </span>
                    </div>
                     
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="description_en">Description EN</label>
                        <textarea v-model="forms.description_en" class="form-control border-bottom"></textarea>
                        <span class="label label-danger" v-for="error of errors['description_en']">
                            {{ error }}
                        </span>
                    </div>
                     
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="image_upload">Image</label>
                        <input type="file" name="image_upload" class="form-control" id="image_upload" v-on:change="imageUpload" required>
                        <span class="label label-danger" v-for="error of errors['image_upload']">
                            {{ error }}
                        </span>
                    </div>

                    <div class="form-group">
                        <p>Image 1280x800</p>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" @click="modal.set('create', false)" >Close</button>
					<button type="submit" class="btn btn-success">Submit</button>
                </div>
				</form>
        </template>
        </modal>


<!-- @update --->
        <modal  v-if="modal.get('update')" @close="modal.set('update', false)"  >
        <template slot="header"><h4 style="text-align:center;">Update Banner</h4></template>
        <template slot="body" >
            <form method="POST"  action="" @submit.prevent="updateItem()" enctype="multipart/form-data">
                <div class="modal-body">

               

                    <!-- form Group -->
                    <div class="form-group">
                        <label for="sequence">Sequence</label>
                        <input v-model="forms.sequence" type="text" minlength="1" maxlength="2" class="form-control" @keypress="isNumber($event)" required>
                        <span class="label label-danger" v-for="error of errors['sequence']">
                            {{ error }}
                        </span>
                    </div>
                      
                     
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="description_id">Description ID</label>
                        <textarea v-model="forms.description_id" class="form-control border-bottom"></textarea>
                        <span class="label label-danger" v-for="error of errors['description_id']">
                            {{ error }}
                        </span>
                    </div>
                     
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="description_en">Description EN</label>
                        <textarea v-model="forms.description_en" class="form-control border-bottom"></textarea>
                        <span class="label label-danger" v-for="error of errors['description_en']">
                            {{ error }}
                        </span>
                    </div>
                     
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="image_upload">Image</label>
                        <input type="file" name="image_upload" class="form-control" id="image_upload" v-on:change="imageUpload">
                        <span class="label label-danger" v-for="error of errors['image_upload']">
                            {{ error }}
                        </span>
                        <img v-bind:src="'/public/assets/images/banner/' + forms.images_name" width="150px" height="100px" /> 
                    </div>

                    <div class="form-group">
                        <p>Image 1280x800</p>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" @click="modal.set('update', false)" >Close</button>
					<button type="submit" class="btn btn-success">Submit</button>
                </div>
				</form>
        </template>
        </modal>

<!-- @detail --->
        <modal  v-if="modal.get('detail')" @close="modal.set('detail', false)"  >
        <template slot="header"><h4 style="text-align:center;">Detail Banner</h4></template>
        <template slot="body" > 
                <div class="modal-body"> 
                    
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="sequence">Sequence</label> 
                        <b>{{this.forms.sequence}}</b>
                    </div>

                    <!-- form Group -->
                    <div class="form-group">
                        <label for="account_number">Description ID</label> 
                        <b>{{this.forms.description_id}}</b>
                    </div>
                      
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="account_number">Description EN</label> 
                        <b>{{this.forms.description_en}}</b>
                    </div>
                      
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="images_name">Image</label> 
                        <img v-bind:src="'/public/assets/images/banner/' + forms.images_name" width="150px" height="100px" /> 
                    </div>
                      
  
                    <!-- form Group -->
                    <div class="form-group">
                        <label for="account_number">Created At</label> 
                        <b>{{this.forms.created_at}}</b>
                    </div>

                    <!-- form Group -->
                    <div class="form-group">
                        <label for="account_number">Update At</label> 
                        <b>{{this.forms.updated_at}}</b>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" @click="modal.set('detail', false)" >Close</button> 
                </div> 
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
    modal:new CrudModal({ create:false , update:false , detail:false}),
    weekLabel: 'W',
    customRangeLabel: 'Custom Range',
    daysOfWeek: moment.weekdaysMin(),
    monthNames: moment.monthsShort(),
    forms : {id:'',sequence:'',description_id:'',description_en:'',images_name:'',created_at:'',updated_at:''},
    firstDay: moment.localeData().firstDayOfWeek(),
        isLoading: false,
        dateRange:'',
        date_end:'',
        date_start:'',
        errors: [],
        seletedData:[],
        columns: [
            {
                label: 'Sequence Image',
                field: 'sequence',
                filterOptions: {
                  enabled: true, // enable filter for this column
                  placeholder: "Filter Sequence Image", // placeholder for filter input
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
    downloadAttachment(fileName){
        var masuk = {fileName:fileName};
        axios({
            url: '/rajawaliadmin/download-withdrawal-file',
            method: 'POST',
            data: masuk,
            responseType: 'blob', // important
            }).then((response) => {
            const url = window.URL.createObjectURL(new Blob([response.data]));
            const link = document.createElement('a');
            link.href = url;
            link.setAttribute('download',fileName);
            document.body.appendChild(link);
            link.click(); 

        });

    },

    deleteData(index , row){
    axios.post('/rajawaliadmin/delete-banner', row).then(response => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{ 
                if(response.data.status == 200){
                    this.loadItems();
                    this.errors                 = [];
                    this.forms.id               = '';
                    this.forms.sequence         = '';
                    this.forms.description_id   = '';
                    this.forms.description_en   = '';
                    this.forms.images_name      = '';
                    this.forms.created_at       = '';
                    this.forms.updated_at       = '';
                    this.image_upload           = '';
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
    },

    updateData(index , row){
        this.forms = row;
        this.modal.set('update', true);
    },

    detailData(index , row){
        this.image_upload           = '';
        this.forms = row;
        this.modal.set('detail', true);
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
        let masuk = new FormData();
        masuk.set('id', this.forms.id)
        masuk.set('sequence', this.forms.sequence)
        masuk.set('description_id', this.forms.description_id)
        masuk.set('description_en', this.forms.description_en)
        masuk.set('image_upload', this.image_upload)

        axios.post('/rajawaliadmin/update-banner', masuk).then(response => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{ 
                if(response.data.status == 200){
                    this.loadItems();
                    this.errors                 = [];
                    this.forms.id               = '';
                    this.forms.sequence         = '';
                    this.forms.description_id   = '';
                    this.forms.description_en   = '';
                    this.forms.images_name      = '';
                    this.forms.created_at       = '';
                    this.forms.updated_at       = '';
                    this.image_upload           = '';
                    this.modal.set('update', false);
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

    addItem(){
        this.loading();
        let masuk = new FormData();
        masuk.set('sequence', this.forms.sequence)
        masuk.set('description_id', this.forms.description_id)
        masuk.set('description_en', this.forms.description_en)
        masuk.set('image_upload', this.image_upload)

        axios.post('/rajawaliadmin/add-banner', masuk).then(response => {
            if(!response.data){ 
                window.location.href = window.webURL; 
            }else{ 
                if(response.data.status == 200){
                    this.loadItems();
                    this.errors                 = [];
                    this.forms.id               = '';
                    this.forms.sequence         = '';
                    this.forms.description_id   = '';
                    this.forms.description_en   = '';
                    this.forms.images_name      = '';
                    this.forms.created_at       = '';
                    this.forms.updated_at       = '';
                    this.image_upload           = '';
                    this.modal.set('create', false);
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

    imageUpload(){
        let files = event.target.files || e.dataTransfer.files;
        if (files.length) this.image_upload = files[0];
    },

    createData(){
        this.errors                 = [];
        this.forms.id               = '';
        this.forms.sequence         = '';
        this.forms.description_id   = '';
        this.forms.description_en   = '';
        this.forms.images_name      = '';
        this.forms.created_at       = '';
        this.forms.updated_at       = '';
        this.image_upload           = '';
        this.modal.set('create', true);
    },

	formatNumberRupiah (value) {
      return accounting.formatMoney(value,  "", 0, ".")
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
        return axios.get(`/rajawaliadmin/get-list-banner?per_page=${this.serverParams.per_page}&page=${this.serverParams.page}&sort_field=${this.serverParams.sort.field}&sort_type=${this.serverParams.sort.type}&sequence=${this.serverParams.columnFilters.sequence}`).then((response) => {
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