@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-heading">Nuevo Proyecto</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/nuevo') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo" class="col-md-4 control-label">Título</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control" name="titulo" value="{{ old('titulo') }}">

                                @if ($errors->has('titulo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('titulo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                            <label for="link" class="col-md-4 control-label">URL al proyecto</label>

                            <div class="col-md-6">
                                <input id="link" type="text" class="form-control" name="link" value="{{ old('link') }}">

                                @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('problema') ? ' has-error' : '' }}">
                            <label for="problema" class="col-md-4 control-label">Problema</label>

                            <div class="col-md-6">
                                <textarea id="problema" class="form-control" name="problema" value="{{ old('problema') }}" rows="6"></textarea>

                                @if ($errors->has('problema'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('problema') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('solucion') ? ' has-error' : '' }}">
                            <label for="solucion" class="col-md-4 control-label">Solución</label>

                            <div class="col-md-6">
                                <textarea id="solucion" class="form-control" name="solucion" value="{{ old('solucion') }}" rows="6"></textarea>

                                @if ($errors->has('solucion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('solucion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('marca_nombre') ? ' has-error' : '' }}">
                            <label for="marca_nombre" class="col-md-4 control-label">Marca</label>

                            <div class="col-md-6">
                                <input id="marca_nombre" type="text" class="form-control" name="marca_nombre" value="{{ old('marca_nombre') }}">

                                @if ($errors->has('marca_nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('marca_nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i> Guardar
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
