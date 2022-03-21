<?php

namespace App\Http\Mappers;

class TestimonyMapper
{
    public function matchRequest($request,$object){
        return array(
            "name"=>$request->name,
            "title"=>$request->title,
            "description"=>$request->description,
            "media"=>$object['media']
        );
    }

}