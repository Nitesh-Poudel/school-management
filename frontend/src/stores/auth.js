import { defineStore } from "pinia";
// import axios from "axios";
import api from "@/services/api";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    user: null,
    token: localStorage.getItem("auth_token") || null,
    school_id: localStorage.getItem("school_id") || null, // Store only the school ID
  }),

  actions: {
    setUser(user) {
      this.user = user;
      if (user && user.school_id) {
        this.school_id = user.school_id;
        localStorage.setItem("school_id", user.school_id); // Persist in localStorage
        console.log("✅ school_id stored in Pinia:", this.school_id);
      } else {
        console.log("⚠️ school_id is missing in user data:", user);
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
      if (!this.token) return;

      try {
        // const response = await axios.get("http://localhost:8000/api/user", {
        //   headers: {
        //     Authorization: `Bearer ${this.token}`,
        //   },
        // });
        const response = await api.get('/user')

        this.setUser(response.data);
      } catch (error) {
        console.error("Failed to fetch user:", error);
        this.logoutUser();
      }
    },

    logoutUser() {
      this.token = null;
      this.user = null;
      this.school_id = null; // Clear school_id on logout
      localStorage.removeItem("auth_token");
      localStorage.removeItem("school_id"); // Remove school_id from localStorage
    },
  },
});
