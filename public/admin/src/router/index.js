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
      meta:{
          cname:'登录'
      }
    },
    {
      path: '/home',
      name: 'home',
      component: Home,
      meta:{
          cname:'首页'
      }
    },
    {
      path: '/user',
      name: 'user',
      component: User,
      meta:{
          cname:'用户组'
      }
    },
    {
      path: '/column',
      name: 'column',
      component: Column,
      meta:{
          cname:'栏目管理'
      }
    },
    {
      path: '/test',
      name: 'test',
      component: Test
    },
    {
      path: '/article',
      name: 'article',
      component: Article,
      meta:{
          cname:'文章管理'
      }
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
