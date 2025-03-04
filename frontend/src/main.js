import { createApp } from 'vue';
import { createPinia } from "pinia";
import piniaPersist from "pinia-plugin-persistedstate"; // Import Pinia persistence plugin
import App from './App.vue';
import router from './router'; // Import the router

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import 'chart.js/auto';
import 'typeface-poppins';
import 'typeface-roboto';

const pinia = createPinia();
pinia.use(piniaPersist); // ✅ Enable Pinia persistence

createApp(App)
    .use(pinia) // Register Pinia
    .use(router) // Register Router
    .mount('#app');
