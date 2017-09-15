let rootURL = document.head.querySelector('meta[name="root-url"]').content;
rootURL = rootURL.endsWith('/') ? rootURL : rootURL + "/";

window.apiRoot = `${rootURL}api/`;

let routeList = new Map();

// 加一个字符串或者路由组
//
let routes = [
    {
        group: 'challenges',
        hash: true,
        routes: ['Web', 'Re', 'Pwn', 'Crypto', 'Misc']
    },
    'scoreboard',
    'about',
    'login',
    'logout',
    'score',
    'register',
    'profile',
    'create',
    'edit',
    'publishNotice',
    'notice'
];

let hashRoutesMap = (routes, routeList) => {
    routes.routes.map((val) => {
        routeList.set(`${routes.group}.${val}`, `${rootURL}${routes.group}#${val}`);
    })
};

let normalRouteMap = (routes, routeList) => {
    routes.routes.map((val) => {
        routeList.set(`${routes.group}.${val}`, `${rootURL}${routes.group}/${val}`);
    })
};

let mapRoutes = (routes) => {
    let routeList = new Map();
    routes.map((routeItem) => {
        if (typeof routeItem === "object") {
            routeItem.hash ? hashRoutesMap(routeItem, routeList) : normalRouteMap(routeItem, routeList);
        } else {
            routeList.set(routeItem, `${rootURL}${routeItem}`);
        }
    });
    return routeList;
};

routeList = mapRoutes(routes);

window.routeList = routeList;

window.md = require('markdown-it')();

window._ = require('lodash');

/**
 * Vue is a modern JavaScript library for building interactive web interfaces
 * using reactive data binding and reusable components. Vue's API is clean
 * and simple, leaving you to focus on building your next great project.
 */

window.Vue = require('vue');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let csrfToken = document.head.querySelector('meta[name="csrf-token"]');
let apiToken = document.head.querySelector('meta[name="api-token"]');

if (csrfToken) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content;
    window.axios.defaults.headers.common['Authorization'] = apiToken.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: 'your-pusher-key'
// });
