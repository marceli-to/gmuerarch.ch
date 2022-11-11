<template>
  <div class="grid-item">
    <img :src="getSource(image, 'cache')" height="300" width="300" v-if="$props.image">
  </div>
</template>
<script>
import ImageUtils from "@/modules/images/mixins/utils";

export default {

  mixins: [ImageUtils],

  props: {
    image: {
      type: Object,
      default: null
    }
  },
}
</script>
