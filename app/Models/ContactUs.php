<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contactus extends Model
{
    protected $table    = 'contact_us';
    protected $fillable = ['name', 'email', 'message', 'read'];


    public function getReadAttribute($value){
        return $value ? 'Read' : 'Unread';
    }
}
