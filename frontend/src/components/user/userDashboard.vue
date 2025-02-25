<template>
  <div class="dashboard">
    <!-- Sidebar -->
    <div class="sidebar">
      <h2>Dashboard</h2>
      <router-link to="/">Home</router-link>
      <router-link to="/classes">Classes</router-link>
      <router-link to="/assignments">Assignments</router-link>
      <router-link to="/messages">Messages</router-link>
      <router-link to="/settings">Settings</router-link>
    </div>

    <!-- Main Content -->
    <div class="content">
      <div class="header">
        <h1>Welcome, {{ userName }} ({{ userRole }})</h1>
        <span>Today: {{ currentDate }}</span>
      </div>

      <!-- Dashboard Stats -->
      <div class="dashboard-section">
        <div class="card">
          <h3>Notifications</h3>
          <ul>
            <li v-for="note in notifications" :key="note.id">
              {{ note.time }} - {{ note.message }}
            </li>
          </ul>
        </div>

        <div class="card">
          <h3>Announcements</h3>
          <ul>
            <li v-for="announcement in announcements" :key="announcement.id">
              <strong>{{ announcement.title }}</strong>: {{ announcement.content }} ({{ announcement.date }})
            </li>
          </ul>
        </div>
      </div>

      <!-- Upcoming Events -->
      <div class="card">
        <h3>Upcoming Events</h3>
        <table class="table">
          <thead>
            <tr>
              <th>Date</th>
              <th>Event</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="event in events" :key="event.id">
              <td>{{ event.date }}</td>
              <td>{{ event.title }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Role-Based Sections -->
      <div v-if="userRole === 'Teacher'" class="card">
        <h3>Your Classes</h3>
        <table class="table">
          <thead>
            <tr><th>Time</th><th>Class</th><th>Room</th><th>Students</th></tr>
          </thead>
          <tbody>
            <tr v-for="cls in teacherClasses" :key="cls.id">
              <td>{{ cls.time }}</td>
              <td>{{ cls.name }}</td>
              <td>{{ cls.room }}</td>
              <td>{{ cls.students }}</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div v-if="userRole === 'Student'" class="card">
        <h3>Your Classes</h3>
        <table class="table">
          <thead>
            <tr><th>Time</th><th>Subject</th><th>Teacher</th><th>Room</th></tr>
          </thead>
          <tbody>
            <tr v-for="cls in studentClasses" :key="cls.id">
              <td>{{ cls.time }}</td>
              <td>{{ cls.subject }}</td>
              <td>{{ cls.teacher }}</td>
              <td>{{ cls.room }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import { ref } from "vue";

export default {
  setup() {
    const userRole = ref("Administrator"); // Change to 'Teacher', 'Student', or 'Parent'
    const userName = ref("John Doe");
    const currentDate = ref(new Date().toLocaleDateString("en-US", { weekday: "long", year: "numeric", month: "long", day: "numeric" }));

    const notifications = ref([
      { id: 1, time: "10 mins ago", message: "New assignment posted for Math class" },
      { id: 2, time: "1 hour ago", message: "Parent-teacher meeting scheduled for next week" }
    ]);

    const announcements = ref([
      { id: 1, title: "School Closure", content: "School closed for teacher development day.", date: "Feb 24, 2025" },
      { id: 2, title: "Sports Day", content: "Annual sports day next month. Register your teams.", date: "Feb 20, 2025" }
    ]);

    const events = ref([
      { id: 1, date: "2025-02-28", title: "Math Quiz" },
      { id: 2, date: "2025-03-05", title: "Science Fair" }
    ]);

    const teacherClasses = ref([
      { id: 1, time: "8:30 AM", name: "Math 101", room: "Room 105", students: 32 },
      { id: 2, time: "10:00 AM", name: "Advanced Algebra", room: "Room 207", students: 28 }
    ]);

    const studentClasses = ref([
      { id: 1, time: "8:30 AM", subject: "Mathematics", teacher: "Mr. Johnson", room: "105" },
      { id: 2, time: "9:45 AM", subject: "Biology", teacher: "Mrs. Smith", room: "302" }
    ]);

    return {
      userRole,
      userName,
      currentDate,
      notifications,
      announcements,
      events,
      teacherClasses,
      studentClasses
    };
  }
};
</script>

<style scoped>
.dashboard {
  display: flex;
}

.sidebar {
  width: 250px;
  background:  #235784;
  color: white;
  padding: 20px;
  height: 100vh;
  position: fixed;
}

.sidebar a {
  display: block;
  color: white;
  text-decoration: none;
  padding: 10px;
  margin: 5px 0;
}

.sidebar a:hover {
  background: #34495e;
}

.content {
  margin-left: 270px;
  padding: 20px;
  width: calc(100% - 270px);
}

.card {
  background: white;
  padding: 15px;
  border-radius: 5px;
  margin-bottom: 15px;
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px;
  background:  #F7AA00;
  color: white;
}

.dashboard-section {
  display: flex;
  gap: 15px;
}

.dashboard-section > div {
  flex: 1;
}

.table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 10px;
}

.table th, .table td {
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

.table th {
  background: #f4f4f4;
}
</style>
