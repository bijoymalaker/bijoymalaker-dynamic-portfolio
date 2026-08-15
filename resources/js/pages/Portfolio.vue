<template>
  <Head title="Portfolio" />
  <article class="portfolio active" data-page="portfolio">
    <header>
      <h2 class="h2 article-title">Portfolio</h2>
    </header>

    <section class="projects">
      <ul class="filter-list">
        <li class="filter-item" v-for="(category, index) in Categories" :key="index">
          <button :class="{ active: category === selectedCategory }" @click="selectedCategory = category">
            {{ category }}
          </button>
        </li>
      </ul>

      <div class="filter-select-box" @click="toggleDropdown">
        <button class="filter-select">
          <div class="select-value">{{ selectedCategory }}</div>
          <div class="select-icon">
            <ion-icon :name="dropdownOpen ? 'chevron-up' : 'chevron-down'"></ion-icon>
          </div>
        </button>

        <ul v-if="dropdownOpen" class="dropdown-menu dropdown">
          <li class="dropdown-item" v-for="(category, index) in Categories" :key="index">
            <button @click.stop="selectCategory(category)" class="dropdown-button filter-select"
              style="margin: 3px 20px">
              {{ category }}
            </button>
          </li>
        </ul>
      </div>

      <ul class="project-list">
        <li class="project-item active" v-for="project in filterProject" :key="project.id">
          <a :href="project.link" target="_blank">
            <figure class="project-img">
              <div class="project-item-icon-box">
                <font-awesome-icon icon="fa-regular fa-eye" />
                <ion-icon name="eye-outline"></ion-icon>
              </div>

              <img :src="project.image_path ? `/storage/${project.image_path}` : `/assets/images/${project.image_path}`" :alt="project.title" loading="lazy" />
            </figure>

            <h3 class="project-title">{{ project.title }}</h3>

            <p class="project-category">{{ project.category }}</p>
          </a>
        </li>
      </ul>
    </section>
  </article>
</template>
<script setup>
import { ref, computed, defineProps } from 'vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps({
  projects: Array
});

const selectedCategory = ref('All');
const dropdownOpen = ref(false);

const Projects = computed(() => props.projects || []);

const Categories = computed(() => {
  const cats = Projects.value.map((p) => p.category);
  const unique = [...new Set(cats)];
  return ['All', ...unique];
});

const filterProject = computed(() => {
  if (selectedCategory.value === 'All') {
    return Projects.value;
  } else {
    return Projects.value.filter(
      (project) => project.category === selectedCategory.value,
    );
  }
});

function toggleDropdown() {
  dropdownOpen.value = !dropdownOpen.value;
}

function selectCategory(category) {
  selectedCategory.value = category;
  dropdownOpen.value = false;
}
</script>
<style></style>
