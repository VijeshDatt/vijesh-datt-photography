<template>
  <div>
    <v-app-bar elevate-on-scroll app color="background">
      <!-- Drawer toggle -->
      <!-- <v-app-bar-nav-icon v-if="smAndDown"></v-app-bar-nav-icon> -->
      <v-spacer></v-spacer>
      <!-- Home button -->
      <v-btn icon class="mx-1" @click="goto('Home')">
        <v-icon size="18">fa-house</v-icon>
      </v-btn>
      <!-- About Me button -->
      <v-btn icon class="mx-1" @click="goto('About Me')">
        <v-icon size="18">fa-user</v-icon>
      </v-btn>
      <!-- Home/Logo button -->
      <v-toolbar-title>
        <v-btn icon x-large class="mx-7" @click="goto('Home')">
          <v-img src="/assets/logos/black_v2.png" contain max-height="60" max-width="125"></v-img>
        </v-btn>
      </v-toolbar-title>
      <!-- Gallery button -->
      <v-btn icon class="mx-1" @click="goto('Gallery')">
        <v-icon size="18">fa-images</v-icon>
      </v-btn>
      <!-- Contact button -->
      <v-btn icon class="mx-1" @click="goto('Contact')">
        <v-icon size="18">fa-envelope</v-icon>
      </v-btn>
      <v-spacer></v-spacer>
    </v-app-bar>
  </div>
</template>

<script>
export default {
  data() {
    return {};
  },

  methods: {
    goto(name) {
      this.$router.push({ name: name });
    },
  },
};
</script>

<style></style>
