<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Asm89\Stack\Cors;
use Cart;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function save_cart($id, Request $request)
    {
        $quantity = $request->input('quantity');
        $size = $request->input('size');
        $color = $request->input('color');
        $product = Product::find($id);
        $pro_name = $product->name;
        $pro_image = $product->thumbnail;
        // $size=$product->sizes->find($id)->size;
        $pro_new_price = $product->latestPrice()->price;
        $data = [
            'id' => $id,
            'qty' => $quantity,
            'name' => $pro_name,
            'price' => $pro_new_price,
            'size' => $size,
            'color' => $color,
            'weight' => '12',
            'options' => [
                'image' => $pro_image,
            ],
        ];
         
        Cart::add($data);
       
       
        return redirect()->back();
       
    }


    public function show_cart()
    {
        return view('frontend.auth.cart');
    }

    public function delete_cart($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back();
    }

    public function update_quantity(Request $request, $rowId)
    {
        Cart::update($rowId, $request->input('update_qty'));

        return redirect()->back();
    }
    public function checkout()
    {
        return view('frontend.auth.checkout');
    }
}
