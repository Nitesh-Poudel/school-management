import api from '@/services/api';

const classSectionApiService = {
    // Create class api
    async createClass(){
        try {
            console.log('creating the class classes...');
            const response = await api.post('/administrator/class');
            console.log('Class List:', response);
            // return response.data;
        } catch (error) {
            console.error('Error fetching classes:', error);
            throw error; // Re-throw for handling in the component
        }
    },
}
export default classSectionApiService;