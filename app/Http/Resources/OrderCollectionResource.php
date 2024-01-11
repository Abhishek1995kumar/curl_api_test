<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderCollectionResource extends ResourceCollection
{
    
    public function toArray(Request $request) {
        return [
            'id' => $this->id,
        ];
    }
}
