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
use App\Models\User;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

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
        $colors=Color::get();
        // $products = Product::paginate(9);
        $data['colors'] = $colors;
        $data['categories'] = $categories;
        $data['products'] = $products;
        $data['sizes'] = $sizes;
        return view('frontend.home.shop1', $data);
    }
    public function shop_detail($id)
    {
        $data=[];
        $product=Product::find($id);
        $products =Product::get();
        $product_relateds=Product::where('category_id',$product->category_id )->get();
        $sizes=Size::pluck('size','id');
        $colors=Color::pluck('color','id');
        $images = Image::where('product_id',$product->id)->get();
        $data['images'] = $images;
        $data['product']=$product;
        $data['products']=$products;
        $data['sizes']=$sizes;
        $data['colors']=$colors;
        $data['product_relateds']=$product_relateds;
        return view('frontend.products.shopdetail', $data);
    }
    public function info_user()
    {
        $data=[];
        $id = Auth::user()->id;
        $info_users=User::where('id',$id)->get();
        $data['info_users']=$info_users;
        return view('frontend.profile.profile',$data);
    }
    public function edit_profile($id)
    {
        $data=[];
        $info_users=User::find($id);
        $data['info_users']=$info_users;
        return view('frontend.profile.edit_profile',$data);
    }
    public function update_profile(request $request, $id)
    {
            DB::beginTransaction();
            
            try {
                $info=User::find($id);
                $info->name = $request->name;
                $info->email = $request->email;
                $info->password = $request->password;
                $info->phone = $request->phone;
                $info->address = $request->address;
                $info->save();
                DB::commit();
                return redirect()->route('info_user')->with('success', 'Insert Category seccessful');
            } catch (\Throwable $ex) {
                DB::rollBack();
                return redirect()->back()->with('error', $ex->getMessage());
            }
        }
        public function show_change_password(){
            return view('frontend.profile.change_password');
        }
        public function change_password(request $request)
      {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
        }
    
   
}