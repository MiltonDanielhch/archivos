@extends('voyager::master')
@section('page_title', 'Confirmar Documentos')
@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h1 class="page-title">
                    <i class="voyager-documentation"></i>  Confirmar Documento
                </h1>
            </div>
        </div>
    </div>
@stop
@section('content')
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body" >
                        <div>
                            <h1 class="panel-title" style="font-size: 32px;font-weight: bold;">
                                {{strtoupper($document->Title)}}
                            </h1>
                            <h2 class="panel-title" style="font-size: 20px;font-weight: bold;">
                                {{strtoupper($document->documentType->name)}}
                                {{strtoupper($document->DocumentNumber)}}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body" >
                        <div>
                            <form id="formPDF" action="{{route('documents.uploadPdfstore', $document->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="pdf" style="font-weight: bold;">Subir PDF</label>
                                    <input type="file" style="width: 100%" name="pdf" id="pdf" accept=".pdf" required>
                                </div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#confirmSubmitModal">
                                    Confirmar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal de confirmación -->
    <div class="modal fade" id="confirmSubmitModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"> Confirmación</h4>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que quieres enviar este formulario?
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="confirmCheck">
                        <label class="form-check-label" for="confirmCheck">
                            Sí, estoy seguro.
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <!-- Botón que realmente envía el formulario -->
                    <button type="button" class="btn btn-primary" id="submitFormButton" disabled>Confirmar Envío</button>
                </div>
            </div>
        </div>
    </div>
@stop
@section('javascript')
<script>
    // Habilitar el botón de envío cuando el checkbox esté marcado
    document.getElementById('confirmCheck').addEventListener('change', function(e) {
        document.getElementById('submitFormButton').disabled = !e.target.checked;
    });

    // Enviar el formulario cuando se confirme
    document.getElementById('submitFormButton').addEventListener('click', function() {
        // Asegúrate de que el formulario tenga un ID para este paso
        document.getElementById('formPDF').submit();
    });
</script>
@stop