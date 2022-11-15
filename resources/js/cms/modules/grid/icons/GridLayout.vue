<template>
  <div>
    <div v-if="$props.layout == '1'">
      <svg width="82" height="40" viewBox="0 0 82 40" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" stroke="currentColor" stroke-width="2" d="M1 1h80v38H1z"/></svg>
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
</template>
<script>
export default {
  props: {
    layout: {
      type: String,
      default: '1'
    }
  },

  mounted() {
    console.log(this.$props);
  }
}
</script>
