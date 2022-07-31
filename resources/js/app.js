import Vue from 'vue';
import App from './components/App.vue';
import vuetify from './plugins/vuetify';
import router from './router';
import VueMasonry from 'vue-masonry-css';
import VueMask from 'v-mask';

import { genericMixin } from './mixins/genericMixins';

Vue.mixin(genericMixin);

window._ = require('lodash');

Vue.use(VueMasonry);
Vue.use(VueMask);

new Vue({
  router,
  vuetify,
  render: h => h(App)
}).$mount('#app');
