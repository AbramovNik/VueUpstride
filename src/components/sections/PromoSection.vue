<template>
  <div class="promo">
    <div class="container">
      <div class="promoWrapper" :style="sectionBgStyle">
        <div class="textHolder">
          <!-- v-for  createWordsList(title) => {{word}} -->
          <h1 class="promoTitle" v-html="title">
            <!-- {{ getFirstWord(title) }}
            <span class="boldWeight">{{ getLastWord(title) }}</span> -->
          </h1>
          <div class="promoSubtitle">{{ subtitle }}</div>

          <a v-if="buttonLink" :href="buttonLink.url" class="btnLink">{{
            buttonLink.title
          }}</a>
        </div>
        <div class="imageWrapp">
          <img :src="this.decorationImage" alt="banner" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "promoSection",
  components: {},
  computed: {},
  props: {
    title: {
      type: String,
      required: true,
    },
    buttonLink: {
      type: String,
      required: true,
    },
    decorationImage: {
      type: String,
      required: false,
    },
    subtitle: {
      type: String,
      required: true,
    },
  },
  data() {
    return {};
  },
  computed: {
    // sectionBgStyle() {
    //   return { backgroundImage: "url(" + this.decorationImage + ")" };
    // },
  },
  methods: {
    getFirstWord(title) {
      if (!title) {
        return "";
      }
      return title.substring(0, title.lastIndexOf(" "));
    },
    getLastWord(title) {
      title = title.split(" ");
      if (!title) {
        return "";
      }
      return title[title.length - 1];
    },
  },
};
</script>

<style lang="scss" scoped>
.promoWrapper {
  // background-position: 100% 0%;
  // background-repeat: no-repeat;
  min-height: 650px;
  display: flex;

  @media screen and(max-width: 1024px) {
    padding: 0 25px 0 25px;
  }

  @media screen and (max-width: 780px) {
    flex-direction: column;
    padding-top: 40px;
  }
}

.boldWeight {
  font-weight: 400;
}
.imageWrapp img {
  width: 100%;
  height: 100%;
  object-fit: contain;

  @media screen and (max-width: 768px) {
    width: 100%;
    height: 100%;
    max-height: 280px;
    max-width: 400px;
  }
}
.textHolder {
  padding-top: 148px;

  @media screen and (max-width: 1024px) {
    margin-bottom: 0;
    padding-top: 60px;
  }

  @media screen and (max-width: 768px) {
    padding-top: 0;
  }
}
.promoTitle {
  font-size: 5rem;
  color: #090909;
  margin: 0;
  font-weight: 200;
  max-width: 70%;
  text-transform: uppercase;
  line-height: 1.37;
  margin-bottom: 29px;

  & >>> b {
    font-weight: 400;
  }

  @media screen and (max-width: 1024px) {
    max-width: 70%;
    margin-bottom: 50px;
  }

  @media screen and (max-width: 780px) {
    max-width: 70%;
  }

  @media screen and (max-width: 480px) {
    max-width: 80%;
    font-size: 40px;
  }
}

.btnLink {
  display: inline-block;
  vertical-align: top;
  border: 1px solid currentColor;
  text-decoration: none;
  color: inherit;
  font-size: 1.125rem;
  padding: 15px 63px;
  margin-bottom: 80px;
}

.promoSubtitle {
  font-size: 1.375rem;
  color: #090909;
  max-width: 65%;
  font-weight: 400;
  line-height: 1.6;
  margin-bottom: 40px;

  @media screen and(max-width: 780px) {
    max-width: 70%;
  }

  @media screen and(max-width: 480px) {
    max-width: 90%;
    font-size: 18px;
    margin-bottom: 60px;
  }
}

.promoSection-0 {
  padding: 0 15px;
}
</style>