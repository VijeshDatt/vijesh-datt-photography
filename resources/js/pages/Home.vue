<template>
  <div>
    <v-container fluid class="d-flex justify-center">
      <v-card flat color="transparent">
        <v-container fluid class="gallery" v-if="hasLoaded">
          <div class="box" v-for="(image, index) in images" :key="index">
            <v-hover v-slot="{ hover }">
              <v-img contain :lazy-src="image" :src="image" :class="{ zoom: hover }" class="image transition-swing text-center rounded-xl elevation-16" @load="loaded(image)">
                <transition name="scale-transition">
                  <div v-if="hover && hasLoaded && mdAndUp" class="d-flex transition-fast-in-fast-out grey darken-2 v-card--reveal" style="height: 100%; cursor: pointer" @click="openImage(image)">
                    <v-icon size="32" dark>fa-magnifying-glass-plus</v-icon>
                  </div>
                </transition>
              </v-img>
            </v-hover>
          </div>
        </v-container>

        <!-- <masonry :cols="{ default: 3, 960: 1, 1264: 2 }" v-if="hasLoaded">
          <v-container v-for="(image, index) in images" :key="index" class="gallery">
            <div class="box">
              <v-hover v-slot="{ hover }">
                <v-img contain :lazy-src="image" :src="image" :class="{ zoom: hover }" class="image transition-swing my-0 text-center rounded-xl elevation-16" @load="loaded(image)">
                  <transition name="scale-transition">
                    <div v-if="hover && hasLoaded && mdAndUp" class="d-flex transition-fast-in-fast-out grey darken-2 v-card--reveal" style="height: 100%; cursor: pointer" @click="openImage(image)">
                      <v-icon size="32" dark>fa-magnifying-glass-plus</v-icon>
                    </div>
                  </transition>
                </v-img>
              </v-hover>
            </div>
          </v-container>
        </masonry> -->
      </v-card>
    </v-container>

    <!-- Dialog for zoom -->
    <v-dialog v-model="dialog" overlay-opacity="0.8">
      <v-img :src="image" contain max-height="90vh" @click="close"></v-img>
    </v-dialog>
  </div>
</template>

<script>
import axios from "axios";
import { storage } from "../plugins/firebase";
import { ref, listAll, getDownloadURL } from "firebase/storage";

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
      return this.mdAndUp ? "font-size: 5rem;" : "font-size: 3rem;";
    },
  },

  watch: {},

  methods: {
    close() {
      this.dialog = false;
      // this.image = null;
    },

    getHomeImages() {
      listAll(ref(storage, "home"))
        .then((res) => {
          res.items.forEach((itemRef) => getDownloadURL(ref(storage, `gs://${itemRef.bucket}/${itemRef.fullPath}`)).then((download_url) => this.images.push(download_url)));
          this.hasLoaded = true;
        })
        .catch((error) => console.log(error));
    },

    fetchImages() {
      axios
        .get("/api/home")
        .then((res) => {
          const shuffled = res.data.images.sort(() => Math.random() - 0.5);
          shuffled.forEach((e) => this.images.push(`/assets/images/home/${e}`));
          this.hasLoaded = true;
        })
        .catch((e) => console.log(e));
      console.log(this.images);
    },

    openImage(image) {
      this.image = image;
      this.dialog = true;
    },

    loaded(image) {
      this.loadedImages.push(image);
      if (this.loadedImages.length == this.images.length) {
        setTimeout(() => (this.hasLoaded = true), 1000);
      }
    },
  },

  mounted() {},

  created() {
    this.getHomeImages();
    // this.fetchImages();
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

.gallery {
  columns: 3;
  column-gap: 25px;
}

.box {
  width: 100%;
  margin-bottom: 25px;
  break-inside: avoid;
}

.image {
  width: 100%;
}

@media (max-width: 1200px) {
  .gallery {
    columns: 2;
  }
}

@media (max-width: 480px) {
  .gallery {
    columns: 1;
  }
}
</style>

<!-- Style for svg - f8f8f8 -->
