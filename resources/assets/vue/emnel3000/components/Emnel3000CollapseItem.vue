<template>
    <div class="emnel-collapse-item">
        <div class="emnel-collapse-item-header" v-bind:class="bgColorClass, colorClass">
            <div class="clearfix">
                <div class="col-xs-1">
                    <div class="padding-top-20 padding-bottom-20 padding-left-10">
                      <div class="offset-top-10">
                      <span>  
                        <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" value="value1">
                        <label for="styled-checkbox-1">&nbsp;</label>
                      </span>
                        <a href="#" class="component-icon">
                            <i class="fa  fa-lg white" :class="getIcon"></i>
                        </a>
                      </div>
                    </div>
                </div>
                <div class="col-xs-4">
                  <div class="padding-top-20 padding-bottom-20">
                    <span class="component-name">
                        {{ componentTitle }}
                    </span>
                    <span class="component-sub">
                        Message Sub Title - User Name
                    </span>
                  </div>  
                </div>
                <div class="col-xs-5">                 
                    <div class="padding-top-20 padding-bottom-20">
                      <span class="has-run-item">Has run <strong>230815 times</strong></span>
                      <span class="has-run-item">Has run <strong>230815 times</strong></span>
                    </div>
                </div>
                <div class="col-xs-1 text-right">
                    <div class="padding-top-20 padding-bottom-20 toggle-delete">
                      <a href="javascript:void(0)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </div>  
                </div>
                <div class="col-xs-1 text-center">
                    <div class="action padding-top-20 padding-bottom-20 toggle-arrow">
                        <a href="javascript:void(0)" v-on:click.prevent="toggleOpenComponents"><i v-on:click.prevent="toggleOpenComponents" v-bind:class="[isOpen ? 'fa fa-angle-down' : 'fa fa-angle-right']"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="body" v-if="isOpenBody" >
            <component :is="component"></component>
        </div>
    </div>
</template>

<script>
  import AddTo from './AddTo';
  import ConditionAction from './ConditionAction';
  import Email from './Email';
  import Sms from './Sms';
  import End from './End';
  import Flow from './Flow';
  import Move from './Move';
  import Page from './Page';
  import Skip from './Skip';
  import Tag from './Tag';
  import UpdateContact from './UpdateContact';
  import Wait from './Wait';
  import { mapGetters, mapState, mapActions } from 'vuex';

  export default {
    name: "Emnel3000CollapseItem",
    props: {
      title: {
        type: String,
      },
      name: {
        type: String,
      },
      component: {
        type: String,
        required: true
      },
      isOpen: {
        type: Boolean,
        default: false
      },
      color: {
        type: String,
        required: true
      },
      icon: {
        type: Object,
        required: true,
        default: function () {
          return { value: 'hello' }
        }
      },
      data: {
        type: Object,
        
      }
    },
    components: {
      'add_to': AddTo,
      'condition_action': ConditionAction,
      'email': Email,
      'sms': Sms,
      'End': End,
      'flow': Flow,
      'move': Move,
      'page': Page,
      'skip': Skip,
      'tag': Tag,
      'update_contact': UpdateContact,
      'wait': Wait
    },
    computed: {
      componentTitle() {
        return this.title.toUpperCase();
      },
      bgColorClass() {
        return `bg-${this.color}`;
      },
      colorClass() {
        return this.color;
      },
      isOpenBody() {
        return this.isOpen;
      },
      getIcon() {
        return this.icon.value;
      }
    },
    methods: {
      // ...mapActions([
      //   'toggleOpenComponents'
      // ])
      toggleOpenComponents(name) {
        this.$store.dispatch('emnel3000/toggleOpenComponents', this.name)

        if(this.isActive){
         this.isActive = false;
        }else{
          this.isActive = true;
        }
      }
    }
  }
</script>

<style scoped>
    
</style>