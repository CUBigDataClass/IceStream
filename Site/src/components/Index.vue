<template>
  <div id="index">
    <ol-map>
      <ol-marker v-for="item in chicagoData" :coords="[parseFloat(item.longitude), parseFloat(item.latitude)]"/>
      <ol-marker v-for="item in bostonData" :coords="[parseFloat(item.lon), parseFloat(item.lat)]"/>
      <ol-marker v-for="item in detroitData" :coords="[parseFloat(item.lon), parseFloat(item.lat)]"/>
      <!-- <ol-marker :coords= "[-87.758888,41.973387]" /> -->
    </ol-map>
  </div>
</template>

<script>
import Vue from 'vue'
import VueOL from '../olwrapper/main'
import chicagoData from '../dataset/Chicago_small.json'
import bostonData from '../dataset/Boston_small.json'
import detroitData from '../dataset/detroit_small.json'
Vue.use(VueOL)
export default {
  name: 'index',
  data () {
    return {
      // msg: 'Welcome to Your Vue.js App'
      chicagoData,
      bostonData,
      detroitData
    }
  },
  created: function () {
    console.log('index error')
  }
}
/* for testing -- deletable
for (var i = 0; i < 3; i++) {
  alert(chicagoData[i].longitude)
  // alert(chicagoData[i].latitude)
}
*/
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
