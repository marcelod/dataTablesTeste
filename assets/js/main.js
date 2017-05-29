var CONF = (function() {
     var myConst = {
         'PROD_LEGISLACAO': '4',
         'PROD_SGDL': '18',
         'PROD_SGM': '8'
     };

     return {
        get: function(name) { return myConst[name]; }
    };
})();


//CRIA A IMAGEM DE CARREGANDO
function ajaxLoadAni(inOut, element, duration) {
    'use strict';

    element = (element == undefined) ? '#ajaxLoadAni' : element;
    duration = (duration == undefined) ? 'slow' : duration;

    if (inOut === 'In') {
        $(element).stop( true, true ).fadeIn(duration); //EXIBE A IMAGEM DE CARRREGANDO
    } else {
        $(element).stop( true, true ).fadeOut(duration); //ESCONDE A IMAGEM DE CARRREGANDO
    }
}


function removeDialogHidden(elementModal) {
	$(elementModal).on('hidden.bs.modal', function() {
		$('.modal-dialog').remove();
	});
}


function resetaCombo(name) {
    'use strict';
    $("select[name='" + name + "']").empty();
    var element = document.createElement('option');
    $(element).attr({
        value : '0'
    });
    $(element).append('--- Selecione ---');
    $("select[name='" + name + "']").append(element);
}


function changeSelect(nameSelect, arResetCombo, path) {
    'use strict';
    $(document).on('change', "select[name=" + nameSelect + "]", function() {
        var valor, url, c, t;
        valor = $(this).val();
        if (valor === 'null') {
            return false;
        }

        for (c = 0, t = arResetCombo.length; c < t; c = c + 1) {
            resetaCombo(arResetCombo[c]);
        }

        url = path + '/' + valor;

        $.ajax({
          dataType: "json",
          url: url,
          async: false,
          success: function(r){
            var option = [];
            $.each(r, function (i, obj) {
                option[i] = document.createElement('option');
                $(option[i]).attr({
                    value : obj.id
                });
                $(option[i]).append(obj.nome);
                $("select[name='" + arResetCombo[0] + "']").append(option[i]);
            });
          }
        });
    });
}


function composeSelect(name, path, data) {
    'use strict';

    resetaCombo(name);

    $.ajax({
        url: path,
        data: data,
        dataType: "json",
        success: function(ret) {

            var option = [];

            $.each(ret, function (i, obj) {
                option[i] = document.createElement('option');
                $(option[i]).attr({
                    value : obj.id
                });
                $(option[i]).append(obj.nome);
                $("select[name='" + name + "']").append(option[i]);
            });
        }
    });
}


function data_us_to_br(dateUSA)
{
    if(dateUSA) {
        var dataS = dateUSA.split('-');
        var ano = dataS[0];
        var mes = dataS[1];
        var dia = dataS[2];
        var dateBR = dia +'/'+ mes +'/'+ ano;
        return dateBR;
    }

    return NULL;
}




function formatResultSelect2TextTitle (item) {
    var markup = '<div class="row">' +
             '<div class="col-lg-12">' + item.text + '</div>' +
             '</div>' +
             '<div class="row">' +
             '<div class="col-lg-12 text-muted">' + item.element[0].title + '</div>' +
             '</div>';

    return markup;
}

function matcherResultSelect2TextTitle(term, text, opt) {
    return text.toUpperCase().indexOf(term.toUpperCase())>=0
           || opt.attr("title").toUpperCase().indexOf(term.toUpperCase())>=0;
}

function matcherResultSelect2MoreOptgroup(term, text, opt) {
    return text.toUpperCase().indexOf(term.toUpperCase())>=0
           || opt.parent("optgroup").attr("label").toUpperCase().indexOf(term.toUpperCase())>=0;
}

function formatResultSelect2OptgroupOption(item) {
    var el = item.element;
    var og = $(el).closest('optgroup').attr('label');

    return og + ' - ' + item.text;
}



