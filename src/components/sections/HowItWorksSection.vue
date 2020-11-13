<template>
  <div class="howItWorks">
    <div class="container">
      <h2 class="sectionTitle">{{ title }}</h2>
      <worksElements :worksElements="worksElements" />
    </div>
  </div>
</template>

<script>
import worksElements from "@/components/commonComponents/WorksElements";
export default {
  name: "howItWorksSection",
  components: {
    worksElements,
  },
  computed: {},
  props: {
    title: {
      type: String,
      required: true,
    },
    worksElements: {
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
.howItWorks {
  background: #F5F9FF;
  padding: 220px 15px 200px;
}
.sectionTitle {
  font-size: 4.375rem;
  margin-bottom: 130px;
  text-align: center;
}
</style>