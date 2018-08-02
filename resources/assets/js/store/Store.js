import Vuex from 'vuex';
import Vue from 'vue';
import _ from 'lodash';

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    formId: '',
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
    }
    ,
    updateTitle(state, { title }) {
      state.formTitle = title;
    },
    updateDescription(state, { description }) {
      state.formDescription = description;
    },
    createFieldSuccess(state, response) {
      if (response.status === 201) {
        window.location.href = '/questionnaire';
        flash('Created Success');
      }
    },
    createFieldError(state, error) {
      flash(error, 'danger');
    },
    editData(state, { formData }) {
      state.formId = formData.id;
      state.formTitle = formData.title;
      state.formDescription = formData.body;
      state.formFieldList = JSON.parse(formData.questions);
    },
  },
  actions: {
    createFormField(context) {
      let formData = {
        title: context.state.formTitle,
        body: context.state.formDescription,
        creator: window.App.user.id,
        questions: context.state.formFieldList,
      };
      axios.post('/questionnaire', formData).then((response) => {
        context.commit('createFieldSuccess', response);
      }).catch((error) => {
        context.commit('createFieldError', error);
      });
    },
    updateFormField(context) {
        let formData = {
            title: context.state.formTitle,
            body: context.state.formDescription,
            questions: context.state.formFieldList,
        };
        axios.patch('/questionnaire/' + context.state.formId, formData).then((response) => {
            context.commit('createFieldSuccess', response);
        }).catchy((error) => {
            context.commit('createFieldError', error);
        });
    },
  },
});

export default store;
