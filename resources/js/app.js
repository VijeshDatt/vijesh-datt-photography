import Vue from 'vue';
import App from './components/App.vue';
import vuetify from './plugins/vuetify';
import router from './router';
import VueMasonry from 'vue-masonry-css';

import { genericMixin } from './mixins/genericMixins';

Vue.mixin(genericMixin);

window._ = require('lodash');

Vue.use(VueMasonry);

new Vue({
  router,
  vuetify,
  render: h => h(App)
}).$mount('#app');
