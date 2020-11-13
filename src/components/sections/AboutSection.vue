<template>
  <div class="about">
    <div class="container">
      <div class="aboutWrapper" :style="sectionBgStyle">
        <div
          class="bgHelper"
          :class="backgroundViewMode"
          :style="sectionCustomStyle"
        ></div>

        <h2 class="aboutTitle">{{ title }}</h2>

        <div class="contentWrapper" :class="direction">
          <div class="customContentWrapp">
            <div
              class="customContent"
              v-html="getHtml(wisywig)"
              v-for="(wisywig, key) in contentList"
              :key="key"
            ></div>
            <a class="buttonLink" v-if="buttonLink" :href="buttonLink.url">{{
              buttonLink.title
            }}</a>
            <accordion
              v-if="isAccordionExist"
              :accordionItems="accordionRepeater"
              :openIndex="accordionDelaultOpenedIndex"
            />
          </div>
          <div class="imageWrapp">
            <img :src="this.decorationImage" alt="decortation" />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
const colorThemeConfig = {
  light: { text: "#000", bg: "#F5F9FF" },
  dark: { text: "#fff", bg: "#000" },
  lightGrey: { text: "#000", bg: "#eee" },
};

import accordion from "@/components/commonComponents/Accordion";
export default {
  name: "aboutSection",
  components: {
    accordion,
  },
  data: function () {
    return {};
  },
  props: {
    title: {
      type: String,
      required: true,
    },
    colorTheme: {
      type: String,
      required: true,
    },
    direction: {
      type: String,
      required: true,
    },
    accordionDelaultOpenedIndex: {
      type: Number,
    },
    backgroundViewMode: {
      type: String,
      required: true,
    },
    decorationImage: {
      type: String,
      required: false,
    },
    contentList: {
      type: Array,
      required: true,
    },
    buttonLink: {
      type: Object,
      default: () => ({}),
    },
    accordionRepeater: {
      type: Array,
      default: () => [],
    },
  },
  data() {
    return {};
  },
  computed: {
    isAccordionExist() {
      return (
        Array.isArray(this.accordionRepeater) && this.accordionRepeater.length
      );
    },
    sectionCustomStyle() {
      return {
        backgroundColor: this.bgColor,
      };
    },
    sectionBgStyle() {
      return {
        color: this.textColor,
      };
    },
    textColor() {
      const value = this.colorTheme || "dark";
      console.log(value);
      return colorThemeConfig[value].text;
    },
    bgColor() {
      const value = this.colorTheme || "dark";
      return colorThemeConfig[value].bg;
    },
  },
  methods: {
    getHtml(w) {
      console.log("=>", w);
      return w.content;
    },
  },
};
</script>

<style lang="scss" scoped>
.about {
  margin-bottom: 200px;
  @media screen and (max-width: 1200px) {
    margin-bottom: 150px;
  }
  @media screen and (max-width: 768px) {
    margin-bottom: 100px;
  }
}
.bgHelper {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  z-index: -1;
  &.limitLeft {
    right: -99999px;
  }
  &.limitRight {
    left: -9999px;
  }
  &.fullWidth {
    left: -9999px;
    right: -9999px;
  }
  &.containerLimit {
  }
}

.container {
  position: relative;
}
.aboutWrapper {
  padding: 130px 0 45px 0;

  @media screen and (max-width: 1200px) {
    padding: 70px 0 45px 0;
  }
}
.contentWrapper {
  display: flex;
  padding-left: 120px;
  flex-direction: row;

  @media screen and (max-width: 1024px) {
    padding-left: 80px;
  }

  @media screen and (max-width: 768px) {
    padding-left: 20px;
    flex-direction: column;
  }
  .imageWrapp,
  .customContentWrapp {
    flex: 0 0 50%;

    @media screen and (max-width: 1024px) {
      flex: auto;
    }
    @media screen and (max-width: 640px) {
      margin-bottom: 40px;
    }
  }
  .customContentWrapp {
    padding-right: 90px;
    padding-bottom: 20px;

    @media screen and (max-width: 768px) {
      padding-right: 20px;
    }
  }
}

