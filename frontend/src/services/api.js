import axios from 'axios';
import { useAuthStore } from "@/stores/auth"; // Import your Pinia store

const API_BASE_URL = 'http://127.0.0.1:8000/api'; // Replace with your API base URL

// Create an Axios instance
const api = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    'Content-Type': 'application/json',
    // Initially set school_id as null or an empty string
    'School-ID': '', 
  },
});

// Add a request interceptor to automatically include the Bearer token and school_id
api.interceptors.request.use(
  (config) => {
    const authStore = useAuthStore(); // Access Pinia store inside the interceptor
    const token = localStorage.getItem('auth_token'); // Fetch token from localStorage
    const school_id = authStore.school_id; // Access school_id from authStore

    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    if (school_id) {
      config.headers['School-ID'] = school_id; // Add school_id to the request headers
    }

    return config;
  },
  (error) => Promise.reject(error)
);

export default api;
