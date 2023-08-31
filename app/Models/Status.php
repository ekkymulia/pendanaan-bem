<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

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
