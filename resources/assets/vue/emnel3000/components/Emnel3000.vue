<template>
    <div class="emnel3000-container">
        <emnel-collapse></emnel-collapse>
    </div>
</template>
<script>
  import Emnel3000Collapse from './Emnel3000Collapse';
  import '../styles/emnel3000.scss';
  export default {
    name: 'Emnel3000',
    components: {
      'emnel-collapse': Emnel3000Collapse
    }
  }
</script>

<style lang="scss" scoped>
</style>
