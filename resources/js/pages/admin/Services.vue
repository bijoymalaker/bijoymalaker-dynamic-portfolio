<template>
  <AdminLayout>
    <Head title="Manage Services" />
    <div class="container">
      
    <h1 class="display-6 fw-bold mb-4">Manage Services</h1>
    
    <div class="bg-white p-4 rounded shadow-sm mb-4">
      <h2 class="h5 fw-semibold mb-3">{{ isEditing ? 'Edit Service' : 'Add New Service' }}</h2>
      <form @submit.prevent="submit" class="row g-3">
        <div class="col-12 col-md-6">
          <label class="form-label fw-bold">Name</label>
          <input v-model="form.name" type="text" class="form-control" required />
        </div>
        <div class="col-12">
          <label class="form-label fw-bold">Description</label>
          <textarea v-model="form.description" class="form-control"></textarea>
        </div>
        <div class="col-12 d-flex gap-2">
          <button type="submit" class="btn btn-primary" :disabled="form.processing">
            {{ isEditing ? 'Update Service' : 'Add Service' }}
          </button>
          <button v-if="isEditing" type="button" @click="cancelEdit" class="btn btn-secondary">
            Cancel
          </button>
        </div>
      </form>
    </div>

    <div class="bg-white rounded shadow-sm overflow-hidden">
      <div class="table-responsive">
        <table class="table table-dark mb-0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="service in services" :key="service.id">
              <td>{{ service.name }}</td>
              <td>{{ service.description }}</td>
              <td>
                <div class="d-flex gap-2">
                  <button @click="editItem(service)" class="btn btn-link text-primary p-0 text-decoration-none">Edit</button>
                  <Link :href="`/admin/services/${service.id}`" method="delete" as="button" class="btn btn-link text-danger p-0 text-decoration-none">Delete</Link>
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
  services: Array,
});

const form = useForm({
  name: '',
  description: '',
});

const isEditing = ref(false);
const editingId = ref(null);

const editItem = (item) => {
  isEditing.value = true;
  editingId.value = item.id;
  form.name = item.name;
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
    form.put(`/admin/services/${editingId.value}`, {
      onSuccess: () => cancelEdit()
    });
  } else {
    form.post('/admin/services', {
      onSuccess: () => form.reset(),
    });
  }
};
</script>
