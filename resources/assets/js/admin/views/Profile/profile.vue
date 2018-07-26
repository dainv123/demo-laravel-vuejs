
<template>
  <div class="show-list-item">
    <b-col sm="12">
      <b-card>
        <div slot="header">
          <i class="fa fa-opencart" />
          List Product Size
          <b-link class="float-right btn btn-primary" :to="'create'">Create</b-link>
        </div>
        <Profile />
      </b-card>
    </b-col>
  </div>
</template>

<script>
import Axios from "axios";
import { Profile } from "../../components/";

export default {
  props: [],
  name: "profile",
  components: {
      Profile
  },
  data() {
    return {};
  },
  mounted() {
    
  },
  methods: {

  }
};
</script>


