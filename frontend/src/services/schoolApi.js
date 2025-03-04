import api from '@/services/api'; // Import the Axios instance
// import { useAuthStore } from '@/stores/auth';

const SchoolApiService = {
    async getSchool() {
        console.log('Fetching school list...');
        const response = await api.get('/administrator/schools');
        console.log('School List:', response.data);
        return response;
    },
};

export default SchoolApiService;
