
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import '../sass/app.scss';
import './bootstrap';
import Vue from 'vue';
import store from './store/Store';
import questionnaire from './components/Questionnaire.vue';
import Flash from './components/Flash.vue';
import QForm from './components/QFormPreview.vue';
import ViewDetail from './components/Detail/DetailBtnGroup.vue';
import { VueSlideoutPanel } from 'vue2-slideout-panel';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

window.events = new Vue();
window.flash = function(message, level='success') {
  window.events.$emit('flash', { message , level });
};

const app = new Vue({
  el: '#app',
  store,
  components: {
    'questionnaire': questionnaire,
    'flash': Flash,
    'qform': QForm,
    'ViewDetailButton': ViewDetail,
    'slideout-panel': VueSlideoutPanel,
  },
});
