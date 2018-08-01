import Vuex from 'vuex';
import Vue from 'vue';
import _ from 'lodash';

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    formTitle: '',
    formDescription: '',
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
    dragAddToForm(state, { field }) {
      this.state.formFieldList = _.map(field, item => {
        return item.field ? item.field : item;
      });
    },
    deleteField(state, { index }) {
      state.formFieldList.splice(index, 1);
    },
    persistField(state, { index, field }) {
      Vue.set(state.formFieldList, index, field);
    },
    updateTitle(state, { title }) {
      state.formTitle = title;
    },
    updateDescription(state, { description }) {
      state.formDescription = description;
    },
    createFieldSuccess(state) {
      window.location.href = '/questionnaire';
      console.log('post success');
    },
    createFieldError(state) {
      console.log('create error');
    }
  },
  actions: {
    createFormField(context) {
      let formData = {
        title: context.state.formTitle,
        body: context.state.formDescription,
        creator: window.App.user.id,
        questions: context.state.formFieldList,
      };
      axios.post('/questionnaire', formData).then(() => {
        context.commit('createFieldSuccess');
      }).catch((error) => {
        context.commit('createFieldError', error);
      });
    },
  },
});

export default store;
