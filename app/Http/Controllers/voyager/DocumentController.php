<?php

namespace App\Http\Controllers\voyager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use TCG\Voyager\Http\Controllers\VoyagerBaseController;
use App\Models\Document;

class DocumentController extends VoyagerBaseController
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function list()
    {
        /**
         * 
         */
        $search = request('search') ?? null;
        $status = request('status') ?? null;
        $paginate = request('paginate') ?? 10;

        $user = auth()->user();
        // $query_filter = 'registerUser_id = '.$user->id;

        // if(auth()->user()->hasRole('admin'))
        // {
        //     $query_filter =1;
        // }

        //data
        $data = Document::where(function($query) use ($search){
            if ($search) {
                $query->where('Title', 'like', '%' . $search . '%')
                    ->orWhere('DocumentNumber', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%')
                    ->orWhere('Year', 'like', '%' . $search . '%')
                    ->orWhereHas('documentType', function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%');
                    });
            }
        })->whereNull('deleted_at');

        //filter status
        switch($status){
            case 'pendiente':
                $data = $data->where('Status', 'pendiente');
                break;
            case 'confirmado':
                $data = $data->where('Status', 'confirmado');
                break;
            case 'anulado':
                $data = $data->where('Status', 'anulado');
                break;
            case 'eliminado':
                $data = $data->where('Status', 'eliminado');
                break;
        }
        // $data = $data->whereRaw($query_filter)->orderBy('id', 'DESC')->paginate($paginate);
        $data = $data->orderBy('id', 'DESC')->paginate($paginate);
        return view('documents.list', compact('data'));
    }
    public function index(Request $request)
    {
        // return parent::index($request);
        return view('documents.browse');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $document = Document::find($id);
        $document->Status = 'eliminado';
        $document->delete();
        return redirect()->back();
    }
    public function showDetails($id)
    {       
       
        $document = Document::findOrFail($id);
        $documentNumber = str_replace("/", "-", $document->DocumentNumber);
        $documentName = $document->documentType->name . '-' . $documentNumber;

        // if (!$associate->active) {
        //     $error = 'El asociado no se encuentra activo';
        //     return view('associates.show', ['associate' => $associate, 'error' => $error]);
        // }

        return view('documents.showdetails', compact('document','documentName'));
    }
    public function showQrCode($id)
    {
        $document = Document::findOrFail($id);
        // if (!$associate->active) {
        //     $error = 'El asociado no está activo';
        //     return view('associates.show', ['associate' => $associate, 'error' => $error]);
        // }

        $qr = QrCode::size(300)->generate(route('documents.showdetails', $document->id));
        return view('documents.qr', ['document' => $document, 'qr' => $qr]);
    }
    public function uploadpdf($id){
        $document = Document::findOrFail($id);
        return view('documents.uploadpdf', compact('document'));
    }
    public function uploadpdfstore(Request $request){
        $document = Document::findOrFail($request->id);
        $document->PDFFile = $request->file('pdf')->store('documents');
        $document->Status = 'confirmado';
        $document->save();
        return redirect()->route('voyager.documents.index');
    }

    public function showPDF($id,$name)
    {
        $document = Document::findOrFail($id);
        $path = storage_path('app/public/' . $document->PDFFile);
        return response()->file($path);
    }
}
