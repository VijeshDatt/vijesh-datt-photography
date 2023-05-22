<template>
  <v-container fluid :class="{ 'fill-height': $vuetify.breakpoint.mdAndUp }">
    <v-row no-gutters align="center" justify="center">
      <v-col cols="12" md="7">
        <v-card elevation="8" rounded="xl" class="ml-md-16" v-if="hasLoaded">
          <v-img :src="image" @load="loaded()">
            <transition name="fade-transition">
              <v-overlay :value="!hasLoaded" v-if="!hasLoaded" opacity="0"> </v-overlay>
            </transition>
          </v-img>
        </v-card>
      </v-col>
      <v-col cols="12" md="5">
        <v-card elevation="8" color="#edede9" rounded="xl" :style="$vuetify.breakpoint.mdAndUp ? 'margin-top: -10%; margin-left: -20%;' : 'margin: -10% 5% 0 5%;'">
          <v-card-title class="text-h3 justify-center"> About Me - Vijesh </v-card-title>
          <v-card-text> Born and raised in Suva, Fiji. Was always interested in photography but never had the means to pursue it. Finally saved up for a year and bought myself a basic entry level camera and have been fortunate enough to be getting opportunities to grow with this hobby. </v-card-text>
          <v-divider class="mx-16"></v-divider>
          <v-card-text>
            <h3 class="text-h4 mb-4 black--text text-center" style="font-size: 1rem">Gear</h3>
            <p>
              Camera(s): Canon 90D, Canon 1300D <br />
              Lenses: Canon 40mm (f/2.8), SIGMA 18-35mm (f/1.8), SIGMA 24-70mm (f/2.8) <br />
              Other gear(s): Godox VING V860IIC with S-Type Bowens softbox, 72mm ND-Filter (K&amp;F Concept), Godox AD 400Pro
            </p>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import { storage } from "../plugins/firebase";
import { ref, getDownloadURL, listAll } from "firebase/storage";
const aboutRef = ref(storage, "about/about.jpg");

export default {
  data() {
    return {
      hasLoaded: false,
      image: null,
    };
  },

  methods: {
    loaded() {
      setTimeout(() => {
        this.hasLoaded = true;
      }, 1000);
    },
  },

  mounted() {
    getDownloadURL(aboutRef).then((url) => {
      this.image = url;
      this.hasLoaded = true;
    });
  },
};
</script>

<style>
.v-application .text-h3,
.v-application .text-h4 {
  font-family: "Raleway", Helvetica, sans-serif !important;
}
</style>
