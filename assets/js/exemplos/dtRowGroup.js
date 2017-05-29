var oTable;

$(document).ready(function() {

	var fhc = $("input[name=csrf_test_name]").val();

	oTable = $('#simples').dataTable({
		"processing": true,
        "serverSide": true,
        "ajax": {
            'url'  : "rowgroup/getDataTable",
            'type' : 'post',
            'data' : {
                "csrf_test_name" : fhc
            }
        },

        "columns": [
            { "data": "agrupador" },
            { "data": "titulo" },
            // { "data": "actions" },
        ],

        "orderFixed": [[ 0, 'asc' ]],

        "order": [[ 1, 'asc' ]],

        "pageLength": 25,

        "columnDefs": [
            { "visible": false, "targets": 0 }, // agrupador
            // { "width": "105px", "orderable": false, "searchable" : false, 'className' : 'text-center colActions',  "targets": 2 }, // btn_avaliacao
            // { "width": "105px", "orderable": false, "searchable" : false, 'className' : 'text-center colActions',  "targets": -1 } // actions
        ],


		"drawCallback": function ( settings ) {

			groupColumnToRowDT(this, 0, 2, 'info');

		}
	});

	// adapt input/select to bootstrap
    adaptInputBootstrap(oTable);

});