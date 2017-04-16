<template>
  <div id="index">
    <ol-map>
      <ol-marker/>
      <ol-marker :coords= "[-87.723822, 41.861574]" />
      <ol-marker :coords= "[-87.603792, 41.745019]" />
      <ol-marker :coords= "[-87.632985, 41.746776]" />
      <ol-marker :coords= "[-87.758888,41.973387]" />
      <ol-marker :coords= "[-87.680484,41.802076]" />
      <ol-marker :coords= "[-87.70508,41.84588]" />
      <ol-marker :coords= "[-87.687357,41.915535]" />
      <ol-marker :coords= "[-87.621995,41.780946]" />
      <ol-marker :coords= "[-87.629285,41.877669]" />
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
