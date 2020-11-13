<template>
  <main>
    <div v-if="page" :class="slug">
      <div
        v-for="(section, key) in acfInstances"
        :key="`${section.sectionName}_${key}`"
      >
        <component
          v-if="$options.components[section.sectionName]"
          :is="section.sectionName"
          v-bind="myProps(section)"
          :class="`${section.sectionName}-${key}`"
        ></component>
      </div>
    </div>
  </main>
</template>

<script>
import promoSection from "@/components/sections/PromoSection";
import aboutSection from "@/components/sections/AboutSection";
import linksSection from "@/components/sections/LinksSection";
import productSection from "@/components/sections/ProductSection";
import subscribeSection from "@/components/sections/SubscribeSection";
import benefitsSection from "@/components/sections/BenefitsSection";
import howItWorksSection from "@/components/sections/HowItWorksSection";
import boxLinksSection from "@/components/sections/BoxLinksSection";

export default {
  name: "Page",
  props: {
    slug: {
      type: String,
      required: true,
    },
  },
  components: {
    aboutSection,
    promoSection,
    linksSection,
    productSection,
    subscribeSection,
    benefitsSection,
    howItWorksSection,
    boxLinksSection,
  },
  data() {
    return {
      request: {
        type: "pages",
        slug: this.slug,
        showLoading: true,
      },
    };
  },
  computed: {
    page() {
      return this.$store.getters.singleBySlug(this.request);
    },
    acfInstances() {
      if (this.page) {
        console.log("SECTION REPEATER", this.page.acf.section_repeater);
        return this.page.acf && this.page.acf.section_repeater;
      }
    },
  },
  mounted() {
    console.log("dksadlass", this.$options.components);
  },
  methods: {
    formatComponentName(name) {
      return name.split("_")[0];
    },
    myProps(section) {
      const { sectionName } = section;
      return { ...section[`${sectionName}Props`] };
    },
    getPage() {
      this.$store.dispatch("getSingleBySlug", this.request).then(() => {
        if (this.page) {
          this.$store.dispatch("updateDocTitle", {
            parts: [this.page.title.rendered, this.$store.state.site.name],
          });
        } else {
          this.$router.replace("/404");
        }
      });
    },
  },
  created() {
    this.getPage();
  },
};
</script>
