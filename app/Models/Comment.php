<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'email', 'content','post_id','user_id','approved'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function getApprovedAttribute($value){
       return  $value ? 'Approved' : 'Rejected';
    }


    public function getNameAttribute($value){
        return  $this->user_id ? $this->user->name : $value;
    }

    public function getEmailAttribute($value){
        return  $this->user_id ? $this->user->email : $value;
    }

}
