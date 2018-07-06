<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
            <div slot="header">
                Create Category
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
                          <b-form-select v-model="parent.selected">
                          <option :value="null">Please select an option</option>
                          <option value="a">Option A</option>
                          <option value="b" disabled>Option B (disabled)</option>
                          <optgroup label="Grouped Options">
                            <option :value="{'C':'3PO'}">Option with object value</option>
                            <option :value="{'R':'2D2'}">Another option with object value</option>
                          </optgroup>
                        </b-form-select>
                    </b-input-group>
                </b-form-group>
                <div class="form-group form-actions">
                    <b-link class="btn btn-danger" :to="{ name: 'Create Category'}">Cancel</b-link>
                    <b-button type="submit" variant="primary" @click="create">Create</b-button>
                </div>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "category-create",
  data() {
    return {
      name: "",
      order: "",
      parent: {
        selected: 0,
        options: [
        ]
      }
    };
  },
  mounted() {
    this.get_list();
  },
  methods: {
    get_list() {
        this.url = "api/category/create";
        Axios.get(this.url)
          .then(response => {
            response.data.data.unshift({ value: 0, text: 'Please select an option, Default: None.' });
            this.parent.options = response.data.data;
          })
          .catch(function(error) {
            console.error(error);
        });
    },
    create() {
      swal({
        title: "Are you sure?",
        text: "Are you create",
        icon: "warning",
        buttons: true,
        dangerMode: true
      }).then(willDelete => {
        if (willDelete) {
          var data_create = { name: this.name, order: this.order };
          var url_create = "api/category/create";
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
