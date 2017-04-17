<template>
  <div id="app">
  <v-app top-toolbar left-fixed-sidebar sidebar-under-toolbar>

  <!--<header>-->
    <!--Navbar-->
    <div class="navbar">
      <v-toolbar fixed class="green darken-2">
        <v-toolbar-side-icon @click.native.stop="openSidebar()"></v-toolbar-side-icon>
        <v-toolbar-title ><h3>Green Arrow</h3></v-toolbar-title>

        <v-toolbar-items ripple>
          <v-toolbar-item ripple>
            <router-link to="/">
              Map
            </router-link>
          </v-toolbar-item>
          <v-toolbar-item>
            <router-link to="/login">
                Statistics
            </router-link>
          </v-toolbar-item>
          <v-toolbar-item>
            <a href="https://github.com/CUBigDataClass/IceStream">Github Repo</a>
          </v-toolbar-item>
          <v-toolbar-item>
            <router-link to="/login">
              <span class="glyphicon glyphicon-log-in"></span>
                Login
            </router-link>
          </v-toolbar-item>
        </v-toolbar-items>
      </v-toolbar>
    </div>
  <!--</header>-->

  <!--sidebar-->
  <div class="flosidebar">
    <v-sidebar fixed class="red darken-2 white--text" v-model="sidebar">
      <!--title-->
      <div class="px-4">
        <h3 class="mt-3">FILTERS</h3>
      </div>
      <v-divider></v-divider>

      <!--city - try this transition next time-->
      <div class="city2">
        <v-menu transition="v-scale-transition">
          <v-btn success slot="activator">Select City</v-btn>
          <v-list>
              <v-list-item v-for="n in 5" :key="n">
                <v-list-tile>
                  <v-list-tile-title v-text="'Item ' + n" class="green--text"/>
                </v-list-tile>
            </v-list-item>
          </v-list>
        </v-menu>
      </div><!-- end of div class="city2" -->

      <div class="city">
        <h4>City</h4>
        <hr/>
        <!--select button-->
        <div class="select type">
          <select class="white black--text" v-model="selected">
            <option disabled value="">Please select a city</option>
            <optgroup label="IL">
              <option value="Chicago">Chicago</option>
            </optgroup>
            <optgroup label="CO">
              <option value="Denver">Denver</option>
            </optgroup>
            <optgroup label="WA">
              <option value="Seattle">Seattle</option>
            </optgroup>
          </select>
        </div>
      </div> <!-- end of div class="city" -->
      <v-divider></v-divider>
      <template v-if="this.selected == ''">
        <button title="Please select a city!" disabled class="btn btn-primary green">submit</button>
      </template>
      <template v-else>
        <button @click="submitButton" class="btn btn-primary green">submit</button>
      </template>
      <v-divider></v-divider>

      <!--date-->
      <div class="date-select">
        <h4>Date</h4>
        <hr />
        <!--datepicker-->
        <h5>From</h5>
        <datepicker class="white black--text" v-model="start"></datepicker>
        <h5>To</h5>
        <datepicker class="white black--text" v-model="end"></datepicker>
      </div><!-- end of div class="date-select" -->
      <v-divider></v-divider>

      <!--crime type-->
      <div class="crimetype">
        <h4>Crime Type</h4>
        <hr />
        <input type="checkbox" id="crimetype1" value="crimetype1" v-model="crimetype">
        <label for="crimetype1">crimetype1</label>
        <input type="checkbox" id="crimetype2" value="crimetype2" v-model="crimetype">
        <label for="crimetype2">crimetype2</label>
        <br>
        <input type="checkbox" id="crimetype3" value="crimetype3" v-model="crimetype">
        <label for="crimetype3">crimetype3</label>
        <input type="checkbox" id="crimetype4" value="crimetype4" v-model="crimetype">
        <label for="crimetype4">crimetype4</label>
      </div><!-- end of div class="crimetype" -->
    </v-sidebar>
  </div>

  <!--content-->
  <div class="content">
    <v-content class="pt-0">
        <transition mode="out-in">
          <router-view></router-view>
        </transition>
    </v-content>
  </div>

</v-app>
</div>
</template>

<script>
import Vue from 'vue'
import datepicker from 'vue-date'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)
export default {
  name: 'app',
  components: { datepicker },
  data () {
    return {
      sidebar: false,
      checkedNames: [],
      start: '',
      end: '',
      selected: '',
      crimetype: []
    }
  },
  methods: {
    openSidebar () {
      this.sidebar = !this.sidebar
    },
    submitButton: function () {
      axios.get('/api/', {
        params: {
          City: this.selected,
          Crimetype: this.crimetype,
          Starttime: this.start,
          Endtime: this.end
        }
      })
      .then(function (response) {
        console.log(response)
      })
      .catch(function (error) {
        console.log(error)
      })
    }
  }
}
</script>

<style scoped>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  margin-top: 0px;
}

a {
    color: white;
    font-size: 1.2em;
}

.navbar {
    margin:0;
    height:64px;
}

.navbar a {
 height: 36px;
}



.content {
    word-wrap: break-word;
}

.crimetype {
    font-size: 1.2em;
    padding-left: 5%;
    padding-right:5%;
}

.select type {
    color:white;
    border-color: white;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.4);
    border: solid 2px white;
}

.city {
    font-size: 1.2em;
    padding-left: 5%;
    padding-right:5%;
}

.date-select {
    font-size: 1.2em;
    padding-left: 5%;
    padding-right:5%;
}

.crimetype {
    font-size: 1.2em;
    padding-left: 5%;
    padding-right:5%;
}
.datepicker {
    padding-left:5%;
}

.flosidebar button {
  margin-left: 5%;
}

.flosidebar {
  margin:0;
}

.content {
  margin: 0;
}

.navbar a {
  text-align: center;
}

</style>
