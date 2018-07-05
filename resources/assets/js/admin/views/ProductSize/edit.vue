<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
            <div slot="header">
                Edit Product Size
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
                <router-link class="btn btn-danger" :to="'../list'">Cancel</router-link>
                <b-button type="submit" variant="primary" @click="edit(id)">Edit</b-button>
                </div>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "product-size-edit",
  data() {
    return {
      id: 0,
      name: "",
      dimension: "",
      url_edit: ""
    };
  },
  mounted() {
    this.id = this.$route.params.id;
    this.url_edit = "api/productsize/edit/" + this.id;
    Axios.get(this.url_edit)
      .then(response => {
        console.log("response", response.data);
        this.name = response.data.name;
        this.dimension = response.data.dimension;
      })
      .catch(function(error) {
        console.error(error);
      });
  },
  methods: {
    edit(id) {
      swal({
        title: "Are you sure?",
        text: "Are you edit",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          var data_edit = {
            id: id,
            name: this.name,
            dimension: this.dimension
          };
          var url_edit = "api/productsize/edit/" + id;
          this.$validator.validateAll().then(result => {
            if (result) {
              Axios.post(url_edit, data_edit)
                .then(response => {
                  if (response.data.status == true) {
                    this.$router.push("../list");
                    swal("Edit Success!", "Edit success!", "success");
                  } else swal("Oops!", "Edit Faild!", "error");
                })
                .catch(function(error) {
                  swal("Oops!", "Edit Faild!", "error");
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
