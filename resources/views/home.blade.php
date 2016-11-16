@extends('layouts.app')

@section('content')
    <!--  -->
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Formato de display</div>
                <div class="panel-body">
                    <div class="row selector">
                        <div class="col-md-8 col-md-offset-2 text-center">
                            <div class="btn-group btn-group-lg" role="group" aria-label="selector">
                                <button type="button" class="btn {{ $opc->activo == 1 ? 'btn-primary active' : 'btn-default' }}" data-seleccion="1">Cuadricula</button>
                                <button type="button" class="btn {{ $opc->activo == 1 ? 'btn-default' : 'btn-primary active' }}" data-seleccion="2">Slick Slider</button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="switch-panel">
                                <div class="switch-opc visible">
                                    <img src="/images/cuadricula.png" class="switch-img">
                                </div>
                                <div class="switch-opc">
                                    <img src="/images/slider.png" class="switch-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        var ajax_token = {headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}};
    </script>
@endsection