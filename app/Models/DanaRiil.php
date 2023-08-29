<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanaRiil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'proker_id', 'harga_satuan', 'quantity', 'total_harga', 'tempat_pembelian', 'bukti'
    ];

    public function proker()
    {
        return $this->belongsTo(Proker::class);
    }

    public function status_dana()
    {
        return $this->belongsTo(StatusDana::class);
    }
}
