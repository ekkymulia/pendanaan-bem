<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kalender extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'kalenders';

    protected $fillable = [
        'event_name',
        'event_start_date',
        'event_end_date',
        'event_description',
        'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
