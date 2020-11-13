<template>
  <div class="benefits">
    <div class="container">
      <div class="benefitsWrapper">
        <h2 class="sectionTitle">{{ title }}</h2>
        <div class="benefitsElementsWrapper">
          <div
            v-for="(element, index) in benefitsElements"
            :key="`${element.title}_${index}`"
            class="benefitElement"
          >
            <div class="image">
              <img :src="element.image" alt="icon" />
            </div>
            <div class="title">{{ element.title }}</div>
            <div class="description">{{ element.description }}</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "benefitsSection",
  components: {},
  computed: {},
  props: {
    title: {
      type: String,
      required: true,
    },
    benefitsElements: {
      type: Array,
      required: true,
    },
  },

  data() {
    return {};
  },
  computed: {},
  methods: {},
};
</script>

<style lang="scss" scoped>
.benefits {
  padding: 0 15px;
  padding-top: 130px;
}
.sectionTitle {
  margin: 0;
  margin-bottom: 72px;
  font-size: 4.375rem;
}
.benefitsElementsWrapper {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  margin-bottom: 200px;

  .benefitElement {
    border: 2px solid #464646;
    padding: 75px 40px 90px 40px;
    max-width: 31.5%;

    @media screen and (max-width: 1200px) {
      padding: 75px 40px 50px 40px;
    }

    .image {
      margin-bottom: 43px;
    }
    .title {
      font-size: 1.5rem;
      font-weight: 300;
      color: #090909;
      margin-bottom: 20px;
      text-transform: uppercase;
      max-width: 70%;
      line-height: 1.583;
      @media screen and (max-width: 1200px) {
        max-width: 85%;
      }
    }
    .description {
      font-size: 1rem;
      font-weight: 400;
      line-height: 1.7;
    }
  }
}
</style>