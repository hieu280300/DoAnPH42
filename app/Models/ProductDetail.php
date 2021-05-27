<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $table = 'product_details';
    protected $fillable = [
    'content',
    'product_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
