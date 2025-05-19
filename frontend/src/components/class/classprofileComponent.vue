<template>
<div class="class-profile w-100 p-3">
    <!-- Back Button -->
    <div class="my-2 border d-flex justify-content-between align-items-baseline">
        <button @click="$router.back()" class="back-button shadow border">
            <span class="text-dark fw-700">← </span>
        </button>

        <div class="border position-aboulate" style="max-height:300px; width:300px">
            <input type="text" placeholder="Search...." class="" style="height:40px; width:100%">
            <div class="border p-3 position-relative card bg-white" style="top:43px"></div>
        </div>
        <!-- Class Information Header -->

    </div>

    <div class="profile-header card  text-start   shadow rounded p-3 d-flex justify-content-between">
        <h1 class="class-title">{{ className }}</h1>
        <a href="#">Attendance</a>
    </div>
    <!-- Class Information Section -->
    <div class="container">
        <div class="row d-flex justify-content-between">
            <!-- Class Info Column -->
            <div class="col-md-6">
                <div class="class-info card rounded  mb-4">
                    <h3>Class Details</h3>
                    <p><strong>Class Teacher:</strong> {{ classTeacher.name }}</p>
                    <span><strong>Number of Students:</strong> {{ numberOfStudents }}</span>
                </div>

                <div class=" border d-grid" style="grid-template-columns: 1fr 1fr; gap: 1rem; heighjt:100px">
                    
                  <div class="card text-white  h-75 " style="background-color: #4CAF50; max-height:100%">
                        <div class="">
                            <span class="">Present</span><br>
                            <span class=" text-white fs-3" style="font-weight: 800;">150</span>
                        </div>
                    </div>

                    <div class="card text-white h-75 " style="background-color: #dc3545;">
                        <div class="">
                            <span class="">Absent</span><br>
                            <span class="card-text text-white fs-3" style="font-weight: 800;">30</span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Students List Column -->
            <div class="col-md-6 border" style="height:600px">
                <div class="students-list card shadow rounded p-3 mb-4 h-100">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Students List</h3>
                        <span>Active Status</span>
                    </div>
                    <ul>
                        <li v-for="(student, index) in students" :key="index" class="student-item d-flex justify-content-between">
                            <span>{{ student.name }}</span>
                            <span> Present</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Class Schedule Section -->
    <div class="class-schedule shadow card rounded p-3">
        <h3>Class Schedule</h3>
        <ul>
            <li v-for="(subject, index) in classSchedule" :key="index" class="schedule-item">
                {{ subject }}
            </li>
        </ul>
    </div>
</div>
</template>

<script>
import studentApi from '@/services/studentsApi';

export default {
    name: 'ClassProfileComponent',
    data() {
        return {
            classId: '', // Example class level
            classTeacher: 'John Doe', // Example teacher
            className: '',
            numberOfStudents: '', // Example number of students
            students: [{
                    name: 'Alice Smith'
                },
                {
                    name: 'Bob Johnson'
                },

            ],
            classSchedule: [
                'Math - 9:00 AM',
                'Science - 10:30 AM',
                'English - 12:00 PM',
                'History - 1:30 PM',
                'Physical Education - 3:00 PM'
            ]
        };
    },

    async mounted() {
        this.classId = this.$route.params.level;
        await this.getStudentByClass(); // Call the method when component mounts
    },
    methods: {
        async getStudentByClass() {
            // alert('thisssssssssss is this',  this.classId);
            const response = await studentApi.getStudentByClass(this.classId);
            console.log('data is ', response.data);

            this.numberOfStudents = response.data.count;
            this.className = response.data.class.class_name;
            this.classTeacher = response.data.class.teacher
            console.log('class name is ', this.class)
            console.log('count is ', this.numberOfStudents);

            this.students = response.data.data;
            console.log("jfege ", this.students)
            console.log('students are ', response.data.data)

        }
    }

};
</script>

<style scoped>
.profile-header {
    text-align: center;
    margin-bottom: 20px;
}

.class-title {
    font-size: 24px;
    color: #333;
}

.back-button {
    font-size: 32px;
    font-weight: 900 !important;
    width: 40px;
    height: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    /* color:rgb(41, 39, 39); */
    background-color: #e6e7e7;

    /* border: none; */
    /* border-radius: 50%; */
    transition: 0.3s;
    cursor: pointer;
    margin-bottom: auto;

}

.back-button:hover {
    background-color: #d5d6d8;
}

.class-info p {
    font-size: 18px;
    margin: 10px 0;
}

.students-list ul,
.class-schedule ul {
    list-style-type: none;
    padding: 0;
}

.student-item,
.schedule-item {
    font-size: 16px;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #f1f1f1;
}

.student-item:hover,
.schedule-item:hover {
    background-color: #e9ecef;
}
</style>
