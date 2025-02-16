<template>
    <div class="container mt-5">
      <div class="card shadow-lg p-4">
        <h2 class="text-center text-primary mb-4">Add School</h2>
  
        <div class="alert alert-success d-none text-center">School added successfully!</div>
  
        <form>
          <div class="form-group mb-3">
            <label class="form-label fw-bold">School Name</label>
            <input type="text" class="form-control border-primary shadow-sm rounded" placeholder="Enter school name" />
          </div>
  
          <div class="form-group mb-3">
            <label class="form-label fw-bold">Address</label>
            <textarea class="form-control border-primary shadow-sm rounded" placeholder="Enter address"></textarea>
          </div>
  
          <div class="form-group mb-3">
            <label class="form-label fw-bold">Phone</label>
            <input type="text" class="form-control border-primary shadow-sm rounded" placeholder="Enter phone number" />
          </div>
  
          <div class="form-group mb-4">
            <label class="form-label fw-bold">Email</label>
            <input type="email" class="form-control border-primary shadow-sm rounded" placeholder="Enter email" />
          </div>
  
          <button type="submit" class="btn btn-primary btn-lg w-100">Add School</button>
        </form>
      </div>
    </div>
  </template>
  
<script>
export default {
  name: 'addSchool',
}
</script>
<style>

</style>