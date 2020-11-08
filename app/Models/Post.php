<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Storage,Image;
class Post extends Model
{
    protected $fillable = ['title','content','image','user_id','keywords','description','approved'];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setImageAttribute($value) {
        if($this->image) {
            $delete_ar = explode(".",$this->image);
            $allPostsImages = Storage::disk('posts')->files('');
            $matchingImages = preg_grep('/^'.$delete_ar[0].'*/',$allPostsImages);
            Storage::disk('posts')->delete($matchingImages);
        }
        $image = request()->image->store('/','posts');

        // resize image
        $temp_image = Storage::disk('posts')->get($image);
        $image_name_ar = explode('.', $image);

        foreach(images_sizes() as $image_size){
            $resize_image = Image::make($temp_image)->resize($image_size['width'],$image_size['height'])->stream();
            $resize_name = $image_name_ar[0]."-".$image_size['width']."X".$image_size['height'].".".$image_name_ar[1];
            Storage::disk('posts')->put($resize_name,$resize_image);
        }
        $this->attributes['image'] = $image;
    }


    public function getHomePostImageAttribute() {
       return fetch_image_by_size($this->image,'250X210');
    }
    public function getHomePostImage950X530Attribute() {
       return fetch_image_by_size($this->image,'950X530');
    }
    public function getHomePostImage460X530Attribute() {
       return fetch_image_by_size($this->image,'460X530');
    }

    public function getNextPreviousPostImage70X40Attribute() {
       return fetch_image_by_size($this->image,'70X40');
    }

    public function getRelatedPostImage365X210Attribute() {
       return fetch_image_by_size($this->image,'365X210');
    }



    public function getApprovedAttribute($value){
        return $value ? 'Approved' : 'Rejected';
    }



    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
