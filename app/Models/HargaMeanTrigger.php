<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaMeanTrigger extends Model
{
    use HasFactory;
    protected $table = 'harga_mean_trigger';
    protected $primaryKey = 'id';
    protected $fillable = [
        'supplier_id',
        'harga_mean',
        'harga_total',
        'items_count',
    ];
}
