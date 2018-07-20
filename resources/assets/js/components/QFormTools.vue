<template>
  <draggable class="list-group" element="ul" v-model="listTools"
      :options="dragOptions" @start="isDragging=true" @end="isDragging=false">
          <li class="list-group-item" v-for="element in listTools"
              :key="element.order" @click="clickAddToForm(element.field)">
              {{ element.field.name }}
          </li>
  </draggable>
</template>
<script>
import draggable from "vuedraggable";
import tools from "../data/FormTools";

export default {
  components: {
    draggable
  },
  data() {
    return {
      listTools: tools.map((field, index) => {
        return { field, order: index + 1, fixed: false };
      }),
      editable: true,
    };
  },
  methods: {
    clickAddToForm(elementName) {
        this.$store.commit({
            type: 'clickAddToForm',
            field: elementName
        })
    }
  },
  computed: {
    dragOptions() {
      return {
        animation: 0,
        group: {
          name: "form",
          pull: 'clone',
          put: false,
        },
        disabled: !this.editable,
        ghostClass: "bg-danger",
      };
    }
  }
};
</script>
