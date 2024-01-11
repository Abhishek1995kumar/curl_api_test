<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model {
    use HasFactory;
    protected $table = "product_attr_gallery";

    // public function  product_attr_gallery() {
    //     return $this->belongsTo(Product::class, "pid");
    // }
}
