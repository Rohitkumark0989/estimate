<template>



<div class="container">

  <div class="row col-sm-6 justify-content-center">

  <h3>Welcome to Question Panel</h3>
   <add-item-form :items="items" /> 
  
</div> 
</div>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" defer></script> -->

</template>
<script>
import addItemForm from "./addItemForm.vue"
export default {
    components:{
        addItemForm
    },
    data: function(){
        return {
            items:[]
        }
    },
    methods: {
        getList (){
            axios.get('/api/items')
            .then( response => {
                this.items = response.data
            })
            .catch( error => {
                console.log(error);
            })
        }
    },

    created(){
        this.getList();
    }
}
</script>