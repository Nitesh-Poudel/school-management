<template>
  <div class="header border bg-white shadow-sm">
    <div class="d-flex justify-content-between w-100 border">
      <div>
        <!-- Sidebar toggle icon -->
        <i class="bi bi-list" v-if="!ui.isSidebarVisible" @click="ui.showSidebar"></i>
        <span>Hello {{ authStore.user.name }}</span>
      </div>
      <button v-if="authStore.token" @click="logout" class="logout-btn">Logout</button>
    </div>
  </div>
</template>

<script>
import { useAuthStore } from "@/stores/auth";
import { useUiStore } from "@/stores/uiStore";
import { computed } from "vue";

export default {
  name: "HeaderComponent",
  setup() {
    const authStore = useAuthStore();
    const ui = useUiStore(); // ✅ Move inside setup

    return {
      authStore,
      ui, // ✅ Return it so it's available in template
      user: computed(() => authStore),
      logout: authStore.logoutUser,
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
