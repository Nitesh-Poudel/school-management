<template>
  <div class="header border ">
    <h1><span>{{ school }}</span></h1>
    <button v-if="token" @click="logout" class="logout-btn">Logout</button>
  </div>
</template>

<script>
export default {
  name: "HeaderComponent",
  data() {
    return {
      token: null, // Stores the authentication token
    };
  },
  methods: {
    checkToken() {
      // Check if token exists in localStorage
      this.token = localStorage.getItem("auth_token");
    },
    logout() {
      // Remove token and reload page
      localStorage.removeItem("auth_token");
      this.token = null; // Clear token from data
      window.location.reload(); // Refresh page to reflect logout
    },
  },
  mounted() {
    this.checkToken(); // Check token when component is mounted
  },
};
</script>

<style scoped>
:root {
  --primary-color:#235784  /* Set your primary color */
}
.header {
  height: 100px;
  background-color: var(--primary-color)!important;
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
