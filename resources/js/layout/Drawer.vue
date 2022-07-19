<template>
  <!-- <v-card flat color="background" height="100%" > -->
  <v-navigation-drawer app :value="true" fixed permanent floating color="background" v-if="$vuetify.breakpoint.mdAndUp">
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title>
          <v-img lazy-src="/assets/logos/black.png" src="/assets/logos/black.png" contain max-height="150" max-width="100%" class="my-6"></v-img>
        </v-list-item-title>
      </v-list-item-content>
    </v-list-item>
    <v-divider class="mx-16"></v-divider>
    <v-list nav height="70vh">
      <v-list-item-group no-action active-class="grey--text text--darken-3">
        <v-list-item link exact-path :to="{ name: 'Home' }">
          <v-list-item-title class="text-center bigger-font">Home</v-list-item-title>
        </v-list-item>

        <v-list-item link exact-path class="my-3" :to="{ name: 'About Me' }">
          <v-list-item-title class="text-center bigger-font">About Me</v-list-item-title>
        </v-list-item>

        <v-list-item link exact-path class="my-3" :to="{ name: 'Gallery' }">
          <v-list-item-title class="text-center bigger-font">Gallery</v-list-item-title>
        </v-list-item>

        <v-list-item link exact-path class="my-3" :to="{ name: 'Bookings' }">
          <v-list-item-title class="text-center bigger-font">Bookings</v-list-item-title>
        </v-list-item>

        <v-list-item link exact-path class="my-3" :to="{ name: 'Contact' }">
          <v-list-item-title class="text-center bigger-font">Contact</v-list-item-title>
        </v-list-item>
      </v-list-item-group>
    </v-list>
  </v-navigation-drawer>
  <!-- </v-card> -->
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      group: null,
    };
  },
}
</script>

<style>
.v-list--nav .v-list-item,
.v-list--nav .v-list-item:before {
  border-radius: 0.5rem !important;
}

.bigger-font {
  font-family: "Merriweather", Helvetica, sans-serif !important;
  font-size: 1.1rem !important;
}
</style>
