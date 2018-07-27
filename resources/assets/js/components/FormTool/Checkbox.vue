<template>
    <div>
        <div v-if="!editStatus">
            <div class="form-group form-check">
              <input type="checkbox" class="form-check-input">
              <label class="form-check-label">{{ fieldLabel }}</label>
            </div>
        </div>
        <div v-else>
            <div class="form-group">
                <label>Checkbox Label:</label>
                <input type="text" class="form-control" v-model="fieldLabel">
            </div>
        </div>
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
            fieldLabel: {
                get() {
                    return this.schema.label
                },
                set(label) {
                    this.$store.commit({
                        type: 'inputLabel',
                        index: this.fieldIndex,
                        label: label,
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
