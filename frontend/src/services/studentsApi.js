import api from '@/services/api'; // Import the Axios instance
// import { useAuthStore } from '@/stores/auth';

const studentApi = {
  async fetchStudents() {
   
    try {
      const response = await api.get('/students/');
      console.log("From api ".response);
      return response; // Return the response data
    } catch (error) {
      console.error("Error fetching students:", error);
      throw error; // Throw error to be handled by the caller
    }
  }
};

export default teacherApi;
