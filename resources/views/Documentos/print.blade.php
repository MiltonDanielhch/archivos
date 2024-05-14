<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        #logo {
            position: absolute;
            top: 10px;
            left: 10px;
            max-width: 100px;
            max-height: 50px;
        }
        .myTextBox {
            font-size: 20px;
        }
        .editable {
            cursor: pointer;
            border-bottom: 1px dashed #000;
        }
    </style>
</head>
<body>
    <h1>
        <center>
            DECRETO DE GOBERNACIÓN N°{{ $doc->NrDocumento }} 
            {!!$qr!!}
        </center>
    </h1>
    <button onclick="window.print()">imprimir </button>
    <img src="{{ voyager_asset('images/LogoGobejpg') }}" alt="Imagen">
    <p>
        <strong>VISTOS:</strong>
        <br>
        {!!$doc->Vistos !!}
    </p>
    <p>
        <strong>CONSIDERACIONES:</strong>
        <br>
        {!!$doc->Consideraciones !!}
    </p>
    <p>
        <strong>POR TANTO:</strong>
        <br>

            {!!$doc->PorTanto !!}
    </p>
    <p>
        <strong>RESUELVE:</strong>
        <br>
            {!!$doc->Resuelve !!}
    </p>
</body>
</html>