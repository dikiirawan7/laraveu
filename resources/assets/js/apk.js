
require('./bootstrap');

window.Vue = require('vue');


import VueRouter from 'vue-router';
import NProgress from 'nprogress';
import VueSweetalert2 from 'vue-sweetalert2';

const options = {
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#ff7674'
  }
   
  Vue.use(VueSweetalert2, options);
  Vue.use(VueRouter);
Vue.use(NProgress);
//window.nama yang diimpor.default agar fungsinya
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);




import Apk from './App.vue';
import HomeComponent from './components/HomeComponent.vue';
import IndexConponent from './components/IndexComponent.vue';
import EditComponent from './components/EditComponent.vue';
import Isi from './components/Isi.vue';

import '../../../node_modules/nprogress/nprogress.css';
import '../../../node_modules/jquery/dist/jquery.min.js';

Vue.config.productionTip = false


const routes = [
    {
        name:'posts',
        path:'/latihan',
        component:IndexConponent
    },
    {
        name:'home',
        path:'/post',
        component:HomeComponent
    },
    {
        name:'create',
        path:'/create',
        component:Isi
    },
    {
        name:'edit',
        path:'/edit/:id',
        component:EditComponent
    }    
];

const router = new VueRouter({
    mode:'history',
    routes:routes,
    linkExactActiveClass: "active"
});

router.beforeResolve((to, from, next) => {
    if (to.name) {
        NProgress.start();
        
    }
    next();
  })
  
  router.afterEach((to, from) => {
    NProgress.done();
  })
  

const app = new Vue(Vue.util.extend({ router }, Apk)).$mount('#apk');