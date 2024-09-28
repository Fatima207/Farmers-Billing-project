import { createApp } from 'vue';
import App from './App.vue'
import router from './router'
import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css"
import "normalize.css"
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { far } from '@fortawesome/free-regular-svg-icons';
import { fas } from "@fortawesome/free-solid-svg-icons";
import '@fortawesome/fontawesome-free/css/all.css';
import '@fortawesome/fontawesome-free/js/all.js';

import flatPickr from 'vue-flatpickr-component';
import 'flatpickr/dist/flatpickr.css'; // Import the style

// import Sidebar from '../views/HomeView';
// import Vue from 'vue'
// import {vue-dropdown} from 'vue-dropdown'
// Vue.use(vue-adminlte)
// import {registerLicense} from '@syncfusion/ej2-base';

import { faCalendar } from '@fortawesome/free-solid-svg-icons';

library.add(faCalendar);
library.add(fas, far);

createApp(App)
.component("FIcons", FontAwesomeIcon)
.component("flat-pickr",flatPickr)
.use(router)
.mount('#app');

