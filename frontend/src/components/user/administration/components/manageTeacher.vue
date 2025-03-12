<template>
<div class="content-box d-flex flex-column flex-grow w-100">
    <div class="header">
        <h1>Manage Teachers</h1>
        <div>

        </div>
        <!-- <button class="add-user">Add User</button> -->
    </div>

    <div class="filters">
        <input v-model="searchQuery" type="text" placeholder="Search users..." class="search-input" />
        <select v-model="roleFilter" class="filter-select">
            <option value="">Filter by Role</option>
            <option value="Admin">Admin</option>
            <option value="Teacher">Teacher</option>
            <option value="Student">Student</option>
            <option value="Parent">Parent</option>
        </select>
        <select v-model="statusFilter" class="filter-select">
            <option value="">Filter by Status</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="loading">
                    <td colspan="5" class="text-center">Loading users...</td>
                </tr>
                <tr v-else-if="teachers.length===0">
                    <td colspan="5" class="text-center">No users found.</td>
                </tr>
                <tr v-else v-for="teacher in teachers.teachers" :key="teacher.id">
                    <td>{{ teacher.name }}</td>
                    <td>{{ teacher.email }}</td>
                    <td>{{ teacher.role }}</td>
                    <td>{{ teacher.status }}</td>
                    <td>
                        <button @click="editTeacher(teacher)">Edit</button>
                        <button @click="deleteTeacher(teacher.id)">Delete</button>
                    </td>

                </tr>

            </tbody>

        </table>
    </div>
</div>


<!-- </div> -->
</template>

<script>
import teacherApi from '@/services/teacherApi';
export default {
    data() {
        return {
            searchQuery: '',
            roleFilter: '',
            statusFilter: '',
            teachers: [],

            classSections: [{
                    id: 1,
                    name: "Class 5A"
                },
                {
                    id: 2,
                    name: "Class 6B"
                },
            ],
            subjects: [{
                    id: 1,
                    name: "Math"
                },
                {
                    id: 2,
                    name: "Science"
                },
                {
                    id: 3,
                    name: "Social Studies"
                },
                {
                    id: 4,
                    name: "General Knowledge"
                },
            ],
            days: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            form: {
                teacherName: "",
                teacherEmail: "",
                classSection: "",
                roomNumber: "",
                schedule: [{
                    subject: "",
                    startTime: "",
                    endTime: "",
                    days: []
                }]
            },
            showDays: false,
            selectedDays: [],
        };
    },
    async mounted() {
        try {
            const teacher = await teacherApi.fetchTeachers();
            console.log("teacers are :", teacher.data)
            this.teachers = teacher.data;
        } catch (error) {
            console.error("❌ Error in mounted lifecycle hook:", error);
        }
    },
    methods: {

        addSlot() {
            this.form.schedule.push({
                subject: "",
                startTime: "",
                endTime: "",
                days: []
            });
        },
        removeSlot(index) {
            this.form.schedule.splice(index, 1);
        },
        submitForm() {
            console.log("Form Data:", this.form);
            alert("Schedule saved successfully!");
        },
        // async getTeachers(){
        //   const teacher await=
        // }
    }
};
</script>

<style>
.container {
    background-color: #f4f4f4;
}

.card {
    border-radius: 12px;
    background: white;
}
</style>
