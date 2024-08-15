<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'productID';

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'productID', 'productID');
    }
}
