<template>
    <div>
        <div class="form-group" v-if="!editStatus">
            <label>{{ fieldAttribute.schema.label }}</label>
            <textarea class="form-control" rows="3"></textarea>
        </div>
        <div
            v-else>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                        v-model="fieldAttribute.validate.required" >
                    <label class="form-check-label">
                        required
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Required Error Message:</label>
                <input type="text" class="form-control"
                    v-model="fieldAttribute.validate.requiredMsg">
            </div>
            <div class="form-group">
                <label>Label</label>
                <input type="text" class="form-control" v-model="fieldAttribute.schema.label">
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
