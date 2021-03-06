<?php

namespace App\Http\Services;

class ProjectService extends Service
{
    public function handleUploadImages($images,$media){
        return $this->multiUpload($images,$media);
    }

    public function mergeImage($old,$new){
        return array_merge(json_decode($old),$new);
    }

}