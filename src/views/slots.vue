<template>
<v-flex class="pa-md-5 mx-lg-auto" >
  <Addappointment/>
  <v-simple-table  class="col-8 offset-md-2">
    
    <template>
      
      <thead class="primary ">
        <tr>
          <th class="text-left ">id</th>
          <th class="text-left">date</th>
          <th class="text-left">time</th>
          <th class="">Action</th>
        </tr>
      </thead>
      
      <tbody >
        <tr v-for="slot in slots" :key="slot" >
          <td>{{slot.id}}</td>
          <td>{{slot.date}}</td>
          <td>{{slot.time}}</td>
            <!-- <v-btn tile color="success">
              <v-icon left> mdi-pencil </v-icon>
              Edit
            </v-btn> -->
            <div class="row">
            <editSlots />
            <v-btn color="error" @click="deleteSlots(slot.id)"> Delete </v-btn>
             </div>
        </tr>
      </tbody>
    </template>
    
  
  </v-simple-table>
</v-flex>

</template>

<script>
/*eslint-disable*/

import axios from "axios";
import Addappointment from '@/components/Add-appointment.vue'
import editSlots from '@/components/EditSlots.vue'
export default {
      components: {
       Addappointment : Addappointment,
       editSlots :editSlots
       },

  data() {
    return {
    
    slots :[]
    }
  },
  created(){
    this.getSlots();
  },
    methods:{
    
    getSlots(){
      axios.get('http://localhost:7882/RDV-Cabinet-Médical/app/controllers/creneaux/Read.php')
      .then(response =>this.slots=response.data.slots)
      .then((slots) => {
      })
      .catch(error =>console.log(error))
   
    },
    deleteSlots(id){
      axios.delete('http://localhost:7882/RDV-Cabinet-Médical/app/controllers/creneaux/Delete.php?id='+id)
      .then(response =>{
        this.slots = this.slots.filter(slot=>{
               return slot.id !== id
        });
      })
      .catch(error =>console.log(error))
    },
    addSlots(){
      var slots ={
        date :this.date,
        time :this.time

      }
      axios({
        method: 'post',
        url:'//localhost:7882/vuejs-exemple/app/controllers/creneaux/AddCreneaux.php',
        data: slots
      })
      .then(function(response){
        console.log(slots.date);
      })
    }
  }
};
</script>
<style scoped>
 .row{
display: inline-block;
padding: 10px;  
}
</style>