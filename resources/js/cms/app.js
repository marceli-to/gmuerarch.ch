// Vue
import Vue from 'vue';
window.Vue = Vue;

// Axios setup
import axios from 'axios';
window.axios = axios;

// Configure axios defaults
window.axios.defaults.withCredentials = true;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Set CSRF token
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

// Axios Interceptors (after Vue and Axios are initialized)
require('vue-axios-interceptors');

// Vue-Router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

// Vue-Axios
import VueAxios from 'vue-axios';
Vue.use(VueAxios, axios);

// Vue-Notifications
import Notifications from 'vue-notification';
Vue.use(Notifications);

// Load utilities
import _ from 'lodash';
window._ = _;

// Filters
import '@/mixins/Filters';

// Loading indicator
import LoadingIndicator from "@/components/ui/LoadingIndicator";
Vue.component('LoadingIndicator', LoadingIndicator);

// Separator
import Separator from "@/components/ui/Separator";
Vue.component('Separator', Separator);

// Store
import store from '@/config/store';

// Routes
import baseRoutes from '@/config/routes';
import officeRoutes from '@/views/pages/office/config/routes';
import discourseRoutes from '@/views/pages/discourse/config/routes';
import projectRoutes from '@/views/pages/project/config/routes';
import homeRoutes from '@/views/pages/home/config/routes';
import imageRoutes from '@/modules/images/config/routes';

const router = new VueRouter(
  { 
    mode: 'history', 
    routes: [
      ...baseRoutes,
      ...officeRoutes,
      ...discourseRoutes,
      ...projectRoutes,
      ...imageRoutes,
      ...homeRoutes
    ]
  }
);

// App component
import AppComponent from '@/App.vue';

// Mount App
const app = new Vue({
  mixins: [],
  components: { 
    AppComponent
  },
  router,
  store
}).$mount('#app');