/**
 * Created by jonathan on 21/07/16.
 */
var jQuery = require('jquery');
var imagesLoaded = require('imagesloaded');
var Handlebars = require('handlebars');
(function ($) {
    function validaForm($formulario) {
        var $res = $formulario;
        $formulario.find('input').each(function (i,e) {
            $res = ( $(e).val() === '' || !$res ) ? false : $formulario;
            $(e).parents('.form-group').toggleClass('has-error',$(e).val() === '');
        });
        return $res;
    }
    $(document).ready(function () {

        imagesLoaded.makeJQueryPlugin( $ );
        var source   = $("#archivo-template").html();
        var template = Handlebars.compile(source);
        var ajax_flag = true;

        $('.imagenes_gifs').imagesLoaded( function() {});
        $('#archivo').on('change', function () {
            var regex = new RegExp("(.*?)\.(gif)$").test($(this).val().toLowerCase());
            if (!regex) $(this).val('');
        });

        $('#subir-archivo').submit(function (e) {
            e.stopPropagation();
            e.preventDefault();
            var $form = validaForm($(this));
            if($form !== false && ajax_flag ){
                var formData = new FormData(this);
                ajax_flag = !ajax_flag;
                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: formData,
                    cache: false,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        $('button[type=submit]').html('<i class="fa fa-btn fa-circle-o-notch fa-spin disabled"></i> Subiendo');
                    },
                    success: function(data, textStatus, jqXHR) {
                        if(typeof data.error === 'undefined') {
                            $('.imagenes_gifs').append(template(data));
                        }
                        else {
                            console.log('ERRORS: ' + data.error);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('ERRORS: ' + textStatus);
                    }
                }).always(function () {
                    $('button[type=submit]').html('<i class="fa fa-btn fa-cloud-upload"></i> Subir');
                    ajax_flag = !ajax_flag;
                    $form[0].reset();
                });
            } else {
                console.log('Error en la validación o transferencia en curso');
            }
        });

        $('.borrar').click(function (e) {
            var ajax_token = ajax_token || {};
            e.preventDefault();
            $.ajaxSetup(ajax_token);
            $.post($(this).attr('href'), function( data ) {
               console.log(data);
            });
        });

    });
})(jQuery);
