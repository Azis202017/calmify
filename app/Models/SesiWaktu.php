<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesiWaktu extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'waktu_sesi',

    ];
    public function users() {
        $this->belongsTo(User::class,'id_user','id');
    }
}
