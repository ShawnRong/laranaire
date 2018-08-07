<template>
   <div class="container">
       <form class="form">
           <template v-for="field in questions">
              <template v-if="field.name === 'Header' ">
                <h1>{{ field.schema.value }}</h1>
              </template>
              <template v-if="field.name === 'CheckBox' ">
                  <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input"
                          :class="hasError[field.schema.label] ? 'is-invalid':
                           ''"
                          v-model="formData[field.schema.label]">
                      <label class="form-check-label">{{ field.schema.label }}
                        <span v-if="field.validate.required">*</span>
                      </label>
                      <div class="invalid-feedback">{{
                          field.validate.requiredMsg }}</div>
                  </div>
              </template>
              <template v-if="field.name === 'DateField'">
                  <div class="form-group">
                      <label>{{ field.schema.label }}
                          <span v-if="field.validate.required">*</span>
                      </label>
                      <input type="date" class="form-control"
                          :class="hasError[field.schema.label] ? 'is-invalid':
                           ''"
                          v-model="formData[field.schema.label]">
                      <div class="invalid-feedback">{{
                          field.validate.requiredMsg }}</div>
                  </div>
              </template>
              <template v-if="field.name === 'FileUpload'">
                  <div class="form-group">
                      <label>{{ field.schema.label }}
                          <span v-if="field.validate.required">*</span>
                      </label>
                      <input type="file" class="form-control"
                          :class="hasError[field.schema.label] ? 'is-invalid':
                          ''" >
                      <div class="invalid-feedback">{{
                          field.validate.requiredMsg }}</div>
                  </div>
              </template>
               <template v-if="field.name === 'HiddenInput'">
                   <div class="form-group">
                       <input type="hidden" class="form-control"
                           v-model="formData[field.value]">
                   </div>
               </template>
               <template v-if="field.name === 'Paragraph'">
                   <p class="form-group"> {{ field.schema.value }} </p>
               </template>
               <template v-if="field.name === 'Number'">
                   <div class="form-group">
                       <label>{{ field.schema.label }}
                           <span v-if="field.validate.required">*</span>
                       </label>
                       <input type="number" class="form-control"
                           :class="hasError[field.schema.label] ? 'is-invalid':
                            ''"
                           v-model="formData[field.schema.label]">
                       <div class="invalid-feedback">{{
                           field.validate.requiredMsg }}</div>
                   </div>
               </template>
               <template v-if="field.name === 'RadioGroup'">
                   <div class="form-group">
                    <div class="form-check"
                        v-for="radio in field.schema.values">
                        <input class="form-check-input"
                            type="radio" :value="radio.key"
                            name="field.schema.label"
                            v-model="formData[field.schema.label]">
                        <label class="form-check-label" for="field.schema.label">
                            {{ radio.value }}</label>
                    </div>
                   </div>
               </template>
               <template v-if="field.name === 'Select'">
                   <div class="form-group">
                       <select class="form-control"
                           :class="hasError[field.schema.label] ? 'is-invalid':
                            ''"
                           v-model="formData[field.schema.label]">
                           <option :value="select.key"
                               v-for="select in field.schema.values">{{
                               select.value }}</option>
                       </select>
                       <div class="invalid-feedback">{{
                           field.validate.requiredMsg }}</div>
                   </div>
               </template>
               <template v-if="field.name === 'TextField'">
                   <div class="form-group">
                       <label>{{ field.schema.label }}
                           <span v-if="field.validate.required">*</span>
                       </label>
                       <input type="text" class="form-control"
                           :class="hasError[field.schema.label] ? 'is-invalid':
                            ''"
                           v-model="formData[field.schema.label]">
                       <div class="invalid-feedback">{{
                           field.validate.requiredMsg }}</div>
                   </div>
               </template>
               <template v-if="field.name === 'TextArea'">
                   <div class="form-group">
                       <label>{{ field.schema.label }}
                           <span v-if="field.validate.required">*</span>
                       </label>
                       <textarea class="form-control" rows="3"
                           :class="hasError[field.schema.label] ? 'is-invalid':
                            ''"
                           v-model="formData[field.schema.label]"></textarea>
                       <div class="invalid-feedback">{{
                           field.validate.requiredMsg }}</div>
                   </div>
               </template>
           </template>
           <button class="btn btn-primary" @click.prevent='submit'>Submit</button>
       </form>
   </div>
</template>
<script>
    import Vue from 'vue';

    export default {
        props: ['questions', 'fill-status', 'form-id'],
        data() {
            return {
                formData: {},
                hasError: {},
            }
        },
        methods: {
            submit() {
                if(this.fillStatus) {
                  let token =
                      window.location.pathname.split('?')[0].split('/').filter(function (i) { return i !== ""}).slice(-1)[0];
                  let payload = {
                      'formId': this.formId,
                      'data': this.formData,
                  }
                  this.validate();
                  if(this.checkError()) {
                      axios.post('/form/' + token + '/create',
                          payload).then(response => {
                          console.log(response)
                      }).catch(error => {
                          console.log(error)
                      });
                  }
                }
            },
            validate() {
                this.questions.forEach((question) => {
                    if(question.name !== 'HiddenInput' && question.name !==
                        'Header' && question.name !== 'Paragraph') {
                        if (question.validate.required &&
                            !this.formData[question.schema.label]) {
                            Vue.set(this.hasError, question.schema.label,
                                true);
                        } else {
                            Vue.set(this.hasError, question.schema.label,
                                false);
                        }
                    }
                })
            },
            checkError() {
                let values = Object.values(this.hasError);
                return values.every(value => value === false);
            }
        },
    }
</script>
