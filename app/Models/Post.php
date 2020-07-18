<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Post extends Model
{
    protected $fillable = ['title','content','image','user_id','keywords','description','approved'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function setImageAttribute($value) {
        $image = request()->image->store('/','posts');
        $this->attributes['image'] = $image;
    }

    public function getApprovedAttribute($value){
        return $value ? 'Approved' : 'Rejected';
    }
}
