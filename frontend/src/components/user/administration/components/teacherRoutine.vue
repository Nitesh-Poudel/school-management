<template>
<!-- <div class="w-100 d-flex justify-content-center align-items-center min-vh-100"> -->
<div class="canrd w-100 shadow-lg p-4 w-100 bg-light" style="">
    <div class="border-bottom my-4">
        <h2 class=" ">Assign Teacher Schedule</h2>
        <div>{{ teachers.name }}</div>
    </div>
    <form @submit.prevent="submitForm">
        <div class="row mb-3">
            <div class="col-md-6">
                <label class="form-label">Teacher Name</label>
                <select v-model="form.teacherName" class="form-control" required>
                    <option value="" disabled>Choose Teacher</option>
                    <option v-for="teacher in teachers.teachers" :key="teacher.id" :value="teacher.id">

                        {{ teacher.name }}
                    </option>
                </select>

            </div>
            <div class="col-md-6">
                <label class="form-label">Class</label>
                <select v-model="form.classSection" class="form-select" required>
                    <option v-for="section in classSections" :key="section.id" :value="section.id">
                        {{ section.name }}
                    </option>
                </select>
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

                <div class="position-relative border p-2 rounded bg-light w-50">
                    <input type="text" :value="selectedDays.join(', ')" @click.stop="showDays = !showDays" placeholder="Choose days" class="form-control w-100  " readonly style="cursor: pointer; background-color: #fff;">

                    <div v-show="showDays" class="position-absolute border rounded shadow-sm p-3 bg-white" style="top: 100%; left: 0; width: 100%; z-index: 10; max-height: 200px; overflow-y: auto;">

                        <div v-for="day in days" :key="day" class="form-check">
                            <input type="checkbox" :id="'day-' + day" :value="day" v-model="selectedDays" class="form-check-input">
                            <label :for="'day-' + day" class="form-check-label ms-2">{{ day }}</label>
                        </div>
                    </div>
                </div>

                <button @click="removeSlot(index)" type="button" class="btn btn-danger">&times;</button>
            </div>
            <button @click="addSlot" type="button" class="btn btn-primary">+ Add Slot</button>
        </div>

        <button type="submit" class="btn  w-100" style="background-color: #F7AA00!important;">Save Schedule</button>
    </form>
</div>

<!-- Routine of  here -->
<div class="caxrd w-100 shadow-lg p-4 w-100 bg-light">
    <div class="border-bottom my-4">
        <h2 class=" ">Routine</h2>
        <div>{{ teachers.name }}</div>
    </div>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>Class</th>
                <th>Subject</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Days</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Class 5A</td>
                <td>Math</td>
                <td>10:00 AM</td>
                <td>10:40 AM</td>
                <td>Sunday, Monday, tuesday Wednesday,Thursday, Friday</td>
            </tr>
            <tr>
                <td>Class 6B</td>
                <td>Science</td>
                <td>10:40 AM</td>
                <td>11:20 AM</td>
                <td>Sunday, Monday, tuesday Wednesday,Thursday, Friday</td>
            </tr>
            <tr>
                <td>Class 6B</td>
                <td>C.Math</td>
                <td>11:30 PM</td>
                <td>12:10 PM</td>
                <td>Sunday, Monday, tuesday </td>
            </tr>
            <tr>
                <td>Class 6B</td>
                <td>Opt Math</td>
                <td>11:30 PM</td>
                <td>12:10 PM</td>
                <td>Wednesday,Thursday, Friday</td>
            </tr>
        </tbody>

    </table>
</div>
</template>

<script>
import teacherApi from '@/services/teacherApi';
export default {
    name: 'teacherRoutineComponent',
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
