<template>
  <div class="bg-white">
    <draggable element="ul" v-model="formFieldList" :options="dragOptions"
        class="list-group">
      <li class="list-group-item field-edit" v-for="(element, key) in
      formFieldList"
          :key="key">
          <component :is="element.name"
              :schema="element.schema" :fieldIndex="key"></component>
      </li>
    </draggable>
  </div>
</template>
<script>
import draggable from 'vuedraggable';
import Header from './FormTool/Header.vue';

export default {
  components: {
    draggable,
    Header
  },
  data() {
    return {
      editable: true,
      hover:false,
    }
  },
  computed: {
      formFieldList: {
        get()
        {
            return this.$store.state.formFieldList;
        },
        set(newValue)
        {
            this.$store.commit({
                type: 'dragAddToForm',
                field: newValue
            })
        }
    },
    dragOptions() {
      return  {
          animation: 0,
          group: {
            name: 'form',
            pull: false,
          },
          disabled: !this.editable,
          ghostClass: 'bg-danger',
      };
    }
  },
}
</script>
<style>
    .field-edit {
        position: relative;
    }
</style>
