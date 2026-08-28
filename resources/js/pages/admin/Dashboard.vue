<template>
  <AdminLayout>
    <Head title="Admin Dashboard" />
    <div class="container">
      
    <h1 class="display-6 fw-bold mb-4">Dashboard</h1>
    <div class="row g-4">
      <div class="col-12 col-md-4">
        <div class="bg-white p-4 rounded shadow-sm">
          <h2 class="h5 fw-semibold mb-2">Total Projects</h2>
          <p class="display-6 text-primary">{{ stats.projects }}</p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="bg-white p-4 rounded shadow-sm">
          <h2 class="h5 fw-semibold mb-2">Total Services</h2>
          <p class="display-6 text-success">{{ stats.services }}</p>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="bg-white p-4 rounded shadow-sm">
          <h2 class="h5 fw-semibold mb-2">Messages</h2>
          <p class="display-6 text-warning">{{ stats.messages }}</p>
        </div>
      </div>
    </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '../../layouts/AdminLayout.vue';
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
  stats: Object,
});
</script>
