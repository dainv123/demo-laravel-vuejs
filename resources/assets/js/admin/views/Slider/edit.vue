<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
                <div slot="header">
                  <i class="fa fa-opencart" /> Edit Slider
                </div>
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
                          <img class="img-edit" :src="'/images/'+image" alt="img">
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
                    <b-button type="submit" variant="primary" @click="edit(id)">Edit</b-button>
                </div>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
import { Review } from "../../components/";

export default {
  name: "slider-edit",
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
    // LocalQuillEditor: VueQuillEditor.quillEditor,
    Review
  },
  mounted() {
    this.get_list_product();
    this.get_item();
  },
  methods: {
    get_item() {
      this.id = this.$route.params.id;
      this.url_edit = "/api/slider/edit/" + this.id;
      Axios.get(this.url_edit)
        .then(response => {
          console.log(response);
          this.name = response.data.name;
          this.intro = response.data.intro;
          this.keywords = response.data.keywords;
          this.description = response.data.description;
          this.image = response.data.image;
          this.content = response.data.email;
          this.product.selected = response.data.product_id;
          this.content = response.data.content;
        })
        .catch(function(error) {
          console.error(error);
        });
    },
    get_list_product() {
      this.url = "/api/product/";
      Axios.get(this.url)
        .then(response => {
          this.product.options =
            '<option value="" disabled selected>Product</option>';
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
            keywords: this.keywords,
            description: this.description,
            image: this.image,
            intro: this.intro,
            content: this.content,
            product_id: this.product.selected,
            user_id: 2
          };
          var url_edit = "/api/slider/edit/" + id;
          this.$validator.validateAll().then(result => {
            if (result) {
              Axios.post(url_edit, data_edit)
                .then(response => {
                  if (response.data.status == true) {
                    this.$router.push({ name: "List Slider" });
                    swal("Edit Success!", "Edit success!", "success");
                  } else swal("Oops!", "Edit Faild!", "error");
                })
                .catch(function(error) {
                  swal("Oops!", "Edit Faild!", "error");
                  e.preventDefault();
                  console.error(error);
                });
            } else swal("Oops!", "Edit Faild!", "error");
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
    },
    onEditorBlur(quill) {
      console.log("editor blur!", quill);
    },
    onEditorFocus(quill) {
      console.log("editor focus!", quill);
    },
    onEditorReady(quill) {
      console.log("editor ready!", quill);
    }
  },
};
</script>
