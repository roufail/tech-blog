<?php


if(!function_exists('images_sizes')){
    function images_sizes(){
        return [
            ['width'=> 190 ,'height' => 110],
            ['width'=> 950 ,'height' => 530],
            ['width'=> 460 ,'height' => 530],
            ['width'=> 250 ,'height' => 210],
            ['width'=> 55  ,'height' => 45 ],
            ['width'=> 70  ,'height' => 40 ],
            ['width'=> 365 ,'height' => 210],
            ['width'=> 400 ,'height' => 230],
        ];
    }
}



if(!function_exists('fetch_image_by_size')){
     function fetch_image_by_size($image,$size){
       $image_arr = explode('.',$image);
       $post_image = $image_arr[0]."-".$size.".".$image_arr[1];
       return Storage::disk('posts')->url($post_image);

    }
}
