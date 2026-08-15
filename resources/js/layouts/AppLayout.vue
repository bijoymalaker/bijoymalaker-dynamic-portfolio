<script setup>

import Navbar from '@/components/Navbar.vue';
import SideNav from '@/components/SideNav.vue';
import { usePage } from '@inertiajs/vue3';
import { useToast } from 'vue-toast-notification';
import { watch } from 'vue';

const page = usePage();
const $toast = useToast();

watch(() => page.props.flash, (flash) => {
  if (flash?.success) {
    $toast.success(flash.success, { position: 'top-right' });
  }
  if (flash?.error) {
    $toast.error(flash.error, { position: 'top-right' });
  }
}, { deep: true, immediate: true });


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

