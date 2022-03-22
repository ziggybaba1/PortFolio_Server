<?php

namespace App\Http\Mappers;

class BlogMapper
{
    public function matchRequest($request,$object){
        return array(
            "title"=>$request->title,
            "subtitle"=>$request->subtitle,
            "meta"=>$request->meta,
            "description"=>$request->description,
            "uuid"=>$object['uuid'],
            "posted_by"=>\Auth::user()->id,
            "created_at"=>$object['timestamp'],
            "thumbnail"=>$object['media'],
            "fullimage"=>$object['media'],
        );
    }

}