<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    
    protected $casts = [
        'media' => 'array'
    ];
    protected $fillable = [
        'name', 'description','technology','repository','design','link','contributor','clap','media'
    ];
    // public function images()
    // {
    //  return $this->hasMany('App\Models\Media', 'product_id');
    // }
}
