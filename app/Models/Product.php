<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $primaryKey = 'productID';
    use HasFactory;
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'productID', 'productID');
    }
}
