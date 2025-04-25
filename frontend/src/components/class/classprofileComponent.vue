<template>
  <div class="class-profile w-100 p-3">
    <!-- Back Button -->
    <button @click="$router.back()" class="back-button btn-primary">
      ← Back
    </button>

    <!-- Class Information Header -->
    <div class="profile-header card  text-start   shadow rounded p-3 d-flex justify-content-between">
      <h1 class="class-title">{{ className }}</h1>
      <a href="#">Attendance</a>
    </div>

    <!-- Class Information Section -->
   <div class="d-flex">
    <div class="class-info card rounded p-3 mb-4">
      <h3>Class Details</h3>
      <p><strong>Class Teacher:</strong> {{ classTeacher.name }}</p>
      <p><strong>Number of Students:</strong> {{ numberOfStudents }}</p>
    </div>

    <!-- Students List Section -->
    <div class="students-list  card shadow rounded p-3 mb-4">
      <h3>Students List</h3>
      <ul>
        <li v-for="(student, index) in students" :key="index" class="student-item">
          {{ student.name }}
        </li>
      </ul>
    </div>
   </div>

    <!-- Class Schedule Section -->
    <div class="class-schedule shadow rounded p-3">
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
            classId : '', // Example class level
            classTeacher: 'John Doe', // Example teacher
            className:'',
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
            const response = await studentApi. getStudentByClass(this.classId);
            console.log('data is ',response.data);

            this.numberOfStudents=response.data.count;
            this.className=response.data.class.class_name;
            this.classTeacher=response.data.class.teacher
            console.log('class name is ',this.class)
            console.log('count is ',this.numberOfStudents);

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
    font-size: 18px;
    padding: 10px 15px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-bottom: 20px;
}

.back-button:hover {
    background-color: #0056b3;
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
