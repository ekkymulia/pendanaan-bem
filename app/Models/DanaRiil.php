<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DanaRiil extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'supplier_id', 'proker_id', 'harga_satuan', 'quantity', 'total_harga', 'bukti', 'status_id'
    ];

    public function proker()
    {
        return $this->belongsTo(Proker::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
