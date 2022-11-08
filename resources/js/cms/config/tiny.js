export default {
  skin_url: '/assets/js/cms/tinymce/skins/custom',
  branding: false,
  menubar: false,
  statusbar: false,
  external_plugins: {
    link: '/assets/js/cms/tinymce/plugins/link/plugin.min.js',
  },
  plugins: ['lists', 'code', 'link'],
  toolbar: 'undo redo | bold | bullist | link | superscript | removeformat | styleselect | code',
  paste_as_text: true,
  height: "320px",
  style_formats_merge: false,
  style_formats: [{
    title: 'Text',
    items: [
      { title: 'Liste', block: 'ul', classes : 'list' },
      { title: 'Überschrift 1', block : 'h1'},
      { title: 'Überschrift 2', block : 'h2'},
    ],
  }],

  link_list: '/filelist',
};
