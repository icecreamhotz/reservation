<template>
  <div class="container lg-pt-20 lg-pb-20">
      <div class="navbar-brand">
          <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo-white.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
            </a>
          <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
              <span></span>
              <span></span>
              <span></span>
          </div>
      </div>
      <div id="navbarExampleTransparentExample" class="navbar-menu">
          <div class="navbar-end link-effect-10">
              <a class="navbar-item is-active" href="https://bulma.io/">
                                            <span>Home</span>
                                        </a>
              <a class="navbar-item" href="https://bulma.io/">
                                            <span>  Schedule</span>
                                        </a>
              <a class="navbar-item" href="https://bulma.io/">
                                            <span>  Booking</span>
                                        </a>
              <a class="navbar-item" href="https://bulma.io/">
                                            <span>  Report</span>
                                        </a>
              <a class="navbar-item" href="https://bulma.io/">
                                            <span>  Contact</span>
                                        </a>
  
          </div>
          <div class="navbar-end">
              <div class="navbar-item">
                  <div class="field has-addons">
                      <div class="control">
                          <input class="input" type="text" placeholder="Find a repository">
                      </div>
                      <div class="control">
                          <a class="button is-info">
                                                            Search
                                                        </a>
                      </div>
                  </div>
              </div>

              <div class="navbar-item has-dropdown is-hoverable" v-if="dropDownUser">
        <a class="navbar-link" href="/documentation/overview/start/">
            {{ name + ' ' + lastname }}
          <span v-if="shimmer" :class="{ shimmer:shimmer }" style="height: 7px;width: 150px; "></span>
        </a>
        <div class="navbar-dropdown is-boxed">
          <a class="navbar-item" href="/documentation/overview/start/">
            Profile
          </a>
          <a class="navbar-item" href="https://bulma.io/documentation/modifiers/syntax/">
            Settings
          </a>
          <a class="navbar-item" href="https://bulma.io/documentation/columns/basics/">
            Report
          </a>
            <hr class="navbar-divider">
          <a class="navbar-item is-active" href="/logout">
            Logout
          </a>
        </div>
      </div>
          </div>
      </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            lastname: '',
            dropDownUser: false,
            checkAuth: '',
            shimmer: true
        }
    },
    created() {
        const todos = this.$localStorage.get('auth')
        if(todos) {
            this.$nextTick(() => {
                this.dropDownUser = todos
                axios.post('/checkauth').then(response => {
                    this.shimmer = false
                    this.name = response.data.user.name
                    this.lastname = response.data.user.lastname
                })
            })
        }
    }
}
</script>
