const tools = [
  {
    name: 'CheckBox Group',
    schema: {
      type: 'checkbox',
      label: 'Status',
      model: 'status',
      default: true,
    },
  },
  {
    name: 'Date Field',
    schema: {
      type: 'input',
      inputType: 'Date',
      label: 'Date',
      model: 'date',
    },
  },
  {
    name: 'File Upload',
    schema: {
      type: 'input',
      inputType: 'File',
      label: 'File',
      model: 'File',
    },
  },
  {
    name: 'Header',
    schema: {
      type: 'h1',
      model: 'Header',
    },
  },
  {
    name: 'Hidden Input',
    schema: {
      type: 'input',
      inputType: 'Hidden',
      label: 'Hidden',
      model: 'Hidden',
    },
  },
  {
    name: 'Paragraph',
    schema: {
      type: 'paragraph',
      model: 'paragraph',
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
    name: 'Radio Group',
    schema: {
      type: 'radios',
      label: 'Radios',
      model: 'radios',
      values: [
        {name: '', value:''},
      ],
    },
  },
  {
    name: 'Select',
    schema: {
      type: 'select',
      label: 'Select',
      model: 'Select',
      values: [],
    },
  },
  {
    name: 'Text Field',
    schema: {
      type: 'input',
      inputType: 'text',
      label: 'Input',
      model: 'Input',
    },
  },
  {
    name: 'Text Area',
    schema: {
      type: 'textArea',
      label: 'TextArea',
      model: 'TextArea',
    },
  },
];

export default tools;
