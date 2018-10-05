import sampleComponents from './components'
import components from './components';

const state = {
  sample_components: sampleComponents
}

const getters = {
  sampleComponents: state => {
    return state.sample_components
  }
}

const actions = {
  toggleOpenComponents({ commit }, name) {
    commit('closeAllComponents')
    commit('openOneComponent', name)
  }
}

const mutations = {
  closeAllComponents (state) {
    state.sample_components.map((value, index) => {
      value.isOpen = false
    })
  },
  openOneComponent(state, name) {
    let component = state.sample_components.find(component => component.name === name);
    component.isOpen = true;
  }
}

export default {
  namespaced: true,
  state,
  getters,
  actions,
  mutations
}