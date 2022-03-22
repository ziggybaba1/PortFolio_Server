<?php

namespace App\Http\Mappers;

class ClientMapper
{
    public function matchRequest($request,$object){
        return array(
            "name"=>$request->name,
            "email"=>$request->email,
            "description"=>$request->message,
            "IP"=>$object['ip'],
            "created_at"=>$object['uuid']
        );
    }

}