<template>
<div class="student-form">
    <button class="btn btn-primary" type="button" @click="goBack">Back</button>

    <h2>Create Student Info</h2>
    {{ form }}
    <div class="form-grid bg-white">
        <div class="form-control">
            <label for="class" class="required">Class</label>
            <select id="class" v-model="form.class">
                <option disabled value="">Select class</option>
                <option v-for="grade in grades" :key="grade" :value="grade">{{ grade }}</option>
            </select>
        </div>

        <div class="form-control">
            <label for="section">Section</label>
            <input type="text" id="section" v-model="form.section" placeholder="Enter section (e.g. A, B, C)" />
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
</div>
</template>

<script>
export default {
    name: 'createStudent',
    data() {
        return {
            form: {
                class: '',
                section: '',
                rollNumber: '',
                dob: '',
                gender: '',
                guardianName: '',
                emergencyContact: '',
                user_id: null, // will be set from route or state
            },
            grades: ['Nursery', 'LKG', 'UKG', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
        };
    },
    mounted() {
        const userIdFromParams = this.$route.params ?.userId;
        this.form.user_id = userIdFromParams || null;
        console.log("Received user ID for student:", this.form.user_id);
    },
    methods: {
        goBack() {
            this.$router.go(-1); // or use push to a specific route
        },
        async submitForm() {
            try {
                if (!this.form.user_id) {
                    alert("User ID is missing. Cannot submit student info.");
                    return;
                }

                // Example API call – you can replace with actual function
                const response = await this.$axios.post('/api/students', this.form);

                console.log("Student created:", response.data);
                alert("Student information submitted successfully.");
                this.$router.push({
                    name: 'userList'
                }); // or wherever you want to go
            } catch (error) {
                console.error("Error submitting student form:", error);
                alert("Failed to submit student information.");
            }
        },
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
