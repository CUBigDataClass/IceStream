<template>
  <div class="hello">
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <router-link to="/" class="navbar-brand">Green Arrow</router-link>
        </div>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><router-link to="/login"><span class="glyphicon glyphicon-log-in"></span> Login</router-link></li>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: 'hello'
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss">
</style>
