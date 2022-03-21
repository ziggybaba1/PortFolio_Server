<?php

namespace App\Http\Mappers;

class ProjectMapper
{
    public function matchRequest($request,$object){
        return array(
        "name"=>$request->title,
        "subtitle"=>$request->subtitle,
        "description"=>$request->description,
        "technology"=>$request->technology,
        "repository"=>$request->repository,
        "design"=>$request->design,
        'thumbnail'=>$request->thumbnail,
        "uuid"=>$object['uuid'],
        "link"=>$request->link,
        "contributor"=>$request->contributor,
        "media"=>$object['media']
        );
    }

}