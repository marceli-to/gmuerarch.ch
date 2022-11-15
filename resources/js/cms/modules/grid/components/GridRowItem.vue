<template>
  <div :class="[!$props.item.image ? 'flex items-center justify-center' : '', 'grid-item']">
    <template v-if="$props.item.image">
      <img :src="getSource($props.item.image, 'cache')" height="300" width="300">
      <a 
        href="" 
        class="btn-delete has-icon"
        @click.prevent="$emit('resetItem', $props.item.id)">
        <trash-2-icon size="16"></trash-2-icon>
        <span>Bild löschen</span>
      </a>
    </template>
    <template v-else>
      <a 
        href="" 
        class="btn-select has-icon" 
        @click.prevent="$emit('showImages', {id: $props.item.id, position: $props.item.position})">
        <plus-icon size="16"></plus-icon>
        <span>Bild hinzufügen</span>
      </a>
    </template>
  </div>
</template>
<script>
import { PlusIcon, Trash2Icon } from 'vue-feather-icons';
import ImageUtils from "@/modules/images/mixins/utils";

export default {

  components: {
    PlusIcon,
    Trash2Icon
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
