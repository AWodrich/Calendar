/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import vueScrollto from 'vue-scrollto';

import EventsList from './components/EventsList';
import SportEvents from './components/SportEvents';

Vue.use(VueAxios, axios);
Vue.use(vueScrollto);

require('./bootstrap');

const rootUrl = window.root_url;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import { VDropdown } from "vuetensils"

Vue.component("VDropdown", VDropdown)
Vue.component('EventsList', EventsList);
Vue.component('SportEvents', SportEvents);


const app = new Vue({
    provide: {
        rootUrl,
    },
    components: {
        EventsList,
        SportEvents,
    },

}).$mount('#app');


if(process.env.NODE_ENV !== 'production') {
    window.app = app;
}
