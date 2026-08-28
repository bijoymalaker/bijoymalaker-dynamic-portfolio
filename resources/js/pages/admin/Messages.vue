<template>
  <AdminLayout>
    <Head title="View Messages" />
    <section class="container">

      <h1 class="display-6 fw-bold mb-4">Contact Messages</h1>

      <div class="rounded shadow-sm overflow-hidden">
        <div class="table-responsive">
          <table class="table table-dark table-striped-columns mb-0">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="message in messages" :key="message.id">
                <td>{{ message.name }}</td>
                <td><a :href="'mailto:' + message.email" class="text-primary">{{ message.email }}</a></td>
                <td class="text-break">{{ message.message }}</td>
                <td>{{ new Date(message.created_at).toLocaleString() }}</td>
                <td>
                  <Link :href="`/admin/messages/${message.id}`" method="delete" as="button"
                    class="btn btn-link text-danger p-0 text-decoration-none">Delete</Link>
                </td>
              </tr>
              <tr v-if="messages.length === 0">
                <td colspan="5" class="py-4 text-center">No messages found.</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </AdminLayout>
</template>

<script setup>
import AdminLayout from '../../layouts/AdminLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
  messages: Array,
});
</script>
