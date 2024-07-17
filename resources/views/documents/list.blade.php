<div class="col-md-12">
    <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center">Nro&deg;</th>
                    <th style="text-align: center">Titulo</th>
                    <th style="text-align: center">Tipo de Documento</th>
                    <th style="text-align: center">Nro Resolución</th>
                    <th style="text-align: center">Estado</th>

                    <th style="text-align: center">Gestión</th>
                    
                    {{-- @if(auth()->user()->hasPermission('read_egres')||auth()->user()->hasPermission('edit_egres')||auth()->user()->hasPermission('delete_egres')) --}}
                    <th style="width: 150px;text-align: center;">Acciones</th>
                    {{-- @endif --}}
                </tr>
            </thead>
            <tbody>
                @forelse ($data as $item)
                    <tr style="text-align: center">
                        <td>{{$item->id}}</td>
                        <td style="text-align: center">
                            {{$item->Title}}
                        </td>
                        <td>
                            <p><small>{{$item->documentType->name}}</small></p>
                        </td>
                        <td>{{$item->DocumentNumber}}</td>
                        <td style="text-align: center">
                            @if ($item->Status == 'pendiente')
                                <label class="label label-warning">Pendiente</label>
                            @endif
                            @if ($item->Status == 'confirmado')
                                <label class="label label-info">Confirmado</label>
                            @endif
                            @if ($item->Status == 'anulado')
                                <label class="label label-danger">Anulado</label>
                            @endif
                            @if ($item->Status == 'eliminado')
                                <label class="label label-danger">Eliminado</label>
                            @endif
                        </td>
                        <td style="text-align: center">{{$item->Year}}</td>
                        <td style="text-align: right">
                            {{-- <div class="no-sort no-click bread-actions text-right">
                                @if ( $gestion && $item->status == 'pendiente')
                                    <a data-toggle="modal" data-id="{{$item->id}}" data-target="#myModalEnviar" title="Imprimir solicitud" class="btn btn-sm btn-success view">
                                        <i class="fa-solid fa-right-to-bracket"></i> Enviar
                                    </a>   
                                @endif


                                @if( $item->status != 'pendiente' && auth()->user()->hasPermission('print_outbox'))
                                    <a href="{{route('nonstock.show',$item->id)}}" title="Imprimir solicitud" target="_blank" class="btn btn-sm btn-dark view">
                                        <i class="glyphicon glyphicon-print"></i>
                                    </a>   
                                @endif
                                @if($gestion && $item->status == 'pendiente' || $gestion && $item->status == 'enviado')
                                    @if($item->gestion == $gestion->gestion)
                                        @if(auth()->user()->hasPermission('delete_non_stock_requests'))
                                            <a data-toggle="modal" data-id="{{$item->id}}" data-target="#myModalEliminar" title="Eliminar" class="btn btn-sm btn-danger view">
                                                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Eliminar</span>
                                            </a>
                                        @endif
                                    @endif
                                @endif
                                
                            </div> --}}
                            <div>
                                @if ($item->Status == 'pendiente')
                                    {{-- {{ route('documents.showQrCode',$data->getKey())}} --}}
                                    <a href="{{ route('documents.showQrCode',$item->id)}} " class="btn btn-sm btn-warning" target="_blank">
                                        <i class="fa fa-qrcode" style=""></i> <span class="hidden-xs hidden-sm">Qr</span>
                                    </a>
                                    <a href="{{ route('documents.uploadPdf',$item->id) }}" class="btn btn-sm btn-success">
                                        <i class="fa fa-upload"></i><span class="hidden-xs hidden-sm"> PDF</span>
                                    </a>
                                    @if(auth()->user()->hasPermission('delete_documents'))
                                    <a data-toggle="modal" data-id="{{$item->id}}" data-target="#myModalEliminar" title="Eliminar" class="btn btn-sm btn-danger view">
                                        <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">Eliminar</span>
                                    </a>
                                    @endif
                                @endif
                                @if($item->Status == 'confirmado')
                                    <a href="{{ route('documents.showdetails',$item->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa fa-eye"></i> <span class="hidden-xs hidden-sm">Ver</span>
                                    </a>
                                @endif
                            </div>
                        </td>                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <h5 class="text-center" style="margin-top: 50px">
                                {{-- <img src="{{ asset('images/empty.png') }}" width="120px" alt="" style="opacity: 0.5"> <br> --}}
                                No hay resultados
                            </h5>
                        </td>
                    </tr>
                @endforelse                                               
            </tbody>
        </table>
    </div>
</div>

<div class="col-md-12">
    <div class="col-md-4" style="overflow-x:auto">
        @if(count($data)>0)
            <p class="text-muted">Mostrando del {{$data->firstItem()}} al {{$data->lastItem()}} de {{$data->total()}} registros.</p>
        @endif
    </div>
    <div class="col-md-8" style="overflow-x:auto">
        <nav class="text-right">
            {{ $data->links() }}
        </nav>
    </div>
</div>

<script>
   var page = "{{ request('page') }}";
    $(document).ready(function(){
        $('.page-link').click(function(e){
            e.preventDefault();
            let link = $(this).attr('href');
            if(link){
                page = link.split('=')[1];
                list(page);
            }
        });
    });
</script>