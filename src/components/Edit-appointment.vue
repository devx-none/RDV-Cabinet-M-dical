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
                  :value="slot.date"
                  v-model="date"
                ></v-text-field>
              </v-col>
                <v-btn
            depressed
            color="primary"
            @click="dateDispo()"
          >
            search
          </v-btn>
              <v-col
                cols="12"
                sm="6"
              >
                 <v-select
                  label="Time"
                  :items="timeDis"
                  v-model="time"
                  
                ></v-select>
                <!-- <select v-model="time">
                  <option v-for="timeDispo in timeDis" :key="timeDispo" :value="timeDise">{{timeDispo}}</option>

                </select> -->
               
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
            @click="editSlots(slot.id)"
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
    props:{
      slot : Object,
      getAllData :Object,
    },
    data: () => ({
      dialog: false,
      items :['08-09','09-10','10-11','11-12','15-16','16-17','16-18'],
      
      timeDis:[],


    }),


    methods : {

    editSlots(id){
      var slots ={
        date :this.date,
        time :this.time

      }
      axios({
        method: 'post',
        url:'http://localhost:7882/RDV-Cabinet-Médical/app/controllers/Update.php?id='+id,
        data: slots
      })
      .then(function(response){

      })
       this.$emit('clicked',slots);


      return this.dialog=false;
       

    },
  
    
  dateDispo(){
    var timeDispo ={
        date : this.date,
      };
      var timeData;

      
      axios({
        method: 'post',
        url: 'http://localhost:7882/RDV-Cabinet-Médical/TimeDispo',
        data : timeDispo,
      })
      .then(function(response){

          timeData = response.data.map(time => time.Time);
           

      })
      .then((response) => {
        console.log(timeData);
              this.timeDis = this.items.filter((e)=>!timeData.includes(e));

        console.log(this.timeDis);
      })
    
      .catch(function(error){
       
      })


    },

  }
  }
</script>
