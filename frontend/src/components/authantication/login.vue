<template>
    <div class="container d-flex justify-content-center align-items-center vh-100">
      <div class="card shadow-lg p-4 rounded" style="width: 350px;">
        <h2 class="text-center text-primary mb-4">Login</h2>
  
        <form @submit.prevent="loginUser">
          <div class="form-group mb-3">
            <label class="form-label fw-bold">Email</label>
            <input v-model="email" type="email" class="form-control border-primary shadow-sm rounded" placeholder="Enter your email" />
          </div>
  
          <div class="form-group mb-3">
            <label class="form-label fw-bold">Password</label>
            <input v-model="password" type="password" class="form-control border-primary shadow-sm rounded" placeholder="Enter your password" />
          </div>
  
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberMe" />
              <label class="form-check-label" for="rememberMe"> Remember me </label>
            </div>
            <a href="#" class="text-decoration-none text-primary">Forgot Password?</a>
          </div>
  
          <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
          <div class="text-danger"> {{ errorMessage }}</div>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  // import axios from "axios";
  import { useAuthStore } from "@/stores/auth"; // Import Pinia auth store
  import { useRouter } from "vue-router";
  
  export default {
    name: "loginComponent",
    data() {
      return {
        email: "",
        password: "",
        errorMessage: "",
      };
    },
    setup() {
      const authStore = useAuthStore(); // Use Pinia store
      const router = useRouter();

     
      return { authStore, router };
    },
    methods: {
      async loginUser() {
        console.log("🛠️ Before login attempt, authStore:", this.authStore);
    console.log("clicked button");
    try {
      console.log("📡 Sending request to backend...");
      
      const response = await this.authStore.loginUser(this.email, this.password);
      
      if (response.success) {
        console.log("✅ Login successful!");
        console.log("🛠️ after login attempt, authStore:", this.authStore);
        this.router.push("/");
      } else {
        this.errorMessage = response.message;
      }

    } catch (error) {
      console.error("Login failed:", error);
      this.errorMessage = "An unexpected error occurred.";
    }
  },
    },
  };
  </script>
  
  <style scoped>
  .container {
    background: #f8f9fa;
    height: 100vh;
  }
  
  .card {
    border-radius: 15px;
  }
  </style>
  