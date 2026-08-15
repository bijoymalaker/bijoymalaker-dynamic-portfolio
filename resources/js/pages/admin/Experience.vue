<template>
  <AdminLayout>
    <Head title="Manage Experience" />
    <h1 class="text-3xl font-bold mb-6">Manage Experience</h1>
    
    <div class="bg-white p-6 rounded-lg shadow mb-8">
      <h2 class="text-xl font-semibold mb-4">{{ isEditing ? 'Edit Experience' : 'Add Experience' }}</h2>
      <form @submit.prevent="submit" class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-gray-700 font-bold mb-2">Job Title</label>
          <input v-model="form.title" type="text" class="w-full px-3 py-2 border rounded" required />
        </div>
        <div>
          <label class="block text-gray-700 font-bold mb-2">Company</label>
          <input v-model="form.company" type="text" class="w-full px-3 py-2 border rounded" required />
        </div>
        <div>
          <label class="block text-gray-700 font-bold mb-2">Years</label>
          <input v-model="form.years" type="text" class="w-full px-3 py-2 border rounded" required />
        </div>
        <div>
          <label class="block text-gray-700 font-bold mb-2">Expertise</label>
          <input v-model="form.expertise" type="text" class="w-full px-3 py-2 border rounded" />
        </div>
        <div class="md:col-span-2">
          <label class="block text-gray-700 font-bold mb-2">Description</label>
          <textarea v-model="form.description" class="w-full px-3 py-2 border rounded"></textarea>
        </div>
        <div class="md:col-span-2 flex gap-2">
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" :disabled="form.processing">
            {{ isEditing ? 'Update Experience' : 'Add Experience' }}
          </button>
          <button v-if="isEditing" type="button" @click="cancelEdit" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Cancel
          </button>
        </div>
      </form>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
      <table class="min-w-full">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="py-3 px-4 text-left">Title</th>
            <th class="py-3 px-4 text-left">Company</th>
            <th class="py-3 px-4 text-left">Years</th>
            <th class="py-3 px-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="exp in experience" :key="exp.id" class="border-b">
            <td class="py-3 px-4">{{ exp.title }}</td>
            <td class="py-3 px-4">{{ exp.company }}</td>
            <td class="py-3 px-4">{{ exp.years }}</td>
            <td class="py-3 px-4 flex gap-2">
              <button @click="editItem(exp)" class="text-blue-500 hover:text-blue-700">Edit</button>
              <Link :href="`/admin/experience/${exp.id}`" method="delete" as="button" class="text-red-500 hover:text-red-700">Delete</Link>
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
import { ref } from 'vue';

const props = defineProps({
  experience: Array,
});

const form = useForm({
  title: '',
  company: '',
  years: '',
  expertise: '',
  description: '',
});

const isEditing = ref(false);
const editingId = ref(null);

const editItem = (item) => {
  isEditing.value = true;
  editingId.value = item.id;
  form.title = item.title;
  form.company = item.company;
  form.years = item.years;
  form.expertise = item.expertise || '';
  form.description = item.description || '';
  window.scrollTo({ top: 0, behavior: 'smooth' });
};

const cancelEdit = () => {
  isEditing.value = false;
  editingId.value = null;
  form.reset();
};

const submit = () => {
  if (isEditing.value) {
    form.put(`/admin/experience/${editingId.value}`, {
      onSuccess: () => cancelEdit()
    });
  } else {
    form.post('/admin/experience', {
      onSuccess: () => form.reset(),
    });
  }
};
</script>
