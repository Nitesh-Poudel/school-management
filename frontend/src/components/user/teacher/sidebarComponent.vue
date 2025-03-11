<template>
    <div class="sidebar" style="overflow: scroll;">
      <router-link to="/teacher/home">
        <h2>Teacher Dashboard</h2>
      </router-link>
      <ul>
        <!-- Class & Schedule -->
        <div class="group">
          <h3>Class & Schedule</h3>
          <li><router-link to="/teacher/class-routine">📅 Class Routine</router-link></li>
          <li><router-link to="/teacher/classes">🎓 Assigned Classes</router-link></li>
          <li><router-link to="/teacher/students">🏫 Manage Students</router-link></li>
        </div>
  
        <!-- Teaching & Assignments -->
        <div class="group">
          <h3>Teaching & Assignments</h3>
          <li><router-link to="/teacher/assignments">📝 Assignments</router-link></li>
          <li><router-link to="/teacher/resources">📚 Educational Resources</router-link></li>
          <li><router-link to="/teacher/lesson-plans">📖 Lesson Plans</router-link></li>
        </div>
  
        <!-- Exams & Results -->
        <div class="group">
          <h3>Exams & Results</h3>
          <li><router-link to="/teacher/exams">🏆 Manage Exams</router-link></li>
          <li><router-link to="/teacher/results">📊 Manage Results</router-link></li>
          <li><router-link to="/teacher/report-cards">🏅 Generate Report Cards</router-link></li>
        </div>
  
        <!-- Attendance -->
        <div class="group">
          <h3>Attendance</h3>
          <li><router-link to="/teacher/attendance">✅ Mark Attendance</router-link></li>
          <li><router-link to="/teacher/attendance-reports">📄 Attendance Reports</router-link></li>
        </div>
  
        <!-- Communication & Collaboration -->
        <div class="group">
          <h3>Communication</h3>
          <li><router-link to="/teacher/announcements">📢 Announcements</router-link></li>
          <li><router-link to="/teacher/messages">📩 Messages & Chats</router-link></li>
          <li><router-link to="/teacher/meetings">🎤 Meetings</router-link></li>
        </div>
  
        <!-- Events & Calendar -->
        <div class="group">
          <h3>Events & Calendar</h3>
          <li><router-link to="/teacher/events">📌 School Events</router-link></li>
          <li><router-link to="/teacher/calendar">📅 Academic Calendar</router-link></li>
        </div>
  
        <!-- Leave & Permissions -->
        <div class="group">
          <h3>Leave & Permissions</h3>
          <li><router-link to="/teacher/leave-requests">⏳ Leave Requests</router-link></li>
        </div>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    name: 'TeacherSidebarComponent',
  }
  </script>
 