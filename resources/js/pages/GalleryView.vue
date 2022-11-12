<template>
  <div>
    <v-container fluid>
      <v-card flat color="transparent">
        <v-row dense align="center">
          <v-col cols="12" md="6">
            <v-btn text :block="$vuetify.breakpoint.smAndDown" color="primary" class="rounded-lg" @click="$router.push({ name: 'Gallery' })">
              <v-icon left v-if="$vuetify.breakpoint.mdAndUp">fa-arrow-left</v-icon> Back to Gallery
            </v-btn>
          </v-col>
          <v-col cols="12" md="6">
            <h1 :style="fontSize" class="text-md-end text-center mb-4"> {{ name }} </h1>
          </v-col>
        </v-row>
        <v-divider class="mx-16"></v-divider>
        <masonry :cols="{ default: 4, 960: 1, 1264: 3 }" :gutter="24" v-if="images.length > 0" :key="key" ref="masonry">
          <div v-for="(image, index) in images" :key="index">
            <v-hover v-slot="{ hover }">
              <v-img contain :lazy-src="`/assets/images/gallery/${folder}/${image.name}`" :src="`/assets/images/gallery/${folder}/${image.name}`" class="my-6 text-center rounded-xl  elevation-8">
                <transition name="scale-transition">
                  <div v-if="hover && $vuetify.breakpoint.mdAndUp" class="d-flex transition-fast-in-fast-out grey darken-2 v-card--reveal" style="height: 100%; cursor: pointer;" @click="openImage(image.name)">
                    <v-icon size="32" dark>fa-up-right-and-down-left-from-center</v-icon>
                  </div>
                </transition>
              </v-img>
            </v-hover>
          </div>
        </masonry>

        <div class="text-center my-10" v-if="current < max">
          <v-btn text @click="getImages()" class="rounded-lg" color="primary">
            Load More
            <v-icon right>fa-plus</v-icon>
          </v-btn>
        </div>
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
};
</script>

<style>
.v-card--reveal {
  align-items: center;
  top: 0;
  justify-content: center;
  opacity: 0.75;
  position: absolute;
  width: 100%;
  border-radius: 24px;
}

.v-dialog {
  box-shadow: none !important;
}
</style>
