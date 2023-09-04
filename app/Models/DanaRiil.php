<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DanaRiil extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama', 'proker_id', 'harga_satuan', 'quantity', 'total_harga', 'tempat_pembelian', 'bukti', 'status_id'
    ];

    public function proker()
    {
        return $this->belongsTo(Proker::class);
    }
}
