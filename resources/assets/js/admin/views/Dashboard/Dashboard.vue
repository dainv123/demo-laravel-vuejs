<template>
  
</template>

<script>
// import GroupedTable from './grouped-table';

export default {
  props: ["g_token"],
  components: {},
  name: "dashboard",
  data() {
    return {};
  },
  methods: {},
  mounted() {
    console.log(this.$appName);
    axios.get("/oauth/personal-access-tokens").then(response => {
      console.log(response.data);
    });
  }
};
</script>


