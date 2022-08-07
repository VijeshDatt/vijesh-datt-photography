<template>
  <div>
    <v-container fluid>
      <h1 style="font-size: 4rem; font-weight: 300;" :class="{ 'text-center' : $vuetify.breakpoint.smAndDown }" class="mb-4">Gallery</h1>
      <div class="d-flex flex-column justify-center align-center" v-if="!loaded">
        <v-progress-circular indeterminate size="50" width="5" color="primary"></v-progress-circular>
        <p class="my-2">Loading</p>
      </div>
      <v-row dense v-else>
        <v-col v-for="(item, index) in images" :key="`main-${index}`" cols="12" md="4" sm="6">
          <v-hover v-slot="{ hover }">
            <v-card class="mx-3 mb-0 mb-sm-6" color="transparent" rounded="xl" elevation="8">
              <v-img :src="`/assets/images/gallery/${item.folder}/cover.jpg`" class="white--text align-end" gradient="to top, rgba(0,0,0,0.75), rgba(0,0,0,0)" height="300px">
                <v-card-title>
                  <span class="pb-0">{{item.name}}</span>
                </v-card-title>
                <v-expand-transition>
                  <div v-if="hover || $vuetify.breakpoint.smAndDown">
                    <v-card-text class="pt-0 text-end">
                      <v-btn text dark @click="$router.push({ name: 'Gallery View', params:{ 'folder' : item.folder }})">
                        View album <v-icon right dark>mdi-arrow-right</v-icon>
                      </v-btn>
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
      loaded: false
    };
  },

  methods: {
    getFolders() {
      axios
        .get('/api/gallery', {
          onDownloadProgress: event => {
            console.log(event);
          }
        })
        .then(res => {
          this.images = res.data.data;
          this.loaded = true;
        })
        .catch(e => console.log(e));
    }
  },

  mounted() {
    this.getFolders();
  },
}
</script>

<style>
.bg {
  background-image: linear-gradient(to top, rgba(0, 0, 0, 1), rgba(0, 0, 0, 0));
}
</style>
