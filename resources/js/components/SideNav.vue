<template>
    <aside class="sidebar" :class="{ active: isActive }" data-sidebar>
      <div class="sidebar-info">
        <figure class="avatar-box">
          <img src="../assets/images/myPic.jpg" alt="Bijoy Malaker" width="80">
        </figure>
  
        <div class="info-content">
          <h1 class="name" title="Bijoy Malaker">Bijoy Malaker</h1>
          <p class="title">Web developer</p>
        </div>
  
        <button class="info_more-btn" @click="toggleInfo">
          <span>Show Contacts</span>
          <font-awesome-icon icon="fa-solid fa-chevron-down" />
        </button>
      </div>
  
      <div class="sidebar-info_more" :class="{ 'show': isActive }">
        <div class="separator"></div>
  
        <ul class="contacts-list">
          <li class="contact-item">
            <div class="icon-box">
              <font-awesome-icon icon="fa-regular fa-envelope" />
            </div>
            <div class="contact-info">
              <p class="contact-title">Email</p>
              <a href="mailto:bijoymalaker7@gmail.com" class="contact-link">bijoymalaker7@gmail.com</a>
            </div>
          </li>
  
          <li class="contact-item">
            <div class="icon-box">
              <font-awesome-icon icon="fa-solid fa-phone" />
            </div>
            <div class="contact-info">
              <p class="contact-title">Phone</p>
              <a href="tel:+8801816615008" class="contact-link">+8801816615008</a>
            </div>
          </li>
  
          <li class="contact-item">
            <div class="icon-box">
              <font-awesome-icon icon="fa-solid fa-cake-candles" />
            </div>
            <div class="contact-info">
              <p class="contact-title">Birthday</p>
              <time datetime="2000-10-06">October 06, 2000</time>
            </div>
          </li>
  
          <li class="contact-item">
            <div class="icon-box">
              <font-awesome-icon icon="fa-solid fa-location-dot" />
            </div>
            <div class="contact-info">
              <p class="contact-title">Location</p>
              <address>Mohammadpur, Dhaka, Bangladesh</address>
            </div>
          </li>
        </ul>
  
        <div class="separator"></div>
  
        <ul class="social-list">
          <li class="social-item">
            <a href="https://www.facebook.com/Bijoy.Malaker.71" class="social-link" target="_blank">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>
  
          <li class="social-item">
            <a href="https://x.com/bijoymalaker" class="social-link" target="_blank">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>
  
          <li class="social-item">
            <a href="https://www.instagram.com/bijoy.malaker.71/" class="social-link" target="_blank">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>
  
          <li class="social-item">
            <a href="https://github.com/bijoymalaker" class="social-link" target="_blank">
              <ion-icon name="logo-github"></ion-icon>
            </a>
          </li>
  
          <li class="social-item">
            <a href="https://linkedin.com/in/bijoy-malaker" class="social-link" target="_blank">
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
  

  