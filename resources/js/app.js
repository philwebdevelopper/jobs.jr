/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
window.L = require('leaflet');
import 'leaflet/dist/leaflet.css'
import {GeoSearchControl, OpenStreetMapProvider } from 'leaflet-geosearch';
const provider = new OpenStreetMapProvider();
require('./bootstrap');
// require('./script');
require('./geocode');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

console.log(document.getElementById("clientForm"));
document.getElementById("clientForm").addEventListener("submit", function(e){
  e.preventDefault();
  const city = $('#city').val();
  console.log(city);
  const zipCode = $('#zipCode').val();
$.ajax({
  type: 'GET',
  url: 'https://nominatim.openstreetmap.org/search',
  data: "q="+city+ ',' + zipCode+"&format=json&addressdetails=1&limit=1&polygon_svg=1"
}).done(function (response) {
  if(response != ""){
    userlat = response[0]['lat'];
    userlon = response[0]['lon'];
  }
}).fail(function (error) {
  alert(error);
});
});
