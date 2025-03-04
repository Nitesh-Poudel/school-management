<template>
<div class="container mt-4">
    <div class="row my-5 d-flex justify-content-between">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Schools</h5>
                    <h3>120</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Active Subscriptions</h5>
                    <h3>95</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pending Approvals</h5>
                    <h3>10</h3>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Expiring Soon</h5>
                    <h3>5</h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Subscription Statistics</h5>
                    <canvas id="subscriptionChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Revenue Overview</h5>
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>

    </div>

    <div class="py-5">
        <h2 class="mt-4">Schools List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="school in schools" :key="school.id">
                    <td>{{ school.id }}</td>
                    <td>{{ school.name }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm" @click="editSchool(school.id)">Edit</button>
                        <button class="btn btn-danger btn-sm ms-2" @click="deleteSchool(school.id)">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</template>

<script>
import Chart from 'chart.js/auto';
// import axios from "axios";
import SchoolApiService from '@/services/schoolApi';
export default {
    name: "AdminDashboard",
    mounted() {
        this.renderCharts();
        this.fetchSchools();
    },
    data() {
        return {
            schools: [],
            status:'',
        };
    },

    methods: {
        async fetchSchools() {
            const response=await SchoolApiService.getSchool()
        
            console.log('this is ',response.data.data)
            console.log('Status',response.data.status)
            this.schools=response.data.data;
        },
        renderCharts() {
            new Chart(document.getElementById('subscriptionChart'), {
                type: 'bar',
                data: {
                    labels: ['Basic', 'Standard', 'Premium'],
                    datasets: [{
                        label: 'Subscriptions',
                        data: [40, 30, 25],
                        backgroundColor: ['#007bff', '#28a745', '#ffc107']
                    }]
                }
            });

            new Chart(document.getElementById('revenueChart'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Revenue (rs)',
                        data: [1000, 1500, 2000, 2500, 3000],
                        borderColor: '#dc3545',
                        fill: false
                    }]
                }
            });
        }
    }
};
</script>

<style>
.card {
    border-radius: 10px;
}

.card.bg-primary {
    background-color: #0067A5 !important;
}

.card.bg-warning {
    background-color: #FFBF00 !important;
}

.card.bg-sucess {
    background-color: #00A86B !important;
}

.card.bg-denger {
    background-color: #F04923 !important;
}
</style>
