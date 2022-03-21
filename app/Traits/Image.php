<?php

namespace App\Traits;

trait Image {

    public function upload($request,$media) {
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $image->move(public_path('/images'),$image_name);
        $image_path = "/images/" . $image_name;
        $media->filename=$image_name;
        $media->url=$image_path;
        $media->save();
        return $media;
    }
    
}