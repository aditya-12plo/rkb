<template>
  <div> 
  <loading :active.sync="isLoading"></loading>



<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
      <h3 class="animated fadeInLeft" style="text-align:center;font-size: 3em;">Add New Real Account</h3>
    </div>
  </div>
</div>


<form @submit.prevent="submitData" method="POST"> 
<div class="col-md-12 padding-0">
  <div class="panel form-element-padding">
  <div class="panel-body" style="padding-bottom:30px;">

            <div class="form-group col-lg-12">
                <label for="input1">Acc No <span style="color:red;">*</span></label>
                <input v-model="forms.account_number" type="text" minlength="2" maxlength="255" class="form-control" required="" aria-required="true">
                 <span class="label label-danger" v-for="error of errors['account_number']">
                    {{ error }}
                </span>
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">Email <span style="color:red;">*</span></label>
                <input v-model="forms.email" type="email" maxlength="255" class="form-control" required="" aria-required="true">
                 <span class="label label-danger" v-for="error of errors['email']">
                    {{ error }}
                </span>
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">Password <span style="color:red;">*</span></label>
                <input v-model="forms.password" type="password" maxlength="255" class="form-control" required="" aria-required="true">
                 <span class="label label-danger" v-for="error of errors['password']">
                    {{ error }}
                </span>
            </div>

            
            <div class="form-group col-lg-12">
                <label for="input1">Referral Code</label>
                <input v-model="forms.referral_code" type="text" maxlength="255" class="form-control">
                 <span class="label label-danger" v-for="error of errors['referral_code']">
                    {{ error }}
                </span>
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">name <span style="color:red;">*</span></label>
                <input v-model="forms.name" type="text" maxlength="255" class="form-control" required="" aria-required="true">
                 <span class="label label-danger" v-for="error of errors['name']">
                    {{ error }}
                </span>
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">phone <span style="color:red;">*</span></label>
                <input v-model="forms.phone" type="text" minlength="2" maxlength="15" class="form-control" @keypress="isNumber($event)" required="" aria-required="true">
                 <span class="label label-danger" v-for="error of errors['phone']">
                    {{ error }}
                </span>
            </div>

            <div class="form-group col-lg-12">
                <div class="form-group col-lg-6">
                <label for="input1">Place Of Birth <span style="color:red;">*</span></label>
                <input v-model="forms.place_of_birth" type="text" maxlength="255" class="form-control" required="" aria-required="true">
                 <span class="label label-danger" v-for="error of errors['place_of_birth']">
                    {{ error }}
                </span>
                </div>
                <div class="form-group col-lg-6">
                <label for="input1">Date Of Birth <span style="color:red;">*</span></label>
                <datepicker v-model="forms.tanggal_lahir"  :typeable="true" :format="customFormatter" placeholder="YYYY-MM-DD"></datepicker>
                 <span class="label label-danger" v-for="error of errors['date_of_birth']">
                    {{ error }}
                </span>
                </div>
            </div>

            <div class="form-group col-lg-12">
                <div class="form-group col-lg-6">
                <label for="input1">Province <span style="color:red;">*</span></label>
                <input v-model="forms.province" type="text" maxlength="255" class="form-control" required="" aria-required="true">
                 <span class="label label-danger" v-for="error of errors['province']">
                    {{ error }}
                </span>
                </div>
                <div class="form-group col-lg-6">
                <label for="input1">City <span style="color:red;">*</span></label>
                <input v-model="forms.city" type="text" maxlength="255" class="form-control" required="" aria-required="true">
                 <span class="label label-danger" v-for="error of errors['city']">
                    {{ error }}
                </span>
                </div>
            </div>


            <div class="form-group col-lg-12">
                <div class="form-group col-lg-6">
                <label for="input1">Area / Kecamatan <span style="color:red;">*</span></label>
                <input v-model="forms.area" type="text" maxlength="255" class="form-control" required="" aria-required="true">
                 <span class="label label-danger" v-for="error of errors['area']">
                    {{ error }}
                </span>
                </div>
                <div class="form-group col-lg-6">
                <label for="input1">Sub Area / Kelurahan <span style="color:red;">*</span></label>
                <input v-model="forms.sub_area" type="text" maxlength="255" class="form-control" required="" aria-required="true">
                 <span class="label label-danger" v-for="error of errors['sub_area']">
                    {{ error }}
                </span>
                </div>
            </div>

            <div class="form-group col-lg-12">
                <div class="form-group col-lg-6">
                <label for="input1">Village </label>
                <input v-model="forms.area" type="text" maxlength="255" class="form-control">
                 <span class="label label-danger" v-for="error of errors['area']">
                    {{ error }}
                </span>
                </div>
                <div class="form-group col-lg-6">
                <label for="input1">Postal Code <span style="color:red;">*</span></label>
                <input v-model="forms.postal_code" type="text" minlength="2" maxlength="7" class="form-control" @keypress="isNumber($event)" required="" aria-required="true">
                 <span class="label label-danger" v-for="error of errors['postal_code']">
                    {{ error }}
                </span>
                </div>
            </div>

            <div class="form-group col-lg-12">
                <label for="input1">Address</label>
                <textarea v-model="forms.address" class="form-control border-bottom" aria-required="true" required></textarea>
                 <span class="label label-danger" v-for="error of errors['address']">
                    {{ error }}
                </span>
            </div>


            <div class="form-group col-lg-12">
                <div class="form-group col-lg-6">
                <label for="input1">Identity type <span style="color:red;">*</span></label>
                <select v-model="forms.type_of_identity_card" class="form-control" id="type_of_identity_card" required>
                    <option value="KTP">KTP</option>
                    <option value="SIM">SIM</option>
                    <option value="PASPOR">PASPOR</option>
                </select>
                 <span class="label label-danger" v-for="error of errors['type_of_identity_card']">
                    {{ error }}
                </span>
                </div>
                <div class="form-group col-lg-6">
                <label for="input1">Identity Number <span style="color:red;">*</span></label>
                <input type="text" v-model="forms.identity_card_number" class="form-control" @keypress="isNumber($event)" required>
                 <span class="label label-danger" v-for="error of errors['identity_card_number']">
                    {{ error }}
                </span>
                </div>
            </div>


            <div class="form-group col-lg-12">
                <div class="form-group col-lg-6">
                <label for="tax_number">NPWP Number <span style="color:red;">*</span></label>
                <input type="text" v-model="forms.tax_number" class="form-control" required>
                 <span class="label label-danger" v-for="error of errors['tax_number']">
                    {{ error }}
                </span>
                </div>
                <div class="form-group col-lg-6">
                <label for="input1">implementing_commodity_trade_transaction <span style="color:red;">*</span></label>
                <input type="text" v-model="forms.name_implementing_commodity_trade_transaction" class="form-control" required>
                 <span class="label label-danger" v-for="error of errors['name_implementing_commodity_trade_transaction']">
                    {{ error }}
                </span>
                </div>
            </div>


            <div class="form-group col-lg-12">
                <div class="form-group col-lg-6">
                <label for="input1">Gander <span style="color:red;">*</span></label>
                <select v-model="forms.gander" class="form-control" id="gander" required>
                    <option value="Laki-laki">Men</option>
                    <option value="Perempuan">Women</option>
                </select>
                 <span class="label label-danger" v-for="error of errors['gander']">
                    {{ error }}
                </span>
                </div>
                <div class="form-group col-lg-6">
                <label for="input1">Identity Number <span style="color:red;">*</span></label>
                <input type="text" v-model="forms.identity_card_number" class="form-control" @keypress="isNumber($event)" required>
                 <span class="label label-danger" v-for="error of errors['identity_card_number']">
                    {{ error }}
                </span>
                </div>
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
import Datepicker from 'vuejs-datepicker'
import 'vue-loading-overlay/dist/vue-loading.css'


Vue.use(VueSweetalert2)
Vue.use(Loading)
Vue.use(VueEvents)


export default {
  components: { 
    Datepicker,  
    Loading
  },
  data () {
    return { 
      isLoading: false,
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
      
    customFormatter(date) {
      return moment(date).format('YYYY-MM-DD');
    },
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
  }

}
</script>
<style> 
</style>