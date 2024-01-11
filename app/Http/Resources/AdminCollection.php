<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class AdminCollection extends ResourceCollection {
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array {
        // return parent::toArray($request);
        return [
            'name' => $this->name,
            'address' => $this->address,
            'email' => $this->email,
        ];
    }
}
