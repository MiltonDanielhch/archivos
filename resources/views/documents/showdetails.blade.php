@extends('base')
@section('page_title', 'Verificar documento')
@section('content')
<div class="container">
    @if ($document->Status == 'confirmado')
        <div class="row">
            <div class="col-md-12 mt-5 text-center">
                <h1 class="span-title">Verificar documento</h1>
                <h1 class="section-title">Documento Válido</h1>
                <p>Se encontro la siguiente información del documento.</p>
            </div>
        </div>
        <div class="row m-5">
            <hr>
            <div class="col-md-6">
                <div class="form-group
                ">
                    <label for="documentType">Descripción</label>
                    <input type="text" class="form-control" id="documentType" value="{{ $document->documentType->name }} {{ $document->DocumentNumber }}" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group
                ">
                    <label for="Year">Gestión</label>
                    <input type="text" class="form-control" id="Year" value="{{ $document->Year }}" readonly>
                </div>
            </div>
            
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                @if(isset($document->PDFFile))
                    {{-- <iframe src="{{ Storage::url($document->PDFFile) }}" style="width:100%; height:500px;" frameborder="0"></iframe> --}}
                    <iframe src="{{ route('documents.showPDF', ['id' => $document->id,'name' => $documentName]) }}" style="width:100%; height:500px;" frameborder="0"></iframe>
                @else
                    <p>No hay archivo PDF disponible.</p>
                @endif
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12 mt-5 text-center">
                <h1 class="span-title" style="color: red;">No disponible</h1>
                <h1 class="section-title" style="color: red;">Documento Inválido</h1>
                <p>No se encontro información del documento.</p>
            </div>
        </div>
    @endif
</div>
@endsection