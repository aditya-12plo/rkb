 <template>
 <div>
    <div class="real-button-actions">
        <button v-if="rowData.image_deposit" class="btn btn-sm" @click="itemAction('download', rowData, rowIndex)"> Download </button>
        <button v-if="rowData.image_withdrawal" class="btn btn-sm" @click="itemAction('download', rowData, rowIndex)"> Download </button>
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
          if(action === "download"){
            this.$root.$emit('downloaditem', data , index);
            
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
    .history-button-actions button.ui.button {
      padding: 8px 8px;
    }
    .history-button-actions button.ui.button > i.icon {
      margin: auto !important;
    }
  </style>