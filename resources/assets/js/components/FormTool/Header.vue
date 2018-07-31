<template>
    <div>
        <h1 v-if="!editStatus">{{
            fieldAttribute.schema.value }}</h1>
        <div
            v-else><input type="text" class="form-control"
            v-model="fieldAttribute.schema.value"></div>
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
    props: ['field', 'fieldIndex'],
    data() {
        return {
            editStatus: false,
        }
    },
    computed: {
        fieldAttribute() {
            return _.cloneDeep(this.field)
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
          this.editStatus = !this.editStatus;
      },
      saveField: function() {
          this.editStatus = !this.editStatus;
          this.$store.commit({
              type: 'persistField',
              index: this.fieldIndex,
              field: this.fieldAttribute,
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
