<template>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-lg p-4 w-100" style="max-width: 600px;">
        <h2 class="text-center mb-4">Add School</h2>

        <!-- Success Message -->
        <div v-if="successMessage" class="alert alert-success text-center">
            {{ successMessage }}
        </div>

        <!-- Error Message -->
        <div v-if="errorMessage" class="alert alert-danger text-center">
            {{ errorMessage }}
        </div>

        <form @submit.prevent="addSchool">
            <h4 class="text-primary">School Details</h4>
            <div class="form-group mb-3">
                <label class="form-label fw-bold">School Name</label>
                <input v-model="form.school.name" type="text" class="form-control" placeholder="Enter school name" />
            </div>

            <div class="form-group mb-3">
                <label class="form-label fw-bold">Address</label>
                <textarea v-model="form.school.address" class="form-control" placeholder="Enter address"></textarea>
            </div>

            <div class="form-group mb-3">
                <label class="form-label fw-bold">Phone</label>
                <input v-model="form.school.phone" type="text" class="form-control" placeholder="Enter phone number" />
            </div>

            <div class="form-group mb-3">
                <label class="form-label fw-bold">Email</label>
                <input v-model="form.school.email" type="email" class="form-control" placeholder="Enter email" />
            </div>

            <div class="form-group mb-3">
                <label class="form-label fw-bold">Established Year</label>
                <input v-model="form.school.established" type="number" class="form-control" placeholder="Enter year of establishment" />
            </div>

            <h4 class="text-secondary mt-4">Administrator Details</h4>
            <div class="form-group mb-3">
                <label class="form-label fw-bold">Principal Name</label>
                <input v-model="form.administrator.principal" type="text" class="form-control" placeholder="Enter principal name" />
            </div>

            <div class="form-group mb-3">
                <label class="form-label fw-bold">Administrator Email</label>
                <input v-model="form.administrator.admin_email" type="email" class="form-control" placeholder="Enter administrator email" />
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100 shadow" :disabled="loading">
                <span v-if="loading">Adding...</span>
                <span v-else>Add School</span>
            </button>
        </form>
    </div>
</div>
</template>

<script>
import axios from "axios";
export default {
    name: "AddSchool",
    data() {
        return {
            form: {
                school: {
                    name: "Arunodaya Secondary School",
                    address: "Dashankaili-05-Kathmanu",
                    phone: "9823567843",
                    email: "info@arunodaya.edu.np",
                    established: "2015",
                },
                administrator: {
                    principal: "Naniram Basnet",
                    admin_email: "nani@gmail.com",
                }
            },
            successMessage: "",
            errorMessage: "",
            loading: false,
        };
    },
    methods: {
        async addSchool() {
            this.successMessage = "";
            this.errorMessage = "";

            if (!this.form.school.name || !this.form.school.address || !this.form.school.phone || !this.form.school.email ||
                !this.form.school.established || !this.form.administrator.principal || !this.form.administrator.admin_email) {
                this.errorMessage = "All fields are required!";
                return;
            }

            try {
                // Get the authentication token
                const token = localStorage.getItem("auth_token");

                // Make the API request
                const response = await axios.post(
                    "http://127.0.0.1:8000/api/admin/schools/add",
                    this.form, {
                        headers: {
                            Authorization: `Bearer ${token}`,
                            "Content-Type": "application/json"
                        }
                    }
                );

                console.log("API Response:", response.data);

                // Show success message
                this.successMessage = "School added successfully!";

                // Reset the form
                this.resetForm();

            } catch (error) {
                console.error("Error adding school:", error);
                // this.errorMessage = error.response ? .data ? .message || "Failed to add school. Please try again.";
            } finally {
                this.loading = false;
            }

            console.log("Submitted Data:", this.form);

            this.successMessage = "School added successfully!";
            this.resetForm();
        },
        resetForm() {
            this.form = {
                school: {
                    name: "",
                    address: "",
                    phone: "",
                    email: "",
                    established: "",
                },
                administrator: {
                    principal: "",
                    admin_email: "",
                }
            };
        },
    },
};
</script>

<style scoped>
</style>
