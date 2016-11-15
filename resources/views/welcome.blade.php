@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">Sube un Gif</div>
                    <div class="panel-body">
                        <form id="subir-archivo" class="form-horizontal" role="form" method="POST" action="{{ url('/nuevo') }}">
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

                            <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                                <label for="archivo" class="col-md-4 control-label">Archivo</label>

                                <div class="col-md-6">
                                    <input id="archivo" type="file" class="form-control" name="archivo" value="{{ old('archivo') }}" accept="image/gif" >

                                    @if ($errors->has('archivo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('archivo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-cloud-upload"></i> Subir
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="archives">
                    @foreach($activos as $activo)
                        <div class="archives__wrap--loading">
                            <i class="fa fa-2x fa-circle-o-notch fa-spin"></i>
                            <img src="{{ $activo->link }}" alt="{{ $activo->nombre }}" class="archives__img img-responsive">
                            <a href="{{ $activo->link }}" class="archives__modal" target="_blank" data-titulo="{{ $activo->nombre }}"></a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('partials.template')
    @include('partials.modal')
@endsection
