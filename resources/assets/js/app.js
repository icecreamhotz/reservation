
  /**
   * First we will load all of this project's JavaScript dependencies which
   * includes Vue and other libraries. It is a great starting point when
   * building robust, powerful web applications using Vue and Laravel.
   */
  import App from './components/user/App.vue'
  import VeeValidate from 'vee-validate'
  import Vue from 'vue'
  import router from './router'
  import VueLocalStorage from 'vue-localstorage'
  import store from './store'
 
  Vue.use(VueLocalStorage)
  Vue.use(VeeValidate)
  /**
   * Next, we will create a fresh Vue application instance and attach it to
   * the page. Then, you may begin adding components to this application
   * or customize the JavaScript scaffolding to fit your unique needs.
   */

  export default new Vue({
    localStorage: {
      auth: {
        type: Boolean
      }
    },
    router,
    store,
    render: h => h(App)
  });