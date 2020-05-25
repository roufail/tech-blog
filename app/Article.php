<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Article extends Model
{
    //
    // protected $hidden = ['created_at','updated_at'];
    protected $fillable  = ['title','body','user_id'];
    public function user() {
        return $this->belongsTo(\App\User::class);
    }
}
