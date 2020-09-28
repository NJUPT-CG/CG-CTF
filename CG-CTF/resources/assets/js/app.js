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
import theme from 'muse-ui/lib/theme';
import Loading from 'muse-ui-loading';
import 'muse-ui-loading/dist/muse-ui-loading.css';
theme.use('light');//import 'muse-ui/dist/theme-carbon.css'; // 使用 carbon 主题


Vue.use(MuseUI);
Vue.use(Loading);
Vue.component('drawer', require('./components/Drawer.vue'));
Vue.component('appBar', require('./components/AppBar.vue'));
Vue.component('tabBar', require('./components/TabBar.vue'));
Vue.component('challengeCard', require('./components/ChallengeCard.vue'));
Vue.component('challenges', require('./components/Challenges.vue'));
Vue.component('scoreboard', require('./components/scoreboard.vue'));
Vue.component('userdetail', require('./components/userDetail.vue'));
Vue.component('submitsboard', require('./components/submitsboard.vue'));

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
