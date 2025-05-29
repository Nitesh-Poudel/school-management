import { createRouter, createWebHistory } from 'vue-router';
import { useAuthStore } from "@/stores/auth";
// Import your components
import addSchool from '@/components/admin/addSchool.vue';
import login from '@/components/authantication/login.vue';
import homeComponent from '@/components/homeComponent.vue';
import AdministrationDashboard from '@/components/user/administration/administrationDashboard.vue';
import AdministrationHome from '@/components/user/administration/administrationHome';
import teacherManagementComponent from '@/components/user/administration/components/manageTeacher.vue';
import teacherRoutineComponent from '@/components/user/administration/components/teacherRoutine.vue';
import manageClassesComponent from '@/components/user/administration/components/manageClasses.vue';

import ManageUsers from '@/components/user/administration/components/manageUsers.vue';

import CreateUser from '@/components/user/administration/components/createUser.vue';
import updateUser from '@/components/layout/updateUserFormComponent.vue';

import createStudent from '@/components/user/administration/components/rolesCreation/createStudents.vue'
import TeacherDashboard from '@/components/user/teacher/teacherDashboard.vue';
import TeacherHome from '@/components/user/teacher/home';


// import classprofileComponent from '@/components/class/classprofileComponent.vue';
import ClassProfileComponent from '@/components/class/classprofileComponent.vue';


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
        path: 'updatate-user/:userId', 
        name: 'CreateUsers',
        component: updateUser,
      },

      {
        path: '/students/create/:userId',
        name: 'createStudent',
        component: createStudent
      },
      {
        path:'/manage/teacher',
        component:teacherManagementComponent,
      },
      {
        path:'/teacher/routine',
        component:teacherRoutineComponent,
      },
      {
        path:'/manage/class',
        name: 'ManageClasses', 
        component: manageClassesComponent,
      },

      {
        path: '/class/:level',
        component: ClassProfileComponent      }

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
router.beforeEach(async (to, from, next) => {
  const authStore = useAuthStore();

  // Restore manually if needed
  if (!authStore.token && localStorage.getItem("auth_token")) {
    authStore.token = localStorage.getItem("auth_token");
    authStore.user = JSON.parse(localStorage.getItem("auth_user"));
    authStore.school_id = localStorage.getItem("school_id");
  }

  const token = authStore.token;
  const user = authStore.user;
  const userRoles = user?.roles || [];

  if (to.meta.requiresAuth && !token) {
    console.warn("🔒 No token found, redirecting to login...");
    return next("/login");
  }

  if (to.meta.guestOnly && token) {
    return next("/");
  }

  if (to.meta.requiredUserRoles) {
    const hasRole = to.meta.requiredUserRoles.some(role => userRoles.includes(role));
    if (!hasRole) {
      console.warn("🚫 No required role, redirecting to /");
      return next("/");
    }
  }

  next();
});



export default router;