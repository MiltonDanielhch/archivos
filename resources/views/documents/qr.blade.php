@extends('template.print-alt')

@section('page_title', 'QR')

@section('btn-extra')
    <button class="btn-print" id="download"> Descargar <i class="fa fa-download"></i></button>   
@endsection

@section('content')
<div class="container">
    <div class="responsive-wrapper">
        <div class="qr">{!! $qr !!}</div>
    </div>     
</div>  
@endsection

@section('css')
<style>
.container{
    display: flex;
    justify-content: center;
    align-items: center;
}
.responsive-wrapper {
    overflow-x: auto;
}
.qr{
    display: flex;
    justify-content: center;
    align-items: center;
    width: 700px;
    height: 700px;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
@media print {
    .qr {
        -webkit-print-color-adjust: exact !important;   /* Chrome, Safari */
        color-adjust: exact !important;  /* Firefox */
    }
}
</style>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
<script>
document.getElementById('download').addEventListener('click', function() {
    let node = document.querySelector('.qr');

    domtoimage.toPng(node)
        .then(function (dataUrl) {
            let link = document.createElement('a');
            link.download = '{{ $document->documentType->name }}{{ $document->DocumentNumber }}.png';
            link.href = dataUrl;
            link.click();
        })
        .catch(function (error) {
            console.error('oops, something went wrong!', error);
        });
});
</script>
@endsection