/**
 * Created by jonathan on 21/07/16.
 */
(function ($) {
    $(document).ready(function () {
        console.log("entro");
        $('.borrar').click(function (e) {
            e.preventDefault();
            $.post($(this).attr('href'), function( data ) {
               console.log(data);
            });
        });
    });
})(jQuery);