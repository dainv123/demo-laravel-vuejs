<template>
  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button" @click="mobileSidebarToggle">
      <span class="navbar-toggler-icon"></span>
    </button>
    <b-link class="navbar-brand" to="#">
    <img class="logo" alt="rotech" :src="contact.logo">
    </b-link>
    <button class="navbar-toggler sidebar-toggler d-md-down-none mr-auto" type="button" @click="sidebarToggle">
      <span class="navbar-toggler-icon"></span>
    </button>
    <span>{{g_user.firstname + " "+ g_user.lastname }} </span>
    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" @click="asideToggle">
      <i class="icon-user"></i>
    </button>
  </header>
</template>
<script>
import Axios from "axios";
const api_contact = "/api/local/contact";
export default {
  name: "c-header",
  data: () => ({
    contact: {},
    g_user : ''
  }),
  mounted() {
    this.getContact();
    this.getUser();
  },
  methods: {
    getUser(){
      var g_user = JSON.parse(localStorage.getItem('g_user')), 
          obj_g_user = JSON.parse(g_user);
          this.g_user = obj_g_user;
    },
    getContact() {
      Axios.get(api_contact).then(response => {
        this.contact = response.data;
      });
    },
    sidebarToggle(e) {
      e.preventDefault();
      document.body.classList.toggle("sidebar-hidden");
    },
    sidebarMinimize(e) {
      e.preventDefault();
      document.body.classList.toggle("sidebar-minimized");
    },
    mobileSidebarToggle(e) {
      e.preventDefault();
      document.body.classList.toggle("sidebar-mobile-show");
    },
    asideToggle(e) {
      e.preventDefault();
      document.body.classList.toggle("aside-menu-hidden");
    }
  }
};
</script>
