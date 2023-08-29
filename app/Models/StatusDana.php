<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusDana extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public function dana_rab()
    {
        return $this->hasMany(DanaRab::class);
    }

    public function dana_riil()
    {
        return $this->hasMany(DanaRiil::class);
    }
}
