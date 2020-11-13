<template>
  <div class="container">
    <div class="linksWrapper">
      <div class="leftLink">
        <div class="linkTitle">{{ leftLinkTitle }}</div>
        <a :href="leftLinkText.url">{{ leftLinkText.title }}</a>
        <IconArrow class="icon-arrow" />
      </div>
      <div class="rightLink">
        <div class="linkTitle">{{ rightLinkTitle }}</div>
        <a :href="rightLinkText.url">{{ rightLinkText.title }}</a>
        <IconArrow class="icon-arrow" />
      </div>
    </div>
  </div>
</template>

<script>
import IconArrow from "@/assets/img/icon_arrow.svg";
export default {
  name: "linksSection",
  components: {
    IconArrow,
  },
  props: {
    leftLinkTitle: {
      type: String,
      required: true,
    },
    leftLinkText: {
      type: Object,
      required: true,
    },
    rightLinkTitle: {
      type: String,
      required: true,
    },
    rightLinkText: {
      type: Object,
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

<style lang="scss" >
.container.linksSection-1 {
  padding: 0 15px;
  max-width: 1430px;

  @media screen and (max-width: 768px) {
    padding: 0;
    max-width: 1400px;
  }
}
.leftLink {
  background-color: #000;
  color: #fff;
}
.rightLink {
  background-color: #f5f9ff;
  color: #000;
}
.linksWrapper {
  margin-bottom: 199px;
  display: flex;

  @media screen and (max-width: 1200px) {
    margin-bottom: 150px;
  }

  @media screen and (max-width: 780px) {
    flex-direction: column;
  }

  @media screen and (max-width: 480px) {
    margin-bottom: 100px;
  }
  > div {
    flex: 0 1 50%;
    padding: 37px 80px;

    @media screen and (max-width: 780px) {
      flex: 0 0 100%;
      padding: 20px 50px;
    }
    @media screen and (max-width: 480px) {
      padding: 20px;
    }
  }
  .linkTitle {
    font-size: 1.5rem;
    margin-bottom: 20px;
    font-weight: 500;

    @media screen and (max-width: 480px) {
      font-size: 20px;
      font-weight: 300;
    }
  }
  a {
    font-size: 1.375rem;
    text-decoration: none;
    font-weight: 300;
  }
  .icon-arrow {
    display: inline-block;
    vertical-align: text-bottom;
    margin-left: 20px;
  }
  .leftLink {
    color: #fff;

    a {
      color: #fff;
    }
    .icon-arrow {
      fill: #fff;
    }
  }
  .rightLink {
    color: #000;
    a {
      color: #000;
    }
    .icon-arrow {
      fill: #000;
    }
  }
}
</style>