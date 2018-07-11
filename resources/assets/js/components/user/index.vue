
<template>
  <div id="app">
      <section class="hero is-fullheight has-carousel">
          <div class="hero-carousel carousel-animated carousel-animate-fade" data-autoplay="true">
              <div class='carousel-container'>
                  <div class='carousel-item has-background is-active'>
                      <img class="is-background" src="images/index_bg1.jpg" alt="" />
                  </div>
                  <div class='carousel-item has-background'>
                      <img class="is-background" src="images/index_bg2.jpg" alt="" />
                  </div>
                  <div class='carousel-item has-background'>
                      <img class="is-background" src="images/index_bg3.jpg" alt="" />
                  </div>
                  <div class='carousel-item has-background'>
                      <img class="is-background" src="images/index_bg4.jpg" alt="" />
                  </div>
                  <div class='carousel-item has-background'>
                      <img class="is-background" src="images/index_bg5.jpg" alt="" />
                  </div>
              </div>
          </div>
          <!-- header !-->
          <nav class="navbar is-transparent">
              <app-header></app-header>
          </nav>
          <!--         !-->
          <div class="hero-body">
              <div class="container has-text-centered">
                  <h1 class="title has-text-light">
                      Welcome to Reservation Systems !!!
                  </h1>
                  <a class="button is-link is-outlined is-large " @click="onClickModalLogin">Log in</a>
                  <a class="button is-primary is-outlined is-large" @click="onClickModalRegister">Register</a>
              </div>
          </div>
      </section>
      <!-- Register Form -->
      <form id="registerForm" @submit.prevent="validateForm('form-1')" data-vv-scope="form-1" ref="registerForm">
          <input name="_token" type="hidden" :value="crsf_token">
          <div :class="{'modal': true,'is-active': formRegister.modal_register}">
              <div class="modal-background"></div>
              <div :class="modalEffect">
                  <header class="modal-card-head">
                      <p class="modal-card-title">Register</p>
                      <a class="delete" aria-label="close" @click="onClickModalRegister"></a>
                  </header>
                  <section class="modal-card-body pt-20 pr-35 pb-20 pl-25" style="width:105%">
                      <p class="modal-card-title">Authentication</p>
                      <div class="field pt-20">
                          <label class="label">Username</label>
                          <div class="control has-icons-right">
                              <input v-model="formRegister.txtName" v-validate="'required|min:8|unique|customregex'" :class="{'input': true, 'is-danger': errors.has('form-1.username'), 'is-success': warningForm.success_username}"
                                  type="text" placeholder="Username" name="username" value="" @blur="warningForm.success_username = true">
                              <span class="icon is-small is-right" v-show="errors.has('form-1.username')">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </span>
                              <span class="icon is-small is-right" v-show="!errors.has('form-1.username') && warningForm.success_username == true">
                                        <i class="fa fa-check"></i>
                                    </span>
                          </div>
                          <p class="help is-danger" v-show="errors.has('form-1.username')">
                              {{ errors.first('form-1.username') }}
                          </p>
                      </div>
                      <div class="field">
                          <label class="label">Password</label>
                          <div class="control has-icons-right">
                              <input v-model="formRegister.regis_password" v-validate="'required|min:8'" :class="{'input': true, 'is-danger': errors.has('form-1.password'), 'is-success': warningForm.success_password}"
                                  type="password" placeholder="Password" name="password" @blur="warningForm.success_password = true">
                              <span class="icon is-small is-right" v-show="errors.has('form-1.password')">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </span>
                              <span class="icon is-small is-right" v-show="!errors.has('form-1.password') && warningForm.success_password == true">
                                        <i class="fa fa-check"></i>
                                    </span>
                          </div>
                          <p class="help is-danger" v-show="errors.has('form-1.password')">
                              {{ errors.first('form-1.password') }}
                          </p>
                      </div>
                      <div class="field">
                          <label class="label">Confirm-Password</label>
                          <div class="control has-icons-right">
                              <input v-model="formRegister.regis_confirm_password" v-validate="'required|confirmed:password'" :class="{'input': true, 'is-danger': errors.has('form-1.password_confirmation'), 'is-success': warningForm.success_confirmpas}"
                                  type="password" placeholder="Confirm Password" name="password_confirmation" data-vv-as="password"
                                  @blur="warningForm.success_confirmpas = true">
                              <span class="icon is-small is-right" v-show="errors.has('form-1.password_confirmation')">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </span>
                              <span class="icon is-small is-right" v-show="!errors.has('form-1.password_confirmation') && warningForm.success_confirmpas == true">
                                        <i class="fa fa-check"></i>
                                    </span>
                          </div>
                          <p class="help is-danger" v-show="errors.has('form-1.password_confirmation')">
                              {{ errors.first('form-1.password_confirmation') }}
                          </p>
                      </div>
                      <hr>
                      <p class="modal-card-title">Info</p>
                      <div class="columns pt-20">
                          <div class="column">
                              <div class="field">
                                  <label class="label">Name</label>
                                  <div class="control has-icons-right">
                                      <input v-model="formRegister.regis_realname" v-validate="'required'" :class="{'input' : true, 'is-danger': errors.has('form-1.firstname'), 'is-success': warningForm.success_name}"
                                          type="text" placeholder="Realname" name="firstname" @blur="warningForm.success_name = true">
                                      <span class="icon is-small is-right" v-show="errors.has('form-1.firstname')">
                                                <i class="fa fa-exclamation-triangle"></i>
                                            </span>
                                      <span class="icon is-small is-right" v-show="!errors.has('form-1.firstname') && warningForm.success_name == true">
                                                <i class="fa fa-check"></i>
                                            </span>
                                  </div>
                              </div>
                              <p class="help is-danger" v-show="errors.has('form-1.firstname')">
                                  {{ errors.first('form-1.firstname') }}
                              </p>
                          </div>
                          <div class="column">
                              <div class="field">
                                  <label class="label">Lastname</label>
                                  <div class="control has-icons-right">
                                      <input v-model="formRegister.regis_lastname" v-validate="'required'" :class="{'input' : true, 'is-danger': errors.has('form-1.lastname'), 'is-success': warningForm.success_lastname}"
                                          type="text" placeholder="Realname" name="lastname" @blur="warningForm.success_lastname = true">
                                      <span class="icon is-small is-right" v-show="errors.has('form-1.lastname')">
                                                <i class="fa fa-exclamation-triangle"></i>
                                            </span>
                                      <span class="icon is-small is-right" v-show="!errors.has('form-1.lastname') && warningForm.success_lastname == true">
                                                <i class="fa fa-check"></i>
                                            </span>
                                  </div>
                              </div>
                              <p class="help is-danger" v-show="errors.has('form-1.lastname')">
                                  {{ errors.first('form-1.lastname') }}
                              </p>
                          </div>
                      </div>
                      <div class="field">
                          <label class="label">Address</label>
                          <div class="control has-icons-right">
                              <textarea v-model="formRegister.regis_address" v-validate="'required'" :class="{'textarea':true, 'is-danger': errors.has('form-1.address'), 'is-success': warningForm.success_address}"
                                  placeholder="AW 2017 · SS 2017 · AW 2016 · Shops" name="address" value="" @blur="warningForm.success_address = true"></textarea>
                              <span class="icon is-small is-right" v-show="errors.has('form-1.address')">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </span>
                              <span class="icon is-small is-right" v-show="!errors.has('form-1.address') && warningForm.success_address == true">
                                        <i class="fa fa-check"></i>
                                    </span>
                          </div>
                          <p class="help is-danger" v-show="errors.has('form-1.address')">
                              {{ errors.first('form-1.address') }}
                          </p>
                      </div>
                      <div class="field">
                          <label class="label">Telephone</label>
                          <div class="control">
                              <input v-model="formRegister.regis_phoneone" v-validate="'required|numeric|min:3'" :class="{'input': true, 'is-danger': errors.has('form-1.phoneone'), 'is-success': warningForm.success_telephone}"
                                  name="phoneone" maxlength="3" style="width:50px;" @blur="warningForm.success_telephone = true"
                                  @keyup="setFocusPhoneNumberOneInput">
                              <input v-model="formRegister.regis_phonetwo" ref="phonetwo" v-validate="'required|numeric|min:3'" :class="{'input ml-15': true, 'is-danger': errors.has('form-1.phonetwo'), 'is-success': warningForm.success_telephonetwo}"
                                  name="phonetwo" maxlength="3" style="width:50px;" @blur="warningForm.success_telephonetwo = true"
                                  @keyup="setFocusPhoneNumberTwoInput">
                              <input v-model="formRegister.regis_phonethree" ref="phonethree" v-validate="'required|numeric|min:4'" :class="{'input ml-15': true, 'is-danger': errors.has('form-1.phonethree'), 'is-success': warningForm.success_telephonethree}"
                                  name="phonethree" maxlength="4" style="width:70px;" @blur="warningForm.success_telephonethree = true">
                          </div>
                      </div>
                      <div class="field">
                          <label class="label">Birdthday</label>
                          <div class="control has-icons-right">
                              <input v-model="formRegister.regis_bod" v-validate="'required'" :class="{'calendar input':true, 'is-danger': errors.has('form-1.birthday'), 'is-success': warningForm.success_birthday}"
                                  placeholder="Birthday" name="birthday" value="" @blur="warningForm.success_birthday = true">
                              <span class="icon is-small is-right" v-show="errors.has('form-1.birthday')">
                                        <i class="fa fa-exclamation-triangle"></i>
                                    </span>
                              <span class="icon is-small is-right" v-show="!errors.has('form-1.birthday') && warningForm.success_birthday == true">
                                        <i class="fa fa-check"></i>
                                    </span>
                          </div>
                          <p class="help is-danger" v-show="errors.has('form-1.birthday')">
                              {{ errors.first('form-1.birthday') }}
                          </p>
                      </div>
                      <div class="field">
                          <label class="label">E-mail</label>
                          <div class="control has-icons-right">
                              <input v-model="formRegister.email" v-validate="'required|email|unique'" :class="{'input':true, 'is-danger': errors.has('form-1.email'), 'is-success': warningForm.success_email}"
                                  placeholder="example@hotmail.com" name="email" value="" @blur="warningForm.success_email = true">
                              <span class="icon is-small is-right" v-show="errors.has('form-1.email')">
                                            <i class="fa fa-exclamation-triangle"></i>
                                        </span>
                              <span class="icon is-small is-right" v-show="!errors.has('form-1.email') && warningForm.success_email == true">
                                            <i class="fa fa-check"></i>
                                        </span>
                          </div>
                          <p class="help is-danger" v-show="errors.has('form-1.email')">
                              {{ errors.first('form-1.email') }}
                          </p>
                      </div>
                      <div class="field">
                          <label class="label">Department</label>
                          <p class="control has-icons-left">
                              <span class="select is-fullwidth">
                                            <select name="depts" v-model="option_depts" v-on:change="onChangeDepartment">
                                                <option v-for="dept in depts" v-bind:value="dept.dept_id" :key="dept.dept_id">
                                                    {{ dept.dept_name }}
                                                </option>
                                            </select>
                                        </span>
                              <span class="icon is-small is-left">
                                            <i class="fas fa-globe"></i>
                                        </span>
                          </p>
                      </div>
                      <div class="field">
                          <label class="label">Position</label>
                          <p class="control has-icons-left">
                              <span class="select is-fullwidth">
                                            <select name="pos" v-model="option_pos">
                                                <option v-for="pos_data in pos" v-bind:value="pos_data.pos_id" :key="pos_data.pos_id">
                                                    {{ pos_data.pos_name }}
                                                </option>
                                            </select>
                                        </span>
                              <span class="icon is-small is-left">
                                            <i class="fas fa-globe"></i>
                                        </span>
                          </p>
                      </div>
                  </section>
                  <footer class="modal-card-foot" style="justify-content: center">
                      <button :disabled="errors.any('form-1')" :class="{'button is-success' : true , 'is-loading' : formRegister.loadButtonsave}"
                          type="submit">Save changes</button>
                      <input type="reset" class="button" @click="clearAllTextInputAndClearErrorValidate">
                  </footer>
              </div>
          </div>
      </form>
      <form @submit.prevent="validateForm('form-2')" data-vv-scope="form-2">
          <div :class="{'modal': true,'is-active': formLogin.modal_login}">
              <div class="modal-background"></div>
              <div :class="modalEffect">
                  <header class="modal-card-head">
                      <p class="modal-card-title">Log in</p>
                      <a class="delete" aria-label="close" @click="onClickModalLogin"></a>
                  </header>
                  <section class="modal-card-body pt-15 pb-15">
                      <div v-html="formLogin.warning_Login">
  
                      </div>
                      <div class="columns">
                          <div class="column has-border-right" style="position:relative">
                              <div class="field">
                                  <label class="label">Username</label>
                                  <div class="control has-icons-right">
                                      <input v-model="formLogin.login_username" v-validate="'required'" :class="{'input': true, 'is-danger': errors.has('form-2.login_username')}"
                                          type="text" placeholder="Username" name="login_username">
                                      <span class="icon is-small is-right" v-show="errors.has('form-2.login_username')">
                                                    <i class="fa fa-exclamation-triangle"></i>
                                                </span>
                                  </div>
                                  <p class="help is-danger" v-show="errors.has('form-2.login_username')">
                                      {{ errors.first('form-2.login_username') }}
                                  </p>
                              </div>
                              <div class="field">
                                  <label class="label">Password</label>
                                  <div class="control has-icons-right">
                                      <input v-model="formLogin.login_password" v-validate="'required'" :class="{'input': true, 'is-danger': errors.has('form-2.login_password')}"
                                          type="password" placeholder="Password" name="login_password">
                                      <span class="icon is-small is-right" v-show="errors.has('form-2.login_password')">
                                                    <i class="fa fa-exclamation-triangle"></i>
                                                </span>
                                  </div>
                                  <p class="help is-danger" v-show="errors.has('form-2.login_password')">
                                      {{ errors.first('form-2.login_password') }}
                                  </p>
                              </div>
                              <div class="field pt-5">
                                  <input id="switchRoundedSuccess" type="checkbox" name="remember" class="switch is-rounded is-info" v-model="formLogin.remember">
                                  <label for="switchRoundedSuccess">Remember me</label>
                              </div>
                              <div class="field pt-10">
                                  <div class="control has-text-centered">
                                      <button class="button is-success" type="submit">Log in</button>
                                      <button class="button is-danger" type="reset">Forgot Password</button>
                                  </div>
                              </div>
                          </div>
                          <div class="column is-vcentered">
                              <a class="btn-si btn-si-a btn-facebook" href="auth/login/facebook">Sign in with Facebook </a>
                          </div>
                      </div>
                  </section>
              </div>
          </div>
      </form>
  </div>
