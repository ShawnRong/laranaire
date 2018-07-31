import Vuex from 'vuex';
import Vue from 'vue';
import _ from 'lodash';

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    formFieldList: [
      {
        name: 'Header',
        schema: {
          type: 'h1',
          model: 'Header',
          value: 'Header',
          hover: false,
          edit: false,
        },
      },
    ],
  },
  mutations: {
    clickAddToForm(state, payload) {
      state.formFieldList.push(payload.field);
    },
    dragAddToForm(state, payload) {
      state.formFieldList = _.clone(payload.field);
    },
    deleteField(state, { index }) {
      state.formFieldList.splice(index, 1);
    },
    persistField(state, { index, field }) {
      Vue.set(state.formFieldList, index, field);
    },
  },
});

export default store;
