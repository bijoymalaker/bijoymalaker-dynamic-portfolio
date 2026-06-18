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
                <li class="timeline-item">
                    <h4 class="h4 timeline-item-title">
                        B.Sc in Computer Science and Engineering
                    </h4>

                    <span>2019 — 2023</span>

                    <p class="timeline-text">
                        Dhaka City College, Dhaka (Under National University)
                    </p>
                </li>

                <li class="timeline-item">
                    <h4 class="h4 timeline-item-title">
                        Higher Secondary School Certificate (HSC)
                    </h4>

                    <span>2016-2019</span>

                    <p class="timeline-text">Notra Dame College, Mymensingh</p>
                </li>

                <li class="timeline-item">
                    <h4 class="h4 timeline-item-title">
                        Secondary School Certificate (SSC)
                    </h4>

                    <span>2011 — 2016</span>

                    <p class="timeline-text">
                        Bindubasini Govt. Boys' High School, Tangail
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
                <li class="timeline-item">
                    <h4 class="h4 timeline-item-title">Junior Web Developer</h4>
                    <span>April 2025 - Continuous</span>
                    <p class="timeline-text">
                        <b>SM Technology</b> <br />
                        <b>Area of Expertise:</b>
                        HTML5 & CSS3, Shopify Theme Development, Liquid<br />

                        <b>Duties/Responsibilities:</b>
                        Designed and maintained Shopify stores using custom
                        Liquid templates and theme modifications.
                    </p>
                </li>
                <li class="timeline-item">
                    <h4 class="h4 timeline-item-title">
                        Junior Front-end Developer
                    </h4>
                    <span>2024</span>
                    <p class="timeline-text">
                        <b>DevsStation</b> <br />
                        <b>Area of Expertise:</b>
                        HTML5 & CSS3 (0.2 yr), Vue JS (0.2 yr) <br />

                        <b>Duties/Responsibilities:</b>
                        I was working here as a remote part-time junior
                        front-end developer.
                    </p>
                </li>

                <li class="timeline-item">
                    <h4 class="h4 timeline-item-title">Graphics Designer</h4>

                    <span>2021-2022</span>

                    <p class="timeline-text">
                        <b>Fiverr</b> <br />
                        <b>Area of Expertise:</b>
                        Adobe Photoshop, Adobe Illustrator, Canva<br />
                    </p>
                </li>
            </ol>
        </section>

        <section class="skill">
            <h3 class="h3 skills-title">My skills</h3>

            <ul class="skills-list content-card">
                <li
                    class="skills-item"
                    v-for="(skillSet, index) in skills"
                    :key="index"
                >
                    <div class="title-wrapper">
                        <h5 class="h5">{{ skillSet.name }}</h5>
                        <data :value="skillSet.value"
                            >{{ skillSet.value }}%</data
                        >
                    </div>

                    <div class="skill-progress-bg">
                        <div
                            class="skill-progress-fill"
                            :style="{ width: skillSet.value + '%' }"
                        ></div>
                    </div>
                </li>
            </ul>
        </section>
    </article>
</template>
<script setup>
import { ref } from 'vue';
import skillsData from '../assets/json/Skills.json';

const skills = ref(skillsData);
</script>
<style></style>
