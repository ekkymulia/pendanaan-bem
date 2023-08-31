<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'departemen_id', 'tahun_proker', 'nama', 'ketua', 'bendahara',
        'rkat', 'bptn', 'Proposal', 'keterangan', 'dana', 'status_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
