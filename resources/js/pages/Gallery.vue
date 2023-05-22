<template>
  <div>
    <v-container fluid>
      <h1 style="font-size: 4rem; font-weight: 300" :class="{ 'text-center': $vuetify.breakpoint.smAndDown }" class="mb-4">Gallery</h1>

      <v-alert class="rounded-lg" text type="info" border="left" v-if="loaded">
        <template #prepend>
          <v-icon class="mx-4 mt-n1 info--text">fa-info</v-icon>
        </template>
        <v-row align="center">
          <v-col cols="12" md="10">
            <span>Want to buy any of my photos? Well now you can using PicFair, you can purchase digital copies and even order prints.</span>
          </v-col>
          <v-col cols="12" md="2" class="d-flex justify-end">
            <v-btn class="rounded-lg" depressed color="info" :block="$vuetify.breakpoint.smAndDown" href="https://vijeshdatt.picfair.com/" target="_blank">
              <v-icon small left>fa-link</v-icon>
              PicFair Store
            </v-btn>
          </v-col>
        </v-row>
      </v-alert>

      <div class="d-flex flex-column justify-center align-center" v-if="!loaded">
        <v-progress-circular indeterminate size="50" width="5" color="primary"></v-progress-circular>
        <p class="my-2">Loading</p>
      </div>
      <v-row dense v-else>
        <v-col v-for="(item, index) in images" :key="`main-${index}`" cols="12" md="4" sm="6">
          <v-hover v-slot="{ hover }">
            <v-card class="mx-md-3 mb-6" color="transparent" rounded="xl" elevation="6">
              <v-img :src="`/assets/images/gallery/${item.folder}/cover.jpg`" :class="{ zoom: hover }" class="transition-swing white--text align-end" gradient="to top, rgba(0,0,0,0.75), rgba(0,0,0,0)" height="300px">
                <v-card-title>
                  <span class="pb-0">{{ item.name }}</span>
                </v-card-title>
                <v-expand-transition>
                  <div v-if="hover || $vuetify.breakpoint.smAndDown">
                    <v-card-text class="pt-0 text-end">
                      <v-btn text dark class="rounded-lg" @click="$router.push({ name: 'Gallery View', params: { folder: item.folder } })"> View album <v-icon right dark>fa-arrow-right</v-icon> </v-btn>
                    </v-card-text>
                  </div>
                </v-expand-transition>
              </v-img>
            </v-card>
          </v-hover>
        </v-col>
      </v-row>
    </v-container>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      images: [],
      loaded: false,
    };
  },

  methods: {
    getFolders() {
      axios
        .get("/api/gallery")
        .then((res) => {
          this.images = res.data.data.sort((a, b) => a.folder.localeCompare(b.folder));
          this.loaded = true;
        })
        .catch((e) => console.log(e));
    },
  },

  mounted() {
    this.getFolders();
  },
};
</script>

<style>
.bg {
  background-image: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
}
</style>
