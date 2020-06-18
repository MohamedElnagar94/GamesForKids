<template>
  <div class="menu scroller" :class="[`px-${pad}`]">
    <div class="h-full" :class="[`py-${pad}`]">
      <p class="text-center text-4xl select-none opacity-25 mt-12">Menu in progress</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ['padding'],
  data () {
    return {
      pad: this.padding || 0
    }
  }
}
</script>

<style scoped>
.menu-container {
  background: #444446;
}
.menu-bar {
  background: #2a2c31;
}
.menu {
  background: #36393f;
}
</style>
