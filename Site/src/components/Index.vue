<template>
  <div id="index">
    <ol-map> 
      <ol-marker/>
      <ol-marker :coords= "[-38.5430, -3.71720]" /> 
      <ol-marker :coords= "[-38.5432, -3.71724]" /> 
      <ol-marker :coords= "[-38.5434, -3.71725]" /> 
      <ol-marker :coords= "[-38.5436, -3.71726]" /> 
    </ol-map>
  </div>
</template>

<script>
import Vue from 'vue'
import VueOL from '../olwrapper/main'
Vue.use(VueOL)
export default {
  name: 'index',
  data () {
    return {
      msg: 'Welcome to Your Vue.js App'
    }
  },
  created: function () {
    console.log('xxxerror')
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
