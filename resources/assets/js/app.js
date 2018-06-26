
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import router from './routes';

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component( 'articles', require('./components/Articles.vue' ));

Vue.component( 'navbar', require('./components/Navbar.vue' ));

Vue.component ('categories', require ('./components/Categories.vue' ));

Vue.component ('category', require ('./views/ArticlesByCatView.vue' ));

Vue.component ('articlesByCat', require ('./components/ArticlesByCat.vue' ));

Vue.component ('articleCard', require ('./components/ArticleCard.vue'));

Vue.component ('createArticle', require ('./components/CreateArticle.vue'));


// USER PASSPORT API :
Vue.component(
    'passport-clients',
    require('./components/passport/Clients.vue')
);

Vue.component(
    'passport-authorized-clients',
    require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);


const app = new Vue({
    el: '#app',
    router
});
