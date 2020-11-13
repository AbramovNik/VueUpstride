<template>
  <div class="worksElementsWrapper">
    <div
      class="workElement"
      v-for="(element, index) in worksElements"
      :key="`${element.title}_${index}`"
    >
      <div class="workImage">
        <img :src="element.image" alt="icon" />
      </div>
      <div class="workDescription">
        <div class="title">{{ element.title }}</div>
        <div class="description">
          {{ element.description }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "workElement",
  components: {},
  props: {
    worksElements: {
      type: Array,
      required: true,
    },
  },
  mounted() {},
  data() {
    return {};
  },
  computed: {},
  methods: {},
};
</script>

<style lang="scss" scoped>
.workElement {
  display: flex;
  flex-direction: row;
  align-items: center;
  margin-bottom: 200px;

  &:nth-child(even) {
    flex-direction: row-reverse;
  }

  &:nth-child(odd) {
    .workDescription {
      padding-left: 200px;
    }
  }

  .workImage {
    width: 50%;
    img {
      border-radius: 8px;
      box-shadow: 30px 25px 48px rgba(35, 37, 40, 0.1);
      max-width: 100%;
    }
  }
  .workDescription {
    width: 50%;
    .title {
      font-size: 2.375rem;
      line-height: 1.6;
      font-weight: 500;
      margin-bottom: 30px;
      max-width: 80%;
      color: #090909;
    }
    .description {
      font-size: 1.125rem;
      line-height: 1.7;
      max-width: 60%;
      color: #464646;
    }
  }
}
</style>