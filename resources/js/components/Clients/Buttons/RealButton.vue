 <template>
 <div>
    <div class="real-button-actions">

      <button v-if="rowData.status == 'on-progress'" class="btn btn-sm" @click="itemAction('edit-data', rowData, rowIndex)"><i class="fa fa-edit"> edit-item</i></button>
      <button v-if="rowData.status == 'approved'" class="btn btn-sm" @click="itemAction('print-data', rowData, rowIndex)"><i class="fa fa-download"> download</i></button>
       <button v-if="rowData.status == 'review'" class="btn btn-sm" @click="itemAction('print-data', rowData, rowIndex)"><i class="fa fa-download"> download </i></button>
    </div>
</div>
  </template>

  <script>

  export default {
    props: {
      rowData: {
        type: Object,
        required: true
      },
      rowIndex: {
        type: Number
      }
    },
    methods: {
      itemAction (action, data, index) {
          if(action === "edit-data"){
            this.$root.$emit('edititem', data , index);
            
          }else if(action === "print-data"){
                  this.$root.$emit('printitem', data , index);
          }else{
            alert('error');
          }
        
      }
    },
      
		mounted() { 
             
        }
    
  }
  </script>

  <style>
    .real-button-actions button.ui.button {
      padding: 8px 8px;
    }
    .real-button-actions button.ui.button > i.icon {
      margin: auto !important;
    }
  </style>