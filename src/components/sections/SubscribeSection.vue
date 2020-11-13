<template>
  <div class="subscribe">
    <div class="container">
      <div class="subscribeWrapp">
        <h3 class="subscribeTitle">{{ title }}</h3>
        <div v-html="subscribeForm" class="formWrapp"></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "subscribeSection",
  components: {},
  computed: {},
  props: {
    title: {
      type: String,
      require: true,
    },
    subscribeForm: {
      type: String,
      require: true,
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
.subscribeWrapp {
  padding: 200px 0 184px 0;
  text-align: center;
  @media screen and (max-width: 1200px) {
    padding: 150px 0 140px 0;
  }

  @media screen and (max-width: 1024px) {
    padding: 90px 0 70px 0;
  }
  .subscribeTitle {
    margin: 0 auto;
    margin-bottom: 80px;
    font-size: 3rem;
    font-weight: 500;
    max-width: 70%;
    text-align: center;
    margin-bottom: 92px;
    @media screen and (max-width: 480px) {
      max-width: 100%;
      font-size: 30px;
      font-weight: 300;
      margin-bottom: 40px;
    }
  }
  .formWrapp {
    & >>> form {
      max-width: 70%;
      margin: 0 auto;
      p {
        display: flex;
        justify-content: center;

        @media screen and (max-width: 768px) {
          flex-direction: column;
        }
      }
    }
    & >>> input[type="email"] {
      border: none;
      border-bottom: 1px solid #090909;
      margin: 0 23px;
      padding: 5px 10px;
      padding-top: 25px;
      font-size: 1rem;
      font-weight: 300;
      height: 60px;
      max-width: 300px;
      letter-spacing: 0.27px;
      font-family: "Manrope";

      @media screen and (max-width: 768px) {
        max-width: 100%;
        width: 100%;
        margin: 0;
        margin-bottom: 40px;
      }
    }
    & >>> input[type="submit"] {
      border: 1px solid #090909;
      background: #ffff;
      padding: 15px 60px;
      font-size: 1.125rem;
      height: 60px;
      font-weight: 300;
      width: 222px;
      letter-spacing: 1px;
      font-family: "Manrope";

      @media screen and (max-width: 768px) {
        max-width: 100%;
        width: 100%;
        font-size: 18px;
      }
    }
  }
}
</style>