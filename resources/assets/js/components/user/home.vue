<template>
  <div id="app">
    <nav class="navbar is-primary has-shadow">
      <app-header></app-header>
    </nav>
    <div class="container is-fullhd">
      <div class="notification has-text-centered" style='margin-bottom:0;'>
        You have not booked yet. <a class="button is-small is-primary" href="#">Reserve Now</a>
      </div>
      <div class="carousel carousel-animate-fade carousel-animated" data-autoplay="true">
        <div class="carousel-container" style="height: 500.608px;">
          <div class="carousel-item has-background is-active">
            <a href="#" ondragstart="return false;" ondrop="return false;">
              <img class="is-background" src="https://wikiki.github.io/images/merry-christmas.jpg" alt="" width="640" height="310" draggable="false">
            </a>
            <div class="title">Reservation System</div>
          </div>
          <div class="carousel-item has-background">
            <a href="#" ondragstart="return false;" ondrop="return false;">
              <img class="is-background" src="https://wikiki.github.io/images/singer.jpg" alt="" width="640" height="310" draggable="false">
            <div class="title">Reservation System</div>
            </a>
          </div>
          <div class="carousel-item has-background">
            <a href="#" ondragstart="return false;" ondrop="return false;">
              <img class="is-background" src="https://wikiki.github.io/images/sushi.jpg" alt="" width="640" height="310" draggable="false">
            <div class="title">Reservation System</div>
            </a>
          </div>
          <div class="carousel-item has-background">
            <a href="#" ondragstart="return false;" ondrop="return false;">
              <img class="is-background" src="https://wikiki.github.io/images/life.jpg" alt="" width="640" height="310" draggable="false">
            <div class="title">Reservation System</div>
            </a>
          </div>
        </div>
        <div class="carousel-navigation">
          <div class="carousel-nav-left">
            <i class="fa fa-chevron-left" aria-hidden="true"></i>
          </div>
          <div class="carousel-nav-right">
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
          </div>
        </div>
      </div>
      <!-- close carousel !-->
      <div class="container">
        <div class="columns pt-30">
          <div class="column is-8">
            <div class="tabs is-centered is-boxed" id="tabs">
              <ul>
                <li class="is-active" data-tab="1"><a>News</a></li>
                <li data-tab="2"><a>Informations</a></li>
                <li data-tab="3"><a>Service</a></li>
                <li data-tab="4"><a>Procurment</a></li>
              </ul>
            </div>
            <div id="tab-content" class="pl-10 pt-15 pb-10">
              <div class="columns header-columns is-active card has-background-white-bis pt-15 pb-15" data-content="1">
                  <div class="column is-2 has-text-centered">
                    <div class="is-size-6">
                      Day
                    </div>
                    <div class="is-size-6">
                      25
                    </div>
                    <div class="is-size-7 has-text-primary">
                      2 Topics on this day.
                    </div>
                  </div>
                  <div class="column">
                    <article class="media">
                      <div class="media-left">
                        <figure class="image is-64x64">
                          <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                        </figure>
                      </div>
                      <div class="media-content">
                        <div class="content">
                          <p>
                            <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                            <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla
                            egestas. Nullam condimentum luctus turpis.
                          </p>
                        </div>
                        <nav class="level is-mobile">
                          <div class="level-left">
                            <a class="level-item" aria-label="reply">
                                <span class="icon is-small">
                                  <i class="fas fa-reply" aria-hidden="true"></i>
                                </span>
                              </a>
                            <a class="level-item" aria-label="retweet">
                                <span class="icon is-small">
                                  <i class="fas fa-retweet" aria-hidden="true"></i>
                                </span>
                              </a>
                            <a class="level-item" aria-label="like">
                                <span class="icon is-small">
                                  <i class="fas fa-heart" aria-hidden="true"></i>
                                </span>
                              </a>
                          </div>
                        </nav>
                      </div>
                    </article>
                  </div>
              </div>
              <div class="columns header-columns" data-content="2">
                <article class="media">
                  <div class="media-left">
                    <figure class="image is-64x64">
                      <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                    </figure>
                  </div>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                        <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla
                        egestas. Nullam condimentum luctus turpis.
                      </p>
                    </div>
                    <nav class="level is-mobile">
                      <div class="level-left">
                        <a class="level-item" aria-label="reply">
                      <span class="icon is-small">
                        <i class="fas fa-reply" aria-hidden="true"></i>
                      </span>
                    </a>
                        <a class="level-item" aria-label="retweet">
                      <span class="icon is-small">
                        <i class="fas fa-retweet" aria-hidden="true"></i>
                      </span>
                    </a>
                        <a class="level-item" aria-label="like">
                      <span class="icon is-small">
                        <i class="fas fa-heart" aria-hidden="true"></i>
                      </span>
                    </a>
                      </div>
                    </nav>
                  </div>
                </article>
              </div>
              <div class="columns header-columns" data-content="3">
                <article class="media">
                  <div class="media-left">
                    <figure class="image is-64x64">
                      <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                    </figure>
                  </div>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                        <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla
                        egestas. Nullam condimentum luctus turpis.
                      </p>
                    </div>
                    <nav class="level is-mobile">
                      <div class="level-left">
                        <a class="level-item" aria-label="reply">
                      <span class="icon is-small">
                        <i class="fas fa-reply" aria-hidden="true"></i>
                      </span>
                    </a>
                        <a class="level-item" aria-label="retweet">
                      <span class="icon is-small">
                        <i class="fas fa-retweet" aria-hidden="true"></i>
                      </span>
                    </a>
                        <a class="level-item" aria-label="like">
                      <span class="icon is-small">
                        <i class="fas fa-heart" aria-hidden="true"></i>
                      </span>
                    </a>
                      </div>
                    </nav>
                  </div>
                </article>
              </div>
              <div class="columns header-columns" data-content="4" style='padding-bottom:24px;'>
                <article class="media">
                  <div class="media-left">
                    <figure class="image is-64x64">
                      <img src="https://bulma.io/images/placeholders/128x128.png" alt="Image">
                    </figure>
                  </div>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>John Smith</strong> <small>@johnsmith</small> <small>31m</small>
                        <br> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean efficitur sit amet massa fringilla
                        egestas. Nullam condimentum luctus turpis.
                      </p>
                    </div>
                    <nav class="level is-mobile">
                      <div class="level-left">
                        <a class="level-item" aria-label="reply">
                      <span class="icon is-small">
                        <i class="fas fa-reply" aria-hidden="true"></i>
                      </span>
                    </a>
                        <a class="level-item" aria-label="retweet">
                      <span class="icon is-small">
                        <i class="fas fa-retweet" aria-hidden="true"></i>
                      </span>
                    </a>
                        <a class="level-item" aria-label="like">
                      <span class="icon is-small">
                        <i class="fas fa-heart" aria-hidden="true"></i>
                      </span>
                    </a>
                      </div>
                    </nav>
                  </div>
                </article>
              </div>
            </div>
          </div>
          <!-- close column one !-->
          <div class="column"></div>
          <div class="column is-3 has-text-centered box">
            Auto
          </div>
        </div>
      </div>
      <!-- close information !-->
    </div>
    <!-- close container !-->
  </div>
</template>
<script>
  import Header from './header.vue'
  export default {
    components: {
      'app-header': Header
    },
    data() {
      return {
        title: 'hello world'
      }
    },
    created() {
      this.$localStorage.set('auth', true)
    }
  }
</script>
