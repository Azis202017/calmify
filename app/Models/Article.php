<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['id_user','id_category','title','description','imgUrl'];
    public function users() {
        return $this->belongsTo(User::class,'id_user','id');

    }
    public function category() {
        return $this->belongsTo(Category::class,'id_category','id');
    }
}
