<template>
  <div>
    <v-container fluid>
      <v-card flat color="transparent">
        <v-row dense align="center">
          <v-col cols="12" md="3">
            <v-btn text :block="smAndDown" color="primary" class="rounded-lg" @click="$router.push({ name: 'Gallery' })"> <v-icon left v-if="mdAndUp">fa-arrow-left</v-icon> Back to Gallery </v-btn>
          </v-col>

          <v-col cols="12" md="9">
            <h1 :style="fontSize" class="text-md-end text-center mb-4">{{ name }}</h1>
          </v-col>
        </v-row>

        <v-divider class="mx-16"></v-divider>

        <v-container fluid>
          <masonry :cols="{ default: 3, 960: 1, 1264: 3 }" :gutter="24" v-if="images.length > 0" :key="key" ref="masonry">
            <div v-for="(image, index) in images" :key="index">
              <v-hover v-slot="{ hover }">
                <v-img contain :lazy-src="image" :src="image" :class="{ zoom: hover }" class="my-6 text-center rounded-xl transition-swing elevation-8">
                  <transition name="scale-transition">
                    <div v-if="hover && mdAndUp" class="d-flex transition-fast-in-fast-out grey darken-2 v-card--reveal" style="height: 100%; cursor: pointer" @click="openImage(image)">
                      <v-icon size="32" dark>fa-magnifying-glass-plus</v-icon>
                    </div>
                  </transition>
                </v-img>
              </v-hover>
            </div>
          </masonry>
        </v-container>
      </v-card>
    </v-container>

    <v-dialog v-model="dialog" overlay-opacity="0.8">
      <v-img :src="image" contain max-height="90vh" @click="close"></v-img>
    </v-dialog>
  </div>
</template>

<script>
import { storage } from "../plugins/firebase";
import { ref, listAll, getDownloadURL } from "firebase/storage";

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
      return this.smAndDown ? "font-weight: 400 !important; font-size: 2rem;" : "font-weight: 300 !important; font-size: 4rem;";
    },
  },

  methods: {
    close() {
      this.dialog = false;
      this.image = null;
    },

    getImages() {
      listAll(ref(storage, `gallery/${this.folder}`))
        .then((res) => {
          res.items.forEach((itemRef) => getDownloadURL(ref(storage, `gs://${itemRef.bucket}/${itemRef.fullPath}`)).then((download_url) => this.images.push(download_url)));
        })
        .catch((error) => console.log(error))
        .finally(() => (this.hasLoaded = true));
    },

    openImage(image) {
      this.image = image;
      this.dialog = true;
    },

    redo() {
      this.$nextTick(() => this.$refs.masonry.reCalculate());
    },
  },

  mounted() {},

  created() {
    this.folder = this.$route.params.folder;
    this.name = _.startCase(_.split(this.folder, "-").join(" "));
    document.title = `${this.name} | Vijesh Datt Photography`;

    this.getImages();
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
