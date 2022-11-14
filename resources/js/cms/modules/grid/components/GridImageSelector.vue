<template>
  <div class="grid-image-selector">
    <div>
      <a href="" class="btn-close" @click.prevent="$emit('close')">
        <x-icon size="24"></x-icon>
      </a>
      <h2>Projekttitel</h2>
      <div class="grid-image-selector__images">
        <figure v-for="image in $props.images" :key="image.id">
          <img 
            :src="getSource(image, 'cache')" 
            height="300" 
            width="300" v-if="image"
            @click="$emit('select', image.id)" />
        </figure>
      </div>
    </div>
  </div>
</template>

<script>
import { XIcon } from 'vue-feather-icons';
import ImageUtils from "@/modules/images/mixins/utils";

export default {

  components: {
    XIcon
  },

  mixins: [ImageUtils],

  props: {
    images: {
      type: Array,
      default: null,
    },
  },

}
</script>