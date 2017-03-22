<template>
  <div class="hello">
    <ol-map> 
   <ol-marker/>
   <ol-marker :coords= "[-38.5433, -3.71722]" /> 
   <ol-marker :coords= "[-38.5432, -3.71722]" /> 
   <ol-marker :coords= "[-38.5434, -3.71722]" /> 
    </ol-map>
  </div>
</template>

<script>
import Vue from 'vue'
import VueOL from '../olwrapper/main'
Vue.use(VueOL)
export default {
  name: 'hello',
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
h1, h2 {
  font-weight: normal;
}

ul {
  list-style-type: none;
  padding: 0;
}

li {
  display: inline-block;
  margin: 0 10px;
}

a {
  color: #42b983;
}
</style>
