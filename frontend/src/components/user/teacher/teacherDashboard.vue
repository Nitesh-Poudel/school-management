<template>
<div class="  overflow-hidden">
    
    <div class="contents d-flex">
        <sidebarComponent />
        <div class="w-100 p-2">
            <HeaderComponent />
            <router-view></router-view>
        </div>
    </div>

</div>
</template>

    
<style scoped>
.container {
    height: 90vh;
    overflow: scroll;
    /* background-col   or: blanchedalmond; */
}
</style>

    
<script>
import HeaderComponent from '@/components/layout/header.vue';
import sidebarComponent from '@/components/user/teacher/sidebarComponent.vue';
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
