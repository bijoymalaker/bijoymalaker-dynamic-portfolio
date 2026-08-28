<template>
  <AdminLayout>
    <Head title="Manage Education" />
    <div class="container">
      
    <h1 class="display-6 fw-bold mb-4">Manage Education</h1>
    
    <div class="bg-white p-4 rounded shadow-sm mb-4">
      <h2 class="h5 fw-semibold mb-3">{{ isEditing ? 'Edit Education' : 'Add Education' }}</h2>
      <form @submit.prevent="submit" class="row g-3">
        <div class="col-12 col-md-6">
          <label class="form-label fw-bold">Degree</label>
          <input v-model="form.degree" type="text" class="form-control" required />
        </div>
        <div class="col-12 col-md-6">
          <label class="form-label fw-bold">Years</label>
          <input v-model="form.years" type="text" class="form-control" required />
        </div>
        <div class="col-12">
          <label class="form-label fw-bold">Institution</label>
          <input v-model="form.institution" type="text" class="form-control" required />
        </div>
        <div class="col-12 d-flex gap-2">
          <button type="submit" class="btn btn-primary" :disabled="form.processing">
            {{ isEditing ? 'Update Education' : 'Add Education' }}
          </button>
          <button v-if="isEditing" type="button" @click="cancelEdit" class="btn btn-secondary">
            Cancel
          </button>
        </div>
      </form>
    </div>

    <div class="rounded shadow-sm overflow-hidden">
      <div class="table-responsive">
        <table class="table table-dark table-striped-columns mb-0">
          <thead>
            <tr>
              <th>Degree</th>
              <th>Institution</th>
              <th>Years</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="edu in education" :key="edu.id">
              <td>{{ edu.degree }}</td>
              <td>{{ edu.institution }}</td>
              <td>{{ edu.years }}</td>
              <td>
                <div class="d-flex gap-2">
                  <button @click="editItem(edu)" class="btn btn-link text-primary p-0 text-decoration-none">Edit</button>
                  <Link :href="`/admin/education/${edu.id}`" method="delete" as="button" class="btn btn-link text-danger p-0 text-decoration-none">Delete</Link>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    </div>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '../../layouts/AdminLayout.vue';
import { Head, useForm, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps({
  education: Array,
});

const form = useForm({
  degree: '',
  institution: '',
  years: '',
});

const isEditing = ref(false);
const editingId = ref(null);

const editItem = (item) => {
  isEditing.value = true;
  editingId.value = item.id;
  form.degree = item.degree;
  form.institution = item.institution;
  form.years = item.years;
  window.scrollTo({ top: 0, behavior: 'smooth' });
};

const cancelEdit = () => {
  isEditing.value = false;
  editingId.value = null;
  form.reset();
};

const submit = () => {
  if (isEditing.value) {
    form.put(`/admin/education/${editingId.value}`, {
      onSuccess: () => cancelEdit()
    });
  } else {
    form.post('/admin/education', {
      onSuccess: () => form.reset(),
    });
  }
};
</script>
