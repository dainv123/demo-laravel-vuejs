<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
                <div slot="header"><i class="fa fa-opencart" /> Create Slider</div>
                <b-form-group>
                    <b-input-group>
                        <b-form-input type="text" placeholder="Name" v-validate="'required'" name="name" v-model="name"></b-form-input>
                        <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                    </b-input-group>
                    <span style="color: red" v-show="errors.has('name')">{{ errors.first('name') }}</span>
                </b-form-group>
                <div class="row">
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                            <b-form-file v-model="image" name="image" v-on:change="onImageChange" v-validate="'required'" accept=".jpg, .png, .gif" placeholder="Image"></b-form-file>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('image')">{{ errors.first('image') }}</span>
                    </b-form-group>
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                          <b-form-select v-model="product.selected" v-html="product.options">
                          </b-form-select>
                          <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </div>
                <div class="row">
                    <b-form-group class="col-sm-12">
                        <b-input-group>
                            <b-form-input type="text"  placeholder="Description" v-validate="'required'" name="description" v-model="description"></b-form-input>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('description')">{{ errors.first('description') }}</span>
                    </b-form-group>
                </div>
                <div class="row">
                    <b-form-group class="col-sm-12">
                        <b-form-textarea v-model="intro" placeholder="Intro" :rows="3" :max-rows="6">
                        </b-form-textarea>
                        <span style="color: red" v-show="errors.has('intro')">{{ errors.first('intro') }}</span>
                    </b-form-group>
                </div>
                <div class="form-group form-actions">
                    <b-link class="btn btn-danger" :to="{ name: 'List Slider'}">Cancel</b-link>
                    <b-button type="submit" variant="primary" @click="create">Create</b-button>
                </div>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "slider-create",
  data() {
    return {
      name: "",
      intro: "",
      keywords: "",
      description: "",
      image: "",
      content: "<h2>...</h2>",
      editorOption: { theme: "snow" },
      product: { selected: "", options: "" },
      avaibility: {
        selected: "",
        options: [
          { text: "Avaibility", value: "", disabled: true },
          { text: "Not available", value: "notavailable" },
          { text: "In stock", value: "instock" }
        ]
      }
    };
  },
  components: {
    // LocalQuillEditor: VueQuillEditor.quillEditor
  },
  mounted() {
    this.get_list_product();
  },
  methods: {
    get_list_product() {
      this.url = "/api/product/";
      Axios.get(this.url)
        .then(response => {
          this.product.options =
            '<option value="" disabled selected>Products</option>';
          response.data.data.forEach(element => {
            this.product.options =
              this.product.options +
              '<option value="' +
              element.id +
              '">' +
              element.name +
              "</option>";
          });
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
          var data_create = {
            name: this.name,
            keywords: this.keywords,
            description: this.description,
            image: this.image,
            intro: this.intro,
            content: this.content,
            product_id: this.product.selected,
          };
          var url_create = "/api/slider/create";
          this.$validator.validateAll().then(result => {
            if (result) {
              Axios.post(url_create, data_create)
                .then(response => {
                  if (response.data.status == true) {
                    this.$router.push({ name: "List Slider" });
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
    },
    onImageChange(e) {
      let name = e.target.name;
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(name, files[0]);
    },
    createImage(name, file) {
      let reader = new FileReader();
      let vm = this;
      reader.onload = e => {
        switch (name) {
          case "image":
            vm.image = e.target.result;
            break;
          case "hoverimage":
            vm.hoverimage = e.target.result;
            break;
          default:
            break;
        }
      };
      reader.readAsDataURL(file);
    }
  },
  
};
</script>
