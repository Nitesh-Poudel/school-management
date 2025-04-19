<template>
<div class="container mt-4">
    <!-- Manage Global Sections -->
    <!-- {{ classes }} -->
    <div class="card p-3">
        <h5 class="card-title mb-3">Manage Sections</h5>
        <div class="p-3 border rounded bg-light">
            <label class="form-label fw-bold">Section Name</label>
            <div class="input-group">
                <input v-model="newSection" type="text" class="form-control w-50" placeholder="Enter section name" />
                <button @click="addNewSection" class="btn">Add</button>
            </div>
        </div>
        <!-- Display added sections -->
        <div class="list-group mt-2 d-flex" style="display: flex!important; height:fit-content!important">
            <div v-for="(section, index) in sections" :key="index" class="list-group-item rounded border shadow px-3 py-1 m-1 mx-2 position-relative">
                {{ index+1 }} {{ section }}
                <div class=" position-absolute border d-flex align-items-center rounded-circle " style="top:5px;right:5px; width:20px; height:20px">

                    <button type="button" class="btn-close " style="background-color: #f8f9fa;  transition: all 0.3s;">
                        <span class="visually-hidden">Close</span>
                    </button>

                </div>
            </div>
        </div>

    </div>

    <div class="row mt-4">
        <!-- Left Side: Fixed Classes List -->
        <div class="col-md-4">
            <h5>Classes</h5>
            <ul class="list-group">
                <li v-for="(classItem, index) in classes" :key="index" class="list-group-item">
                    {{ classItem.name }}
                </li>
            </ul>
        </div>

        <!-- Right Side: Assign Teachers to Sections -->
        <div class="col-md-8">
            <h5>Assign Class Teacher to Each Section</h5>

            <div v-for="(classItem, index) in classes" :key="index" class="bg-white rounded shadow p-2 w-100 m-1 position-relative">
                <div class="mb-2 fw-bold">
                    {{ classItem.name }}
                </div>

                <!-- Section Selection Input -->
                <div class="p-2 w-100">
                    <input type="text" readonly @focus="toggleSectionList(index)" class="form-control" :value="classItem.selectedSections.join(', ')" placeholder="Select Sections" />

                    <!-- Dropdown with global sections as checkboxes -->
                    <div v-if="showSectionList === index" class="w-100 border p-2 bg-light position-absolute">
                        <div v-for="(sectionName, secIndex) in sections" :key="secIndex" class="form-check">
                            <input type="checkbox" class="form-check-input" :id="'section-' + index + '-' + secIndex" :value="sectionName" v-model="classItem.selectedSections" />
                            <label class="form-check-label" :for="'section-' + index + '-' + secIndex">{{ sectionName }}</label>
                        </div>
                    </div>
                </div>

                <!-- For each selected section, assign a teacher -->
                <div v-if="classItem.selectedSections.length" class="mt-3">
                    <h6>Assign Teacher for each section:</h6>
                    <div v-for="(section, secIndex) in classItem.selectedSections" :key="secIndex" class="d-flex align-items-center mt-2">
                        <div class="me-2" style="width: 100px;">{{ section }}</div>
                        <div class="flex-grow-1">
                            <select v-model="classItem.classTeachers[section]" class="form-select">
                                <option disabled value="">Select Teacher</option>
                                <option v-for="(teacher, tIndex) in teachers" :key="tIndex" :value="teacher.id">
                                    {{ teacher.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Save All Button -->
    <div class="text-center mt-3">
        <button @click="saveAll" class="btn w-100">Save All</button>
    </div>

    <div class="text-center mt-3">
        <button @click="resetClassData" class=" w-100 btn-danger">Reset All</button>
    </div>
</div>
</template>

<script>
import classApiService from '@/services/classApi'; // Correct import name

import teacherApi from '@/services/teacherApi';
export default {
    name: 'manageClassesComponent',
    data() {
        return {
            newSection: [],
            sections: [], // Global list of sections
            showSectionList: null, // Tracks which class dropdown is open
            classes: [{
                    name: "Playgroup",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "LKG",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "UKG",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "Class 1",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "Class 2",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "Class 3",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "Class 4",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "Class 5",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "Class 6",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "Class 7",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "Class 8",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "Class 9",
                    selectedSections: [],
                    classTeachers: {}
                },
                {
                    name: "Class 10",
                    selectedSections: [],
                    classTeachers: {}
                }
            ],
            teachers: [], // Sample teacher list
            classfromServer: [],
        };
    },
    beforeMount() {
        const fetchTeachers = async () => {
           
                const response = await teacherApi.fetchTeachers();
                console.log('fetching teacheres', response.data.teachers)
                this.teachers = response.data.teachers.map(teacher => ({
                    id: teacher.id, // Extract the id
                    name: teacher.name // Extract the name
                }));
                console.log('Teachers names:', this.teachers); // Log the extracted names
          
          
        };


        const fetchClassData = async () => {
            
                const response = await classApiService.fetchClassData();
                console.log('fetching ', response.data)
                const classData = response.data;
              
                const allSections = [...new Set(classData.map(item => item.section))];
                this.sections = allSections;


                this.classes.forEach(classItem => {
            // Filter records from backend matching the current class name
            const matched = classData.filter(item => item.class_name === classItem.name);

            // Add each section to selectedSections
            classItem.selectedSections = matched.map(item => item.section);

            // Build classTeachers object for each section
            classItem.classTeachers = {};
            matched.forEach(item => {
                classItem.classTeachers[item.section] = item.class_teacher_id;
            });
        });
          
        };

        





       fetchClassData();

        fetchTeachers(); // Call the async function
    },
    methods: {
        // Add a new section to the global list
        addNewSection() {
            // if (this.newSection.trim() && !this.sections.includes(this.newSection)) {
            this.sections.push(this.newSection);
            this.newSection = "";
            // }
        },

        resetClassData(){
                alert('going to delete');
                classApiService.deleteClassData()
        },

        // Toggle the dropdown for selecting sections for a particular class
        toggleSectionList(index) {
            this.showSectionList = this.showSectionList === index ? null : index;
        },
        // Save or process the teacher assignments for each class and section
        saveAll() {
            console.log("Sending class data to backend:", this.classes);

            // Making the function async to handle asynchronous operations
            const saveData = async () => {
                try {
                    // Waiting for the API call to complete
                    const response = await classApiService.createClass(this.classes);
                    console.log("Class data saved successfully:", response);
                    alert("response return from server")

                    // You can handle the response here (like showing success message or updating UI)
                } catch (error) {
                    console.error("Error saving class data:", error);
                    // Handle any error that occurs during the API request
                }
            };

            // Call the async function
            saveData();
        }

    }
};
</script>

<style scoped>
.position-relative {
    position: relative;
}

.position-absolute {
    z-index: 10;
    background: white;
}

.btn {
    background-color: var(--secondary-color);
    color: white;
}

.btn:hover {
    background-color: var(--tertiary-color);
    transition: 0.5s;
}
</style>
