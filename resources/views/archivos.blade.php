@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <table class="table table-striped table-hover" id="tabla">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Vista Previa</th>
                            <th>Activo</th>
                            <th>Borrar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($archivos as $archivo)
                            <tr>
                                <th>{{ $archivo->id  }}</th>
                                <td>{{ $archivo->nombre }}</td>
                                <td><img src="{{ $archivo->link }}" class="thumb" ></td>
                                <td>
                                    <a href="/proyectos/{{ $archivo->id }}" class="editar">
                                        <i class="fa fa-2x fa-btn {{ $archivo->activo ? 'fa-check-circle-o' : 'fa-circle-o' }}  text-info"></i>
                                    </a>
                                </td>
                                <td><a href="/proyectos/{{ $archivo->id }}/borrar/" class="borrar">
                                        <i class="fa fa-2x fa-btn fa-trash-o text-danger"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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