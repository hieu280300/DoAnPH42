<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;
    protected $table = 'colors';

    protected $fillable = [
        'color',
        'product_id',
    ];

    public function products() {
        return $this->belongsToMany('App\Models\Product', 'product_colors', 'product_id', 'product_color');
      }
    public function orderDetail()
    {
        return $this->belongsTo(Product::class);
    }
}
