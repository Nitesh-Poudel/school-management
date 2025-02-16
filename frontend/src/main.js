import { createApp } from 'vue'
import App from './App.vue'
import router from './router'; // Import the router

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';


createApp(App)
.use(router) // Add this line
.mount('#app')
