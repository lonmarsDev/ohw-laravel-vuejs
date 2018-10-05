import Emnel3000 from './components/Emnel3000';
import Buefy from 'buefy';

export default (Vue) => {
  Vue.component('emnel-3000', Emnel3000);

  // buefy components
  Vue.component(Buefy.Collapse.name, Buefy.Collapse);
}