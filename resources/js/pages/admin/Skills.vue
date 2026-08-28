<template>
  <AdminLayout>

    <Head title="Manage Skills" />
    <div class="container">

      <h1 class="display-6 fw-bold mb-4">Manage Skills</h1>

      <div class="bg-white p-4 rounded shadow-sm mb-4">
        <h2 class="h5 fw-semibold mb-3">{{ isEditing ? 'Edit Skill' : 'Add Skill' }}</h2>
        <form @submit.prevent="submit" class="row g-3">
          <div class="col-12 col-md-6">
            <label class="form-label fw-bold">Skill Name</label>
            <input v-model="form.name" type="text" class="form-control" required />
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label fw-bold">Percentage (0-100)</label>
            <input v-model="form.percentage" type="number" min="0" max="100" class="form-control" required />
          </div>
          <div class="col-12 d-flex gap-2">
            <button type="submit" class="btn btn-primary" :disabled="form.processing">
              {{ isEditing ? 'Update Skill' : 'Add Skill' }}
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
                <th>Skill Name</th>
                <th>Percentage</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="skill in skills" :key="skill.id">
                <td class="align-middle">{{ skill.name }}</td>
                <td class="align-middle">
                  <div class="progress" style="height: 15px;">
                    <div class="progress-bar" role="progressbar" :style="{ width: skill.percentage + '%' }"
                      :aria-valuenow="skill.percentage" aria-valuemin="0" aria-valuemax="100">{{ skill.percentage }}%
                    </div>
                  </div>
                  <!-- <span class="small">{{ skill.percentage }}%</span> -->
                </td>
                <td class="align-middle">
                  <div class="d-flex gap-2">
                    <button @click="editItem(skill)"
                      class="btn btn-link text-primary p-0 text-decoration-none">Edit</button>
                    <Link :href="`/admin/skills/${skill.id}`" method="delete" as="button"
                      class="btn btn-link text-danger p-0 text-decoration-none">Delete</Link>
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
  skills: Array,
});

const form = useForm({
  name: '',
  percentage: '',
});

const isEditing = ref(false);
const editingId = ref(null);

const editItem = (item) => {
  isEditing.value = true;
  editingId.value = item.id;
  form.name = item.name;
  form.percentage = item.percentage;
  window.scrollTo({ top: 0, behavior: 'smooth' });
};

const cancelEdit = () => {
  isEditing.value = false;
  editingId.value = null;
  form.reset();
};

const submit = () => {
  if (isEditing.value) {
    form.put(`/admin/skills/${editingId.value}`, {
      onSuccess: () => cancelEdit()
    });
  } else {
    form.post('/admin/skills', {
      onSuccess: () => form.reset(),
    });
  }
};
</script>
