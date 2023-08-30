<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departemen extends Model
{
    use HasFactory;

    protected $fillable = [
        'ormawa_id', 'user_id', 'tahun_periode', 'nama_departemen', 'ketua_departemen',
        'alamat', 'email', 'no_tlp', 'password', 'wakil_ketua', 'bendahara', 'sekretaris',
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