$(document).ready(function() {

    //changeSelect('estado', ['cidade'], 'ajax/getCidadesEstado');

    $('.btn-title').livequery(function(){
        $(this).tooltip();
    });

    $('.inputAddNewItem').livequery(function(){
        $(this).click(function() {
            var name_field = $(this).data('name-field'),
                tb_name = $(this).data('tb-name');

            $(this)
                .parents(".form-group")
                .append("<input type='text' class='form-control required' maxlength='255' name='" + name_field + "' placeholder='Insira um novo valor'>");

            $(this).parents(".input-group").remove();
        });
    });


    $('.text_char_limit').livequery(function () {
        $(this).trunk8({
            lines: 2,
            fill: '&hellip; <a id="read-more" href="#">veja mais</a>'
        });
        $(document).on('click', '#read-more', function (event) {
            $(this).parent().trunk8('revert').append(' <a id="read-less" href="#">recolher</a>');
            return false;
        });
        $(document).on('click', '#read-less', function (event) {
            $(this).parent().trunk8();
            return false;
        });
    });



    function formatResultSelect2TextTitle (item) {
        var markup = '<div class="row">' +
                 '<div class="col-lg-12">' + item.text + '</div>' +
                 '</div>' +
                 '<div class="row">' +
                 '<div class="col-lg-12 text-muted">' + item.element[0].title + '</div>' +
                 '</div>';

        return markup;
    }

    function matcherResultSelect2TextTitle(term, text, opt) {
        return text.toUpperCase().indexOf(term.toUpperCase())>=0
               || opt.attr("title").toUpperCase().indexOf(term.toUpperCase())>=0;
    }



    // $('.modal')
    //     .on({
    //         'show.bs.modal': function() {
    //             var idx = $('.modal:visible').length;
    //             $(this).css('z-index', 2040 + (10 * idx));
    //         },
    //         'shown.bs.modal': function() {
    //             var idx = ($('.modal:visible').length) - 1; // raise backdrop after animation.
    //             $('.modal-backdrop').not('.stacked')
    //                 .css('z-index', 2039 + (10 * idx))
    //                 .addClass('stacked');
    //         },
    //         'hidden.bs.modal': function() {
    //             if ($('.modal:visible').length > 0) {
    //                 // restore the modal-open class to the body element, so that scrolling works
    //                 // properly after de-stacking a modal.
    //                 setTimeout(function() {
    //                     $(document.body).addClass('modal-open');
    //                 }, 0);
    //             }
    //         }
    //     });

    /*
    $("#image #userfile").change(function(){
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#view-img').attr({
                    'src': e.target.result,
                    'width': '250px',
                    'height': '250px'
                });
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    */


    // $('.btn-action-datatable').livequery(function () {
    //     $(this).tooltip();
    // });



});


/*$(document).on("click", "a.anchor_paginate", function(e) {
    e.preventDefault();

    var form = $('#form-seach');
    // var cur_page = $('input[name="cur_page"]').val();
    var cur_page = $(this).data('cur-page');
    var page_count = $(this).data('page-count');

    var data = {
      'cur_page' : cur_page,
      'start_paginate' : page_count
    };

    $.ajax({
        'method': "POST",
        'url'   : form.attr('action'),
        'data'  : form.serialize() + '&' + $.param(data),
        beforeSend: function(){
            ajaxLoadAni('In');
        },
        success: function(data){
            $('#lista_itens').html(data);
            ajaxLoadAni('Out');
        }
    });

});*/


// $(document).on("click", ".nav-tabs a[data-toggle=tab]", function(e) {
//     if ($(this).parent().hasClass("disabled")) {
//         e.preventDefault();
//         return false;
//     }
// });

function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}



/**SGM*/
function checkOptRepeticaoMonitoramentoSGM () {
    var check = $(this).is(':checked');

    $('#confRepetir').addClass('hidden');
    $('label[for=dt_validade]').text('*Data de monitoramento');
    $('input[name=dt_validade]').attr('placeholder', 'Data de monitoramento');

    if (check) {
        $('#confRepetir').removeClass('hidden');
        $('label[for=dt_validade]').text('*Data de início:');
        $('input[name=dt_validade]').attr('placeholder', 'Data de início');
    }
}

function alterTextChangeInteval() {
    var valFreq = $(this).val();
    var valueHelpInterval = 'dia';

    switch(valFreq) {
        case '1': // dias
            valueHelpInterval = 'dias';
            $('#list_dow').addClass('hidden');
            break;
        case '2': // semana
            valueHelpInterval = 'semanas';
            $('#list_dow').removeClass('hidden');
            break;
        case '3': // mes
            valueHelpInterval = 'meses';
            $('#list_dow').addClass('hidden');
            break;
        case '4': // ano
            valueHelpInterval = 'anos';
            $('#list_dow').addClass('hidden');
            break;
    }

    $('#fr_txt').text(valueHelpInterval);
}


function changeFieldsAttrDisabledOptEnd() {
    var optSelect = $(this).val();

    if (optSelect == 'all_day') {
        $('input[name=end_count]').attr('disabled', true).val('');
        $('input[name=dt_termino]').attr('disabled', true).val('');
    }

    if (optSelect == 'count') {
        $('input[name=end_count]').attr('disabled', false).val('1');
        $('input[name=dt_termino]').attr('disabled', true).val('');
    }

    if (optSelect == 'in_date') {
        $('input[name=end_count]').attr('disabled', true).val('');
        $('input[name=dt_termino]').attr('disabled', false);
    }
}

function alterDaysOfWeekInDatepicker() {
    var valFreq = $(this).val();

    var list_dow = $('#list_dow');

    switch(valFreq) {
        case '1': // dias
        case '3': // mes
        case '4': // ano
            $('input.datepicker').datepicker('setDaysOfWeekDisabled', []);
            break;
        case '2':
            $('input.datepicker').val('');
            changeDaysOfWeekInDatepicker();
            break;
    }
}


function changeDaysOfWeekInDatepicker() {
    var dow = new Array(0,1,2,3,4,5,6);

    $("input[name='list_dow[]']:checked").each(function(){
        delete dow[$(this).val()];
    });

    $('input.datepicker').datepicker('setDaysOfWeekDisabled', dow);
}