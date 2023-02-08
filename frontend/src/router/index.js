import Vue from 'vue'
import store from '../store'
import VueRouter from 'vue-router'
import Home from '../pages/Home.vue'
import Detail from '../pages/Detail.vue'
import Edit from '../pages/Edit.vue'
import Tambah from '../pages/Tambah.vue'
import Login from '../pages/Login.vue'
import Tipe from '../pages/Tipe.vue'
import Settings from '../pages/Settings.vue'
import UserSetting from '../pages/UserSetting.vue'

import Default from '../layout/Default.vue'
// import Admin from '../layout/Admin.vue'
import Main from '../layout/Main.vue'



Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    components: {
      content: Home,
      layout: Main,
    },
  },
  {
    path: '/tambah',
    name: 'Tambah',
    components: {
      content: Tambah,
      layout: Main,
    },
  },
  {
    path: '/detail/:id/',
    name: 'Detail',
    components: {
      content: Detail,
      layout: Main,
    },
  },
  {
    path: '/edit',
    name: 'Edit',
    components: {
      content: Edit,
      layout: Main,
    },
  },
  {
    path: '/login',
    name: 'Login',
    components: {
      content: Login,
      layout: Default,
    },
    meta: {requiresAuth: true}
  },
  {
    path: '/Tipe/:tipe/',
    name: 'Tipe',
    components: {
      content: Tipe,
      layout: Main,
    },
  },
  {
    path: '/Settings/',
    name: 'Settings',
    components: {
      content: Settings,
      layout: Main,
    },
  },
  {
    path: '/Settings/User',
    name: 'User Setting',
    components: {
      content: UserSetting,
      layout: Main,
    },
  },
  // {
  //   path: '/about',
  //   name: 'About',
  //   // route level code-splitting
  //   // this generates a separate chunk (about.[hash].js) for this route
  //   // which is lazy-loaded when the route is visited.
  //   component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  // }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

// router.beforeEach((to, from, next) => {

//   const requiresAuth = to.matched.some(record => record.meta.requiresAuth)

//   const isAuthenticated = store.getters.userToken;
  
//   if(!requiresAuth && isAuthenticated == ""){
//     console.log('test')
//     next({name: "Login"})
//   }else{
//     next()
//   }
  

// })

export default router
