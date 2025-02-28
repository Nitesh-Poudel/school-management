<template>

    <div class="content-box d-flex flex-column flex-grow w-100">
        <div class="header">
            <h1>Manage Users</h1>
            <button class="add-user">Add User</button>
        </div>

        <div class="filters">
            <input type="text" placeholder="Search users..." class="search-input" />
            <select class="filter-select">
                <option value="">Filter by Role</option>
                <option value="Admin">Admin</option>
                <option value="Teacher">Teacher</option>
                <option value="Student">Student</option>
                <option value="Parent">Parent</option>
            </select>
            <select class="filter-select">
                <option value="">Filter by Status</option>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>johndoe@example.com</td>
                        <td>Admin</td>
                        <td class="status-active">Active</td>
                        <td>
                            <button class="edit-btn">Edit</button>
                        </td>
                    </tr>
                    <tr>
                        <td>Jane Smith</td>
                        <td>janesmith@example.com</td>
                        <td>Teacher</td>
                        <td class="status-inactive">Inactive</td>
                        <td>
                            <button class="edit-btn">Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script>
export default {
    name: 'ManageUsers',
}

</script>

<style>


.content-box {

background: white;
padding: 20px;
border-radius: 8px;
box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

.header {
display: flex;
justify-content: space-between;
align-items: center;
border-bottom: 2px solid #ddd;
padding-bottom: 10px;
margin-bottom: 20px;
}

.header h1 {
font-size: 24px;
color: #333;
}

.add-user {
background: #007bff;
color: white;
padding: 10px 15px;
border: none;
border-radius: 5px;
cursor: pointer;
}

.add-user:hover {
background: #0056b3;
}

.filters {
display: flex;
gap: 10px;
margin-bottom: 20px;
}

.search-input,
.filter-select {
padding: 8px;
border: 1px solid #ccc;
border-radius: 5px;
width: 30%;
}

.table-container {
overflow-x: auto;
}

table {
width: 100%;
border-collapse: collapse;
background: white;
}

thead {
background: #e0e0e0;
}

th,
td {
padding: 12px;
border-bottom: 1px solid #ddd;
text-align: left;
}

tr:hover {
background: #f5f5f5;
}

.status-active {
color: green;
font-weight: bold;
}

.status-inactive {
color: red;
font-weight: bold;
}

.edit-btn {
background: none;
color: var(--primary-color);
border: none;
cursor: pointer;
}

.edit-btn:hover {
text-decoration: underline;
}


</style>