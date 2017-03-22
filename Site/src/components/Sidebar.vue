<template>
  <div class="sidebar">
  <a href="javascript:void(0)" class="closebtn">&times;</a>
  <div class="city">
  <span>City</span>
  </div>
  <div class="date">
    <span>Date</span>
  </div>
  <div class="crimeType">
    <span>Crime Type</span>
  </div>
</div>
</template>

<script>
  export default {
    name: 'sidebar'
  }
</script>

<style scoped>
.sidebar{
  background-color: #222;
  width:15%;
  height:100%;
  position: fixed;
  color:white;
  font-size: 1.2em;
  margin-top:-2%;
}

.nav navbar-nav li{
  display: block;
}

.sidebar a {
  color: white;
  display: block;
  padding-left: 5%;
}

.city span{
  padding-left: 5%;
}

.date span{
  padding-left: 5%;
}

.crimeType span{
  padding-left: 5%;
}

</style>
