<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributs extends Model {
    use HasFactory;
    protected $table = "product_attrs";
    // public function product_attrs() {
    //     return $this->belongsTo(Product::class, "product_sku");
    // }
}
