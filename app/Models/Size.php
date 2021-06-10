<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $table = 'sizes';

    protected $fillable = [
        'size',
        'product_id',
    ];
    public function products() {
        return $this->belongsToMany('App\Models\Product', 'product_sizes', 'product_id', 'product_size');
      }
   
}
