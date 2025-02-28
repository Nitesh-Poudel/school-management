<template>
<HeaderComponent />

<div class="container d-flex ">
   
   <sidebarComponent/>
  <div class="w-100 p-2">
    <router-view></router-view>
  </div>

  
</div>
</template>

<style scoped>
.container{
    max-height: calc(100vh - 130px);
    overflow: scroll;
    /* background-col   or: blanchedalmond; */
}
</style>

<script>
import HeaderComponent from '@/components/layout/header.vue';
import sidebarComponent from './sidebarComponent.vue';
export default {
    name: 'administrationDashboard',
    components: {
        HeaderComponent,
        sidebarComponent
    }
}
</script>

<style>

</style>
