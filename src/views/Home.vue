
<template>
  <v-app id="inspire">
    <v-content>
      <v-container class="fill-height" fluid>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="8" md="8">
            <v-card class="elevation-12">
              <v-window v-model="step">
                <v-window-item :value="1">
                  <v-row>
                    <v-col cols="12" md="8">
                      <v-card-text class="mt-12">
                        <h1
                          class="text-center display-2 blue--text text--lighten-3"
                        >
                          Sign in
                        </h1>
                        <v-alert
                        color="error"
                        :value="error"
                        icon="close"
                        >
                        the email or password is invalid

                        </v-alert>
                        <v-form>
                          <v-text-field
                            label="Email"
                            name="email"
                            prepend-icon="email"
                            type="text"
                            color="blue accent-3"
                            v-model="email"
                          />

                          <v-text-field
                            id="password"
                            label="Password"
                            name="password"
                            prepend-icon="lock"
                            type="password"
                            color="blue accent-3"
                            v-model="password"
                          />
                        </v-form>
                      </v-card-text>
                      <div class="text-center mt-3">
                        <v-btn rounded color="blue lighten-1" dark
                          @click="login">SIGN IN</v-btn
                        >
                      </div>
                    </v-col>
                    <v-col cols="12" md="4" class="blue lighten-1">
                      <v-card-text class="white--text mt-12">
                        <h1 class="text-center display-1">NEW USER</h1>
                      </v-card-text>
                      <div class="text-center">
                        <v-btn rounded outlined dark @click="step++"
                          >SIGN UP</v-btn
                        >
                      </div>
                    </v-col>
                  </v-row>
                </v-window-item>
                <v-window-item :value="2">
                  <v-row class="fill-height">
                    <v-col cols="12" md="4" class="teal accent-3">
                      <v-card-text class="white--text mt-12">
                        <h1 class="text-center display-1">RETURNING USER</h1>
                      </v-card-text>
                      <div class="text-center">
                        <v-btn rounded outlined dark @click="step--"
                          >Sign in</v-btn
                        >
                      </div>
                    </v-col>

                    <v-col cols="12" md="8">
                      <v-card-text class="mt-12">
                        <h1
                          class="text-center display-2 teal--text text--accent-3"
                        >
                          Create Account
                        </h1>

                        <v-form>
                          <v-text-field
                            label="First name"
                            name="First_name"
                            prepend-icon="person"
                            type="text"
                            color="teal accent-3"
                            v-model="first_name"
                          />
                          <v-text-field
                            label="Last name"
                            name="Last_name"
                            prepend-icon="person"
                            type="text"
                            color="teal accent-3"
                            v-model="last_name"
                          />
                          <v-text-field
                            type="date"
                            name="date"
                            prepend-icon="person"
                            label="Date"
                            color="teal accent-3"
                            v-model="birthday"
                          />
                          <v-text-field
                            label="Email"
                            name="Email"
                            prepend-icon="email"
                            type="text"
                            color="teal accent-3"
                            v-model="Email"
                          />

                          <v-text-field
                            label="Password"
                            name="Password"
                            prepend-icon="lock"
                            type="password"
                            color="teal accent-3"
                            v-model="Password"
                          />
                        </v-form>
                      </v-card-text>
                      <div class="text-center mt-n5">
                        <v-btn rounded color="teal accent-3" dark
                         @click="register" >SIGN UP</v-btn
                        >
                      </div>
                    </v-col>
                  </v-row>
                </v-window-item>
              </v-window>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-content>
  </v-app>
</template>

<script>
/*eslint-disable*/

import axios from "axios";
import {mapState} from "vuex";

export default {
  data: () => ({
    step: 1,
    users :[],
    error :false,
    return: {
      email:'',
      password:'',
      
    

  },
  }),
 
  props: {
    source: String,

  },
  
    methods:{
    login(){
      var user ={
        email : this.email,
        password : this.password,
     
        
      }
      axios({
        method: 'post',
        url: 'http://localhost:7882/RDV-Cabinet-Médical/login',
        data : user
      })
      .then(function(response){
   
          localStorage.setItem('reference',response.data[0].reference);

         var ref = localStorage.getItem('reference');
         if(ref!=null){
          //  this.$router.push('./slots');
           window.location.href = './slots';
          
 
         } 

         
      })
      .catch(function(error){
       
      })
     
      
       
    
      // this.$router.push('./slots');
    
    },
    register(){
      var users ={
        nom:this.first_name,
        prenom:this.last_name,
        age:this.birthday,
        email : this.Email,
        password : this.Password

    }
    axios({
      method: 'post',
      url:'http://localhost:7882/RDV-Cabinet-Médical/app/controllers/users/createUser.php',
      data: users
    })
    .then(function(response) {
              console.log(response.data);

    })
     .catch(function(error){
       
      })

    
  }
}
}

</script>
