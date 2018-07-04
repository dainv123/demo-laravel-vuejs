<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
            <div slot="header">
                Edit Role
            </div>
            <b-form>
                <b-form-group>
                <b-input-group>
                    <b-form-input type="text" placeholder="Title" v-model="name"></b-form-input>
                    <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                </b-input-group>
                </b-form-group>
                <div class="form-group form-actions">
                <router-link class="btn btn-danger" :to="'../list'">Cancel</router-link>
                <b-button type="submit" variant="primary" @click="save()">Edit</b-button>
                </div>
            </b-form>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "role-edit",
  data() {
    return {
      id: 0,
      name: "",
      url_edit: "",
      url_delete: ""
    };
  },
  mounted() {
    this.id = this.$route.params.id;
    this.url_edit = "api/role/edit/" + this.id;
    Axios.get(this.url_edit)
      .then(response => {
        console.log("response", response.data);
        this.name = response.data.title;
      })
      .catch(function(error) {
        console.error(error);
      });
  },
  methods: {
    save() {
      swal({
        title: "Are you sure?",
        text: "Are you edit",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          Axios.get("api/role")
            .then(response => {
              this.rows = response.data.data;
            })
            .catch(function(error) {
              console.error(error);
            });
        }
      });
    }
  }
};
</script>
