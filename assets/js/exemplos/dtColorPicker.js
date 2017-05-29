var oTable;

$(document).ready(function() {

	var fhc = $("input[name=csrf_test_name]").val();

	oTable = $('#color_picker').dataTable({
		"processing": true,
        "serverSide": true,
        "ajax": {
            'url'  : "colorpicker/getDataTable",
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

			//EDIT
			$('a.edit_row_dt').click(function(e) {
				var item_id = $(this).data('id');
				$('#edit').load('colorpicker/edit', {'id' : item_id, 'csrf_test_name': fhc}, function(){
					$('#edit').modal();
					removeDialogHidden("#edit");
				});
			});

		}
	});

	// adapt input/select to bootstrap
    adaptInputBootstrap(oTable);

});