<template>
    <div class="container mt-4">
   
      <!-- Manage Sections -->
      <div class="card p-3">
        <h5 class="card-title mb-3">Manage Sections</h5>
        <div class="p-3 border rounded bg-light">
          <label class="form-label fw-bold">Section Name</label>
          <div class="input-group">
            <input v-model="newSection" type="text" class="form-control w-50" placeholder="Enter section name">
            <button @click="addNewSection" class="btn">Add</button>
          </div>
        </div>
        <!-- Display added sections -->
        <ul class="list-group mt-2">
          <li v-for="(section, index) in sections" :key="index" class="list-group-item">
            {{ section }}
          </li>
        </ul>
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
  
        <!-- Right Side: Manage Sections & Class Teacher -->
        <div class="col-md-8">
          <h5>Assign Class Teacher & Add Sections</h5>
  
          <div v-for="(classItem, index) in classes" :key="index" class="bg-white rounded shadow p-2 w-100 m-1">
            <div class="d-flex align-items-center w-100 justify-content-around">
              <!-- Class Name -->
              <div class="col-md-3 fw-bold">
                {{ classItem.name }}
              </div>
  
              <!-- Select Class Teacher -->
              <div class="col-md-4">
                <select v-model="classItem.teacher" class="form-select">
                  <option disabled value="">Select Class Teacher</option>
                  <option v-for="(teacher, i) in teachers" :key="i" :value="teacher">
                    {{ teacher }}
                  </option>
                </select>
              </div>
  
              <!-- Section Selection Dropdown -->
              <div class="p-2 w-25 position-relative">
                <input type="text" readonly @focus="toggleSectionList(index)" class="form-control"
                       :value="classItem.selectedSections.join(', ')" placeholder="Select Sections" />
  
                <div v-if="showSectionList === index" class="w-100 border p-2 bg-light position-absolute">
                  <div v-for="(sectionName, secIndex) in sections" :key="secIndex" class="form-check">
                    <input type="checkbox" class="form-check-input" :id="'section-' + index + '-' + secIndex"
                           :value="sectionName" v-model="classItem.selectedSections">
                    <label class="form-check-label" :for="'section-' + index + '-' + secIndex">{{ sectionName }}</label>
                  </div>
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
    </div>
  </template>
  
  <script>
  export default {
    name: 'manageClassesComponent',
    data() {
      return {
        newSection: "",
        sections: [], // Global list of sections
        showSectionList: null, // Tracks which class dropdown is open
        classes: [
          { name: "Playgroup", teacher: "", sections: [], selectedSections: [] },
          { name: "LKG", teacher: "", sections: [], selectedSections: [] },
          { name: "UKG", teacher: "", sections: [], selectedSections: [] },
          { name: "Class 1", teacher: "", sections: [], selectedSections: [] },
          { name: "Class 2", teacher: "", sections: [], selectedSections: [] },
          { name: "Class 3", teacher: "", sections: [], selectedSections: [] },
          { name: "Class 4", teacher: "", sections: [], selectedSections: [] },
          { name: "Class 5", teacher: "", sections: [], selectedSections: [] },
          { name: "Class 6", teacher: "", sections: [], selectedSections: [] },
          { name: "Class 7", teacher: "", sections: [], selectedSections: [] },
          { name: "Class 8", teacher: "", sections: [], selectedSections: [] },
          { name: "Class 9", teacher: "", sections: [], selectedSections: [] },
          { name: "Class 10", teacher: "", sections: [], selectedSections: [] }
        ],
        teachers: ["John Doe", "Jane Smith", "Robert Brown", "Emily Davis"] // Sample teacher list
      };
    },
    methods: {
      // Add a global section
      addNewSection() {
        if (this.newSection.trim() && !this.sections.includes(this.newSection)) {
          this.sections.push(this.newSection);
          this.newSection = ""; // Reset input field
        }
      },
  
      // Toggle section list per class
      toggleSectionList(index) {
        this.showSectionList = this.showSectionList === index ? null : index;
      },
  
      // Save all selected sections and teachers at once
      saveAll() {
        this.classes.forEach(classItem => {
          classItem.sections = [...classItem.selectedSections];
        });
        console.log("Saved Data:", this.classes);
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
  color: white; /* Adjust as needed */
}

.btn:hover {
  background-color: var(--tertiary-color);
  transition: 0.5s;
}

  </style>
  