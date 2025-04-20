<template>
<div class="shadow card">
    <div class="header p-1 m-1">
        <h1>Create {{ form.role ? form.role : 'User' }}</h1>
    </div>
    <!-- {{ authStore.user.roles}} -->
    <div class="card border">
        <form @submit.prevent="submitForm">
            <div v-if="!showStudentForm">
                <div class="form-grid">
                    <div class="form-control">
                        <label for="firstName" class="required">First Name</label>
                        <input type="text" id="firstName" v-model="form.firstName" placeholder="Enter first name" />
                    </div>
                    <div class="form-control">
                        <label for="lastName" class="required">Last Name</label>
                        <input type="text" id="lastName" v-model="form.lastName" placeholder="Enter last name" />
                    </div>
                    <div class="form-control">
                        <label for="email" class="required">Email Address</label>
                        <input type="email" id="email" v-model="form.email" placeholder="Enter email address" />
                    </div>
                    <div class="form-control">
                        <label for="contactNumber" class="required">Contact Number</label>
                        <input type="tel" id="contactNumber" v-model="form.contactNumber" placeholder="Enter contact number" />
                    </div>
                    <div class="form-control full-width">
                        <label for="address" class="required">Address</label>
                        <textarea id="address" v-model="form.address" rows="3" placeholder="Enter full address"></textarea>
                    </div>
                    <div class="form-control full-width">
                        <label class="required">Role</label>
                        <div class="role-selection">
                            <label class="role-card" v-for="role in roles" :key="role.value">
                                <input type="radio" v-model="form.role" :value="role.value" required />
                                <div>
                                    <strong>{{ role.label }}</strong>
                                    <p>{{ role.description }}</p>
                                </div>
                            </label>
                        </div>
                        <input type="hidden" v-model="form.schoolId" value="authStore.user.school_id" id="">

                    </div>
                </div>
                <div class="actions">
                    <button type="button" class="btn-cancel">Cancel</button>
                    <button type="submit">Next</button>
                </div>
            </div>

        </form>
    </div>
</div>
</template>

<script>
import administrationApiService from '@/services/administrationApi'; // Ensure this file exists and has correct exports
import {
    useAuthStore
} from "@/stores/auth";
export default {
    name: 'CreateUser',
    data() {
        return {
            form: {
                firstName: '',
                lastName: '',
                email: '',
                contactNumber: '',
                address: '',
                role: '',
                schoolId: '',
            },
            showStudentForm: false,
            apiResponse: '',
            roles: [{
                    value: 'administrator',
                    label: 'Administrator',
                    description: 'Full access to manage system settings, users, and data'
                },
                {
                    value: 'teacher',
                    label: 'Teacher',
                    description: 'Access to manage classes, assignments, and student records'
                },
                {
                    value: 'parent',
                    label: 'Parent',
                    description: 'Access to view child\'s progress and communicate with teachers'
                },
                {
                    value: 'student',
                    label: 'Student',
                    description: 'Access to view assignments, submit work, and track progress'
                }
            ]
        };
    },
    setup() {
        const authStore = useAuthStore(); // Access Pinia store
        return {
            authStore
        };
    },

    methods: {
        async submitForm() {

            this.schoolId = this.authStore.school_id;
            console.log("🛠️ Auth Store Data:", this.authStore);
            console.log("🔍 schoolId from store:", this.authStore.schoolId);
            console.log(this.form)
            try {
                const response = await administrationApiService.createUser(this.form);

                // Log the exact data returned from the backend
                console.log('User created successfully:', response.data);

                if (this.form.role === 'student') {
                    this.$router.push({
                        name: 'createStudent',
                        state: {
                            userId: response.data.user.id
                        }
                    });
                }

                // Show message in alert
                // alert(response.message);
            } catch (error) {
                console.error('Error creating user:', error);
                alert('Failed to create user. Please try again.');
            }
        }

    },
    mounted() {
        this.form.schoolId = this.authStore.school_id; // ✅ Set schoolId when the component mounts
    }

};
</script>

<style scoped>
:root {

    --primary-color: #235784
        /* Set your primary color */

        --primary-hover: #4338ca;
    --bg-color: #f9fafb;
    --card-bg: #ffffff;
    --text-color: #1f2937;
    --border-color: #e5e7eb;
    --error-color: #ef4444;
}

.form-control {
    border: none !important;
}

.header {
    background-color: var(--card-bg);

    border-radius: 0.5rem 0.5rem 0 0;
    /* border: 1px solid var(--border-color); */
    border-bottom: none;
}

.header h1 {
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--text-color);
}

.card {
    background-color: var(--card-bg);
    border-radius: 0 0 0.5rem 0.5rem;
    border: 1px solid var(--border-color);
    /* padding: 2rem; */
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}

p {
    font-size: 12px !important;
}

.form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    /* gap: 1.5rem; */
}

@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
}

.form-control {}

.form-control.full-width {
    grid-column: 1 / -1;
}

label {
    display: block;
    /* margin-bottom: 0.5rem; */
    font-weight: 500;
    font-size: 0.875rem;
}

input,
select,
textarea {
    display: block;
    width: 100%;
    padding: 0.75rem;
    font-size: 0.95rem;
    border: 1px solid rgb(233, 231, 231);
    border-radius: 0.375rem;
    outline: none;
    transition: border-color 0.2s, box-shadow 0.2s;
}

input:focus,
select:focus,
textarea:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 2px rgba(79, 70, 229, 0.2);
}

.error-message {
    color: var(--error-color);
    font-size: 0.75rem;
    margin-top: 0.25rem;
}

button {
    background-color: #f7aa00;
    color: white;
    border: none;
    border-radius: 0.375rem;
    padding: 0.75rem 1.5rem;
    font-weight: 500;
    cursor: pointer;
    transition: 0.5s;

    &:hover {

        background-color: #40ABC4;
        transition: 0.5s;

    }
}

.actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    margin-top: 1rem;
}

.btn-cancel {
    background-color: transparent;
    color: rgb(44, 43, 43);
    border: 1px solid rgb(216, 214, 214);
}

.btn-cancel:hover {
    background-color: var(--bg-color);
}

.role-card {
    border: 1px solid rgb(221, 218, 218);
    border-radius: 0.375rem;
    padding: 5px 10px;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    cursor: pointer;
    transition: border-color 0.2s;
}

.role-card:hover {
    border-color: whitesmoke
}

.role-card input {
    width: auto;
    margin-right: 0.75rem;
}

.required::after {
    content: "*";
    color: var(--error-color);
    margin-left: 0.25rem;
}
</style>
