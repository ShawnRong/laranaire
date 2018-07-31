<template>
    <div>
        <div v-if="!editStatus">
            <div class="form-group">
                <label>
                    {{ fieldAttribute.schema.label }}
                </label>
                <select class="form-control">
                    <option :value="select.key" v-for="select in
                fieldAttribute.schema.values">{{ select.value }}</option>
                </select>
            </div>
        </div>
        <div v-else>
            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text"
                    v-model="fieldAttribute.schema.label" />
            </div>
            <div class="form-group">
                <div class="form-inline justify-content-between">
                    <label>Options:</label>
                    <button class="btn btn-primary float-right"
                        @click="addOption"><i
                        class="fas fa-plus-circle" ></i></button>
                </div>
                <div class="form-row" v-for="(select, index) in
                fieldAttribute.schema.values">
                    <div class="form-group col-md-5">
                        <input class="form-control" type="text"
                            placeholder="key" v-model="select.key" />
                    </div>
                    <div class="form-group col-md-5">
                        <input class="form-control" type="text"
                            placeholder="value" v-model="select.value" />
                    </div>
                    <div class="form-group col-md-1 offset-md-1" v-if="index
                    !== 0">
                        <button
                            class="btn" @click="deleteOption(index)"
                        ><i class="fas fa-times-circle"></i></button>
                    </div>
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
                fieldAttribute: {},
            }
        },
        created() {
            this.fieldAttribute = _.cloneDeep(this.field)
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
            addOption: function() {
                this.fieldAttribute.schema.values.push({ key: '', value: '' })
            },
            deleteOption: function(optionIndex) {
                this.$store.commit({
                    type: 'deleteOption',
                    index: this.fieldIndex,
                    optionIndex: optionIndex,
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
