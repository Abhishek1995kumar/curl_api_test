<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Seller;


class SellerRegisterResource extends JsonResource {
    public function toArray(Request $request) {
        return [
            // "name"                  => secure($this->name, "D"),
            "username"              => secure($this->name, "D") . ' ' . secure($this->lname, "D"),
            "shop_name"             => $this->shop_name ?? $this->shop_name,
            "bussiness_name"        => $this->bussiness_name ? $this->bussiness_name : NULL,
            "pincode"               => $this->pincode ? $this->pincode : NULL,
            "phone"                 => secure($this->phone,"D"),
            "fax"                   => $this->fax ? $this->fax : NULL,
            "id_proof"              => secure($this->id_proof, "D"),
            "addressproof"          => secure($this->addressproof,"D"),
            "aadhar_card"           => secure($this->aadhar_card,"D"),
            "email"                 => $this->email ?? $this->email,
            // "access_token"          => $this->access_token ?? $this->access_token,
        ];
    }
}
