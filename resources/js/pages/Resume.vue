<template>
    <Head title="Resume" />
    <article class="resume active" data-page="resume">
        <header>
            <h2 class="h2 article-title">Resume</h2>
        </header>

        <section class="timeline">
            <div class="title-wrapper">
                <div class="icon-box">
                    <font-awesome-icon icon="fa-solid fa-user-graduate" />
                </div>

                <h3 class="h3">Education</h3>
            </div>

            <ol class="timeline-list">
                <li class="timeline-item" v-for="edu in props.education" :key="edu.id">
                    <h4 class="h4 timeline-item-title">
                        {{ edu.degree }}
                    </h4>

                    <span>{{ edu.years }}</span>

                    <p class="timeline-text">
                        {{ edu.institution }}
                    </p>
                </li>
            </ol>
        </section>

        <section class="timeline">
            <div class="title-wrapper">
                <div class="icon-box">
                    <font-awesome-icon icon="fa-solid fa-book-bookmark" />
                </div>

                <h3 class="h3">Experience</h3>
            </div>

            <ol class="timeline-list">
                <li class="timeline-item" v-for="exp in props.experience" :key="exp.id">
                    <h4 class="h4 timeline-item-title">{{ exp.title }}</h4>
                    <span>{{ exp.years }}</span>
                    <p class="timeline-text">
                        <b>{{ exp.company }}</b> <br />
                        <span v-if="exp.expertise"><b>Area of Expertise:</b> {{ exp.expertise }}<br /></span>
                        <span v-if="exp.description"><b>Duties/Responsibilities:</b> {{ exp.description }}</span>
                    </p>
                </li>
            </ol>
        </section>

        <section class="skill">
            <h3 class="h3 skills-title">My skills</h3>

            <ul class="skills-list content-card">
                <li
                    class="skills-item"
                    v-for="skill in props.skills"
                    :key="skill.id"
                >
                    <div class="title-wrapper">
                        <h5 class="h5">{{ skill.name }}</h5>
                        <data :value="skill.percentage"
                            >{{ skill.percentage }}%</data
                        >
                    </div>

                    <div class="skill-progress-bg">
                        <div
                            class="skill-progress-fill"
                            :style="{ width: skill.percentage + '%' }"
                        ></div>
                    </div>
                </li>
            </ul>
        </section>
    </article>
</template>
<script setup>
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';

const props = defineProps({
    education: Array,
    experience: Array,
    skills: Array
});
</script>
<style></style>
