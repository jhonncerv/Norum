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
                            <th>Marca</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($proyectos as $proyecto)
                            <tr>
                                <th>{{ $proyecto->id  }}</th>
                                <td>{{ $proyecto->nombre }}</td>
                                <td>{{ $proyecto->marca_nombre }}</td>
                                <td><a href="/proyectos/{{ $proyecto->id }}" class="editar">
                                        <i class="fa fa-btn fa-edit text-info"></i></a></td>
                                <td><a href="/proyectos/{{ $proyecto->id }}/borrar/" class="borrar">
                                        <i class="fa fa-btn fa-trash-o text-danger"></i></a></td>
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
        $(document).ready(function () {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}});
        });
    </script>
@endsection