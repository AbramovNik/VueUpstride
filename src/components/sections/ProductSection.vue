<template>
  <div class="product">
    <div class="container">
      <div class="productWrapper" :style="sectionBgStyle">
        <h2 class="sectionTitle">{{ title }}</h2>
        <div class="sectionSubtitle">{{ subtitle }}</div>
        <div class="imageWrappMobile">
          <img :src="this.decorationImage" alt="ddecoration" />
        </div>
        <div class="contentItemsWrapp">
          <div
            v-for="(contentItem, key) in contentList"
            :key="key"
            class="contentItem"
          >
            <div class="image">
              <img :src="contentItem.image" alt="icon" />
            </div>
            <div class="title">{{ contentItem.title }}</div>
            <div class="description">{{ contentItem.description }}</div>
          </div>
        </div>

        <div class="btnLinkWrap">
          <a :href="buttonLink.url" class="btnLink">{{ buttonLink.title }}</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "productSection",
  components: {},
  props: {
    title: {
      type: String,
      require: true,
    },
    subtitle: {
      type: String,
      require: true,
    },
    buttonLink: {
      type: Object,
      require: true,
    },
    contentList: {
      type: Array,
      require: true,
    },
    decorationImage: {
      type: String,
      require: true,
    },
  },
  data() {
    return {};
  },
  computed: {
    sectionBgStyle() {
      return { backgroundImage: "url(" + this.decorationImage + ")" };
    },
  },
  methods: {},
};
</script>

<style lang="scss" scoped>
.imageWrappMobile {
  display: none;

  @media screen and (max-width: 768px) {
    display: block;
    opacity: 0.15;
    margin-bottom: 40px;
  }
  img {
    max-width: 300px;
    width: 100%;
    margin: 0 auto;
    display: block;
  }
}
.product {
  color: #090909;
  .productWrapper {
    background-color: #f5f9ff;
    padding: 70px 120px 125px 120px;
    background-position: 96% 0;
    background-repeat: no-repeat;

    @media screen and (max-width: 1200px) {
      background-size: 40%;
    }
    @media screen and (max-width: 768px) {
      padding: 20px 20px 50px 20px;
      background-image: none !important;
    }
  }
  .sectionTitle {
    font-size: 4.375rem;
    font-weight: 200;
    max-width: 45%;
    line-height: 1.366;
    margin-bottom: 41px;

    @media screen and (max-width: 1024px) {
      max-width: 60%;
    }

    @media screen and (max-width: 640px) {
      max-width: 90%;
    }
    @media screen and (max-width: 480px) {
      max-width: 90%;
      font-size: 38px;
    }
  }
  .sectionSubtitle {
    font-size: 2.375rem;
    font-weight: 500;
    max-width: 60%;
    margin-bottom: 61px;
    line-height: 1.6;

    @media screen and (max-width: 640px) {
      max-width: 100%;
      font-size: 26px;
      font-weight: 300;
    }
  }
}
.contentItemsWrapp {
  display: flex;
  justify-content: space-between;
  margin-bottom: 101px;
  flex-wrap: wrap;
}

.contentItem {
  padding: 10px 0;
  max-width: 28%;
  .image {
    margin-bottom: 43px;
  }
  .title {
    font-size: 1.5rem;
    font-weight: 300;
    color: #090909;
    margin-bottom: 20px;
    text-transform: uppercase;
    max-width: 80%;
    line-height: 1.583;
  }
  .description {
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.7;
  }

  @media screen and (max-width: 1024px) {
    max-width: 50%;
    padding: 10px 20px;
  }

  @media screen and (max-width: 768px) {
    max-width: 100%;
    padding: 10px 0;
  }
}

.btnLinkWrap {
  text-align: center;
}
.btnLink {
  display: block;
  margin: 0 auto;
  width: 222px;
  height: 60px;
  border: 1px solid #000;
  color: #000;
  padding: 15px;
  text-decoration: none;
  font-size: 1.125rem;
  line-height: 1.366;

  @media screen and (max-width: 480px) {
    width: 100%;
    font-size: 18px;
  }
}
</style>