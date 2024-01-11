<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Attributs;
use App\Models\Gallery;


class Product extends Model {
    use HasFactory;
    protected $connection ='mysql1';

    // public function Order() {
    //     return $this->hasOne(Order::class, "productid");
    // }

    public function product_attrs() {
        return $this->hasMany(Attributs::class,"product_sku", "productsku");
    }
    
    public function  product_attr_gallery() {
        return $this->hasMany(Gallery::class,"pid", "productsku");
    }
    
}
