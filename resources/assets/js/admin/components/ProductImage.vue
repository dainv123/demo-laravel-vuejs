<template>
    <div  class="show-list-product-image">
      <b-card>
          <div slot="header"><i class="fa fa-opencart" /> Product Image
            <label class="label btn btn-primary">
              <span class="title">Add</span>
              <input type="file" v-on:change="onImageChange" name="productimage" />
            </label>
            <label class="label btn btn-primary">
              <span class="title">Add</span>
              <input type="file" v-on:change="onImageChange" name="productimage" />
            </label>
          </div>
          <div class="gallery-product-image">
            <div class="image"  v-for="(image, i) in images"  @click="index = i">
              <img :src="image">
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
    images: [
      "https://placekitten.com/801/800",
      "https://placekitten.com/802/800",
      "https://placekitten.com/803/800",
      "https://placekitten.com/804/800",
      "https://placekitten.com/805/800",
      "https://placekitten.com/806/800",
      "https://placekitten.com/807/800",
      "https://placekitten.com/808/800",
      "https://placekitten.com/809/800",
      "https://placekitten.com/810/800"
    ],
    index: null
  }),
  mounted() {},
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
      console.log(name, file);
      reader.onload = e => {
        switch (name) {
          case "image":
            vm.image = e.target.result;
            break;
          case "hoverimage":
            vm.hoverimage = e.target.result;
            break;
          case "productimage":
            vm.productimage = e.target.result;
            break;
          default:
            break;
        }
      };
      reader.readAsDataURL(file);
    }
  }
};
</script>
