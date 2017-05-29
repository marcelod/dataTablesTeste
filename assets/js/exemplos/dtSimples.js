var oTable;

$(document).ready(function() {

	var fhc = $("input[name=csrf_test_name]").val();

	oTable = $('#simples').dataTable({
		"processing": true,
        "serverSide": true,
        "ajax": {
            'url'  : "simples/getDataTable",
            'type' : 'post',
            'data' : {
                "csrf_test_name" : fhc
            }
        },

        "columns": [
            { "data": "titulo" },
            { "data": "actions" },
        ],

        "columnDefs": [
            { "width": "105px", "orderable": false, "searchable" : false, 'className' : 'text-center colActions',  "targets": -1 } // actions
        ],

		"drawCallback": function ( settings ) {
			// CREATE NEW ELEMENT
			$('a#new').click(function(){
				$('#create').load('simples/create', {'csrf_test_name': fhc},  function(){
					$('#create').modal();
					removeDialogHidden("#create");
				});
			});

			//EDIT
			$('a.edit_row_dt').click(function(e) {
				var item_id = $(this).data('id');
				$('#edit').load('simples/edit', {'id' : item_id, 'csrf_test_name': fhc}, function(){
					$('#edit').modal();
					removeDialogHidden("#edit");
				});
			});

			//DELETE
			$('a.delete_row_dt').click(function() {
				var item_id = $(this).data('id');
				$('#delete').load('simples/delete', {'id' : item_id, 'csrf_test_name': fhc}, function(){
					$('#delete').modal();
					removeDialogHidden("#delete");
				});
			});
		}
	});

	// adapt input/select to bootstrap
    adaptInputBootstrap(oTable);

});