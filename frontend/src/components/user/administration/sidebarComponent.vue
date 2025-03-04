<template>
    <div class="sidebar" style="overflow: scroll;">
      <router-link to="/"><h2>🏠 Dashboard</h2></router-link>
        <ul>
            <!-- User Management -->
            <div class="group">
                <h3>👤 User Management</h3>
                <li>
                    <router-link to="/administrator/manage-users">🛠️ Manage Users</router-link>
                </li>
                <li>
                    <router-link to="/administrator/create-user">➕ Create Users</router-link>
                </li>
            </div>
    
            <!-- Teacher Management -->
            <div class="group">
                <h3>👨‍🏫 Teacher Management</h3>
                <li><a href="#">📋 Manage Teachers</a></li>
                <li><a href="#">📚 Assign Subjects</a></li>
                <li><a href="#">🏫 Assign Classes</a></li>
            </div>
    
            <!-- Student Management -->
            <div class="group">
                <h3>🎓 Student Management</h3>
                <li><a href="#">🧑‍🎓 Manage Students</a></li>
                <li><a href="#">📥 Enroll Student</a></li>
                <li><a href="#">⏩ Promote Student</a></li>
            </div>
    
            <!-- Parent Management -->
            <div class="group">
              <h3>👨‍👩‍👧 Parent Management</h3>
              <li><a href="#">👪 Manage Parents</a></li>
              <li><a href="#">🔗 Link Parent to Student</a></li>
            </div>
    
            <!-- Class & Subject Management -->
            <div class="group">
              <h3>🏫 Class & Subject Management</h3>
              <li><a href="#">🏠 Manage Classes</a></li>
              <li><a href="#">📖 Manage Subjects</a></li>
              <li><a href="#">🔄 Assign Subjects to Classes</a></li>
            </div>
    
            <!-- Attendance -->
            <div class="group">
              <h3>📝 Attendance</h3>
              <li><a href="#">📊 Manage Attendance</a></li>
              <li><a href="#">✅ Mark Attendance</a></li>
            </div>
    
            <!-- Exams & Results -->
            <div class="group">
              <h3>📑 Exams & Results</h3>
              <li><a href="#">📝 Manage Exams</a></li>
              <li><a href="#">📈 Manage Results</a></li>
              <li><a href="#">🏅 Generate Report Cards</a></li>
            </div>
    
            <!-- Events & Announcements -->
            <div class="group">
            <h3>📢 Events & Announcements</h3>
            <li><a href="#">📅 Manage Events</a></li>
            <li><a href="#">📜 School Announcements</a></li>
            </div>
    
            <!-- Calendar & Meetings -->
            <div class="group">
              <h3>📆 Calendar & Meetings</h3>
              <li><a href="#">📌 Manage Calendar</a></li>
              <li><a href="#">🎤 Schedule Meetings</a></li>
            </div>
    
            <!-- Leave & Permissions -->
            <h3>⏳ Leave & Permissions</h3>
            <li><a href="#">📩 Manage Leave Requests</a></li>
        </ul>
    </div>
    </template>
    
    <script>
    export default {
        name: 'SidebarComponent',
    }
    </script>
    
    <style>
    .group{border-bottom: 1px solid gray;}
    .sidebar {
        width: 250px;
        padding: 20px;
        height: 100vh;
        border-right: 1px solid #ddd;
    }
    
    .sidebar h2 {
        font-size: 20px;
        color: #fffefe;
        margin-bottom: 15px;
    }
    
    .sidebar h3 {
        font-size: 16px;
        color: var(--secondary);
        margin-top: 15px;
    }
    
    .sidebar ul {
        list-style: none;
        padding: 0;
    }
    
    .sidebar ul li {
        margin-bottom: 10px;
    }
    
    .sidebar ul li a {
        text-decoration: none;
        color: #d4d4d4;
        font-size: 14px;
        display: block;
        padding: 5px;
        border-radius: 5px;
    }
    
    .sidebar ul li a:hover {
        background: #007bff;
        color: white;
    }
    </style>
    