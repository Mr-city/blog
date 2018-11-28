import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import User from '@/components/User'
import Column from '@/components/Column'
import Article from '@/components/Article'
import Test from '@/components/testStore'
import Error from '@/components/base/404'
import Login from '@/components/Login'


Vue.use(Router)

export default new Router({
  routes: [{
      path: '/',
      redirect: '/home'
    },
    {
      path: '/Login',
      name: 'login',
      component: Login,
    },
    {
      path: '/home',
      name: 'home',
      component: Home,
    },
    {
      path: '/user',
      name: 'user',
      component: User,
    },
    {
      path: '/column',
      name: 'column',
      component: Column
    },
    {
      path: '/test',
      name: 'test',
      component: Test
    },
    {
      path: '/article',
      name: 'article',
      component: Article
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
