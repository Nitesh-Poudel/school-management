<template>
<!-- <div class="header border"> -->
<div class="header border bg-white shadow-sm">
    <div class="d-flex justify-content-between w-100 border">
      <div><i class="bi bi-list"></i>Hello</div>
      <button v-if="authStore.token" @click="logout" class="logout-btn">Logout</button>
    </div>
    
</div>
</template>

<script>
import {
    useAuthStore
} from "@/stores/auth"; // Import Pinia store
import {
    computed
} from "vue";

export default {
    name: "HeaderComponent",
    setup() {
        const authStore = useAuthStore(); // Use Pinia store

        console.log("Auth User:", authStore.user);
        console.log("Auth Token:", authStore.token);
        console.log("Auth School ID:", authStore.school_id);

        return {
            authStore,
            user: computed(() => authStore),
            logout: authStore.logoutUser, // Use logout method from store
        };
    },
};
</script>

<style scoped>
:root {
    --primary-color: #235784;
}

.header {
  height: 150px;
    background-color: var(--primary-color) !important;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    color: white;
    font-size: 1.5rem;
}

.logout-btn {
    background-color: #e74c3c;
    color: white;
    border: none;
    padding: 8px 15px;
    font-size: 1rem;
    cursor: pointer;
    border-radius: 5px;
}

.logout-btn:hover {
    background-color: #c0392b;
}
</style>
