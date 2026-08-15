<template>
  <AdminLayout>
    <Head title="Manage Projects" />
    <h1 class="text-3xl font-bold mb-6">Manage Projects</h1>
    
    <div class="bg-white p-6 rounded-lg shadow mb-8">
      <h2 class="text-xl font-semibold mb-4">Add New Project</h2>
      <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-bold mb-2">Title</label>
          <input v-model="form.title" type="text" class="w-full px-3 py-2 border rounded" required />
        </div>
        <div>
          <label class="block text-gray-700 font-bold mb-2">Category</label>
          <input v-model="form.category" type="text" class="w-full px-3 py-2 border rounded" required />
        </div>
        <div class="md:col-span-2">
          <label class="block text-gray-700 font-bold mb-2">Description</label>
          <textarea v-model="form.description" class="w-full px-3 py-2 border rounded"></textarea>
        </div>
        <div>
          <label class="block text-gray-700 font-bold mb-2">Link</label>
          <input v-model="form.link" type="text" class="w-full px-3 py-2 border rounded" />
        </div>
        <div>
          <label class="block text-gray-700 font-bold mb-2">Image</label>
          <input type="file" @change="e => form.image = e.target.files[0]" class="w-full px-3 py-2 border rounded" accept="image/*" />
        </div>
        <div class="md:col-span-2">
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" :disabled="form.processing">Add Project</button>
        </div>
      </form>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
      <table class="min-w-full">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="py-3 px-4 text-left">Image</th>
            <th class="py-3 px-4 text-left">Title</th>
            <th class="py-3 px-4 text-left">Category</th>
            <th class="py-3 px-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="project in projects" :key="project.id" class="border-b">
            <td class="py-3 px-4">
               <img v-if="project.image_path" :src="project.image_path.startsWith('http') ? project.image_path : `/storage/${project.image_path}`" class="w-16 h-16 object-cover rounded" />
            </td>
            <td class="py-3 px-4">{{ project.title }}</td>
            <td class="py-3 px-4">{{ project.category }}</td>
            <td class="py-3 px-4">
              <Link :href="`/admin/projects/${project.id}`" method="delete" as="button" class="text-red-500 hover:text-red-700">Delete</Link>
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
  projects: Array,
});

const form = useForm({
  title: '',
  category: '',
  description: '',
  link: '',
  image: null,
});

const submit = () => {
  form.post('/admin/projects', {
    onSuccess: () => {
      form.reset();
    }
  });
};
</script>
