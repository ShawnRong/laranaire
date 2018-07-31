const tools = [
  {
    name: 'CheckBox',
    schema: {
      type: 'checkbox',
      label: 'Status',
    },
  },
  {
    name: 'DateField',
    schema: {
      type: 'input',
      inputType: 'Date',
      label: 'Date',
    },
  },
  {
    name: 'FileUpload',
    schema: {
      type: 'input',
      inputType: 'File',
      label: 'File',
    },
  },
  {
    name: 'Header',
    schema: {
      type: 'h1',
      value: 'Header',
    },
  },
  {
    name: 'HiddenInput',
    schema: {
      type: 'input',
      inputType: 'Hidden',
      label: 'Hidden',
    },
  },
  {
    name: 'Paragraph',
    schema: {
      type: 'paragraph',
      value: 'paragraph',
    },
  },
  {
    name: 'Number',
    schema: {
      type: 'input',
      inputType: 'Number',
      label: 'Number',
      model: 'Number',
    },
  },

  {
    name: 'RadioGroup',
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
    schema: {
      type: 'input',
      inputType: 'text',
      label: 'Input',
    },
  },
  {
    name: 'TextArea',
    schema: {
      type: 'textArea',
      label: 'TextArea',
      value: '',
    },
  },
];

export default tools;
