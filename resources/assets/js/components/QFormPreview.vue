<template>
   <div class="container" v-html="renderedFormField"></div>
</template>
<script>
    export default {
        name: 'QPreview',
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
                            <div class="form-group form-check">
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
                                  type="radio" value="${radio.key}" name="${field.schema.label}">
                                  <label class="form-check-label" for="${field.schema.label}">
                                        ${ radio.value }</label>
                                </div>
                                `
                            });
                            content += `</div>`
                            break;
                        case 'Select':
                            content += `<select class="form-control">`;
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
                content +=
                    '<button type="submit" class="btn btn-primary">Submit</button>';
                content += '</form>';
                return content
            }
        },
    }
</script>
