<template>
<div class="sidebar" style="overflow: scroll;">
    <h2>Dashboard</h2>
    <ul>
        <li><RouterLink to="">Dashboard</RouterLink></li>

        <h3>User Management</h3>
        <li>  <router-link to="/administrator/manage-users">Manage Users</router-link></li>
        <li>  <router-link to="/administrator/create-user">Create Users</router-link></li>

        <h3>Teacher Management</h3>
        <li><a href="#">Manage Teachers</a></li>
        <li><a href="#">Assign Subjects</a></li>
        <li><a href="#">Assign Classes</a></li>

        <h3>Student Management</h3>
        <li><a href="#">Manage Students</a></li>
        <li><a href="#">Enroll Student</a></li>
        <li><a href="#">Promote Student</a></li>

        <h3>Parent Management</h3>
        <li><a href="#">Manage Parents</a></li>
        <li><a href="#">Link Parent to Student</a></li>

        <h3>Class & Subject Management</h3>
        <li><a href="#">Manage Classes</a></li>
        <li><a href="#">Manage Subjects</a></li>
        <li><a href="#">Assign Subjects to Classes</a></li>

        <h3>Attendance</h3>
        <li><a href="#">Manage Attendance</a></li>
        <li><a href="#">Mark Attendance</a></li>

        <h3>Exams & Results</h3>
        <li><a href="#">Manage Exams</a></li>
        <li><a href="#">Manage Results</a></li>
        <li><a href="#">Generate Report Cards</a></li>

        <h3>Events & Announcements</h3>
        <li><a href="#">Manage Events</a></li>
        <li><a href="#">School Announcements</a></li>

        <h3>Calendar & Meetings</h3>
        <li><a href="#">Manage Calendar</a></li>
        <li><a href="#">Schedule Meetings</a></li>

        <h3>Leave & Permissions</h3>
        <li><a href="#">Manage Leave Requests</a></li>

        <h3>Bus Management</h3>
        <li><a href="#">Manage Bus Routes</a></li>
        <li><a href="#">Assign Students to Buses</a></li>
    </ul>
</div>

</template>
<script>


export default{
    name:'SidebarComponent',
}
</script>

<style>
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
