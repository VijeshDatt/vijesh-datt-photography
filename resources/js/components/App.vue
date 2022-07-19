<template>
  <v-app>
    <!-- Header, only visible in mobile mode -->
    <nav-header v-if="$vuetify.breakpoint.smAndDown"></nav-header>

    <!-- Drawer, visible in every mode except mobile -->
    <nav-drawer></nav-drawer>
    <!-- Main application, including drawer -->
    <v-main class="background">
      <!-- <v-row class="fill-height"> -->
      <!-- <v-col cols="2" v-if="$vuetify.breakpoint.mdAndUp">
        </v-col>
        <v-col :cols="$vuetify.breakpoint.mdAndUp ? 10 : 12"> -->
      <transition :name="transition" mode="out-in" appear>
        <router-view></router-view>
      </transition>
      <!-- </v-col> -->
      <!-- </v-row> -->
    </v-main>

    <!-- Footer -->
    <base-footer></base-footer>
  </v-app>
</template>

<script>
import Header from '../layout/Header';
import Drawer from '../layout/Drawer';
import Footer from '../layout/Footer';

export default {
  components: {
    'nav-header': Header,
    'nav-drawer': Drawer,
    'base-footer': Footer,
  },

  data() {
    return {
      title: '',
      transition: 'slide-y-transition'
    };
  },

  watch: {
    $route(to, from) {
      // Change transition based on route
      if (to.name == 'Gallery View' && from.name == 'Gallery') this.transition = 'scroll-x-reverse-transition';
      else if (to.name == 'Gallery' && from.name == 'Gallery View') this.transition = 'scroll-x-transition';
      else this.transition = 'slide-y-transition';

      this.title = to.meta.title;
    },

    title() {
      document.title = `${this.title} | Vijesh Datt Photography`;
    }
  },

  mounted() {
    this.title = 'Home';
  },
}
</script>

<style>
/* euphoria-script-regular - latin */
@font-face {
  font-family: "Euphoria Script";
  font-style: normal;
  font-weight: 400;
  src: local(""),
    url("/fonts/euphoria-script-v14-latin-regular.woff2") format("woff2"),
    url("/fonts/euphoria-script-v14-latin-regular.woff") format("woff");
}

/* inter-regular - latin */
@font-face {
  font-family: "Inter";
  font-style: normal;
  font-weight: 400;
  src: local(""), url("/fonts/inter-v11-latin-regular.woff2") format("woff2"),
    /* Chrome 26+, Opera 23+, Firefox 39+ */
      url("/fonts/inter-v11-latin-regular.woff") format("woff"); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

/* amatic-sc-700 - latin */
@font-face {
  font-family: "Amatic SC";
  font-style: normal;
  font-weight: 700;
  src: local(""), url("/fonts/amatic-sc-v23-latin-700.woff2") format("woff2"),
    /* Chrome 26+, Opera 23+, Firefox 39+ */
      url("/fonts/amatic-sc-v23-latin-700.woff") format("woff"); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

/* merriweather-regular - latin */
/* merriweather-sans-regular - latin */
@font-face {
  font-family: "Merriweather";
  font-style: normal;
  font-weight: 400;
  src: local(""),
    url("/fonts/merriweather-sans-v21-latin-regular.woff2") format("woff2"),
    /* Chrome 26+, Opera 23+, Firefox 39+ */
      url("/fonts/merriweather-sans-v21-latin-regular.woff") format("woff"); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}
/* merriweather-sans-700 - latin */
@font-face {
  font-family: "Merriweather";
  font-style: normal;
  font-weight: 700;
  src: local(""),
    url("/fonts/merriweather-sans-v21-latin-700.woff2") format("woff2"),
    /* Chrome 26+, Opera 23+, Firefox 39+ */
      url("/fonts/merriweather-sans-v21-latin-700.woff") format("woff"); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

/* raleway-300 - latin */
@font-face {
  font-family: "Raleway";
  font-style: normal;
  font-weight: 300;
  src: local(""), url("/fonts/raleway-v27-latin-300.woff2") format("woff2"),
    /* Chrome 26+, Opera 23+, Firefox 39+ */
      url("/fonts/raleway-v27-latin-300.woff") format("woff"); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}
/* raleway-regular - latin */
@font-face {
  font-family: "Raleway";
  font-style: normal;
  font-weight: 400;
  src: local(""), url("/fonts/raleway-v27-latin-regular.woff2") format("woff2"),
    /* Chrome 26+, Opera 23+, Firefox 39+ */
      url("/fonts/raleway-v27-latin-regular.woff") format("woff"); /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
}

/* html,
body {
  overflow: hidden;
} */

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Raleway", Helvetica, sans-serif !important;
  /* font-weight: 400 !important; */
  word-break: break-word !important;
  cursor: default;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.v-application {
  font-family: "Inter", Helvetica, sans-serif !important;
  word-break: normal !important;
}

.v-application .text-h1,
.v-application .text-h2,
.v-application .text-h3,
.v-application .text-h4,
.v-application .text-h5,
.v-application .text-h6 {
  font-family: "Raleway", Helvetica, sans-serif !important;
  font-weight: 300 !important;
  word-break: break-word !important;
  cursor: default;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.v-overlay,
.v-overlay .v-overlay--active,
.v-overlay__scrim {
  backdrop-filter: blur(2.5px) !important;
  -webkit-backdrop-filter: blur(2.5px) !important;
  /* transition: all 150ms ease-in-out !important; */
  transition: all 150ms cubic-bezier(0.25, 0.8, 0.5, 1), z-index 1ms !important;
}

.v-main__wrap > div > .container,
.v-main__wrap > .container {
  width: 97% !important;
}
</style>
