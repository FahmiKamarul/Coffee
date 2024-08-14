<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'orderProducts'; // Ensure this matches your migration

    // Allow mass assignment for these fields
    protected $fillable = [
        'orderID',
        'productID',
        'quantity'
    ];

    // Optional: Define relationships if needed
    public function order()
    {
        return $this->belongsTo(Order::class, 'orderID');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID');
    }
}
