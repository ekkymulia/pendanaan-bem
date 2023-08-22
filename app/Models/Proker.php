<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'departemen_id', 'tahun_proker', 'nama', 'ketua', 'bendahara',
        'RKAT', 'Proposal', 'keterangan', 'dana',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}
