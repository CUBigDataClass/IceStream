<template>
  <div id="app">
    <router-view></router-view>
    <v-Sidebar></v-Sidebar>
    
  </div>
</template>

<script>
import Sidebar from '@/components/Sidebar'
export default {
  name: 'app',
  components: {
    'v-Sidebar': Sidebar
  }
}
</script>
<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  margin-top: 0px;
}
</style>
