<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAjaxController extends Controller
{
        public function checkQuantity($id, Request $request)
        {
            // get quantity from Form Request
            $quantity = $request->quantity;
    
            // get product fron Database
            $product = Product::findOrFail($id);
            $quantityDB = $product->quantity;
    
            /**
             * Get Quantity on table order_details
             */
            $quantitySale = OrderDetail::where('product_id', $id)
                ->sum('quantity');
            $quantityInStock = $quantityDB - $quantitySale; 
    
            /**
             * check if Quantity Form Request > quantityInStock
             * 
             * @if true then show error message
             * @else then show success message
             */
            if ($quantity > $quantityInStock) {
                return response()->json(['message' => 'The product is out stock.'], 500);
            }
    
            // default show success message
            return response()->json(['message' => 'The product is in stock.']);
        }
    }

