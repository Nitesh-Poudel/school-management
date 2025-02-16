import { createRouter, createWebHistory } from 'vue-router';

// Import your components
import addSchool from '@/components/admin/addSchool.vue';
import login from '@/components/authantication/login.vue';
import homeComponent from '@/components/homeComponent.vue';

const routes = [
  {
    path: '/', // URL path
    name: 'home', // Route name
    component: homeComponent, // Component to render
  },
  {
    path: '/add/school', // URL path
    name: 'addschool', // Route name
    component: addSchool, // Component to render
  },
  {
    path: '/login', // URL path
    name: 'login', // Route name
    component: login, // Component to render
  },
];

const router = createRouter({
  history: createWebHistory(), // Use HTML5 history mode
  routes, // Pass the routes array
});


//  Global Navigation Guard
router.beforeEach((to, from, next) => {
  const token = localStorage.getItem("auth_token");

  if (to.meta.requiresAuth && !token) {
      console.warn("🔒 No token found, redirecting to login...");
      next('/login'); // Redirect to login if token is missing
  } else {
      next(); // Allow navigation
  }
});


export default router;