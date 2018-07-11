
<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
  import {mapState} from 'vuex'

  export default {
    computed: {
      ...mapState({
        userStore: state => state.userStore
      })
    },
    created() {
      const userObj = this.$localStorage.get('auth')
      this.$store.dispatch('setUserObject', userObj)
    }
  }
</script>

