<template>
<div class="student-form">
    <button class="btn btn-primary" type="button" @click="goBack">Back</button>

    <h2>Create Student Info</h2>
    {{ form }}
    <div class="form-grid bg-white">
            

        <div class="form-control">
            <label for="classSection" class="required">Class & Section</label>
            <select id="classSection" v-model="form.class">
                <option disabled value="">Select class & section</option>
                <option v-for="item in allClassData" :key="item.id" :value="item.id">
                    {{ item.class_name }} - {{ item.section }}
                </option>
            </select>
        </div>

        <div class="form-control">
            <label for="rollNumber" class="required">Roll Number</label>
            <input type="text" id="rollNumber" v-model="form.rollNumber" placeholder="Enter roll number" />
        </div>

        <div class="form-control">
            <label for="dob" class="required">Date of Birth</label>
            <input type="date" id="dob" v-model="form.dob" />
        </div>

        <div class="form-control">
            <label class="required">Gender</label>
            <div class="radio-group">
                <label><input type="radio" value="male" v-model="form.gender" /> Male</label>
                <label><input type="radio" value="female" v-model="form.gender" /> Female</label>
            </div>
        </div>

        <div class="form-control">
            <label for="guardianName" class="required">Parent/Guardian Name</label>
            <input type="text" id="guardianName" v-model="form.guardianName" placeholder="Enter parent or guardian name" />
        </div>

        <div class="form-control">
            <label for="emergencyContact">Emergency Contact</label>
            <input type="tel" id="emergencyContact" v-model="form.emergencyContact" placeholder="Enter emergency contact number" />
        </div>

        <div class="form-control full-width">
            <button class="btn btn-secondary" @click="submitForm">Submit</button>
        </div>
    </div>
    <div v-if="Object.keys(errors).length" class="text-danger">
  <ul typr="none">
    <li v-for="(messages, field) in errors" :key="field">
      {{ messages[0] }}
    </li>
  </ul>
</div>


</div>
</template>

<script>
import classApiService from '@/services/classApi';
import studentApi from '@/services/studentsApi';    
export default {
    name: 'createStudent',
    data() {
        return {
            form: {
                class: '',
               
                rollNumber: '',
                dob: '',
                gender: '',
                guardianName: '',
                emergencyContact: '',
                user_id: null, // will be set from route or state
            },
            sections: [],
            grades: [],
            allClassData: [],

            errors:{ },

        };
    },
    mounted() {
        const userIdFromParams = this.$route.params ?.userId;
        this.form.user_id = userIdFromParams || null;
        console.log("Received user ID for student:", this.form.user_id);

        this.getClassdata();
    },
    methods: {
        goBack() {
            this.$router.go(-1); // or use push to a specific route
        },
        async submitForm() {
    try {
        const response = await studentApi.createStudent(this.form);
        console.log("API response:", response);

        if (response.success) {
            alert(response.message || 'Student created successfully');
            this.errors = {};
        } else {
            this.errors = response.errors || {};
            console.error("Validation errors:", this.errors);
        }

    } catch (err) {
        console.error("Unexpected error", err);
        this.errors = { general: ['Something went wrong'] };
    }
},

        async getClassdata() {
            var response = await classApiService.fetchClassData();
            const classdata = response.data

            this.allClassData = classdata;

            console.log('All calss data', this.allClassData) // ✅

            console.log('hahahha', classdata)
            const allSections = [...new Set(classdata.map(item => item.section))];
            this.sections = allSections;

            const allClasses = [...new Set(classdata.map(item => item.class_name))];
            this.grades = allClasses;
            console.log(allSections)

        }

    },
};
</script>

<style scoped>
.student-form {
    padding: 1rem;
    max-width: 900px;
    margin: auto;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 1rem;
}

.form-control {
    display: flex;
    flex-direction: column;
}

.radio-group {
    display: flex;
    gap: 1rem;
    margin-top: 0.5rem;
}

.full-width {
    grid-column: span 2;
}

.required::after {
    content: '*';
    color: red;
    margin-left: 4px;
}
</style>
