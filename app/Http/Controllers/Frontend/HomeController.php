<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Image;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Size;
use Illuminate\Http\Request;
use Cart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     return view('frontend.auth.homepage');
    // }
    public function shop(request $request)
    {
        $data = [];
        // get list data of table posts
        $products =Product::with('category')->with('product_detail');
        // add new  param to search
        // search post name
        if (!empty($request->name)) {
            $products = $products->where('name', 'like', '%' . $request->name . '%');
        }

        // search category_id
        if (!empty($request->category_id)) {
            $products = $products->where('category_id', $request->category_id);
        }
        // pagination
        $products = $products->paginate(9);

        // get list data of table categories
        $categories = Category::pluck('name', 'id')
            ->toArray();
        // $productDetails = ProductDetail::pluck('content')->toArray();
        // $data['productdetails'] = $productDetails;
        // $data['categories'] = $categories;
        // dd($posts);
        // $data['products'] = $products;
        // return view('admin.auth.posts.index', $data);

        // $data = [];
        // $products = Product::get();
        // $categories = Category::get();
        $sizes = Size::get();
        // $products = Product::paginate(9);
        $data['categories'] = $categories;
        $data['products'] = $products;
        $data['sizes'] = $sizes;
        return view('frontend.auth.shop1', $data);
    }
    public function shop_detail($id)
    {
      
        $data=[];
        $product=Product::find($id);
        $size=Size::all();
        $color=Color::all();
        $product_relateds=Product::where('category_id',$product->category_id)->get();
        $data['product']=$product;
        $data['sizes']=$size;
        $data['colors']=$color;
        $data['product_relateds']=$product_relateds;
        return view('frontend.auth.shopdetail', $data);
    }
   
}