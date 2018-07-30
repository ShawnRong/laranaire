<template>
    <div class="container form-preview">
        <div class="card">
            <div class="card-header">
                Form Preview
                <div class="float-right">
                    <button type="button" class="close" @click="closePreview">
                        <span>&times;</span>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="container" v-html="renderedFormField"></div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        computed: {
            renderedFormField() {
                let formField = this.$store.state.formFieldList;
                let content = '<form class="form">';
                formField.forEach(field => {
                    switch (field.name) {
                        case 'Header':
                            content += `<h1>${ field.schema.value }</h1>`
                            break;
                        case 'CheckBox':
                            content += `
                            <div class="form-group">
                                <input type="checkbox"
                               class="form-check-input">
                               <label class="form-check-label">${
                                field.schema.label }</label>
                            </div>
                            `
                            break;
                        case 'DateField':
                            content += `
                            <div class="form-group">
                               <label>${ field.schema.label }</label>
                                <input type="date" class="form-control">
                            </div>
                            `
                            break;
                        case 'FileUpload':
                            content += `
                            <div class="form-group">
                               <label>${ field.schema.label }</label>
                               <input type="file" class="form-control">
                            </div>
                            `
                            break;
                        case 'HiddenInput':
                            content += `
                            <div class="form-group">
                               <label>${ field.schema.label }</label>
                               <input type="hidden" class="form-control">
                            </div>
                            `
                            break;
                        case 'Paragraph':
                            content += `
                            <p class="form-group">
                              ${ field.schema.value }
                            </p>
                            `
                            break;
                        case 'Number':
                            content += `
                            <div class="form-group">
                               <label>${ field.schema.label }</label>
                               <input type="number" class="form-control">
                            </div>
                            `
                            break;
                        case 'RadioGroup':
                            content += `<div class="form-group">`
                            field.schema.values.forEach(radio => {
                                content += `
                                <div class="form-check">
                                  <input class="form-check-input"
                                  type="radio" value="${radio.key}">
                                  <label class="form-check-label">${
                                    radio.value }</label>
                                </div>
                                `
                            });
                            content += `</div>`
                            break;
                        case 'Select':
                            content += `<select class="custom-select">`;
                            field.schema.values.forEach(select => {
                                content += `
                                  <option value="${select.key}">${select.value}</option>
                                `
                            });
                            content += `</select>`
                            break;
                        case 'TextField':
                            content += `
                            <div class="form-group">
                                <label>${field.schema.label}</label>
                                <input type="text" class="form-control">
                            </div>
                            `
                            break;
                        case 'TextArea':
                            content += `
                            <div class="form-group">
                               <label>${ field.schema.label }</label>
                               <textarea class="form-control" rows="3"></textarea>
                            </div>
                            `
                            break;
                    }
                });
                content += '</form>';
                return content
            }
        },
        methods: {
            closePreview() {
                this.$emit('close-preview')
            }
        },
    }
</script>
<style>
    .form-preview {
        position: fixed;
        z-index: 3;
    }
</style>
