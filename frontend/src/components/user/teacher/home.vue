

<template>
    <div class="container mt-4">
      <div class="row">
        <!-- Welcome Section -->
        <div class="col-12 mb-4">
          <div class="alert alert-primary" role="alert">
            <h4 class="alert-heading">Welcome, Teacher!</h4>
            <p>Here's your overview for today.</p>
          </div>
        </div>
        
        <!-- Quick Stats -->
        <div class="col-md-4">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Total Students</h5>
              <p class="display-4">120</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Classes Assigned</h5>
              <p class="display-4">5</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center">
            <div class="card-body">
              <h5 class="card-title">Subjects Teaching</h5>
              <p class="display-4">3</p>
            </div>
          </div>
        </div>
        
        <!-- Upcoming Schedule -->
        <div class="col-md-6 mt-4">
          <div class="card">
            <div class="card-header">Upcoming Schedule</div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Math Class - 10:00 AM</li>
              <li class="list-group-item">Parent Meeting - 12:30 PM</li>
              <li class="list-group-item">Science Lab - 2:00 PM</li>
            </ul>
          </div>
        </div>
        
        <!-- Notifications -->
        <div class="col-md-6 mt-4">
          <div class="card">
            <div class="card-header">Recent Notifications</div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">New student added to Class 8</li>
              <li class="list-group-item">Exam schedule updated</li>
              <li class="list-group-item">Meeting with the principal at 4:00 PM</li>
            </ul>
          </div>
        </div>
        
      </div>
    </div>
  </template>
  
  <script>
  export default{
      name:'teacherHome'
  }
  </script>
  
  <style>
  .card {
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
  }
  </style>