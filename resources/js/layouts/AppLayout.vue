<script setup>

import Navbar from '@/components/Navbar.vue';
import SideNav from '@/components/SideNav.vue';


</script>


<template>
     <main>
    <SideNav />
    <div class="main-content">
      <Navbar />
      <slot />
    </div>
  </main>
</template>

