<template>
<v-row  >
    <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
    >
      <template v-slot:activator="{ on, attrs }" >
        
            <v-btn tile color="success" v-bind="attrs" v-on="on" class="edit" >
              <v-icon left> mdi-pencil </v-icon>
              Edit
            </v-btn>
          
      </template>
      <v-card>
        <v-card-title>
          <span class="text-h5">Slots</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col
                cols="12"
                sm="6"
                md="4"
              >
                <v-text-field
                  label="date :"
                  type="date"
                  v-model="date"
                ></v-text-field>
              </v-col>
        
              <v-col
                cols="12"
                sm="6"
              >
                <v-select
                  :items="['8-10', '10-11', '11-12', '15-16']"
                  label="Time"
                  v-model="time"
                  
                ></v-select>
              </v-col>
              
            </v-row>
          </v-container>
         
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            depressed
            color="error"
            @click="dialog = false"
          >
            Close
          </v-btn>
          <v-btn
            depressed
            color="primary"
            @click="addSlots"
          >
            Save
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>


<script>
/*eslint-disable*/

import axios from "axios";
  export default {
    data: () => ({
      dialog: false,
    }),
    methods : {
    addSlots(){
      var slots ={
        date :this.date,
        time :this.time

      }
      axios({
        method: 'post',
        url:'http://localhost:7882/vuejs-exemple/app/controllers/creneaux/AddCrenaux.php',
        data: slots
      })
      .then(function(response){
        
      })
      return this.dialog=false;
      
    }
    
    }
  }
</script>
<style scoped>
.edit{
    /* display: flex;
    flex-direction: column; */
    
    
}

</style>