import api from '@/services/api';

const classApiService = {
    // Create class api
    async createClass(classData){

        console.log("class data is", classData)
        try {
            console.log('creating the class classes...');
            const response = await api.post('/administrator/class',
                 { classData }
                );
            console.log('Class List:', response);
            // return response.data;
        } catch (error) {
            console.error('Error fetching classes:', error);
            throw error; // Re-throw for handling in the component
        }
    },
}
export default classApiService; 