/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
require('./img_uploader');
require('./flash_message');
window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('study-component', require('./components/StudyComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('timeline-component', require('./components/TimelineComponent.vue').default);
Vue.component('timeline-contents-component', require('./components/TimelineContentsComponent.vue').default);
Vue.component('category-search-component', require('./components/CategorySearchComponent.vue').default);
Vue.component('form-component', require('./components/FormComponent.vue').default);
Vue.component('paginate-component', require('./components/PaginateComponent.vue').default);
Vue.component('study-demo-component', require('./components/StudyDemoComponent.vue').default);
// Vue.component('paginate', Paginate);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});

document.addEventListener('DOMContentLoaded', function() {
    if (document.getElementById("demo")) {
        const demo = new Vue({
            el: '#demo',
        })
    }
  }, false);
