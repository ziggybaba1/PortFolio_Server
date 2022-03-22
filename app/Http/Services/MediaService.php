<?php

namespace App\Http\Services;

class MediaService extends Service
{
    public function handleUploadImages($images,$media){
        return $this->multiUpload($images,$media);
    }
}