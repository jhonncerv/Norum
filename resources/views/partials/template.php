<script id="archivo-template" type="text/x-handlebars-template">
    <div class="archives__wrap--loading">
        <i class="fa fa-2x fa-circle-o-notch fa-spin archives__loader"></i>
        <img src="{{ path }}" alt="{{ titulo }}" class="archives__img img-responsive">
        <a href="{{ path }}" class="archives__modal" target="_blank" data-titulo="{{ titulo }}">
            <i class="fa fa-expand"></i>
        </a>
        <div class="archives__social">
            <a href="{{ path }}" target="_blank" class="social_fb">
                <i class="fa fa-facebook"></i>
            </a>
        </div>
    </div>
</script>