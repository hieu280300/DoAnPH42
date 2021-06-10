<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderVerify;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Cart;
use Mail;
use App\Mail\SendVerifyCode;
use App\Utils\CommonUtil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CartController extends Controller
{
    
    private const RECORD_LIMIT = 10;
    public function save_cart($id, Request $request)
    {
        $size = $request->input('product_size');
        $color = $request->input('product_color');
        $quantity = $request->input('quantity');
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
        return view('frontend.carts.cart');
    }

    public function delete_cart($rowId)
    {
        Cart::remove($rowId);

        return redirect()->back();
    }

    public function update_quantity(Request $request)
    {
        Cart::update($request->rowId,$request->qty);

    }
    
    public function sendVerifyCode(Request $request)
    {
        // send code to verify Order
        // check exist send code ?
        $userId = Auth::id();
        $email = Auth::user()->email;
        $currentDate = date('Y-m-d H:i:s');
        $dateSubtract15Minutes = date('Y-m-d H:i:s', (time() - 60 * 15)); // current - 15 minutes
        Log::info('dateSubtract15Minutes');
        Log::info($dateSubtract15Minutes);
        $orderVerify = OrderVerify::where('user_id', $userId)
            ->whereBetween('expire_date', [$dateSubtract15Minutes, $currentDate])
            ->where('status', OrderVerify::STATUS[0])
            ->first();

        if (!empty($orderVerify)) { // already sent code and this code is available
            return response()->json(['message' => 'We sent code to your email about 15 minutes ago. Please check email to get code.']);
        } else { // not send code
            $dataSave = [
                'user_id' => $userId,
                'status'  => OrderVerify::STATUS[0], // default 0
                'code'  => CommonUtil::generateUUID(),
                'expire_date'  => $currentDate,
            ];
            DB::beginTransaction();

            try {
                OrderVerify::create($dataSave);

                // commit insert data into table
                DB::commit();

                // send code to email
                Mail::to($email)->send(new sendVerifyCode($dataSave));

                return response()->json(['message' => 'We sent code to email. Please check email to get code.']);
            } catch (\Exception $exception) {
                // rollback data and dont insert into table
                DB::rollBack();

                return response()->json(['message' => $exception->getMessage()]);
            }
        }
    }

    public function confirmVerifyCode(Request $request)
    {
        $code = $request->code;
        $userId = Auth::id();

        $orderVerify = OrderVerify::where('code', $code)
            ->where('user_id', $userId)
            ->where('status', OrderVerify::STATUS[0])
            ->first();
        //  validate code

        DB::beginTransaction();

        try {
            $orderVerify->status = OrderVerify::STATUS[1];
            $orderVerify->save();

            DB::commit();

            // add step by step to SESSION
            session(['step_by_step' => 2]);

            return response()->json(['message' => 'Confirmed code is OK.']);
        } catch (\Exception $exception) {
            DB::rollBack();

            return response()->json(['message' => $exception->getMessage()]);
        }
    }


    public function checkout()
    {
        return view('frontend.carts.checkout');
    }
    public function checkout_complete(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:10|max:255',
            'address' => 'required',
            'city' => 'required',
            'phone_number'=>'required',
            'email_address'=>'required'
        ]);
        $data['info'] = $request->all();
        $order = Order::create([ 
            'user_id' => Auth()->id(),
            'status' => Order::STATUS[0],
        ]);
        foreach (Cart::content() as $product)
        $orderId = $order->id;
        {
            OrderDetail::insert([
                'product_id'=> $product->id,
                'order_id' => $orderId,
                'price_id' =>$product->price,
                'size_id' =>$product->options->product_size,
                'quantity'=>$product->qty,
                'color_id'=>$product->options->product_color,
            ]);
        }
      
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

        return view('frontend.carts.checkout_complete');
    }
    public function manage_order()
    {
        $data=[];
        $id = Auth::user()->id;
        $manage_orders=Order::where('user_id',$id)->with('orderDetails')->with('user')->get();
        $data['manage_orders']=$manage_orders;
        return view('frontend.carts.manage_order',$data);
    }
    public function order_detail($id)
    {
      
        $order_details = DB::table('order_details')
        ->join('products', 'order_details.product_id', '=', 'products.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->where('order_id',$id)->select('products.thumbnail','products.name as product_name','order_details.price_id','order_details.quantity','order_details.size_id','order_details.color_id','orders.created_at as date_order')
        ->get();
        $data['order_id']=$id;
        $data['order_details']=$order_details;
        return view('frontend.carts.order_detail',$data);
    }


}
