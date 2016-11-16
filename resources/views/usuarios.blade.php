@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="tabla">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <!--<th>Editar</th>-->
                                <th>Borrar</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $usuario)
                                <tr>
                                    <th>{{ $usuario->id  }}</th>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <!--<td><a href="/usuarios/{{ $usuario->id }}" class="editar">
                                            <i class="fa fa-2x fa-btn fa-edit text-info"></i></a></td>-->
                                    <td><a href="/usuarios/{{ $usuario->id }}/borrar/" class="borrar">
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
</div>
@endsection

@section('scripts')
    <script>
        var ajax_token = {headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}};
    </script>
@endsection