import api from '@/services/api'; // Import the Axios instance

const administrationApiService = {
  async createUser(userData) {
    console.log('from api', userData);
    const response=await api.post('/administrator/create/users', userData);
    return response.data
  },

  getUsers() {
    return api.get('/users');
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
