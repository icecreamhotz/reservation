import Vue from 'vue';
import Router from 'vue-router';
import App from './components/user/index';
import Home from './components/user/home';
Vue.use(Router);

function PageComponent(name) {
    return {
      render: h => h('h3', `Hello from the ${name} page`)
    };
   }
   export default new Router({
     mode: 'history',
     routes: [
       { path: '/', component: App, name: 'index' },
       { path: '/home', component: Home, name: 'home' },
       { path: '/contact', component: PageComponent('Contact'), name: 'contact' },
       { path: '/logout', component: App, name: 'logout'}
     ]
});