<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentar extends Model
{
    use HasFactory;
    protected $fillable = [
        'komentar',
        'img_post',
        'id_community'
    ];

    public function community()
    {
        return $this->belongsTo(Community::class, 'id_community', 'id');
    }
}
