import VueRouter from 'vue-router';

let routes = [
  {
    path: '/',
    component: require('./views/Home')
  },
  {
    path: '/authlogin',
    component: require('./views/AuthView'),
    name: 'authlogin'
  },

  {
    path: '/articles',
    component: require('./components/Articles'),
    name: 'articles'
  },
  {
    path: '/categories',
    component: require('./components/Categories'),
    name: 'categories'
  },
  {
    path: '/navbar',
    component: require('./components/Navbar')
  },
  {
    path: '/:categoryID',
    component: require('./views/ArticlesByCatView'),
    name: 'category'
  },


]
export default new VueRouter({
  mode: "history",
  routes
});
