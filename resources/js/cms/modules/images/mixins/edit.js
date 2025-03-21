export default {

  data() {
    return {
      hasOverlayEdit: false,

      overlayItem: {
        name: '',
        caption_de: null,
        caption_en: null
      },

      defaults: {
        item: {
          name: '',
          caption_de: null,
          caption_en: null
        }
      }
    }
  },

  mounted() {
    window.addEventListener("keyup", event => {
      if (event.which === 27) {
        this.hideEdit();
      }
    });
  },

  methods: {
    toggle(image, $event) {
      this.$parent.toggleImage(image, $event);
    },

    togglePreviewState(image, $event) {
      this.$parent.togglePreviewState(image, $event);
    },

    destroy(image, $event) {
      this.$parent.destroyImage(image, $event);
    },

    update(image, $event) {
      this.$parent.updateImage(this.overlayItem, $event);
      this.hideEdit();
    },

    showEdit(image, $event) {
      this.hasOverlayEdit = true;
      this.overlayItem = { ...image }; 
    },

    hideEdit() {
      this.hasOverlayEdit = false;
      this.overlayItem = { ...this.defaults.item }; 
    },
  }
};