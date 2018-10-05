<template>
    <div class="emnel-collapse">
        <emnel-collapse-item
                :title="item.title"
                :name="item.name"
                :component="item.component"
                :is-open="item.isOpen"
                :color="item.color"
                :icon="item.icon"
                :data="item.data"
                v-for="(item, key) in components"
                :key="key"
                :collapse="closeAll"
        ></emnel-collapse-item>
    </div>
</template>

<script>
  import Emnel3000CollapseItem from './Emnel3000CollapseItem';
  import { mapGetters, mapState } from 'vuex'

  export default {
    name: "Emnel3000Collapse",
    components: {
      'emnel-collapse-item': Emnel3000CollapseItem
    },
    data() {
      return {
        // collapseItems: []
      };
    },
    computed: {
      ...mapGetters('emnel3000', {
        components: 'sampleComponents'
      })
      // getCollapseItems() {
      //   console.log(this.$store.getters.sampleComponents)
      //   return this.collapseItems = this.$store.getters.sampleComponents
      // }

    },
    methods: {
      closeAll() {
        console.log("emitted")
        Object.keys(this.collapseItems).map((key) => {
          this.collapseItems[key]['isOpen'] = false;
        })
      }
    }
  }
</script>
