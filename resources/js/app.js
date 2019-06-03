
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import { Form, HasError, AlertError } from 'vform';
window.Form = Form;

/**vRoutes */
import VueRouter from 'vue-router';
Vue.use(VueRouter)
let routes = [
    { path: '/home', component: require('./components/home.vue').default },
  ]
  const router = new VueRouter({
  mode: 'history', 
  routes // short for `routes: routes`
})

import VueProgressBar from 'vue-progressbar';
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '3px'
})

/**Sweet alert */
import swal from 'sweetalert2';
window.swal = swal;
const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});
window.toast = toast;

  

window.Fire = new Vue();

const app = new Vue({
    el: '#app',
    router
});

