<template>
  <div class="admin-wrapper">
    <!-- Sidebar -->
    <aside class="admin-sidebar">
      <div class="admin-logo">
        <h2>Admin Panel</h2>
      </div>
      <nav class="admin-nav">
        <Link href="/admin" class="admin-link" :class="{'active': $page.url === '/admin'}">Dashboard</Link>
        <Link href="/admin/profile" class="admin-link" :class="{'active': $page.url.startsWith('/admin/profile')}">Profile</Link>
        <Link href="/admin/services" class="admin-link" :class="{'active': $page.url.startsWith('/admin/services')}">Services</Link>
        <Link href="/admin/projects" class="admin-link" :class="{'active': $page.url.startsWith('/admin/projects')}">Projects</Link>
        <Link href="/admin/education" class="admin-link" :class="{'active': $page.url.startsWith('/admin/education')}">Education</Link>
        <Link href="/admin/experience" class="admin-link" :class="{'active': $page.url.startsWith('/admin/experience')}">Experience</Link>
        <Link href="/admin/skills" class="admin-link" :class="{'active': $page.url.startsWith('/admin/skills')}">Skills</Link>
        <Link href="/admin/messages" class="admin-link" :class="{'active': $page.url.startsWith('/admin/messages')}">Messages</Link>
      </nav>
      <div class="admin-footer">
         <Link href="/" class="admin-back-btn">Back to Site</Link>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <div v-if="$page.props.flash?.success" class="admin-alert success">
            {{ $page.props.flash.success }}
        </div>
        <div v-if="$page.props.flash?.error" class="admin-alert error">
            {{ $page.props.flash.error }}
        </div>
      <slot />
    </main>
  </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
