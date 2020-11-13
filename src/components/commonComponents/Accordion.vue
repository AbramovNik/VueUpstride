<template>
  <ul class="accordion">
    <li
      class="accordionElement"
      v-for="(item, index) in accordionItems"
      :key="`${item.accordionHeader}_${index}`"
    >
      <div class="accordionHeader">
        <strong class="accordionHeaderTitle">{{ item.accordionHeader }}</strong>
        <!-- <span
          class="toogleIcon"
          @click="toggleAccordionContent(index)"
        ></span> -->
        <span @click="toggleAccordionContent(index)" class="toogleIcon">
          {{ componentOpenIndex === index ? "-" : "+" }}
        </span>
      </div>

      <div
        class="accordionContent"
        v-if="componentOpenIndex === index"
        v-html="item.accordionContent"
      >
        {{ item.accordionContent }}
      </div>
    </li>
  </ul>
</template>

<script>
export default {
  name: "accordion",
  components: {},
  computed: {},
  props: {
    accordionItems: {
      type: Array,
      required: true,
      default: () => [],
    },
    openIndex: {
      type: Number,
      default: null,
    },
  },
  mounted() {
    this.componentOpenIndex = +this.openIndex - 1;
  },
  data() {
    return {
      componentOpenIndex: null,
    };
  },
  computed: {},
  methods: {
    toggleAccordionContent(index) {
      if (index === this.componentOpenIndex) {
        console.log(index, this.componentOpenIndex);
        this.componentOpenIndex = null;
        return;
      }
      this.componentOpenIndex = index;
    },
  },
};
</script>

<style lang="scss" scoped>
.accordionHeader {
  padding-right: 31px;
  display: flex;
  justify-content: space-between;
  align-items: baseline;
}
.accordionElement {
  padding: 20px 0;
  border-top: 1px solid #fff;
  border-bottom: 1px solid #fff;
}

.accordionHeaderTitle {
  color: #fff;
  font-size: 1.5rem;
  line-height: 40.8px;

  @media screen and (max-width: 480px) {
    font-size: 20px;
    font-weight: 300;
    max-width: 80%;
  }
}
.accordionContent {
  font-size: 1.125rem;
  color: #fff;
  margin-top: 38px;
  padding: 0 55px 35px 45px;
  line-height: 30.6px;

  & >>> br {
    content: "" !important;
    display: block !important;
    margin-bottom: 21px !important;
  }
}
.toogleIcon {
  position: relative;
  font-size: 37px;
  cursor: pointer;
}

.toogleIconOpen.toogleIcon:after {
  display: none;
}
</style>