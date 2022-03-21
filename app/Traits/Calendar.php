<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use \Carbon\Carbon;



trait Calendar {

    public function now() {
        return Carbon::now();
    }
    
}