<template>
    <div>
        <h1 id="header-tool" v-if="!editStatus">{{ fieldValue }}</h1>
        <div v-else><input type="text" class="form-control" v-model="fieldValue"></div>
        <div class="field-actions">
            <a class="btn"
                @click="deleteField()"><i class="fas fa-times"></i></a>
            <a class="btn" @click="editField()"
                v-if="!editStatus"><i class="fas fa-pen"></i></a>
            <a class="btn" @click="saveField()"
                v-else><i class="fas fa-save"></i></a>
        </div>
    </div>
</template>

<script>
  export default {
    props: ['schema', 'fieldIndex'],
    computed: {
      fieldValue: {
        get() {
          return this.schema.value
        },
        set(value) {
          this.$store.commit({
              type: 'inputField',
              index: this.fieldIndex,
              value: value,
          });
        }
      },
      editStatus: function()  {
        return this.schema.edit
      },
    },
    methods: {
      deleteField: function() {
          this.$store.commit({
              type: 'deleteField',
              index: this.fieldIndex,
          });
      },
      editField: function() {
          this.$store.commit({
              type: 'editField',
              index: this.fieldIndex,
          });
      },
      saveField: function() {
          this.$store.commit({
              type: 'saveField',
              index: this.fieldIndex,
              value: this.fieldValue,
          });
      },
    }
  }
</script>
<style>
    .field-actions {
        float: right;
        opacity: 1;
    }
</style>
