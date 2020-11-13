<template>
  <div class="boxLinks">
    <div class="container">
      <div class="boxLinksWrapper">
        <div
          class="boxLink"
          v-for="(el, index) in boxLinks"
          :key="`${el.link.title}_${index}`"
        >
          <a class="linkBox" :href="el.link.url" :style="getBGStyles(el)">
            <div
              class="linkTitle"
              :style="{ color: invertColor(getBGStyles(el).backgroundColor) }"
            >
              {{ el.link.title }}
            </div>
            <div class="iconArrow"><IconArrow /></div>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import invertColor from "@/utils/inverseColor";
import IconArrow from "@/assets/img/icon_arrow.svg";
export default {
  name: "boxLinksSection",
  components: {
    IconArrow,
  },
  props: {
    boxLinks: {
      type: Array,
      default: () => [{}],
    },
  },
  mounted() {},

  data() {
    return {};
  },

  methods: {
    getBGStyles(el) {
      const { decorationImage = "", backgroundColor = "#fff" } = el;
      return {
        backgroundImage: "url(" + decorationImage + ")",
        backgroundColor,
      };
    },
  },
};
</script>

<style lang="scss" scoped>
.boxLinks {
  padding: 200px 0;
}
.boxLink {
  width: 30%;
}
.boxLinksWrapper {
  display: flex;
  justify-content: space-between;
}
.linkBox {
  display: block;
  min-height: 450px;
  padding: 50px 45px 10px 45px;
  font-size: 2.375rem;
  line-height: 1.6;
  text-decoration: none;
  background-size: cover;
}
</style>