<template>
<div class="flex justify-start">
  <div>
    <div v-if="$props.layout == '1'">
      <svg width="82" height="40" viewBox="0 0 82 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" stroke="currentColor" stroke-width="2" d="M1 1h80v38H1z"/></svg>
    </div>
    <div v-if="$props.layout == '1:w'">
      <svg width="82" height="40" viewBox="0 0 82 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <rect x="1" y="1" width="80" height="38" fill="white" stroke="white" stroke-width="2"/>
        <rect x="1" y="1" width="80" height="18" fill="white" stroke="currentColor" stroke-width="2"/>
      </svg>
    </div>
    <div v-if="$props.layout == '1:1'">
      <svg width="82" height="40" viewBox="0 0 82 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" stroke="currentColor" stroke-width="2" d="M1 1h38v38H1zM43 1h38v38H43z"/></svg>
    </div>
    <div v-if="$props.layout == '2:1'">
      <svg width="82" height="40" viewBox="0 0 82 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" stroke="currentColor" stroke-width="2" d="M43 1h38v38H43zM1 1h38v17H1zM1 22h38v17H1z"/></svg>
    </div>
    <div v-if="$props.layout == '1:2'">
      <svg width="82" height="40" viewBox="0 0 82 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" stroke="currentColor" stroke-width="2" d="M1 1h38v38H1zM43 1h38v17H43zM43 22h38v17H43z"/></svg>
    </div>
  </div>
    <template v-if="$props.items">
      <div class="ml-6x flex">

      <div v-for="item in $props.items" :key="item.id">
        <img 
          :src="getSource(item.image, 'cache')" 
          height="300" 
          width="300"
          style="height: 50px; width: auto; display: block; margin: 0 4px"
          v-if="item.image">        
      </div>
    </div>

    </template>
</div>
</template>
<script>
import ImageUtils from "@/modules/images/mixins/utils";

export default {

  mixins: [ImageUtils],
  
  props: {
    layout: {
      type: String,
      default: '1'
    },

    items: {
      type: Array,
    }
  },

  mounted() {
  }
}
</script>
