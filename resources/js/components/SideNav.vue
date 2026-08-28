<template>
  <aside class="sidebar" :class="{ active: isActive }" data-sidebar>
    <div class="sidebar-info">
      <figure class="avatar-box">
        <img v-if="$page.props.globalProfile?.avatar_path"
          :src="$page.props.globalProfile.avatar_path.startsWith('http') ? $page.props.globalProfile.avatar_path : `/storage/${$page.props.globalProfile.avatar_path}`"
          :alt="$page.props.globalProfile?.name" width="80">
        <img v-else src="../assets/images/myPic.jpg" alt="Bijoy Malaker" width="80">
      </figure>

      <div class="info-content">
        <h1 class="name" :title="$page.props.globalProfile?.name || 'Name'">{{ $page.props.globalProfile?.name || 'Name'
          }}</h1>
        <p class="title">{{ $page.props.globalProfile?.title || 'Title' }}</p>
      </div>

      <button class="info_more-btn" @click="toggleInfo">
        <span>Show Contacts</span>
        <font-awesome-icon icon="fa-solid fa-chevron-down" />
      </button>
    </div>

    <div class="sidebar-info_more" :class="{ 'show': isActive }">
      <div class="separator"></div>

      <ul class="contacts-list">
        <li class="contact-item" v-if="$page.props.globalProfile?.email">
          <div class="icon-box">
            <font-awesome-icon icon="fa-regular fa-envelope" />
          </div>
          <div class="contact-info">
            <p class="contact-title">Email</p>
            <a :href="`mailto:${$page.props.globalProfile.email}`" class="contact-link">{{
              $page.props.globalProfile.email }}</a>
          </div>
        </li>

        <li class="contact-item" v-if="$page.props.globalProfile?.phone">
          <div class="icon-box">
            <font-awesome-icon icon="fa-solid fa-phone" />
          </div>
          <div class="contact-info">
            <p class="contact-title">Phone</p>
            <a :href="`tel:${$page.props.globalProfile.phone}`" class="contact-link">{{ $page.props.globalProfile.phone
              }}</a>
          </div>
        </li>

        <li class="contact-item" v-if="$page.props.globalProfile?.birthday">
          <div class="icon-box">
            <font-awesome-icon icon="fa-solid fa-cake-candles" />
          </div>
          <div class="contact-info">
            <p class="contact-title">Birthday</p>
            <time :datetime="$page.props.globalProfile.birthday">{{ $page.props.globalProfile.birthday }}</time>
          </div>
        </li>

        <li class="contact-item" v-if="$page.props.globalProfile?.location">
          <div class="icon-box">
            <font-awesome-icon icon="fa-solid fa-location-dot" />
          </div>
          <div class="contact-info">
            <p class="contact-title">Location</p>
            <address>{{ $page.props.globalProfile.location }}</address>
          </div>
        </li>
      </ul>

      <div class="separator"></div>

      <ul class="social-list">
        <li class="social-item" v-if="$page.props.globalProfile?.facebook">
          <a :href="$page.props.globalProfile.facebook" class="social-link" target="_blank">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>

        <li class="social-item" v-if="$page.props.globalProfile?.twitter">
          <a :href="$page.props.globalProfile.twitter" class="social-link" target="_blank">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>

        <li class="social-item" v-if="$page.props.globalProfile?.instagram">
          <a :href="$page.props.globalProfile.instagram" class="social-link" target="_blank">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
        </li>

        <li class="social-item" v-if="$page.props.globalProfile?.github">
          <a :href="$page.props.globalProfile.github" class="social-link" target="_blank">
            <ion-icon name="logo-github"></ion-icon>
          </a>
        </li>

        <li class="social-item" v-if="$page.props.globalProfile?.linkedin">
          <a :href="$page.props.globalProfile.linkedin" class="social-link" target="_blank">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
        </li>
      </ul>
    </div>
  </aside>
</template>

<script>
import { ref } from 'vue';

export default {
  setup() {
    const isActive = ref(false);

    const toggleInfo = () => {
      isActive.value = !isActive.value;
    };

    return {
      isActive,
      toggleInfo
    };
  }
};
</script>