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

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    // Define the relationship with OrderProduct
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'orderID', 'orderID');
    }
}
