<template>


<div class=" d-flex overflow-hidden">

    <sidebarComponent />
    <div class="flex-grow-1 gap-1  overflow-scroll">
      <HeaderComponent />
      <div class="borde " style="height:80vh !important; overflow: auto!important;">
        <router-view></router-view>
      </div>
       
    </div>

</div>
</template>

<style scoped>

</style>

<script>
import HeaderComponent from '@/components/layout/header.vue';
// import sidebarComponent from './sidebarComponent.vue';
import sidebarComponent from '@/components/layout/sidebar.vue';
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
