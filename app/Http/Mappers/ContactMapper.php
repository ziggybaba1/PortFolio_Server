<?php

namespace App\Http\Mappers;

class ContactMapper
{
    public function matchRequest($request,$object){
        return array(
            "name"=>$request->name,
            "url"=>$request->url,
            "media"=>$object['media']
        );
    }

}