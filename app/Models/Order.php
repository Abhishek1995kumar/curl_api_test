<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model {
    use HasFactory;
    protected $connection = 'mysql1';
    protected $table = "orders";
    protected $primaryKey = "id";

    public function product(): BelongsTo { // order table me foreign key hai product table ka iss liye ye use kiya hai
        return $this->belongsTo(Product::class, "products");
    }
}
