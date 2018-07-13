<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
            <div slot="header">
              <i class="fa fa-opencart" />
                Edit Category
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
                        <b-form-input type="number" placeholder="Order" v-validate="'required'" name="order" v-model="order"></b-form-input>
                        <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                    </b-input-group>
                    <span style="color: red" v-show="errors.has('order')">{{ errors.first('order') }}</span>
                </b-form-group>
                <b-form-group>
                    <b-input-group>
                        <b-form-select v-model="selected" v-html="options">
                        </b-form-select>
                        <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                    </b-input-group>
                </b-form-group>
                <div class="form-group form-actions">
                    <b-link class="btn btn-danger" :to="{ name: 'List Category'}">Cancel</b-link>
                    <b-button type="submit" variant="primary" @click="edit(id)">Edit</b-button>
                </div>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "category-edit",
  data() {
    return {
      id: 0,
      name: "",
      order: "",
      selected: 0,
      options: ""
    };
  },
  mounted() {
    this.get_item();
    this.get_list_sort_parent();
  },
  methods: {
    get_item() {
      this.id = this.$route.params.id;
      this.url_edit = "/api/category/edit/" + this.id;
      Axios.get(this.url_edit)
        .then(response => {
          // console.log("response",response.data);
          this.name = response.data.name;
          this.order = response.data.order;
          // this.selected = response.data.parent_id;                // fix parent id, choose id select
        })
        .catch(function(error) {
          console.error(error);
        });
    },
    get_list_sort_parent() {
      this.url_sort_parent_option =
        "/api/category/sort_parent_option/" + this.id;
      Axios.get(this.url_sort_parent_option)
        .then(response => {
          this.options =
            '<option value="0">Please select an option, Default: None.</option>' +
            response.data;
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
          var data_edit = {
            id: id,
            name: this.name,
            order: this.order,
            parent_id: this.selected
          };
          var url_edit = "/api/category/edit/" + id;
          this.$validator.validateAll().then(result => {
            if (result) {
              Axios.post(url_edit, data_edit)
                .then(response => {
                  if (response.data.status == true) {
                    this.$router.push({ name: "List Category" });
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
