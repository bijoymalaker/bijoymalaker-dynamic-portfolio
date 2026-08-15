<template>
  <AdminLayout>
    <Head title="Manage Skills" />
    <h1 class="text-3xl font-bold mb-6">Manage Skills</h1>
    
    <div class="bg-white p-6 rounded-lg shadow mb-8">
      <h2 class="text-xl font-semibold mb-4">Add Skill</h2>
      <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-bold mb-2">Skill Name</label>
          <input v-model="form.name" type="text" class="w-full px-3 py-2 border rounded" required />
        </div>
        <div>
          <label class="block text-gray-700 font-bold mb-2">Percentage (0-100)</label>
          <input v-model="form.percentage" type="number" min="0" max="100" class="w-full px-3 py-2 border rounded" required />
        </div>
        <div class="md:col-span-2">
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" :disabled="form.processing">Add Skill</button>
        </div>
      </form>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
      <table class="min-w-full">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="py-3 px-4 text-left">Skill Name</th>
            <th class="py-3 px-4 text-left">Percentage</th>
            <th class="py-3 px-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="skill in skills" :key="skill.id" class="border-b">
            <td class="py-3 px-4">{{ skill.name }}</td>
            <td class="py-3 px-4">
              <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-blue-600 h-2.5 rounded-full" :style="{ width: skill.percentage + '%' }"></div>
              </div>
              <span class="text-sm text-gray-500">{{ skill.percentage }}%</span>
            </td>
            <td class="py-3 px-4">
              <Link :href="`/admin/skills/${skill.id}`" method="delete" as="button" class="text-red-500 hover:text-red-700">Delete</Link>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '../../layouts/AdminLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';

const props = defineProps({
  skills: Array,
});

const form = useForm({
  name: '',
  percentage: '',
});

const submit = () => {
  form.post('/admin/skills', {
    onSuccess: () => form.reset(),
  });
};
</script>
