<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\AdminResetPasswordNotification;
use Illuminate\Support\Facades\Storage;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['name', 'email', 'password','approved','image'];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getApprovedAttribute($value){
        return $value ? 'Approved' : 'Rejected';
    }

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function setImageAttribute($value) {
        if($this->image) {
           Storage::disk('admins')->delete($this->image);
        }
        $image = request()->image->store('/','admins');
        $this->attributes['image'] = $image;
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

}
