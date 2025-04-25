// import axios from 'axios';
import api from '@/services/api'; // Import the Axios instance
// import { useAuthStore } from '@/stores/auth';

const studentApi = {
  async fetchStudents() {
  //  alert('sending')
  //   try {
  //     const response = await api.get('/students/');
  //     console.log("From api ".response);
  //     return response; // Return the response data
  //   } catch (error) {
  //     console.error("Error fetching students:", error);
  //     throw error; // Throw error to be handled by the caller
  //   }
  },

  async createStudent(student) {
    try {
        const response = await api.post('/administrator/student', student);
        return response.data; // Directly return the response data (with success, message, etc.)
    } catch (error) {
      console.error("Error creating student:", error);
      return {
          success: false,
          message: 'Something went wrong',
          errors: error.response?.data.errors || {}
      };
    }
  },


  async getStudentByClass(classId){
    // alert(classId) 
    try {
      const response = await api.get(`/class/${classId}/students`);
      return response; // Directly return the response data (with success, message, etc.)
  } catch (error) {
    console.error("Error creating student:", error);
    return {
        success: false,
        message: 'Something went wrong',
        errors: error.response?.data.errors || {}
    };
  }
  }
  




 
};

export default studentApi;
