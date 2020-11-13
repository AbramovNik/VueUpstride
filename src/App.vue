<template>
  <div id="vue-wordpress-app" @click="handleClicks">
    <div class="container">
      <div class="header-wrapp">
        <div class="site-branding" @click="$router.push('/')">
          <img
            v-if="logo"
            class="logo"
            :src="logo.source_url"
            :alt="logo.alt_text"
          />
          <!-- <span>{{ site.name }}</span> -->
        </div>
        <div class="navMenuWrapper" :class="{ menuOpened: isMenuOpened }">
          <nav-menu class="main-menu" name="main" />
          <nav-menu class="contacts-btn" name="contacts-btn" />
        </div>
        <span
          class="burgerMenu"
          @click="toggleMenu"
          :class="{ menuOpened: isMenuOpened }"
        ></span>
      </div>
    </div>
    <transition name="fade" mode="out-in" @after-leave="updateScroll">
      <router-view :key="$route.path" />
    </transition>
    <transition name="fade">
      <site-loading v-if="loading" />
    </transition>
  </div>
</template>

<script>
import NavMenu from "@/components/template-parts/NavMenu";
import SiteLoading from "@/components/utility/SiteLoading";

export default {
  components: {
    NavMenu,
    SiteLoading,
  },
  data() {
    return {
      site: this.$store.state.site,
      isMenuOpened: false,
    };
  },
  computed: {
    loading() {
      return this.$store.state.site.loading;
    },
    logo() {
      if (this.site.logo) {
        return this.$store.getters.singleById({
          type: "media",
          id: this.site.logo,
        });
      }
    },
  },

  created() {
    console.log(this.$store);
  },
  methods: {
    getLinkEl(el) {
      while (el.parentNode) {
        if (el.tagName === "A") return el;
        el = el.parentNode;
      }
    },
    toggleMenu() {
      this.isMenuOpened = !this.isMenuOpened;
    },
    handleClicks(e) {
      const a = this.getLinkEl(e.target);
      if (a && a.href.includes(this.site.url)) {
        const {
          altKey,
          ctrlKey,
          metaKey,
          shiftKey,
          button,
          defaultPrevented,
        } = e;
        // don't handle if has class 'no-router'
        if (a.className.includes("no-router")) return;
        // don't handle with control keys
        if (metaKey || altKey || ctrlKey || shiftKey) return;
        // don't handle when preventDefault called
        if (defaultPrevented) return;
        // don't handle right clicks
        if (button !== undefined && button !== 0) return;
        // don't handle if `target="_blank"`
        if (a.target && a.target.includes("_blank")) return;
        // don't handle same page links
        let currentURL = new URL(a.href, window.location.href);
        if (currentURL && currentURL.pathname === window.location.pathname) {
          // if same page link has same hash prevent default reload
          if (currentURL.hash === window.location.hash) e.preventDefault();
          return;
        }
        // Prevent default and push to vue-router
        e.preventDefault();
        let path = a.href.replace(this.site.url, "");
        this.$router.push(path);
      }
    },
    updateScroll() {
      window.scroll(0, 0);
    },
  },
};
</script>

<style lang="scss">
.burgerMenu {
  display: none;
  position: relative;
  width: 40px;
  height: 10px;
  z-index: 9999;
  margin-bottom: 20px;

  @media screen and(max-width: 780px) {
    display: block;
  }

  &.menuOpened:after {
    transform: rotate(45deg) translateX(0);
  }
  &.menuOpened:before {
    transform: rotate(135deg) translateX(0);
  }
}

.burgerMenu::after,
.burgerMenu:before {
  content: "";
  width: 100%;
  height: 2px;
  position: absolute;
  background-color: #090909;
  transition: all 0.6s ease-in-out;
  transform: rotate(90deg);
}
.burgerMenu::before {
  left: 0;
  height: 40px;
  width: 2px;
  transform: rotate(90deg) translateX(-5px);
}
.burgerMenu::after {
  left: 0;
  height: 40px;
  width: 2px;
  transform: rotate(90deg) translateX(5px);
}

.navMenuWrapper {
  display: flex;
  transition: all 0.5s ease;
  &.menuOpened {
    display: block;
    opacity: 1;
    visibility: visible;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100vh;
    background-color: #f5f9ff;
  }

  @media screen and (max-width: 780px) {
    opacity: 0;
    visibility: hidden;
    height: 0;
    left: -100%;
    position: absolute;
    transition: left 0.5s ease;
  }
}

#vue-wordpress-app {
  position: relative;
}
.header-wrapp {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding: 18px 0;
  align-items: center;

  // position: relative;

  @media screen and(max-width: 1024px) {
    padding: 10px 20px;
  }
}
.site-branding {
  display: inline-block;
  padding: 1rem 0;
  cursor: pointer;
  position: relative;
  z-index: 999;
}

.logo {
  display: inline-block;
  vertical-align: middle;
  width: auto;
}

.site-branding > span {
  vertical-align: middle;
  font-size: 2.4rem;
  font-weight: bold;
}

.main-menu {
  display: flex;
  flex-flow: row wrap;
  flex-grow: 0.7;
  justify-content: flex-end;
  align-items: center;
}

.main-menu {
  @media screen and (max-width: 780px) {
    display: block;
    width: 100%;
    text-align: center;
    padding-top: 50px;
  }
  > span {
    padding: 0 30px;

    a {
      @media screen and (max-width: 780px) {
        display: block;
        font-size: 24px;
        max-width: 50%;
        margin: 0 auto;
      }
      text-decoration: none;
      color: #090909;
      font-size: 1rem;
      font-weight: 700;
      position: relative;
      &:hover:after {
        content: "";
        position: absolute;
        left: 0%;
        top: 100%;
        width: 100%;
        height: 2px;
        background: linear-gradient(
          269.03deg,
          #4946dc 10.87%,
          #ba65b7 59.64%,
          #dd7152 106.56%
        );
      }
    }
    @media screen and(max-width: 1024px) {
      padding: 0 10px;
    }
  }
}

.contacts-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  z-index: 9999;
  @media screen and (max-width: 780px) {
    display: block;
    width: 50%;
    text-align: center;
    margin: 0 auto;
  }
  a {
    display: block;
    padding: 8px 27px;
    text-decoration: none;
    border: 1px solid #090909;
    color: #090909;
    font-weight: 700;
    @media screen and(max-width: 1024px) {
      padding: 8px 10px;
    }

    @media screen and(max-width: 780px) {
      border: none;
      font-size: 24px;
      padding: 0;
    }
  }
}
/* Vue transition classes
-------------------------------------------- */

.fade-enter-active {
  transition: opacity 0.4s cubic-bezier(0.4, 0, 0, 1);
}

.fade-leave-active {
  transition: opacity 0.2s cubic-bezier(0.4, 0, 0, 1);
}

.fade-enter-to,
.fade-leave {
  opacity: 1;
}

.fade-enter,
.fade-leave-to {
  opacity: 0;
}
</style>
