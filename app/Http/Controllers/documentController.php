<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documento;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class documentController extends Controller
{
    function printdoc($id){
        $doc = Documento::findOrFail($id);
        $qr = QrCode::size(75)->generate(route('document.print', $doc->id));
        return view('Documentos.print',compact(['doc','qr']));
    }
}