<template>
    <div>
        <div v-if="!editStatus">
            <div class="form-group">
                <label>{{ fieldAttribute.schema.label }}</label>
                <input :type="fieldAttribute.schema.inputType"
                    class="form-control">
            </div>
        </div>
        <div v-else>
            <div class="form-group" v-if="fieldAttribute.schema.inputType !== 'Hidden'">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                        v-model="fieldAttribute.validate.required" >
                    <label class="form-check-label">
                        required
                    </label>
                </div>
            </div>
            <div class="form-group" v-if="fieldAttribute.schema.inputType !== 'Hidden'">
                <label>Required Error Message:</label>
                <input type="text" class="form-control"
                    v-model="fieldAttribute.validate.requiredMsg">
            </div>
            <div class="form-group">
                <label>Label:</label>
                <input type="text" class="form-control"
                    v-model="fieldAttribute.schema.label">
            </div>
            <div class="form-group" v-if="fieldAttribute.schema.inputType ===
            'Date'">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                        v-model="fieldAttribute.validate.minDateEnable">
                    <label class="form-check-label">
                        Enable Min Date
                    </label>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control"
                        v-model="fieldAttribute.validate.minDate">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"
                        v-model="fieldAttribute.validate.minDateMsg"
                        placeholder="Min Date Error Message">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                        v-model="fieldAttribute.validate.maxDateEnable">
                    <label class="form-check-label">
                        Enable Max Date
                    </label>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control"
                        v-model="fieldAttribute.validate.maxDate">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"
                        v-model="fieldAttribute.validate.maxDateMsg"
                        placeholder="Max Date Error Message">
                </div>
            </div>
            <div class="form-group" v-if="fieldAttribute.schema.inputType ===
            'File'">
                <div class="form-group">
                    <input type="text" class="form-control"
                        v-model="fieldAttribute.validate.fileExtension"
                        placeholder="Accept File Extensions">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"
                        v-model="fieldAttribute.validate.fileErrorMsg"
                        placeholder="File Error Message">
                </div>
            </div>
            <div class="form-group"
                v-if="fieldAttribute.schema.inputType === 'Hidden'">
                <div class="form-group">
                    <input type="text" class="form-control"
                        v-model="fieldAttribute.schema.value"
                        placeholder="Hidden Value">
                </div>
            </div>
            <div class="form-group"
                v-if="fieldAttribute.schema.inputType === 'Number'">
                <div class="form-group">
                    <label>Min Number</label>
                    <input type="number" class="form-control"
                        v-model="fieldAttribute.validate.min">
                </div>
                <div class="form-group">
                    <label>Min Number Error Message</label>
                    <input type="text" class="form-control"
                        v-model="fieldAttribute.validate.minMsg">
                </div>
                <div class="form-group">
                    <label>Max Number</label>
                    <input type="number" class="form-control"
                        v-model="fieldAttribute.validate.max">
                </div>
                <div class="form-group">
                    <label>Max Number Error Message</label>
                    <input type="text" class="form-control"
                        v-model="fieldAttribute.validate.maxMsg">
                </div>
            </div>
            <div class="form-group" v-if="fieldAttribute.schema.inputType ===
             'text'">
                <div class="form-group">
                    <label>Max Length</label>
                    <input type="number" class="form-control"
                        v-model="fieldAttribute.validate.maxLength">
                </div>
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
