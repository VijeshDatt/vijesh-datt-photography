<template>
  <div>
    <v-container fluid>
      <v-card flat color="transparent">
        <h1 :style="fontSize" class="text-center mb-4"> {{ name }} </h1>
        <v-divider class="mx-16"></v-divider>
        <masonry :cols="{default: 6, 960: 1, 1264: 3}" :gutter="8" v-if="images.length > 0" :key="key" ref="masonry">
          <div v-for="(image, index) in images" :key="index">
            <v-hover v-slot="{ hover }">
              <!-- :lazy-src="image" transition="slide-y-transition" -->
              <v-img contain :lazy-src="`/assets/images/gallery/${folder}/${image.name}`" :src="`/assets/images/gallery/${folder}/${image.name}`" class="my-2 text-center rounded-xl animate__animated animate__zoomIn animate__faster elevation-8">
                <transition name="scale-transition">
                  <div v-if="hover && $vuetify.breakpoint.mdAndUp" class="d-flex transition-fast-in-fast-out grey darken-2 v-card--reveal" style="height: 100%; cursor: pointer;" @click="openImage(image.name)">
                    <v-icon class="mdi-48px" dark>mdi-arrow-expand</v-icon>
                  </div>
                </transition>
              </v-img>
            </v-hover>
          </div>
        </masonry>

        <!-- <div class="text-center mt-5" v-if="current < max">
          <v-btn text @click="getImages()" class="rounded-lg" color="primary"> Load More </v-btn>
        </div> -->
      </v-card>
    </v-container>

    <v-dialog v-model="dialog" overlay-opacity="0.8">
      <v-img :src="`/assets/images/gallery/${folder}/${image}`" contain max-height="90vh" @click="close"></v-img>
    </v-dialog>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      folder: null,
      name: null,
      images: [],
      dialog: false,
      image: null,
      current: 0,
      max: 0,
      key: 0,
    };
  },

  computed: {
    calculateWidth() {
      let breakpoint = this.$vuetify.breakpoint;

      if (breakpoint.lgAndUp) return '20vw';
      else if (breakpoint.mdOnly) return '35vw';
      else if (breakpoint.smAndDown) return '90vw';
    },

    fontSize() {
      return this.$vuetify.breakpoint.smAndDown ? 'font-weight: 400 !important; font-size: 2rem;' : 'font-weight: 300 !important; font-size: 4rem;';
    }
  },

  methods: {
    close() {
      this.dialog = false;
      // this.image = null;
    },

    getImages() {
      this.current += 50;
      axios
        .post('/api/folder', { folder: this.folder, current: this.current })
        .then(res => {
          this.max = res.data.max;
          this.images = res.data.files;
        })
        .catch(e => console.log(e));
    },

    openImage(image) {
      this.image = image;
      this.dialog = true;
    },

    redo() {
      this.$nextTick(() => this.$refs.masonry.reCalculate());
    }
  },

  mounted() { },

  created() {
    // console.log(this.$route.params.folder, this.$route.params.name);
    this.folder = this.$route.params.folder;
    // this.name = this.$route.params.name;
    this.name = _.startCase(_.split(this.folder, '-').join(' '));
    document.title = `${this.name} | Vijesh Datt Photography`;

    this.getImages(`/assets/images/gallery/${this.folder}/`);
  },
}
</script>

<style>
.v-card--reveal {
  align-items: center;
  top: 0;
  justify-content: center;
  opacity: 0.5;
  position: absolute;
  width: 100%;
  border-radius: 24px;
}

.v-dialog {
  box-shadow: none !important;
}
</style>
