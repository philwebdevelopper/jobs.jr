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

$.ajaxSetup({
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
  })

if(document.getElementById("mapid")){
  const lat = $('#lat').val();
  const lon = $('#lon').val();
const mymap = L.map('mapid').setView([lat, lon], 13);
L.marker([lat, lon]).addTo(mymap);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>',
    maxZoom: 18,
    minZoom: 9
}).addTo(mymap);
}

if(document.getElementById("clientForm")){
document.getElementById("clientForm").addEventListener("submit", function(e){
e.preventDefault();
  const city = $('#city').val();
  const zipCode = $('#zipCode').val();
  const adress = $('#adress1').val();

  let zipCode1 = zipCode.substr(0,3);
  let zipCode2 = zipCode.substr(4,6);
  let adresse = adress.replace(" ", "+");

$.ajax({
  type: 'GET',
  url: 'https://nominatim.openstreetmap.org/search',
  data: "q=" + city + ',' + adresse + ',' + zipCode1 + '+' + zipCode2 + "&format=json&addressdetails=1&limit=1&polygon_svg=1"
}).done(function (response) {
  if(response != ""){
    const userlat = response[0]['lat'];
    const userlon = response[0]['lon'];

    $('#clientLat').val(userlat);
    $('#clientLon').val(userlon);
    document.getElementById("clientForm").submit();
  }
}).fail(function (error) {
  alert(error);
});
});
}
