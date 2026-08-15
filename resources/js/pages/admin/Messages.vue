<template>
  <AdminLayout>
    <Head title="View Messages" />
    <h1 class="text-3xl font-bold mb-6">Contact Messages</h1>

    <div class="bg-white rounded-lg shadow overflow-hidden">
      <table class="min-w-full">
        <thead class="bg-gray-800 text-white">
          <tr>
            <th class="py-3 px-4 text-left">Name</th>
            <th class="py-3 px-4 text-left">Email</th>
            <th class="py-3 px-4 text-left">Message</th>
            <th class="py-3 px-4 text-left">Date</th>
            <th class="py-3 px-4 text-left">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="message in messages" :key="message.id" class="border-b">
            <td class="py-3 px-4">{{ message.name }}</td>
            <td class="py-3 px-4"><a :href="'mailto:' + message.email" class="text-blue-500">{{ message.email }}</a></td>
            <td class="py-3 px-4 whitespace-pre-wrap">{{ message.message }}</td>
            <td class="py-3 px-4">{{ new Date(message.created_at).toLocaleString() }}</td>
            <td class="py-3 px-4">
              <Link :href="`/admin/messages/${message.id}`" method="delete" as="button" class="text-red-500 hover:text-red-700">Delete</Link>
            </td>
          </tr>
          <tr v-if="messages.length === 0">
             <td colspan="5" class="py-4 text-center text-gray-500">No messages found.</td>
          </tr>
        </tbody>
      </table>
    </div>
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
