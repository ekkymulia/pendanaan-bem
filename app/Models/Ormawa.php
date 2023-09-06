<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ormawa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'tahun_periode', 'ketua', 'wakil', 'bendahara',
        'sekretaris', 'ketua_pengawas', 'fakultas', 'alamat', 'no_telp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function departements()
    {
        return $this->hasMany(Departemen::class);
    }
}
