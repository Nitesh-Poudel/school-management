import { defineStore } from "pinia";
import api from "@/services/api";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    user: localStorage.getItem("auth_user") 
      ? JSON.parse(localStorage.getItem("auth_user")) 
      : null,  // Handle case when storage is empty or invalid
    token: localStorage.getItem("auth_token") || null,
    school_id: localStorage.getItem("school_id") || null,
  }),
  
  actions: {
    setUser(user) {
      this.user = user;
      localStorage.setItem("auth_user", JSON.stringify(user)); // Store user data

      if (user && user.school_id) {
        this.school_id = user.school_id;
        localStorage.setItem("school_id", user.school_id);
      }
    },

    setToken(token) {
      this.token = token;
      localStorage.setItem("auth_token", token);
    },

    async loginUser(email, password) {
      try {
        const response = await api.post("/login", { email, password });
        console.log("🔍 API Response from login:", response.data);

        if (response.data.token) {
          this.setToken(response.data.token);
          this.setUser(response.data.user);
          return { success: true };
        }
      } catch (error) {
        console.error("❌ Login failed:", error);
        return { success: false, message: error.response?.data?.message || "Login failed" };
      }
    },

    async fetchUser() {
      if (!this.token) return;  // Ensure we only fetch if a token exists
    
      try {
        const response = await api.get('/user');
        this.setUser(response.data);
      } catch (error) {
        console.error("❌ Failed to fetch user:", error);
        this.logoutUser();
      }
    },
    

    logoutUser() {
      this.token = null;
      this.user = null;
      this.school_id = null;
      localStorage.removeItem("auth_token");
      localStorage.removeItem("auth_user"); // Remove user from localStorage
      localStorage.removeItem("school_id");

  localStorage.removeItem("auth_token");
  localStorage.removeItem("school_id"); // Remove school_id from localStorage

  // ✅ Force reactivity by resetting the state
  this.$reset(); 
    },
  },
});
