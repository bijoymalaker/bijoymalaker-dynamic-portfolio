<template>
  <AdminLayout>

    <Head title="Manage Experience" />
    <div class="container">
      <h1 class="display-6 fw-bold mb-4">Manage Experience</h1>

      <div class="mb-4 rounded bg-white p-4 shadow-sm">
        <h2 class="h5 fw-semibold mb-3">
          {{ isEditing ? 'Edit Experience' : 'Add Experience' }}
        </h2>
        <form @submit.prevent="submit" class="row g-3">
          <div class="col-md-6 col-12">
            <label class="form-label fw-bold">Job Title</label>
            <input v-model="form.title" type="text" class="form-control" required />
          </div>
          <div class="col-md-6 col-12">
            <label class="form-label fw-bold">Company</label>
            <input v-model="form.company" type="text" class="form-control" required />
          </div>
          <div class="col-md-6 col-12">
            <label class="form-label fw-bold">Years</label>
            <input v-model="form.years" type="text" class="form-control" required />
          </div>
          <div class="col-md-6 col-12">
            <label class="form-label fw-bold">Expertise</label>
            <input v-model="form.expertise" type="text" class="form-control" />
          </div>
          <div class="col-12">
            <label class="form-label fw-bold">Description</label>
            <textarea v-model="form.description" class="form-control"></textarea>
          </div>
          <div class="d-flex col-12 gap-2">
            <button type="submit" class="btn btn-primary" :disabled="form.processing">
              {{
                isEditing
                  ? 'Update Experience'
                  : 'Add Experience'
              }}
            </button>
            <button v-if="isEditing" type="button" @click="cancelEdit" class="btn btn-secondary">
              Cancel
            </button>
          </div>
        </form>
      </div>

      <div class="overflow-hidden rounded bg-white shadow-sm">
        <div class="table-responsive">
          <table class="mb-0 table">
            <thead class="table-dark">
              <tr>
                <th>Title</th>
                <th>Company</th>
                <th>Years</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="exp in experience" :key="exp.id">
                <td>{{ exp.title }}</td>
                <td>{{ exp.company }}</td>
                <td>{{ exp.years }}</td>
                <td>
                  <div class="d-flex gap-2">
                    <button @click="editItem(exp)" class="btn btn-link text-decoration-none p-0 text-primary">
                      Edit
                    </button>
                    <Link :href="`/admin/experience/${exp.id}`" method="delete" as="button"
                      class="btn btn-link text-danger text-decoration-none p-0">Delete</Link>
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
      onSuccess: () => cancelEdit(),
    });
  } else {
    form.post('/admin/experience', {
      onSuccess: () => form.reset(),
    });
  }
};
</script>
