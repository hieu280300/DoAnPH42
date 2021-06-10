<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class Search extends Controller
{
    public function search_category($id){
        $data=[];
        $category = Category::find($id);
        $size=Size::get();
        $color=Color::get();
        $product_relateds=Product::where('category_id',$category->id)->get();
        $categories = Category::pluck('name', 'id')
            ->toArray();
        $data['sizes']=$size;
        $data['colors']=$color;
        $data['categories'] = $categories;
        $data['product_relateds']=$product_relateds;
        return view('frontend.search.search_category', $data);
    }
    public function search_size($id)
    {
        $data=[];
        $categories = Category::pluck('name', 'id')
            ->toArray();
        $size =Size::find($id);
        $sizes=Size::get();
        $color=Color::get();
        $product_relateds=Product::join('product_sizes','products.id', '=', 'product_sizes.product_id')
        ->where('product_size',$size->id)->get();
        $data['sizes']=$sizes;
        $data['colors']=$color;
        $data['categories'] = $categories;
        $data['product_relateds']=$product_relateds;
        $data['categories'] = $categories;
        return view('frontend.search.search_size', $data);
    }
    public function search_color($id)
    {
        $data=[];
        $categories = Category::pluck('name', 'id')
            ->toArray();
        $color =Color::find($id);
        $size=Size::get();
        $colors=Color::get();
        $product_relateds=Product::join('product_colors','products.id', '=', 'product_colors.product_id')
        ->where('product_color',$color->id)->get();
        $data['sizes']=$size;
        $data['colors']=$colors;
        $data['categories'] = $categories;
        $data['product_relateds']=$product_relateds;
        $data['categories'] = $categories;
        return view('frontend.search.search_color', $data);
    }
}
