import Vuex from 'vuex';
import Vue from 'vue';
import _ from 'lodash';

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        formFieldList: ['Header'],
    },
    mutations: {
        clickAddToForm(state, payload) {
            state.formFieldList.push(payload.field)
        },
        dragAddToForm(state, payload) {
            state.formFieldList = _.clone(payload.field)
        }
    },
    getters: {
        value: (state) => state.formFieldList
    }
});

export default store;
