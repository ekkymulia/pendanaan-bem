<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DanaRab extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama', 'proker_id', 'harga_satuan', 'quantity', 'total_harga',
    ];

    public function proker()
    {
        return $this->belongsTo(Proker::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
