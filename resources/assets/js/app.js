
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('login', require('./components/Login.vue'));
// Vue.component('register', require('./components/Register.vue'));
const routes = [
    { path: '/', component: require('./views/DashboardView') },
    { path: '/dashboard', component: require('./views/DashboardView') },
    { path: '/authors', component: require('./views/AuthorsView') },
    {
        path: '/books',
        component: require('./views/BooksView'),
        children: [
            { path: '', component: require('./views/Books/ListBooksView') },
            { path: 'create', component: require('./views/Books/CreateBookView') },
        ]
    }
];

const router = new VueRouter({
    root: '/',
    mode: 'history',
    linkActiveClass: 'active',
    routes
});

const app = new Vue({
    router,

    data: {
        actions: Store.actions,
        loading: true,
    },

    created() {
        DB.open(() => {
            this.loading = false;
        Store.init();
    });
    }
}).$mount('#app');