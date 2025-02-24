<template>
      <HeaderComponent/>
<div class="container">
    <router-view></router-view>
</div>
</template>

<script>
import HeaderComponent from '@/components/layout/header.vue';
export default {
    name: 'App',
    components: {
        HeaderComponent,

    },

}
</script>


<style>
/* Define Global Variables */
:root {
  --primary-color: #235784; /* Main brand color */
  --secondary-color: #F7AA00; /* Accent color */
  --tertiary-color: #40ABC4; /* Additional highlight */

  --primary-font: 'Poppins', sans-serif; /* For body text */
  --secondary-font: 'Roboto', sans-serif; /* For headings */
  
  --text-color: #333; /* Default text color */
  --bg-color: #f5f5f5; /* Background color */
}

/* Apply Base Styles */
body {
  font-family: var(--primary-font);
  background-color: var(--bg-color);
  color: var(--text-color);
  margin: 0;
  padding: 0;
  line-height: 1.6;
}

/* Headings - Typography and Consistency */
h1, h2, h3, h4, h5, h6 {
  font-family: var(--secondary-font);
  font-weight: 700;
  line-height: 1.2;
  margin-bottom: 1rem;
}

h1 {
  color: var(--primary-color);
  font-size: clamp(2rem, 5vw, 3rem); /* Responsive size */
}

h2 {
  color: var(--secondary-color);
  font-size: clamp(1.75rem, 4vw, 2.5rem);
}

h3 {
  color: var(--tertiary-color);
  font-size: clamp(1.5rem, 3.5vw, 2rem);
}

h4, h5, h6 {
  color: var(--primary-color);
  font-size: clamp(1.2rem, 3vw, 1.5rem);
}

/* Paragraphs - Responsive with Clamp */
p {
  font-size: clamp(1rem, 2.5vw, 1.2rem);
  margin-bottom: 1rem;
  color: var(--text-color);
}

/* Links */
a {
  color: var(--primary-color);
  text-decoration: none;
  transition: color 0.3s ease;
}

a:hover {
  color: var(--secondary-color);
}

/* Buttons - Consistent UI */
.btn-primary {
  background-color: var(--primary-color) !important;
  border-color: var(--primary-color) !important;
  color: white !important;
  font-size: 1rem;
  padding: 10px 20px;
  border-radius: 5px;
  transition: all 0.3s ease;
}

.btn-primary:hover {
  background-color: var(--secondary-color) !important;
  border-color: var(--secondary-color) !important;
}

/* Secondary Button */
.btn-secondary {
  background-color: var(--secondary-color);
  border-color: var(--secondary-color);
  color: white;
  font-size: 1rem;
  padding: 10px 20px;
  border-radius: 5px;
  transition: all 0.3s ease;
}

.btn-secondary:hover {
  background-color: var(--tertiary-color);
  border-color: var(--tertiary-color);
}

/* Cards */
.card {
  background: white;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.card:hover {
  transform: translateY(-5px);
}

/* Forms */
input, textarea, select {
  font-family: var(--primary-font);
  font-size: 1rem;
  padding: 10px;
  border: 1px solid var(--primary-color);
  border-radius: 5px;
  width: 100%;
  margin-bottom: 10px;
}

input:focus, textarea:focus, select:focus {
  border-color: var(--secondary-color);
  outline: none;
}

/* Footer */
footer {
  background: var(--primary-color);
  color: white;
  text-align: center;
  padding: 20px;
  font-size: 1rem;
}
</style>
