<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
            <div slot="header">
              <i class="fa fa-opencart" />
                Edit Permission
            </div>
                <b-form-group>
                <b-input-group>
                    <b-form-input type="text" placeholder="Title" v-validate="'required'" name="title" v-model="title"></b-form-input>
                    <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                </b-input-group>
                <span style="color: red" v-show="errors.has('title')">{{ errors.first('title') }}</span>
                </b-form-group>
                <b-form-group>
                <b-input-group>
                    <b-form-input type="text" placeholder="Name" v-validate="'required'" name="name" v-model="name"></b-form-input>
                    <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                </b-input-group>
                <span style="color: red" v-show="errors.has('name')">{{ errors.first('name') }}</span>
                </b-form-group>
                <div class="form-group form-actions">
                <router-link class="btn btn-danger" :to="{ name: 'List Permission'}">Cancel</router-link>
                <b-button type="submit" variant="primary" @click="edit(id)">Edit</b-button>
                </div>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "permission-edit",
  data() {
    return {
      id: 0,
      title: "",
      name: "",
      url_edit: ""
    };
  },
  mounted() {
    this.get_item();
  },
  methods: {
    get_item() {
      this.id = this.$route.params.id;
      this.url_edit = "/api/permission/edit/" + this.id;
      Axios.get(this.url_edit)
        .then(response => {
          console.log("response", response.data);
          this.title = response.data.title;
          this.name = response.data.name;
        })
        .catch(function(error) {
          console.error(error);
        });
    },
    edit(id) {
      swal({
        title: "Are you sure?",
        text: "Are you edit",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          var data_edit = { id: id, title: this.title, name: this.name };
          var url_edit = "/api/permission/edit/" + id;
          Axios.post(url_edit, data_edit)
            .then(response => {
              if (response.data.status == true) {
                this.$router.push({ name: "List Permission" });
                swal("Edit Success!", "Edit success!", "success");
              } else swal("Oops!", "Edit Faild!", "error");
            })
            .catch(function(error) {
              swal("Oops!", "Edit Faild!", "error");
              e.preventDefault();
              console.error(error);
            });
        }
      });
    }
  }
};
</script>
