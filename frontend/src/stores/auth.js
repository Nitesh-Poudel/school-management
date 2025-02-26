import { defineStore } from "pinia";
import axios from "axios";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    user: null,
    token: localStorage.getItem("auth_token") || null,
    school: "", 
  }),

  actions: {
    setUser(user) {
      this.user = user;
      if (this.school) {
        this.school = user.school; // Ensure school is updated globally
    }
    },
    
    setToken(token) {
      this.token = token;
      localStorage.setItem("auth_token", token);
    },
   

    async loginUser(email, password) {
      try {
        const response = await axios.post("http://localhost:8000/api/login", {
          email,
          password,
        });

        if (response.data.token) {
          this.setToken(response.data.token);
          this.setUser(response.data.user);
          return { success: true };
        }
      } catch (error) {
        console.error("Login failed:", error);
        return { success: false, message: error.response?.data?.message || "Login failed" };
      }
    },

    async fetchUser() {
      if (!this.token) return;

      try {
        const response = await axios.get("http://localhost:8000/api/user", {
          headers: {
            Authorization: `Bearer ${this.token}`,
          },
        });

        this.setUser(response.data);
      } catch (error) {
        console.error("Failed to fetch user:", error);
        this.logoutUser(); 
      }
    },

    logoutUser() {
      this.token = null;
      this.user = null;
      localStorage.removeItem("auth_token");
    },
  },
});
