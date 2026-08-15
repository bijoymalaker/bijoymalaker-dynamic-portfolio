<template>
  <AdminLayout>
    <Head title="Admin Dashboard" />
    <h1 class="text-3xl font-bold mb-6">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-2">Total Projects</h2>
        <p class="text-4xl text-blue-600">{{ stats.projects }}</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-2">Total Services</h2>
        <p class="text-4xl text-green-600">{{ stats.services }}</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-2">Messages</h2>
        <p class="text-4xl text-yellow-600">{{ stats.messages }}</p>
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
