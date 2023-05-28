<?php

namespace App\Models;

use Illuminate\Contracts\Session\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_metode_pembayaran',
        'no_telepon',
        'tanggal_lahir',
        'alamat',
        'tanggal_sesi',
        'id_waktu_sesi',
        'durasi'
    ];
    public function users() {
        return $this->belongsTo(User::class, 'id_user','id');

    }
    public function metode_pembayaran() {
        return $this->belongsTo(MetodePembayaran::class, 'id_metode_pembayaran','id');

    }
    public function waktu_sesi(){
        return $this->belongsTo(Session::class, 'id_waktu_sesi','id');
    }
}
