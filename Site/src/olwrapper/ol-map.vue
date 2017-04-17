<!-- ol-map.vue -->
<template>
  <div>
    <slot></slot>
  </div>
</template>

<style scoped>
  #themap {
    width:100%;
    height:100%;
    margin: 0px;
    padding: 0px;
  }
</style>

<script>
  const ol = require('openlayers')
  module.exports = {
    name: 'OLMap',
    props: {
      autoCenter: Boolean,
      center: {
        type: Array,
        default: () => {
          return [-101.9497571, 38.9287866]
        }
      }
    },
    mounted () {
      this.olmap = new ol.Map({
        target: this.$el,
        loadTilesWhileAnimating: true,
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        view: new ol.View({
          center: ol.proj.fromLonLat([-101.9497571, 38.9287866]),
          zoom: 5
        })
      })
      // http://openlayers.org/en/latest/apidoc/ol.Map.html#on
      this.olmap.on('moveend', (evt) => {
        // floating openlayer event to inside the vue's ViewModel
        this.updatecenter(evt)
        this.$emit('moveend', evt)
      })
      if (this.autoCenter) {
        this.autocenter()
      }
      this.$on('newmarker', (e) => {
        while (this.markerstoadd.length) {
          let m = this.markerstoadd.pop()
          this.olmap.addLayer(m)
        }
      })
      this.$emit('newmarker')

      this.olmap.on('click', (ev) => {
        const feature = this.olmap.forEachFeatureAtPixel(ev.pixel, (feature) => feature)
        if (feature) {
          this.$emit('selfeature', feature)
        }
      })

      // animation - start
      this.olmap.getView().animate({
        center: ol.proj.fromLonLat([-101.9497571, 0.9287866]),
        duration: 2000,
        easing: bounce
      })
      var bounce = ol.animation.bounce({
        resolution: this.olmap.getView().getResolution() * 4
      })
      alert(this.olmap.getView().getResolution())
      // start the pan at the current center of the map
      var pan = ol.animation.pan({
        source: this.olmap.getView().getCenter()
      })
      this.olmap.beforeRender(bounce)
      this.olmap.beforeRender(pan)
      // when we set the center to the new location, the animated move will
      // trigger the bounce and pan effects
      this.olmap.getView().setCenter([-101.9497571, 38.9287866])

      // alert(this.olmap.getView().getResolution())

      var zoom = ol.animation.zoom({
        resolution: this.olmap.getView().getResolution()
      })
      this.olmap.beforeRender(zoom)
      // setting the resolution to a new value will smoothly zoom in or out
      // depending on the factor
      this.olmap.getView().setResolution(this.olmap.getView().getResolution() * 3)
      // animation - end
    },
    data () {
      return {
        olmap: null,
        thecenter: [],
        markerstoadd: []
      }
    },
    watch: {
      center (e) {
        this.setcenter(e)
      }
    },
    methods: {
      addMarker (marker) {
        this.markerstoadd.push(marker)
        this.$emit('newmarker')
      },
      autocenter () {
        if ('geolocation' in navigator) {
          /* geolocation is available */
          navigator.geolocation.getCurrentPosition((pos) => {
            if (this.autoCenter) {
              this.setcenter([pos.coords.longitude, pos.coords.latitude])
            }
          }, (err) => {
            console.log(err)
          })
        }
      },
      setcenter (latlng) {
        this.thecenter[0] = latlng[0]
        this.thecenter[1] = latlng[1]
        this.olmap.getView().setCenter(ol.proj.fromLonLat(this.thecenter))
      },
      updatecenter (evt) {
        const center = evt.map.getView().getCenter()
        const lonlat = ol.proj.toLonLat(center)
        this.thecenter[0] = lonlat[0]
        this.thecenter[1] = lonlat[1]
      }
    }
  }

</script>
