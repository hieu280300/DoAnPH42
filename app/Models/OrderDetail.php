<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class OrderDetail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'order_details';

    protected $fillable = [
        'product_id',
        'order_id',
        'price_id',
        'size_id',
        'quantity',
        'color_id',
        
    ];

    /**
     * Get the post that owns the post_detail.
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'id');
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
    public function price()
    {
        return $this->belongsTo(Price::class, 'price_id', 'id');
    }
}
