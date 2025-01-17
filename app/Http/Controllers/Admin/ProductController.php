<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use File;
use App\Models\Category;
use App\Models\Color;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductDetail;
use App\Models\ProductSize;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // private const FOLDER_UPLOAD_PRODUCT = 'product';
    private const FOLDER_UPLOAD_PRODUCT_THUMBNAIL = 'products/thumbnails';
    // private const FOLDER_UPLOAD_PRODUCT_CONTENT = 'products/contents';
    // private const FOLDER_UPLOAD_PRODUCT_IMAGE = 'product_images';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $data = [];
        // get list data of table posts
        $products = Product::with('category')->with('product_detail');
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
        $products = $products->paginate(10);

        // get list data of table categories
        $categories = Category::pluck('name', 'id')
            ->toArray();
        $sizes = Size::pluck('size', 'id');
        $colors = Color::pluck('color', 'id');
        $productDetails = ProductDetail::pluck('content')->toArray();
        $data['colors'] = $colors;
        $data['sizes'] = $sizes;
        $data['productdetails'] = $productDetails;
        $data['categories'] = $categories;
        $data['products'] = $products;
        return view('admin.auth.products.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataInsert = [];
        $categories = Category::pluck('name', 'id')->toArray();
        $sizes = Size::pluck('size', 'id')->toArray();
        $colors = Color::pluck('color', 'id')->toArray();
        $dataInsert['colors'] = $colors;
        $dataInsert['sizes'] = $sizes;
        $dataInsert['categories'] = $categories;
        return view('admin.auth.products.create', $dataInsert);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {

        $thumbnailPath = null;
        if (
            $request->hasFile('thumbnail')
            && $request->file('thumbnail')->isValid()
        ) {
            // Nếu có thì thục hiện lưu trữ file vào public/products/thumbnail
            $image = $request->file('thumbnail');
            $extension = $request->thumbnail->extension();
            $extension = strtolower($extension); // convert string to lowercase
            $fileName = 'thumbnail_' . time() . '.' . $extension;

            // upload file to server
            $image->move(self::FOLDER_UPLOAD_PRODUCT_THUMBNAIL, $fileName);

            // set filename
            $thumbnailPath = self::FOLDER_UPLOAD_PRODUCT_THUMBNAIL . '/' . $fileName;
        }



        $dataInsert = [
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'thumbnail' => $thumbnailPath,
            'category_id' => $request->category_id,
        ];
        // dd($dataInsert);
        DB::beginTransaction();
        try {
            $product = Product::create($dataInsert);
            // price table em ko con dung nua dung ko?
            //e co dung thay
            $dataPrice = [
                'price' => $request->price,
                'product_id' => $product->id,
                'begin_date' => date('Y-m-d 00:00:00', strtotime($request->begin_date)),
                'end_date' => date('Y-m-d 00:00:00', strtotime($request->end_date)),
                'status' =>  $request->price_status,
            ];
            Price::create($dataPrice);
            foreach ($request->color_id as $color) {
                ProductColor::create([
                    'product_id' => $product->id,
                    'product_color' => $color
                ]);
            }
            foreach ($request->size_id as $size) {
                ProductSize::create([
                    'product_id' => $product->id,
                    'product_size' => $size
                ]);
            }
            DB::commit();
            // success
            return redirect()->route('admin.product.index')->with('success', 'Insert successful!');
        } catch (\Exception $ex) {
            Log::error($ex->getMessage());
            DB::rollback();
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.auth.products.detail', ['product' => Product::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $data = [];
    //     $post = Post::findOrFail($id);
    //     $categories = Category::pluck('name', 'id')->toArray();
    //     $data['posts'] = $post;
    //     $data['categories'] = $categories;
    //     return view('posts.edit', $data);
    // }
    public function edit($id)
    {
        $data = [];
        $categories = Category::pluck('name', 'id')
            ->toArray();
        $products = Product::findOrFail($id); 
        $product_sizes=ProductSize::where('product_id',$id)->get();
        $product_colors = ProductColor::where('product_id',$id)->get();    
        $sizes = Size::pluck('size', 'id')->toArray();
        $colors = Color::pluck('color', 'id')->toArray();
        $products=Product::paginate(8);
        // case 2
        $data['product_sizes'] = $product_sizes;
        $data['product_colors'] = $product_colors;
        $data['colors'] = $colors;
        $data['sizes'] = $sizes;
        $data['product'] = $products;
        $data['categories'] = $categories;
    
        return view('admin.auth.products.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        $productDetailId = $product->product_detail ? $product->product_detail->id : null;
        $thumbnailOld = $product->thumbnail;

        // update data for table posts
        $product->name = $request->name;
        $product->category_id = $request->category_id;

        $thumbnailPath = null;
        if (
            $request->hasFile('thumbnail')
            && $request->file('thumbnail')->isValid()
        ) {
            // Nếu có thì thục hiện lưu trữ file vào public/thumbnail
            $image = $request->file('thumbnail');
            $extension = $request->thumbnail->extension();
            $fileName = 'thumbnail_' . time() . '.' . $extension;
            $thumbnailPath = $image->move('thumbnail', $fileName);
            $product->thumbnail = $thumbnailPath;
            Log::info('thumbnailPath: ' . $thumbnailPath);
        }
        DB::beginTransaction();

        try {
            // update data for table posts
            $product->save();
            foreach ($request->color_id as $color) {
                ProductColor::updateOrCreate([
                    'product_id' => $product->id,
                    'product_color' => $color
                ]);
               
            } 
            foreach ($request->size_id as $size) {
                ProductSize::updateOrCreate([
                    'product_id' => $product->id,
                    'product_size' => $size
                ]);
            }
            $dataDetailProduct = [
                'content' => $request->content,
                'product_id' => $id,
            ];

            // create or update data for table post_details
            if (!$productDetailId) { // create
                $productDetail = new ProductDetail($dataDetailProduct);
                $productDetail->save();
            } else { // update
                ProductDetail::find($productDetailId)
                    ->update($dataDetailProduct);
            }

            DB::commit();

            // SAVE OK then delete OLD file
            if (File::exists(public_path($thumbnailOld))) {
                File::delete(public_path($thumbnailOld));
            }

            // success
            return redirect()->route('admin.product.index')->with('success', 'Update successful!');
        } catch (\Exception $ex) {
            DB::rollback();

            return redirect()->back()->with('error', $ex->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $product = Product::find($id);
            $product->delete();
            DB::commit();
            return redirect()->route('admin.product.index')
                ->with('success', 'Delete Product successful!');
        } catch (\Exception $ex) {
            DB::rollBack();
            // have error so will show error message
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
