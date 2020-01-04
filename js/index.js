$(document).ready(function() {
  var table = $('#example').DataTable({
    'ajax': 'https://api.myjson.com/bins/1us28',
    columns:[{checkboxes:{selectRow:true}},null,null,null,null,null,null],
    'select': {
      'style': 'multi',
      selector: 'td:first-child'
    },
    'order': [
      [1, 'asc']
    ]
  });
})