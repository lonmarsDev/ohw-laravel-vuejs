import Vue from 'vue'
import Vuex from 'vuex'
// import cart from './modules/cart'
// import products from './modules/products'
import emnel3000 from './module/emnel3000'

Vue.use(Vuex)

export default new Vuex.Store({
  modules: {
    emnel3000
  }
})