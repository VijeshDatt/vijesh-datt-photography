<template>
  <!-- <v-card flat color="background" height="100%" > -->
  <v-navigation-drawer app :value="true" fixed permanent floating color="background" v-if="$vuetify.breakpoint.mdAndUp" width="300px">
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title>
          <v-img lazy-src="/assets/logos/black_v2.png" src="/assets/logos/black_v2.png" max-height="100%" width="300px" class="my-6"></v-img>
        </v-list-item-title>
      </v-list-item-content>
    </v-list-item>
    <v-divider class="mx-16"></v-divider>
    <v-list nav height="70vh" class="px-md-10">
      <v-list-item-group no-action active-class="primary--text">
        <v-list-item link exact-path v-ripple="ripple" :to="{ name: 'Home' }">
          <v-list-item-title class="text-center bigger-font"> Home </v-list-item-title>
        </v-list-item>

        <v-list-item link exact-path v-ripple="ripple" class="my-3" :to="{ name: 'About Me' }">
          <v-list-item-title class="text-center bigger-font">About Me</v-list-item-title>
        </v-list-item>

        <v-list-item link exact-path v-ripple="ripple" class="my-3" :to="{ name: 'Gallery' }">
          <v-list-item-title class="text-center bigger-font">Gallery</v-list-item-title>
        </v-list-item>

        <!-- <v-list-item link exact-path v-ripple="ripple" class="my-3" :to="{ name: 'Bookings' }">
          <v-list-item-title class="text-center bigger-font">Bookings</v-list-item-title>
        </v-list-item> -->

        <v-list-item link exact-path v-ripple="ripple" class="my-3" :to="{ name: 'Contact' }">
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
      ripple: { class: 'primary--text' },
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
