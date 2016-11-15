/**
 * Created by jonathan on 21/07/16.
 */
var jQuery = require('jquery');
var imagesLoaded = require('imagesloaded');

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

        $('.imagenes_gifs').imagesLoaded( function() {});

        $('#subir-archivo').submit(function (e) {
            e.stopPropagation();
            e.preventDefault();
            var $form = validaForm($(this));
            if($form !== false){
                var formData = new FormData(this);
                $.ajax({
                    url: $form.attr('action'),
                    type: 'POST',
                    data: formData,
                    cache: false,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data, textStatus, jqXHR) {
                        if(typeof data.error === 'undefined') {
                            console.log(data);
                        }
                        else {
                            console.log('ERRORS: ' + data.error);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log('ERRORS: ' + textStatus);
                    }
                });
            } else {
                console.log('Erro en la validación', $form);
            }
        });

        $('.borrar').click(function (e) {
            e.preventDefault();
            $.post($(this).attr('href'), function( data ) {
               console.log(data);
            });
        });

    });
})(jQuery);
