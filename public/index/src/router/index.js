import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Blog from '@/components/Blog'
import About from '@/components/About'
import Detail from '@/components/Detail'
import Error from '@/components/base/404'


Vue.use(Router)

export default new Router({
  routes: [
      {
          path: '/',
          redirect: '/home'  
      },
      {
          path:'/home',
          name:'home',
          component:Home,
      },
      {
          path:'/blog',
          name:'blog',
          component:Blog
      },
      {
          path:'/detail/:id',
          name:'detail',
          component:Detail
      },
      {
          path:'/about',
          name:'about',
          component:About
      },
      {
          path:'/404',
          name:'404',
          component:Error
      },
      {
          path:'*',
          redirect:'/404'
      }
  ]
})
