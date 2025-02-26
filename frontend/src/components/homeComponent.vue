<template>
  <HeaderComponent/>
  <div class="container">
    <!-- Debugging: -->
    <!-- Logged in: {{ user?.name }} -->
    <!-- Role: {{ user?.role }} -->

    <div v-show="user?.role === 'admin'">
      <router-link to="/add/school">Add School</router-link>
      <AdminDashboard />
    </div>

    <div v-show="user?.role === 'user'">
      <UserDashboard />
    </div>
  </div>
</template>

<script>
import { useAuthStore } from "@/stores/auth";
import HeaderComponent from '@/components/layout/header.vue';
import AdminDashboard from "@/components/admin/adminDashboard.vue";
import UserDashboard from "@/components/user/userDashboard.vue";

export default {
  name: "homeComponent",
  components: {
    AdminDashboard,
    UserDashboard,
    HeaderComponent
  },
  data() {
    return {
      user: null,
      // loading: true,
    };
  },
  methods: {
    async fetchUserData() {
      const authStore = useAuthStore();
      if (!authStore.user) {
        await authStore.fetchUser();
      }
      this.user = authStore.user;
      console.log('this user',this.user)
      // this.loading = false;
    },
  },
  async mounted() {
    console.log("this is .........")
    await this.fetchUserData();
  },
}
</script>
