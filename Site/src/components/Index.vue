<template>
  <div id="index">
    <ol-map>
      <ol-marker v-for="item in postData" :coords="[parseFloat(item.longitude), parseFloat(item.latitude)]"/>
      <!-- <ol-marker :coords= "[-87.758888,41.973387]" /> -->
    </ol-map>
  </div>
</template>

<script>
import Vue from 'vue'
import VueOL from '../olwrapper/main'
import postData from '../dataset/Chicago_small.json'
Vue.use(VueOL)
export default {
  name: 'index',
  data () {
    return {
      // msg: 'Welcome to Your Vue.js App'
      postData
    }
  },
  created: function () {
    console.log('index error')
  }
}
/* for testing
for (var i = 0; i < 3; i++) {
  alert(postData[i].longitude)
  // alert(postData[i].latitude)
}
*/
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
