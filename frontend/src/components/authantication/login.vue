<template>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4 rounded" style="width: 350px;">
        <h2 class="text-center text-primary mb-4">Login</h2>

        <form @submit.prevent="loginUser">

            <div class="form-group mb-3">
                <label class="form-label fw-bold">Email</label>
                <input v-model="email" type="email" class="form-control border-primary shadow-sm rounded" placeholder="Enter your email" />
            </div>

            <div class="form-group mb-3">
                <label class="form-label fw-bold">Password</label>
                <input v-model="password" type="password" class="form-control border-primary shadow-sm rounded" placeholder="Enter your password" />

            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberMe" />
                    <label class="form-check-label" for="rememberMe"> Remember me </label>
                </div>
                <a href="#" class="text-decoration-none text-primary">Forgot Password?</a>
            </div>

            <button type="submit" class="btn btn-primary btn-lg w-100">Login</button>
            <div class="text-danger"> {{ errorMessage }}</div>
        </form>
    </div>
</div>
</template>

<script>
import axios from "axios";

export default {
    name: "loginComponent",
    data() {
        return {
            email: "",
            password: "",
            errorMessage: "",
        };
    },
    methods: {
        async loginUser() {
            console.log('clicked button')
            try {
                console.log(" Login function started!");

                console.log("📡 Sending request to backend...");
                const response = await axios.post("http://localhost:8000/api/login", {
                    email: this.email,
                    password: this.password
                }, {
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    }
                });

                console.log(" Login successful!");
                console.log(" Response Data:", response.data);
                if (response.data.token) {
                    console.log("Received Token:", response.data.token);
                    localStorage.setItem("auth_token", response.data.token); // Store the token

                    this.$router.push("/");
                } else {
                    console.error("No token received!");
                }

                // alert("Login successful!");
                console.log(response.data);
            } catch (error) {
                console.error(" Login failed:", error);

                if (error.response) {
                    console.log(" Full error response:", error.response); // Log the full error response

                    if (error.response.status === 401) {
                        console.log("Invalid credentials:", error.response.data.message);
                        this.errorMessage = error.response.data.message; // Display the error
                    } else if (error.response.status === 422) {
                        console.log(" Validation errors:", error.response.data.errors);
                        this.errorMessage = Object.values(error.response.data.errors).flat().join(" ");
                    } else {
                        console.log(" Other error:", error.response.data);
                        this.errorMessage = "An unexpected error occurred.";
                    }
                } else {
                    this.errorMessage = "Server not responding. Please try again later.";
                }
            }
        }

    },
}
</script>

<style scoped>
.container {
    background: #f8f9fa;
    height: 100vh;
}

.card {
    border-radius: 15px;
}
</style>
