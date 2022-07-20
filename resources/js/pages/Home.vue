<template>
  <div>
    <v-container fluid class="d-flex justify-center">
      <v-card flat color="transparent">
        <masonry :cols="{default: 4, 960: 1, 1264: 2}">
          <v-container v-for="(image, index) in images" :key="index">
            <v-hover v-slot="{ hover }">
              <v-img contain :lazy-src="image" :src="image" class="my-0 text-center rounded-xl elevation-16 animate__animated animate__zoomIn animate__faster" @load="loaded(image)">
                <transition name="scale-transition">
                  <div v-if="hover && hasLoaded && $vuetify.breakpoint.mdAndUp" class="d-flex transition-fast-in-fast-out grey darken-2 v-card--reveal" style="height: 100%; cursor: pointer;" @click="openImage(image)">
                    <v-icon class="mdi-48px" dark>mdi-arrow-expand</v-icon>
                  </div>
                </transition>
              </v-img>
            </v-hover>
          </v-container>
        </masonry>
      </v-card>
    </v-container>

    <!-- Dialog for zoom -->
    <v-dialog v-model="dialog" overlay-opacity="0.8">
      <v-img :src="image" contain max-height="90vh" @click="close"></v-img>
    </v-dialog>
  </div>
</template>

<script>
export default {
  data() {
    return {
      images: [],
      loadedImages: [],
      dialog: false,
      image: null,
      hasLoaded: false,
    };
  },

  computed: {
    mainSize() {
      return this.$vuetify.breakpoint.mdAndUp ? 'font-size: 5rem;' : 'font-size: 3rem;';
    },
  },

  methods: {
    close() {
      this.dialog = false;
      // this.image = null;
    },

    getHomeImages() {
      const images = require.context('/assets/images/home/', false, /^\.\/.*$/);
      const shuffled = images.keys().sort(() => Math.random() - 0.5);
      shuffled.forEach(name => {
        this.images.push(`/assets/images/home/${name.substring(2)}`);
      });
    },

    openImage(image) {
      this.image = image;
      this.dialog = true;
    },

    loaded(image) {
      this.loadedImages.push(image);
      if (this.loadedImages.length == this.images.length) {
        setTimeout(() => {
          this.hasLoaded = true;
        }, 1000);
      }
    }
  },

  mounted() { },

  created() {
    this.getHomeImages();
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
