import Vue from "vue";
import VueRouter from 'vue-router';

const Home = (resolve) => { require.ensure(["./pages/Home.vue"], () => { resolve(require("./pages/Home.vue")); }); };
const AboutMe = (resolve) => { require.ensure(["./pages/AboutMe.vue"], () => { resolve(require("./pages/AboutMe.vue")); }); };
const Bookings = (resolve) => { require.ensure(["./pages/Bookings.vue"], () => { resolve(require("./pages/Bookings.vue")); }); };
const Contact = (resolve) => { require.ensure(["./pages/Contact.vue"], () => { resolve(require("./pages/Contact.vue")); }); };
const Gallery = (resolve) => { require.ensure(["./pages/Gallery.vue"], () => { resolve(require("./pages/Gallery.vue")); }); };
const GalleryView = (resolve) => { require.ensure(["./pages/GalleryView.vue"], () => { resolve(require("./pages/GalleryView.vue")); }); };



const PageNotFound = (resolve) => { require.ensure(["./components/PageNotFound.vue"], () => { resolve(require("./components/PageNotFound.vue")); }); };

Vue.use(VueRouter);

const router = new VueRouter({
  routes: [
    { path: '/', component: Home, name: 'Home', meta: { title: 'Home' } },
    { path: '/about-me', component: AboutMe, name: 'About Me', meta: { title: 'About Me' } },
    // { path: '/bookings', component: Bookings, name: 'Bookings', meta: { title: 'Bookings' } },
    { path: '/gallery', component: Gallery, name: 'Gallery', meta: { title: 'Gallery' } },
    { path: '/gallery/:folder', component: GalleryView, name: 'Gallery View', meta: { title: '' } },
    { path: '/contact', component: Contact, name: 'Contact', meta: { title: 'Contact' } },

    // Page not found
    { path: '*', component: PageNotFound, name: 'Error 404', meta: { title: 'Error 404' } },
  ],
  mode: 'history',
});

export default router;
