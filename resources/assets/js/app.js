/**
 * Created by jonathan on 21/07/16.
 */
global.jQuery = require('jquery');
require('bootstrap-sass/assets/javascripts/bootstrap/dropdown');
require('bootstrap-sass/assets/javascripts/bootstrap/collapse');

(function ($) {
    /*
    Función que valida el formulario de subida de archivos
    @param Object jQuery
    @return Object jQuery or false
     */
    function validaForm($formulario) {
        var $res = $formulario;
        $formulario.find('input').each(function (i,e) {
            $res = ( $(e).val() === '' || !$res ) ? false : $formulario;
            $(e).parents('.form-group').toggleClass('has-error',$(e).val() === '');
        });
        return $res;
    }
    function imagesProgress(instance, image) {
        var $class = image.isLoaded ? 'archives__wrap' : 'archives__wrap--broken';
        $(image.img.parentNode).removeClass('archives__wrap--loading').addClass($class);
    }
    function activaModal(e) {
        e.preventDefault();
        $('body').addClass('modal-open');
        $('.modal').show().find('.modal-body img').attr('src',$(this).attr('href'));
        $('#myModalLabel').html($(this).data('titulo'));
        setTimeout(function () { $('.modal, .modal-overlay').addClass('in'); },100);
    }
    function window_size(winWidth, winHeight) {
        var winTop = (screen.height / 2) - (winWidth / 2),
            winLeft = (screen.width / 2) - (winHeight / 2);
        return 'top=' + winTop + ',left=' + winLeft +
            ',toolbar=0,status=0,width=' + winWidth + ',height=' + winHeight;
    }
    var App = {
        // Código necesario para el funcionamiento del Home aka. Welcome
        'home': {
            init: function () {
                var imagesLoaded = require('imagesloaded');
                var Handlebars = require('handlebars');
                var source   = $("#archivo-template").html();
                var template = Handlebars.compile(source);
                var slick = require('slick-carousel');
                var ajax_flag = true;
                imagesLoaded.makeJQueryPlugin( $ );
                $('.archives').imagesLoaded().progress(imagesProgress);
                $('#archivo').on('change', function () {
                    var regex = new RegExp("(.*?)\.(gif)$").test($(this).val().toLowerCase());
                    if (!regex) $(this).val('');
                });
                $('.archives__modal').click(activaModal);
                $('.social_fb').click(function (e) {
                    e.preventDefault();
                    var $url = 'https://www.facebook.com/dialog/share?app_id=1687604064789210&display=popup' +
                        '&href=' + encodeURIComponent($(this).attr('href'));
                    window.open($url, 'Compartir', window_size(520, 350));
                });
                $('.modal-overlay,.close').click(function () {
                    $('body').removeClass('modal-open');
                    $('.modal, .modal-overlay').removeClass('in');
                    setTimeout(function () { $('.modal').hide().find('.modal-body img').attr('src',''); },100);
                });
                $('.slider').slick({
                    infinite: false,
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    dots: true,
                    speed: 300,
                    responsive: [
                        {
                            breakpoint: 1200,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        },
                        {
                            breakpoint: 992,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                    ]
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
                                    var $datos = $(template(data));
                                    $datos.find('.archives__modal').click(activaModal);
                                    $('.archives').append($datos).imagesLoaded().progress(imagesProgress);
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
            }
        },
        // Código necesario para el funcionamiento del dashboard
        'dashboard': {
            init: function () {
                $.ajaxSetup(ajax_token);
                function llamadaAjax(e) {
                    e.preventDefault();
                    var $this = $(this);
                        $this.html('<i class="fa fa-btn fa-circle-o-notch fa-spin ' + ($this.hasClass('editar') ?' text-info': 'text-danger') + '"></i>');
                    $.post($this.attr('href'), function( data ) {
                        if( $this.hasClass('editar') )
                            $this.html('<i class="fa fa-2x fa-btn ' + (data.activo ? 'fa-check-circle-o' : 'fa-circle-o') + ' text-info"></i>');
                        else
                            $this.parents('tr').remove();
                    });
                }
                $('.borrar, .editar').click(llamadaAjax);
            }
        },
        //Código a ejecutarse cuando es un slider en vez de la cuadricula
        'slickslider':{
            init: function () {
                var flag = true;
                $.ajaxSetup(ajax_token);
                $('.selector .btn').click(function () {
                    if (!$(this).hasClass('active') && flag){
                        $('.btn-primary').removeClass('btn-primary').removeClass('active').addClass('btn-default');
                        $(this).removeClass('btn-default').addClass('btn-primary active');
                        $('.switch-opc').toggleClass('visible');
                        flag = !flag;
                        $.post('/switch/' + $(this).data('seleccion'), function (data) {
                            flag = !flag;
                        });
                    }
                });
            }
        }
    };
    //función que disparará el código dependiendo del contexto en el que se este
    var UTIL = {
        fire: function(func) {
            var fire = func !== '';
            var namespace = App, funcname = 'init' ;
            fire = fire && namespace[func];
            fire = fire && typeof namespace[func][funcname] === 'function';
            if (fire) {
                namespace[func][funcname]();
            }
        },
        loadEvents: function() {
            $.each(document.body.className.split(/\s+/), function(i, classnm) {
                UTIL.fire(classnm);
            });

        }
    };
    // inicia js.
    $(document).ready(UTIL.loadEvents);
})(jQuery);
