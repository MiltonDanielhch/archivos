<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title></title>
        <!-- Favicon -->
            <link rel="shortcut icon" href="{{ asset('images/icon.png') }}" type="image/png">
        <style>
            p{
                text-align: justify;
            }
            body{
                margin: 0px auto;
                font-family: Arial, sans-serif;
            }
            .container {
                display: flex;
                justify-content: center;
                width: 100%;
                background: rgb(115,117,117);
                background: linear-gradient(90deg, rgba(115,117,117,1) 0%, rgba(173,173,173,1) 50%, rgba(115,117,117,1) 100%);
            }
            .sheet {
                padding: 30px;
                width: 750px;
                background-color: white
            }
            .content {
                text-align: justify;
                padding: 0px 34px;
                font-size: 13px;
                min-height: 100vh;
            }
            #logo{
                margin: 0px;
                height: 60px;
            }
            .page-head {
                text-align: center;
            }
            .page-head h3 {
                margin-top: 0px !important
            }
            #watermark {
                position: fixed;
                width: 100%;
                text-align: center;
                top: 350px;
                opacity: 0.1;
                z-index:  0;
            }
            #watermark img{
                position: relative;
                width: 300px;
            }

            .btn {
                padding: 8px 15px
            }
            .text-center{
                text-align: center;
            }
            ol p{
                margin: 10px
            }
            .table-signature {
                width: 100%;
                text-align: center;
                margin-top: 80px;
                margin-bottom: 50px;
            }

            @page {
                size: letter;
                margin: 10mm 10mm 10mm 10mm;
            }
            @media print {
                body{
                    margin: 0px auto;
                }
                .options {
                    display: none
                }
                .sheet {
                    padding: 0px;
                    width: 100%;
                    background-color: white
                }
                .container {
                    background-color: transparent
                }
                .content {
                    min-height: auto;
                }
                .table-signature {
                    margin-bottom: 0px;
                }
            }
            .text-justify {
        text-align: justify !important;
    }
        </style>
    </head>
    <body>
        @if($doc->Idtipo == 5)
        <div id="watermark">
            <img src="{{ asset('images/LogoGobe.jpg') }}" /> 
        </div>
        <div class="container">
            <div class="sheet">
                <table width="100%">
                    <tr>
                        <td width="100px"><img id="logo" src="{{ asset('images/LogoGobe.jpg') }}" /></td>
                        <td></td>
                        <td width="100px" style="text-align: right">{!! $qr !!}</td>
                    </tr>
                </table>
                <div class="options" style="position: fixed; bottom: 10px; right: 20px">
                            <button type="button" class="btn btn-print" onclick="window.print()">Imprimir</button>
                            <button type="button" class="btn btn-save" style="display: none">Guardar</button>
                      
                </div>
                <b><center>{!!$doc->tipoDocumento->nomdoc !!}<br> &nbsp; {{ $doc->NrDocumento }}</center></b>
                <p>
                    {!! $doc->Cuerpo !!}
                </p>
            </div>
        </div>
        @else
        <div id="watermark">
            <img src="{{ asset('images/LogoGobe.jpg') }}" /> 
        </div>
        <div class="container">
            <div class="sheet">
                <table width="100%">
                    <tr>
                        <td width="100px"><img id="logo" src="{{ asset('images/LogoGobe.jpg') }}" /></td>
                        <td></td>
                        <td width="100px" style="text-align: right">{!! $qr !!}</td>
                    </tr>
                </table>
                <div class="options" style="position: fixed; bottom: 10px; right: 20px">
                            <button type="button" class="btn btn-print" onclick="window.print()">Imprimir</button>
                            <button type="button" class="btn btn-save" style="display: none">Guardar</button>
                      
                </div>
                <b><center>{!!$doc->tipoDocumento->nomdoc !!} &nbsp; {{ $doc->NrDocumento }}<br>Dr. José Alejandro Unzueta Shiriqui<br>GOBERNADOR DEL DEPARTAMENTO AUTÓNOMO DEL BENI</center></b>
                <p>
                    {!! $doc->Cuerpo !!}
                </p>
            </div>
        </div>
        @endif
        @yield('css')

        <script>
            window.onafterprint = function(event) {
                console.log('before print');
            };
        </script>

        <script src="{{ asset('js/jquery-3.4.1.min.js')}}" ></script>
        <script>
            $(document).ready(function () {
                $('#location-id').change(function () {
                    $('#label-location').html($(this).val());
                });

                $('.btn-edit').click(function(){
                    document.designMode = 'on';
                    $(this).css('display', 'none');
                    $('.btn-print').css('display', 'none');
                    $('.btn-save').css('display', 'block');
                });
                $('.btn-save').click(function(){
                    document.designMode = 'off';
                    $(this).css('display', 'none');
                    $('textarea[name="text"]').text($('.content').html());
                    $('#form-submit').trigger('submit');
                });
                $('.btn-print').click(function(){
                    window.print();
                });
            });
        </script>
        @yield('script')
    </body>
</html>