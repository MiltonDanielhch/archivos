<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'NrDocumento',
        'A',
        'VIA',
        'DE',
        'Ref',
        'Fecha',
        'Antecedentes',
        'BaseLegal',
        'ConclusiondesyConsideraciones',
        'Vistos',
        'Consideraciones',
        'PorTanto',
        'Decreta',
        'Resuelve',
        'Articulo',
        'Idtipo',
        // Otros campos aquí
    ];
    public function tipoDocumento()
    {
        return $this->belongsTo(Tipo::class, 'Idtipo');
    }
}
