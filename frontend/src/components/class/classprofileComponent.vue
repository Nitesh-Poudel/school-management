<template>
    <div class="class-profile w-100 p-3">
      <button @click="$router.back()" class="back-button btn-primary    ">
        ← Back
      </button>
      <div class="profile-header  d-flex justify-content-between">
        <h1 class="class-title">Class Profile: {{ classLevel }}</h1>
        <a href="#">Attendance</a>
      </div>
      
      <div class="class-info">
        <p><strong>Class Teacher:</strong> {{ classTeacher }}</p>
        <p><strong>Number of Students:</strong> {{ numberOfStudents }}</p>
      </div>
  
      <div class="students-list">
        <h3>Students List:</h3>
        <ul>
          <li v-for="(student, index) in students" :key="index" class="student-item">
            {{ student.name }}
          </li>
        </ul>
      </div>
  
      <div class="class-schedule">
        <h3>Class Schedule:</h3>
        <ul>
          <li v-for="(subject, index) in classSchedule" :key="index" class="schedule-item">
            {{ subject }}
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'ClassProfileComponent',
    data() {
      return {
        classLevel: 'Grade 10', // Example class level
        classTeacher: 'John Doe', // Example teacher
        numberOfStudents: 30, // Example number of students
        students: [
          { name: 'Alice Smith' },
          { name: 'Bob Johnson' },
          { name: 'Charlie Davis' },
          { name: 'David Lee' },
          { name: 'Eva Green' },
          // Add more students as necessary
        ],
        classSchedule: [
          'Math - 9:00 AM',
          'Science - 10:30 AM',
          'English - 12:00 PM',
          'History - 1:30 PM',
          'Physical Education - 3:00 PM'
        ]
      };
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
  
  .students-list ul, .class-schedule ul {
    list-style-type: none;
    padding: 0;
  }
  
  .student-item, .schedule-item {
    font-size: 16px;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #f1f1f1;
  }
  
  .student-item:hover, .schedule-item:hover {
    background-color: #e9ecef;
  }
  </style>
  