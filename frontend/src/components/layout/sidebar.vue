<template>
<div class="sidebar" style="overflow: scroll;">
    <div class="administrator-sidebar" v-if="authStore.user.roles.includes('administrator')">
      <administratorSidebarComponent/>
    </div>
 
    <div class="teacher-sidebar">
        <TeacherSidebarComponent/>
    </div>
    

</div>
</template>

<script>
import {useAuthStore} from "@/stores/auth";
import administratorSidebarComponent from "@/components/user/administration/sidebarComponent.vue"
import TeacherSidebarComponent from "@/components/user/teacher/sidebarComponent.vue"

export default {
    name: 'SidebarComponent',
    components:{
        administratorSidebarComponent,
        TeacherSidebarComponent
    },
    setup() {
        const authStore = useAuthStore(); // Access Pinia store
        return {
            authStore
        };
    },
}
</script>

<style>
.group {
    border-bottom: 1px solid gray;
}

.sidebar {
    width: 300px!important;
    padding: 20px;
    height: 100vh;
    border-right: 1px solid #ddd;
    background: #235784;
}

.sidebar h2 {
    font-size: 20px;
    color: #fffefe;
    margin-bottom: 15px;
}

.sidebar h3 {
    font-size: 16px;
    color: var(--secondary);
    margin-top: 15px;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    margin-bottom: 10px;
}

.sidebar ul li a {
    text-decoration: none;
    color: #d4d4d4;
    font-size: 14px;
    display: block;
    padding: 5px;
    border-radius: 5px;
}

.sidebar ul li a:hover {
    background: #007bff;
    color: white;
}
</style>
