<template>
  <b-card>
        <div slot="header"><i class="fa fa-opencart" /> Rating</div>
        <b-form-group>
            <b-input-group>
                <b-form-input type="text" placeholder="Name" v-validate="'required'" name="name" v-model="name"></b-form-input>
                <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
            </b-input-group>
            <span style="color: red" v-show="errors.has('name')">{{ errors.first('name') }}</span>
        </b-form-group>
    </b-card>
</template>
<script>
import Axios from "axios";
export default {
  //   name: "review",
  data: () => ({
    contact: {}
  }),
  mounted() {},
  methods: {}
};
</script>
