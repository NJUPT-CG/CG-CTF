/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import 'babel-polyfill'
import MuseUI from 'muse-ui';
import 'muse-ui/dist/muse-ui.css';
import 'muse-ui/dist/theme-carbon.css'; // 使用 carbon 主题

Vue.use(MuseUI);

Vue.component('drawer', require('./components/Drawer.vue'));
Vue.component('appBar', require('./components/AppBar.vue'));
Vue.component('tabBar', require('./components/TabBar.vue'));
Vue.component('challengeCard', require('./components/ChallengeCard.vue'));
Vue.component('challenges', require('./components/Challenges.vue'));

const app = new Vue({
    el: '#app'
});

// import App from './App.vue';
// import ElementUI from 'element-ui';
// import 'element-ui/lib/theme-default/index.css';
//
// Vue.use(ElementUI);
//
// const app = new Vue({
//     el: '#app',
//     render: h => h(App)
// });
