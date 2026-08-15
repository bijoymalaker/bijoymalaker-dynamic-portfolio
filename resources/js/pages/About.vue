<script setup>
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
    profile: Object,
    services: Array,
    projects: Array
});
</script>

<template>

    <Head title="About" />
    <article class="about active" data-page="about">
        <header>
            <h2 class="h2 article-title">About me</h2>
        </header>

        <section class="about-text">
            <p>{{ props.profile?.bio1 }}</p>
            <p>{{ props.profile?.bio2 }}</p>
        </section>

        <!-- Service part  -->

        <section class="service">
            <h3 class="h3 service-title">What i'm doing</h3>

            <ul class="service-list">
                <li class="service-item" v-for="item in props.services" :key="item.id">
                    <div class="service-icon-box">
                        <img :src="item.icon_path ? `/storage/${item.icon_path}` : `/assets/images/${item.icon_path}`" :alt="item.name" width="40" />
                    </div>

                    <div class="service-content-box">
                        <h4 class="h4 service-item-title">
                            {{ item.name }}
                        </h4>

                        <p class="service-item-text">
                            {{ item.description }}
                        </p>
                    </div>
                </li>
            </ul>
        </section>

        <!--- Projects-->

        <section class="testimonials">
            <h3 class="h3 testimonials-title">Projects</h3>

            <ul class="testimonials-list has-scrollbar">
                <li class="testimonials-item" v-for="project in props.projects" :key="project.id">
                    <div class="content-card text-center" data-testimonials-item>
                        <a :href="project.link" class="h4 testimonials-item-title" data-testimonials-title
                            target="_blank"><b>{{ project.title }}</b></a>

                        <div class="testimonials-text" data-testimonials-text>
                            <p>{{ project.description }}</p>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
    </article>
</template>

<style></style>
