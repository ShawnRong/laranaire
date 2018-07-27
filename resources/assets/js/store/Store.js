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
    editField(state, { index }) {
      let update = state.formFieldList[index];
      Vue.set(state.formFieldList, index, {
        name: update.name,
        schema: {
          ...update.schema,
          edit: true,
        },
      });
    },
    inputField(state, { index, value }) {
      let update = state.formFieldList[index];
      Vue.set(state.formFieldList, index, {
        name: update.name,
        schema: {
          ...update.schema,
          value: value,
        },
      });
    },
    inputLabel(state, { index, label }) {
      let update = state.formFieldList[index];
      Vue.set(state.formFieldList, index, {
        name: update.name,
        schema: {
          ...update.schema,
          label: label,
        },
      });
    },
    inputName(state, { index, name }) {
      let update = state.formFieldList[index];
      Vue.set(state.formFieldList, index, {
        name: update.name,
        schema: {
          ...update.schema,
          name: name,
        },
      });
    },
    saveField(state, { index }) {
      let update = state.formFieldList[index];
      Vue.set(state.formFieldList, index, {
        name: update.name,
        schema: {
          ...update.schema,
          edit: false,
        },
      });
    },
    addOption(state, { index }) {
      let update = state.formFieldList[index];
      Vue.set(state.formFieldList, index, {
        name: update.name,
        schema: {
          ...update.schema,
          values: [...update.schema.values, { key: '', value: '' }],
        },
      });
    },
    deleteOption(state, { index, optionIndex }) {
      state.formFieldList[index].schema.values.splice(optionIndex, 1);
    },
    updateOptionValue(state, { index, optionIndex, value }) {
      let values = state.formFieldList[index].schema.values;
      let key = values[optionIndex].key;
      Vue.set(values, optionIndex, {
        key,
        value,
      });
      let update = state.formFieldList[index];
      Vue.set(state.formFieldList, index, {
        name: update.name,
        schema: {
          ...update.schema,
          values: [...values],
        },
      });
    },
    updateOptionLabel(state, { index, optionIndex, value }) {
      let values = state.formFieldList[index].schema.values;
      let pre = values[optionIndex].value;
      Vue.set(values, optionIndex, {
        key: value,
        value: pre,
      });
      let update = state.formFieldList[index];
      Vue.set(state.formFieldList, index, {
        name: update.name,
        schema: {
          ...update.schema,
          values: [...values],
        },
      });
    },
  },
});

export default store;
