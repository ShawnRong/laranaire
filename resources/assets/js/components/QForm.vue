<template>
  <div class="bg-white">
    <div class="card">
        <div class="card-header">
            <div class="float-right">
                <div class="btn-group">
                    <button class="btn btn-success" @click="preview">Preview
                    </button>
                </div>
                <div class="btn-group">
                    <button class="btn btn-primary" @click="saveData">Save
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <draggable element="ul" v-model="formFieldList" :options="dragOptions"
                class="list-group">
                <li class="list-group-item field-edit" v-for="(element, key) in
      formFieldList"
                    :key="key">
                    <component :is="element.name"
                        :field="element" :fieldIndex="key"></component>
                </li>
            </draggable>
        </div>
    </div>
  </div>
</template>
<script>
import draggable from 'vuedraggable';
import Header from './FormTool/Header.vue';
import Checkbox from './FormTool/Checkbox.vue';
import Input from './FormTool/Input.vue';
import Paragraph from './FormTool/Paragraph.vue';
import RadioGroup from './FormTool/Radio.vue';
import Select from './FormTool/Select.vue';
import TextArea from './FormTool/Textarea.vue';

export default {
  components: {
    draggable,
    Header,
    'CheckBox' : Checkbox,
    'DateField': Input,
    'FileUpload': Input,
    'HiddenInput': Input,
    'Number': Input,
    'TextField' : Input,
    'Paragraph' : Paragraph,
    'RadioGroup' : RadioGroup,
     Select,
     TextArea,
  },
  data() {
    return {
      editable: true,
      hover:false,
    }
  },
  computed: {
      formFieldList: {
        get()
        {
            return this.$store.state.formFieldList;
        },
        set(newValue)
        {
            this.$store.commit({
                type: 'dragAddToForm',
                field: newValue
            })
        }
    },
    dragOptions() {
      return  {
          animation: 0,
          group: {
            name: 'form',
            pull: false,
          },
          disabled: !this.editable,
          ghostClass: 'bg-danger',
      };
    }
  },
  methods: {
      saveData() {
        let formData = {
            title: 'test title',
            body: 'test body',
            creator: 'admin',
            questions: 'test questions',
        };

        axios.patch('/questionnaire/8', formData).then(() =>
            console.log('return'))
      },
      preview() {
        this.$emit('toggle-preview');
      }
  }
}
</script>
<style>
    .field-edit {
        position: relative;
    }
</style>
