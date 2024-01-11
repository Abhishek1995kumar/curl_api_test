<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class OrderProduct extends Model {
    use HasFactory;
    protected $connection = 'mysql1';
    protected $table = "ordered_products";

    public function product(): hasManyThrough { // order table me foreign key hai product table ka iss liye ye use kiya hai
        return $this->hasManyThrough(Order::class, Product::class, "products", "id", "productid", "id");
    }

}
