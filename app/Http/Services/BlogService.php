<?php

namespace App\Http\Services;



class BlogService extends Service
{
    public function handleUploadImages($images,$media){
       return $this->upload($images,$media);
    }
}