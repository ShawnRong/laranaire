const tools = [
  {
    name: 'CheckBox Group',
    schema: {
      type: 'checkbox',
      label: 'Status',
      model: 'status',
      default: true,
      edit: false,
    },
  },
  {
    name: 'Date Field',
    schema: {
      type: 'input',
      inputType: 'Date',
      label: 'Date',
      model: 'date',
      edit: false,
    },
  },
  {
    name: 'File Upload',
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
    name: 'Hidden Input',
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
      model: 'paragraph',
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
    name: 'Radio Group',
    schema: {
      type: 'radios',
      label: 'Radios',
      model: 'radios',
      values: [
        {name: '', value:''},
      ],
      edit: false,
    },
  },
  {
    name: 'Select',
    schema: {
      type: 'select',
      label: 'Select',
      model: 'Select',
      values: [],
      edit: false,
    },
  },
  {
    name: 'Text Field',
    schema: {
      type: 'input',
      inputType: 'text',
      label: 'Input',
      model: 'Input',
      edit: false,
    },
  },
  {
    name: 'Text Area',
    schema: {
      type: 'textArea',
      label: 'TextArea',
      model: 'TextArea',
      edit: false,
    },
  },
];

export default tools;
