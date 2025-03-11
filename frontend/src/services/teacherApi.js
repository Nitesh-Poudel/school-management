import api from '@/services/api'; // Import the Axios instance
// import { useAuthStore } from '@/stores/auth';

const teacherApi = {
  async fetchTeachers() {
   
    try {
      const response = await api.get('/teachers/');
      console.log("From api ".response);
      return response; // Return the response data
    } catch (error) {
      console.error("Error fetching teacher:", error);
      throw error; // Throw error to be handled by the caller
    }
  }
};

export default teacherApi;