.customContentWrapp .accordion {
  margin-top: 50px;
  margin-bottom: 80px;
}
.imageWrapp img {
  width: 100%;
  display: block;
}
.about {
  overflow: hidden;
  position: relative;
  & >>> .customContent {
    h4 {
      font-size: 2.375rem;
      margin: 0;
      font-weight: 400;
      margin-bottom: 20px;
      line-height: 1.6;
      letter-spacing: 0.2px;

      @media screen and (max-width: 480px) {
        font-size: 26px;
        font-weight: 300;
      }
    }
    div {
      font-size: 1.375rem;
      font-weight: 300;
      margin-bottom: 73px;
      line-height: 1.6;

      @media screen and (max-width: 480px) {
        font-size: 18px;
        font-weight: 300;
        margin-bottom: 60;
      }
    }
  }
}

.customContent >>> h5 {
  font-size: 1.75rem;
  line-height: 2.18;
  margin: 42px 0 35px 0;

  @media screen and (max-width: 1200px) {
    margin: 20px 0 20px 0;
  }

  @media screen and (max-width: 480px) {
    font-size: 20px;
    font-weight: 300;
  }
}
.customContent >>> h6 {
  font-size: 1.5rem;
}

.customContent >>> li {
  position: relative;
  padding-left: 20px;
  margin-bottom: 23px;
  font-size: 1rem;
  line-height: 1.7;

  @media screen and (max-width: 480px) {
    font-size: 16px;
    font-weight: 300;
  }
  &:last-of-type {
    margin-bottom: 78px;
  }
  &:before {
    content: "";
    position: absolute;
    left: 0;
    top: 8px;
    width: 3px;
    height: 20px;
    background: linear-gradient(
      180deg,
      #4946dc 0%,
      #ba65b7 50.97%,
      #dd7152 100%
    );
  }
}

.contentWrapper.reverse {
  flex-direction: row-reverse;
  padding-left: 0;
  padding-right: 15px;

  @media screen and (max-width: 768px) {
    flex-direction: column-reverse;
  }

  .customContentWrapp {
    padding-left: 180px;
    padding-right: 50px;
  }
}

.aboutTitle {
  font-size: 4.375rem;
  font-weight: 300;
  margin: 0;
  padding-left: 120px;
  margin-bottom: 69px;
  max-width: 55%;
  line-height: 1.366;

  @media screen and (max-width: 1024px) {
    min-width: 60%;
    padding-left: 80px;
  }

  @media screen and (max-width: 768px) {
    padding-left: 20px;
  }

  @media screen and (max-width: 480px) {
    font-size: 38px;
    max-width: 80%;
  }
}
.buttonLink {
  display: inline-block;
  vertical-align: top;
  border: 1px solid currentColor;
  text-decoration: none;
  color: inherit;
  font-size: 1.125rem;
  padding: 15px 63px;
  margin-bottom: 80px;

  @media screen and (max-width: 1200px) {
    margin-bottom: 20px;
  }
  @media screen and (max-width: 480px) {
    width: 100%;
    text-align: center;
    font-size: 18px;
    font-weight: 500;
  }
}

// Hardcode styles for sections

.aboutSection-2 {
  padding: 0 15px;

  @media screen and (max-width: 768px) {
    padding: 0;
  }
  .imageWrapp {
    @media screen and (max-width: 768px) {
      display: none;
    }
    img {
      max-width: 600px;
      margin-top: -200px;
      margin-left: auto;
    }
  }

  .aboutTitle {
    @media screen and (max-width: 640px) {
      max-width: 100%;
    }
  }
}

.aboutSection-3 {
  @media screen and (max-width: 1500px) {
    padding-left: 50px;
  }
  @media screen and (max-width: 768px) {
    padding-left: 0;
  }
  .aboutWrapper {
    padding-top: 120px;
  }
  .contentWrapper.reverse .customContentWrapp {
    padding-left: 148px;

    @media screen and (max-width: 1200px) {
      padding-left: 100px;
    }

    @media screen and (max-width: 1024px) {
      padding-left: 50px;
    }

    @media screen and (max-width: 640px) {
      padding-left: 20px;
      padding-right: 20px;
    }
  }
  .customContentWrapp {
    margin-top: -108px;
    @media screen and (max-width: 1024px) {
      margin-top: 0;
    }
  }
  .imageWrapp img {
    max-width: 700px;
  }
  .contentWrapper.reverse img {
    margin-left: -30px;
    @media screen and (max-width: 768px) {
      margin: 0 auto;
      max-width: 250px;
    }
  }
}

.aboutSection-4 {
  .imageWrapp img {
    max-width: 720px;
    width: 120%;
    margin-top: -230px;
    margin-left: -40px;

    @media screen and (max-width: 768px) {
      max-width: 250px;
      width: 100%;
      margin: 0 auto;
    }
  }
}
</style>