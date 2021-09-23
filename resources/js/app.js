require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('article-page', require('./components/Article.vue').default);

const app = new Vue({
    el: '#app',
});