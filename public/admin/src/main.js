// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import iView from 'iview'
import axios from 'axios'
import VueAxios from 'vue-axios'
import store from './store'
import mavonEditor from 'mavon-editor'
import 'mavon-editor/dist/css/index.css'
import 'iview/dist/styles/iview.css'

Vue.use(iView)
Vue.use(mavonEditor)
Vue.config.productionTip = false

// Vue.component('Message',Message);
// Vue.prototype.$Message = Message
// Vue.prototype.$Notice = Notice

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>',
})
