<template>
  <AdminLayout>
    <Head title="Manage Profile" />
    <div class="container">
      
    <h1 class="display-6 fw-bold mb-4">Manage Profile</h1>
    <div class="bg-white p-4 rounded shadow-sm" style="max-width: 800px;">
      <form @submit.prevent="submit">
        <div class="mb-3">
          <label class="form-label fw-bold">Name</label>
          <input v-model="form.name" type="text" class="form-control" required />
        </div>
        <div class="mb-3">
          <label class="form-label fw-bold">Title</label>
          <input v-model="form.title" type="text" class="form-control" required />
        </div>
        <div class="mb-3">
          <label class="form-label fw-bold">Bio Paragraph 1</label>
          <textarea v-model="form.bio1" class="form-control" style="height: 120px;" required></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label fw-bold">Bio Paragraph 2</label>
          <textarea v-model="form.bio2" class="form-control" style="height: 120px;"></textarea>
        </div>
        <div class="row g-3">
          <!-- Avatar -->
          <div class="col-12">
            <label class="form-label fw-bold">Avatar Image</label>
            <div class="d-flex align-items-center gap-3">
              <img v-if="props.profile?.avatar_path" :src="props.profile.avatar_path.startsWith('http') ? props.profile.avatar_path : `/storage/${props.profile.avatar_path}`" class="rounded-circle object-fit-cover" style="width: 64px; height: 64px;" />
              <input type="file" @change="e => form.avatar = e.target.files[0]" class="form-control" accept="image/*" />
            </div>
          </div>

          <!-- Contact Info -->
          <div class="col-12 col-md-6">
            <label class="form-label fw-bold">Email</label>
            <input v-model="form.email" type="email" class="form-control" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-bold">Phone</label>
            <input v-model="form.phone" type="text" class="form-control" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-bold">Birthday</label>
            <input v-model="form.birthday" type="text" class="form-control" placeholder="e.g. October 06, 2000" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-bold">Location</label>
            <input v-model="form.location" type="text" class="form-control" />
          </div>

          <!-- Social Links -->
          <div class="col-12 mt-4">
            <h3 class="h5 fw-semibold text-secondary mb-3 border-bottom pb-2">Social Links</h3>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-bold">Facebook URL</label>
            <input v-model="form.facebook" type="url" class="form-control" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-bold">Twitter/X URL</label>
            <input v-model="form.twitter" type="url" class="form-control" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-bold">Instagram URL</label>
            <input v-model="form.instagram" type="url" class="form-control" />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-bold">GitHub URL</label>
            <input v-model="form.github" type="url" class="form-control" />
          </div>
          <div class="col-12">
            <label class="form-label fw-bold">LinkedIn URL</label>
            <input v-model="form.linkedin" type="url" class="form-control" />
          </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4" :disabled="form.processing">Save Profile</button>
      </form>
    </div>
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
