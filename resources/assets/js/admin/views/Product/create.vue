<template>
    <div class="show-items">
        <b-col sm="12">
            <b-card>
                <div slot="header"><i class="fa fa-opencart" /> Create Product</div>
                <b-form-group>
                    <b-input-group>
                        <b-form-input type="text" placeholder="Name" v-validate="'required'" name="name" v-model="name"></b-form-input>
                        <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                    </b-input-group>
                    <span style="color: red" v-show="errors.has('name')">{{ errors.first('name') }}</span>
                </b-form-group>
                <div class="row">
                    <b-form-group class="col-sm-4">
                        <b-input-group>
                          <b-form-select v-model="avaibility.selected" :options="avaibility.options">
                          </b-form-select>
                          <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                    <b-form-group class="col-sm-4">
                        <b-input-group>
                          <b-form-select v-model="size.selected" v-html="size.options">
                          </b-form-select>
                          <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                    <b-form-group class="col-sm-4">
                        <b-input-group>
                          <b-form-select v-model="category.selected" v-html="category.options">
                          </b-form-select>
                          <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                    </b-form-group>
                </div>
                <div class="row">
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                            <b-form-file v-model="image" name="image" v-on:change="onImageChange" v-validate="'required'" accept=".jpg, .png, .gif" placeholder="Image"></b-form-file>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('image')">{{ errors.first('image') }}</span>
                    </b-form-group>
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                            <b-form-file v-model="hoverimage" name="hoverimage" v-on:change="onImageChange" v-validate="'required'" accept=".jpg, .png, .gif" placeholder="Hover Image"></b-form-file>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('hoverimage')">{{ errors.first('hoverimage') }}</span>
                    </b-form-group>
                </div>
                <div class="row">
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                            <b-form-input type="number"  placeholder="Price" v-validate="'required'" name="price" v-model="price"></b-form-input>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('price')">{{ errors.first('price') }}</span>
                    </b-form-group>
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                            <b-form-input type="number" placeholder="Old Price" v-validate="''" name="oldprice" v-model="oldprice"></b-form-input>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('oldprice')">{{ errors.first('oldprice') }}</span>
                    </b-form-group>
                </div>
                <div class="row">
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                            <b-form-input type="text"  placeholder="Description" v-validate="'required'" name="description" v-model="description"></b-form-input>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('description')">{{ errors.first('description') }}</span>
                    </b-form-group>
                    <b-form-group class="col-sm-6">
                        <b-input-group>
                            <b-form-input type="text" placeholder="Keyword" v-validate="'required'" name="keywords" v-model="keywords"></b-form-input>
                            <b-input-group-append><b-input-group-text><i class="fa fa-info"></i></b-input-group-text></b-input-group-append>
                        </b-input-group>
                        <span style="color: red" v-show="errors.has('keywords')">{{ errors.first('keywords') }}</span>
                    </b-form-group>
                </div>
                <div class="row">
                    <b-form-group class="col-sm-12">
                        <b-form-textarea v-model="intro" placeholder="Intro" :rows="3" :max-rows="6">
                        </b-form-textarea>
                        <span style="color: red" v-show="errors.has('intro')">{{ errors.first('intro') }}</span>
                    </b-form-group>
                </div>
                <div class="row">
                    <b-form-group class="col-sm-12">
                        <quill-editor v-model="content"
                          ref="quillEditorA"
                          :options="editorOption"
                          @blur="onEditorBlur($event)"
                          @focus="onEditorFocus($event)"
                          @ready="onEditorReady($event)">
                        </quill-editor>
                    </b-form-group>
                </div>
                <div class="form-group form-actions">
                    <b-link class="btn btn-danger" :to="{ name: 'List Product'}">Cancel</b-link>
                    <b-button type="submit" variant="primary" @click="create">Create</b-button>
                </div>
            </b-card>
        </b-col>
    </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "product-create",
  data() {
    return {
      name: "",
      price: "",
      oldprice: "",
      intro: "",
      keywords: "",
      description: "",
      image: "",
      hoverimage: "",
      content: "<h2>...</h2>",
      editorOption: { theme: "snow" },
      size: { selected: "", options: "" },
      category: { selected: "", options: "" },
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
    LocalQuillEditor: VueQuillEditor.quillEditor
  },
  mounted() {
    this.get_list_productsize();
    this.get_list_category();
  },
  methods: {
    get_list_productsize() {
      this.url = "/api/productsize/";
      Axios.get(this.url)
        .then(response => {
          this.size.options =
            '<option value="" disabled selected>Size</option>';
          response.data.data.forEach(element => {
            this.size.options =
              this.size.options +
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
    get_list_category() {
      this.url = "/api/category/";
      Axios.get(this.url)
        .then(response => {
          this.category.options =
            '<option value="" disabled selected>Categoty</option>';
          response.data.data.forEach(element => {
            this.category.options =
              this.category.options +
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
            price: this.price,
            oldprice: this.oldprice,
            keywords: this.keywords,
            description: this.description,
            image: this.image,
            hoverimage: this.hoverimage,
            intro: this.intro,
            content: this.content,
            size_id: this.size.selected,
            categorie_id: this.category.selected,
            avaibility: this.avaibility.selected,
            user_id: 1
          };
          var url_create = "/api/product/create";
          this.$validator.validateAll().then(result => {
            if (result) {
              Axios.post(url_create, data_create)
                .then(response => {
                  if (response.data.status == true) {
                    this.$router.push({ name: "List Product" });
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
  computed: {
    editorA() {
      return this.$refs.quillEditorA.quill;
    }
  }
};
</script>
