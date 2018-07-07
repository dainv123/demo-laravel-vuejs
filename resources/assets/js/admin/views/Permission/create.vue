<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
            <div slot="header">
                Create Permission
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
                    <b-link class="btn btn-danger" :to="{ name: 'List Permission'}">Cancel</b-link>
                    <b-button type="submit" variant="primary" @click="create">Create</b-button>
                </div>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "permission-create",
  data() {
    return {
      title: "",
      name:""
    };
  },
  methods: {
    create() {
      swal({
        title: "Are you sure?",
        text: "Are you create",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          var data_create = { title: this.title, name: this.name };
          var url_create = "api/permission/create";
          this.$validator.validateAll().then(result => {
            if (result) {
              Axios.post(url_create, data_create)
                .then(response => {
                  if (response.data.status == true) {
                    this.$router.push({ name: 'List Permission'});
                    swal("Create Success!", "Create success!", "success");
                  } else swal("Oops!", "Create Faild!", "error");
                })
                .catch(function(error) {
                  swal("Oops!", "Create Faild!", "error");
                  e.preventDefault();
                  console.error(error);
                });
            } else swal("Oops!", "Create Faild!", "error");
          });
        }
      });
    }
  }
};
</script>
