<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
            <div slot="header">
                Create Product Size
            </div>
                <b-form-group>
                    <b-input-group>
                        <b-form-input type="text" placeholder="Name" v-validate="'required'" name="name" v-model="name"></b-form-input>
                        <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                    </b-input-group>
                    <span style="color: red" v-show="errors.has('name')">{{ errors.first('name') }}</span>
                </b-form-group>
                <b-form-group>
                    <b-input-group>
                        <b-form-input type="text" placeholder="Dimension" v-validate="'required'" name="dimension" v-model="dimension"></b-form-input>
                        <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                    </b-input-group>
                    <span style="color: red" v-show="errors.has('dimension')">{{ errors.first('dimension') }}</span>
                </b-form-group>
                <div class="form-group form-actions">
                    <b-link class="btn btn-danger" :to="{ name: 'Create Size'}">Cancel</b-link>
                    <b-button type="submit" variant="primary" @click="create">Create</b-button>
                </div>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "product-size-create",
  data() {
    return {
      name: "",
      dimension: ""
    };
  },
  mounted() {
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
          var data_create = { name: this.name, dimension: this.dimension };
          var url_create = "api/productsize/create";
          this.$validator.validateAll().then(result => {
            if (result) {
              Axios.post(url_create, data_create)
                .then(response => {
                  if (response.data.status == true) {
                    this.$router.push("list");
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
