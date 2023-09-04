<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Status extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama'
    ];

    public function proker()
    {
        return $this->hasMany(Proker::class);
    }

    public function dana_rab()
    {
        return $this->hasMany(DanaRab::class);
    }
}
