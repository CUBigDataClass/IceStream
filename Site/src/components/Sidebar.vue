<template>
<<<<<<< HEAD
<v-app top-toolbar left-fixed-sidebar sidebar-under-toolbar>
    <header>
        <v-toolbar class="green darken-1">
            <v-toolbar-side-icon @click.native.stop="openSidebar()"></v-toolbar-side-icon>
            <v-toolbar-title><h3>Green Arrow</h3></v-toolbar-title>
            <v-toolbar-items>
                <v-toolbar-item><router-link to="/">Home</router-link></v-toolbar-item>
                <v-toolbar-item><a href="https://github.com/CUBigDataClass/IceStream">Github</a></v-toolbar-item>
                <v-toolbar-item><router-link to="/login"><span class="glyphicon glyphicon-log-in"></span> Login</router-link></v-toolbar-item>
            </v-toolbar-items>
        </v-toolbar>
    </header>
        <v-sidebar fixed class="white--text" v-model="sidebar">
            <div class="px-3">
                <h3 class="white--text mt-3">FILTERS</h3>
            </div>
            <div>
                <v-subheader class="grey--text text--lighten-1" v-text="'City'" />
            </div>
            <!--<v-list>
                <v-list-tile v-for="item in items" :href="item.href" :router="item.router" avatar>
                    <v-list-tile-avatar>
                        <v-icon>{{item.icon}}</v-icon>
                    </v-list-tile-avatar>
                    <v-list-tile-content>
                        {{ item.title }}
                    </v-list-tile-content>
                </v-list-tile>
            </v-list>-->
        </v-sidebar>
    <v-content class="pt-0">
=======
    <v-app top-toolbar left-fixed-sidebar sidebar-under-toolbar>
        <header>
            <v-toolbar>
                <v-toolbar-side-icon @click.native.stop="openSidebar()"></v-toolbar-side-icon>
                <v-toolbar-logo class="px-3">
                    Green Arrow
                </v-toolbar-logo>
            </v-toolbar>
        </header>
        <main>
            <v-sidebar fixed class="white--text" v-model="sidebar">
                <div class="px-3">
                    <h3 class="white--text mt-3">Sidebar</h3>
                    <p>This is just an example sidebar.</p>
                </div>
                <v-list>
                    <v-list-tile v-for="item in items" :key="item.title" :href="item.href" :router="item.router" avatar>
                        <v-list-tile-avatar>
                            <v-icon>{{item.icon}}</v-icon>
                        </v-list-tile-avatar>
                        <v-list-tile-content>
                            {{ item.title }}
                        </v-list-tile-content>
                    </v-list-tile>
                </v-list>
            </v-sidebar>
            <v-content class="pt-0">
>>>>>>> origin/vue
                <v-container fluid>
                     <transition mode="out-in">
                         <router-view></router-view>
                     </transition>
                 </v-container>
             </v-content>
  </div>
</v-app>
</template>

<script>
export default {
  data () {
    return {
      sidebar: false
    }
  },
    //   items: [{
    //     href: 'home',
    //     router: true,
    //     title: 'Home',
    //     icon: 'home'
    //   }, {
    //     href: 'examples',
    //     router: true,
    //     title: 'Example',
    //     icon: 'extension'
    //   }, {
    //     href: 'about',
    //     router: true,
    //     title: 'About',
    //     icon: 'domain'
    //   }]
    // }
//   },
  methods: {
    openSidebar () {
      this.sidebar = !this.sidebar
    }
  }
}
</script>

<style scoped>
a {
    color: white;
    font-size: 1.2em;
}
</style>
