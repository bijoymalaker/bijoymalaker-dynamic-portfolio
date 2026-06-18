<script setup>
    import { ref } from 'vue';
    import projectsData from '../assets/json/Projects.json';
    import icondesign from '../assets/images/icondesign.svg';
    import iconapp from '../assets/images/iconapp.svg';
    import icondev from '../assets/images/icondev.svg';
    import iconphoto from '../assets/images/iconphoto.svg';
    import { Head } from '@inertiajs/vue3';
    const serviceItem = ref([
        {
            id: 1,
            name: 'Web design',
            description:
                'The most modern and high-quality design made at a professional level.',
            img: icondesign,
        },
        {
            id: 2,
            name: 'Web development',
            description:
                'High-quality development of sites at the professional level using PHP, Laravel.',
            img: icondev,
        },
        {
            id: 3,
            name: 'Frontend development',
            description:
                'Professional development of applications for Website using ReactJs, Vue3js.',
            img: iconapp,
        },
        {
            id: 4,
            name: 'Photography',
            description:
                ' I make high-quality photos of any category at a professional level.',
            img: iconphoto,
        },
    ]);

    const projects = ref(projectsData);
</script>

<template>
    <Head title="About" />
    <article class="about active" data-page="about">
        <header>
            <h2 class="h2 article-title">About me</h2>
        </header>

        <section class="about-text">
            <p>
                I am a Computer Engineering graduate and a skilled web
                developer, web designer, and graphic designer based in Dhaka,
                Bangladesh. With a solid academic foundation and a passion for
                frontend and backend technologies, I enjoy turning complex
                problems into simple, beautiful, and intuitive designs.
            </p>

            <p>
                My goal is to build highly functional, user-friendly, and
                visually striking websites. By blending technical expertise with
                creative flair, I ensure every product has a unique personal
                touch, making it eye-catching and easy to navigate. I aim to
                bring across your message and identity in the most impactful and
                creative way possible.
            </p>
        </section>

        <!-- Service part  -->

        <section class="service">
            <h3 class="h3 service-title">What i'm doing</h3>

            <ul class="service-list">
                <li
                    class="service-item"
                    v-for="item in serviceItem"
                    key="item.id"
                >
                    <div class="service-icon-box">
                        <img :src="item.img" :alt="item.name" width="40" />
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
                <li
                    class="testimonials-item"
                    v-for="project in projects"
                    key="project.name"
                >
                    <div
                        class="content-card text-center"
                        data-testimonials-item
                    >
                        <a
                            :href="project.link"
                            class="h4 testimonials-item-title"
                            data-testimonials-title
                            target="_blank"
                            ><b>{{ project.name }}</b></a
                        >

                        <div class="testimonials-text" data-testimonials-text>
                            <p>{{ project.des }}</p>
                        </div>
                    </div>
                </li>
            </ul>
        </section>
    </article>
</template>

<style></style>
