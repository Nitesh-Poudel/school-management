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

<!-- <div class="w-100 d-flex justify-content-center align-items-center min-vh-100"> -->
<div class="card w-100 shadow-lg p-4 w-100 bg-light" style="">
    <div class="border-bottom my-4">
        <h2 class=" ">Assign Teacher Schedule</h2>
        <div>{{ teachers.name }}</div>
    </div>
    <form @submit.prevent="submitForm">
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Teacher Name</label>
                <input type="text" v-model="form.teacherName" class="form-control" placeholder="Enter teacher name" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Teacher Email</label>
                <input type="email" v-model="form.teacherEmail" class="form-control" placeholder="Enter email" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Class Section</label>
                <select v-model="form.classSection" class="form-select" required>
                    <option v-for="section in classSections" :key="section.id" :value="section.id">
                        {{ section.name }}
                    </option>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Room Number</label>
                <input type="text" v-model="form.roomNumber" class="form-control" placeholder="Enter room number">
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Subjects & Time Slots</label>
            <div v-for="(slot, index) in form.schedule" :key="index" class="d-flex gap-2 mb-2 align-items-center">
                <select v-model="slot.subject" class="form-select w-25" required>
                    <option v-for="subject in subjects" :key="subject.id" :value="subject.id">
                        {{ subject.name }}
                    </option>
                </select>
                <input type="time" v-model="slot.startTime" class="form-control w-25" required />
                <input type="time" v-model="slot.endTime" class="form-control w-25" required />
                <select v-model="slot.days" multiple class="form-select w-25" required>
                    <option v-for="day in days" :key="day" :value="day">{{ day }}</option>
                </select>
                <button @click="removeSlot(index)" type="button" class="btn btn-danger">&times;</button>
            </div>
            <button @click="addSlot" type="button" class="btn btn-primary">+ Add Slot</button>
        </div>

        <button type="submit" class="btn btn-success w-100">Save Schedule</button>
    </form>
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
            }
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
