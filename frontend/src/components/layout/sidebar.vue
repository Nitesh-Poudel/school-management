<template>
     <div class="sidebar">
        <h2>Dashboard</h2>
        <span>{{ school }}</span>
        <router-link to="/">Home</router-link>
        <router-link to="/classes">Classes</router-link>
        <router-link to="/assignments">Assignments</router-link>
        <router-link to="/messages">Messages</router-link>
        <router-link to="/settings">Settings</router-link>

        <!-- Check if the user is an admin -->
        <div v-if="userRoles.includes('administrator')">
            <h3>Administrator Panel</h3>
            <router-link to="/manage-users">Manage Users</router-link>
            <router-link to="/reports">Reports</router-link>
        </div>

        <!-- Check if the user is a teacher -->
        <div v-if="userRoles.includes('teacher')">
            <h3>Teacher Panel</h3>
            <router-link to="/gradebook">Gradebook</router-link>
            <router-link to="/schedule">Schedule</router-link>
        </div>

        <!-- Check if the user is a parent -->
        <div v-if="userRoles.includes('parent')">
            <h3>Parent Panel</h3>
            <router-link to="/child-progress">Child Progress</router-link>
            <router-link to="/meeting-requests">Meeting Requests</router-link>
        </div>
    </div>
</template>
<script>
import {
    useAuthStore
} from "@/stores/auth";
import {
    mapState
} from "pinia";
import axios from "axios";

export default {
    name:'sidebarComponent'
}
</script>

<style>

</style>