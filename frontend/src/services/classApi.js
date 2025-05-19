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


    async fetchClassData(){
        console.log('getting class data of school');
        try{
            console.log('class ko data haru getting');
            const response= await api.get('/administrator/class');
            console.log(' class data from fetchData ',response)
            console.log(response.data)
            return response.data;
        }
        catch(error){
            console.error('Error fetching classes:', error);
            throw error; // Re-throw for handling in the component
        }
    },


    async deleteClassData(schoolId){
        alert(schoolId)
        
        console.log('deleting class data of school');
        try{
            console.log('deleting class data of school');
            const response= await api.delete(`/administrator/class/${schoolId}`);
            console.log(response)
            return response.data.message;
        }
        catch(error){
            console.error('Error fetching classes:', error);
            throw error; // Re-throw for handling in the component
        }
    }
}
export default classApiService; 