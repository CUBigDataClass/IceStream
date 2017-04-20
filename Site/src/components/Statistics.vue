<template>
  <div id="statstics">
    <h1>{{ msg }}</h1>
    <button class="btn btn-primary btn-lg" v-on:click="greet">Test</button>
  </div>
</template>

<script>
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)
export default {
  name: 'statstics',
  data () {
    return {
      msg: 'Click Button To statstics'
    }
  },
  methods: {
    greet: function (event) {
      axios.get('/api/statstics').then(
        response => { console.log(response); alert(response.data.message) }
      )
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
#statstics {
  text-align: center;
}

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
