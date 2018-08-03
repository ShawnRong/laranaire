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
                          v-model="formData[field.name]">
                      <label class="form-check-label">{{ field.schema.label }}</label>
                  </div>
              </template>
              <template v-if="field.name === 'DateField'">
                  <div class="form-group">
                      <label>{{ field.schema.label }}</label>
                      <input type="date" class="form-control"
                          v-model="formData[field.name]">
                  </div>
              </template>
              <template v-if="field.name === 'FileUpload'">
                  <div class="form-group">
                      <label>{{ field.schema.label }}</label>
                      <input type="file" class="form-control" >
                  </div>
              </template>
               <template v-if="field.name === 'HiddenInput'">
                   <div class="form-group">
                       <label>{{ field.schema.label }}</label>
                       <input type="hidden" class="form-control"
                           v-model="formData[field.name]">
                   </div>
               </template>
               <template v-if="field.name === 'Paragraph'">
                   <p class="form-group"> {{ field.schema.value }} </p>
               </template>
               <template v-if="field.name === 'Number'">
                   <div class="form-group">
                       <label>{{ field.schema.label }}</label>
                       <input type="number" class="form-control"
                           v-model="formData[field.name]">
                   </div>
               </template>
               <template v-if="field.name === 'RadioGroup'">
                   <div class="form-group">
                    <div class="form-check"
                        v-for="radio in field.schema.values">
                        <input class="form-check-input"
                            type="radio" :value="radio.key"
                            name="field.schema.label"
                            v-model="formData[field.name]">
                        <label class="form-check-label" for="field.schema.label">
                            {{ radio.value }}</label>
                    </div>
                   </div>
               </template>
               <template v-if="field.name === 'Select'">
                   <select class="form-control" v-model="formData[field.name]">
                       <option :value="select.key"
                           v-for="select in field.schema.values">{{
                           select.value }}</option>
                   </select>
               </template>
               <template v-if="field.name === 'TextField'">
                   <div class="form-group">
                       <label>{{ field.schema.label }}</label>
                       <input type="text" class="form-control"
                           v-model="formData[field.schema.label]">
                   </div>
               </template>
               <template v-if="field.name === 'TextArea'">
                   <div class="form-group">
                       <label>{{ field.schema.label }}</label>
                       <textarea class="form-control" rows="3"
                           v-model="formData[field.name]"></textarea>
                   </div>
               </template>
           </template>
           <button class="btn btn-primary" @click.prevent='submit'>Submit</button>
       </form>
   </div>
</template>
<script>
    export default {
        props: ['questions', 'fill-status', 'form-id'],
        data() {
            return {
                formData: {}
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
                  axios.post('/form/' + token + '/create',
                      payload).then(response => {
                    console.log(response)
                  }).catch(error => {
                    console.log(error)
                  });
                }
            }
        }
    }
</script>
