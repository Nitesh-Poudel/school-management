<template>
<div class="dashboard">
    <!-- Sidebar -->
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
            <router-link to="/administrator"><h3>Admin Panel</h3></router-link>
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

    <!-- Main Content -->
    <div class="content">
        <div class="header">
            <h1>Welcome, {{ user ? user.name : "Guest" }}</h1>
            <span>Today: {{ currentDate }}</span>
            <span>{{ userRoles }}</span>

        </div>

        <!-- Dashboard Stats -->
        <div class="dashboard-section d-flex flex-wrap">
            <div class="card">
                <h3>Notifications</h3>
                <ul>
                    <li v-for="note in notifications" :key="note.id">
                        {{ note.time }} - {{ note.message }}
                    </li>
                </ul>
            </div>

            <div class="card">
                <h3>Announcements</h3>
                <ul>
                    <li v-for="announcement in announcements" :key="announcement.id">
                        <strong>{{ announcement.title }}</strong>: {{ announcement.content }} ({{ announcement.date }})
                    </li>
                </ul>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="card">
            <h3>Upcoming Events</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Event</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="event in events" :key="event.id">
                        <td>{{ event.date }}</td>
                        <td>{{ event.title }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
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
    data() {
        return {
            currentDate: new Date().toLocaleDateString("en-US", {
                weekday: "long",
                year: "numeric",
                month: "long",
                day: "numeric",
            }),
            notifications: [{
                    id: 1,
                    time: "10 mins ago",
                    message: "New assignment posted for Math class",
                },
                {
                    id: 2,
                    time: "1 hour ago",
                    message: "Parent-teacher meeting scheduled for next week",
                },
            ],
            announcements: [{
                    id: 1,
                    title: "School Closure",
                    content: "School closed for teacher development day.",
                    date: "Feb 24, 2025",
                },
                {
                    id: 2,
                    title: "Sports Day",
                    content: "Annual sports day next month. Register your teams.",
                    date: "Feb 20, 2025",
                },
            ],
            events: [{
                    id: 1,
                    date: "2025-02-28",
                    title: "Math Quiz",
                },
                {
                    id: 2,
                    date: "2025-03-05",
                    title: "Science Fair",
                },
            ],
            userRoles: [],
            school: '',
        };
    },
    computed: {
        ...mapState(useAuthStore, ["user", "token","school"]),
    },
    methods: {
        async fetchUserRole() {
            try {
                const authStore = useAuthStore();

                if (!authStore.token) {
                    console.error("❌ No authentication token found.");
                    return;
                }

                if (!authStore.user ?.id) {
                    console.error("❌ User ID is missing!");
                    return;
                }

                const response = await axios.get(
                    `http://localhost:8000/api/user/${authStore.user.id}/role`, {
                        headers: {
                            Authorization: `Bearer ${authStore.token}`,
                            Accept: "application/json",
                        },
                    }
                );

                console.log("Role API Response:", response.data);

                if (response.data && response.data.roles) {
                    this.userRoles = response.data.roles;
                    this.school = response.data.school_name;
                    console.log("🔵 User Roles:", this.userRoles);

                    if (this.userRoles.length > 0) {
                        authStore.setUser({
                            ...authStore.user,
                            roles: this.userRoles,
                            school: this.school
                        }); // Store all roles
                    }

                } else {
                    console.error("❌ Unexpected role data format:", response.data);
                }
            } catch (error) {
                console.error("❌ Error fetching user role:", error);
            }
        },
    },
    async mounted() {
        try {
            const authStore = useAuthStore();

            if (!authStore.user) {
                console.log("🔄 Fetching user...");
                await authStore.fetchUser();
            }

            if (!authStore.token) {
                console.error("❌ No authentication token found.");
                return;
            }

            await this.fetchUserRole();
            console.log("🟢 Logged-in User:", authStore.user);
        } catch (error) {
            console.error("❌ Error in mounted lifecycle hook:", error);
        }
    },
    beforeUnmount() {
        console.log("🚨 Component is unmounting!");
    },
};
</script>
<style>
.sidebar {
    width: 250px;
    background: #235784;
    color: white;
    padding: 20px;
    height: 100vh;
   
}
</style>

<style scoped>
.sidebar{ position: fixed;}
.dashboard {
    display: flex;
}



.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 10px;
    margin: 5px 0;
}

.sidebar a:hover {
    background: #34495e;
}

.content {
    margin-left: 270px;
    padding: 20px;
    width: calc(100% - 270px);
}

.card {
    background: white;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 15px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    min-width: 200px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px;
    background: #f7aa00;
    color: white;
}

.dashboard-section {
    display: flex;
    gap: 15px;
}

.dashboard-section>div {
    flex: 1;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.table th,
.table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.table th {
    background: #f4f4f4;
}
</style>
