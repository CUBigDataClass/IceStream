<template>
  <div id="city">

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
      itemGroup: [
        { header: 'City' },
        {
          title: 'City',
          group: '/city',
          items: [
            { title: 'Chicago' },
            { title: 'Denver' },
            { title: 'Seattle' }
          ]
        },
        { title: 'Link' },
        { title: 'Link' },
        { divider: true },
        { header: 'Another Header' },
        { title: 'Link' }
      ]
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