</template>

<script>
  /** import zone */
  import Header from './header.vue'
  import axios from 'axios'
  
  export default {
    components: {
      'app-header': Header
    },
    data() {
      return {
        crsf_token: '',
        option_depts: null,
        option_pos: null,
        depts: [],
        pos: [],
        selected_value: true,
        formLogin: {
          login_username: '',
          login_password: '',
          modal_login: false,
          warning_Login: '',
          remember: false
        },
        formRegister: {
          txtName: '',
          email: '',
          regis_password: '',
          regis_confirm_password: '',
          regis_realname: '',
          regis_lastname: '',
          regis_address: '',
          regis_phoneone: '',
          regis_phonetwo: '',
          regis_phonethree: '',
          regis_bod: '',
          modal_register: false,
          loadButtonsave: false
        },
        modalEffect: {
          'modal-card': true,
          zoomIn: false,
          zoomOut: false
        },
        warningForm: {
          success_username: false,
          success_password: false,
          success_confirmpas: false,
          success_name: false,
          success_lastname: false,
          success_address: false,
          success_telephone: false,
          success_telephonetwo: false,
          success_telephonethree: false,
          success_birthday: false,
          success_email: false
        },
        clear_error_after_register: false
      }
    },
    watch: {
      'formRegister.txtName': function() {
        this.regexUsername()
        if (this.formRegister.txtName.length >= 8) {
          this.checkUsername('/check-username', this.formRegister.txtName)
        }
      },
      'formRegister.email': function() {
        this.checkUsername('/check-email', this.formRegister.email)
      }
    },
    mounted() {
      this.crsf_token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute('content')
      this.loadDepartmentBusiness()
    },
    methods: {
      loadDepartmentBusiness() {
        axios.post('/get_department_business').then(response => {
          this.depts = response.data.department
          this.option_depts = this.depts[0].dept_id // selected when start
          this.loadPositionBusiness(this.option_depts)
        })
      },
      loadPositionBusiness: function(id) {
        this.pos = [] // clear data before set data
        axios.post('/get_position_business', { sendId: id }).then(response => {
          this.pos = response.data.position
          if (this.pos.length >= 1) {
            this.option_pos = this.pos[0].pos_id // selected when start
          }
        })
      },
      onChangeDepartment() {
        this.loadPositionBusiness(this.option_depts)
      },
      regexUsername() {
        this.$validator.extend('customregex', {
          validate: value => /^[a-z0-9]+$/.test(this.formRegister.txtName),
          getMessage: (field, params, data) => {
            return 'Please input a-z and number only !!!'
          }
        })
      },
      checkUsername: function(urlPost, getValue) {
        const isUnique = () => {
          return axios.post(urlPost, { sendUser: getValue }).then(response => {
            return {
              valid: response.data.status,
              data: {
                message: response.data.msg
              }
            }
          })
        }
        this.$validator.extend('unique', {
          validate: isUnique,
          getMessage: (field, params, data) => {
            return data.message
          }
        })
      },
      saveRegister() {
        this.formRegister.loadButtonsave = true
        axios({
          method: 'post',
          url: '/register-save',
          data: new FormData(this.$refs.registerForm),
          config: {
            headers: {
              'X-CSRF-TOKEN': this.crsf_token
            }
          }
        }).then(response => {
          hotsnackbar('hsdone', response.data.regis_success)
          this.formRegister.modal_register = false
          this.formRegister.loadButtonsave = false
          this.afterRegisterClearText()
          this.clear_error_after_register = true
        })
      },
      checkLogin() {
        if (
          this.formLogin.login_username !== '' &&
          this.formLogin.login_password !== ''
        ) {
          axios
            .post('/login', {
              userName: this.formLogin.login_username,
              userPassword: this.formLogin.login_password,
              remember: this.formLogin.remember
            })
            .then(response => {
              if (response.data.status === false) {
                this.formLogin.warning_Login =
                  "<div class='field has-text-centered mb-10'>" +
                  "<div class='notification' style='background-color:#E0182D;'>" +
                  "<p class='has-text-white'>Username or Password is incorrect.</p>" +
                  '</div>' +
                  '</div>'
              } else {
                this.$localStorage.set('auth', true)
                this.$router.go('/home')
              }
            })
        }
      },
      onClickModalRegister() {
        if (this.formRegister.modal_register === false) {
          if (this.clear_error_after_register) {
            this.errors.clear('form-1') // เพื่อให้เวลาหลังจากสมัครแล้วไม่ให้มี error จาก vee-validate เกิดขึ้น
          }
          this.clear_error_after_register = false
          this.modalEffect.zoomIn = true
          this.modalEffect.zoomOut = false
          this.formRegister.modal_register = !this.formRegister.modal_register
        } else {
          this.modalEffect.zoomOut = true
          this.modalEffect.zoomIn = false
          setTimeout(() => {
            this.formRegister.modal_register = !this.formRegister.modal_register
          }, 200)
        }
      },
      onClickModalLogin() {
        if (this.formLogin.modal_login === false) {
          this.modalEffect.zoomIn = true
          this.modalEffect.zoomOut = false
          this.formLogin.modal_login = !this.formLogin.modal_login
        } else {
          this.modalEffect.zoomOut = true
          this.modalEffect.zoomIn = false
          setTimeout(() => {
            this.formLogin.modal_login = !this.formLogin.modal_login
          }, 200)
        }
      },
      validateForm: function(scope) {
        this.$validator.validateAll(scope).then(result => {
          if (result) {
            if (scope === 'form-1') {
              this.saveRegister()
            } else if (scope === 'form-2') {
              this.checkLogin()
            }
          }
        })
      },
      setFocusPhoneNumberOneInput: function(event) {
        if (event.target.value.length === 3) {
          this.$refs.phonetwo.focus()
        }
      },
      setFocusPhoneNumberTwoInput: function(event) {
        if (event.target.value.length === 3) {
          this.$refs.phonethree.focus()
        }
      },
      clearAllTextInputAndClearErrorValidate() {
        Object.keys(this.warningForm).forEach((key, index) => {
          this.warningForm[key] = false
        })
        Object.keys(this.formRegister).forEach((key, index) => {
          if (typeof this.formRegister[key] === 'string') {
            this.formRegister[key] = ''
          }
        })
        this.$validator.reset('form-1')
      },
      afterRegisterClearText() {
        this.clearAllTextInputAndClearErrorValidate()
        this.option_depts = this.depts[0].dept_id
        this.option_pos = this.pos[0].pos_id
      }
    }
  }
</script>
