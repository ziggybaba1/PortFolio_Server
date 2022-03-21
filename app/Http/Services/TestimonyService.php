<?php

namespace App\Http\Services;



class TestimonyService extends Service
{
    public function handleUploadImages($images,$media){
       return $this->upload($images,$media);
    }
}