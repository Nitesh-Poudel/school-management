import { createRouter, createWebHistory } from 'vue-router';
import { useAuthStore } from "@/stores/auth";
// Import your components
import addSchool from '@/components/admin/addSchool.vue';
import login from '@/components/authantication/login.vue';
import homeComponent from '@/components/homeComponent.vue';
import AdministrationDashboard from '@/components/user/administration/administrationDashboard.vue';
import AdministrationHome from '@/components/user/administration/administrationHome';
import teacherManagementComponent from '@/components/user/administration/components/manageTeacher.vue';

import ManageUsers from '@/components/user/administration/components/manageUsers.vue';
import CreateUser from '@/components/user/administration/components/createUser.vue';
import TeacherDashboard from '@/components/user/teacher/teacherDashboard.vue';
import TeacherHome from '@/components/user/teacher/home';
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
    meta: { guestOnly: true },
  },
  {
    path: '/administrator',
    component: AdministrationDashboard,
    meta: { requiresAuth: true, requiredUserRoles: ["administrator"]},
    children: [
      // Default child route if needed:
      {
        path: '',
        name: 'admin-dashboard',
        // You could either render a default component or redirect
        component: AdministrationHome,
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
      },
      {
        path:'/manage/teacher',
        component:teacherManagementComponent,
      }
    ]
  },
  { 
    path:'/teacher',
    component:TeacherDashboard,
    meta: { requiresAuth: true, requiredUserRoles: ["teacher"]},
    children:[
      {
        path: '',
        component:TeacherHome,
      }
    ]
  
  },
  // {
  //   path:'/parents',
  //   component:
  // }
];

const router = createRouter({
  history: createWebHistory(), // Use HTML5 history mode
  routes, // Pass the routes array
});


//  Global Navigation Guard
router.beforeEach((to, from, next) => {
  const authStore = useAuthStore(); // Get auth store
  const token = authStore.token;
  const user = authStore.user;
  const userRole = user?.role || null;

  // 1️⃣ Redirect if trying to access authenticated pages without login
  if (to.meta.requiresAuth && !token) {
    console.warn("🔒 No token found, redirecting to login...");
    return next("/login");
  }

  // 2️⃣ Restrict login page for logged-in users
  if (to.meta.guestOnly && token) {
    console.info("✅ Already logged in, redirecting to home...");
    return next("/");
  }

  if (to.meta.requiredUserRoles) {
    const userRoles = user?.roles || []; // Ensure it's an array
    const hasRequiredRole = to.meta.requiredUserRoles.some((role) => userRoles.includes(role));

    if (!hasRequiredRole) {
      console.error(`⛔ Access denied! User does not have required role.`);
      return next("/");
    }
  }

  // 3️⃣ Role-based access control
  if (to.meta.roles && !to.meta.roles.includes(userRole)) {
    console.error("⛔ Unauthorized! Redirecting...");
    return next("/");
  }

  next();
});


export default router;