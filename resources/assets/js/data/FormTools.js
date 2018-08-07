const tools = [
  {
    name: 'CheckBox',
    icon: 'fa-check-square',
    schema: {
      type: 'checkbox',
      label: 'Status',
    },
    validate: {
      required: false,
      requiredMsg: '',
    },
  },
  {
    name: 'DateField',
    icon: 'fa-calendar',
    schema: {
      type: 'input',
      inputType: 'Date',
      label: 'Date',
    },
    validate: {
      required: false,
      requiredMsg: '',
      minDateEnable: false,
      minDate: '',
      minDateMsg: '',
      maxDateEnable: false,
      maxDate: '',
      maxDateMsg: '',
    },
  },
  {
    name: 'FileUpload',
    icon: 'fa-file',
    schema: {
      type: 'input',
      inputType: 'File',
      label: 'File',
    },
    validate: {
      required: false,
      requiredMsg: '',
      fileExtension: '',
      fileErrorMsg: '',
    },
  },
  {
    name: 'Header',
    icon: 'fa-heading',
    schema: {
      type: 'h1',
      value: 'Header',
    },
  },
  {
    name: 'HiddenInput',
    icon: 'fa-eye-slash',
    schema: {
      type: 'input',
      inputType: 'Hidden',
      label: 'Hidden',
      value: '',
    },
  },
  {
    name: 'Paragraph',
    icon: 'fa-paragraph',
    schema: {
      type: 'paragraph',
      value: 'paragraph',
    },
  },
  {
    name: 'Number',
    icon: 'fa-hashtag',
    schema: {
      type: 'input',
      inputType: 'Number',
      label: 'Number',
      model: 'Number',
    },
    validate: {
      required: false,
      requiredMsg: '',
      min: '',
      minMsg: '',
      max: '',
      maxMsg: '',
    },
  },

  {
    name: 'RadioGroup',
    icon: 'fa-list',
    schema: {
      type: 'radios',
      label: 'Radios',
      name: 'Radios',
      values: [
        { key: 'default', value:'default'},
      ],
    },
    validate: {
      required: false,
      requiredMsg: '',
    },
  },
  {
    name: 'Select',
    icon: 'fa-check',
    schema: {
      type: 'select',
      label: 'Select',
      values: [
          { key: 'default', value: 'default'},
      ],
    },
    validate: {
      required: false,
      requiredMsg: '',
    },
  },
  {
    name: 'TextField',
    icon: 'fa-angle-right',
    schema: {
      type: 'input',
      inputType: 'text',
      label: 'Input',
    },
    validate: {
      required: false,
      requiredMsg: '',
      maxLength: '',
    },
  },
  {
    name: 'TextArea',
    icon: 'fa-comment-alt',
    schema: {
      type: 'textArea',
      label: 'TextArea',
      value: '',
    },
    validate: {
      required: false,
      requiredMsg: '',
    },
  },
];

export default tools;
