<template>
    <nav class="navbar justify-content-around" data-navbar>
        <ul class="navbar-list">
            <li class="navbar-item">
                <Link href="/" class="navbar-link">About</Link>
            </li>

            <li class="navbar-item">
                <Link href="/resume" class="navbar-link">Resume</Link>
            </li>

            <li class="navbar-item">
                <Link href="/portfolio" class="navbar-link">Portfolio</Link>
            </li>

            <li class="navbar-item">
                <Link href="/contact" class="navbar-link">Contact</Link>
            </li>
        </ul>
    </nav>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
</style>