const tools = [
  {
    name: 'CheckBox',
    schema: {
      type: 'checkbox',
      label: 'Status',
      edit: false,
    },
  },
  {
    name: 'DateField',
    schema: {
      type: 'input',
      inputType: 'Date',
      label: 'Date',
      edit: false,
    },
  },
  {
    name: 'FileUpload',
    schema: {
      type: 'input',
      inputType: 'File',
      label: 'File',
      model: 'File',
      edit: false,
    },
  },
  {
    name: 'Header',
    schema: {
      type: 'h1',
      model: 'Header',
      value: 'Header',
      edit: false,
      hover: false,
    },
  },
  {
    name: 'HiddenInput',
    schema: {
      type: 'input',
      inputType: 'Hidden',
      label: 'Hidden',
      model: 'Hidden',
      edit: false,
    },
  },
  {
    name: 'Paragraph',
    schema: {
      type: 'paragraph',
      value: 'paragraph',
      edit: false,
    },
  },
  {
    name: 'Number',
    schema: {
      type: 'input',
      inputType: 'Number',
      label: 'Number',
      model: 'Number',
      edit: false,
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
      edit: false,
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
      edit: false,
    },
  },
  {
    name: 'TextField',
    schema: {
      type: 'input',
      inputType: 'text',
      label: 'Input',
      model: 'Input',
      edit: false,
    },
  },
  {
    name: 'TextArea',
    schema: {
      type: 'textArea',
      label: 'TextArea',
      model: 'TextArea',
      edit: false,
    },
  },
];

export default tools;
