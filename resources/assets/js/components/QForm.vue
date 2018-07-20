<template>
  <div class="bg-white">
    <draggable element="ul" v-model="formFieldList" :options="dragOptions"
        class="list-group">
      <li class="list-group-item" v-for="element in formFieldList"
          :key="element" v-html="parseField(element)">
      </li>
    </draggable>
  </div>
</template>
<script>
import draggable from 'vuedraggable';

export default {
  components: {
    draggable
  },
  data() {
    return {
      editable: true
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
  methods: {
    parseField(element) {
      console.log(element);
      return `<h1>{element}</h1>`;
    }
  }
}
</script>
