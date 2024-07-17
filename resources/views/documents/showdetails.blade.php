@extends('base')
@section('page_title', 'Verificar documento')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Verificar documento</h3>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title
                    ">Datos del documento</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group
                            ">
                                <label for="documentType">Tipo de documento</label>
                                <input type="text" class="form-control" id="documentType" value="{{ $document->documentType->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group
                            ">
                                <label for="DocumentNumber">Número de documento</label>
                                <input type="text" class="form-control" id="DocumentNumber" value="{{ $document->DocumentNumber }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group
                            ">
                                <label for="Title">Título</label>
                                <input type="text" class="form-control" id="Title" value="{{ $document->Title }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group
                            ">
                                <label for="Year">Gestión</label>
                                <input type="text" class="form-control" id="Year" value="{{ $document->Year }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group
                            ">
                                <label for="Status">Estado</label>
                                <input type="text" class="form-control" id="Status" value="{{ $document->Status }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group
                            ">
                                <label for="created_at">Fecha de creación</label>
                                <input type="text" class="form-control" id="created_at" value="{{ $document->created_at }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title
                    ">Archivo adjunto</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>{{$document->PDFFile}}</p>
                            @if(isset($document->PDFFile))
                                <iframe src="{{ Storage::url($document->PDFFile) }}" style="width:100%; height:500px;" frameborder="0"></iframe>
                            @else
                                <p>No hay archivo PDF disponible.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
