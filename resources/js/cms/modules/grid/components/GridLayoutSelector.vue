<template>
  <div class="grid-layout-selector">
    <a href="" @click.prevent="$emit('select', {layout: '1', items: '1'})">
      <layout-1 />
    </a>
    <a href="" @click.prevent="$emit('select', {layout: '1:1', items: '2'})">
      <layout-11 />
    </a>
    <a href="" @click.prevent="$emit('select', {layout: '2:1', items: '3'})">
      <layout-21 />
    </a>
    <a href="" @click.prevent="$emit('select', {layout: '1:2', items: '3'})">
      <layout-12 />
    </a>
  </div>
</template>
<script>
import Layout1 from "@/modules/grid/icons/Layout-1.vue";
import Layout11 from "@/modules/grid/icons/Layout-1-1.vue";
import Layout12 from "@/modules/grid/icons/Layout-2-1.vue";
import Layout21 from "@/modules/grid/icons/Layout-1-2.vue";

export default {
  components: {
    Layout1,
    Layout11,
    Layout12,
    Layout21
  }
}
</script>