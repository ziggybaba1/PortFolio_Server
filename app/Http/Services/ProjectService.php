<?php

namespace App\Http\Services;

class ProjectService
{
    public function handleUploadImages($images,$media){
        $array_media=[];
        foreach ($images as $imagefile) {
            $image_path="";
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

    public function mergeImage($old,$new){
        return array_merge(json_decode($old),$new);
    }

}