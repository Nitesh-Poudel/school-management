<template>

<div class="shadow card" style="max-height: 100%; overflow: scroll;">
        <div class="header">
            <h1>Create User</h1>
        </div>
        <div class="card">
            <form id="createUserForm">
                <div class="form-grid">
                    <div class="form-control">
                        <label for="firstName" class="required">First Name</label>
                        <input 
                            type="text" 
                            id="firstName" 
                            name="firstName" 
                            placeholder="Enter first name" 
                            required
                        >
                    </div>
                    <div class="form-control">
                        <label for="lastName" class="required">Last Name</label>
                        <input 
                            type="text" 
                            id="lastName" 
                            name="lastName" 
                            placeholder="Enter last name" 
                            required
                        >
                    </div>
                    <div class="form-control">
                        <label for="email" class="required">Email Address</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="Enter email address" 
                            required
                        >
                    </div>
                    <div class="form-control">
                        <label for="contactNumber" class="required">Contact Number</label>
                        <input 
                            type="tel" 
                            id="contactNumber" 
                            name="contactNumber" 
                            placeholder="Enter contact number" 
                            required
                        >
                    </div>
                    <div class="form-control full-width">
                        <label for="address" class="required">Address</label>
                        <textarea 
                            id="address" 
                            name="address" 
                            rows="3" 
                            placeholder="Enter full address" 
                            required
                        ></textarea>
                    </div>
                    <div class="form-control full-width">
                        <label class="required">Role</label>
                        <div class="role-selection">
                            <label class="role-card">
                                <input type="radio" name="role" value="administrator" required> 
                                <div>
                                    <strong>Administrator</strong>
                                    <p>Full access to manage system settings, users, and data</p>
                                </div>
                            </label>
                            <label class="role-card">
                                <input type="radio" name="role" value="teacher" required> 
                                <div>
                                    <strong>Teacher</strong>
                                    <p>Access to manage classes, assignments, and student records</p>
                                </div>
                            </label>
                            <label class="role-card">
                                <input type="radio" name="role" value="parent" required> 
                                <div>
                                    <strong>Parent</strong>
                                    <p>Access to view child's progress and communicate with teachers</p>
                                </div>
                            </label>
                            <label class="role-card">
                                <input type="radio" name="role" value="student" required> 
                                <div>
                                    <strong>Student</strong>
                                    <p>Access to view assignments, submit work, and track progress</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <button type="button" class="btn-cancel">Cancel</button>
                    <button type="submit">Create User</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    name: 'CreateUser',
}
</script>
<style scoped>
  :root {

  --primary-color:#235784 /* Set your primary color */

         
            --primary-hover: #4338ca;
            --bg-color: #f9fafb;
            --card-bg: #ffffff;
            --text-color: #1f2937;
            --border-color: #e5e7eb;
            --error-color: #ef4444;
        }
        .form-control{border: none!important;}

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

         p{font-size: 12px !important;}

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

        .form-control {
           
        }

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
            background-color:  #f7aa00;
            color: white;
            border: none;
            border-radius: 0.375rem;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            cursor: pointer;
            transition:0.5s ;
            &:hover{
       
            background-color: #40ABC4;
            transition:0.5s  ;
        
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