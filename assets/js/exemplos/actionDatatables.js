// adapt input/select to bootstrap
function adaptInputBootstrap(oTable) {
	oTable.each(function() {
		var dt = $(this);

		var dtWrapper = dt.closest('.dataTables_wrapper');
		// SEARCH - Add the placeholder for Search and Turn this into in-line formcontrol
	    var search_input = dtWrapper.find('div[id$=_filter] input');
	    	search_input
	    		.attr('placeholder', 'Buscar')
	    		.addClass('form-control');
	    // LENGTH - Inline-Form control
	    var length_sel = dtWrapper.find('div[id$=_length] select');
		    length_sel.addClass('form-control');
		// LENGTH - Info adjust location
	    var length_sel = dtWrapper.find('div[id$=_info]');
	    	length_sel.css('margin-top', '18px');
	});
}


function ajaxSendForm(modalAtivo, form) {
	var idForm 		= "#" + form.attr('id');
	var queryString = $(idForm).formSerialize();

	var noCloseModal = $('input[name=no-close-modal]').is(':checked');

	var reloadItemNotificaoMonitoramento = false;

	if( form.attr('id') === 'form-edit-monitoramento-resp' ||
		form.attr('id') === 'form-save-auditoria-monitoramento' ||
		form.attr('id') === 'form-save-plano-acao-monitoramento'
	  ) {

		var dados = $(idForm).serializeArray();

		$.each(dados, function(i, field) {
			if(field.name === 'local' && (field.value === 'notificacao' || field.value === 'principal') ) {
				reloadItemNotificaoMonitoramento = true;
			}
		});
	}

	$('.modal-footer button').attr('disabled', 'disabled');

	ajaxLoadAni('In');

	$(idForm).ajaxSubmit({
		type: 'POST',
		url : form.attr('action'),
		data: queryString,
		success : function( resp ) {
			var resp = $.parseJSON(resp),
				respConfirm = false;

			if(resp.success === true)
			{
				ajaxLoadAni('Out');

				if(typeof resp.confirm !== "undefined")
				{
					respConfirm = confirm(resp.msg + "\nDeseja continuar no item?");
				}


				if(respConfirm == true)
				{
					window.location.href = resp.confirm;
				}
				else
				{
					if(typeof resp.msg !== "undefined" && typeof resp.confirm === "undefined")
						alert(resp.msg);

					if ( jQuery.fn.dataTable.versionCheck ) {

						if(typeof oTable !== "undefined") parent.oTable.api().ajax.reload(null, false);
						if(typeof oTable1 !== "undefined") parent.oTable1.api().ajax.reload(null, false);

					} else {

						if(typeof oTable !== "undefined") parent.oTable.fnReloadAjax();
						if(typeof oTable1 !== "undefined") parent.oTable1.fnReloadAjax();

					}

					// if(typeof oTableReload !== "undefined") document.location.reload();

					if(noCloseModal === false) {
						$("#" + modalAtivo).modal('hide');

						if(typeof resp.redirect !== "undefined") {
							window.location.href = resp.redirect;
						}
					}

					if ( reloadItemNotificaoMonitoramento === true ) reloadItem(form) ;

					$('.modal-footer button, button.btn-send').prop('disabled', false);
				}

			}
			else
			{
				$("#msg").html(resp.msg);
				ajaxLoadAni('Out');
				$('.modal-footer button').prop('disabled', false);
				$('button').prop('disabled', false);
			}
		}
	});
}



function reloadItem(form) {
	var idForm 		= "#" + form.attr('id');
	var queryString	= $(idForm).formSerialize();
	var dados 		= $(idForm).serializeArray();
	var monitoramento_resposta_id = 0;
	var unidade_id = 0;
	var lista_monitoramento_id = 0;
	var urlReload	= '';
	var loadFullCalendar = true;

	$.each(dados, function(i, field) {
		if(field.name === 'monitoramento_resposta_id') {
			monitoramento_resposta_id = field.value;
		}

		if(field.name === 'unidade_id') {
			unidade_id = field.value;
		}

		if(field.name === 'lista_monitoramento_id') {
			lista_monitoramento_id = field.value;
		}

		if(field.name === 'urlReload') {
			urlReload = field.value;
		}

		if(field.name === 'local' && field.value === 'principal') {
			loadFullCalendar = false;
		}
	});

	$.ajax({
		type : 'POST',
		url : urlReload,
		data : queryString,
		success : function ( html ) {
			var itens = $("a.editRespMonitoramento");

			$.each(itens, function(i, item) {
				if ( ($(item).data('id') != '' && $(item).data('id') == monitoramento_resposta_id)
					||
					($(item).data('unidade-id') == unidade_id && $(item).data('lista-monitoramento-id') == lista_monitoramento_id)
				 ) {
					$(item).replaceWith( html );
				}
			});

			if (loadFullCalendar) {
				$('.calendar').fullCalendar('refetchEvents');
			}

		}
	});

}


function groupColumnToRowDT(t, column, colspan, classTr) {
	var api  = t.api();
    var rows = api.rows( {page:'current'} ).nodes();
    var last = null;

    api.column(column, {page:'current'} ).data().each( function ( group, i ) {
        if ( last !== group ) {
            $(rows).eq( i ).before(
                '<tr class="'+classTr+'"><td colspan="'+colspan+'">'+group+'</td></tr>'
            );

            last = group;
        }
    } );
}


$(document).ready(function() {

	// acao para salvar
  	$("#save").livequery(function () {
  		$(this).click(function(event) {
  			event.preventDefault();
			ajaxSendForm("create", $('form.form-dialog'));
  		});
  	});

  	// acao para editar
  	$("#saveEdit").livequery(function () {
  		$(this).click(function(event) {
			event.preventDefault();
			ajaxSendForm("edit", $('form.form-dialog-edit'));
		});
	});

	// acao para remover
	$("#remove").livequery(function () {
  		$(this).click(function(event) {
			event.preventDefault();
			ajaxSendForm("delete", $('form.form-dialog-remove'));
		});
	});



});