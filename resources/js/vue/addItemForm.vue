<template>
  <div> 
      <!-- <form method="POST" action="/user/answers"> -->
        <div v-for="(item, index) in items">
                
                <div class="form-group">
                    <label for="exampleInputEmail1">{{item.questions}}</label>
                    <input type="text" class=" form-control form-control-lg"  v-model="answers[index]" :key="index"    required aria-describedby="emailHelp" placeholder="Enter Answer">
                </div>
        </div>
        
   <div class="form-group">
       <div class="input-group" id="datetimepicker">
                <input type="text" name="datetime" v-model="calender" class=" form-control form-control-lg" required  placeholder="Please Pick Date & Time">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span> 
                </span>
       </div>
   </div>

  
  <button @click="addItem()"  class="btn btn-primary col-sm-12">Submit</button>
  <!-- </form> -->

  </div>

</template>

<script>
export default {
    props: ['items'],
    data: function(){
         return {
             calender:'',
             answers: [],
             questions: []
         }   
    },
    methods:{
        addItem(){
            
            
            if(this.answers == ''){ 
                return;
            }
            this.questions = this.items;

            //this.responses.push({'value':this.response});
            axios.post('/api/item/store',{
                answers: this.answers,
                questions: this.questions,
                datetime: this.calender
            })
            .then( response => {
                if ( response.stauts == 201 ){
                    this.item.answers == "";
                }
            })
            .catch( error => {
                console.log(error)
            })
        }
    },

}
</script>