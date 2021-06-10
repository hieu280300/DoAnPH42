<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'quantity',
        'category_id',
        'status',
    ];
    public const PAGE_LIMIT = 10;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the post_detail for the post.
     */
    public function product_detail()
    {
        return $this->hasOne(ProductDetail::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors', 'product_id', 'product_color');
    }
    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    public function sizes() {
        return $this->belongsToMany(Size::class, 'product_sizes', 'product_id', 'product_size');
    }
    public function latestPrice()
    {
        $currentdate = date('Y-m-01 H:i:s');

        return $this->hasOne(Price::class)
            ->where('end_date', '>=', $currentdate)
            ->where('status',1)
            ->first();
    }
    public function order_detail()
    {
        return $this->belongsTo(OrderDetail::class,'product_id', 'id');
    }


}
