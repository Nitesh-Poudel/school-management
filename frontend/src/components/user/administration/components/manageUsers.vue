<template>
    <div class="content-box d-flex flex-column flex-grow w-100">
      <div class="header">
        <h1>Manage Users</h1>
        <!-- <button class="add-user">Add User</button> -->
      </div>
  
      <div class="filters">
        <input v-model="searchQuery" type="text" placeholder="Search users..." class="search-input" />
        <select v-model="roleFilter" class="filter-select">
          <option value="">Filter by Role</option>
          <option value="Admin">Admin</option>
          <option value="Teacher">Teacher</option>
          <option value="Student">Student</option>
          <option value="Parent">Parent</option>
        </select>
        <select v-model="statusFilter" class="filter-select">
          <option value="">Filter by Status</option>
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
        </select>
      </div>
  
      <div class="table-container" style="height:90%">
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
            <tr v-if="loading">
              <td colspan="5" class="text-center">Loading users...</td>
            </tr>
            <tr v-else-if="filteredUsers.length === 0">
              <td colspan="5" class="text-center">No users found.</td>
            </tr>
            <tr v-else v-for="user in filteredUsers" :key="user.id">
              <td>{{ user.name }}</td>
              <td>{{ user.email }}</td>
              <td>
                <span v-if="Array.isArray(user.roles) && user.roles.length">
                  <span v-for="(role, index) in user.roles" :key="index">
                    {{ role.role }}<span v-if="index !== user.roles.length - 1">, </span>
                  </span>
                </span>
                <span v-else>-</span>
              </td>
              <td :class="user.status === 'Active' ? 'status-active' : 'status-inactive'">
                {{ user.status }}
              </td>
              <td>
                <button class="edit-btn">Edit</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <!-- Pagination Controls -->
      <div class="pagination-container" v-if="totalUsers > 0">
        <button 
          :disabled="currentPage === 1" 
          @click="fetchUsers(currentPage - 1)" 
          class="pagination-btn">
          Previous
        </button>
        <span>{{ currentPage }} / {{ lastPage }}</span>
        <button 
          :disabled="currentPage === lastPage" 
          @click="fetchUsers(currentPage + 1)" 
          class="pagination-btn">
          Next
        </button>
      </div>
    </div>
  </template>
  
  <script>
  import administrationApiService from '@/services/administrationApi';
  
  export default {
    name: 'ManageUsers',
    data() {
      return {
        users: [],
        loading: true,
        searchQuery: '',
        roleFilter: '',
        statusFilter: '',
        currentPage: 1,
        lastPage: 1,
        totalUsers: 0,
        perPage: 10
      };
    },
  
    computed: {
      filteredUsers() {
        if (!Array.isArray(this.users)) {
          return []; // Prevents errors if users is undefined or not an array
        }
  
        return this.users.filter(user => {
          return (
            (!this.roleFilter || user.roles.some(role => role.role === this.roleFilter)) && // Check if any role matches
            (!this.statusFilter || user.status === this.statusFilter) &&
            (!this.searchQuery || user.name.toLowerCase().includes(this.searchQuery.toLowerCase()))
          );
        });
      },
    },
  
    async mounted() {
      await this.fetchUsers();
    },
  
    methods: {
      async fetchUsers(page = 1) {
        this.loading = true;
        try {
          const response = await administrationApiService.getUsers(page);
          console.log("Userrrr Response:", response.data);
  
          // Access the users data correctly
          if (response.data && response.data.users && Array.isArray(response.data.users.data)) {
            console.log('Paginated data:', response);
            this.users = response.data.users.data.map(user => ({
              ...user,
              roles: Array.isArray(user.roles) ? user.roles : [], // Ensure roles is always an array
            }));
  
            this.currentPage = response.data.users.current_page;
            this.lastPage = response.data.users.last_page;
            this.totalUsers = response.data.users.total;
            this.perPage = response.data.users.per_page;
          } else {
            console.error("API response is invalid:", response.data);
            this.users = [];
          }
        } catch (error) {
          console.error('Error fetching users:', error);
          alert('Failed to fetch users. Please try again.');
          this.users = [];
        } finally {
          this.loading = false;
        }
      }
    }
  };
  </script>
  
  <style scoped>
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
  
  .pagination-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
  }
  
  .pagination-btn {
    padding: 8px 16px;
    margin: 0 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    cursor: pointer;
  }
  
  .pagination-btn:disabled {
    background-color: #f0f0f0;
    cursor: not-allowed;
  }
  </style>
  