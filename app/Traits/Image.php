<?php

namespace App\Traits;

trait Image {

    public function upload($request,$media) {
        $image = $request->file('image');
        $image_name = str_replace(" ","_",$image->getClientOriginalName());
        $image->move(public_path('/images'),$image_name);
        $image_path = "/images/" . $image_name;
        $media->filename=$image_name;
        $media->url=$image_path;
        $media->save();
        return $media;
    }
    public function multiUpload($request,$media) {
        $array_media=[];
        foreach ($request->file('image') as $imagefile) {
        $image = $imagefile;
        $image_name = str_replace(" ","_",$image->getClientOriginalName());
        $image->move(public_path('/images'),$image_name);
        $image_path = "/images/" . $image_name;
        $media->filename=$image_name;
        $media->url=$image_path;
        $media->save();
        array_push($array_media,['id'=>$media->id,'url'=>$image_path]);
        }
        return $array_media;
    }
    
}