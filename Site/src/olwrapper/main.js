const openlayers = require('openlayers')

const olMap = require('./ol-map.vue')
const olMarker = require('./ol-marker.vue')

require('../../node_modules/openlayers/css/ol.css')

module.exports = {
  openlayers,
  install (Vue, options) {
    Vue.component('ol-map', olMap)
    Vue.component('ol-marker', olMarker)
  }
}
