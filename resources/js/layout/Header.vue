<template>
  <div>
    <v-app-bar absolute app color="background">
      <!-- Drawer toggle -->
      <!-- <v-app-bar-nav-icon v-if="$vuetify.breakpoint.smAndDown"></v-app-bar-nav-icon> -->
      <v-spacer></v-spacer>
      <!-- About Me button -->
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon class="mx-2" v-bind="attrs" v-on="on" @click="goto('About Me')">
            <v-icon>mdi-account-outline</v-icon>
          </v-btn>
        </template>
        <span>About Me</span>
      </v-tooltip>
      <!-- Gallery button -->
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon class="mx-2" v-bind="attrs" v-on="on" @click="goto('Gallery')">
            <v-icon>mdi-image-outline</v-icon>
          </v-btn>
        </template>
        <span>Gallery</span>
      </v-tooltip>
      <!-- Home/Logo button -->
      <v-toolbar-title>
        <v-tooltip bottom>
          <template v-slot:activator="{ on, attrs }">
            <v-btn icon x-large v-bind="attrs" v-on="on" class="mx-5" @click="goto('Home')">
              <v-img lazy-src="/assets/logos/black.png" src="/assets/logos/black.png" contain max-height="60" max-width="100"></v-img>
            </v-btn>
          </template>
          <span>Home</span>
        </v-tooltip>
      </v-toolbar-title>
      <!-- Bookings button -->
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon class="mx-2" v-bind="attrs" v-on="on" @click="goto('Bookings')">
            <v-icon>mdi-bookmark-plus-outline</v-icon>
          </v-btn>
        </template>
        <span>Booking</span>
      </v-tooltip>
      <!-- Contact button -->
      <v-tooltip bottom>
        <template v-slot:activator="{ on, attrs }">
          <v-btn icon class="mx-2" v-bind="attrs" v-on="on" @click="goto('Contact')">
            <v-icon>mdi-email-variant</v-icon>
          </v-btn>
        </template>
        <span>Contact</span>
      </v-tooltip>
      <v-spacer></v-spacer>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  data() {
    return {
    };
  },

  methods: {
    goto(name) {
      this.$router.push({ name: name });
    }
  },
}
</script>

<style>
</style>
