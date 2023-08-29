<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanaRab extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'proker_id', 'harga_satuan', 'quantity', 'total_harga', 'tempat_pembelian', 'status_dana_id'
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
