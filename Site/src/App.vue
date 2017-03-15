<template>
  <div id="app">
    <v-sidebar></v-sidebar>
    <router-view></router-view>
  </div>

</template>

<script>
// import Navbar from '@/components/Navbar'
import Sidebar from '@/components/Sidebar'

export default {
  name: 'app',
  components: {
    // 'v-navbar': Navbar,
    'v-sidebar': Sidebar
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 0px;
}
</style>
