const tools = [
  {
    name: 'CheckBox',
    icon: 'fa-check-square',
    schema: {
      type: 'checkbox',
      label: 'Status',
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
  },
  {
    name: 'FileUpload',
    icon: 'fa-file',
    schema: {
      type: 'input',
      inputType: 'File',
      label: 'File',
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
  },
  {
    name: 'TextField',
    icon: 'fa-angle-right',
    schema: {
      type: 'input',
      inputType: 'text',
      label: 'Input',
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
  },
];

export default tools;
