<template>
  <div :class="[!$props.item.image ? 'flex items-center justify-center' : '', 'grid-item']">
    <img 
      :src="getSource($props.item.image, 'cache')" 
      height="300" 
      width="300" 
      v-if="$props.item.image">
    <a 
      href="" 
      class="btn-select has-icon" 
      @click.prevent="$emit('showImages', {id: $props.item.id, position: $props.item.position})"
      v-else>
      <plus-icon size="16"></plus-icon>
      <span>Bild</span>
    </a>
  </div>
</template>
<script>
import { PlusIcon } from 'vue-feather-icons';
import ImageUtils from "@/modules/images/mixins/utils";

export default {

  components: {
    PlusIcon
  },

  mixins: [ImageUtils],

  props: {
    item: {
      type: Object,
      default: null
    }
  },

}
</script>
