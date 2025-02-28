import { createRouter, createWebHistory } from 'vue-router';

// Import your components
import addSchool from '@/components/admin/addSchool.vue';
import login from '@/components/authantication/login.vue';
import homeComponent from '@/components/homeComponent.vue';
import AdministrationDashboard from '@/components/user/administration/administrationDashboard.vue';
import ManageUsers from '@/components/user/administration/components/manageUsers.vue';
import CreateUser from '@/components/user/administration/components/createUser.vue';
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
  {
    path: '/administrator',
    component: AdministrationDashboard,
    children: [
      // Default child route if needed:
      {
        path: '',
        name: 'admin-dashboard',
        // You could either render a default component or redirect
        component: AdministrationDashboard,
      },
      {
        path: 'manage-users', // full path becomes /administrator/manage-users
        name: 'ManageUsers',
        component: ManageUsers,
      },
      {
        path: 'create-user', // full path becomes /administrator/manage-users
        name: 'CreateUsers',
        component: CreateUser,
      }
    ]
  }
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