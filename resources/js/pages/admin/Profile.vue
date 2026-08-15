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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Avatar -->
          <div class="mb-4 md:col-span-2">
            <label class="block text-gray-700 font-bold mb-2">Avatar Image</label>
            <div class="flex items-center gap-4">
              <img v-if="props.profile?.avatar_path" :src="props.profile.avatar_path.startsWith('http') ? props.profile.avatar_path : `/storage/${props.profile.avatar_path}`" class="w-16 h-16 rounded-full object-cover" />
              <input type="file" @change="e => form.avatar = e.target.files[0]" class="w-full px-3 py-2 border rounded" accept="image/*" />
            </div>
          </div>

          <!-- Contact Info -->
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Email</label>
            <input v-model="form.email" type="email" class="w-full px-3 py-2 border rounded" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Phone</label>
            <input v-model="form.phone" type="text" class="w-full px-3 py-2 border rounded" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Birthday</label>
            <input v-model="form.birthday" type="text" class="w-full px-3 py-2 border rounded" placeholder="e.g. October 06, 2000" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Location</label>
            <input v-model="form.location" type="text" class="w-full px-3 py-2 border rounded" />
          </div>

          <!-- Social Links -->
          <div class="mb-4 md:col-span-2">
            <h3 class="text-lg font-semibold text-gray-700 mb-2 border-b pb-2">Social Links</h3>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Facebook URL</label>
            <input v-model="form.facebook" type="url" class="w-full px-3 py-2 border rounded" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Twitter/X URL</label>
            <input v-model="form.twitter" type="url" class="w-full px-3 py-2 border rounded" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Instagram URL</label>
            <input v-model="form.instagram" type="url" class="w-full px-3 py-2 border rounded" />
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">GitHub URL</label>
            <input v-model="form.github" type="url" class="w-full px-3 py-2 border rounded" />
          </div>
          <div class="mb-4 md:col-span-2">
            <label class="block text-gray-700 font-bold mb-2">LinkedIn URL</label>
            <input v-model="form.linkedin" type="url" class="w-full px-3 py-2 border rounded" />
          </div>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-4" :disabled="form.processing">Save Profile</button>
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
  email: props.profile?.email || '',
  phone: props.profile?.phone || '',
  birthday: props.profile?.birthday || '',
  location: props.profile?.location || '',
  facebook: props.profile?.facebook || '',
  twitter: props.profile?.twitter || '',
  instagram: props.profile?.instagram || '',
  github: props.profile?.github || '',
  linkedin: props.profile?.linkedin || '',
  avatar: null,
});

const submit = () => {
  form.post('/admin/profile');
};
</script>
