<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Asm89\Stack\Cors;
use Cart;
use Mail;
use Illuminate\Http\Request;
class CartController extends Controller
{
    public function save_cart($id, Request $request)
    {
        $size = $request->input('product_size');
        $color = $request->input('product_color');
        $quantity = $request->input('qty');
        $product = Product::find($id);
        $pro_name = $product->name;
        $pro_image = $product->thumbnail;
        $pro_new_price = $product->latestPrice()->price;
        $data = [
            'id' => $id,
            'qty' => $quantity,
            'name' => $pro_name,
            'price' => $pro_new_price,

            'weight' => '12',
            'options' => [
                'image' => $pro_image,
                'product_size' => $size,
                'product_color' =>$color,
            ],
        ];
         
        // doan code save vao cart day phair ko
        //da dung r thay
        //ok
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
    public function checkoutComplete(Request $request)
    {
        $data['info'] = $request->all();
        $email =$request->email_address;
        // Mail::to($emails)->send(new \App\Mail\SendMail(['email_address'=>$emails]));
       
    
        Mail::Send('frontend.auth.email',$data,function($message) use ($email){
            $message->from('lethithu280300@gmail.com','HieuDtr'); 
            $message->to($email ,$email );
            $message->cc($email,$email);
            $message->subject('xác nhận mua hàng thành công!!!');
        });
        Cart::destroy();
        return redirect('complete');   
    }
    public function complete() {
        return view('frontend.auth.checkoutComplete');
    }
}
