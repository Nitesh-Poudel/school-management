
import axios from 'axios';

const API_BASE_URL = 'http://127.0.0.1:8000/api'; // Replace with your API base URL

// Create an Axios instance
const api = axios.create({
  baseURL: API_BASE_URL,
  headers: {
    'Content-Type': 'application/json',
  },
});

// Add a request interceptor to automatically include the Bearer token
api.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem('auth_token'); // Fetch token from localStorage
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => Promise.reject(error)
);

export default api;
