import api from '@/services/api'; // Import the Axios instance
import { useAuthStore } from '@/stores/auth';


const administrationApiService = {
  async createUser(userData) {
    console.log('from api sending', userData);
    const response=await api.post('/administrator/create/users', userData);
    return response
  },

  async getUsers(page) {
    const authStore = useAuthStore();
    console.log("Auth Store:", authStore); // Debugging
    const schoolId = authStore.school_id;
    console.log("School ID:", schoolId);
    
    console.log("school id is ",schoolId)
    try {
      const response = await api.get('/administrator/users?page=3', {
        params: { schoolId,page} // Pass schoolId as a query parameter
      });
      return response;
    } catch (error) {
      console.error('Error fetching users:', error);
      throw error; // Rethrow the error so it can be handled in the component
    }
   
  },




  getUserById(userId) {
    return api.get(`/users/${userId}`);
  },

  updateUser(userId, updatedData) {
    return api.put(`/users/${userId}`, updatedData);
  },

  deleteUser(userId) {
    return api.delete(`/users/${userId}`);
  }
};

export default administrationApiService;
