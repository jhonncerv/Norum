/**
 * Created by jonathan on 21/07/16.
 */
var jQuery = require('jquery');
(function ($) {

    $(document).ready(function () {
        console.log('sdf');
        $('#subir-archivo');

        $('.borrar').click(function (e) {
            e.preventDefault();
            $.post($(this).attr('href'), function( data ) {
               console.log(data);
            });
        });
        function showResponse(responseText, statusText, xhr, $form)  {
            console.log(statusText,responseText);
        }
    });
})(jQuery);
