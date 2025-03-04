<template>
    <HeaderComponent />
    
    <div class="container d-flex overflow-hidden">
       
       <sidebarComponent/>
      <div class="w-100 p-2">
        <router-view></router-view>
      </div>
    
      
    </div>
    </template>
    
    <style scoped>
    .container{
        height: 90vh;
        overflow: scroll;
        /* background-col   or: blanchedalmond; */
    }
    </style>
    
    <script>
    import HeaderComponent from '@/components/layout/header.vue';
    import sidebarComponent from './sidebarComponent.vue';
    export default {
        name: 'teacherDashboard',
        components: {
            HeaderComponent,
            sidebarComponent
        }
    }
    </script>
    
    <style>
    
    </style>
    