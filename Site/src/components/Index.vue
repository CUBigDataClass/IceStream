<template>
  <div id="index">
    <ol-map>
   <ol-marker/>
   <ol-marker :coords= "[-87.723822, 41.861574]" />
   <ol-marker :coords= "[-87.603792, 41.745019]" />
   <ol-marker :coords= "[-87.632985, 41.746776]" />
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
