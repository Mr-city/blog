// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import VueLazyload from 'vue-lazyload'
import VueAwesomeSwiper from 'vue-awesome-swiper';
import 'swiper/dist/css/swiper.css'

Vue.config.productionTip = false
Vue.use(VueAwesomeSwiper);
Vue.use(VueLazyload, { //配置懒加载 
  preLoad: 1.3,
  error: require('@/assets/img/loading.gif'),
  loading: require('@/assets/img/loading.gif'),
  attempt: 1
})

router.afterEach((to,from,next) => { //路由跳转 回到顶部
  window.scrollTo(0,0);
})
/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>'
})
