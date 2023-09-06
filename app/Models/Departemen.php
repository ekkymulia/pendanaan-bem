<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departemen extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ormawa_id', 'user_id', 'tahun_periode', 'ketua_departemen',
        'alamat', 'no_tlp', 'wakil_ketua', 'bendahara', 'sekretaris',
        'deskripsi_departemen',
    ];

    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function prokers()
    {
        return $this->hasMany(Proker::class);
    }
}
