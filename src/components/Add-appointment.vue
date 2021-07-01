<template>
  <v-row justify="center ">
    <v-dialog v-model="dialog" persistent max-width="600px">
      <template v-slot:activator="{ on, attrs }">
        
          <v-row class="mb-6 " no-gutters>
            <v-col md="4">
              <v-btn
                class="mx-5 float-right"
                fab
                dark
                color="indigo"
                v-bind="attrs"
                v-on="on"
              >
                <v-icon dark>
                  mdi-plus
                </v-icon>
              </v-btn>
            </v-col>
            <v-col md="4" offset-md="4">
              <v-btn class="red white--text" v-on:click="logout">Logout</v-btn>
            </v-col>
          </v-row>
      </template>
      <v-card>
        <v-card-title>
          <span class="text-h5">Slots</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12" sm="6" md="4">
                <v-text-field
                  label="date :"
                  type="date"
                  v-model="date"
                ></v-text-field>
              </v-col>
              <v-btn depressed color="primary" @click="dateDispo()">
                search
              </v-btn>
              <v-col cols="12" sm="6">
                <v-select
                  label="Time"
                  :items="timeDis"
                  v-model="time"
                ></v-select>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn depressed color="error" @click="dialog = false">
            Close
          </v-btn>
          <v-btn
            depressed
            color="primary"
            @click="
              addSlots();
              getdata();
            "
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
// import {getSlots} from "../methods.js"

export default {
  data() {
    return {
      dialog: false,
      slots: [],
      items: ["08-09", "09-10", "10-11", "11-12", "15-16", "16-17", "16-18"],
      timeDis: [],
      data: [],
    };
  },
  mounted() {},

  methods: {
    addSlots() {
      var slots = {
        date: this.date,
        time: this.time,
        reference: localStorage.getItem("reference"),
      };
      // var getslot = import('../methods.js');

      axios({
        method: "post",
        url: "http://localhost:7882/RDV-Cabinet-Médical/create",
        data: slots,
      }).then(function(response) {
        Array.prototype.push.apply(this.data, this.slots);
        console.log(data);
        console.log(slots);
      });
      // this.$router.push('./slots');

      return (this.dialog = false);
    },
    getdata() {
      axios
        .get("http://localhost:7882/RDV-Cabinet-Médical/read")
        .then((response) => (this.slots = response.data.slots))
        .then((slots) => {
          var ref = localStorage.getItem("reference");
          this.slots = this.slots.filter((slot) => {
            return slot.reference == ref;
          });
          //  window.location.href = './slots';
        })
        .catch((error) => console.log(error));
      this.$emit("clicked", "someValue");
    },

    //Date Disponible
    dateDispo() {
      var timeDispo = {
        date: this.date,
      };
      var timeData;

      axios({
        method: "post",
        url: "http://localhost:7882/RDV-Cabinet-Médical/TimeDispo",
        data: timeDispo,
      })
        .then(function(response) {
          timeData = response.data.map((time) => time.Time);
        })
        .then((response) => {
          console.log(timeData);
          this.timeDis = this.items.filter((e) => !timeData.includes(e));

          console.log(this.timeDis);
        })

        .catch(function(error) {});
    },
    logout() {
      localStorage.removeItem("reference");
      window.location.href = "./";
    },
  },
};
</script>
