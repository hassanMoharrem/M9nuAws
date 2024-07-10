import './bootstrap'
import './lang.js'
import { createApp } from 'vue/dist/vue.esm-bundler';
import '@fortawesome/fontawesome-free/css/all.css';
///// Admin //////////
import default_user from './components/admin/default_user.vue';
import slider from './components/admin/slider.vue';
import step from './components/admin/step.vue';
import advantage from './components/admin/advantage.vue';
import category from './components/admin/category.vue';
import product from './components/admin/product.vue';

//////////////
import profile from './components/user/Profile.vue';
import create_menu from './components/user/create_menu.vue';


window.vue_app = createApp({})
///// profile //////////////

vue_app.component('profile', profile)


///// Menu ///////////////
vue_app.component('create_menu', create_menu)


///// WebSite //////////////
vue_app.component('default_user', default_user)
vue_app.component('slider', slider)
vue_app.component('step', step)
vue_app.component('advantage', advantage)
vue_app.component('category', category)
vue_app.component('product', product)


vue_app.mount('#app')
