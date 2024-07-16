@extends('voyager::master')
@section('page_title', 'Documentos')
@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h1 class="page-title">
                    <i class="voyager-documentation"></i> Documentos
                </h1>
            </div>
            <div class="col-md-8 text-right" style="padding-top: 10px">
                @if(auth()->user()->hasPermission('add_documents'))
                    <a href="{{ route('voyager.documents.create') }}" class="btn btn-success btn-add-new">
                        <i class="voyager-plus"></i> <span>Crear</span>
                    </a>
                @endif
            </div>
        </div>
    </div>
@stop
@section('content')
<div class="page-content browse container-fluid">
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    {{-- alert para dar informacion sobre la nueva funcionalidad --}}
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-bordered">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-10">
                            <div class="dataTables_length" id="dataTable_length">
                                <label>Mostrar <select id="select-paginate" class="form-control input-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> registros</label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" id="input-search" class="form-control">
                        </div>

                        <div class="col-sm-12 text-right">
                            <label class="radio-inline"><input type="radio" class="radio-type" name="optradio" value="pendiente" checked>Pendientes</label>
                            <label class="radio-inline"><input type="radio" class="radio-type" name="optradio" value="confirmado">Confirmados</label>
                            <label class="radio-inline"><input type="radio" class="radio-type" name="optradio" value="anulado">Anulados</label>
                            {{-- <label class="radio-inline"><input type="radio" class="radio-type" name="optradio" value="eliminado">Eliminado</label>                              --}}
                        </div>
                    </div>
                    <div class="row" id="div-results" style="min-height: 120px"></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal modal-success fade" tabindex="-1" id="myModalEnviar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'nonstock.send', 'method' => 'post']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa-solid fa-file"></i> Solicitud de inexistencia</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">

                <div class="text-center" style="text-transform:uppercase">
                    <i class="fa-solid fa-file" style="color: rgb(134, 127, 127); font-size: 5em;"></i>
                    <br>
                    
                    <p><b>Desea enviar la solicitud de inexistencia?</b></p>
                </div>
            </div>                
            <div class="modal-footer">
                
                    <input type="submit" class="btn btn-success pull-right delete-confirm" value="Sí, enviar">
                
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
            </div>
            {!! Form::close()!!} 
        </div>
    </div>
</div> --}}

{{-- <div class="modal modal-success fade" tabindex="-1" id="myModalConfirmarEliminacion" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'outbox-delete.confirmar', 'method' => 'post']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa-solid fa-check"></i> Confirmar Eliminación</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-warning">
                    <strong>Aviso: </strong>
                    <p>Al confirmar la eliminacion, usted debera devolver todos el detalle o artículo de este pedio al encargado del almacen.</p>
                </div> 
                <input type="hidden" name="id" id="id">

                <div class="text-center" style="text-transform:uppercase">
                    <i class="fa-solid fa-check" style="color: rgb(134, 127, 127); font-size: 5em;"></i>
                    <br>
                    <br>
                    
                    <p><b>Desea confirmar la elminación?</b></p>
                </div>
            </div>                
            <div class="modal-footer">
                
                    <input type="submit" class="btn btn-success pull-right delete-confirm" value="Sí, confirmar">
                
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
            </div>
            {!! Form::close()!!} 
        </div>
    </div>
</div> --}}


{{-- <div class="modal modal-danger fade" tabindex="-1" id="myModalCancelarEliminacion" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            {!! Form::open(['route' => 'outbox-delete.cancelar', 'method' => 'post']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa-solid fa-xmark"></i> Cancelar</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id" id="id">

                <div class="text-center" style="text-transform:uppercase">
                    <i class="fa-solid fa-xmark" style="color: red; font-size: 5em;"></i>
                    <br>
                    
                    <p><b>Desea cancelar la anulacion del pedido?</b></p>
                </div>
            </div>                
            <div class="modal-footer">
                
                    <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Sí, aceptar">
                
                <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
            </div>
            {!! Form::close()!!} 
        </div>
    </div>
</div> --}}

<div class="modal modal-danger fade" tabindex="-1" id="myModalEliminar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('documents.delete') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> - Desea eliminar el siguiente ingreso?</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
    
                    <div class="text-center" style="text-transform:uppercase">
                        <i class="voyager-trash" style="color: red; font-size: 5em;"></i>
                        <br>
                        
                        <p><b>Desea eliminar el siguiente registro?</b></p>
                    </div>
                </div>                
                <div class="modal-footer">
                    
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Sí, eliminar">
                    
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
            {{-- {!! Form::open(['route' => 'documents.delete', 'method' => 'post']) !!}
            
            {!! Form::close()!!}  --}}
        </div>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{ url('js/main.js') }}"></script>
<script>
    var countPage = 10, order = 'id', typeOrder = 'desc';
    $(document).ready(() => {
        list();
        $('.radio-type').click(function(){
            list();
        });
        $('#input-search').on('keyup', function(e){
            if(e.keyCode == 13) {
                list();
            }
        });

        $('#select-paginate').change(function(){
            countPage = $(this).val();
        
            list();
        });
    });

    function list(page = 1){
        var loader = '<div class="col-md-12 bg"><div class="loader" id="loader-3"></div></div>'
        $('#div-results').html(loader);

        let status = $(".radio-type:checked").val();

        let url = "{{ route('documents.list') }}";
        let search = $('#input-search').val() ? $('#input-search').val() : '';

        $.ajax({
            url: `${url}?search=${search}&status=${status}&paginate=${countPage}&page=${page}`,

            type: 'get',
            
            success: function(result){
            $("#div-results").html(result);
        }});

    }
    // ---------- Enviar -------------
    $('#myModalEnviar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id');

        var modal = $(this)
        modal.find('.modal-body #id').val(id)
    });
    //----------------- Borrar -------------------
    $('#myModalEliminar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id');

        var modal = $(this)
        modal.find('.modal-body #id').val(id)
    });
</script>
@endsection