<template>
  <footer class="app-footer">
    <span><a :href="contact.link">{{contact.name}}</a> &copy; {{year}} creativeLabs.</span>
    <span class="ml-auto">Powered by <a :href="contact.link">{{contact.name}}</a></span>
  </footer>
</template>
<script>
import Axios from "axios";
const api_contact = "/api/local/contact";
export default {
  name: "c-footer",
  data: () => ({
    contact: {},
    year: 2014
  }),
  mounted() {
    this.getContact(), this.getYear();
  },
  methods: {
    getContact() {
      Axios.get(api_contact).then(response => {
        this.contact = response.data;
      });
    },
    getYear() {
      var date = new Date();
      this.year = date.getFullYear();
    }
  }
};
</script>
