<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('check_role_shipper');
    }
    private const RECORD_LIMIT = 10;
    public function index(request $request)
    {
        $data = [];
        $orders = Order::with('orderDetails')
        ->with('user')->get();

            if (!empty($request->name)) {
                $orders= $orders::where('name', 'like', '%' . $request->name. '%')
                ->whereDate('created_at',$request->name)->orderBy("created_at", 'desc')
                ;
            }
            // $orders = $orders->paginate(self::RECORD_LIMIT);
             $data['orders'] = $orders;
 
        return view('admin.auth.orders.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function order_detail($pro)
    // {

    //     return view('admin.auth.orders.detail', $data);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order =Order::findOrFail($id)->with('orderDetails')->with('user')->get();
        $order_details = DB::table('order_details')
        ->join('products', 'order_details.product_id', '=', 'products.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->where('order_id',$id)->select('products.thumbnail','products.name as product_name','order_details.price_id','order_details.quantity','order_details.size_id','order_details.color_id','orders.created_at as date_order')
        ->get();
        $data['order_id']=$id;
        $data['order_details']=$order_details;
        return view('admin.auth.orders.detail',$data);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];

        // get order
        $order = Order::findOrFail($id);
        $data['order'] = $order;

        return view('admin.auth.orders.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        DB::beginTransaction();

        try {
            $order->update([
                'status' => $request->status,
            ]);

            DB::commit();

            return redirect()->route('admin.order.index')->with('success', 'Update Status of Order successful.');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $order = Order::find($id);
            $order->delete();
            DB::commit();
            return redirect()->route('admin.order.index')
                ->with('success', 'Delete Product successful!');
        } catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
