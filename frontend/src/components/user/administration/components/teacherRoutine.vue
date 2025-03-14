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

        </div>

        <!-- <div class="row mb-3">
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
        </div> -->

        <div class="mb-3">

            <label class="form-label">Subjects & Time Slots</label>
            <div v-for="(slot, index) in form.schedule" :key="index" class="d-flex gap-2 mb-2 align-items-center">
                <div class="">

                    <select v-model="slot.class" class="form-select" style="max-width: 150px!important;" required>
                        <option value="" selected disabled>Class</option>
                        <option v-for="classItem in classes" :key="classItem" :value="classItem">
                            {{ classItem }}
                        </option>

                    </select>

                </div>

                <div class="">

                    <select v-model="slot.section" class="form-select" style="max-width: 150px!important;" required>
                        <option value="" selected disabled>Section</option>
                        <option v-for="sectionItem in sections" :key="sectionItem" :value="sectionItem">
                           Section {{ sectionItem}}
                        </option>
                    </select>

                </div>

                <select v-model="slot.subject" class="form-select w-25 " style="max-width: 120px!important;" required>
                    <option value="" selected disabled>Subject</option>
                    <option v-for="subject in subjects" :key="subject.id" :value="subject.id">
                        {{ subject.name }}
                    </option>
                </select>
                <input type="time" v-model="slot.startTime" class="form-control w-20" style="max-width: 100px;" required />
                <input type="time" v-model="slot.endTime" class="form-control w-20" style="max-width: 100px;" required />

                <div class="position-relative border p-2 rounded bg-light w-50">
                    <input type="text" :value="slot.days.join(', ')" @click.stop="slot.showDays = !slot.showDays" placeholder="Choose days" class="form-control w-100" readonly style="cursor: pointer; background-color: #fff;">

                    <div v-show="slot.showDays" class="position-absolute border rounded shadow-sm p-3 bg-white" style="top: 100%; left: 0; width: 100%; z-index: 10; max-height: 200px; overflow-y: auto;">
                        <div v-for="day in days" :key="day" class="form-check">
                            <input type="checkbox" :id="'day-' + day + index" :value="day" v-model="slot.days" class="form-check-input">
                            <label :for="'day-' + day + index" class="form-check-label ms-2">{{ day }}</label>
                        </div>
                    </div>
                </div>

                <button @click="removeSlot(index)" type="button" class="btn btn-danger">&times;</button>
            </div>
            <button @click="addSlot" type="button" class="btn btn-primary border fw-bold">+</button>
        </div>

        <button type="submit" class="btn   w-100" style="background-color: #F7AA00!important;">Save Schedule</button>
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
    {{ form }}
</div>
</template>

<script>
import teacherApi from '@/services/teacherApi';

export default {
    name: 'teacherRoutineComponent',
    data() {
        return {
            teachers: [],
            classes: ['Playgroup', 'nursary', 'lkg', 'ukg', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'],
            sections:['A','B','C'],
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

                schedule: [{
                    class: "",
                    section:"",
                    subject: "",
                    startTime: "",
                    endTime: "",
                    days: [],
                    showDays: false, // 👈 Each slot should have its own showDays
                }]
            }
        };
    },
    async mounted() {
        try {
            const teacher = await teacherApi.fetchTeachers();
            console.log("Teachers:", teacher.data);
            this.teachers = teacher.data;
        } catch (error) {
            console.error("❌ Error fetching teachers:", error);
        }
    },
    methods: {
        addSlot() {
            this.form.schedule.push({
                subject: "",
                startTime: "",
                endTime: "",
                days: [], // 👈 Each slot has its own separate days array
                showDays: false // 👈 Each slot has its own showDays toggle
            });
        },
        removeSlot(index) {
            this.form.schedule.splice(index, 1);
        },
        submitForm() {
            console.log("Form Data:", this.form);
            alert("Schedule saved successfully!");
        }
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
