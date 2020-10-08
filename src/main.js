import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

import axios from 'axios'
import VueScrollReveal from 'vue-scroll-reveal'

// or vue.config.js
window.axios = axios
axios.defaults.baseURL = 'http://127.0.0.1:8088'

Vue.use(VueScrollReveal, {
  class: 'v-scroll-reveal',
  duration: 800,
  delay: 200,
  scale: 1,
  distance: '10px',
  mobile: false
});

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
