<template>
  <div class="hello">
    <div class="top">
      <ul>
        <li><router-link to="#menu">☰ Menu</router-link></li>
        <li style="float:right"><router-link to="/login">LogIn</router-link></li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  name: 'hello'
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
  @import '../css/Hello.scss'
</style>
