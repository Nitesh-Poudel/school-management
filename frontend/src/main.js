import { createApp } from 'vue';
import { createPinia } from "pinia";
import App from './App.vue';
import router from './router'; // Import the router

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'chart.js/auto';
import 'typeface-poppins';
import 'typeface-roboto';

const pinia = createPinia(); // Create Pinia instance

createApp(App)
    .use(pinia) // Register Pinia
    .use(router) // Register Router
    .mount('#app');
