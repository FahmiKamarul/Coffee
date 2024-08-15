<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'orderID';
    public $incrementing = true;
    protected $fillable = ['id', 'orderStatus'];

    
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'orderID', 'orderID');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'orderProducts', 'orderID', 'productID')
                    ->withPivot('quantity');
    }

    public function getTotalPriceAttribute()
    {
        return $this->orderProducts->sum(function($orderProduct) {
            return $orderProduct->product->productPrice * $orderProduct->quantity;
        });
    }
}
