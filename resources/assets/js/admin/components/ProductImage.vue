<template>
    <div  class="show-list-product-image">
      <b-card>
          <div slot="header"><i class="fa fa-image" /> Product Image
            <label class="label btn btn-primary">
              <span class="title"><i class="fa fa-plus" /> </span>
              <input type="file" v-on:change="onImageChange" name="productimage" />
            </label>
          </div>
          <div class="gallery-product-image">
            <div class="image"  v-for="(image, i) in images"  @click="index = i">
              <img :src="image" />
              <span><i class="fa fa-times"></i></span>
            </div>
            <vue-gallery-slideshow :images="images" :index="index" @close="index = null"></vue-gallery-slideshow>
          </div>
      </b-card>
    </div>
</template>
<script>
import Axios from "axios";
import VueGallerySlideshow from "vue-gallery-slideshow";

export default {
  name: "c-productimage",
  components: {
    VueGallerySlideshow
  },
  data: () => ({
    images: [],
    index: null
  }),
  mounted() {
    this.getListImage();
  },
  methods: {
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
        this.uploadImage(e.target.result);
      };
      reader.readAsDataURL(file);
    },
    getListImage() {
      let pid = this.$route.params.id;
      this.url = "/api/productimage/edit/" + pid;
      Axios.get(this.url)
        .then(response => {
          this.images = response.data.map(function(obj) {
            return "/images/" + obj.image;
          });
        })
        .catch(function(error) {
          console.error(error);
        });
    },
    uploadImage(image) {
      let pid = this.$route.params.id;
      let url_edit = "/api/productimage/create";
      let data_create = {
        id: pid,
        image: image
      };
      Axios.post(url_edit, data_create)
        .then(response => {
          if (response.data.status == true) {
            this.getListImage();
            swal("Edit Success!", "Create success!", "success");
          } else swal("Oops!", "Create Faild!", "error");
        })
        .catch(function(error) {
          swal("Oops!", "Create Faild!", "error");
          e.preventDefault();
          console.error(error);
        });
    }
  }
};
</script>
