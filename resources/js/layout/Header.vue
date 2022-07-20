<template>
  <div>
    <v-app-bar absolute app color="background">
      <!-- Drawer toggle -->
      <!-- <v-app-bar-nav-icon v-if="$vuetify.breakpoint.smAndDown"></v-app-bar-nav-icon> -->
      <v-spacer></v-spacer>
      <!-- Home button -->
      <v-btn icon class="mx-2" @click="goto('Home')">
        <v-icon>mdi-home-outline</v-icon>
      </v-btn>
      <!-- About Me button -->
      <v-btn icon class="mx-2" @click="goto('About Me')">
        <v-icon>mdi-account-outline</v-icon>
      </v-btn>
      <!-- Home/Logo button -->
      <v-toolbar-title>
        <v-btn icon x-large class="mx-5" @click="goto('Home')">
          <v-img lazy-src="/assets/logos/black.png" src="/assets/logos/black.png" contain max-height="60" max-width="100"></v-img>
        </v-btn>
      </v-toolbar-title>
      <!-- Gallery button -->
      <v-btn icon class="mx-2" @click="goto('Gallery')">
        <v-icon>mdi-image-outline</v-icon>
      </v-btn>
      <!-- Contact button -->
      <v-btn icon class="mx-2" @click="goto('Contact')">
        <v-icon>mdi-email-variant</v-icon>
      </v-btn>
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
