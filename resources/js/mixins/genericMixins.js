export const genericMixin = {
  computed: {
    mdAndUp() {
      return this.$vuetify.breakpoint.mdAndUp;
    },

    smAndDown() {
      return this.$vuetify.breakpoint.smAndDown;
    },
  },
};
