<template>
   <HeaderComponent/>

<div>
    loged in {{ user.name }}
    role {{ user.role }}
    <!-- {{ user }} -->
</div>
</template>


<script>
import axios from "axios";
import HeaderComponent from '@/components/layout/header.vue';

export default {
    name: "homeComponent",
    components:{
        HeaderComponent
    },
    data() {
        return {
            user: {} // Store user details here
        };
    },
    async created() {
        await this.getUserDetails();
    },
    methods: {
        async getUserDetails() {
            try {
                const token = localStorage.getItem("auth_token");

                if (!token) {
                    console.error("No token found, redirecting to login...");
                    this.$router.push("/login"); // Redirect if no token
                    return;
                }

                console.log("📡 Fetching logged-in user details...");
                const response = await axios.get("http://localhost:8000/api/user", {
                    headers: {
                        "Authorization": `Bearer ${token}`,
                        "Accept": "application/json"
                    }
                });

                console.log("✅ User details fetched:", response.data);
                this.user = response.data;

            } catch (error) {
                console.error("❌ Failed to fetch user details:", error);
                this.$router.push("/login"); // Redirect to login if request fails
            }
        }
    }
};
</script>