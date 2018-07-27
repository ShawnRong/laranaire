<template>
    <div>
        <div v-if="!editStatus">
            <div class="form-group">
                <label>
                    {{ selectName }}
                </label>
                <select class="form-control" v-for="select in selectValues">
                    <option value="select.key">{{ select.value }}</option>
                </select>
            </div>
        </div>
        <div v-else>
            <div class="form-group">
                <label>Name:</label>
                <input class="form-control" type="text" v-model="selectName" />
            </div>
            <div class="form-group">
                <div class="form-inline justify-content-between">
                    <label>Options:</label>
                    <button class="btn btn-primary float-right"
                        @click="addOption"><i
                        class="fas fa-plus-circle" ></i></button>
                </div>
                <div class="form-row" v-for="(select, index) in selectValues">
                    <div class="form-group col-md-5">
                        <input class="form-control" type="text"
                            placeholder="value" :value="select.key"
                            @input="updateOptionValue($event, index)"/>
                    </div>
                    <div class="form-group col-md-5">
                        <input class="form-control" type="text"
                            placeholder="label" :value="select.value"
                            @input="updateOptionLabel($event, index)"/>
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
        props: ['schema', 'fieldIndex'],
        computed: {
            selectValues: function() {
                return this.schema.values
            },
            selectName: {
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
            addOption: function() {
                this.$store.commit({
                    type: 'addOption',
                    index: this.fieldIndex,
                });
            },
            deleteOption: function(optionIndex) {
                this.$store.commit({
                    type: 'deleteOption',
                    index: this.fieldIndex,
                    optionIndex: optionIndex,
                });
            },
            updateOptionValue: function(e, optionIndex) {
                this.$store.commit({
                    type: 'updateOptionValue',
                    index: this.fieldIndex,
                    optionIndex: optionIndex,
                    value: e.target.value,
                });
            },
            updateOptionLabel: function(e, optionIndex) {
                this.$store.commit({
                    type: 'updateOptionLabel',
                    index: this.fieldIndex,
                    optionIndex: optionIndex,
                    value: e.target.value,
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
