<template>
  <AdminLayout>
    <Head title="Manage Profile" />
    <h1 class="text-3xl font-bold mb-6">Manage Profile</h1>
    <div class="bg-white p-6 rounded-lg shadow max-w-2xl">
      <form @submit.prevent="submit">
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2">Name</label>
          <input v-model="form.name" type="text" class="w-full px-3 py-2 border rounded" required />
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2">Title</label>
          <input v-model="form.title" type="text" class="w-full px-3 py-2 border rounded" required />
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2">Bio Paragraph 1</label>
          <textarea v-model="form.bio1" class="w-full px-3 py-2 border rounded h-32" required></textarea>
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-bold mb-2">Bio Paragraph 2</label>
          <textarea v-model="form.bio2" class="w-full px-3 py-2 border rounded h-32"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" :disabled="form.processing">Save Profile</button>
      </form>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '../../layouts/AdminLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
  profile: Object,
});

const form = useForm({
  name: props.profile?.name || '',
  title: props.profile?.title || '',
  bio1: props.profile?.bio1 || '',
  bio2: props.profile?.bio2 || '',
});

const submit = () => {
  form.post('/admin/profile');
};
</script>
