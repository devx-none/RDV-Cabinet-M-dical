/*eslint-disable*/
import axios from "axios";

module.exports = {
    getSlots:()=>{
        axios.get('http://localhost:7882/RDV-Cabinet-Médical/app/controllers/creneaux/Read.php')
        .then(response =>slots=response.data.slots)
        .then((slots) => {
           var ref = localStorage.getItem('reference')
           this.slots = slots.filter(slot=>{
                 return slot.reference == ref
           })
         })
        .catch(error =>console.log(error))
     
      }
}